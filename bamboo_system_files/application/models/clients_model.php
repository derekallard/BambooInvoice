<?php
class clients_model extends Model {

	function countAllClients()
	{
		return $this->db->count_all('clients');
	}

	// --------------------------------------------------------------------

	function countClientInvoices($client_id)
	{
		$this->db->where('client_id', $client_id);

		return $this->db->count_all_results('invoices');
	}

	// --------------------------------------------------------------------

	function getAllClients()
	{
		// we need an array of company names to associate each contact with its company
//		$companies = array();
//		foreach($this->clients_model->getAllClients()->result() as $company)
//		{
//			$companies[$company->id] = $company->name;
//		}

		$this->db->orderby('name', 'asc');

		return $this->db->get('clients');
	}

	// --------------------------------------------------------------------

	function get_client_info($id, $fields = '*')
	{
		$this->db->select($fields);
		$this->db->where('id', $id);

		return $this->db->get('clients')->row();
	}

	// --------------------------------------------------------------------

	function getClientContacts($id)
	{
		$this->db->where('client_id', $id);

		return $this->db->get('clientcontacts');
	}

	// --------------------------------------------------------------------

	function addClient($clientInfo)
	{
		$this->db->insert('clients', $clientInfo);

		return TRUE;
	}

	// --------------------------------------------------------------------

	function updateClient($client_id, $clientInfo)
	{
		$this->db->where('id', $client_id);
		$this->db->update('clients', $clientInfo);

		return TRUE;
	}

	// --------------------------------------------------------------------

	function deleteClient($client_id)
	{
		// Don't allow admins to be deleted this way
		if ($client_id === 0)
		{
			return FALSE;
		}
		else
		{
			// get all invoices related to this client
			$this->db->select('id');
			$this->db->where('client_id', $client_id);
			$result = $this->db->get('invoices');

			$invoice_id_array = array(0);

			foreach ($result->result() as $invoice_id)
			{
				$invoice_id_array[] = $invoice_id->id;
			}

			// There are 5 tables of data to delete from in order to completely
			// clear out record of this client.

			$this->db->where_in('invoice_id', $invoice_id_array);
			$this->db->delete('invoice_histories');

			$this->db->where_in('invoice_id', $invoice_id_array);
			$this->db->delete('invoice_payments');

			$this->db->where('client_id', $client_id);
			$this->db->delete('clientcontacts'); 

			$this->db->where('id', $client_id);
			$this->db->delete('clients');

			$this->db->where('client_id', $client_id);
			$this->db->delete('invoices'); 

			return TRUE;
		}
	}

}
?>