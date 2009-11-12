<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Abbrechen';
$lang['actions_change'] = '&Auml;ndern';
$lang['actions_create_invoice'] = 'Rechnung erstellen';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'L&ouml;schen';
$lang['actions_edit'] = 'Bearbeiten';
$lang['actions_required_fields'] = 'Pflichtfelder';
$lang['actions_select_below'] = 'Bitte ausw&auml;hlen';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Invoice</span>';
$lang['bambooinvoice_version'] = 'Version';

$lang['clients_add_contact'] = 'Kontakt hinzuf&uuml;gen';
$lang['clients_address1'] = 'Adresse 1';
$lang['clients_address2'] = 'Adresse 2';
$lang['clients_assigned_to_them'] = 'zugewiesene Rechnungen. Sie sind dabei diesen Kunden <strong class="error">und alle zugeh&ouml;rigen Rechnungen endg&uuml;ltig zu l&ouml;schen</strong>. Sind Sie sicher, dass Sie das m&ouml;chten?';
$lang['clients_cancel_add_contact'] = 'Kontakt hinzuf&uuml;gen abbrechen';
$lang['clients_city'] = 'Stadt';
$lang['clients_client_has'] = 'Dieser Kunde hat ';
$lang['clients_clients_registered'] = 'Kunde(n) registriert';
$lang['clients_contact_add'] = 'Der Kontakt kann nicht hinzugef&uuml;gt werden. Bitte beachten Sie, dass Vorname, Nachname und eine g&uuml;ltige e-Mail-Adresse ben&ouml;tigt werden.';
$lang['clients_contact_delete_fail'] = 'Kontakt konnte nicht gel&ouml;scht werden.'; //CHANGED
$lang['clients_contacts'] = 'Kontakte';
$lang['clients_country'] = 'Land';
$lang['clients_create_new_client'] = 'Neuer Kunde';
$lang['clients_created'] = 'Neuer Kunde hinzugef&uuml;gt'; //CHANGED
$lang['clients_delete_all_invoices'] = 'Kunden und zugewiesene Rechnungen l&ouml;schen';
$lang['clients_delete_client'] = 'Kunde l&ouml;schen';
$lang['clients_delete_contact'] = 'Kontakt l&ouml;schen';
$lang['clients_deleted_error'] = 'Kunde konnte nicht gel&ouml;scht werden.'; //CHANGED
$lang['clients_deleted'] = 'Kunde erfolgreich gel&ouml;scht'; //CHANGED
$lang['clients_edit_client'] = 'Kunde bearbeiten';
$lang['clients_edit_contact'] = 'Kontakt bearbeiten';
$lang['clients_edited'] = 'Kunde erfolgreich bearbeitet'; //CHANGED
$lang['clients_edited_contact_info'] = 'Kontakt Informationen erfolgreich aktualisiert'; //CHANGED
$lang['clients_email'] = 'e-Mail';
$lang['clients_first_name'] = 'Vorname';
$lang['clients_id'] = 'Kundennummer';
$lang['clients_last_name'] = 'Nachname';
$lang['clients_name'] = 'Name des Kunden';
$lang['clients_no_invoice_listed'] = 'Noch keine Kontakte eingetragen f&uuml;r'; // CHANGED (typo)
$lang['clients_notes'] = 'Notes';
$lang['clients_new_contact_fail'] = 'Der Kontakt kann nicht hinzugef&uuml;gt werden. Bitte beachten Sie, dass Vorname, Nachname und eine g&uuml;ltige e-Mail-Adresse ben&ouml;tigt werden.';
$lang['clients_phone'] = 'Telefon';
$lang['clients_postal'] = 'Postleitzahl';
$lang['clients_province'] = 'Bundesland';
$lang['clients_save_client'] = 'Kunde speichern';
$lang['clients_title'] = 'Title'; // NEEDS TRANSLATION
$lang['clients_to'] = 'bis';
$lang['clients_update_client'] = 'Kunde aktualisieren';
$lang['clients_website'] = 'Webseite';
$lang['clients_you_have'] = 'Sie haben ';

$lang['error_date_fill'] = 'Die Eingabe scheint fehlerhaft zu sein. Bitte beachten Sie, dass das Datum im Format JJJJ-MM-TT eingegeben werden und die Summe eine Zahl sein muss. Bitte versuchen Sie es erneut.';
$lang['error_date_format'] = 'Das Datum muss im Format JJJJ-MM-TT eingegeben werden';
$lang['error_email_recipients'] = 'Bitte w&auml;hlen Sie mindestens 1 Empf&auml;nger f&uuml;r diese Rechnung';
$lang['error_field_required'] = 'Dieses Feld ist ein Pflichtfeld';
$lang['error_login_password'] = 'Bitte geben Sie ein Passwort an';
$lang['error_login_username'] = 'Bitte geben Sie einen Benutzernamen an';
$lang['error_problem_editing'] = 'Beim Bearbeiten der Rechnung gab es ein Problem. Bitte melden Sie diesen Fehler invoice_controller_edit';
$lang['error_problem_inserting'] = 'Problem beim Einf&uuml;gen';
$lang['error_problem_saving'] = 'Es gab ein Problem beim Speichern der Rechnung f&uuml;r den e-Mail-Versand.';
$lang['error_selection'] = 'Die Auswahl enth&auml;lt keine Rechnung.';

$lang['invoice_add_note'] = 'Add Note';
$lang['invoice_all_clients'] = 'Alle Kunden';
$lang['invoice_all_invoices'] = 'Alle Rechnungen';
$lang['invoice_amount'] = 'Summe';
$lang['invoice_amount_item'] = 'Summe';
$lang['invoice_amount_error'] = 'Bitte geben Sie eine Summe ein';
$lang['invoice_amount_numbers_only'] = 'Bitte nur Zahlen';
$lang['invoice_amount_paid'] = 'Amount Paid'; // NEEDS TRANSLATION
$lang['invoice_amount_outstanding'] = 'Amount Outstanding'; // NEEDS TRANSLATION
$lang['invoice_bill_to'] = 'In Rechnung stellen an';
$lang['invoice_client'] = 'Kunde';
$lang['invoice_client_id'] = 'Kundennummer';
$lang['invoice_closed'] = 'Bezahlt';
$lang['invoice_comment'] = 'Kommentar';
$lang['invoice_comment_success'] = 'Note successfully added, you can review below.'; // NEEDS TRANSLATION
$lang['invoice_contact_add'] = 'Es sind keine Kontakte vorhanden, an die die Rechnung geschickt werden k&ouml;nnte. Um einen Kontakt hinzuzuf&uuml;gen w&auml;hlen Sie bitte';
$lang['invoice_date_issued'] = 'Ausstellungsdatum';
$lang['invoice_date_issued_full'] = 'Ausstellungsdatum (im Format JJJJ-MM-TT)';
$lang['invoice_date_paid_full'] = 'Zahlungsdatum (im Format JJJJ-MM-TT)';
$lang['invoice_email_demo'] = 'Um diese Demo vor Missbrauch zu sch&uuml;tzen, wurde die e-Mail <em>nicht</em> gesendet. Eine Kopie des PDF-Anhangs k&ouml;nnen Sie einsehen, wenn sie im Men&uuml; &ldquo;Rechnung erstellen&rdquo; w&auml;hlen.';
$lang['invoice_email_invoice_to'] = 'Rechnung per e-Mail verschicken an';
$lang['invoice_email_message'] = 'e-Mail Nachricht';
$lang['invoice_email_no_recipient'] = 'Bitte gehen Sie zur&uuml;ck und w&auml;hlen Sie einen Empf&auml;nger f&uuml;r diese Rechnung.';
$lang['invoice_email_success'] = 'Die Rechnung wurde erfolgreich verschickt. Rechnungsdetails k&ouml;nnen unten eingesehen werden.';
$lang['invoice_export_to'] = 'Rechnungsdaten exportieren als';
$lang['invoice_generated_by'] = 'Rechnung vorbei erzeugt';
$lang['invoice_history_comments'] = 'Rechnungsdetails &amp; Kommentare';
$lang['invoice_invoice'] = 'Rechnung';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Rechnung erfolgreich gel&ouml;scht';
$lang['invoice_invoice_edit_success'] = 'Rechnung erfolgreich bearbeitet';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'letzte benutzte Nummer ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Neue Rechnung';
$lang['invoice_new_invoice_error'] = 'Neuer Rechnung Fehler';
$lang['invoice_new_invoice_to'] = 'Neue Rechnung f&uuml;r';
$lang['invoice_no_payments_entered'] = 'F&uuml;r diese Rechnung wurden noch keine Zahlungen eingegeben. Um Zahlungen einzugeben, w&auml;hlen Sie die &quot;Zahlungen&quot; Option aus dem Men&uuml;.';
$lang['invoice_not_sent'] = 'Die Rechnung wurde noch nicht an den Kunden gesendet. Um diese Rechnung zu verschicken, wählen Sie &quot;Rechnung verschicken&quot; im Men&uuml;.';
$lang['invoice_not_taxable'] = 'nicht steuerbar';
$lang['invoice_not_unique'] = 'Diese Rechnungsnummer ist nicht eindeutig';
$lang['invoice_note'] = 'Kommentar';
$lang['invoice_note_max_chars'] = '(maximal 255 Zeichen)';
$lang['invoice_no_invoice_match'] = 'Es sind keine Rechnungen mit den gew&auml;hlten Kriterien vorhanden';
$lang['invoice_number'] = 'Rechnungsnummer';
$lang['invoice_open'] = 'Offen';
$lang['invoice_or'] = 'oder';
$lang['invoice_or_new_client'] = 'oder geben Sie einen neuen Kunden ein';
$lang['invoice_overdue'] = '&Uuml;berf&auml;llig';
$lang['invoice_overdue_invoices'] = '&uuml;berf&auml;llige Rechnung(en)';
$lang['invoice_payment_enter'] = 'Zahlung eingeben f&uuml;r';
$lang['invoice_payment_history'] = 'Zahlungsdetails';
$lang['invoice_payment_success'] = 'Zahlungsdaten wurden erfolgreich eingetragen.';
$lang['invoice_payment_term'] = 'Zahlbar innerhalb von';
$lang['invoice_premenently_delete'] = '<strong class="error">Endg&uuml;ltiges L&ouml;schen</strong> von Rechnung';
$lang['invoice_problem_creating'] = 'Beim Anlegen Ihrer Rechnung gab es ein Problem.';
$lang['invoice_quantity'] = 'Anzahl'; // CHANGED
$lang['invoice_return_invoice_view'] = 'Zur&uuml;ck zur Rechnungsansicht';
$lang['invoice_save_edited_invoice'] = 'Bearbeitete Rechnung speichern';
$lang['invoice_select_client'] = 'W&auml;hlen Sie einen Kunden aus';
$lang['invoice_send_to'] = 'Diese Rechnung versenden an';
$lang['invoice_sent_to'] = 'Rechnung wurde verschickt an';
$lang['invoice_status'] = 'Status';
$lang['invoice_summary'] = '&Uuml;bersicht';
$lang['invoice_sure_delete'] = 'Sind Sie sicher, dass Sie das machen m&ouml;chten? ';
$lang['invoice_tax1_description'] = 'Bezeichnung der ersten erhobenen Steuer';
$lang['invoice_tax1_rate'] = 'Satz der ersten erhobenen Steuer';
$lang['invoice_tax2_description'] = 'Bezeichnung der zweiten erhobenen Steuer';
$lang['invoice_tax2_rate'] = 'Satz der zweiten erhobenen Steuer';
$lang['invoice_tax_exempt'] = 'Hinweis: Dieser Kunde ist nicht steuerbar.'; // I read this as 'is not controllable'
//Suggestion: $lang['invoice_tax_exempt'] = 'Hinweis: Dieser Kunde is von der Umsatzsteuer befreit.';
$lang['invoice_tax_status'] = 'Steuerstatus';
$lang['invoice_taxable'] = 'steuerbar';// Again 'controllable'? Needs better translation.
$lang['invoice_there_are_currently'] = 'Es gibt momentan';
$lang['invoice_total'] = 'Insgesamt';
$lang['invoice_work_description'] = 'Auftragsbeschreibung';
$lang['invoice_you_may_now'] = 'Sie k&ouml;nnen nun';
$lang['invoice_is_tax_exempt'] = 'ist nicht steuerbar';  //Same problem as above.
//Suggestion: $lang['invoice_is_tax_exempt'] = 'ist umsatzsteuerbefreit';
$lang['invoice_you'] = 'You';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Bitte vergewissern Sie sich, dass Ihre <em>Umschalttaste</em> nicht gedr&uuml;ckt ist.';
$lang['login_forgot_password'] = 'Password vergessen';
$lang['login_login'] = 'Login';
$lang['login_logout'] = 'Abmelden';
$lang['login_logout_confirm'] = 'Sie sind davor abgemeldet zu werden. Sind Sie sicher, dass sie das m&ouml;chten?';
$lang['login_logout_success1'] = "Sie haben Sich erfolgreich abgemeldet. Wenn Sie m&ouml;chten, k&ouml;nnen Sie nun";
$lang['login_logout_success2'] = 'Erneut einloggen';
$lang['login_password'] = 'Passwort';
$lang['login_password_confirm'] = 'Password Confirm'; // to be translated
$lang['login_password_email'] = "kann das Passwort an die e-Mail-Adresse schicken, mit der Sie registriert sind. Wenn Sie es vergessen haben und es zur&uuml;ckgesetzt haben wollen, f&uuml;llen Sie einfach das unten stehende Formular aus.";
$lang['login_password_email1'] = 'Ihr Passwort wurde erfolgreich ge&auml;ndert. Ihr neues Passwort lautet';
$lang['login_password_email2'] = 'und kann nun benutzt werden, um';
$lang['login_password_fail'] = "Irgendwas ging schief. Nat&uuml;rlich ist das kein wirklich hilfreicher Fehlertext und ein wenig Debugging ist vonn&ouml;ten";
$lang['login_password_reset_demo'] = 'In der Demo ist diese Funktion deaktiviert - aber Sie h&auml;tten eine e-Mail mit weiteren Informationen zum Zur&uuml;cksetzen erhalten.';
$lang['login_password_reset_disabled'] = 'In der Demo ist das Zur&uuml;cksetzen des Passwortes deaktiviert.';
$lang['login_password_reset_email1'] = 'Irgendjemand (wahrscheinlich Sie) hat das Zur&uuml;cksetzen des Passwortes f&uuml;r Ihr BambooInvoice-Konto angefordert.';
$lang['login_password_reset_email2'] = 'Um es jetzt zur&uuml;ckzusetzen, klicken Sie auf den folgenden Link zu unserer Webseite: ';
$lang['login_password_reset_email3'] = "Wenn Sie Ihr Passwort gar nicht zur&uuml;cksetzen m&ouml;chten, ignorieren Sie diese e-Mail einfach - und wir entschuldigen uns f&uuml;r die St&ouml;rung und Bel&auml;stigung.";
$lang['login_password_reset_title'] = 'BambooInvoice Zur&uuml;cksetzen des Passwortes';
$lang['login_password_reset_unable'] = 'Ihr Passwort konnte nicht zur&uuml;ckgesetzt werden. Bitte versuchen Sie es erneut.';
$lang['login_password_sent'] = 'Eine Best&auml;tigung der Passwort-&Auml;nderung wurde verschickt an';
$lang['login_password_submit'] = 'Passwort verschicken';
$lang['login_password_success'] = 'Ihre Passwort-&Auml;nderung war erfolgreich und wurde Ihnen per e-Mail zugeschickt.';
$lang['login_remember_me'] = 'Daten f&uuml;r das n&auml;chste Mal speichern';
$lang['login_username'] = 'e-Mail';
$lang['login_wrong_password'] = 'Der eingegebene Benutzername und/oder das Passwort konnten nicht gefunden werden bzw. waren falsch. Bitte versuchen Sie es erneut.';

$lang['menu_accounts'] = 'Accounts'; // to be translated
$lang['menu_bugs'] = 'Fehler';
$lang['menu_catchphrase'] = 'Unkomplizierte,<br />Attraktive,<br />Open Source,<br />Online Rechnungsstellung';
$lang['menu_catchphrase_nobreak'] = 'Unkomplizierte, Attraktive, Open Source, Online Rechnungsstellung';
$lang['menu_changelog'] = 'Change Log';
$lang['menu_clients'] = 'Kunden';
$lang['menu_credits'] = 'Credits';
$lang['menu_delete_invoice'] = 'L&ouml;schen';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Wussten Sie schon?';
$lang['menu_edit_invoice'] = 'Bearbeiten';
$lang['menu_email_invoice'] = 'Versenden';
$lang['menu_enter_payment'] = 'Zahlungen';
$lang['menu_faq'] = 'H&auml;ufig gestellte Fragen';
$lang['menu_generate_pdf'] = 'PDF erstellen';
$lang['menu_help'] = 'Hilfe';
$lang['menu_invoice_summary'] = '&Uuml;bersicht';
$lang['menu_invoices'] = 'Rechnungen';
$lang['menu_logout'] = 'Abmelden';
$lang['menu_new_invoice'] = 'Neue Rechnung';
$lang['menu_private_note'] = 'Private Note';
$lang['menu_print_invoice'] = 'Drucken';
$lang['menu_reports'] = 'Berichte';
$lang['menu_roadmap'] = 'Roadmap';
$lang['menu_root_system'] = 'Hauptmen&uuml;';
$lang['menu_see_also'] = 'Ebenfalls interessant';
$lang['menu_settings'] = 'Einstellungen';
$lang['menu_utilties'] = 'Utilities';

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Erstellt mit';

$lang['reports_back_to_reports'] = 'Zur&uuml;ck zur Bericht&uuml;bersicht';
$lang['reports_collected'] = 'eingenommen ';
$lang['reports_end_date'] = 'Enddatum (JJJJ-MM-TT)';
$lang['reports_first_quarter'] = 'erstes Quartal';
$lang['reports_fourth_quarter'] = 'viertes Quartal';
$lang['reports_generate_report'] = 'Bericht erstellen';
$lang['reports_invoices_issued_year'] = 'ausgestellte Rechnungen dieses Jahr';
$lang['reports_legend'] = 'Legende';
$lang['reports_second_quarter'] = 'zweites Quartal';
$lang['reports_start_date'] = 'Startdatum (JJJJ-MM-TT)';
$lang['reports_third_quarter'] = 'drittes Quartal';
$lang['reports_year_to_date'] = 'Aktuelles Jahr';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'J&auml;hrliche Einnahmen';

$lang['settings_account_settings'] = 'Account Settings'; // to be translated
$lang['settings_invoice_settings'] = 'Invoice Settings'; // to be translated
$lang['settings_advanced_settings'] = 'Advanced Settings'; // to be translated

$lang['settings_company_name'] = 'Firmenname';
$lang['settings_currency_symbol'] = 'W&auml;hrungssymbol';
$lang['settings_currency_type'] = 'W&auml;hrung';
$lang['settings_days_payment_due'] = 'Zahlbar nach wieviel Tagen';
$lang['settings_default_note'] = 'Standard-Rechnungskommentar';
$lang['settings_display_branding'] = 'Anzeige BambooInvoice Einbrennen';
$lang['settings_logo'] = 'Logo';
$lang['settings_modify_fail'] = 'Beim &Auml;ndern Ihrer Einstellungen gab es ein Problem.';
$lang['settings_modify_success'] = 'Einstellungen erfolgreich ge&auml;ndert';
$lang['settings_note_max_chars'] = '(maximal 255 Zeichen)';
$lang['settings_primary_contact'] = 'Ansprechpartner';
$lang['settings_primary_email'] = 'e-Mail des Ansprechpartners';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Einstellungen speichern';
$lang['settings_save_invoices'] = 'Einstellungen Rechnung';
$lang['settings_save_invoices_warning'] = '<strong>Warning:</strong> Turning this off will remove all currently saved invoices.';
$lang['settings_settings_default'] = 'Diese Einstellungen sind die Standard-Einstellungen von';
$lang['settings_short_language'] = 'de';
$lang['settings_tax_code'] = 'Ihre Steuernummer';
$lang['settings_will_use'] = 'und werden beim Erstellen von Rechnungen und Kunden verwendet.';

$lang['utilities_download_backup'] = 'Download backup';
$lang['utilities_automatic_version_check'] = 'Automatically check for new versions'; // to be translated
$lang['utilities_phpinfo'] = 'PHP info';
$lang['utilities_phpinfo_not_available'] = 'This feature is not available in the demo.';
$lang['utilities_new_version_available'] = "A new version of BambooInvoice version is now available. "; // space after period
$lang['utilities_up_to_date'] = "You are using the most recent version of BambooInvoice.";
$lang['utilities_connection_failed'] = "A connection to http://bambooinvoice.org could not be established.";
$lang['utilities_version_check'] = "New version check";
$lang['utilities_version_undetermined'] = "Version status could not be determined.";

$lang['menu_did_you_know_quotes'] = array(
					"BambooINVOICE wird auf Basis der GPL Lizenz veröffentlicht.",
					"Ihre Einstellungen k&ouml;nnen zu jedem Zeitpunkt mit dem &ldquo;Einstellungen&rdquo; Men&uuml; ge&auml;ndert werden.",
					"Die Hilfe-Seiten wachsen jeden Tag. Besuchen Sie BambooINVOICE.org, um die aktuellste Version zu erhalten!",
					"Sie k&ouml;nnen neue Kunden mit Hilfe des &ldquo;Kunden&rdquo; Men&uuml;s anlegen - oder direkt beim Erstellen einer neuen Rechnung!",
					"Bereits nach einem Jahr kann ein einzelner Bambus-Stamm seine volle Gr&ouml;&szlig;e erreichen!",
					"Aufgrund ihrer Langlebigkeit ist die Bambus-Pflanze im Chinesischen das Symbol f&uuml;r langes Leben und im Indischen das Symbol f&uuml;r Freundschaft."
					);

?>