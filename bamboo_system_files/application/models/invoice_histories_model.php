<?php
class invoice_histories_model extends Model {

	/*
	 * Insert History / Notes
	 *
	 * @access	public
	 * @param	int		Invoice Id
	 * @param	str		Text for the history
	 * @param	mixed	Whom the history was sent to
	 * @param	int		Contact Type. 1 is for email, 2 is for admin note entry
	 * @return	int		Invoice Id
	 */
	function insert_history_note($invoice_id, $history_body, $clientcontacts_id = '', $contact_type = 1)
	{
		$historyInfo = array(
							'invoice_id' => $invoice_id,
							'clientcontacts_id' => serialize($clientcontacts_id),
							'date_sent' => date("Y-m-d"),
							'contact_type' => $contact_type,
							'email_body' => $history_body
							);

		$this->db->insert('invoice_histories', $historyInfo);

		return $invoice_id;
	}

	// --------------------------------------------------------------------

	function insert_note($invoice_id, $note)
	{
		$this->insert_history_note($invoice_id, $note, '', 2);
	}
}
?>