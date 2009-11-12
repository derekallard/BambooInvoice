<?php

class Invoices extends MY_Controller {

	function Invoices()
	{
		parent::MY_Controller();
		$this->lang->load('calendar');
		$this->load->helper(array('date', 'text', 'typography'));
		$this->load->library('pagination');
		$this->load->model('invoices_model');
		$this->load->model('clients_model');
	}

	// --------------------------------------------------------------------

	function index()
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/search.js\"></script>\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";
		$offset = (int) $this->uri->segment(3, 0);

		$data['query'] = $this->invoices_model->getInvoices('open', $this->settings_model->get_setting('days_payment_due'), $offset, 5000);

		$data['short_description'] = $this->invoices_model->build_short_descriptions();

		$data['total_rows'] = ($data['query']) ? $data['query']->num_rows() : 0;

		$overdue_count = $this->invoices_model->getInvoices('overdue', $this->settings_model->get_setting('days_payment_due'), 0, 5000);

		$data['overdue_count'] = ($overdue_count) ? $overdue_count->num_rows() : 0;

		$data['message'] = ($this->session->flashdata('message') != '') ? $this->session->flashdata('message') : '';

		$data['status_menu'] = TRUE; // pass status_menu
		$data['page_title'] = $this->lang->line('menu_invoices');

		$this->load->view('invoices/index', $data);
	}

	// --------------------------------------------------------------------

	function overdue($offset = 0)
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";

		$data['query'] = $this->invoices_model->getInvoices('overdue', $this->settings_model->get_setting('days_payment_due'), $offset, 20);

		$data['total_rows'] = $data['query']->num_rows();
		$config['base_url'] = site_url('invoices/overdue');
		$config['total_rows'] = $this->invoices_model->getInvoices('overdue', $this->settings_model->get_setting('days_payment_due'), 0, 10000)->num_rows();
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['status_menu'] = TRUE; // pass status_menu
		$data['page_title'] = $this->lang->line('invoice_overdue');
		$this->load->view('invoices/status_view', $data);
	}

	// --------------------------------------------------------------------

	function open($offset = 0)
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";

		$data['query'] = $this->invoices_model->getInvoices('open', $this->settings_model->get_setting('days_payment_due'), $offset, 20);

		$data['total_rows'] = $data['query']->num_rows();

		$config['base_url'] = site_url('invoices/open');
		$config['total_rows'] = $this->invoices_model->getInvoices('open', $this->settings_model->get_setting('days_payment_due'), 0, 10000)->num_rows();
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['status_menu'] = TRUE; // pass status_menu
		$data['page_title'] = $this->lang->line('invoice_open');
		$this->load->view('invoices/status_view', $data);
	}

	// --------------------------------------------------------------------

	function closed($offset = 0)
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";

		$data['query'] = $this->invoices_model->getInvoices('closed', $this->settings_model->get_setting('days_payment_due'), $offset, 20);

		$data['total_rows'] = $data['query']->num_rows();

		$config['base_url'] = site_url('invoices/closed');
		$config['total_rows'] = $this->invoices_model->getInvoices('closed', $this->settings_model->get_setting('days_payment_due'), 0, 10000)->num_rows();
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['status_menu'] = TRUE; // pass status_menu
		$data['page_title'] = $this->lang->line('invoice_closed');
		$this->load->view('invoices/status_view', $data);
	}

	// --------------------------------------------------------------------

	function all($offset = 0)
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";

		$data['query'] = $this->invoices_model->getInvoices('all', $this->settings_model->get_setting('days_payment_due'), $offset, 20);
		$data['total_rows'] = $data['query']->num_rows();

		$config['total_rows'] = $this->invoices_model->getInvoices('all', $this->settings_model->get_setting('days_payment_due'), 0, 10000)->num_rows();
		$config['base_url'] = site_url('invoices/all');
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['status_menu'] = TRUE; // pass status_menu
		$data['page_title'] = $this->lang->line('invoice_all_invoices');

		$this->load->view('invoices/status_view', $data);
	}

	// --------------------------------------------------------------------

	function recalculate_items()
	{
		$amount = 0;
		$tax1_amount = 0;
		$tax2_amount = 0;

		$items = $this->input->post('items');
		$tax1_rate = $this->input->post('tax1_rate');
		$tax2_rate = $this->input->post('tax2_rate');

		foreach ($items as $item)
		{
			$taxable = (isset($item['taxable']) && $item['taxable'] == 1) ? 1 : 0;
			$sub_amount = $item['quantity'] * $item['amount'];
			$amount += $sub_amount;
			$tax1_amount += $sub_amount * (($tax1_rate)/100) * $taxable;
			$tax2_amount += $sub_amount * (($tax2_rate)/100) * $taxable;
		}

		echo '{"amount" : "'.number_format($amount, 2, $this->config->item('currency_decimal'), '').'", "tax1_amount" : "'.number_format($tax1_amount, 2, $this->config->item('currency_decimal'), '').'", "tax2_amount" : "'.number_format($tax2_amount, 2, $this->config->item('currency_decimal'), '').'", "total_amount" : "'.number_format($amount + $tax1_amount+$tax2_amount, 2, $this->config->item('currency_decimal'), '').'"}';
	}

	// --------------------------------------------------------------------

	function newinvoice()
	{
		$this->load->library('validation');
		$this->load->plugin('js_calendar');

		// check if it came from a post, or has a session of clientId
		$id = ($this->input->post('client_id') != '') ? $this->input->post('client_id') : $this->session->flashdata('clientId');
		$newName = $this->input->post('newClient');

		if ( ! isset($id))
		{
			// if they don't already have a client id, then they need to create the
			// client first, so send them off to do that
			$this->session->set_flashdata('clientName', $newName);
			redirect('clients/newclient');
		}

		$data['row'] = $this->clients_model->get_client_info($id); // used to extract name, id and tax info

		$data['tax1_desc'] = $this->settings_model->get_setting('tax1_desc');
		$data['tax1_rate'] = $this->settings_model->get_setting('tax1_rate');
		$data['tax2_desc'] = $this->settings_model->get_setting('tax2_desc');
		$data['tax2_rate'] = $this->settings_model->get_setting('tax2_rate');
		$data['invoice_note_default'] = $this->settings_model->get_setting('invoice_note_default');

		$last_invoice_number = $this->invoices_model->lastInvoiceNumber($id);
		($last_invoice_number != '') ? $data['lastInvoiceNumber'] = $last_invoice_number : $data['lastInvoiceNumber'] = '';
		$data['suggested_invoice_number'] = (is_numeric($last_invoice_number)) ? $last_invoice_number+1 : '';

		$taxable = ($data['row']->tax_status == 1) ? 'true' : 'false';

		$data['extraHeadContent'] = "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/calendar.css\" />\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\">\nvar taxable = ".$taxable.";\nvar tax1_rate = ". $data['tax1_rate'] .";\nvar tax2_rate = ". $data['tax2_rate'] .";\nvar datePicker1 = \"".date("Y-m-d")."\";\nvar datePicker2 = \"".date("F j, Y")."\";\n</script>\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/createinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= js_calendar_script('my_form');

		$this->_validation(); // Load the validation rules and fields

		$data['invoiceDate'] = date("Y-m-d");

		if ($this->validation->run() == FALSE)
		{
			$this->session->keep_flashdata('clientId');
			$data['invoiceDate'] = $this->validation->dateIssued;
			$data['page_title'] = $this->lang->line('invoice_new_invoice');
			$this->load->view('invoices/newinvoice', $data);
		}
		else
		{
			$invoice_data = array(
									'client_id' => $this->input->post('client_id'),
									'invoice_number' => $this->input->post('invoice_number'),
									'dateIssued' => $this->input->post('dateIssued'),
									'tax1_desc' => $this->input->post('tax1_description'),
									'tax1_rate' => $this->input->post('tax1_rate'),
									'tax2_desc' => $this->input->post('tax2_description'),
									'tax2_rate' => $this->input->post('tax2_rate'),
									'invoice_note' => $this->input->post('invoice_note')
								);

			$invoice_id = $this->invoices_model->addInvoice($invoice_data);

			if ($invoice_id > 0)
			{
				$items = $this->input->post('items');

				$amount = 0;
				foreach ($items as $item)
				{
					$taxable = (isset($item['taxable']) && $item['taxable'] == 1) ? 1 : 0;

					$invoice_items = array(
											'invoice_id' 		=> $invoice_id,
											'quantity' 			=> $item['quantity'],
											'amount' 			=> $item['amount'],
											'work_description' 	=> $item['work_description'],
											'taxable' 			=> $taxable
										);

					$this->invoices_model->addInvoiceItem($invoice_items);
				}

				redirect('invoices/view/'.$invoice_id);
			}
			else
			{
				// clear clientId session
				$data['page_title'] = $this->lang->line('invoice_new_error');
				$this->load->view('invoices/create_fail', $data);
			}
		}
	}

	// --------------------------------------------------------------------

	function newinvoice_first()
	{
		// page for users without javascript enabled
		$data['page_title'] = $this->lang->line('menu_new_invoice');
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$this->load->view('invoices/newinvoice_first', $data);
	}

	// --------------------------------------------------------------------

	function view($id)
	{
		$this->lang->load('date');
		$this->load->plugin('js_calendar');
		$this->load->helper('file');

		$data['message'] = ($this->session->flashdata('message') != '') ? $this->session->flashdata('message') : '';

		$data['extraHeadContent'] = "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/calendar.css\" />\n";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/emailinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\">\nvar datePicker1 = \"".date("Y-m-d")."\";\nvar datePicker2 = \"".date("F j, Y")."\";\n\n</script>";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/payinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= js_calendar_script('my_form');
		$data['invoiceDate'] = date("Y-m-d");

		$invoiceInfo = $this->invoices_model->getSingleInvoice($id);

		if ($invoiceInfo->num_rows() == 0) {redirect('invoices/');}

		$data['row'] = $invoiceInfo->row();

		$data['date_invoice_issued'] = formatted_invoice_date($data['row']->dateIssued);
		$data['date_invoice_due'] = formatted_invoice_date($data['row']->dateIssued, $this->settings_model->get_setting('days_payment_due'));

		if ($data['row']->amount_paid >= $data['row']->total_with_tax)
		{
			// paid invoices
			$data['status'] = '<span>'.$this->lang->line('invoice_closed').'</span>';
		}
		elseif (mysql_to_unix($data['row']->dateIssued) >= time()-($this->settings_model->get_setting('days_payment_due') * 60*60*24))
		{
			// owing less then 30 days
			$data['status'] = '<span>'.$this->lang->line('invoice_open').'</span>';
		}
		else
		{
			// owing more then 30 days
			$due_date = $data['row']->dateIssued + ($this->settings_model->get_setting('days_payment_due') * 60*60*24); 
			$data['status'] = '<span class="error">'.timespan(mysql_to_unix($data['row']->dateIssued) + ($this->settings_model->get_setting('days_payment_due') * 60*60*24), now()). ' '.$this->lang->line('invoice_overdue').'</span>';
		}

		$data['items'] = $this->invoices_model->getInvoiceItems($id);

		// begin amount and taxes
		$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";

		$data['tax_info'] = $this->_tax_info($data['row']);

		$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '')."<br />\n";;
		// end amount and taxes

		if ($data['row']->amount_paid > 0)
		{
			$data['total_paid'] = $this->lang->line('invoice_amount_paid').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '')."<br />\n";;
			$data['total_outstanding'] = $this->lang->line('invoice_amount_outstanding').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax - $data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '');
		}
		else
		{
			$data['total_paid'] = '';
			$data['total_outstanding'] = '';
		}

		$data['companyInfo'] = $this->settings_model->getCompanyInfo()->row();
		$data['clientContacts'] = $this->clients_model->getClientContacts($data['row']->client_id);
		$data['invoiceHistory'] = $this->invoices_model->getInvoiceHistory($id);
		$data['paymentHistory'] = $this->invoices_model->getInvoicePaymentHistory($id);
		$data['invoiceOptions'] = TRUE; // create invoice options on sidebar
		$data['company_logo'] = $this->_get_logo();
		$data['page_title'] = 'Invoice Details';

		$this->load->view('invoices/view', $data);
	}

	// --------------------------------------------------------------------

	function edit($id)
	{
		$this->load->library('validation');
		$this->load->plugin('js_calendar');

		// grab invoice info
		$data['row'] = $this->invoices_model->getSingleInvoice($id)->row();
		$data['invoice_number'] = $data['row']->invoice_number;
		$data['last_number_suggestion'] = '';
		$data['action'] = 'edit';

		// some hidden form data
		$data['form_hidden'] = array(
										'id'	=> $data['row']->id,
										'tax1_rate'	=> $data['row']->tax1_rate,
										'tax1_description'	=> $data['row']->tax1_desc,
										'tax2_rate'	=> $data['row']->tax2_rate,
										'tax2_description'	=> $data['row']->tax2_desc,
									);

		$taxable = ($this->clients_model->get_client_info($data['row']->client_id, 'tax_status')->tax_status == 1) ? 'true' : 'false';

		$data['extraHeadContent'] = "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/calendar.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\">\nvar taxable = ".$taxable.";\nvar tax1_rate = ". $data['row']->tax1_rate .";\nvar tax2_rate = ". $data['row']->tax2_rate .";\nvar datePicker1 = \"".date("Y-m-d", mysql_to_unix($data['row']->dateIssued))."\";\nvar datePicker2 = \"".date("F j, Y", mysql_to_unix($data['row']->dateIssued))."\";\n\n</script>";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/createinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= js_calendar_script('my_form');
		$data['clientListEdit'] = $this->clients_model->getAllClients();

		$this->_validation_edit(); // Load the validation rules and fields

		$data['page_title'] = $this->lang->line('menu_edit_invoice');
		$data['button_label'] = 'invoice_save_edited_invoice';

		if ($this->validation->run() == FALSE)
		{
			$data['items'] = $this->invoices_model->getInvoiceItems($id);

			// begin amount and taxes
			$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";
			$data['tax_info'] = $this->_tax_info($data['row']);
			$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '');
			// end amount and taxes

			$this->load->view('invoices/edit', $data);
		}
		else
		{
			if ($this->invoices_model->uniqueInvoiceNumberEdit($this->input->post('invoice_number'), $this->input->post('id')))
			{
				$invoice_data = array(
											'client_id' 		=> $this->input->post('client_id'),
											'invoice_number' 	=> $this->input->post('invoice_number'),
											'dateIssued' 		=> $this->input->post('dateIssued'),
											'tax1_desc' 		=> $this->input->post('tax1_description'),
											'tax1_rate' 		=> $this->input->post('tax1_rate'),
											'tax2_desc' 		=> $this->input->post('tax2_description'),
											'tax2_rate' 		=> $this->input->post('tax2_rate'),
											'invoice_note' 		=> $this->input->post('invoice_note')
									);

				$invoice_id = $this->invoices_model->updateInvoice($this->input->post('id'), $invoice_data);

				if (!$invoice_id)
				{
					show_error('That invoice could not be updated.');
				}

				$this->invoices_model->delete_invoice_items($invoice_id); // remove old items

				// add them back
				$items = $this->input->post('items');
				foreach ($items as $item)
				{
					$taxable = (isset($item['taxable']) && $item['taxable'] == 1) ? 1 : 0;

					$invoice_items = array(
											'invoice_id' 		=> $invoice_id,
											'quantity' 			=> $item['quantity'],
											'amount' 			=> $item['amount'],
											'work_description' 	=> $item['work_description'],
											'taxable' 			=> $taxable
										);

					$this->invoices_model->addInvoiceItem($invoice_items);
				}

				// give a session telling them it worked
				$this->session->set_flashdata('message', $this->lang->line('invoice_invoice_edit_success'));
				redirect('invoices/view/'.$invoice_id);
			}
			else
			{
				$data['invoice_number_error'] = TRUE;
				$data['items'] = $this->invoices_model->getInvoiceItems($id);

				// begin amount and taxes
				$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";

				$data['tax_info'] = $this->_tax_info($data['row']);

				$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '');
				// end amount and taxes

				$this->load->view('invoices/edit', $data);
			}
		}
	}

	// --------------------------------------------------------------------

	function duplicate($id)
	{
		$this->load->library('validation');
		$this->load->plugin('js_calendar');

		// grab invoice info
		$data['row'] = $this->invoices_model->getSingleInvoice($id)->row();
		$data['action'] = 'duplicate';

		// some hidden form data
		$data['form_hidden'] = array(
										'tax1_rate'	=> $data['row']->tax1_rate,
										'tax1_description'	=> $data['row']->tax1_desc,
										'tax2_rate'	=> $data['row']->tax2_rate,
										'tax2_description'	=> $data['row']->tax2_desc,
									);

		$taxable = ($this->clients_model->get_client_info($data['row']->client_id, 'tax_status')->tax_status == 1) ? 'true' : 'false';

		$data['extraHeadContent'] = "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/calendar.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\">\nvar taxable = ".$taxable.";\nvar tax1_rate = ". $data['row']->tax1_rate .";\nvar tax2_rate = ". $data['row']->tax2_rate .";\nvar datePicker1 = \"".date("Y-m-d", mysql_to_unix($data['row']->dateIssued))."\";\nvar datePicker2 = \"".date("F j, Y", mysql_to_unix($data['row']->dateIssued))."\";\n\n</script>";
		$data['extraHeadContent'] .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"". base_url()."css/invoice.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"". base_url()."js/createinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= js_calendar_script('my_form');
		$data['clientListEdit'] = $this->clients_model->getAllClients();

		$this->_validation_edit(); // Load the validation rules and fields

		$last_invoice_number = $this->invoices_model->lastInvoiceNumber($id);
		($last_invoice_number != '') ? $data['lastInvoiceNumber'] = $last_invoice_number : $data['lastInvoiceNumber'] = '';
		$data['invoice_number'] = (is_numeric($last_invoice_number)) ? $last_invoice_number+1 : '';
		$data['last_number_suggestion'] = '('.$this->lang->line('invoice_last_used').' '.$last_invoice_number.')';

		$data['page_title'] = $this->lang->line('menu_duplicate_invoice');
		$data['button_label'] = 'actions_create_invoice';

		if ($this->validation->run() == FALSE)
		{
			$data['items'] = $this->invoices_model->getInvoiceItems($id);

			// begin amount and taxes
			$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";
			$data['tax_info'] = $this->_tax_info($data['row']);
			$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '');
			// end amount and taxes

			$this->load->view('invoices/edit', $data);
		}
		else
		{
			if ($this->invoices_model->uniqueInvoiceNumber($this->input->post('invoice_number'), $this->input->post('id')))
			{
				$invoice_data = array(
										'client_id' => $this->input->post('client_id'),
										'invoice_number' => $this->input->post('invoice_number'),
										'dateIssued' => $this->input->post('dateIssued'),
										'tax1_desc' => $this->input->post('tax1_description'),
										'tax1_rate' => $this->input->post('tax1_rate'),
										'tax2_desc' => $this->input->post('tax2_description'),
										'tax2_rate' => $this->input->post('tax2_rate'),
										'invoice_note' => $this->input->post('invoice_note')
									);

				$invoice_id = $this->invoices_model->addInvoice($invoice_data);

				if ($invoice_id > 0)
				{
					$items = $this->input->post('items');

					$amount = 0;
					foreach ($items as $item)
					{
						$taxable = (isset($item['taxable']) && $item['taxable'] == 1) ? 1 : 0;

						$invoice_items = array(
												'invoice_id' => htmlspecialchars($invoice_id),
												'quantity' => htmlspecialchars($item['quantity']),
												'amount' => htmlspecialchars($item['amount']),
												'work_description' => htmlspecialchars($item['work_description']),
												'taxable' => htmlspecialchars($taxable)
											);

						$this->invoices_model->addInvoiceItem($invoice_items);
					}
				}

				// give a session telling them it worked
				$this->session->set_flashdata('message', $this->lang->line('invoice_invoice_edit_success'));
				redirect('invoices/view/'.$invoice_id);
			}
			else
			{
				$data['invoice_number_error'] = TRUE;
				$data['items'] = $this->invoices_model->getInvoiceItems($id);

				// begin amount and taxes
				$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";

				$data['tax_info'] = $this->_tax_info($data['row']);

				$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '');
				// end amount and taxes

				$this->load->view('invoices/edit', $data);
			}
		}
	}

	// --------------------------------------------------------------------

	function notes($id)
	{
		$this->load->model('invoice_histories_model');

		$this->invoice_histories_model->insert_note($id, $this->input->post('private_note'));

		$this->session->set_flashdata('message', $this->lang->line('invoice_comment_success'));
		redirect('invoices/view/'.$id);
	}

	// --------------------------------------------------------------------

	function email($id)
	{
		$this->lang->load('date');
		$this->load->plugin('to_pdf');
		$this->load->helper(array('logo', 'file'));
		$this->load->library('email');
		$this->load->model('clientcontacts_model');
		$this->load->model('invoice_histories_model', '', TRUE);
		$data['page_title'] = 'invoice';

		// configure email to be sent
		$data['companyInfo'] = $this->settings_model->getCompanyInfo()->row();
		$data['company_logo'] = $this->_get_logo('_pdf', 'pdf');

		$data['row'] = $this->invoices_model->getSingleInvoice($id)->row();

		$invoiceInfo = $this->invoices_model->getSingleInvoice($id);
		if ($invoiceInfo->num_rows() == 0) {redirect('invoices/');}

		$data['client_note'] = $this->clients_model->get_client_info($data['row']->client_id)->client_notes;

		$invoice_number = $data['row']->invoice_number;

		$data['date_invoice_issued'] = formatted_invoice_date($data['row']->dateIssued);
		$data['date_invoice_due'] = formatted_invoice_date($data['row']->dateIssued, $this->settings_model->get_setting('days_payment_due'));

		$items = $this->invoices_model->getInvoiceItems($id);

		$data['items'] = $items;
		$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";

		// taxes
		$data['tax_info'] = $this->_tax_info($data['row']);

		$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '')."<br />\n";;

		if ($data['row']->amount_paid > 0)
		{
			$data['total_paid'] = $this->lang->line('invoice_amount_paid').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '')."<br />\n";;
			$data['total_outstanding'] = $this->lang->line('invoice_amount_outstanding').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax - $data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '');
		}
		else
		{
			$data['total_paid'] = '';
			$data['total_outstanding'] = '';
		}

		// create and save invoice to temp
		$html = $this->load->view('invoices/pdf', $data, TRUE);
		$invoice_localized = url_title(strtolower($this->lang->line('invoice_invoice')));

		if (pdf_create($html, $invoice_localized.'_'.$data['row']->invoice_number, FALSE))
		{
			show_error($this->lang->line('error_problem_saving'));
		}
		// @todo: get PDF generation to only happen in one place..., the pdf() function
//		$invoice_number = $this->pdf($id, FALSE);

		$recipients = $this->input->post('recipients');

		if ($recipients == '') {show_error($this->lang->line('invoice_email_no_recipient'));} // a rather rude reminder to include a recipient in case js is disabled

		$recipient_emails = '';

		foreach($recipients as $recipient)
		{
			($recipient == 1) ? $recipient_emails[] .= $from_email : $recipient_emails[] .= $this->clientcontacts_model->getContactInfo($recipient)->email;
		}

		$recipient_names = '';

		foreach($recipients as $recipient)
		{
			if ($recipient == 1)
			{
				$recipient_names[] .= $this->lang->line('invoice_you');
			}
			else
			{
				$recipient_names[] .= $this->clientcontacts_model->getContactInfo($recipient)->first_name.' '.$this->clientcontacts_model->getContactInfo($recipient)->last_name;
			}
		}

		// send emails

		if (count($recipient_emails) === 1)
		{
			$this->email->to($recipient_emails[0]);
		}
		else
		{
			$this->email->to($recipient_emails[0]);
			$this->email->cc(array_slice($recipient_emails, 1));
		}

		// should we blind copy the primary contact? 
		if ($this->input->post('primary_contact') == 'y')
		{
			$this->email->bcc($data['companyInfo']->primary_contact_email);
		}

		$email_body = $this->input->post('email_body');

		$this->email->from($data['companyInfo']->primary_contact_email, $data['companyInfo']->primary_contact);
		$this->email->subject($this->lang->line('invoice_invoice')." $invoice_number : ".$data['companyInfo']->company_name);
		$this->email->message(stripslashes($email_body));
		$this->email->attach("./invoices_temp/".$invoice_localized."_"."$invoice_number.pdf");

		// for the demo, I don't want actual emails sent out, so this provides an easy
		// override. 
		if ($this->settings_model->get_setting('demo_flag') == 'n')
		{
			$this->email->send();
		}

		$this->_delete_stored_files(); // remove saved invoice(s)

		// save this in the invoice_history
		$this->invoice_histories_model->insert_history_note($id, $email_body, $recipient_names);

		// next line for debugging
		//show_error($this->email->print_debugger());

		if ($this->input->post('isAjax') == 'true')
		{
			// for future ajax functionality, right now this is permanently set to false
		}
		else
		{
			if ($this->settings_model->get_setting('demo_flag') == 'y')
			{
				$this->session->set_flashdata('message', $this->lang->line('invoice_email_demo'));
			}
			else
			{
				$this->session->set_flashdata('message', $this->lang->line('invoice_email_success'));
			}

			redirect('invoices/view/'.$id); // send them back to the invoice view
		}
	}

	// --------------------------------------------------------------------

	function pdf($id, $output = TRUE)
	{
		$this->lang->load('date');
		$this->load->plugin('to_pdf');
		$this->load->helper('file');

		$data['page_title'] = $this->lang->line('menu_invoices');

		$invoiceInfo = $this->invoices_model->getSingleInvoice($id);

		if ($invoiceInfo->num_rows() == 0) {redirect('invoices/');}

		$data['row'] = $invoiceInfo->row();

		$data['client_note'] = $this->clients_model->get_client_info($data['row']->client_id)->client_notes;

		$data['date_invoice_issued'] = formatted_invoice_date($data['row']->dateIssued);
		$data['date_invoice_due'] = formatted_invoice_date($data['row']->dateIssued, $this->settings_model->get_setting('days_payment_due'));

		$data['companyInfo'] = $this->settings_model->getCompanyInfo()->row();
		$data['company_logo'] = $this->_get_logo('_pdf', 'pdf');

		$data['items'] = $this->invoices_model->getInvoiceItems($id);

		$data['total_no_tax'] = $this->lang->line('invoice_amount').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_notax, 2, $this->config->item('currency_decimal'), '')."<br />\n";

		// taxes
		$data['tax_info'] = $this->_tax_info($data['row']);

		$data['total_with_tax'] = $this->lang->line('invoice_total').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax, 2, $this->config->item('currency_decimal'), '')."<br />\n";;

		if ($data['row']->amount_paid > 0)
		{
			$data['total_paid'] = $this->lang->line('invoice_amount_paid').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '')."<br />\n";;
			$data['total_outstanding'] = $this->lang->line('invoice_amount_outstanding').': '.$this->settings_model->get_setting('currency_symbol').number_format($data['row']->total_with_tax - $data['row']->amount_paid, 2, $this->config->item('currency_decimal'), '');
		}
		else
		{
			$data['total_paid'] = '';
			$data['total_outstanding'] = '';
		}

		$html = $this->load->view('invoices/pdf', $data, TRUE);
		$invoice_localized = url_title(strtolower($this->lang->line('invoice_invoice')));

		if (pdf_create($html, $invoice_localized.'_'.$data['row']->invoice_number, $output))
		{
			show_error($this->lang->line('error_problem_saving'));
		}

		// if this is getting emailed, don't delete just yet
		// instead just give back the invoice number
		if ($output)
		{
			$this->_delete_stored_files();
		}
		else
		{
			return $data['row']->invoice_number;
		}
	}

	// --------------------------------------------------------------------

	/**
	  * Batch PDF
	  *
	  * This function is in here for the convenience of people who need it, but is not accessible currently
	  * via the "front end".  It is very memory intensive, and unlikely that most servers could handle it
	  * even with resetting memory and timeout options... thus, its in here for people who need it, and for
	  * me, but not currently publicly accessible.
	  */
	function batch_pdf()
	{
		$start_id = $this->uri->segment(3);
		$end_id = $this->uri->segment(4);

		if ($start_id == '' || $end_id == '')
		{
			show_error('Start and end id\'s must be passed');
		}

		$this->db->select('id');
		$this->db->where('id >= '.$start_id);
		$this->db->where('id <= '.$end_id);
		$invoice_set = $this->db->get('invoices');

		foreach($invoice_set->result() as $invoice)
		{
			echo "$invoice->id<br />";
			$this->pdf($invoice->id, FALSE);
		}
	}

	// --------------------------------------------------------------------

	function payment()
	{
		$id = (int) $this->input->post('id');
		$date_paid = $this->input->post('date_paid');
		$amount = $this->input->post('amount');
		$payment_note = substr($this->input->post('payment_note'), 0, 255);

		if (!preg_match("/(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])/", $date_paid) || !is_numeric($amount))
		{
			show_error($this->lang->line('error_date_fill'));
		}
		else
		{
			$data = array(
							'invoice_id' => $id,
							'amount_paid' => $amount,
							'date_paid' => $date_paid,
							'payment_note' => $payment_note
						);

			$this->invoices_model->payment($data);

			$this->session->set_flashdata('message', $this->lang->line('invoice_payment_success'));

			redirect('invoices/view/'.$id);
		}
	}

	// --------------------------------------------------------------------

	function delete($id)
	{
		$this->session->set_flashdata('deleteInvoice', $id);
		$data['deleteInvoice'] = $this->invoices_model->getSingleInvoice($id)->row()->invoice_number;
		$data['page_title'] = $this->lang->line('menu_delete_invoice');
		$this->load->view('invoices/delete', $data);
	}

	// --------------------------------------------------------------------

	function delete_confirmed()
	{
		$invoice_id = $this->session->flashdata('deleteInvoice');
		$this->invoices_model->delete_invoice($invoice_id);
		$this->session->set_flashdata('message', $this->lang->line('invoice_invoice_delete_success'));
		redirect('invoices/');
	}

	// --------------------------------------------------------------------

	function retrieveInvoices()
	{
		$query = $this->invoices_model->getInvoicesAJAX ($this->input->post('status'), $this->input->post('client_id'), $this->settings_model->get_setting('days_payment_due'));

		$last_retrieved_month = 0; // no month

		$invoiceResults = '{"invoices" :[';

		if ($query->num_rows() == 0)
		{
			$invoiceResults .= '{ "invoice_number" : "No results available"}, ';
		}
		else
		{
			foreach($query->result() as $row)
			{
				$invoice_date = mysql_to_unix($row->dateIssued);
				if ($last_retrieved_month != date('F', $invoice_date) && $last_retrieved_month !== 0)
				{
					$invoiceResults .= '{ "invoiceId" : "monthbreak'.date('F', $invoice_date).'" }, ';
				}

				$invoiceResults .= '{ "invoiceId" : "'.$row->id.'", "invoice_number" : "'.$row->invoice_number.'", "dateIssued" : "';
				// localized month
				$invoiceResults .= formatted_invoice_date($row->dateIssued);
				$invoiceResults .= '", "clientName" : "'.$row->name.'", "amount" : "'.number_format($row->subtotal, 2, $this->config->item('currency_decimal'), '') .'", "status" : "';

				if ($row->amount_paid >= $row->subtotal)
				{
					// paid invoices
					$invoiceResults .= $this->lang->line('invoice_closed');
				}
				elseif (mysql_to_unix($row->dateIssued) >= strtotime('-'.$this->settings_model->get_setting('days_payment_due'). ' days'))
				{
					// owing less then the overdue days amount
					$invoiceResults .= $this->lang->line('invoice_open');
				}
				else
				{
					// owing more then the overdue days amount
					$due_date = $invoice_date + ($this->settings_model->get_setting('days_payment_due') * 60*60*24); 
					$invoiceResults .= timespan($due_date, now()). ' '.$this->lang->line('invoice_overdue');
				}

				$invoiceResults .= '" }, ';
				$last_retrieved_month = date('F', $invoice_date);
			}
			$invoiceResults = rtrim($invoiceResults, ', ').']}';
			echo $invoiceResults;
		}
	}

	// --------------------------------------------------------------------

	function dateIssued($str)
	{
		if (preg_match("/(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])/", $str))
		{
			return TRUE;
		}
		else
		{
			$this->validation->set_message('dateIssued', $this->lang->line('error_date_format'));
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function _delete_stored_files()
	{
		if ($this->settings_model->get_setting('save_invoices') == "n")
		{
			delete_files("./invoices_temp/");
		}
	}

	// --------------------------------------------------------------------

	function _get_logo($target='', $context='web')
	{
		$this->load->helper('logo');
		$this->load->helper('path');

		return get_logo($this->settings_model->get_setting('logo'.$target), $context);
	}

	// --------------------------------------------------------------------

	function _tax_info($data)
	{
		$tax_info = '';

		if ($data->total_tax1 != 0)
		{
			$tax_info .= $data->tax1_desc." (".$data->tax1_rate."%): ".$this->settings_model->get_setting('currency_symbol').number_format($data->total_tax1, 2, $this->config->item('currency_decimal'), '')."<br />\n";
		}

		if ($data->total_tax2 != 0)
		{
			$tax_info .= $data->tax2_desc." (".$data->tax2_rate."%): ".$this->settings_model->get_setting('currency_symbol').number_format($data->total_tax2, 2, $this->config->item('currency_decimal'), '')."<br />\n";
		}

		return $tax_info;
	}

	// --------------------------------------------------------------------

	function _validation()
	{
		$rules['client_id'] 		= 'required|numeric';
		$rules['invoice_number'] 	= 'trim|required|htmlspecialchars|max_length[12]|alpha_dash|callback_uniqueInvoice';
		$rules['dateIssued'] 		= 'trim|htmlspecialchars|callback_dateIssued';
		$rules['invoice_note'] 		= 'trim|htmlspecialchars|max_length[2000]';
		$rules['tax1_description'] 	= 'trim|htmlspecialchars|max_length[50]';
		$rules['tax1_rate'] 		= 'trim|htmlspecialchars';
		$rules['tax2_description'] 	= 'trim|htmlspecialchars|max_length[50]';
		$rules['tax2_rate'] 		= 'trim|htmlspecialchars';
		$this->validation->set_rules($rules);

		$fields['client_id'] 		= $this->lang->line('invoice_client_id');
		$fields['invoice_number'] 	= $this->lang->line('invoice_number');
		$fields['dateIssued'] 		= $this->lang->line('invoice_date_issued');
		$fields['invoice_note'] 	= $this->lang->line('invoice_note');
		$fields['tax1_description']	= $this->settings_model->get_setting('tax1_desc');
		$fields['tax1_rate'] 		= $this->settings_model->get_setting('tax1_rate');
		$fields['tax2_description']	= $this->settings_model->get_setting('tax1_desc');
		$fields['tax2_rate'] 		= $this->settings_model->get_setting('tax2_rate');
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<span class="error">', '</span>');
	}

	// --------------------------------------------------------------------

	function _validation_edit()
	{
		$rules['client_id'] 		= 'required|numeric';
		$rules['invoice_number'] 	= 'trim|required|htmlspecialchars|max_length[50]|alpha_dash';
		$rules['dateIssued'] 		= 'trim|htmlspecialchars|callback_dateIssued';
		$rules['invoice_note'] 		= 'trim|htmlspecialchars|max_length[2000]';
		$rules['tax1_description'] 	= 'trim|htmlspecialchars|max_length[50]';
		$rules['tax1_rate'] 		= 'trim|htmlspecialchars';
		$rules['tax2_description'] 	= 'trim|htmlspecialchars|max_length[50]';
		$rules['tax2_rate'] 		= 'trim|htmlspecialchars';
		$this->validation->set_rules($rules);

		$fields['client_id'] 		= $this->lang->line('invoice_client_id');
		$fields['invoice_number'] 	= $this->lang->line('invoice_number');
		$fields['dateIssued'] 		= $this->lang->line('invoice_date_issued');
		$fields['invoice_note'] 	= $this->lang->line('invoice_note');
		$fields['tax1_description']	= $this->settings_model->get_setting('tax1_desc');
		$fields['tax1_rate'] 		= $this->settings_model->get_setting('tax1_rate');
		$fields['tax2_description']	= $this->settings_model->get_setting('tax1_desc');
		$fields['tax2_rate'] 		= $this->settings_model->get_setting('tax2_rate');
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<span class="error">', '</span>');
	}

	function uniqueInvoice()
	{
		$this->validation->set_message('uniqueInvoice', $this->lang->line('invoice_not_unique'));

		return $this->invoices_model->uniqueInvoiceNumber($this->input->post('invoice_number'));
	}
} 
?>