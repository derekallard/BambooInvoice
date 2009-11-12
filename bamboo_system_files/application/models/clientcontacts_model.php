<?php
class clientcontacts_model extends Model {

	function get_admin_contacts()
	{
		$this->db->where('client_id = 0');
		$this->db->order_by('last_name');
		return $this->db->get('clientcontacts');
	}

	// --------------------------------------------------------------------

	function addClientContact($client_id, $first_name, $last_name, $email, $phone = '', $title = '', $access_level = 0)
	{
		$contact_info = array(
							'client_id' => (int) $client_id,
							'first_name' => $first_name,
							'last_name' => $last_name,
							'email' => $email,
							'phone' => $phone,
							'title' => $title,
							'access_level' => $access_level
							);

		$this->db->insert('clientcontacts', $contact_info);

		return $this->db->insert_id();
	}

	// --------------------------------------------------------------------

	function editClientContact($id, $client_id, $first_name, $last_name, $email, $phone = '', $title = '', $access_level = 0)
	{
		$contact_info = array(
							'client_id' => (int) $client_id,
							'first_name' => $first_name,
							'last_name' => $last_name,
							'email' => $email,
							'phone' => $phone,
							'title' => $title,
							'access_level' => $access_level
							);

		$this->db->where('id', (int) $id);
		$this->db->update('clientcontacts', $contact_info);
	}

	// --------------------------------------------------------------------

	function deleteClientContact($id)
	{
		// No deleting the Admin
		if ($id === 1)
		{
			return FALSE; // Back with yee!
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->delete('clientcontacts');

			if ($this->db->affected_rows() !== 1)
			{
				return FALSE;
			}
			else
			{
				return $id;
			}
		}
	}

	// --------------------------------------------------------------------

	function getContactInfo($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('clientcontacts');

		if ($query->num_rows() == 0)
		{
			return FALSE;
		}
		else
		{
			return $query->row();
		}
	}

	// --------------------------------------------------------------------

	function password_reset($email, $random_passkey)
	{
		$this->db->where('email', $email);
		$this->db->where('access_level != 0'); // they allowed to login?
		$this->db->set('password_reset', $random_passkey);
		$this->db->update('clientcontacts');

		if ($this->db->affected_rows() != 0)
		{
			return $this->get_contact_id($email);
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function get_contact_id($email)
	{
		$this->db->where('email', $email);
		$this->db->limit(1); // nobody should have the same id... but if they do, just grab the first one
		$client = $this->db->get('clientcontacts');

		if ($client->num_rows() == 1)
		{
			return $client->row()->id;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function password_confirm($id, $passkey)
	{
		$this->db->where('id', $id);
		$this->db->set('password_reset', $passkey);
		$this->db->update('clientcontacts');

		$this->db->where('id', $id);
		$client_info = $this->db->get('clientcontacts');

		if ($client_info->num_rows() == 1)
		{
			return $client_info;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function password_change($id, $new_password)
	{
		$this->load->library('encrypt');

		$this->db->where('id', $id);
		$this->db->set('password', $this->encrypt->encode($new_password));
		$this->db->update('clientcontacts');

		$this->db->where('id', $id);
		$password = $this->db->get('clientcontacts');

		if ($password->num_rows() == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function email_change($id, $email)
	{
		$this->db->where('id', $id);
		$this->db->set('email', $email);
		$this->db->update('clientcontacts');

		$this->db->where('id', $id);
		$password = $this->db->get('clientcontacts');

		if ($password->num_rows() == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
?>