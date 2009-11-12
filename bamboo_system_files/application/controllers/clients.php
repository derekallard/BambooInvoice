<?php

class Clients extends MY_Controller {

	function Clients()
	{
		parent::MY_Controller();
		$this->load->helper('date');
		$this->load->library('validation');
		$this->load->model('clients_model');
	}

	// --------------------------------------------------------------------

	function index()
	{
		$data['clientList'] = $this->clients_model->getAllClients(); // activate the option
		$data['extraHeadContent'] = "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url()."css/clients.css\" />\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"" . base_url()."js/newinvoice.js\"></script>\n";
		$data['extraHeadContent'] .= "<script type=\"text/javascript\" src=\"" . base_url()."js/clients.js\"></script>\n";

		if ($this->session->flashdata('clientEdit'))
		{
			$data['message'] = $this->lang->line('clients_edited');
			$data['extraHeadContent'] .= "<script type=\"text/javascript\">\nfunction openCurrent() {\n\tEffect.toggle ('clientInfo".$this->session->flashdata('clientEdit')."', 'Blind', {duration:'0.4'});\n}\naddEvent (window, 'load', openCurrent);\n</script>";
		}
		else
		{
			$data['message'] = $this->session->flashdata('message');
		}

		$data['total_rows'] = $this->clients_model->countAllClients();

		// Run the limited version of the query
		$data['all_clients'] = $this->clients_model->getAllClients();

		$this->_validation_client_contact(); // validation info for id, first_name, last_name, email, phone

		$data['page_title'] = $this->lang->line('menu_clients');
		$this->load->view('clients/index', $data);
	}

	// --------------------------------------------------------------------

	function newclient()
	{
		// if the client already exists, then the post var client_id will come through
		if ($this->input->post('client_id'))
		{
			$this->session->set_flashdata('clientId', $this->input->post('client_id'));
			redirect('invoices/newinvoice/');
		}
		elseif ($this->input->post('newClient'))
		{
			$this->session->set_flashdata('clientName', $this->input->post('newClient'));
		}

		$data['clientName'] = $this->input->post('newClient'); // store the name provided in a var

		/**
		* There is a bug on this page where it is passing validation when the user first loads
		* it.  As a quick workaround, I'm detecting if they came from the new invoice form with
		* the hidden form variable "newInvoice"
		*/
		$newinv = $this->input->post('newInvoice');
		/**
		* ugh... sorry
		*/

		$this->_validation(); // Load the validation rules and fields

		if ($this->validation->run() == FALSE || $newinv != '')
		{
			$data['page_title'] = $this->lang->line('clients_create_new_client');
			$this->load->view('clients/newclient', $data);
		}
		else
		{
			// capture information for inserting a new client
			$clientInfo = array(
				'name' => $this->input->post('clientName'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'),
				'postal_code' => $this->input->post('postal_code'),
				'website' => $this->input->post('website'),
				'tax_status' => $this->input->post('tax_status'),
				'tax_code' => $this->input->post('tax_code')
			);

			// make insertion, grab insert_id
			if ($this->clients_model->addClient($clientInfo))
			{
				$this->session->set_flashdata('clientId', $this->db->insert_id());
				$this->session->set_flashdata('clientContact', TRUE);
			}
			else
			{
				show_error($this->lang->line('error_problem_inserting'));
			}

			if ($this->session->flashdata('clientName'))
			{
				redirect('invoices/newinvoice/');
			}
			else
			{
				// return to clients page
				$this->session->set_flashdata('message', $this->lang->line('clients_created'));
				redirect('clients/');
			}
		}
	}

	// --------------------------------------------------------------------

	function notes($client_id)
	{
		$notes = $this->input->post('client_notes');
		$notes_submit = $this->input->post('notes_submit') ? TRUE : FALSE;

		$data['row'] = $this->clients_model->get_client_info($client_id);

		// new notes?  Update, move them on, and tell them its good
		if ($notes_submit)
		{
			$this->clients_model->updateClient($client_id, array('client_notes'=>$notes));

			$this->session->set_flashdata('clientEdit', $client_id);
			$this->session->set_flashdata('message', $this->lang->line('clients_edited'));
			redirect('clients/');
		}
		else
		{
			$data['page_title'] = $this->lang->line('clients_notes').' : '.$data['row']->name;
			$this->load->view('clients/notes', $data);
		}
	}

	// --------------------------------------------------------------------

	function edit()
	{
		$this->_validation(); // Load the validation rules and fields

		if ($this->validation->run() == FALSE)
		{
			$cid = (int) $this->input->post('id');
			$data['id'] = ($cid) ? $cid : $this->uri->segment(3);

			$data['row'] = $this->clients_model->get_client_info($data['id']);

			$data['page_title'] = $this->lang->line('clients_edit_client');
			$this->load->view('clients/edit', $data);
		}
		else
		{
			$clientInfo = array(
								'id' => (int) $this->input->post('id'),
								'name' => $this->input->post('clientName'),
								'address1' => $this->input->post('address1'),
								'address2' => $this->input->post('address2'),
								'city' => $this->input->post('city'),
								'province' => $this->input->post('province'),
								'country' => $this->input->post('country'),
								'postal_code' => $this->input->post('postal_code'),
								'website' => $this->input->post('website'),
								'tax_status' => $this->input->post('tax_status'),
								'tax_code' => $this->input->post('tax_code')
								);

			$this->clients_model->updateClient($clientInfo['id'], $clientInfo);
			$this->session->set_flashdata('clientEdit', $clientInfo['id']);
			redirect('clients/');
		}
	}

	// --------------------------------------------------------------------

	function delete($client_id)
	{
		// get number of invoices for when we ask if they are sure they want to remove this client
		$data['numInvoices'] = $this->clients_model->countClientInvoices($client_id);

		$this->session->set_flashdata('deleteClient', $client_id);
		$data['deleteClient'] = $client_id;

		$data['page_title'] = $this->lang->line('clients_delete_client');
		$this->load->view('clients/delete', $data);
	}

	// --------------------------------------------------------------------

	function delete_confirmed()
	{
		$client_id = (int) $this->session->flashdata('deleteClient');

		if ($this->clients_model->deleteClient($client_id))
		{
			$this->session->set_flashdata('message', $this->lang->line('clients_deleted'));
			redirect('clients/');
		}
		else
		{
			$this->session->set_flashdata('message', $this->lang->line('clients_deleted_error'));
			redirect('clients/');
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
		$rules['tax_code'] 		= 'max_length[75]';
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
		$fields['tax_code'] 	= $this->lang->line('settings_tax_code');
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