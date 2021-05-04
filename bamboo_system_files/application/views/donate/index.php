<?php
$this->load->view('header');
?>
<h2><a id="top"></a><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<?php if ($this->lang->line('notice_english_only') != ''):?>
	<p class="error"><?php echo $this->lang->line('notice_english_only');?></p>
<?php endif;?>

<p>Seriously, it means a lot. I've sunk a lot of time into my little side projects, and for someone to say "thanks" is pretty cool. Please <a href="mailto:info@bambooinvoice.org">contact me</a> and let me know who you are ok.</p>
<div>
	<?php
		echo form_open('https://www.paypal.com/cgi-bin/webscr', array('name'=>'donate_form')) . "\n";
		echo form_hidden('cmd', '_s-xclick') . "\n";
		echo form_hidden('encrypted', '-----BEGIN PKCS7-----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-----END PKCS7-----') . "\n";
		echo form_submit('submit', 'Donate to BambooInvoice') . "\n";
		echo form_close();
	?>
</div>

<?php
$this->load->view('footer');
?>