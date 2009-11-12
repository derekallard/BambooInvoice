<?php
$this->load->view('header');
$this->load->view('invoices/invoice_new');
?>

<h2><?php echo $page_title;?></h2>

<?php
$this->load->view('invoices/invoice_table');
$this->load->view('footer');
?>