<?php
/**
* This page gnerates the divs that slide into position when
* the user creates a new invoice
*/
?>
<div id="newinvoice" style="display:block;">

	<?php echo form_open('clients/newclient', '', array('newInvoice'=>'TRUE'));?>

		<h2><?php echo $this->lang->line('invoice_new_invoice');?></h2>

		<p>
			<label for="client_id"><?php echo $this->lang->line('invoice_select_client');?></label>
			<select name="client_id" id="client_id">
				<option value="0" selected="selected">-- <?php echo $this->lang->line('actions_select_below');?> --</option>
				<?php foreach($clientList->result() as $row): ?>
				<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="newClient"><?php echo $this->lang->line('invoice_or_new_client');?></label> 
			<?php echo form_input('newClient', '', 'id="newClient" size="50"')?>
		</p>

		<div>
			<p>
				<input type="submit" value="<?php echo $this->lang->line('actions_create_invoice');?>" name="createInvoice" id="createInvoice" /> 
				<input type="button" value="<?php echo $this->lang->line('actions_cancel');?>" id="newinvoicecancel" />
			</p>
		</div>

	<?php echo form_close();?>

</div>

<script type="text/javascript">
<!--<![CDATA[
$('newinvoice').style.display = 'none';
// ]]> -->
</script>