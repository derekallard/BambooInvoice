<?php

class Reports extends MY_Controller {

	function Reports()
	{
		parent::MY_Controller();
		$this->load->helper(array('date', 'text'));
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->model('invoices_model');
		$this->load->model('reports_model');
	}

	// --------------------------------------------------------------------

	function index()
	{
		$this->lang->load('calendar');

		$data['extraHeadContent'] = '<script src="' . base_url() . 'js/excanvas/excanvas.js" type="text/javascript"></script><script src="' . base_url() . 'js/plotr.js" type="text/javascript"></script>';
		$data['extraHeadContent'] .= '<link type="text/css" rel="stylesheet" href="' . base_url() . 'css/reports.css" />';

		$data['current_year'] = $this->uri->segment(3, date('Y'));

		//earliest year
		$earliest_year = substr($this->db->select('MIN(`dateIssued`) AS dateIssued', FALSE)->get('invoices')->row()->dateIssued, 0, 4);

		$data['years'] = array();

		while($earliest_year <= date('Y'))
		{
			$data['years'][] = $earliest_year++;
		}

		for ($i=1; $i<13; $i++)
		{
			// invoices totals without taxes
			($i < 10) ? $monthnum = "0$i" : $monthnum=$i;
			$data['month_invoices'][$i] = round($this->reports_model->getSummaryData($data['current_year']. "-$monthnum-01", $data['current_year']."-$monthnum-31")->amount);

			// tax1
			($i < 10) ? $monthnum = "0$i" : $monthnum=$i;
			$data['month_tax1'][$i] = round($this->reports_model->getSummaryData($data['current_year']. "-$monthnum-01", $data['current_year']."-$monthnum-31")->tax1_collected);

			// tax2
			($i < 10) ? $monthnum = "0$i" : $monthnum=$i;
			$data['month_tax2'][$i] = round($this->reports_model->getSummaryData($data['current_year']. "-$monthnum-01", $data['current_year']."-$monthnum-31")->tax2_collected);
		}

		$days_overdue = $this->settings_model->get_setting('days_payment_due');

		$data['openInvoices'] = $this->invoices_model->getInvoices('open', $days_overdue, '', '');

		$data['openInvoicesAmount'] = 0;
		$openInvoices = $this->invoices_model->getInvoices('open', $days_overdue, '', '');

		$data['overdueInvoicesAmount'] = 0;
		$overdueInvoices = $this->invoices_model->getInvoices('overdue', $days_overdue, '', '');

		if ($openInvoices == NULL)
		{
			$data['openInvoicesCount'] = 0;
		}
		else
		{
			$data['openInvoicesCount'] = $overdueInvoices->num_rows();

			$data['openInvoicesCount'] = $openInvoices->num_rows();
			if ($data['openInvoicesCount'] != 0)
			{
				foreach ($openInvoices->result() as $invoice)
				{
					$data['openInvoicesAmount'] += $invoice->subtotal;
				}
			}

			// account for non-period decimal
			$data['openInvoicesAmount'] = str_replace('.', $this->config->item('currency_decimal'), $data['openInvoicesAmount']);
		}

		if ($overdueInvoices == NULL)
		{
			$data['overdueInvoicesCount'] = 0;
		}
		else
		{
			$data['overdueInvoicesCount'] = $overdueInvoices->num_rows();

			if ($data['overdueInvoicesCount'] != 0)
			{
				foreach ($overdueInvoices->result() as $invoice)
				{
					$data['overdueInvoicesAmount'] += $invoice->subtotal;
				}
			}

			// account for non-period decimal
			$data['overdueInvoicesAmount'] = str_replace('.', $this->config->item('currency_decimal'), $data['overdueInvoicesAmount']);
		}

		$data['yearToDateCount'] = $this->reports_model->getInvoiceDateRange($data['current_year'].'-01-01', $data['current_year'].'-12-31')->num_rows() . ' ' . $this->lang->line('reports_invoices_issued_year');

		$current_year_data = $this->reports_model->getSummaryData($data['current_year'].'-01-01', $data['current_year'].'-12-31');

		$data['yearToDateAmount'] = $this->settings_model->get_setting('currency_symbol') . number_format($current_year_data->amount, 2, $this->config->item('currency_decimal'), '');
		if ($current_year_data->tax1_collected > 0)
		{
			$data['yearToDateTax1'] = $this->settings_model->get_setting('currency_symbol') . number_format($current_year_data->tax1_collected, 2, $this->config->item('currency_decimal'), '');
		}
		else
		{
			$data['yearToDateTax1'] = '';
		}

		if ($current_year_data->tax2_collected > 0)
		{
			$data['yearToDateTax2'] = $this->settings_model->get_setting('currency_symbol') . number_format($current_year_data->tax2_collected, 2, $this->config->item('currency_decimal'), '');
		}
		else
		{
			$data['yearToDateTax2'] = '';
		}

		$data['page_title'] = $this->lang->line('menu_reports');
		$this->load->view('reports/index', $data);
	}

	// --------------------------------------------------------------------

	function dates()
	{
		$tax1_desc = $this->settings_model->get_setting('tax1_desc');
		$tax2_desc = $this->settings_model->get_setting('tax2_desc');
		$tax1_rate = $this->settings_model->get_setting('tax1_rate');
		$tax2_rate = $this->settings_model->get_setting('tax2_rate');

		$start_date = $this->uri->segment(3, $this->input->post('startDate')); //ie: '2007-04-01';
		$end_date = $this->uri->segment(4, $this->input->post('endDate')); //ie: '2007-04-01';

		$start_date_timestamp = mysqldatetime_to_timestamp($start_date);
		$end_date_timestamp = mysqldatetime_to_timestamp($end_date);

		$date_error = (date("Y", $start_date_timestamp) == '1969' OR date("Y", $end_date_timestamp) == '1969') ? TRUE : FALSE;

		// sanity checks
		$data['report_dates'] = 'Report for ' . date("Y-m-d", $start_date_timestamp) . ' to ' . date("Y-m-d", $end_date_timestamp);

		$detailed_data = $this->reports_model->getDetailedData($start_date, $end_date);
		$detailed_data_summary = $this->reports_model->getSummaryData($start_date, $end_date);

		if ($end_date_timestamp < $start_date_timestamp)
		{
			$data['data_table'] = '<p class="error">You\'ll need to pick a start date before that end date.</p>';
		}
		elseif ($date_error)
		{
			$data['data_table'] = '<p class="error">Looks like the dates somehow got messed up.  Probably easiest to go ' . anchor ('reports', 'back to reports') . ' and try again.</p>';
		}
		elseif ($detailed_data->num_rows() > 0)
		{

			$tmpl = array ( 'table_open' => '<table style="width: auto; margin: 0;" class="stripe">' );
			$this->table->set_template($tmpl);

			$this->table->clear();
			if ($tax2_desc == '')
			{
				$this->table->set_heading($this->lang->line('invoice_client'), $this->lang->line('invoice_amount'), "$tax1_desc ($tax1_rate%)");

				foreach ($detailed_data->result() as $details)
				{
					$this->table->add_row($details->name, $this->settings_model->get_setting('currency_symbol') . number_format($details->amount, 2, $this->config->item('currency_decimal'), ''), $this->settings_model->get_setting('currency_symbol') . number_format($details->tax1_collected, 2, $this->config->item('currency_decimal'), ''));
				}

				$this->table->add_row('<strong>Total</strong>', '<strong>' . $this->settings_model->get_setting('currency_symbol') . number_format($detailed_data_summary->amount, 2, $this->config->item('currency_decimal'), ''), '<strong>' . $this->settings_model->get_setting('currency_symbol') . number_format($detailed_data_summary->tax1_collected, 2, $this->config->item('currency_decimal'), '') . '</strong>');
			}
			else
			{
				$this->table->set_heading('Client', 'Total Billed', "$tax1_desc ($tax1_rate%)", "$tax2_desc ($tax2_rate%)");

				foreach ($detailed_data->result() as $details)
				{
					$this->table->add_row($details->name, $this->settings_model->get_setting('currency_symbol') . number_format($details->amount, 2, $this->config->item('currency_decimal'), ''), $this->settings_model->get_setting('currency_symbol') . number_format($details->tax1_collected, 2, $this->config->item('currency_decimal'), ''), $this->settings_model->get_setting('currency_symbol') . number_format($details->tax2_collected, 2, $this->config->item('currency_decimal'), ''));
				}

				$this->table->add_row('<strong>'.$this->lang->line('invoice_total').'</strong>', '<strong>' . $this->settings_model->get_setting('currency_symbol') . number_format($detailed_data_summary->amount, 2, $this->config->item('currency_decimal'), ''), '<strong>' . $this->settings_model->get_setting('currency_symbol') . number_format($detailed_data_summary->tax1_collected, 2, $this->config->item('currency_decimal'), '') . '</strong>', '<strong>' . $this->settings_model->get_setting('currency_symbol') . number_format($detailed_data_summary->tax2_collected, 2, $this->config->item('currency_decimal'), '') . '</strong>');
			}

			$data['data_table'] = $this->table->generate();
		}
		else
		{
			$data['data_table'] = '<p class="error">'.$this->lang->line('reports_no_data').'</p>';
		}

		$data['page_title'] = $this->lang->line('menu_reports');
		$this->load->view('reports/dates', $data);
	}

}
?>