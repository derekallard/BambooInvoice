<?php
$this->load->view('header');
$this->load->view('invoices/invoice_new');
?>
<h2><?php echo $page_title;?></h2>

<?php if($message != ''):?>
	<p class="work_description error"><?php echo $message;?></p>
<?php endif;?>

<ul class="control_panel">
	<li><a href="<?php echo site_url('invoices')?>" class="root_invoices"><?php echo $this->lang->line('menu_invoices');?></a></li>
	<li><a href="<?php echo site_url('clients')?>" class="root_clients"><?php echo $this->lang->line('menu_clients');?></a></li>
	<li><a href="<?php echo site_url('reports')?>" class="root_reports"><?php echo $this->lang->line('menu_reports');?></a></li>
</ul>

<ul class="control_panel">
	<li><a href="<?php echo site_url('settings')?>" class="root_settings"><?php echo $this->lang->line('menu_settings');?></a></li>
	<li><a href="<?php echo site_url('accounts')?>" class="root_clients"><?php echo $this->lang->line('menu_accounts');?></a></li>
	<li><a href="<?php echo site_url('utilities')?>" class="root_utilities"><?php echo $this->lang->line('menu_utilities');?></a></li>
</ul>

<div class="clearer"></div>

<?php
$this->load->view('footer');
?>