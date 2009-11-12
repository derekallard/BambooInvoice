<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
  * Formatted Invoice Date
  *
  * Returns a localized date when fed "YYYY-MM-DD"
  *
  * @access	public
  * @param	string	The date to read (YYYY-MM-DD)
  * @param	int		The number of days in the future
  * @return	integer
  */ 
function formatted_invoice_date($date = '', $days_from_now = 0)
{
	if ($date == '')
	{
		return ''; // if there is no date given, just return nothing
	}

	$CI =& get_instance();

	$date = mysql_to_unix($date) + ($days_from_now *60*60*24);

	if ($CI->config->item('invoice_date_format') == 'day_month_year')
	{
		// 1 January 2009
		$formatted_date = date('j ', $date) . $CI->lang->line('cal_' . strtolower(date('F', $date))) . date(' Y', $date);
	}
	else
	{
		// Januray 1, 2009
		$formatted_date = $CI->lang->line('cal_' . strtolower(date('F', $date))) . date(' j, Y', $date);
	}


	return $formatted_date;
}

// ------------------------------------------------------------------------

/**
  * Convert MySQL's DATE (YYYY-MM-DD) or DATETIME (YYYY-MM-DD hh:mm:ss) to timestamp
  *
  * Returns the timestamp equivalent of a given DATE/DATETIME
  *
  * @todo add regex to validate given datetime
  * @author Clemens Kofler <clemens.kofler@chello.at>
  * @access	 public
  * @return	 integer
  */
function mysqldatetime_to_timestamp($datetime = "")
{
	// function is only applicable for valid MySQL DATETIME (19 characters) and DATE (10 characters)
	$l = strlen($datetime);

	if ( ! ($l == 10 || $l == 19))
	{
		return FALSE;
	}

	$date = $datetime;
	$hours = 0;
	$minutes = 0;
	$seconds = 0;

	// DATETIME only
	if ($l == 19)
	{
		list($date, $time) = explode(" ", $datetime);
		list($hours, $minutes, $seconds) = explode(":", $time);
	}

	list($year, $month, $day) = explode("-", $date);

	return mktime($hours, $minutes, $seconds, $month, $day, $year);
}


// ------------------------------------------------------------------------

/**
  * Get "now" time
  *
  * Returns time() or its GMT equivalent based on the config file preference
  *
  * @access	public
  * @return	integer
  */ 
function now()
{
	$CI =& get_instance();

	if (strtolower($CI->config->item('time_reference')) == 'gmt')
	{
		$now = time();
		$system_time = mktime(gmdate("H", $now), gmdate("i", $now), gmdate("s", $now), gmdate("m", $now), gmdate("d", $now), gmdate("Y", $now));

		if (strlen($system_time) < 10)
		{
			$system_time = time();
			log_message('error', 'The Date class could not set a proper GMT timestamp so the local time() value was used.');
		}

		return $system_time;
	}
	else
	{
		return time();
	}
}

/**
  * Timespan
  *
  * Returns a span of seconds in this format:
  *	10 days 14 hours 36 minutes 47 seconds
  *
  * @access	public
  * @param	integer a number of seconds
  * @param	integer Unix timestamp
  * @return	integer
  */ 
function timespan($seconds = 1, $time = '')
{
	$CI =& get_instance();
	$CI->lang->load('date');

	if ( ! is_numeric($seconds))
	{
		$seconds = 1;
	}

	if ( ! is_numeric($time))
	{
		$time = time();
	}

	if ($time <= $seconds)
	{
		$seconds = 1;
	}
	else
	{
		$seconds = $time - $seconds;
	}

	$str = '';
	$years = floor($seconds / 31536000);

	if ($years > 0)
	{
		$str .= $years.' '.$CI->lang->line((($years > 1) ? 'date_years' : 'date_year')).', ';
	}

	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);

	if ($years > 0 OR $months > 0)
	{
		if ($months > 0)
		{
			$str .= $months.' '.$CI->lang->line((($months	> 1) ? 'date_months' : 'date_month')).', ';
		}

		$seconds -= $months * 2628000;
	}

	$weeks = floor($seconds / 604800);

	if ($years > 0 OR $months > 0 OR $weeks > 0)
	{
		if ($weeks > 0)
		{
			$str .= $weeks.' '.$CI->lang->line((($weeks > 1) ? 'date_weeks' : 'date_week')).', ';
		}

		$seconds -= $weeks * 604800;
	}

	$days = floor($seconds / 86400);

	if ($months > 0 OR $weeks > 0 OR $days > 0)
	{
		if ($days > 0)
		{
			$str .= $days.' '.$CI->lang->line((($days	> 1) ? 'date_days' : 'date_day')).', ';
		}

		$seconds -= $days * 86400;
	}

	return substr(trim($str), 0, -1);
}

// ------------------------------------------------------------------------

/**
 * Converts a MySQL Timestamp to Unix
 *
 * @access	public
 * @param	integer Unix timestamp
 * @return	integer
 */

function mysql_to_unix($time = '')
{
	// We'll remove certain characters for backward compatibility
	// since the formatting changed with MySQL 4.1
	// YYYY-MM-DD HH:MM:SS

	$time = str_replace('-', '', $time);
	$time = str_replace(':', '', $time);
	$time = str_replace(' ', '', $time);

	// YYYYMMDDHHMMSS
	return	mktime(
					substr($time, 8, 2),
					substr($time, 10, 2),
					substr($time, 12, 2),
					substr($time, 4, 2),
					substr($time, 6, 2),
					substr($time, 0, 4)
					);
}

?>