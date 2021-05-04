<?php
class settings_model extends Model {

	function getCompanyInfo()
	{
		return $this->db->get('settings');
	}

	// --------------------------------------------------------------------

	function get_setting($field)
	{
		$row = $this->db->get('settings');

		if ($row->num_rows() === 1)
		{
			return $row->row()->$field;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function update_settings($data = array(), $id = 1)
	{
		if (count($data) == 0)
		{
			return TRUE; // no changes, just return a success
		}

		$this->db->where('id', $id);

		return $this->db->update('settings', $data);
	}

}
?>