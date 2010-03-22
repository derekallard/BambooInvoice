<?php

class Login extends MY_Controller {

	function Login()
	{
		parent::MY_Controller();
		$this->load->model('settings_model', '', TRUE);
		$this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
	}

	// --------------------------------------------------------------------

	function index()
	{
		$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"". base_url()."js/login.js\"></script>\n";
		$username = $this->input->post('username');

		$this->load->helper('directory');

		$data['languages'] = array();
		// <p><question_mark php echo form_dropdown('language', $languages, $this->config->item('language')) question_mark></p>
		
		foreach(directory_map(APPPATH.'language') as $key => $value)
		{
			$data['languages'][$key] = ucfirst($key);
		}

		if (isset($username) && $username != '')
		{
			$this->site_sentry->login_routine();
		}
		else
		{
			$data['page_title'] = $this->lang->line('login_login');
			$this->load->view('login/index', $data);
		}
	}

	// --------------------------------------------------------------------

	function login_fail()
	{
			$data['page_title'] = $this->lang->line('login_login');
			$this->load->view('login/login_fail',$data);
	}

	// --------------------------------------------------------------------

	function forgot_password()
	{
		$this->load->model('clientcontacts_model');
		$this->load->library('validation');

		if ($this->site_sentry->is_logged_in())
		{
			redirect ('logout');
		}

		$data['page_title'] = $this->lang->line('login_forgot_password');

		$rules['email'] = "required|valid_email";

		$this->validation->set_rules($rules);

		$this->validation->set_error_delimiters('<p class="error">', '</p>');

		$fields['email'] = $this->lang->line('clients_email');

		$this->validation->set_fields($fields);

		if ($this->validation->run() == FALSE)
		{
			$this->load->view('login/login_forgotpassword', $data);
		}
		else
		{
			$email = $this->input->post('email');
			$random_passkey = random_string('alnum', 12);

			$customer_id = $this->clientcontacts_model->password_reset($email, $random_passkey);

			// we won't actually send this if its just the online demo, or there is no customer id returned
			if ($customer_id AND $this->settings_model->get_setting('demo_flag') != 'y')
			{
				$email_body = '<p>' . $this->lang->line('login_password_reset_email1') . '.</p>';
				$email_body .= '<p>' . $this->lang->line('login_password_reset_email2') . ' ' . anchor("login/confirm_password/{$customer_id}/{$random_passkey}", site_url("login/confirm_password/{$customer_id}/{$random_passkey}")) . ".</p>";
				$email_body .= '<p>' . $this->lang->line('login_password_reset_email3') . '</p>';
				$email_body .= '<p>-----------------------<br />' . $this->input->ip_address() . '</p>';

				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$senderInfo = $this->settings_model->getCompanyInfo()->row();
				$this->email->to($email);
				$this->email->from($this->settings_model->get_setting('primary_contact_email'), $this->settings_model->get_setting('primary_contact'));
				$this->email->subject($this->lang->line('login_password_reset_title'));
				$this->email->message($email_body);
				$this->email->send();
			}

			$data['msg'] = $this->lang->line('login_password_sent') . ' ' . $email;

			$this->load->view('login/login_password_message', $data);
		}
	}

	// --------------------------------------------------------------------

	function confirm_password()
	{
		$this->load->model('clientcontacts_model', '', TRUE);
		$customer_id = (int) $this->uri->segment(3);
		$passkey = $this->uri->segment(4);

		$email = $this->clientcontacts_model->password_confirm($customer_id, $passkey)->row()->email;

		$data['page_title'] = $this->lang->line('login_forgot_password');

		if ($email != FALSE)
		{
			$new_password = random_string('alnum', 12);

			// if this is the demo, disable password resetting
			if ($this->settings_model->get_setting('demo_flag') == 'y')
			{
				$data['msg'] = $this->lang->line('login_password_reset_disabled');
			}
			else
			{
				if ($this->clientcontacts_model->password_change($customer_id, $new_password))
				{
					$email_body = '<p>' . $this->lang->line('login_password_email1') . " <em>$new_password</em> " . $this->lang->line('login_password_email2') . ' ' . anchor('login', $this->lang->line('login_login')) . '.</p>';

					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->to($email);
					$this->email->from($this->settings_model->get_setting('primary_contact_email'), $this->settings_model->get_setting('primary_contact'));
					$this->email->subject($this->lang->line('login_password_reset_title'));
					$this->email->message($email_body);
					$this->email->send();

					$data['msg'] = $this->lang->line('login_password_success');
				}
				else
				{
					$data['msg'] = $this->lang->line('login_password_fail');
				}
			}
		}
		else
		{
			$data['msg'] = $this->lang->line('login_password_reset_unable');
		}

		$this->load->view('login/login_password_message', $data);
	}

	// --------------------------------------------------------------------

	/**
	  * This function is here for testing and support purposes.  It doesn't actually get 
	  * used in Bamboo. It just provides a convenient way of forcing the admin password.
	  * If you do use it, don't forget to re-comment it out, as otherwise it represents
	  * a MAJOR security breach.
	  */ 

	/*
	function force_demo_password()
	{
		$this->load->model('clientcontacts_model');
		$this->clientcontacts_model->password_change(1, $this->uri->segment(3, 'demo'));
		$data['msg'] = 'Password reset to ' . $this->uri->segment(3, 'demo') . '. Now comment out or delete the function again.<br />' . anchor('login', 'login');
		$data['page_title'] = $this->lang->line('login_forgot_password');
		$this->load->view('login/login_password_message', $data);
	}
	*/
}
 
?>