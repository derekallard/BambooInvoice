<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
    Section class extension to overcome the setcookie multiple-cookies-with-same-name
    problem.
*/

class MY_Session extends CI_Session
{
    /*
        These 2 functions are strictly the same as the one in CI's Session.php.
        The only thing that changes here is the setcookie at the end.
        We need to do it manually.
    */
    function sess_destroy()
	{
		// Kill the session DB row
		if ($this->sess_use_database === TRUE AND isset($this->userdata['session_id']))
		{
			$this->CI->db->where('session_id', $this->userdata['session_id']);
			$this->CI->db->delete($this->sess_table_name);
		}

		// Kill the cookie
		$expires = "; expires=".gmdate('D, d-M-Y H:i:s \G\M\T', $this->now - 31500000);
        $path = "";
        if(strlen($this->cookie_path)) {
            $path = "; path={$this->cookie_path}";
        }
        $domain = "";
        if(strlen($this->cookie_domain)) {
            $domain = "; domain={$this->cookie_domain}";
        }
        header("Set-Cookie: {$this->sess_cookie_name}=".urlencode(addslashes(serialize(array()))).$expires.$path.$domain, true);  
	}
    
    function _set_cookie($cookie_data = NULL)
	{
		if (is_null($cookie_data))
		{
			$cookie_data = $this->userdata;
		}

		// Serialize the userdata for the cookie
		$cookie_data = $this->_serialize($cookie_data);

		if ($this->sess_encrypt_cookie == TRUE)
		{
			$cookie_data = $this->CI->encrypt->encode($cookie_data);
		}
		else
		{
			// if encryption is not used, we provide an md5 hash to prevent userside tampering
			$cookie_data = $cookie_data.md5($cookie_data.$this->encryption_key);
		}

		// Set the cookie
		$expires = "";
        if($this->sess_expiration) {
            $expires = "; expires=".gmdate('D, d-M-Y H:i:s \G\M\T', $this->sess_expiration + time());
        }
        $path = "";
        if(strlen($this->cookie_path)) {
            $path = "; path={$this->cookie_path}";
        }
        $domain = "";
        if(strlen($this->cookie_domain)) {
            $domain = "; domain={$this->cookie_domain}";
        }
        header("Set-Cookie: {$this->sess_cookie_name}=".urlencode($cookie_data).$expires.$path.$domain, true);  
	}
}