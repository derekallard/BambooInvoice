<?php

class Accounts extends MY_Controller {

	function Accounts()
	{
		parent::MY_Controller();
		$this->load->model('clientcontacts_model');
	}

	// --------------------------------------------------------------------

	function index($message = '')
	{
		$this->load->library('form_validation');

		$data['accounts'] = $this->clientcontacts_model->get_admin_contacts();

		$data['page_title'] = $this->lang->line('menu_accounts');
		$data['message'] = $message;

		$this->form_validation->set_rules('username', 'lang:login_username', 'required');
		$this->form_validation->set_rules('first_name', 'lang:login_password', 'required');
		$this->form_validation->set_rules('last_name', 'lang:login_password', 'required');
		$this->form_validation->set_rules('login_password', 'lang:login_password', 'required');
		$this->form_validation->set_rules('login_password_confirm', 'lang:login_password_confirm', 'required');

		$client_contact_validation = array(
			array(
				'field'   => 'username',
				'label'   => 'lang:login_username',
				'rules'   => 'required|max_length[127]|valid_email'
			),
			array(
				'field'   => 'first_name',
				'label'   => 'lang:clients_first_name',
				'rules'   => 'trim|htmlspecialchars|required|max_length[25]'
			),
			array(
				'field'   => 'last_name',
				'label'   => 'lang:clients_last_name',
				'rules'   => 'trim|htmlspecialchars|required|max_length[25]'
			), 
			array(
				'field'   => 'login_password',
				'label'   => 'lang:login_password',
				'rules'   => 'required|max_length[25]'
			),
			array(
				'field'   => 'login_password_confirm',
				'label'   => 'lang:login_password_confirm',
				'rules'   => 'matches[login_password]'
			),
		);

		$this->form_validation->set_rules($client_contact_validation);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('accounts/index', $data);
		}
		else
		{
			$client_id = $this->clientcontacts_model->addClientContact(
																		0, 
																		$this->input->post('first_name'), 
																		$this->input->post('last_name'), 
																		$this->input->post('username'), 
																		$this->input->post('phone'),
																		$this->input->post('title'),
																		1 // turn on login access
																	);

			// normally clients don't get passwords, so we need to manually set it now
			$this->clientcontacts_model->password_change($client_id, $this->input->post('login_password'));

			redirect('accounts');
		}
	}

	// --------------------------------------------------------------------

	function delete()
	{
		$id = ($this->input->get_post('id')) ? (int) $this->input->get_post('id') : $this->uri->segment(3);

		if ($this->clientcontacts_model->deleteClientContact($id))
		{
			$this->index($this->lang->line('accounts_admin_account_delete_success'));
		}
		else
		{
			$this->index($this->lang->line('accounts_admin_account_delete_fail'));
		}
	}

	// --------------------------------------------------------------------

	function _validation()
	{
		$rules['clientName'] 	= 'trim|required|max_length[75]|htmlspecialchars';
		$rules['website'] 		= 'trim|htmlspecialchars|max_length[150]';
		$rules['address1'] 		= 'trim|htmlspecialchars|max_length[100]';
		$rules['address2'] 		= 'trim|htmlspecialchars|max_length[100]';
		$rules['city'] 			= 'trim|htmlspecialchars|max_length[50]';
		$rules['province'] 		= 'trim|htmlspecialchars|max_length[25]';
		$rules['country'] 		= 'trim|htmlspecialchars|max_length[25]';
		$rules['postal_code'] 	= 'trim|htmlspecialchars|max_length[10]';
		$rules['tax_status'] 	= 'trim|htmlspecialchars|exact_length[1]|numeric|required';
		$this->validation->set_rules($rules);

		$fields['clientName'] 	= $this->lang->line('clients_name');
		$fields['website'] 		= $this->lang->line('clients_website');
		$fields['address1'] 	= $this->lang->line('clients_address1');
		$fields['address2'] 	= $this->lang->line('clients_address2');
		$fields['city'] 		= $this->lang->line('clients_cityt');
		$fields['province'] 	= $this->lang->line('clients_province');
		$fields['country'] 		= $this->lang->line('clients_country');
		$fields['postal_code'] 	= $this->lang->line('clients_postal');
		$fields['tax_status'] 	= $this->lang->line('invoice_tax_status');
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<span class="error">', '</span>');
	}

	// --------------------------------------------------------------------

	function _validation_client_contact()
	{
		$rules['client_id'] 	= 'trim|required|htmlspecialchars|numeric';
		$rules['first_name'] 	= 'trim|required|htmlspecialchars|max_length[25]';
		$rules['last_name'] 	= 'trim|required|htmlspecialchars|max_length[25]';
		$rules['email'] 		= 'trim|required|htmlspecialchars|max_length[127]|valid_email';
		$rules['phone'] 		= 'trim|htmlspecialchars|max_length[20]';
		$rules['title'] 		= 'trim|htmlspecialchars';
		$this->validation->set_rules($rules);

		$fields['client_id'] 	= $this->lang->line('clients_id');
		$fields['first_name'] 	= $this->lang->line('clients_first_name');
		$fields['last_name'] 	= $this->lang->line('clients_last_name');
		$fields['email'] 		= $this->lang->line('clients_email');
		$fields['phone'] 		= $this->lang->line('clients_phone');
		$fields['title'] 		= $this->lang->line('clients_title');
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('<span class="error">', '</span>');
	}
}
?>