<?php

class Clientcontacts extends MY_Controller {

	function Clientcontacts()
	{
		parent::MY_Controller();
		$this->load->library('validation');
		$this->load->helper('ajax');
		$this->load->model('clientcontacts_model');
	}

	// --------------------------------------------------------------------

	function index()
	{
		/**
		 * This controller is only used from the clients controller, and so is called directly.
		 * If anyone access it directly, let's just move them over to clients.
		 */
		redirect('clients/');
	}

	// --------------------------------------------------------------------

	function add()
	{
		$this->_validation_client_contact(); // validation info for id, first_name, last_name, email, phone

		if ($this->validation->run() == FALSE)
		{
			if (isAjax())
			{
				echo $this->lang->line('clients_new_contact_fail');
			}
			else
			{
				$cid = (int) $this->input->post('client_id');
				$data['client_id'] = ($cid) ? $cid : $this->uri->segment(3);
				$data['page_title'] = $this->lang->line('clients_add_contact');
				$this->load->view('clientcontacts/add', $data);
			}
		}
		else
		{
			$client_id = $this->clientcontacts_model->addClientContact(
																		$this->input->post('client_id'), 
																		$this->input->post('first_name'), 
																		$this->input->post('last_name'), 
																		$this->input->post('email'), 
																		$this->input->post('phone'),
																		$this->input->post('title')
																	);

			if (isAjax())
			{
				echo $client_id;
			}
			else
			{
				$this->session->set_flashdata('clientContact', (int) $this->input->post('client_id'));
				redirect('clients/');
			}
		}
	}

	// --------------------------------------------------------------------

	function edit()
	{
		$rules['id'] = 'trim|required|numeric';
		$fields['id'] = 'id';

		$this->_validation_client_contact(); // validation info for first_name, last_name, email, phone

		$data['id'] = (int) $this->uri->segment(3, $this->input->post('id'));

		if ($this->validation->run() == FALSE)
		{
			$data['clientContactData'] = $this->clientcontacts_model->getContactInfo($data['id']);
			$data['page_title'] = $this->lang->line('clients_edit_contact');
			$this->load->view('clientcontacts/edit', $data);
		}
		else
		{
			$this->clientcontacts_model->editClientContact(
															$this->input->post('id'), 
															$this->input->post('client_id'),
															$this->input->post('first_name'),
															$this->input->post('last_name'), 
															$this->input->post('email'), 
															$this->input->post('phone'),
															$this->input->post('title')
														);

			$this->session->set_flashdata('message', $this->lang->line('clients_edited_contact_info'));
			$this->session->set_flashdata('clientEdit', $this->input->post('client_id'));
			redirect('clients/');
		}
	}

	// --------------------------------------------------------------------

	function delete()
	{
		$id = ($this->input->post('id')) ? (int) $this->input->post('id') : $this->uri->segment(3);

		if ($this->clientcontacts_model->deleteClientContact($id))
		{
			if (isAjax())
			{
				return $id;
			}
			else
			{
				$this->session->set_flashdata('clientContact', $id);
				redirect('clients/');
			}
		}
		else
		{
			$this->session->set_flashdata('message', $this->lang->line('clients_contact_delete_fail'));
			redirect('clients/');
		}
	}

	// --------------------------------------------------------------------

	function _validation_client_contact()
	{
		$rules['client_id'] 	= 'trim|required|numeric';
		$rules['first_name'] 	= 'trim|required|max_length[25]';
		$rules['last_name'] 	= 'trim|required|max_length[25]';
		$rules['email'] 		= 'trim|required|max_length[127]|valid_email';
		$rules['phone'] 		= 'trim|max_length[20]';
		$rules['title'] 		= 'trim';
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