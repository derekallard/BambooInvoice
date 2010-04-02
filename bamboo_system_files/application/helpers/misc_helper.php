<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Formats a float number to a "money" string.
 *
 * @access	public
 * @param	float Amount
 * @return	string
 */

function formatNumber($amount = 0.00, $money = FALSE)
{
	$CI =& get_instance();

	$currency_decimal = $CI->config->item('currency_decimal');

	if ($money) {
		$currency_symbol = $CI->settings_model->get_setting('currency_symbol');
	} else {
		$currency_symbol = '';
	}

	return $currency_symbol . number_format($amount, 2, $currency_decimal, '');
}
?>