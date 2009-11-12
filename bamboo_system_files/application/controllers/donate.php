<?php

class Donate extends MY_Controller {

	// Most controllers use "my_controller" for auth and such, but front, changelog, credits
	// donate and help are publicly visible, and aren't extended.
	function Donate()
	{
		parent::MY_Controller();
	}

	function index()
	{
		$data['page_title'] = 'Thanks for the donation';
		$this->load->view('donate/index', $data);
	}

}
?>