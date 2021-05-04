<?php
$this->load->view('header');
?>
<h2><a id="top"></a><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<div class="work_description">
	<p>
		<strong><?php echo $this->lang->line('menu_see_also');?>:</strong><br />
		<?php echo anchor ('credits', $this->lang->line('menu_credits'));?>
	</p>
</div>

<?php if ($this->lang->line('notice_english_only') != ''):?>
	<p class="error"><?php echo $this->lang->line('notice_english_only');?></p>
<?php endif;?>

<h3><a id="changelog"></a><?php echo $this->lang->line('menu_changelog');?></h3>

<h4>From 0.8.8 to 0.8.9 (Released April 15, 2009)</h4>

<ul>
	<li>Updated to CodeIgniter 1.7.1.</li>
	<li>Added an option (on by default) to display the first 50 characters (approximately) of the first item of any invoice on the invoices summary page.</li>
	<li>The invoice filename is now saved with the i18n version of "invoice".</li>
	<li>Reports can now do any year, and not only the current year.</li>
	<li>Fixed a bug where password potentially got double encoded during reset.</li>
	<li>Fixed a bug where tax exempt clients had the tax checkbox checked when creating a new item.</li>
	<li>Fixed a bug where quotes were converted to ? in the PDF.</li>
	<li>Fixed a possible rounding error when retrieving all invoices.</li>
	<li>Fixed a bug when resetting the password of an admin who isn't the primary.</li>
	<li>Added in a few more language keys for untranslated text.</li>
	<li>Optimized the login process, should be quicker now (but I doubt any human would notice... robots on the other hand, those guys are crafty).</li>
	<li>Added a hidden config variable to customize the filename of the database backup file.</li>
	<li>Moved "blind copy me on this email", and "donate" into a language variable.</li>
	<li>Added Estonian language pack.</li>
	<li>Modified DOMPDF to make it run a bit faster by fixing a uniqid() call.</li>
	<li>Removed ".00" from quantity listings, so now a quantity of "5.00" will simply say "5".</li>
	<li>Removed the "work description" heading before the table on invoice views. I feel it was superfluous.</li>
	<li>Removed an inadvertent "database backup" heading from utilities.</li>
	<li>Informational messages such as "invoice successfully edited" will no longer print.</li>
	<li>Changed the maximum length of invoices to 50 characters.</li>
	<li>Date formatting is now configurable via a hidden config option.</li>
	<li>Increased spacing in invoice item lines for added readability.</li>
	<li>Increased the invoice note field to 2000 characters.</li>
	<li>Dutch language pack is now improved.  Thanks to <a href="http://www.dmsdesigns.nl">Ilco Everraert</a>.</li>
	<li>French language pack is now improved.  Thanks to Jeremy Bunlon.</li>
	<li><em>Behaviour change</em>: prior to 0.8.9, changing the email under settings would only change the address used when sending emails, and not the login email. Changing it now also changes the login.</li>
</ul>

<h4>From 0.8.7 to 0.8.8 (Released December 22, 2008)</h4>

<ul>
	<li>Updated to CodeIgniter 1.7.0.</li>
	<li>Added the ability to duplicate invoices.</li>
	<li>Added the ability to have multiple admin accounts.</li>
	<li>Enabled email functionality to work after an invoice is closed.</li>
	<li>Invoices now detail amount paid and owing if an invoice has partial payments applied to it.</li>
	<li>The date an invoice is due is now visible on the invoice itself beside "payment terms".</li>
	<li>Expanded the email field for client contacts to 127 characters.</li>
	<li>Added "tax code" to the information about a client, particularly useful for countries that require printing a client's taxcode by law.</li>
	<li>Added the hidden config variable "<kbd>$config['currency_decimal'] = '.';</kbd>" to allow the separator between dollars and cents to be a non '.' if wanted.  For example: $24.67 vs $24,67 vs $24_67... or whatever.</li>
	<li>Added a hidden config variable to allow output of a profiler on each page... if you're hacking Bamboo, enable <kbd>$config['show_profiler'] = TRUE;</kbd></li>
	<li>Moved invoice payment into model.</li>
	<li>Added a Danish language pack (thanks <a href="http://www.gratisdomaene.tk/">René Gylling</a>!), but it still uses English system messages.</li>
	<li>Added a 'logo_base_url' hidden configuration option to force the image path on some servers for PDF generation.</li>
	<li>Updated Swedish language pack (thanks <a href="http://www.nektarin.se/">Mikael Johansson</a>!)</li>
	<li>Restructured the logic of settings to catch some additional errors.</li>
	<li>Added a unique invoice number check in.</li>
	<li>Added the ability to have negative taxes.</li>
	<li>Added some formatting changes to address if fields such as city are left blank</li>
	<li>Added a new language key for "Amount" for items, vs for the whole invoice: <kbd>$lang['invoice_amount_item']</kbd></li>
	<li>The whole system is now subclassed under a new controller for login and other tasks.</li>
	<li>Fixed a bug where incorrect maxlengths were added to client contact information.</li>
	<li>Fixed a bug where accented characters would display garbled in some fields.</li>
	<li>Fixed a link generated over Ajax that may be broken on some server setups.</li>
	<li>Fixed a bug where total wasn't updated after an item was removed.</li>
	<li>Fixed a bug where some international characters were getting double encoded in payment notes and private history.</li>
	<li>Fixed a bug where settings would report an error if no update was made.</li>
	<li>The ongoing task of cleaning up code still continues... and I absolutely <em>must</em> get Bamboo into jQuery and out of scriptaculous (its a personal preference, there's nothing technically wrong with scripto).</li>
</ul>

<h4>From 0.8.6 to 0.8.7 (Released August 25, 2008)</h4>

<ul>
	<li>Naming changes on "private" invoice notes.</li>
	<li>Further adjustments to how logos get included.	I think this time all the issues are resolved.</li>
	<li>Uploading a logo now changes both the web and PDF views.</li>
	<li>Fixed a javascript error when attempting to add items in invoice edit mode.</li>
	<li>Fixed a bug where the euro wasn't decoded correctly.</li>
	<li>Fixed a bug where tax_status wasn't honoured when editing an invoice.</li>
	<li>Fixed an error where the remove item image wasn't loading in some situations.</li>
	<li>Moved settings_validation, clients_validation, client_contact_validation, invoice_edit_validation, and invoice_validation into private functions respective controllers.</li>
	<li>Disabled auto-completing in invoice creation.</li>
	<li>Globally changed $invoiceNumber to $invoice_number (including javascript and database columns), $invoiceData to $invoice_data, $invoiceItems to $invoice_items</li>
	<li>Globally changed getSetting() to get_setting(), getAllClientInfo() to get_client_info().</li>
	<li>Moved "download backup" to a language variable.</li>
	<li>Moved logo insertion code into a centralized location.</li>
	<li>Added "Edit" option to Ajax client contact creation, move text into language variables.</li>
	<li>Specified that logo inserts must be jpg or gif for PDF creation.</li>
	<li>Fixed a stray call that was generating csv data twice</li>
	<li>Flushed out new version check tool in utilities. Its functional now.</li>
	<li>Removed the unused views simple_header and simple_footer</li>
	<li>Removed "help" link from upper right. It never materialized as I imagined it would.</li>
	<li>The ongoing task of cleaning up code continues...</li>
</ul>

<h4>From 0.8.5 to 0.8.6 (Released July 15, 2008)</h4>

<ul>
	<li>CodeIgniter 1.6.3 upgrade.</li>
	<li>Added custom logo upload feature.</li>
	<li>Added password change functionality.</li>
	<li>Added tax code to invoice view and PDF.</li>
	<li>Added a new version check tool into utilities.</li>
	<li>Added a hidden config variable to allow invoice numbers to be controlled by client, and not globally.</li>
	<li>Fixed a bug when generating reports with no invoices.</li>
	<li>Fixed a bug where a single invoice view wasn't accounting for configured days overdue when reporting how overdue it was.</li>
	<li>Moved most of the pagination configuration into config/pagination.php.</li>
	<li>Removed hardcoded english text from invoice_table_inc,	retrieve_invoices() function, and settings page.</li>
	<li>Fixed up the CSS to work on very wide resolutions (Man I love my iMac...).</li>
	<li>Fixed a bug where tax status was not honoured for invoice items.</li>
	<li>Fixed some rounding error that may cause closed and paid invoices.</li>
	<li>Reduced a lot of duplicated code in the invoice retrieval functions.</li>
	<li>Fixed a bug where status was hardcoded to 30 days when viewing individual invoices.</li>
	<li>Fixed a layout issue, where low resolution monitors had invoice items overflowing.</li>
	<li>Moved some items out of &quot;common_assets&quot; view group and removed &quot;inc&quot; from filename
		<ul>
			<li>loginform moved to login.</li>
			<li>invoice_new moved to invoices.</li>
			<li>invoice_table moved to invoices.</li>
		</ul>
	.</li>
	<li>Moved export options out of invoices and into utilities.</li>
	<li>Removed views for all, open, overdue, closed and replaced with a single status_view.php.</li>
	<li>Added a password confirm field to the installer.</li>
	<li>Removed invoice_status_menu, sub_menu, invoice_action_menu.</li>
	<li>Fixed a bug where client notes could not be left blank.</li>
	<li>Fixed a bug where clients with no invoices generated an error when deleted.</li>
	<li>Fixed a bug where password reset was referencing a non existing function getContactId().</li>
	<li>Cleaned up forgotten password view a bit.</li>
	<li>Italian language pack added.</li>
</ul>

<h4>From 0.8.4 to 0.8.5 (Released May 20, 2008)</h4>

<p><strong>IMPORTANT NOTE:</strong> The update to 0.8.5 requires that you are already on 0.8.3 or 0.8.4 - unlike previous versions, Bamboo <em>will not</em> walk you through incremental updates (ie: from 0.8.1 to 0.8.2 and then to 0.8.3).</p>

<ul>
	<li>Added per invoice Notes functionality.</li>
	<li>Added Client Notes functionality.</li>
	<li>Added a proper installer, much sexier and easier. Bamboo now uses DB Forge and fully supports table prefixes (hardcoded SQL previously didn't allow for this).</li>
	<li>Added full and true database prefix abstracting. There were several places where SQL was hardcoded... messing things up tremendously.</li>
	<li>Turned off logging by default. Non-writable folders where causing a lot of grief for people.</li>
	<li>Fixed a bug where reports used 30 days as the overdue date, instead of the user defined limit.</li>
	<li>Fixed a bug where invoices spanning over more then 1 page generated an error.</li>
	<li>Fixed a bug where the &quot;forgot your password&quot; link pointed to the wrong location.</li>
	<li>A few CSS tweaks.</li>
	<li>Some code cleanup.</li>
	<li>Swedish language pack added.</li>
</ul>


<h4>From 0.8.3 to 0.8.4 (April 10, 2008)</h4>

<ul>
	<li>Made most fields in settings optional.</li>
	<li>Bamboo now tries to increase the available PHP memory for PDF generation.</li>
	<li>Added support for partial quantity units.</li>
	<li>Fixed a bug in reports where it was miscalculating the total.</li>
	<li>Fixed a bug when creating new items in IE.</li>
	<li>Changed a few language keys.</li>
</ul>


<h4>From 0.8.2 to 0.8.3</h4>

<ul>
	<li>Added itemized invoice capability. This involved a major re-architecting of the underlying code.</li>
	<li>Added per item tax information (you can mark individual items as taxable or not) .</li>
	<li>Some models autoloaded now.</li>
	<li>Removed the deprecated &quot;scripts&quot; used.</li>
	<li>Added a monthly title when looking at invoices in summary format to quickly tell invoices from different months.</li>
	<li>Added some additional checks to prevent accidental editing of administrator data.</li>
	<li>Added a settings option to toggle on and off &quot;Invoice generated by BambooInvoice&quot; from the footer of invoices.</li>
	<li>Added the ability to save PDF invoices on the server .</li>
	<li>Added a utilities panel to the root system.</li>
	<li>Added a database backup tool to utilities.</li>
	<li>Added a PHP info tool to utilities.</li>
	<li>Added Portuguese as a language option.</li>
	<li>Added Bulgarian as a language option.</li>
	<li>Bamboo now uses your setting for &quot;days due&quot; to determine if an invoice is overdue or not.</li>
	<li>Intelligent handling of &quot;days due&quot; when displaying invoice status.</li>
	<li>Modified the layout and behaviour of the settings menu.</li>
	<li>Modified a few error messages to give clearer meanings.</li>
	<li>Fixed a bug that caused the logo to not load into the PDF on some setups .</li>
	<li>Fixed a bug that caused &quot;€&quot; to render as glitch in the PDF .</li>
	<li>Fixed a bug that prevented some cc'ing when sending.</li>
	<li>Fixed a bug that prevented	special characters from rendering in a client name when searching dynamically .</li>
	<li>Fixed a bug that caused an error when invoice number was left blank.</li>
	<li>Fixed a bug that caused overpaid invoices not to register as closed, in fact - rebuilt most of the &quot;status&quot; code to eliminate bugs .</li>
</ul>


<h4><strong>Notes</strong></h4>

<ul>
	<li>In order to accommodate itemized invoices, amount, work_description, and some tax information was migrated to a new table &quot;invoice_items&quot;.</li>
	<li>Previously, due to an oversight, an invoice was considered &quot;closed&quot; if the amount paid was &gt;= the amount owing <em>not considering</em> tax. This has been changed. For example, a $100 invoice with $7 tax will not be considered &quot;closed&quot; until $107 (or more) is entered in the payment. Previously, $100 would have marked it closed. .</li>
	<li>Some lines lack appropriate translation, or are machine translated. I'd be grateful for any improvements non-English speakers could suggest.</li>
</ul>

<h4>From 0.8.1 to 0.8.2 (released Sept 13, 2007) </h4>

<ul>
	<li>Change to flashdata instead of standard userdata for sessions,	reducing the code volume and complexity.</li>
	<li>Many settings such as address are no longer required fields .</li>
	<li>Code cleanup, and moved many more queries into models (that's getting old now, I know).</li>
	<li>Added a few more missing language variables, around user messages in client creation.</li>
	<li>Changed meta tags to noindex for the non-demo version of Bamboo to prevent accidental search engine inclusion .</li>
	<li>Romanian language file.</li>
	<li>Fixed a bug in the dutch language file causing headers not to be sent.</li>
	<li>Fixed a bug that caused an error when invoices were only mailed to yourself.</li>
	<li>Fixed a bug that sometimes incorrectly reported closed and overdue invoices .</li>
	<li>Fixed a bug where change the date paid wasn't sticking.</li>
	<li>Fixed a bug where some closed invoices weren't registering as such in the non-ajax calls .</li>
	<li>Fixed a bug where the logo didn't go on the PDF invoice (D&eacute;j&agrave; vu all over again...) .</li>
</ul>

<h4>From 0.8.0a to 0.8.1</h4>

<ul>
	<li>Code cleanup, and moved many more queries into models .</li>
	<li>Adjusted the maximum length of the username and password fields to allow for 50 and 100 respectively.</li>
	<li>Change in the PDF plugin helper for greater compatibility.</li>
	<li>Removed the default user/pass from the login page for non-demo uses.</li>
	<li>Added Spanish as a language .</li>
	<li>Fixed a bug where some currency symbols weren't recognized .</li>
</ul>

<h4>From 0.8.0 to 0.8.0a</h4>

<ul>
	<li>Fixed a bug where textarea newlines were converted into '\n'.</li>
	<li>Added a few missing language variables.</li>
	<li>Fixed a bug where the calendar wasn't changing dates.</li>
	<li>Added Dutch as a language .</li>
</ul>


<h4>From 0.76 to 0.8.0</h4>

<ul>
	<li>Quarterly reports added.</li>
	<li>Year to Date graph added.</li>
	<li>Significant overhaul to the way languages are handled to allow for internationalization .</li>
	<li>Added language files for French and German .</li>
	<li>Added ability to customize the currency symbol (ie: $ vs &#163; vs &#165;).</li>
	<li>Fixed up the password reset option, and enabled it.</li>
	<li>Added bambooinvoice_version flag for easier upgrade path.</li>
	<li>Added a demo_flag for easier developer maintenance. When set to &quot;y&quot; Bamboo runs in demo mode.</li>
	<li>Added configurable date-based reports.</li>
	<li>Added an actual changelog page.</li>
	<li>Removed the "payment terms" option for individual invoices, and implemented a global preference.</li>
	<li>Cleaned up some <del>grammer</del> <ins>grammar</ins>, spelling, and wording .</li>
	<li>Updated the userguide to reflect recent changes.</li>
	<li>Removed short tag references for greater compatibility.</li>
	<li>Added a routine to install to check for required PHP versions, libraries, and writable folders.</li>
	<li>Fixed a bug where the wrong invoice number was reported when deleting.</li>
	<li>Fixed a bug where closed was reporting non-closed invoices.</li>
	<li>Fixed a bug where export to XML defaulted to wrong data.</li>
	<li>Fixed a bug where the logo didn't go on the PDF invoice.</li>
	<li>Fixed a bug where page_title didn't show in settings.</li>
	<li>Removed many unused legacy files, scripts and functions, and better organized some files.</li>
	<li>Moved Bamboo to CodeIgniter 1.5.4, resulting in numerous security and stability enhancements.</li>
</ul>


<h4>From 0.75 to 0.76</h4>

<ul>
	<li>Upgraded to CodeIgniter 1.5.3.</li>
	<li>Fixed and enhanced reporting functionality.</li>
	<li>Squashed a few bugs.</li>
	<li>Squashed more bugs.</li>
	<li>Boy, many bugs got squashed	 .</li>
	<li>Added a few new model functions to allow for more potent reports down the road	 .</li>
</ul>


<h4>From 0.73 to 0.75</h4>

<ul>
	<li>Upgraded to CodeIgniter 1.5.2 .</li>
	<li>Fixed a bug preventing email from being sent.</li>
	<li>Changed the userauth system to simplify it.</li>
	<li>Fixed a bug in PDF generation .</li>
</ul>

<h4>From 0.72 to 0.73</h4>

<ul>
 <li>Further code cleanup.</li>
 <li>Remove all known outstanding bugs .</li>
</ul>


<h4>From 0.71 to 0.72</h4>

<ul>
 <li>Bug fixes, changes related to installing in non-root environment .</li>
</ul>

<h4>From 0.7 to 0.71</h4>

<ul>
 <li>Some minor code cleanup.</li>
 <li>Invoice homepage AJAX bug fixed.</li>
 <li>Included missing .htaccess file in download .</li>
</ul>

<h4>From 0.6 to 0.7 </h4>

<ul>
 <li>Upgraded from CodeIgniter 1.32 to 1.33.</li>
 <li>Fixed a few bugs and streamlined a bit of code.</li>
 <li>Modified code so that BambooInvoice can install in any sub directory or alias.</li>
 <li>Wrote installation script.</li>
 <li>Graphical installation guide .</li>
</ul>

<?php
$this->load->view('footer');
?>