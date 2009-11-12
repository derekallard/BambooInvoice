<p>
	<label for="first_name" class="required"><span><?php echo $this->lang->line('clients_first_name');?>*:</span></label> 
	<?php
		echo form_input(
							array(
								'name'		=> 'first_name',
								'id'		=> 'first_name',
								'value'		=> $this->validation->first_name,
								'size'		=> '25',
								'maxlength'	=> '25'
								)
						);
		echo $this->validation->first_name_error;
	?>
</p>

<p>
	<label for="last_name" class="required"><span><?php echo $this->lang->line('clients_last_name');?>*:</span></label> 
	<?php
		echo form_input(
							array(
								'name'		=> 'last_name',
								'id'		=> 'last_name',
								'value'		=> $this->validation->last_name,
								'size'		=> '25',
								'maxlength'	=> '25'
								)
						);
		echo $this->validation->last_name_error;
	?>
</p>

<p>
	<label for="email" class="required"><span><?php echo $this->lang->line('clients_email');?>*:</span></label> 
	<?php
		echo form_input(
							array(
								'name'		=> 'email',
								'id'		=> 'email',
								'value'		=> $this->validation->email,
								'size'		=> '25',
								'maxlength'	=> '50'
								)
						);
		echo $this->validation->email_error;
	?>
</p>

<p>
	<label for="phone"><span><?php echo $this->lang->line('clients_phone');?>:</span></label> 
	<?php
		echo form_input(
							array(
								'name'		=> 'phone',
								'id'		=> 'phone',
								'value'		=> $this->validation->phone,
								'size'		=> '20',
								'maxlength'	=> '20'
								)
						);
		echo $this->validation->phone_error;
	?>
</p>

<p class="required">
	* <?php echo $this->lang->line('actions_required_fields');?>
</p>
