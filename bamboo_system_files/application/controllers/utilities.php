<?php

class Utilities extends MY_Controller {

	function Utilities()
	{
		parent::MY_Controller();
	}

	// --------------------------------------------------------------------

	function index()
	{
		$data['page_title'] = $this->lang->line('menu_utilities');
		$this->load->view('utilities/index', $data);
	}

	// --------------------------------------------------------------------

	function version_check()
	{
		$data['page_title'] = $this->lang->line('utilities_new_version_check');

		$this->load->model('utilities_model');

		$status = $this->utilities_model->_version_check();

		if ($status == 'new')
		{
			$data['message'] = $this->lang->line('utilities_new_version_available') . anchor('http://bambooinvoice.org', 'http://bambooinvoice.org');
		}
		elseif ($status == 'current')
		{
			$data['message'] = $this->lang->line('utilities_up_to_date');
		}
		elseif ($status == 'failed')
		{
			$data['message'] = $this->lang->line('utilities_connection_failed');
		}
		else
		{
			$data['message'] = $this->lang->line('utilities_version_undetermined');
		}

		$this->load->view('utilities/version_check', $data);
	}

	// --------------------------------------------------------------------

	function database_backup()
	{
		if ($this->settings_model->get_setting('demo_flag') == 'y')
		{
			$data['page_title'] = $this->lang->line('utilities_phpinfo_not_available');
			$data['output'] = '<p>' . $this->lang->line('utilities_phpinfo_not_available') . '</p>';
			$this->load->view('utilities/phpinfo', $data);
		}
		else
		{
			$this->load->dbutil();
			$this->load->helper(array('file', 'download'));

			$filename = ($this->config->item('download_filename_prefix') != '') ? $this->config->item('download_filename_prefix') : 'bambooinvoice';

			$prefs = array(
							'format' 	=> 'zip',
							'filename' 	=> $filename.'_'.date ("Ymd").'.zip',
						);

			// Backup your entire database and assign it to a variable
			$backup =& $this->dbutil->backup($prefs);
			write_file('invoices_temp/' . $prefs['filename'], $backup);
			force_download($prefs['filename'], $backup);
		}
	}

	// --------------------------------------------------------------------

	function export_xml($status = '', $client = '')
	{
		$this->_export($status, $client);
	}

	// --------------------------------------------------------------------

	function export_excel($status = '', $client = '')
	{
		$this->_export($status, $client, 'excel');
	}

	// --------------------------------------------------------------------

	function _export($status, $client, $type = 'xml')
	{
		$this->load->model('invoices_model');

		// this function does both excel and xml exporting
		// for convenience, let's just load both plugins
		$this->load->plugin('to_excel');
		$this->load->plugin('to_xml');

		$invoices = $this->invoices_model->getInvoicesAJAX($status, $client, $this->settings_model->get_setting('days_payment_due'));

		if ($invoices->num_rows() > 0)
		{
			if ($type == 'excel')
			{
				to_excel($invoices, 'invoices');
			}
			else
			{
				to_xml($invoices, 'invoices');
			}
		}
		else
		{
			show_error($this->lang->line('error_selection'));
		}
	}

	// --------------------------------------------------------------------

	function php_info()
	{
		$data['page_title'] = $this->lang->line('utilities_phpinfo');

		// We use this conditional only for demo installs. It
		// prevents users from viewing PHPInfo on the live server

		if ($this->settings_model->get_setting('demo_flag') == 'y')
		{
			$data['output'] = '<p>' . $this->lang->line('utilities_phpinfo_not_available') . '</p>';
		}
		else
		{
			ob_start();

			phpinfo();

			$buffer = ob_get_contents();

			ob_end_clean();

			// OK, the output from PHPinfo is ugly and messy, but I'm not going
			// through it to clear everything out.  This is how ExpressionEngine 
			// cleans up PHPinfo, and I'm happy to blatently stea... 
			// erm... "resuse" this function.

			$output = (preg_match("/<body.*?".">(.*)<\/body>/is", $buffer, $match)) ? $match['1'] : $buffer;
			$output = preg_replace("/width\=\".*?\"/", "width=\"100%\"", $output);
			$output = preg_replace("/<hr.*?>/", "<br />", $output); // <?
			$output = preg_replace("/<a href=\"http:\/\/www.php.net\/\">.*?<\/a>/", "", $output);
			$output = preg_replace("/<a href=\"http:\/\/www.zend.com\/\">.*?<\/a>/", "", $output);
			$output = preg_replace("/<a.*?<\/a>/", "", $output);// <?
			$output = preg_replace("/<th(.*?)>/", "<th \\1 align=\"left\" class=\"tableHeading\">", $output);
			$output = preg_replace("/<tr(.*?).*?".">/", "<tr \\1>\n", $output);
			$output = preg_replace("/<td.*?".">/", "<td valign=\"top\" class=\"tableCellOne\">", $output);
			$output = preg_replace("/cellpadding=\".*?\"/", "cellpadding=\"2\"", $output);
			$output = preg_replace("/cellspacing=\".*?\"/", "", $output);
			$output = preg_replace("/<h2 align=\"center\">PHP License<\/h2>.*?<\/table>/si", "", $output);
			$output = preg_replace("/ align=\"center\"/", "", $output);
			$output = preg_replace("/<table(.*?)bgcolor=\".*?\">/", "\n\n<table\\1>", $output);
			$output = preg_replace("/<table(.*?)>/", "\n\n<table\\1 class=\"tableBorderNoBot\" cellspacing=\"0\">", $output);
			$output = preg_replace("/<h2>PHP License.*?<\/table>/is", "", $output);
			$output = preg_replace("/<br \/>\n*<br \/>/is", "", $output);
			$output = str_replace("<h1></h1>", "", $output);
			$output = str_replace("<h2></h2>", "", $output);

			$data['output'] = $output;
		}

		$this->load->view('utilities/phpinfo', $data);
	}
}
?>