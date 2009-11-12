<?php

class Credits extends MY_Controller {

	function Credits()
	{
		parent::MY_Controller();
	}

	function index()
	{
		$data['page_title'] = $this->lang->line('menu_credits');
		$this->load->view('credits/index', $data);
	}

}
?>