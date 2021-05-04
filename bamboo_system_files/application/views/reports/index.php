<?php
$this->load->view('header');
$tax1 = 0;
$tax2 = 0;
?>
<h2><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<h3><?php echo $this->lang->line('reports_generate_report');?></h3>
<p id="report_shortlinks"><?php echo anchor ("reports/dates/$current_year-01-01/$current_year-03-31/", $this->lang->line('reports_first_quarter'));?>, <?php echo anchor ("reports/dates/$current_year-04-01/$current_year-06-30/", $this->lang->line('reports_second_quarter'));?>, <?php echo anchor ("reports/dates/$current_year-07-01/$current_year-09-31/", $this->lang->line('reports_third_quarter'));?>, <?php echo anchor ("reports/dates/$current_year-10-01/$current_year-12-31/", $this->lang->line('reports_fourth_quarter'));?></p>

<?php echo form_open('reports/dates');?>
<p><label for="startDate"><?php echo $this->lang->line('reports_start_date');?> <input type="text" id="startDate" size="10" name="startDate" value="<?php echo date("Y-m-d");?>" /></label> 
<label for="endDate"><?php echo $this->lang->line('reports_end_date');?> <input type="text" id="endDate" size="10" name="endDate" value="<?php echo date("Y-m-d");?>" /></label> <input type="submit" value="<?php echo $this->lang->line('reports_generate_report');?>" /></p>
</form>

<h3><?php echo $this->lang->line('reports_yearly_income').' '.$current_year;?></h3>
<p>
	<?php
	foreach ($years as $year)
	{
		echo anchor('reports/index/'.$year, $year) . ' ';
	}
	?>
</p>
<fieldset id="graph_legend">
	<legend><?php echo $this->lang->line('reports_legend');?></legend>
</fieldset>
<div><canvas id="yearly_graph" height="250" width="700"></canvas></div>

<script type="text/javascript">

/**
 * Please forgive how ugly this code is.  It took about 45346 hours to get IE
 * to accept it.  Man that browser... The (ugly) spacing is needed.
 */

			var dataset = {
				'<?php echo $this->lang->line('menu_invoices');?>': 	[<?php
foreach ($month_invoices as $key => $value) {
	if ($value == '') {$value = 0;}
	echo '[' . ($key-1) . ', ' . $value . ']';
		if ($key <= 11) {
			echo ",";
		}
}
?>]<?php
if (max($month_tax1) != 0) {
	echo ",\n'" . $this->settings_model->get_setting('tax1_desc') . "': 	[";
	foreach ($month_tax1 as $key => $value) {
		if ($value == '') {$value = 0;}
		echo '[' . ($key-1) . ', ' . $value . ']';
		if ($key <= 11) {
			echo ",";
		}
	}
	echo ']';
}
if (max($month_tax2) != 0) {
	echo ",\n'" . $this->settings_model->get_setting('tax2_desc') . "': 	[";
	foreach ($month_tax2 as $key => $value) {
		if ($value == '') {$value = 0;}
		echo '[' . ($key-1) . ', ' . $value . ']';
		if ($key <= 11) {
			echo ",";
		}
	}
	echo ']';
}

?>
			};

			var options = {
				padding: {left: 50, right: 0, top: 10, bottom: 30},
				backgroundColor: '#f2f2f2',
				colorScheme: 'blue',
			   	xTicks: [
					{v:0, label:'<?php echo html_entity_decode($this->lang->line('cal_jan'));?>'}, 
			      	{v:1, label:'<?php echo html_entity_decode($this->lang->line('cal_feb'));?>'}, 
			      	{v:2, label:'<?php echo html_entity_decode($this->lang->line('cal_mar'));?>'},
			      	{v:3, label:'<?php echo html_entity_decode($this->lang->line('cal_apr'));?>'},
			      	{v:4, label:'<?php echo html_entity_decode($this->lang->line('cal_may'));?>'}, 
			      	{v:5, label:'<?php echo html_entity_decode($this->lang->line('cal_jun'));?>'},
			      	{v:6, label:'<?php echo html_entity_decode($this->lang->line('cal_jul'));?>'},
			      	{v:7, label:'<?php echo html_entity_decode($this->lang->line('cal_aug'));?>'}, 
			      	{v:8, label:'<?php echo html_entity_decode($this->lang->line('cal_sep'));?>'},
			      	{v:9, label:'<?php echo html_entity_decode($this->lang->line('cal_oct'));?>'},
			      	{v:10, label:'<?php echo html_entity_decode($this->lang->line('cal_nov'));?>'}, 
			      	{v:11, label:'<?php echo html_entity_decode($this->lang->line('cal_dec'));?>'}
				]
			};

			var line = new Plotr.LineChart('yearly_graph',options);
			line.addDataset(dataset);
			line.render();
			line.addLegend($('graph_legend'));
</script>

<!-- Soon
<h3><?php echo $this->lang->line('menu_clients');?></h3>
<p><?php echo $this->lang->line('invoice_select_client');?></p>
-->

<h3><?php echo $this->lang->line('invoice_overdue');?></h3>
<p><?php echo $this->lang->line('invoice_there_are_currently');?> <?php echo $overdueInvoicesCount;?> <?php echo $this->lang->line('invoice_overdue_invoices');?><?php if ($overdueInvoicesCount > 0):?>.  <?php echo $this->lang->line('invoice_total');?> <?php echo $this->settings_model->get_setting('currency_symbol');?><?php echo $overdueInvoicesAmount;?><?php endif; ?></p>

<h3><?php echo $this->lang->line('invoice_open');?></h3>
<p><?php echo $this->lang->line('invoice_there_are_currently');?> <?php echo $openInvoicesCount;?>. <?php if ($openInvoicesCount > 0):?><?php echo $this->lang->line('invoice_total');?>: <?php echo $this->settings_model->get_setting('currency_symbol');?><?php echo $openInvoicesAmount;?><?php endif; ?></p>

<h3><?php echo $this->lang->line('reports_year_to_date').' : '.$current_year;?></h3>
<ul>
<li><?php echo $yearToDateCount;?></li>
<?php if ($yearToDateCount > 0):?>
<li><?php echo $yearToDateAmount;?></li>
<?php if ($yearToDateTax1 != ''):?>
<li><?php echo $yearToDateTax1 . ' ' . $this->settings_model->get_setting('tax1_desc');?></li>
<?php endif; ?>
<?php if ($yearToDateTax2 != ''):?>
<li><?php echo $yearToDateTax2 . ' ' . $this->settings_model->get_setting('tax2_desc');?></li>
<?php endif; ?>
<?php endif; ?>
</ul>


<?php
$this->load->view('footer');
?>