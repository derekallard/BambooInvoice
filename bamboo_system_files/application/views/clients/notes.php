<?php
$this->load->view('header');
?>

	<h2><label for="client_notes"><?php echo $page_title; ?></label></h2>

	<?php echo form_open('clients/notes/'.$row->id, '', array('notes_submit'=>TRUE));?>

	<p>
		<?php echo form_textarea(array(
										'name'	=> 'client_notes',
										'id'	=> 'client_notes',
										'value'	=> $row->client_notes,
										'rows' 	=> '12',
										'cols'	=> '100',
										'style'	=> 'width:100%',
										)
		);?>
	</p>

	<p><?php echo form_submit('updateClient', $this->lang->line('clients_update_client'), 'id="updateClient"');?></p>

	<?php echo form_close();?>

<?php
$this->load->view('footer');
?>