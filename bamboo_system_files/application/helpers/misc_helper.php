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
	$currency_thousands = $CI->config->item('currency_thousands');

	if ($money) {
		$currency_symbol = $CI->settings_model->get_setting('currency_symbol');

		if ($CI->settings_model->get_setting('currency_symbol_after') == 'y') {
			$currency_symbol_a = $currency_symbol;
			$currency_symbol_b = '';
		} else {
			$currency_symbol_b = $currency_symbol;
			$currency_symbol_a = '';
		}
	} else {
		$currency_symbol_b = $currency_symbol_a = '';
	}

	return $currency_symbol_b . number_format($amount, 2, $currency_decimal, $currency_thousands) . $currency_symbol_a;
}
?>