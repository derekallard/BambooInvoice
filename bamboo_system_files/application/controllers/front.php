<?php

class Front extends MY_Controller {

	function Front()
	{
		parent::MY_Controller();
	}

	// --------------------------------------------------------------------

	function index()
	{
		$this->load->model('clients_model');

		if ($this->db->conn_id == "")
		{
			show_error("BambooInvoice could not connect to your database with the information provided in bamboo_system_files/application/config/database.php");
		}

		if ( ! $this->db->table_exists('settings'))
		{
			// The system isn't installed yet.  If it isn't then this will kick in, and ask the user to install
			// location redirecting would be faster... but isn't 100% reliable across all servers
			redirect('/install/not_installed', 'refresh');
			exit;
		}

		if ($this->site_sentry->is_logged_in()) 
		{
			$data['page_title'] = $this->lang->line('menu_root_system');
			$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"" . base_url()."js/newinvoice.js\"></script>\n";

			// for the new invoice generation dropdown
			$data['clientList'] = $this->clients_model->getAllClients();

			// is there a new version available?
			$this->load->model('utilities_model');
			$status = $this->utilities_model->_version_check();

			if ($status == 'new')
			{
				$this->load->helper('url');
				$data['message'] = $this->lang->line('utilities_new_version_available') . anchor('http://bambooinvoice.org', 'http://bambooinvoice.org');
			}
			else
			{
				$data['message'] = '';
			}

			$this->load->view('index/index_logged_in', $data);
		}
		else
		{
			if ($this->settings_model->get_setting('demo_flag') == 'y')
			{
				// for the demo, load the page that describes BambooInvoice, but if 
				// this isn't the demo, then move the user to the login page
				$data['page_title'] = $this->lang->line('menu_catchphrase_nobreak');
				$this->load->view('index/index_logged_out', $data);
			}
			else
			{
				redirect('login');
			}
		}
	}

}
?>