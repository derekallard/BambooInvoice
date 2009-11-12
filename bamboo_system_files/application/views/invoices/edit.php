<?php
$this->load->view('header');
?>
	<h2><?php echo $page_title;?></h2>

	<?php echo form_open("invoices/$action/" . $row->id, array('id' => 'createInvoice', 'onsubmit' => 'return checkform();', 'name' => 'my_form', 'autocomplete' => 'off'), $form_hidden);?>

	<p><label><?php echo $this->lang->line('invoice_client');?> <select name="client_id">
	<?php
	foreach($clientListEdit->result() as $client)
	{ 
		if ($client->id == $row->client_id)
		{
			echo '<option value="'.$client->id.'" selected="selected">'.$client->name.'</option>';
		}
		else
		{
			echo '<option value="'.$client->id.'">'.$client->name.'</option>';
		}
	}
	?>
		</select></label></p>
		<p>
			<label><?php echo $this->lang->line('invoice_number');?> <input type="text" name="invoice_number" id="invoice_number" value="<?php echo ($this->validation->invoice_number) ? ($this->validation->invoice_number) : ($invoice_number);?>" /></label> <?php echo $this->validation->invoice_number_error;?><?php echo (isset($invoice_number_error))?'<span id="invoice_number_error" class="error">' . $this->lang->line('invoice_not_unique'). '</span>':'';?> 
			<?php echo $this->validation->invoice_number_error; ?> 
			<em><?php echo $last_number_suggestion;?></em>
		</p>
		<p id="dateIssuedContainer">
			<label><?php echo $this->lang->line('invoice_date_issued');?> <input type="text" name="dateIssued" id="dateIssued" value="<?php echo ($this->validation->dateIssued) ? ($this->validation->dateIssued) : ($row->dateIssued);?>"/></label>
			<span id="dateIssuedDisplay"><?php echo date('F d, Y', mysql_to_unix(($this->validation->dateIssued) ? ($this->validation->dateIssued) : ($row->dateIssued)));?></span> <a href="#" id="changeDate" onclick="createInvoiceDate.toggle()"><?php echo $this->lang->line('actions_change');?></a>
		</p>
			<div id="cal1Container" style="display: none;">
				<?php echo js_calendar_write('entry_date', time($row->dateIssued), true);?>
			</div>

		<div class="work_description">

			<table class="invoice_items">
				<thead>
				<tr>
					<th><?php echo $this->lang->line('invoice_quantity');?></th>
					<th><?php echo $this->lang->line('invoice_work_description');?></th>
					<th><?php echo $this->lang->line('invoice_taxable');?></th>
					<th><?php echo $this->lang->line('invoice_amount_item');?></th>
					<th>&nbsp;</th>
				</tr>
				</thead>
				<tbody id="item_area">

			<?php 
				$item_count = 0; // logic in template... yuck. But a quick way to generate this.
				foreach ($items->result() as $item):
					$item_count++;
			?>
				<tr class="item_row" id="item<?php echo $item_count;?>">
					<td><p><label><span><?php echo $this->lang->line('invoice_quantity');?></span><input type="text" name="items[<?php echo $item_count;?>][quantity]" size="3" value="<?php echo $item->quantity;?>" onkeyup="recalculate_items();" /></label></p></td> 
					<td>
						<p>
						<label><span><?php echo $this->lang->line('invoice_work_description');?></span>
						<textarea name="items[<?php echo $item_count;?>][work_description]" id="work_description" cols="70" rows="5"><?php echo $item->work_description;?></textarea>
						</label>
						</p>
					</td>
					<td><p><label><input type="checkbox" name="items[<?php echo $item_count;?>][taxable]" value="1" onclick="recalculate_items();" <?php if ($item->taxable == 1) {echo 'checked="checked" ';}?>/><span><?php echo $this->lang->line('invoice_taxable');?>?</span></label></p></td>
					<td nowrap="nowrap"><p><label><span><?php echo $this->lang->line('invoice_amount');?></span><?php echo $this->settings_model->get_setting('currency_symbol');?><input type="text" id="amount" name="items[<?php echo $item_count;?>][amount]" size="5" value="<?php echo $item->amount;?>" onkeyup="recalculate_items();" value="" /></label></p></td>
					<td>
					<?php if ($item_count > 1):?>
					<p><img alt="X" src="<?php echo base_url();?>img/cancel.png" onclick="$('item_area').removeChild($('item<?php echo $item_count;?>'));"/></p>
					<?php endif;?>&nbsp;
					</td>
				</tr>
			<?php endforeach;?>

				</tbody>
			</table>

			<p class="button" style="display:none;" id="new_item"><a href="#" onclick="return create_itemized_fields();" class="clientnew"><img src="<?php echo base_url();?>img/add_row.png" style="margin-bottom:-3px;" alt="" /> New Item</a></p>
		</div>

		<div class="amount_listing">
			<p><?php echo $this->lang->line('invoice_amount');?> <?php echo $this->settings_model->get_setting('currency_symbol');?><span id="item_amount">0.00</span></p>
			<?php if ($row->tax1_rate > 0):?>
			<p><?php echo $row->tax1_desc;?> (<?php echo $row->tax1_rate;?>%) <?php echo $this->settings_model->get_setting('currency_symbol');?><span id="item_tax1amount">0.00</span></p>
			<?php endif;?>
			<?php if ($row->tax2_rate > 0):?>
			<p><?php echo $row->tax2_desc;?> (<?php echo $row->tax2_rate;?>%) <?php echo $this->settings_model->get_setting('currency_symbol');?><span id="item_tax2amount">0.00</span></p>
			<?php endif;?>
			<p><?php echo $this->lang->line('invoice_total');?> <?php echo $this->settings_model->get_setting('currency_symbol');?><span id="item_total_amount">0.00</span></p>
		</div>

		<p>
			<label><?php echo $this->lang->line('invoice_note');?> <?php echo $this->validation->invoice_note_error; ?><br />
			<textarea name="invoice_note" id="invoice_note" cols="80" rows="3"><?php echo ($this->validation->invoice_note) ? ($this->validation->invoice_note) : ($row->invoice_note);?></textarea>
			</label>
		</p>

		<p>
			<input type="submit" name="createInvoice" id="createInvoice" value="<?php echo $this->lang->line($button_label);?>" />
		</p>

	</form>

<?php
$this->load->view('footer');
?>