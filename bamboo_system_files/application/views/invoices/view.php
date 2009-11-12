<?php
$this->load->view('header');

if ($message != ''):
?>
<p class="error"><?php echo $message;?></p>
<?php endif;?>

<?php if (isset($invoicePayment) && $invoicePayment != ''):?>
	<p class="error"><?php echo $this->lang->line('invoice_payment_success');?></p>
<?php endif;?>

<?php echo form_open('invoices/notes/' . $row->id, array('id'=>'private_note_form'));?>

		<h4><label for="private_note"><?php echo $this->lang->line('menu_private_note');?></label></h4>

		<p>
			<textarea name="private_note" type="text" id="private_note" cols="50" rows="7"></textarea>
		</p>

		<p>
			<input type="submit" value="<?php echo $this->lang->line('invoice_add_note');?>" /> <input onclick="Effect.BlindUp('private_note_form', {duration: '0.4'});" type="reset" value="<?php echo $this->lang->line('actions_cancel');?>" name="close" id="close" />
		</p>

<?php echo form_close();?>

<?php
// only show enterPayment if the invoice isn't fully paid up yet...
if ($row->amount_paid < $row->total_with_tax):
?>

	<?php echo form_open('invoices/payment', array('id' => 'enterPayment', 'name' => 'enterPayment'), array('id'=>$row->id));?>

		<h4><?php echo $this->lang->line('invoice_payment_enter') . ' ' . $row->name; ?></h4>

		<p id="date_paid_container">
			<label>
				<?php echo $this->lang->line('invoice_date_paid_full');?> 
				<input type="text" name="date_paid" id="date_paid" value="<?php echo $invoiceDate; ?>"/>
			</label>
		</p>

		<div id="cal1Container" style="display: none;">
			<?php echo js_calendar_write('entry_date', time(), true);?>
		</div>

		<p>
			<label>
				<span><?php echo $this->lang->line('invoice_amount');?></span> 
				<?php echo $this->settings_model->get_setting('currency_symbol');?> 
				<input type="text" name="amount" id="amount" maxlength="10" size="10" /> 
			</label><span id="amountError" class="error"></span>
		</p>

		<p>
			<label>
				<span><?php echo $this->lang->line('invoice_note') . ' ' . $this->lang->line('invoice_note_max_chars');?></span>
				<input name="payment_note" type="text" id="payment_note" value="" size="50" />
			</label>
		</p>

		<p>
			<input type="submit" name="makePayment" value="<?php echo $this->lang->line('menu_enter_payment');?>" /> <input onclick="Effect.BlindUp('enterPayment', {duration: '0.4'});" type="reset" value="<?php echo $this->lang->line('actions_cancel');?>" name="close" id="close" />
		</p>

	<?php echo form_close();?>

<?php endif; ?>

	<p class="error" id="emailSuccess" style="display: none;"><?php echo $this->lang->line('invoice_email_success');?></p>

	<?php echo form_open('invoices/email/' . $row->id, array('id' => 'emailInvoice', 'name' => 'emailInvoice'), array('invoice_number'=>$row->invoice_number, 'isAjax'=>'false'));?>

			<h4><?php echo $this->lang->line('invoice_email_invoice_to');?> <?php echo $row->name; ?></h4>

			<?php if ($clientContacts->num_rows() == 0):?>

				<p><?php echo $this->lang->line('invoice_email_invoice_to') . ' ' . anchor('clients', $this->lang->line('menu_clients'));?></p>

			<?php else:?>

			<fieldset id="recipients">
				<legend><?php echo $this->lang->line('invoice_send_to');?>:</legend>
				<p>
					<?php foreach($clientContacts->result() as $contactRow): ?>
					<label for="<?php echo 'recipient' . $contactRow->id;?>"><input name="recipients[]" id="<?php echo 'recipient' . $contactRow->id;?>" type="checkbox" value="<?php echo $contactRow->id;?>" /><?php echo $contactRow->first_name . ' ' . $contactRow->last_name;?></label><br />
					<?php endforeach;?>
					<br /><label for="primary_contact"><input name="primary_contact" id="primary_contact" type="checkbox" value="y" /><em><?php echo $this->lang->line('invoice_blind_copy_me')?></em></label>
				</p>
			</fieldset>

			<div id="emailHolder">

				<p>
					<label>
						<?php echo $this->lang->line('invoice_email_message');?><br />
						<textarea name="email_body" type="text" id="email_body" cols="50" rows="7"></textarea>
					</label>
				</p>

				<p>
					<span class="error" id="emailError"></span> 
					<input type="submit" name="sendEmail" id="sendEmail" value="<?php echo $this->lang->line('menu_email_invoice');?>" /> <input onclick="Effect.BlindUp('emailInvoice', {duration: '0.4'});" type="reset" value="<?php echo $this->lang->line('actions_cancel');?>" name="close" id="close" />
				</p>

			</div>
			<?php endif; ?>

	<?php echo form_close();?>

<div class="invoiceViewHold">
	<div id="companyDetails">
		<h2>
			<?php if (isset($company_logo)) {echo $company_logo.'<br />';}?>
			<?php echo $companyInfo->company_name;?> 
			<span><?php echo $this->lang->line('invoice_invoice');?></span>
		</h2>

		<p>
			<?php if ($companyInfo->address1 != '') {echo $companyInfo->address1;}?>
			<?php if ($companyInfo->address2 != '') {echo ', ' . $companyInfo->address2;}?>
			<?php if ($companyInfo->address1 != '' || $companyInfo->address2 != '') {echo '<br />';}?>
			<?php if ($companyInfo->city != '') {echo $companyInfo->city;}?>
			<?php if ($companyInfo->province != '') {echo ', ' . $companyInfo->province;}?>
			<?php if ($companyInfo->country != '') {echo ', ' . $companyInfo->country;}?>
			<?php if ($companyInfo->postal_code != '') {echo ' ' . $companyInfo->postal_code;}?>
			<?php if ($companyInfo->city != '' || $companyInfo->province != '' || $companyInfo->country != '' || $companyInfo->postal_code != '') {echo '<br />';}?>
			<?php echo auto_link(prep_url($companyInfo->website));?>
		</p>

	</div>

	<p>
		<strong>
			<?php echo $this->lang->line('invoice_invoice');?> <?php echo $row->invoice_number;?><br />
			<?php echo $date_invoice_issued;?>
		</strong>
	</p>

	<p><?php echo $this->lang->line('invoice_status') . ': ' . $status;?></p>

	<hr />

	<h3><?php echo $row->name;?></h3>

	<p>
		<?php if ($row->address1 != '') {echo $row->address1;}?>
		<?php if ($row->address2 != '') {echo ', ' . $row->address2;}?>
		<?php if ($row->address1 != '' || $row->address2 != '') {echo '<br />';}?>
		<?php if ($row->city != '') {echo $row->city;}?>
		<?php if ($row->province != '') {if ($row->city != '') {echo ', ';} echo $row->province;}?>
		<?php if ($row->country != '') {if ($row->province != '' || ($row->province == '' && $row->city != '')){echo ', ';} echo $row->country;}?>
		<?php if ($row->postal_code != '') {echo ' ' . $row->postal_code;}?>
		<?php if ($row->city != '' || $row->province != '' || $row->country != '' || $row->postal_code != '') {echo '<br />';}?>
		<?php echo auto_link(prep_url($row->website));?>
		<?php if ($row->tax_code != '') {echo '<br />'.$this->lang->line('settings_tax_code').': '.$row->tax_code;}?>
	</p>

	<table class="invoice_items stripe">
		<tr>
			<th><?php echo $this->lang->line('invoice_quantity');?></th>
			<th><?php echo $this->lang->line('invoice_work_description');?></th>
			<th><?php echo $this->lang->line('invoice_amount_item');?></th>
			<th><?php echo $this->lang->line('invoice_total');?></th>
		</tr>
		<?php foreach ($items->result() as $item):?>
		<tr>
			<td><p><?php echo str_replace('.00', '', $item->quantity);?></p></td>
			<td><?php echo auto_typography($item->work_description);?></td>
			<td><p><?php echo $this->settings_model->get_setting('currency_symbol') . str_replace('.', $this->config->item('currency_decimal'), $item->amount);?> <?php if ($item->taxable == 0){echo '(' . $this->lang->line('invoice_not_taxable') . ')';}?></p></td>
			<td><p><?php echo $this->settings_model->get_setting('currency_symbol') . number_format($item->quantity * $item->amount, 2, $this->config->item('currency_decimal'), '');?></p></td>
		</tr>
		<?php endforeach;?>
	</table>

	<p>
		<?php echo $total_no_tax;?>
		<?php echo $tax_info;?>
		<?php echo $total_with_tax;?>
		<?php echo $total_paid;?>
		<?php echo $total_outstanding;?>
	</p>

	<p>
		<strong><?php echo $this->lang->line('invoice_payment_term');?>: <?php echo $this->settings_model->get_setting('days_payment_due');?> <?php echo $this->lang->line('date_days');?></strong> 
		(<?php echo $date_invoice_due;?>)
	</p>

	<?php if ($companyInfo->tax_code != ''):?>
	<p><?php echo $companyInfo->tax_code;?></p>
	<?php endif;?>

	<p><?php echo auto_typography($row->invoice_note);?></p>

	<div class="work_description" id="invoicework_description">

		<h4><?php echo $this->lang->line('invoice_history_comments');?></h4>

		<?php if ($invoiceHistory->num_rows() == 0):?>

			<ul>
				<li><?php echo $this->lang->line('invoice_history_comments');?></li>
			</ul>

		<?php else:
			foreach($invoiceHistory->result() as $row): ?>
				<div style="clear:left; margin: 10px 0;">

					<p class="dateHolder"><?php echo formatted_invoice_date($row->date_sent);?></p>

					<?php if ($row->contact_type == 2): ?>
						<div class="comment"><p class="commentintro"><?php echo $this->lang->line('invoice_comment');?></p><p><?php echo auto_typography(html_entity_decode(str_replace('\n', "\n", $row->email_body)));?></p></div>
						<?php else: ?>
						<div class="comment"><p class="commentintro"><?php echo $this->lang->line('invoice_sent_to');?> <?php echo implode(", ", unserialize($row->clientcontacts_id));?></p><?php echo auto_typography(str_replace('\n', "\n", $row->email_body));?></p></div>
					<?php endif; ?>

				</div>
		<?php 
			endforeach;
		endif; // ends if ($invoiceHistory->num_rows() ==0)
		?>

		<h4><?php echo $this->lang->line('invoice_payment_history');?></h4>

		<ul id="invoiceHistory">
			<?php
			if ($paymentHistory->num_rows() == 0)
			{
				echo "<li>" . $this->lang->line('invoice_no_payments_entered') . "</li>\n";
			}
			else
			{
				foreach($paymentHistory->result() as $row): ?>
				<li>
					<?php
					// localized month
					echo $this->lang->line('cal_' . strtolower(date('F', mysql_to_unix($row->date_paid))));
					// day and year numbers
					echo date(' j, Y', mysql_to_unix($row->date_paid));
					?> : <?php echo $this->settings_model->get_setting('currency_symbol') . $row->amount_paid;?>. <em>&quot;<?php echo ($row->payment_note=="0")?'There was no payment note entered':$row->payment_note;?>&quot;</em>
				</li>
			<?php
				endforeach;
			} // ends if ($invoiceHistory->num_rows() ==0)
			?>
		</ul>

	</div>

<?php
$this->load->view('footer');
?>
