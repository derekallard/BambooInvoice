<?php
$this->load->view('header');
?>

<h2><?php echo $page_title;?></h2>

<?php echo form_open('clientcontacts/add', array('id' => 'clientcontact'), array('client_id'=>$client_id));?>
<?php echo $this->validation->error_string; ?>

	<?php $this->load->view('clientcontacts/client_contact_add_form');?>

	<p><?php echo form_submit('submit', $this->lang->line('clients_save_client'), 'id="createClient"');?></p>

<?php echo form_close();?>

<?php
$this->load->view('footer');
?>