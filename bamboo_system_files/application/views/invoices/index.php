<?php
Header('Cache-Control: no-cache');
Header('Pragma: no-cache');
$this->load->view('header');

if ($message != '')
{
	echo '<p class="error">'.$message.'</p>';
}



$this->load->view('invoices/invoice_new');
?>
<h2><?php echo $page_title;?></h2>

	<?php echo form_open('#', array('id' => 'filter', 'class' => 'work_description'));?>

		<p class="error" id="overduenotice"><?php echo $this->lang->line('invoice_there_are_currently') . ' ' . $overdue_count . ' ' . $this->lang->line('invoice_overdue_invoices');?>.</p>
		<p>
			<label for="overdue">
			<input type="radio" name="status" id="overdue" value="overdue" class="noborder" onclick="getInvoices();" />
			<?php echo $this->lang->line('invoice_overdue');?></label>

			<label for="open">
			<input type="radio" name="status" id="open" value="open" class="noborder" onclick="getInvoices();" checked="checked" />
			<?php echo $this->lang->line('invoice_open');?></label>

			<label for="closed">
			<input type="radio" name="status" id="closed" value="closed" class="noborder" onclick="getInvoices();" />
			<?php echo $this->lang->line('invoice_closed');?></label>

			<label for="all">
			<input type="radio" name="status" id="all" value="all" class="noborder" onclick="getInvoices();" />
			<?php echo $this->lang->line('invoice_all_invoices');?></label>

			<br />
			<label><?php echo $this->lang->line('invoice_select_client');?>
			<select name="client_id" id="client_id" onchange="getInvoices();">
				<option value="null" selected="selected"><?php echo $this->lang->line('invoice_all_clients');?></option>
				<?php foreach($clientList->result() as $row): ?>
				<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
				<?php endforeach; ?>
			</select>
			</label>
		</p>

	<?php echo form_close();?>

<?php $this->load->view('invoices/invoice_table');?>

<script type="text/javascript">
<!--<![CDATA[
$('filter').style.display = "block";
// ]]> -->
</script>

<?php
$this->load->view('footer');
?>