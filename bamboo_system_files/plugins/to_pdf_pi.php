<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Try increasing memory available, mostly for PDF generation
 */
ini_set("memory_limit","64M");

function pdf_create($html, $filename, $stream = true)
{
	require_once 'dompdf/lib/html5lib/Parser.php';
	require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'dompdf/src/Autoloader.php';
	Dompdf\Autoloader::register();
	
	use Dompdf\Dompdf;
	
	$dompdf = new Dompdf();
	$dompdf->set_paper('A4', 'portrait');
	$dompdf->load_html($html);
	$dompdf->render();
	if ($stream) {
		$dompdf->stream($filename.".pdf");
	}
	write_file("./invoices_temp/$filename.pdf", $dompdf->output());
}

function old_pdf_create($html, $filename, $stream=TRUE) 
{
	require_once(BASEPATH."plugins/dompdf/dompdf_config.inc.php"); 
//  require_once("dompdf/dompdf_config.inc.php");
	
	$dompdf = new DOMPDF();
	$dompdf->set_paper("a4", "portrait"); 
	$dompdf->load_html($html);
	$dompdf->render();
	if ($stream) {
		$dompdf->stream($filename.".pdf");
	}
	write_file("./invoices_temp/$filename.pdf", $dompdf->output());
}
?>
