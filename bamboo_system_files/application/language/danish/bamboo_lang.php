<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Afbryd';
$lang['actions_change'] = 'Ændre';
$lang['actions_create_invoice'] = 'Opret Faktura';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'Slet';
$lang['actions_edit'] = 'Rediger';
$lang['actions_required_fields'] = 'Obligatoriske felter';
$lang['actions_select_below'] = 'Vælg herunder';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Faktura</span>';
$lang['bambooinvoice_version'] = 'Version';

$lang['clients_add_contact'] = 'Tilføj Kontaktperson';
$lang['clients_address1'] = 'Adresse1';
$lang['clients_address2'] = 'Adresse2';
$lang['clients_assigned_to_them'] = 'fakturaer tildelt dem. Du er ved at <strong class="error">permanent slette</strong> denne klient, og <strong class="error">enhver faktura der tilhører dem</strong>. Er du sikker på at du vil gøre dette?';
$lang['clients_cancel_add_contact'] = 'Afbryd Tilføj Kontaktperson';
$lang['clients_city'] = 'By';
$lang['clients_client_has'] = 'Denne klient har ';
$lang['clients_clients_registered'] = 'registreret klienter';
$lang['clients_contact_add'] = ' Ude af stand til at tilføre denne kontaktperson. Bemærk, at fornavn, efternavn og en gyldig e-mail er påkrævet.';
$lang['clients_contact_delete_fail'] = 'Ude af stand til at slette denne kontakt person.';
$lang['clients_contacts'] = 'Kontaktpersoner';
$lang['clients_country'] = 'Land';
$lang['clients_create_new_client'] = 'Opret ny Klient';
$lang['clients_created'] = 'Ny Klient tilføjet';
$lang['clients_delete_all_invoices'] = 'Slet klient og alle tilhørende faktura';
$lang['clients_delete_client'] = 'Slet Klient';
$lang['clients_delete_contact'] = 'Slet Kontaktperson';
$lang['clients_deleted'] = 'Klient er blevet slettet';
$lang['clients_deleted_error'] = 'Klienten kunne ikke slettes'; 
$lang['clients_edit_client'] = 'Rediger Klient';
$lang['clients_edit_contact'] = 'Rediger Kontaktperson';
$lang['clients_edited'] = 'Klienten er blevet redigeret';
$lang['clients_edited_contact_info'] = 'Kontakt Information er blevet opdateret';
$lang['clients_email'] = 'Email';
$lang['clients_first_name'] = 'Fornavn';
$lang['clients_id'] = 'KundeID';
$lang['clients_last_name'] = 'Efternavn';
$lang['clients_name'] = 'Klient Navn';
$lang['clients_no_invoice_listed'] = 'Der er i øjeblikket ingen kontaktpersoner opført for';
$lang['clients_new_contact_fail'] = 'Ude af stand til at tilføje denne kontaktperson. Bemærk, at fornavn, efternavn og en gyldig e-mail er påkrævet.';
$lang['clients_notes'] = 'Noter';
$lang['clients_phone'] = 'Telefon';
$lang['clients_postal'] = 'Postnummer';
$lang['clients_province'] = 'Provins/Stat';
$lang['clients_save_client'] = 'Gem Klient';
$lang['clients_title'] = 'Titel';
$lang['clients_to'] = 'til';
$lang['clients_update_client'] = 'Opdater Klient';
$lang['clients_website'] = 'Hjemmeside';
$lang['clients_you_have'] = 'Du har ';

$lang['error_date_fill'] = 'Der syntes at være fejl. Bemærk, at datoen skal være i formatet ÅÅÅÅ-MM-DD, og beløbet skal være et tal. Gå tilbage og prøv igen.';
$lang['error_date_format'] = 'Datoen skal være i formatet ÅÅÅÅ-MM-DD';
$lang['error_email_recipients'] = 'Vælg mindst 1 modtager for denne faktura';
$lang['error_field_required'] = 'Dette felt skal udfyldes';
$lang['error_login_password'] = 'Indtast et kodeord';
$lang['error_login_username'] = 'Indtast et brugernavn';
$lang['error_problem_editing'] = 'There was a problem editing this invoice. Please report error invoice_controller_edit';
$lang['error_problem_inserting'] = 'Problemer med at indsætte';
$lang['error_problem_saving'] = 'Der var problemer med at gemme fakturaen til afsendelse.';
$lang['error_selection'] = 'Udvælgelsen du lavede havde ikke nogen fakturaer i det.';

$lang['install_explain'] = 'Din email bruges både som din &quot;username&quot; for at logge ibnd, og ligeledes for enhver email opgave, såsom at sende fakturaer, nulstilling af adgangskoder osv. den primære kontaktpersons navn bruges i &quot;from&quot; området, når der sender fakturaer via e-mail.';
$lang['install_install'] = 'Installere';
$lang['install_welcome'] = 'Velkommen til '.$lang['bambooinvoice_logo'].'.  For at installere bliver jeg nødt til at samle nogle få ting om dig.';

$lang['invoice_add_note'] = 'Tilføj Note';
$lang['invoice_all_clients'] = 'Alle Klienter';
$lang['invoice_all_invoices'] = 'Alle Fakturaer';
$lang['invoice_amount'] = 'Beløb';
$lang['invoice_amount_item'] = 'Beløb';
$lang['invoice_amount_error'] = 'Venligst indtast et beløb';
$lang['invoice_amount_numbers_only'] = 'kun tal';
$lang['invoice_amount_paid'] = 'Beløb betalt';
$lang['invoice_amount_outstanding'] = 'Udestående beløb';
$lang['invoice_bill_to'] = 'Regning til';
$lang['invoice_client'] = 'Klient';
$lang['invoice_client_id'] = 'KlientID';
$lang['invoice_closed'] = 'Lukket';
$lang['invoice_comment'] = 'Note';
$lang['invoice_comment_success'] = 'Note tilføjet, kan ses herunder';
$lang['invoice_contact_add'] = 'Der er ingen kontaktpersoner tilgængelig, til at sende denne faktura til. For at tilføje, venligst brug';
$lang['invoice_date_issued'] = 'Dato udstedt';
$lang['invoice_date_issued_full'] = 'Dato udstedt (i formatet YYYY-MM-DD)';
$lang['invoice_date_paid_full'] = 'Dato Betalt (i formatet YYYY-MM-DD)';
$lang['invoice_email_demo'] = 'Bemærk, at for at forhindre misbrug af denne demo, e-mail er <em>not</em> sendt. For at se en kopi af den vedhæftede PDF, skal du vælge &ldquo;generate invoice&rdquo; fra menuen.';
$lang['invoice_email_invoice_to'] = 'Email Faktura til';
$lang['invoice_email_message'] = 'Email besked';
$lang['invoice_email_no_recipient'] = 'Gå tilbage, og vælge hvem denne faktura skal sendes til.';
$lang['invoice_email_success'] = 'Faktura sendt via e-mail. Du kan gennemgå denne faktura&rsquo;s historie herunder.';
$lang['invoice_export_to'] = 'Eksportere din faktura data til';
$lang['invoice_generated_by'] = 'Faktura genereret af';
$lang['invoice_history_comments'] = 'Faktura Historie &amp; Private Noter';
$lang['invoice_invoice'] = 'Faktura';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Faktura slettet';
$lang['invoice_invoice_edit_success'] = 'Faktura redigeret';
$lang['invoice_is_tax_exempt'] = 'er skattefri';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'sidste nummer brugt ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Ny Faktura';
$lang['invoice_new_invoice_error'] = 'Ny Faktura Fejl';
$lang['invoice_new_invoice_to'] = 'Ny faktura til';
$lang['invoice_no_payments_entered'] = 'Ingen betalinger er blevet indtastet for denne faktura. For at indtaste en betaling, brug &quot;Indtast Betaling&quot; i din menu.';
$lang['invoice_not_sent'] = 'Faktura endnu ikke sendt til kunden. For at sende denne faktura, skal du bruge &quot;Email Faktura&quot; i din menu.';
$lang['invoice_not_taxable'] = 'Ikke afgiftspligtig';
$lang['invoice_not_unique'] = 'Dette faktura nummer er ikke unikt';
$lang['invoice_note'] = 'Faktura Note';
$lang['invoice_note_max_chars'] = '(max 255 bogstaver)';
$lang['invoice_no_invoice_match'] = 'Der er ingen fakturaer i systemet, der passer til, disse kriterier';
$lang['invoice_number'] = 'Fakturanummer';
$lang['invoice_open'] = 'Åben';
$lang['invoice_or'] = 'eller';
$lang['invoice_or_new_client'] = 'eller indsæt en ny klient';
$lang['invoice_overdue'] = 'Farfaldne';
$lang['invoice_overdue_invoices'] = 'forfaldne faktura(er)';
$lang['invoice_payment_enter'] = 'Indtast Betaling for';
$lang['invoice_payment_history'] = 'Betalings Historie';
$lang['invoice_payment_success'] = 'Faktura betaling indtastet med success.';
$lang['invoice_payment_term'] = 'Betalingsbetingelser';
$lang['invoice_premenently_delete'] = 'Du er ved <strong class="error">permanent at slette</strong> fakturaen';
$lang['invoice_problem_creating'] = 'Der opstod et problem ved oprettelse af din faktura.';
$lang['invoice_quantity'] = 'Antal';
$lang['invoice_return_invoice_view'] = 'vend tilbage til faktura oversigt';
$lang['invoice_save_edited_invoice'] = 'Gem redigeret faktura';
$lang['invoice_select_client'] = 'Vælg klient';
$lang['invoice_send_to'] = 'Send denne faktura til';
$lang['invoice_sent_to'] = 'Faktura sendt til';
$lang['invoice_status'] = 'Status';
$lang['invoice_summary'] = 'Resume';
$lang['invoice_sure_delete'] = 'Er du sikker på at du vil gøre dette? ';
$lang['invoice_tax1_description'] = 'Navn på afgift/skat';
$lang['invoice_tax1_rate'] = 'Rate af afgift1';
$lang['invoice_tax2_description'] = 'Navn på anden afgift';
$lang['invoice_tax2_rate'] = 'Rate af afgift2';
$lang['invoice_tax_exempt'] = 'Bemærk: Denne klient er fritaget for afgifter/skat';
$lang['invoice_tax_status'] = 'Skattemæssig status';
$lang['invoice_taxable'] = 'Afgiftspligtig';
$lang['invoice_there_are_currently'] = 'Der er i øjeblikket';
$lang['invoice_total'] = 'Total';
$lang['invoice_work_description'] = 'Beskrivelse';
$lang['invoice_you_may_now'] = 'Du kan nu';
$lang['invoice_you'] = 'Du';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Kontroller, at din <em>Caps Lock</em> tast ikke er aktiv';
$lang['login_forgot_password'] = 'Glemt Kodeord';
$lang['login_login'] = 'Logind';
$lang['login_logout'] = 'Logud';
$lang['login_logout_confirm'] = 'Du er ved at logge ud. Er du sikker på at du vil det?';
$lang['login_logout_success1'] = "Du er blevet logget ud. Hvis du ønsker, kan du";
$lang['login_logout_success2'] = 'logge ind igen';
$lang['login_password'] = 'Kodeord';
$lang['login_password_confirm'] = 'Bekræft Kodeord';
$lang['login_password_email'] = "kan e-maile dit kodeord til den e-mail-adresse, du blev registreret med. Hvis du har glemt den og gerne vil have den nulstillet, skal du blot udfylde formularen nedenfor.";
$lang['login_password_email1'] = 'Din ændring af dit kodeord har været vellykket. Dit nye kodeord er';
$lang['login_password_email2'] = 'og kan nu benyttes til';
$lang['login_password_fail'] = "Noget gik galt. Jeg ved at dette ikke er en særlig hjælpsom fejl, det ser ud til at lidt debugging er nødvendigt";
$lang['login_password_reset_demo'] = 'For denne demo, er dette deaktiveret, men du ville have modtaget en e-mail med info om nulstillings oplysninger.';
$lang['login_password_reset_disabled'] = 'I denne version, adgangskode nulstilling er deaktiveret.';
$lang['login_password_reset_email1'] = 'Nogen (sandsynligvis dig), har anmodet om en nulstilling af adgangskoden til din BambooInvoice konto.';
$lang['login_password_reset_email2'] = 'For at nulstille den, skal du følge dette link til vores websted:';
$lang['login_password_reset_email3'] = "Hvis du ikke iværksatte denne anmodning, skal du blot se bort fra denne e-mail, og vi vil ikke forstyrre dig mere.";
$lang['login_password_reset_title'] = 'BambooInvoice Nulstil adgangskode';
$lang['login_password_reset_unable'] = 'Ude af stand til at nulstille din adgangskode. Prøv igen.';
$lang['login_password_sent'] = 'Din adgangskode bekræftelse er blevet sendt til.';
$lang['login_password_submit'] = 'Send kodeord';
$lang['login_password_success'] = 'Din password ændring har været en succes, og er blevet emailled.';
$lang['login_remember_me'] = 'Husk mig';
$lang['login_username'] = 'Email';
$lang['login_wrong_password'] = 'Beklager, det brugernavn og / eller password kunne ikke findes eller var forkert. Prøv igen.';

$lang['menu_accounts'] = 'Kontoer';
$lang['menu_bugs'] = 'Fejl';
$lang['menu_catchphrase'] = 'Simpel,<br />Smuk,<br />Open Source,<br />Online Fakturering';
$lang['menu_catchphrase_nobreak'] = 'Simpel, Smuk, Open Source, Online Fakturering';
$lang['menu_changelog'] = 'Ændre Log';
$lang['menu_clients'] = 'Klienter';
$lang['menu_credits'] = 'Credits';
$lang['menu_delete_invoice'] = 'Slet Faktura';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Vidste du at?';
$lang['menu_edit_invoice'] = 'Rediger Faktura';
$lang['menu_email_invoice'] = 'Email Faltura';
$lang['menu_enter_payment'] = 'Indtast Betaling';
$lang['menu_faq'] = 'F.A.Q.';
$lang['menu_generate_pdf'] = 'Generere PDF';
$lang['menu_help'] = 'Hjælp';
$lang['menu_invoice_summary'] = 'Faktura Resume';
$lang['menu_private_note'] = 'Private Noter';
$lang['menu_invoices'] = 'Fakturaer';
$lang['menu_logout'] = 'Logud';
$lang['menu_new_invoice'] = 'Ny Faktura';
$lang['menu_print_invoice'] = 'Udskriv Faktura';
$lang['menu_reports'] = 'Rapporter';
$lang['menu_roadmap'] = 'Roadmap';
$lang['menu_root_system'] = 'Root System';
$lang['menu_see_also'] = 'Se også';
$lang['menu_settings'] = 'Indstillinger';
$lang['menu_utilties'] = 'Værktøjer';

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Genereret af';

$lang['reports_back_to_reports'] = 'tilbage til rapporter';
$lang['reports_collected'] = 'indsamlet';
$lang['reports_end_date'] = 'Slut Dato (yyyy-mm-dd)';
$lang['reports_first_quarter'] = 'første kvatal';
$lang['reports_fourth_quarter'] = 'fjerde kvatal';
$lang['reports_generate_report'] = 'Generere rapport';
$lang['reports_invoices_issued_year'] = 'Faktura udstedt i år';
$lang['reports_legend'] = 'Legend';
$lang['reports_second_quarter'] = 'andet kvatal';
$lang['reports_start_date'] = 'Start Dato (yyyy-mm-dd)';
$lang['reports_third_quarter'] = 'trejde kvatal';
$lang['reports_year_to_date'] = 'År til Dato';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'Årlig Indkomst';

$lang['settings_account_settings'] = 'Konto Indstillinger';
$lang['settings_invoice_settings'] = 'Faktura Indstillinger';
$lang['settings_advanced_settings'] = 'Advanceret Indstillinger';

$lang['settings_company_name'] = 'Firmanavn';
$lang['settings_currency_symbol'] = 'Valuta Symbol';
$lang['settings_currency_type'] = 'Valuta Type';
$lang['settings_days_payment_due'] = 'Dage indtil faktura forfald';
$lang['settings_default_note'] = 'Standard Faktura Note';
$lang['settings_display_branding'] = 'Vis BambooInvoice Branding';
$lang['settings_logo'] = 'Logo';
$lang['settings_modify_fail'] = 'Et problem var stødt på, under ændringen af dine indstillinger.';
$lang['settings_modify_success'] = 'Indstillinger ændret.';
$lang['settings_note_max_chars'] = '(max 255 bogstaver)';
$lang['settings_primary_contact'] = 'Primær Kontaktperson';
$lang['settings_primary_email'] = 'Primær Kontakt Email';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Gem Indstillinger';
$lang['settings_save_invoices'] = 'Gem Fakturaer';
$lang['settings_save_invoices_warning'] = '<strong>Advarsel:</strong> Slår du dette fra vil alle nuværende gemte fakturaer blive fjernet.';
$lang['settings_settings_default'] = 'Disse indstillinger er standard';
$lang['settings_short_language'] = 'eng';
$lang['settings_tax_code'] = 'Dit CVR nr.';
$lang['settings_will_use'] = 'vil bruge, når du generere fakturaer eller klienter.';

$lang['utilities_download_backup'] = 'Download back-up';
$lang['utilities_automatic_version_check'] = 'Automatisk at søge efter nye versioner';
$lang['utilities_phpinfo'] = 'PHP info';
$lang['utilities_phpinfo_not_available'] = 'Denne feature er ikke tilgængelig i denne demo.';
$lang['utilities_new_version_available'] = "En ny version af BambooInvoice er nu tilgængelig. "; // space after period
$lang['utilities_up_to_date'] = "Du benytter den nyeste version of BambooInvoice.";
$lang['utilities_connection_failed'] = "Forbindelsen til http://bambooinvoice.org kunne ikke etableres.";
$lang['utilities_version_check'] = "Ny Version Chek";
$lang['utilities_version_undetermined'] = "Version status kunne ikke bestemmes";

$lang['menu_did_you_know_quotes'] = array(
					"BambooINVOICE har fora på forums.bambooinvoice.org til support, feature anmodninger, og at chatte.",
					"BambooINVOICE er udgivet under GPL licensen.",
					"Dine indstillinger kan til enhver tid ændres gennem &ldquo;Indstillinger&rdquo; menu.",
					"Hjælpe-filen vokser hver dag. Besøg BambooINVOICE.org for den seneste version!",
					"Du kan oprette en ny kunde fra &ldquo;Klienter&rdquo; menu, eller ligefør du udsteder en faktura!",
					"En enkelt stilk af bamboo fra en etableret rodsystemet når typisk op på fuld højde på blot et år!",
					"Bamboo planten&rsquo;s lang levetid, det er et kinesisk symbol på lang levetid, og i Indien er det et symbol på venskab."
					);

?>
