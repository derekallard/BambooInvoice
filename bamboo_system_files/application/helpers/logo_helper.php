<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_logo($logo = 'logo.jpg', $context = 'web')
{
	$CI =& get_instance();

	// if they don't have a logo in the database, just default to logo.jpg
	if ($logo == '0' || $logo == NULL)
	{
		$logo = 'logo.jpg';
	}

	if ($context == 'web' OR $CI->config->item('logo_base_url') === TRUE)
	{
		$path = base_url().'img/logo/';
	}
	else
	{
		$path = set_realpath('./img/logo/');
	}

	return "<img src='{$path}{$logo}' />";
}
