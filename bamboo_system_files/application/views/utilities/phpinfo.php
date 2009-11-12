<?php
$this->load->view('header');
?>
<h2><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<?php echo $output;?>

<?php
$this->load->view('footer');
?>