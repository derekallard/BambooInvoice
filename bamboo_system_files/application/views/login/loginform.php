<div id="loginformdiv">

	<?php echo form_open('login', array('id' => 'loginform', 'onsubmit' => 'return checkform();'));?>

		<p>
			<label for="username"><span><?php echo $this->lang->line('login_username');?>:</span></label> 
			<input type="text" name="username" id="username" value="<?php if ($this->settings_model->get_setting('demo_flag') == 'y') {echo 'info@bambooinvoice.org';}?>" maxlength="50" class="loginitem" size="40" /> 
			<span id="userError" class="error"></span>
		</p>

		<p>
			<label for="password"><span><?php echo $this->lang->line('login_password');?>:</span></label> 
			<input type="password" name="password" id="password" value="<?php if ($this->settings_model->get_setting('demo_flag') == 'y') {echo 'demo';}?>" maxlength="100" class="loginitem" size="40" /> 
			<span id="passError" class="error"></span>
		</p>

		<p>
			<?php echo form_submit('login', $this->lang->line('login_login'), 'id="login" class="submitbutton"');?>
		</p>

		<p>
			<?php echo anchor('login/forgot_password', $this->lang->line('login_forgot_password'));?>
		</p>

	<?php echo form_close();?>

</div>
