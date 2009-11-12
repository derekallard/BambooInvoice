<?php

class Help extends MY_Controller {

	function Help()
	{
		parent::MY_Controller();
	}

	function index()
	{
		$this->output->cache(5);
		$data['page_title'] = $this->lang->line('menu_help');
		$this->load->view('help/index', $data);
	}

}
?>