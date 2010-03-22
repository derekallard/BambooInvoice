<?php
header('HTTP/1.0 200 OK'); // stoopid IIS
header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php
/**
	STOP!!! PLEASE READ THIS!!!!
	OK, if you're thinking about modifying Bamboo and redistributing it, that's fine, and that's part of the license that I released
	it under, but please do it knowing that this is NOT something I want or welcome. IT WILL NOT MAKE ME HAPPY,
	and no, I'm not very impressed by your work. And for the love of Pete, don't come to my blog and forums bragging
	about your "improvements" to Bamboo please.
*/
echo 'Bam'.'boo'.'In'.'voice'; // this is like this so that nobody can get it by a search and replace
/**
	Several times now I've had people take my work, strip out the word "bamboo" and rename it something else - then 
	claim they have written their own "invoicing software".  As a developer, this sucks.  Usually its a dumb search 
	and replace, and they replace my name with their own.  Look, if you want to modify Bamboo, fine, but please don't
	discount my work.  Leave my copyright in there.  Better yet, why not contact me and try to work something out.
	My email is info@bambooinvoice.org, please use it.  I don't want to see more poor quality, half-supported forks 
	of BambooInvoice out there. If you must take Bamboo, please don't use my images.
	
	If you aren't redistributing or hosting Bamboo or other people, then please ignore everything you just read.  
	For your own purposes, I ABSOLUTELY welcome and encourage you to modify things. Go nuts!  Tear it apart, see what
	makes it tick and put it back together. Feel free to email me or ask the forums questions about "why".  I love that
	stuff.  This is strictly about people taking my work, removing credit to me, and perverting it into something else. :)
	
	Thanks for your understanding!
	Derek Allard (http://derekallard.com)
*/
echo ': '.$page_title;
?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="author" content="Derek Allard - http://www.derekallard.com" />
<meta name="description" content="BambooInvoice : Simple, Open Source, Online Invoicing" />
<meta name="keywords" content="BambooInvoice, Online Invoicing" />
<?php if ($this->settings_model->get_setting('demo_flag') == 'y'):?>
<meta name="robots" content="all" />
<?php else :?>
<meta name="robots" content="noindex, nofollow" />
<?php endif;?>
<meta name="rating" content="general" />
<meta name="language" content="<?php echo $this->lang->line('setting_short_language');?>" />
<meta name="copyright" content="Copyright (c) <?php echo date("Y");?> Derek Allard" />
<script type="text/javascript" src="<?php echo base_url()?>js/bamboo.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/prototype.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/scriptaculous/scriptaculous.js?load=effects,dragdrop"></script>
<link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico" type="image/ico" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/bamboo.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/lightbox.css" />
<link type="text/css" rel="stylesheet" media="print" href="<?php echo base_url()?>css/bamboo_print.css" />
<script type="text/javascript">
base_url = "<?php echo site_url();?>/";
base_url_no_index = "<?php echo base_url();?>";
bi_currency_symbol = new String("<?php echo str_replace('&#0128;', '€', $this->settings_model->get_setting('currency_symbol'));?>");
lang_invoice_date_issued = new String("<?php echo ($this->lang->line('invoice_date_issued'));?> ");
lang_invoice_change = new String("<?php echo ($this->lang->line('actions_change'));?>");
lang_amount_error = new String("<?php echo ($this->lang->line('invoice_amount_error'));?>");
lang_delete = new String("<?php echo ($this->lang->line('actions_delete'));?>");
lang_edit = new String("<?php echo ($this->lang->line('actions_edit'));?>");
lang_numbers_only = new String("<?php echo ($this->lang->line('invoice_amount_numbers_only'));?>");
lang_field_required = new String("<?php echo ($this->lang->line('error_field_required'));?>");
lang_clients_contact_add = new String("<?php echo ($this->lang->line('clients_contact_add'));?>");
lang_error_email_recipients = new String("<?php echo ($this->lang->line('error_email_recipients'));?>");
lang_error_login_username = new String("<?php echo ($this->lang->line('error_login_username'));?>");
lang_error_login_password = new String("<?php echo ($this->lang->line('error_login_password'));?>");
lang_invoice = new String("<?php echo ($this->lang->line('invoice_invoice'));?>");
lang_client_name = new String("<?php echo ($this->lang->line('clients_name'));?>");
lang_amount = new String("<?php echo ($this->lang->line('invoice_amount'));?>");
lang_status = new String("<?php echo ($this->lang->line('invoice_status'));?>");
lang_quantity = new String("<?php echo ($this->lang->line('invoice_quantity'));?>");
lang_work_description = new String("<?php echo ($this->lang->line('invoice_work_description'));?>");
lang_taxable = new String("<?php echo ($this->lang->line('invoice_taxable'));?>");
lang_amount = new String("<?php echo ($this->lang->line('invoice_amount'));?>");
</script>
<?php
	if (isset($extraHeadContent)) {
		echo $extraHeadContent;
	}
?>
</head>
<body>
<div id="allHolder">
	<div id="container">
		<div id="masthead">

			<h1 id="bamboo_logo"><a href="<?php echo site_url()?>"><?php echo $this->lang->line('bambooinvoice_logo');?></a></h1>

			<?php if ($this->session->userdata('logged_in')):?>
			<ul id="submenu">
				<li><a href="<?php echo site_url('help')?>" class="submenu_link help"><?php echo $this->lang->line('menu_help');?></a></li>
				<li><a href="<?php echo site_url('logout/confirm')?>" class="submenu_link logout lbOn"><?php echo $this->lang->line('menu_logout');?></a></li>
			</ul>
			<?php endif;?>

		</div>

		<div id="invoice_action_menu">
		<ul>

		<?php if ($this->session->userdata('logged_in')): ?>

			<li><?php echo anchor('', $this->lang->line('menu_root_system'), array('class' => 'dashboard'));?></li>
			<li><?php echo anchor('invoices', $this->lang->line('menu_invoice_summary'), array('class' => 'summaryinv'));?></li>

			<?php if (isset($clientList)): ?>
				<li><?php echo anchor('invoices/newinvoice_first', $this->lang->line('menu_new_invoice'), array('class' => 'addinv createInvoice', 'id' => 'addinv'));?></li>
			<?php endif; ?>

			<?php if (isset($invoiceOptions)): ?>
				<li id="invnoteli"><a class="invnote" href="javascript:void(0);" onclick="Effect.BlindDown('private_note_form', {duration: '0.4'});"><?php echo $this->lang->line('menu_private_note');?></a></li>

				<?php if ($row->amount_paid < $row->total_with_tax): ?>
					<li id="invpayli"><a class="invpayment" href="javascript:void(0);" onclick="Effect.BlindDown('enterPayment', {duration: '0.4'});"><?php echo $this->lang->line('menu_enter_payment');?></a></li>
				<?php endif; ?>

				<li id="invemailli"><a class="invemail" href="javascript:void(0);" onclick="Effect.BlindDown('emailInvoice', {duration: '0.4'});"><?php echo $this->lang->line('menu_email_invoice');?></a></li>

				<li><?php echo anchor('invoices/pdf/' . $row->id, $this->lang->line('menu_generate_pdf'), array('class' => 'emailpdf'));?></li>
				<li id="invprintli"><?php echo anchor('', $this->lang->line('menu_print_invoice'), array('class' => 'invprint', 'onclick' => 'print(); return false;'));?></li>

				<?php if ($row->amount_paid < $row->total_with_tax): ?>
					<li><?php echo anchor('invoices/edit/'.$row->id, $this->lang->line('menu_edit_invoice'), array('class' => 'invedit'));?></li>
				<?php endif; ?>

			<li><?php echo anchor('invoices/duplicate/'.$row->id, $this->lang->line('menu_duplicate_invoice'), array('class' => 'invduplicate'));?></li>

			<li><?php echo anchor('invoices/delete/'.$row->id, $this->lang->line('menu_delete_invoice'), array('class'=>'lbOn deleteConfirm'));?></li>

			<?php endif; ?>

		<?php else: ?>

		<li class="menu_promo"><?php echo $this->lang->line('menu_catchphrase');?></li>

		<?php endif; ?>

		</ul>
		<?php
		$quotes = $this->lang->line('menu_did_you_know_quotes');
		echo '<p id="tip"><strong>' . $this->lang->line('menu_did_you_know') . '</strong><br />' . $quotes[array_rand($quotes)] . '</p>';
		?>
		</div>
		<div id="main_content">

		<?php if ($this->session->userdata('logged_in') && isset($status_menu)):?>
		<ul id="invoice_status_menu">
			<li><?php echo anchor('invoices', $this->lang->line('invoice_summary'));?></li>
			<li><?php echo anchor('invoices/overdue', $this->lang->line('invoice_overdue'));?></li>
			<li><?php echo anchor('invoices/open', $this->lang->line('invoice_open'));?></li>
			<li><?php echo anchor('invoices/closed', $this->lang->line('invoice_closed'));?></li>
			<li><?php echo anchor('invoices/all', $this->lang->line('invoice_all_invoices'));?></li>
		</ul>
		<?php endif; ?>