<?php
class utilities_model extends Model {

	function _version_check()
	{
		// Not generally a fan of one time use variables, but in this
		// case I think it helps to keep it at the top of the controller
		$page_url = 'http://bambooinvoice.org/biversion.txt';

		$target = parse_url($page_url);

		$fp = @fsockopen($target['host'], 80, $errno, $errstr, 5);

		if (is_resource($fp))
		{
			fputs ($fp,"GET ".$page_url." HTTP/1.0\r\n" ); 
			fputs ($fp,"Host: ".$target['host'] . "\r\n" ); 
			fputs ($fp,"User-Agent: BambooInvoice/\r\n");
			fputs ($fp,"If-Modified-Since: Fri, 01 Jan 2004 12:24:04\r\n\r\n");

			$ver = '';

			while ( ! feof($fp))
			{
				$ver = trim(fgets($fp, 128));
			}

			// Let's typecast these so there's no funny business going on
			$version_available = (int)str_replace('.', '', $ver);
			$version_in_use = (int)str_replace('.', '', $this->settings_model->get_setting('bambooinvoice_version'));

			fclose($fp);

			if ($ver != '')
			{
				if ($version_available > $version_in_use)
				{
					return 'new';
				}
				else
				{
					return 'current';
				}
			}
			else
			{
				return 'undetermined';
			}
		}
		else
		{
			return 'connection_failed';
		}
	}


}
?>