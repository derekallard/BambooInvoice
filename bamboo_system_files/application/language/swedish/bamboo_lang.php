<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Avbryt';
$lang['actions_change'] = 'Ändra';
$lang['actions_create_invoice'] = 'Skapa Faktura';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'Ta bort';
$lang['actions_edit'] = 'Redigera';
$lang['actions_required_fields'] = 'Fält som krävs';
$lang['actions_select_below'] = 'Välj nedan';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Faktura</span>';
$lang['bambooinvoice_version'] = 'Version';

$lang['clients_add_contact'] = 'Lägg till Kontakt';
$lang['clients_address1'] = 'Adress1';
$lang['clients_address2'] = 'Adress2';
$lang['clients_assigned_to_them'] = 'fakturor som tilldelats dem. Du håller på att <strong class="error"> permanent ta bort </ strong> den här kunden och <strong class="error"> alla fakturor som är associerade med dem </ strong>. Vill du verkligen göra detta?';
$lang['clients_cancel_add_contact'] = 'Avbryt Lägg till Kontakt';
$lang['clients_city'] = 'Stad';
$lang['clients_client_has'] = 'Den här Kunden har ';
$lang['clients_clients_registered'] = 'kunder registrerade';
$lang['clients_contact_add'] = 'Kunde inte lägga till den här kontakten. För-, efternamn och e-post krävs.';
$lang['clients_contact_delete_fail'] = 'Kunde inte radera den här kontakten.';
$lang['clients_contacts'] = 'Kontakter';
$lang['clients_country'] = 'Land';
$lang['clients_create_new_client'] = 'Skapa Ny Kund';
$lang['clients_created'] = 'Ny Kund Skapad';
$lang['clients_delete_all_invoices'] = 'Ta bort kund och alla fakturor';
$lang['clients_delete_client'] = 'Ta bort Kund';
$lang['clients_delete_contact'] = 'Ta bort Kontakt';
$lang['clients_deleted'] = 'Kunden raderad';
$lang['clients_deleted_error'] = 'Det gick inte att ta bort kunden'; 
$lang['clients_edit_client'] = 'Redigera Kund';
$lang['clients_edit_contact'] = 'Redigera Kontakt';
$lang['clients_edited'] = 'Kund uppdaterad';
$lang['clients_edited_contact_info'] = 'Kontaktinformationen uppdaterad';
$lang['clients_email'] = 'E-Post';
$lang['clients_first_name'] = 'Förnamn';
$lang['clients_id'] = 'Kund Id';
$lang['clients_last_name'] = 'Efternamn';
$lang['clients_name'] = 'Kundnamn';
$lang['clients_no_invoice_listed'] = 'Det finns inga kontakter för';
$lang['clients_notes'] = 'Notes';
$lang['clients_new_contact_fail'] = 'Det gick inte att lägga till den här kontakten. För-, efternamn och e-post krävs.';
$lang['clients_phone'] = 'Telefon';
$lang['clients_postal'] = 'Postnummer';
$lang['clients_province'] = 'Län';
$lang['clients_save_client'] = 'Spara Kund';
$lang['clients_to'] = 'till';
$lang['clients_update_client'] = 'Uppdatera Kund';
$lang['clients_website'] = 'Hemsida';
$lang['clients_you_have'] = 'Du har ';

$lang['error_date_fill'] = 'Fel i datum. Datum måste vara i formatet ÅÅÅÅ-MM-DD och antal måste vara siffror. Vänligen försök igen.';
$lang['error_date_format'] = 'Datumetet måste vara i formatet ÅÅÅÅ-MM-DD';
$lang['error_email_recipients'] = 'Välj minst en mottagare för den här fakturan';
$lang['error_field_required'] = 'Detta fält är ett krav';
$lang['error_login_password'] = 'Ange lösenord';
$lang['error_login_username'] = 'Ange användarnamn';
$lang['error_problem_editing'] = 'Det uppstod ett problem vid redigering av den här fakturan. Vänligen rapportera fel invoice_controller_edit';
$lang['error_problem_inserting'] = 'Problem att lägga in';
$lang['error_problem_saving'] = 'Ett problem uppstod när fakturan skulle sparas för att skickas.';
$lang['error_selection'] = 'Valet du gjorde innehåller inga fakturor.';

$lang['install_explain'] = 'Din e-post används både som &quot;användarnamn&quot;, inloggning och återställning av lösenord mm.  Du måste också välja ett lösenord att använda vid inloggning';
$lang['install_install'] = 'Installera';
$lang['install_welcome'] = 'Välkommen till BambooInvoice.  För att genomföra installationen kommer vi att samla in nödvändig information om dig.';

$lang['invoice_add_note'] = 'Add Note';
$lang['invoice_all_clients'] = 'Alla Kunder';
$lang['invoice_all_invoices'] = 'Alla Fakturor';
$lang['invoice_amount'] = 'Belopp';
$lang['invoice_amount_item'] = 'Belopp';
$lang['invoice_amount_error'] = 'Ange ett belopp';
$lang['invoice_amount_numbers_only'] = 'Enbart siffor är tillåtet';
$lang['invoice_bill_to'] = 'Faktura till';
$lang['invoice_client'] = 'Kund';
$lang['invoice_client_id'] = 'Kund Id';
$lang['invoice_closed'] = 'Stängd';
$lang['invoice_comment'] = 'Kommentar';
$lang['invoice_comment_success'] = 'Kommentar sparad.';
$lang['invoice_contact_add'] = 'Det finns inga kontakter att skicka fakturan till. För att lägga till, använd';
$lang['invoice_date_issued'] = 'Fakturadatum';
$lang['invoice_date_issued_full'] = 'Fakturadatum (i formatet ÅÅÅÅ-MM-DD)';
$lang['invoice_date_paid_full'] = 'Betaldatum (i formatet ÅÅÅÅ-MM-DD)';
$lang['invoice_email_demo'] = 'För att undvika missanvändning av demot, så skickas <em>inte</em> någon e-post. För att titta på det bifogade PDF dokumentet, välj &ldquo;generera faktura&rdquo; i menyn.';
$lang['invoice_email_invoice_to'] = 'Maila faktura till';
$lang['invoice_email_message'] = 'Maila meddelande';
$lang['invoice_email_no_recipient'] = 'Välj vem fakturan ska skickas till.';
$lang['invoice_email_success'] = 'Fakturan skickad. Fakturahistorik finner du nedan.';
$lang['invoice_export_to'] = 'Exportera fakturadata till';
$lang['invoice_generated_by'] = 'Fakturan genererad av';
$lang['invoice_history_comments'] = 'Fakturahistorik &amp; Kommentarer';
$lang['invoice_invoice'] = 'Faktura';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Fakturan Ta bortd';
$lang['invoice_invoice_edit_success'] = 'Fakturan redigerad';
$lang['invoice_is_tax_exempt'] = 'är momsfria';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'senast använda nummer ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Ny Faktura';
$lang['invoice_new_invoice_error'] = 'Nytt Faktura Fel';
$lang['invoice_new_invoice_to'] = 'Ny faktura till';
$lang['invoice_no_payments_entered'] = 'Inga betalningar har hänförts till denna faktura. För att ange en betalning, använda &quot;Ange Betalning&quot; alternativ på menyn.';
$lang['invoice_not_sent'] = 'Fakturan har ännu inte skickats till kunden. För att skicka denna faktura, använd &quot;Maila Faktura&quot; alternativet på menyn.';
$lang['invoice_not_taxable'] = 'Inte Beskattningsbar';
$lang['invoice_not_unique'] = 'Detta fakturanummer är inte unikt';
$lang['invoice_note'] = 'Faktura Anmärkning';
$lang['invoice_note_max_chars'] = '(max 255 bokstäver)';
$lang['invoice_no_invoice_match'] = 'Det finns inga fakturor i systemet som matchar kriteriet';
$lang['invoice_number'] = 'Fakturanummer';
$lang['invoice_open'] = 'Öppen';
$lang['invoice_or'] = 'eller';
$lang['invoice_or_new_client'] = 'eller ange en ny kund';
$lang['invoice_overdue'] = 'försenad';
$lang['invoice_overdue_invoices'] = 'försenade fakturor';
$lang['invoice_payment_enter'] = 'Ange betalning för';
$lang['invoice_payment_history'] = 'Betalningshistoria';
$lang['invoice_payment_success'] = 'Fakturabetalning utförd.';
$lang['invoice_payment_term'] = 'Betalningsvilkor';
$lang['invoice_premenently_delete'] = 'Du håller på att <strong class="error"> permanent ta bort </ strong> faktura';
$lang['invoice_problem_creating'] = 'Det uppstod ett problem med att skapa din faktura.';
$lang['invoice_quantity'] = 'Antal';
$lang['invoice_return_invoice_view'] = 'återgå till fakturaöversikt';
$lang['invoice_save_edited_invoice'] = 'Spara redigerads Faktura';
$lang['invoice_select_client'] = 'Välj kund';
$lang['invoice_send_to'] = 'Skicka den här fakturan till';
$lang['invoice_sent_to'] = 'Faktura skickad till';
$lang['invoice_status'] = 'Status';
$lang['invoice_summary'] = 'Sammanfattning';
$lang['invoice_sure_delete'] = 'Vill du verkligen göra detta?';
$lang['invoice_tax1_description'] = 'Namn på moms';
$lang['invoice_tax1_rate'] = 'Moms 1';
$lang['invoice_tax2_description'] = 'Namn på moms 2';
$lang['invoice_tax2_rate'] = 'Moms 2';
$lang['invoice_tax_exempt'] = 'OBS: Denna kund är skattefri';
$lang['invoice_tax_status'] = 'Momsstatus';
$lang['invoice_taxable'] = 'Beskattningsbar';
$lang['invoice_there_are_currently'] = 'Det är för närvarande';
$lang['invoice_total'] = 'Totalt';
$lang['invoice_work_description'] = 'Arbetsbeskrivning';
$lang['invoice_you_may_now'] = 'Du kan nu';
$lang['invoice_you'] = 'You';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Kontrollera att inte <em> Caps Lock </ em> är intryckt';
$lang['login_forgot_password'] = 'Glömt lösenord';
$lang['login_login'] = 'Logga in';
$lang['login_logout'] = 'Logga ut';
$lang['login_logout_confirm'] = 'Du håller på att logga ut. Vill du verkligen göra detta?';
$lang['login_logout_success1'] = "Du har blivit utloggad. Om du vill kan du";
$lang['login_logout_success2'] = 'logga in igen';
$lang['login_password'] = 'Lösenord';
$lang['login_password_confirm'] = 'Bekräfta lösenord';
$lang['login_password_email'] = "kan e-posta ditt lösenord till den e-postadress du har registrerat med. Om du har glömt det och vill nollställa lösenordet fyller du bara i formuläret nedan.";
$lang['login_password_email1'] = 'Ditt lösenord är nu ändrat. Ditt nya lösenord är';
$lang['login_password_email2'] = 'och kan nu användas till';
$lang['login_password_fail'] = "Något gick fel. Jag vet att detta inte är en stor hjälp och det ser ut som en del felsökning behövs";
$lang['login_password_reset_demo'] = 'I demo-versionen är detta avaktiverat, men du skulle ha fått ett mail med återställningsinformation.';
$lang['login_password_reset_disabled'] = 'I demo-versionen är lösenordsåterställning avaktiverat.';
$lang['login_password_reset_email1'] = 'Någon (förmodligen du) har begärt ett lösenord för ditt BambooInvoice konto.';
$lang['login_password_reset_email2'] = 'För att återställa det nu, följ denna länk till vår hemsida:';
$lang['login_password_reset_email3'] = "Om det inte är du som gjort denna begäran, kan du helt enkelt bortse från detta mail och vi beklagar för att ha besvärat dig i onödan.";
$lang['login_password_reset_title'] = 'BambooInvoice Lösenordsåterställning';
$lang['login_password_reset_unable'] = 'Det går inte att återställa ditt lösenord. Vänligen försök igen.';
$lang['login_password_sent'] = 'Lösenordsbekräftelse har skickats till';
$lang['login_password_submit'] = 'Skicka lösenord';
$lang['login_password_success'] = 'Ditt lösenordsbyte lyckades och har nu skickats.';
$lang['login_remember_me'] = 'Kom ihåg mig';
$lang['login_username'] = 'E-post';
$lang['login_wrong_password'] = 'Användarnamn eller lösenord kunde inte hittas eller var felaktigt. Vänligen försök igen.';

$lang['menu_bugs'] = 'Buggar';
$lang['menu_catchphrase'] = 'Enkel, <br /> Vacker, <br /> Öppen källkod, <br /> Online Fakturering';
$lang['menu_catchphrase_nobreak'] = 'Enkel, vacker, Öppen källkod, Online Fakturering';
$lang['menu_changelog'] = 'Förändringar';
$lang['menu_clients'] = 'Kunder';
$lang['menu_credits'] = 'Krediter';
$lang['menu_delete_invoice'] = 'Ta bort Faktura';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Visste du att?';
$lang['menu_edit_invoice'] = 'Redigera Faktura';
$lang['menu_email_invoice'] = 'Maila Faktura';
$lang['menu_enter_payment'] = 'Ange Betalning';
$lang['menu_faq'] = 'Vanliga frågor';
$lang['menu_generate_pdf'] = 'Generera PDF';
$lang['menu_help'] = 'Hjälp';
$lang['menu_invoice_summary'] = 'Faktura Sammanfattning';
$lang['menu_invoices'] = 'Fakturor';
$lang['menu_logout'] = 'Logga ut';
$lang['menu_new_invoice'] = 'Ny Faktura';
$lang['menu_print_invoice'] = 'Skriv ut Faktura';
$lang['menu_private_note'] = 'Private Note';
$lang['menu_reports'] = 'Rapporter';
$lang['menu_roadmap'] = 'Roadmap';
$lang['menu_root_system'] = 'Rotsystem';
$lang['menu_see_also'] = 'Se även';
$lang['menu_settings'] = 'Inställningar';
$lang['menu_utilties'] = 'Extras';

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Genererad av';

$lang['reports_back_to_reports'] = 'tillbaka till rapporter';
$lang['reports_collected'] = 'insamlade';
$lang['reports_end_date'] = 'Slutdatum (ÅÅÅÅ-MM-DD)';
$lang['reports_first_quarter'] = 'första kvartalet';
$lang['reports_fourth_quarter'] = 'fjärde kvartalet';
$lang['reports_generate_report'] = 'Generera rapport';
$lang['reports_invoices_issued_year'] = 'fakturor som utfärdats i år';
$lang['reports_legend'] = 'Bildtext';
$lang['reports_second_quarter'] = 'andra kvartalet';
$lang['reports_start_date'] = 'Startdatum (ÅÅÅÅ-MM-DD)';
$lang['reports_third_quarter'] = 'tredje kvartalet';
$lang['reports_year_to_date'] = 'Från årets början';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'Årsvis Resultaträkningar';

$lang['settings_account_settings'] = 'Kontoinställningar'; 
$lang['settings_invoice_settings'] = 'Fakturainställningar';
$lang['settings_advanced_settings'] = 'Avancerade inställningar';

$lang['settings_company_name'] = 'Företagsnamn';
$lang['settings_currency_symbol'] = 'Valutasymbol';
$lang['settings_currency_type'] = 'Valutatyp';
$lang['settings_days_payment_due'] = 'Dagar tills fakturan ska betalas';
$lang['settings_default_note'] = 'Standardanmärkning på faktura';
$lang['settings_display_branding'] = 'Visa BambooInvoice märke';
$lang['settings_logo'] = 'Logga';
$lang['settings_modify_fail'] = 'Ett problem uppstod vid ändring av dina inställningar';
$lang['settings_modify_success'] = 'Inställningarna har ändrats';
$lang['settings_note_max_chars'] = '(max 255 bokstäver)';
$lang['settings_primary_contact'] = 'Primär Kontakt';
$lang['settings_primary_email'] = 'Primär Kontakt E-post';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Spara Inställningar';
$lang['settings_save_invoices'] = 'Spara Fakturor';
$lang['settings_save_invoices_warning'] = '<strong> Varning: </ strong> Stänger du av den här försvinner alla sparade fakturor.';
$lang['settings_settings_default'] = 'Dessa inställningar är standardvalet';
$lang['settings_short_language'] = 'se';
$lang['settings_tax_code'] = 'Ditt momsnummer';
$lang['settings_will_use'] = 'kommer att användas när du skapar fakturor eller kunder.';

$lang['utilities_download_backup'] = 'Download backup';
$lang['utilities_automatic_version_check'] = 'Kontrollera automatiskt om det finns en nyare version';
$lang['utilities_phpinfo'] = 'PHP information';
$lang['utilities_phpinfo_not_available'] = 'Den här funktionen finns inte i demot.';
$lang['utilities_new_version_available'] = "En ny version of BambooInvoice är nu tillgänglig. "; 
$lang['utilities_up_to_date'] = "Du har den senaste versionen av BambooInvoice.";
$lang['utilities_connection_failed'] = "Det gick inte att ansluta till http://bambooinvoice.org.";
$lang['utilities_version_check'] = "Leta efter uppdateringar";
$lang['utilities_version_undetermined'] = "Versionstatus kunde inte fastställas."; 

$lang['menu_did_you_know_quotes'] = array(
										'BambooINVOICE har forum på forums.bambooinvoice.org för support, funktionen begäran och chat.',
										'BambooINVOICE är släppt under GPL-licens.',
										'Dina inställningar kan ändras när som helst via menyn Inställningar.',
										'Hjälperfiler förnyas varje dag. Besök BambooINVOICE.org för den senaste versionen!',
										'Du kan skapa en ny klient från Kunder-menyn eller precis innan du skapar en faktura!', 
										'En enda planta av bambu från ett etablerat rotsystem når vanligtvis full höjd på bara ett år!',
										'Bambuplantans livslängd har gjort den till en kinesisk symbol för långt liv, och i Indien en symbol för vänskap.'
					);

?>