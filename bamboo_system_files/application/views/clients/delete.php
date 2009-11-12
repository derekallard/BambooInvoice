<h2><?php echo $page_title;?></h2>
<p><?php echo $this->lang->line('clients_client_has') . $numInvoices . ' ' . $this->lang->line('clients_assigned_to_them');?></p>
<ul id="logout_list">
	<li><a href="<?php echo site_url('clients/delete_confirmed')?>"><?php echo $this->lang->line('clients_delete_all_invoices');?></a></li>
	<li><a href="<?php echo site_url('clients')?>" id="logout" class="lbAction" rel="deactivate"><?php echo $this->lang->line('actions_cancel');?></a></li>
</ul>