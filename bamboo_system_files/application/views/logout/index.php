<?php
$this->load->view('header');
?>
<h2><?php echo $page_title;?></h2>
<p><?php echo $this->lang->line('login_logout_success1') . ' ' . anchor ('login', $this->lang->line('login_logout_success2'));?>.</p>
<?php
$this->load->view('footer');
?>