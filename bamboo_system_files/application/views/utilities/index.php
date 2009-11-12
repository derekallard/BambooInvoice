<?php
$this->load->view('header');
?>
<h2><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<ul>
	<li><?php echo anchor('utilities/php_info', $this->lang->line('utilities_phpinfo'));?></li>
	<li><?php echo anchor('utilities/version_check', $this->lang->line('utilities_version_check'))?></li>
	<li><?php echo anchor('utilities/database_backup', $this->lang->line('utilities_download_backup'));?></li>
	<li id="exportOption"><?php echo $this->lang->line('invoice_export_to') . ' ' . anchor ('utilities/export_xml', '<acronym title=\'Extensible Markup Language\'>XML</acronym>', array('id'=>'exportxml')) . ' ' . $this->lang->line('invoice_or') . ' ' . anchor ('utilities/export_excel', 'Excel', array('id'=>'exportexcel'));?>.</li>
</ul>

<?php
$this->load->view('footer');
?>