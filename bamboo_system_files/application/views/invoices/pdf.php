<?php
/**
 * This file is essentially a stripped down version of /views/invoices/view.php
 * Any changes you make to that formatting, you may consider adding to this.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title;?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<style type="text/css">
/**
 * Invoice view styles notes
 *
 * This file NEEDS a locally located stylesheet to generate the appropriate formatting for 
 * transformation into a PDF.  If you alter this file (and you are encouraged to do so) just
 * keep in mind that all of your formatting must be located here.  You might also find that
 * there is limited or no support for a specific CSS style you want (ie: floating) and you'll
 * need to work around with old-school tables.  Sorry for that... ;)  
 */

body {
	margin: 0.5in;
}
h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
	font-family: Helvetica, Arial, Verdana, sans-serif; /*Trebuchet MS,*/
}
h1, h2, h3, h4 {
	color: #5E88B6;
	font-weight: normal;
}
h4, h5, h6 {
	color: #5E88B6;
}
h2 {
	margin: 0 auto auto auto;
	font-size: x-large;
}
h2 span {
	text-transform: uppercase;
}
li, blockquote, p, th, td {
	font-size: 80%;
}
ul {
	list-style: url(img/bullet.gif) none;
}
table {
	width: 100%;
}
td p {
	font-size: small;
	margin: 0;
}
th {
	color: #FFF;
	text-align: left;
	background-color:#000000;
}
.bamboo_invoice_bam {
	color: #5E88B6;
	font-weight: bold;
	text-transform: capitalize;
}
.bamboo_invoice_inv {
	font-weight: bold;
	font-variant: small-caps;
	color: #333;
}
#footer {
	border-top: 1px solid #CCC;
	text-align: right;
	font-size: 6pt;
	color: #999999;
}
#footer a {
	color: #999999;
	text-decoration: none;
}
table.stripe {
	border-collapse: collapse;
	page-break-after: auto;
}
table.stripe td {
	border-bottom: 1pt solid black;
}
</style>
</head>
<body>

	<table>
		<tr>
			<td width="60%">
				<p>
					<strong>
						<?php echo $this->lang->line('invoice_invoice');?> <?php echo $row->invoice_number;?><br />
						<?php echo $date_invoice_issued;?>
					</strong>
				</p>
			</td>
			<td>

				<h2>
					<?php if (isset($company_logo)) {echo $company_logo.'<br />';}?>
					<?php echo $companyInfo->company_name;?> 
					<span><?php echo $this->lang->line('invoice_invoice');?></span>
				</h2>

				<p>
					<?php echo $companyInfo->address1;?>
					<?php if ($companyInfo->address2 != '') {echo '<br />' . $companyInfo->address2;}?><br />
					<?php echo $companyInfo->city;?>,
					<?php echo $companyInfo->province;?><br />
					<?php echo $companyInfo->country;?> 
					<?php echo $companyInfo->postal_code;?><br />
					<?php echo auto_link(prep_url($companyInfo->website));?>
				</p>
			</td>
		</tr>
	</table>

	<h3><?php echo $this->lang->line('invoice_bill_to');?>
		<?php echo $row->name;?>
	</h3>

	<p>
		<?php if ($row->address1 != '') {echo $row->address1;}?>
		<?php if ($row->address2 != '') {echo ', ' . $row->address2;}?>
		<?php if ($row->address1 != '' || $row->address2 != '') {echo '<br />';}?>
		<?php if ($row->city != '') {echo $row->city;}?>
		<?php if ($row->province != '') {if ($row->city != '') {echo ', ';} echo $row->province;}?>
		<?php if ($row->country != '') {if ($row->province != '' || ($row->province == '' && $row->city != '')){echo ', ';} echo $row->country;}?>
		<?php if ($row->postal_code != '') {echo ' ' . $row->postal_code;}?>
		<?php if ($row->city != '' || $row->province != '' || $row->country != '' || $row->postal_code != '') {echo '<br />';}?>
		<?php echo auto_link(prep_url($row->website));?>
		<?php if ($row->tax_code != '') {echo '<br />'.$this->lang->line('settings_tax_code').': '.$row->tax_code;}?>
	</p>

	<table class="invoice_items stripe">
		<tr>
			<th><?php echo $this->lang->line('invoice_quantity');?></th>
			<th><?php echo $this->lang->line('invoice_work_description');?></th>
			<th><?php echo $this->lang->line('invoice_amount_item');?></th>
			<th><?php echo $this->lang->line('invoice_total');?></th>
		</tr>
		<?php foreach ($items->result() as $item):?>
		<tr valign="top">
			<td><p><?php echo str_replace('.00', '', $item->quantity);?></p></td>
			<td><?php echo nl2br(str_replace(array('\n', '\r'), "\n", $item->work_description));?></td>
			<td><p><?php echo $this->settings_model->get_setting('currency_symbol') . str_replace('.', $this->config->item('currency_decimal'), $item->amount);?> <?php if ($item->taxable == 0){echo '(' . $this->lang->line('invoice_not_taxable') . ')';}?></p></td>
			<td><p><?php echo $this->settings_model->get_setting('currency_symbol') . number_format($item->quantity * $item->amount, 2, $this->config->item('currency_decimal'), '');?></p></td>
		</tr>
		<?php endforeach;?>
	</table>

	<p>
		<?php echo $total_no_tax;?>
		<?php echo $tax_info;?>
		<?php echo $total_with_tax;?>
		<?php echo $total_paid;?>
		<?php echo $total_outstanding;?>
	</p>

	<p>
		<strong><?php echo $this->lang->line('invoice_payment_term');?>: <?php echo $this->settings_model->get_setting('days_payment_due');?> <?php echo $this->lang->line('date_days');?></strong> 
		(<?php echo $date_invoice_due;?>)
	</p>

	<?php if ($companyInfo->tax_code != ''):?>
	<p><?php echo $companyInfo->tax_code;?></p>
	<?php endif;?>

	<p><?php echo auto_typography($row->invoice_note);?></p>

	<?php if ($this->config->item('show_client_notes') === TRUE):?>
	<p>
		<?php echo auto_typography($client_note)?>
	</p>
	<?php endif;?>

	<div id="footer">
		<?php if ($this->settings_model->get_setting('display_branding') == 'y'):?>
			<p>
				<?php echo $this->lang->line('invoice_generated_by');?> 
				<?php echo $this->lang->line('bambooinvoice_logo');?><br />
				<a href="http://www.bambooinvoice.org/">http://www.bambooinvoice.org</a>
			</p>
		<?php endif;?>
	</div>

</body>
</html>