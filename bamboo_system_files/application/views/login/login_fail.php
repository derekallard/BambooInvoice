<?php
$this->load->view('header');
?>
<h2><?php echo $page_title;?></h2>
<p class="error"><?php echo $this->lang->line('login_wrong_password');?></p>
<?php $this->load->view('login/loginform');?>
<ul>
<li><?php echo $this->lang->line('login_caps_lock');?></li>
</ul>

<?php
$this->load->view('footer');
?>