<?php
$this->load->view('header');
?>

<?php echo form_open('clients/newclient', array('id' => 'newClientForm', 'onsubmit' => 'return requiredFields();'));?>

	<?php if (isset($clientName) && $clientName !=''): ?>

		<h2><?php echo $clientName;?></h2>

		<input type="hidden" id="clientName" name="clientName" value="<?php echo $clientName;?>" />

	<?php else: ?>

		<h2><?php echo $page_title;?></h2>

		<p><label><span><?php echo $this->lang->line('clients_name');?>:</span> <input class="requiredfield" type="text" id="clientName" name="clientName" size="50" maxlength="50" value="<?php echo $this->validation->clientName; ?>" /></label> <?php echo $this->validation->clientName_error; ?></p>

	<?php endif; ?>

	<p><label><span><?php echo $this->lang->line('clients_website');?>:</span> <input type="text" name="website" id="website" size="50" maxlength="50" value="<?php echo $this->validation->website; ?>" /></label> <?php echo $this->validation->website_error; ?></p>

	<div class="address">
		<p><label><span><?php echo $this->lang->line('clients_address1');?>:</span> <input type="text" name="address1" id="address1" size="50" maxlength="50" value="<?php echo $this->validation->address1; ?>" /></label> <?php echo $this->validation->address1_error; ?></p>
		<p><label><span><?php echo $this->lang->line('clients_address2');?>:</span> <input type="text" name="address2" id="address2" size="50" maxlength="50" value="<?php echo $this->validation->address2; ?>" /></label> <?php echo $this->validation->address2_error; ?></p>
		<p><label><span><?php echo $this->lang->line('clients_city');?>:</span> <input type="text" name="city" id="city" size="50" maxlength="50" value="<?php echo $this->validation->city; ?>" /></label> <?php echo $this->validation->city_error; ?></p>
		<p><label><span><?php echo $this->lang->line('clients_province');?>:</span> <input type="text" name="province" id="province" size="25" maxlength="25" value="<?php echo $this->validation->province; ?>" /></label> <?php echo $this->validation->province_error; ?></p>
		<p><label><span><?php echo $this->lang->line('clients_country');?>:</span> <input type="text" name="country" id="country" size="25" maxlength="25" value="<?php echo $this->validation->country; ?>" /></label> <?php echo $this->validation->country_error; ?></p>
		<p><label><span><?php echo $this->lang->line('clients_postal');?>:</span> <input type="text" name="postal_code" id="postal_code" size="10" maxlength="10" value="<?php echo $this->validation->postal_code; ?>" /></label> <?php echo $this->validation->postal_code_error; ?></p>
	</div>

	<p><label><span><?php echo $this->lang->line('settings_tax_code');?>:</span> <input type="text" name="tax_code" id="tax_code" size="50" maxlength="75" value="<?php echo $this->validation->tax_code; ?>" /></label> <?php echo $this->validation->tax_code_error; ?></p>

	<fieldset>
		<legend><?php echo $this->lang->line('invoice_tax_status');?>:</legend>
		<p>
		<input type="radio" name="tax_status" id="taxable" value="1" checked="checked" /><label for="taxable"><?php echo $this->lang->line('invoice_taxable');?></label><br />
		<input type="radio" name="tax_status" id="notax" value="0" /><label for="notax"><?php echo $this->lang->line('invoice_not_taxable');?></label>
		</p>
	</fieldset>

	<input type="submit" name="createClient" id="createClient" value="<?php echo $this->lang->line('clients_save_client');?>" />

<?php echo form_close();?>

<?php
$this->load->view('footer');
?>