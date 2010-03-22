<?php
class invoices_model extends Model {

	function invoices_model()
	{
		parent::Model();
		$this->obj =& get_instance();
	}

	// --------------------------------------------------------------------

	function addInvoice($invoice_data)
	{
		if ($this->db->insert('invoices', $invoice_data))
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	function addInvoiceItem($invoice_items)
	{
		if ($this->db->insert('invoice_items', $invoice_items))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function updateInvoice($invoice_id, $invoice_data)
	{
		$this->db->where('id', $invoice_id);

		if ($this->db->update('invoices', $invoice_data))
		{
			return $invoice_id;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function payment($invoice_data)
	{
		if ($this->db->insert('invoice_payments', $invoice_data))
		{
			return $invoice_data['invoice_id'];
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function delete_invoice($invoice_id)
	{
		$this->db->where('invoice_id', $invoice_id);
		$this->db->delete('invoice_payments'); // remove invoice payments

		$this->db->where('invoice_id', $invoice_id);
		$this->db->delete('invoice_histories'); // remove invoice_histories info

		$this->db->where('id', $invoice_id);
		$this->db->delete('invoices'); // remove invoice info

		$this->delete_invoice_items($invoice_id); // remove invoice items
	}

	// --------------------------------------------------------------------

	function delete_invoice_items($invoice_id)
	{
		$this->db->where('invoice_id', $invoice_id);
		$this->db->delete('invoice_items');
	}

	// --------------------------------------------------------------------

	function getSingleInvoice($invoice_id)
	{
		$this->db->select('invoices.*, clients.name, clients.address1, clients.address2, clients.city, clients.country, clients.province, clients.website, clients.postal_code, clients.tax_code');
		$this->db->select('(SELECT SUM('.$this->db->dbprefix('invoice_payments').'.amount_paid) FROM '.$this->db->dbprefix('invoice_payments').' WHERE '.$this->db->dbprefix('invoice_payments').'.invoice_id=' . $invoice_id . ') AS amount_paid', FALSE); 
		$this->db->select('TO_DAYS('.$this->db->dbprefix('invoices').'.dateIssued) - TO_DAYS(curdate()) AS daysOverdue', FALSE);
		$this->db->select('(SELECT SUM('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity) FROM '.$this->db->dbprefix('invoice_items').' WHERE '.$this->db->dbprefix('invoice_items').'.invoice_id=' . $invoice_id . ') AS total_notax', FALSE);
		$this->db->select('(SELECT SUM('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity * ('.$this->db->dbprefix('invoices').'.tax1_rate/100 * '.$this->db->dbprefix('invoice_items').'.taxable)) FROM '.$this->db->dbprefix('invoice_items').' WHERE '.$this->db->dbprefix('invoice_items').'.invoice_id=' . $invoice_id . ') AS total_tax1', FALSE);
		$this->db->select('(SELECT SUM('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity * ('.$this->db->dbprefix('invoices').'.tax2_rate/100 * '.$this->db->dbprefix('invoice_items').'.taxable)) FROM '.$this->db->dbprefix('invoice_items').' WHERE '.$this->db->dbprefix('invoice_items').'.invoice_id=' . $invoice_id . ') AS total_tax2', FALSE);
		$this->db->select('(SELECT SUM('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity + ROUND(('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity * ('.$this->db->dbprefix('invoices').'.tax1_rate/100 + '.$this->db->dbprefix('invoices').'.tax2_rate/100) * '.$this->db->dbprefix('invoice_items').'.taxable), 2)) FROM '.$this->db->dbprefix('invoice_items').' WHERE '.$this->db->dbprefix('invoice_items').'.invoice_id=' . $invoice_id . ') AS total_with_tax', FALSE);

		$this->db->join('clients', 'invoices.client_id = clients.id');
		$this->db->join('invoice_items', 'invoices.id = invoice_items.invoice_id', 'left');
		$this->db->join('invoice_payments', 'invoices.id = invoice_payments.invoice_id', 'left');
		$this->db->groupby('invoices.id'); 
		$this->db->where('invoices.id', $invoice_id);

		return $this->db->get('invoices');
	}

	// --------------------------------------------------------------------

	function build_short_descriptions()
	{
		$limit = ($this->config->item('short_description_characters') != '') ? $this->config->item('short_description_characters') : 50;

		$short_descriptions = array();

		$this->db->select('invoice_id, work_description', FALSE);
		$this->db->group_by('invoice_id');
		
		foreach($this->db->get('invoice_items')->result() as $short_desc)
		{
			$short_descriptions[$short_desc->invoice_id] = ($limit == 0) ? '' : '['.character_limiter($short_desc->work_description, $limit).']';
		}

		return $short_descriptions;
	}

	// --------------------------------------------------------------------

	function getInvoiceItems($invoice_id)
	{

		$this->db->where('invoice_id', $invoice_id);
		$this->db->order_by('id', 'ASC');

		$items = $this->db->get('invoice_items');

		if ($items->num_rows() > 0)
		{
			return $items;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function getInvoiceHistory($invoice_id)
	{
		$this->db->where('invoice_histories.invoice_id', $invoice_id);
		$this->db->orderby('date_sent');

		return $this->db->get('invoice_histories');
	}

	// --------------------------------------------------------------------

	function getInvoicePaymentHistory($invoice_id)
	{
		$this->db->where('invoice_id', $invoice_id);
		$this->db->orderby('date_paid');

		return $this->db->get('invoice_payments');
	}

	// --------------------------------------------------------------------

	function getInvoices($status, $days_payment_due = 30, $offset=0, $limit=100)
    {
		return $this->_getInvoices(FALSE, FALSE, $status, $days_payment_due, $offset, $limit);
	}

	// --------------------------------------------------------------------

	function getInvoicesAJAX ($status, $client_id, $days_payment_due = 30)
	{
		return $this->_getInvoices(FALSE, $client_id, $status, $days_payment_due);
	}

	// --------------------------------------------------------------------

	function _getInvoices($invoice_id, $client_id, $status, $days_payment_due = 30, $offset=0, $limit=100)
    {
		// check for any invoices first
		if ($this->db->count_all_results('invoices') < 1)
		{
			return FALSE;
		}

		if (is_numeric($invoice_id))
		{
			$this->db->where('invoices.id', $invoice_id);
		}

		if (is_numeric($client_id))
		{
			$this->db->where('client_id', $client_id);
		}
		else
		{
			$this->db->where('client_id IS NOT NULL');
		}

		if ($status == 'overdue')
		{
			$this->db->having("daysOverdue <= -$days_payment_due AND (ROUND(amount_paid, 2) < ROUND(subtotal, 2) OR amount_paid is null)", '', FALSE);
		}
		elseif ($status == 'open')
		{
			$this->db->having("(ROUND(amount_paid, 2) < ROUND(subtotal, 2) or amount_paid is null)", '', FALSE);
		}
		elseif ($status == 'closed')
		{
			$this->db->having('ROUND(amount_paid, 2) >= ROUND(subtotal, 2)', '', FALSE);
		}

		$this->db->select('invoices.*, clients.name');
		$this->db->select('(SELECT SUM(amount_paid) FROM '.$this->db->dbprefix('invoice_payments').' WHERE invoice_id='.$this->db->dbprefix('invoices').'.id) AS amount_paid', FALSE); 
		$this->db->select('TO_DAYS('.$this->db->dbprefix('invoices').'.dateIssued) - TO_DAYS(curdate()) AS daysOverdue', FALSE);
		$this->db->select('ROUND((SELECT SUM('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity + ('.$this->db->dbprefix('invoice_items').'.amount * '.$this->db->dbprefix('invoice_items').'.quantity * ('.$this->db->dbprefix('invoices').'.tax1_rate/100 + '.$this->db->dbprefix('invoices').'.tax2_rate/100) * '.$this->db->dbprefix('invoice_items').'.taxable)) FROM '.$this->db->dbprefix('invoice_items').' WHERE '.$this->db->dbprefix('invoice_items').'.invoice_id='.$this->db->dbprefix('invoices').'.id), 2) AS subtotal', FALSE);

		$this->db->join('clients', 'invoices.client_id = clients.id');
		$this->db->join('invoice_items', 'invoices.id = invoice_items.invoice_id', 'left');
		$this->db->join('invoice_payments', 'invoices.id = invoice_payments.invoice_id', 'left');

		$this->db->order_by('dateIssued desc, invoice_number desc');
		$this->db->groupby('invoices.id'); 
		$this->db->offset($offset);
		$this->db->limit($limit);

		return $this->db->get('invoices');
	}

	// --------------------------------------------------------------------

	function lastInvoiceNumber($client_id)
	{
		if ($this->config->item('unique_invoice_per_client') === TRUE)
		{
			$this->db->where('client_id', $client_id);
		}

		$this->db->where('invoice_number != ""');
		$this->db->orderby("id", "desc"); 
		$this->db->limit(1);

		$query = $this->db->get('invoices');

		if ($query->num_rows() > 0)
		{
			return $query->row()->invoice_number;
		}
		else
		{
			return '0';
		}
	}

	// --------------------------------------------------------------------

	function uniqueInvoiceNumber($invoice_number)
	{
		$this->db->where('invoice_number', $invoice_number);

		$query = $this->db->get('invoices');

		$num_rows = $query->num_rows();

		if ($num_rows == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function uniqueInvoiceNumberEdit($invoice_number, $invoice_id)
	{
		$this->db->where('invoice_number', $invoice_number);
		$this->db->where('id != ', $invoice_id);
		$query = $this->db->get('invoices');

		$num_rows = $query->num_rows();

		if ($num_rows == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}}
?>