			<div id="footer">
				<p><?php echo anchor ('donate', $this->lang->line('actions_donate'), array('id'=>'donate'));?> | <?php echo anchor("http://bambooinvoice.org", $this->lang->line('bambooinvoice_logo'), array('title'=>'BambooInvoice'));?> &copy; <?php echo date("Y");?> (<?php echo $this->lang->line('bambooinvoice_version');?> <?php echo $this->settings_model->get_setting('bambooinvoice_version');?>)</p>
			</div>
		</div>
	</div>
</div>
<?php if ($this->settings_model->get_setting('demo_flag') == 'y'):?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-316888-7";
urchinTracker();
// the link is available by now, 
if ($('bamboodownload')) {
	$('bamboodownload').onclick = function() {
		urchinTracker('bamboodownload');
		return true;
	}
}
</script>
<?php endif;?>
</body>
</html>