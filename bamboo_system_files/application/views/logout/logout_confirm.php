<h2><?php echo $page_title;?></h2>
<p><?php echo $this->lang->line('login_logout_confirm');?></p>
<ul id="logout_list">
	<li><?php echo anchor('logout/logout_routine', $this->lang->line('login_logout'));?></li>
	<li><a href="<?php echo site_url()?>" class="lbAction" rel="deactivate"><?php echo $this->lang->line('actions_cancel');?></a></li>
</ul>