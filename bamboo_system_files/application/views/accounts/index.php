<?php
$this->load->view('header');
?>
<h2><a id="top"></a><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<?php if ($message != ''):?>
	<p class="error"><?php echo $message; ?></p>
<?php endif;?>

<ul id='admin_list'>
<?php foreach($accounts->result() as $client):?>
	<li>
		<?php echo $client->first_name.' '.$client->last_name.' ('.$client->email.')';?>
		<?php echo ($client->id == 1) ? '' : ' ['.anchor('accounts/delete/'.$client->id, $this->lang->line('actions_delete')).']';?>
	</li>
<?php endforeach;?>
</ul>

<?php echo form_open('accounts', array('id'=>'loginform'));?>

<p><?php echo $this->lang->line('install_explain');?></p>

<div class="error">
	<?php echo validation_errors(); ?>
</div>

<p>
	<?php echo form_label('<span>'.$this->lang->line('login_username').'</span>', 'username');?> 
	<?php echo form_input('username', set_value('username'));?>
</p>

<p>
	<?php echo form_label('<span>'.$this->lang->line('clients_first_name').'</span>', 'first_name');?> 
	<?php echo form_input('first_name', set_value('first_name'));?>
</p>

<p>
	<?php echo form_label('<span>'.$this->lang->line('clients_last_name').'</span>', 'last_name');?> 
	<?php echo form_input('last_name', set_value('last_name'));?>
</p>

<p>
	<?php echo form_label('<span>'.$this->lang->line('login_password').'</span>', 'login_password');?> 
	<?php echo form_password('login_password', set_value('login_password'));?>
</p>

<p>
	<?php echo form_label('<span>'.$this->lang->line('login_password_confirm').'</span>', 'login_password_confirm');?> 
	<?php echo form_password('login_password_confirm', set_value('login_password_confirm'));?>
</p>

<p>
	<?php echo form_submit('login_credentials', $this->lang->line('login_allow_login'));?>
</p>

<?php echo form_close();?>


<?php
$this->load->view('footer');
?>