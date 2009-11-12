<h2><?php echo $page_title;?></h2>
<p><?php echo $this->lang->line('invoice_premenently_delete') . ' ' . $deleteInvoice . '. ' . $this->lang->line('invoice_sure_delete');?></p>
<ul id="logout_list">
	<li><?php echo anchor('invoices/delete_confirmed', $this->lang->line('menu_delete_invoice'));?></li>
	<li><a href="<?php echo site_url('invoices/view/' . $deleteInvoice)?>" class="lbAction" rel="deactivate"><?php echo $this->lang->line('actions_cancel');?></a></li>
</ul>