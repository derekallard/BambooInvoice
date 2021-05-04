<?php
$this->load->view('header');
?>
	<p class="error"><?php echo $this->lang->line('invoice_problem_creating');?></p>
	<p><?php echo $this->lang->line('invoice_you_may_now') . ' ' . anchor('invoices', $this->lang->line('invoice_return_invoice_view'));?>.</p>
<?php
$this->load->view('footer');
?>