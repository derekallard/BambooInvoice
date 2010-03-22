<?php

class Changelog extends MY_Controller {

	function Changelog()
	{
		parent::MY_Controller();
	}

	function index()
	{
		$data['page_title'] = $this->lang->line('menu_changelog');
		$this->load->view('changelog/index', $data);
	}

}
?>