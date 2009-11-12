<?php
$this->load->view('header');
?>
<h2><a id="top"></a><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<div class="work_description">
	<p>
		<strong><?php echo $this->lang->line('menu_see_also');?>:</strong><br />
		<?php echo anchor ('credits', $this->lang->line('menu_credits'));?> | <?php echo anchor ('changelog', $this->lang->line('menu_changelog'));?>
	</p>
</div>

<?php if ($this->lang->line('notice_english_only') != ''):?>
	<p class="error"><?php echo $this->lang->line('notice_english_only');?></p>
<?php endif;?>

<p>There are forums available for support at <a href="http://forums.bambooinvoice.org">forums.bambooinvoice.org</a>. Come and share your thoughts and chat. </p>

<ul>
	<li><a href="#q1">What is the difference between &quot;open&quot;, &quot;overdue&quot;, &quot;closed&quot; and &quot;all&quot; invoices?</a></li>
	<li><a href="#q2">How much does <?php echo $this->lang->line('bambooinvoice_logo');?> cost?</a></li>
	<li><a href="#credits">Who built <?php echo $this->lang->line('bambooinvoice_logo');?>?</a></li>
	<li><a href="#q4">Can I control the look of my invoices?</a></li>
</ul>

<h3><a id="faq"></a><?php echo $this->lang->line('menu_faq');?></h3>

<ul>
	<li><a id="q1"></a><strong>What is the difference between &quot;open&quot;, &quot;overdue&quot;, &quot;closed&quot; and &quot;all&quot; invoices?</strong><br />
	Open invoices are invoices for which you have not received payment, but it has been less then 30 days. Overdue invoices have not been paid in over 30 days. Closed invoices have been paid. All is simply a listing of every invoice you've issued. [ <a href="#top">back to top</a> ] </li>
	<li><a id="q2"></a><strong>How much does <?php echo $this->lang->line('bambooinvoice_logo');?> cost? </strong><br />
	There is no cost to use this application for any reason. It is free as in speech, and free as in <a href="http://www.millstreetbrewery.com/">beer</a>  <?php echo $this->lang->line('bambooinvoice_logo');?> is released under the <a href="http://www.gnu.org/copyleft/gpl.html"><acronym title="GNU Public License">GPL</acronym></a>. [ <a href="#top">back to top</a> ] </li>
	<li><a id="q4"></a><strong>Can I control the look of my invoices?</strong><br />
	Currently, the look of the <acronym title="Portable Document Format">PDF</acronym> file is <em>easily</em> changed.  If you can write <acronym title="Extensible Hypertext Markup Language">XHTML</acronym>, then you can alter your invoice.  The look of the onscreen invoice would require a bit of code hacking... but even that's very straight forward! [ <a href="#top">back to top</a> ] </li>
</ul>

<p>[ <a href="#top">back to top</a> ] </p>

<?php
$this->load->view('footer');
?>