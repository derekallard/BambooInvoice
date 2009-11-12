<?php
$this->load->view('header');
?>

<h2><a id="top"></a><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<div class="work_description">
	<p>
		<strong><?php echo $this->lang->line('menu_see_also');?>:</strong><br />
		<?php echo anchor ('changelog', $this->lang->line('menu_changelog'));?>
	</p>
</div>

<?php if ($this->lang->line('notice_english_only') != ''):?>
	<p class="error"><?php echo $this->lang->line('notice_english_only');?></p>
<?php endif;?>

<h3><a id="credits"></a><?php echo $this->lang->line('menu_credits');?></h3>

<p><?php echo $this->lang->line('bambooinvoice_logo');?> 
  was developed by <a href="http://www.derekallard.com/">Derek Allard</a>. It is built on top of the excellent <a href="http://www.codeigniter.com/">CodeIgniter</a> <acronym title="Hypertext Preprocessor">PHP</acronym> framework. I'd like to gratefully acknowledge <a href="http://www.cubist.ca/">Cliff Persaud</a> for his input and insight into the design the <?php echo $this->lang->line('bambooinvoice_logo');?> logo. </p>

<p>To contact the author, write <span id="emailaddr">info [at] bambooinvoice [dot] org</span>, but if you are looking for technical assistance, please use the <a href="http://forums.bambooinvoice.org">Forums</a>.  Need help, want to chat?  Come visit us.</p>

<p><strong>Very special thanks to:</strong></p>

<ul>
	<li><a href="http://www.ci2.ca">Marc Arbour</a> for French translation</li>
	<li><a href="http://www.alexwilliams.ca/">Alex Williams for French translation</a></li>
	<li><a href="http://www.michael-schlieper.de">Micha Schlieper</a> for German translation</li>
	<li>Willem de Boer for Dutch translation</li>
	<li><a href="http://www.cruzate.com">Victor Cevic</a> for Spanish translation</li>
	<li><a href="http://www.sogotech.com/">SoGo   Technology</a> for Romanian translation</li>
	<li><a href="http://www.finazzodevelopmentgroup.com/">Matt Finazzo</a></span> for Portuguese translation</li>
	<li><a href="http://www.boxless.info/">Todor Georgiev</a> for the Bulgarian translation</li>
	<li><a href="http://www.pascalkriete.com/">Pascal Kriete</a> for additional German refinements</li>
	<li><a href="http://www.nektarin.se/">Mikael Johansson</a> for the Swedish translation</li>
	<li>Bitmap for Italian translation</li>
	<li><a href="http://www.gratisdomaene.tk/">René Gylling</a> for the Danish translation</li>
	<li>Madis Mihkelsoo for the Estonian translation</li>
</ul>

<p>[ <a href="#top">back to top</a> ] </p>

<?php
$this->load->view('footer');
?>