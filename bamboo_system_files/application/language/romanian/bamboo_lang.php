<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Anulează';
$lang['actions_change'] = 'Schimbă';
$lang['actions_create_invoice'] = 'Crează Factură';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'Şterge';
$lang['actions_edit'] = 'Modifică';
$lang['actions_required_fields'] = 'Câmpuri Obligatorii';
$lang['actions_select_below'] = 'Alege de mai jos';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Invoice</span>';
$lang['bambooinvoice_version'] = 'Versiune';

$lang['clients_add_contact'] = 'Adaugă Contact';
$lang['clients_address1'] = 'Adresa1';
$lang['clients_address2'] = 'Adresa2';
$lang['clients_assigned_to_them'] = 'Sunteţi pe cale să <strong class="error">ştergeţi permanent</strong> acest client, precum şi <strong class="error">toate facturile asociate lui</strong>. Confirmaţi intenţia?';
$lang['clients_cancel_add_contact'] = 'Anulează Adăugare Contact';
$lang['clients_city'] = 'Oraş';
$lang['clients_client_has'] = 'Acest client are ';
$lang['clients_clients_registered'] = 'clienţi înregistraţi';
$lang['clients_contact_add'] = 'Acest contact nu poate fi adaugat. Adaugarea necesita Numele, Prenumele şi o adresa de email validă.';
$lang['clients_contact_delete_fail'] = 'Unable to delete this contact.'; // NEEDS BETTER TRANSLATION
$lang['clients_contacts'] = 'Contacte';
$lang['clients_country'] = 'Ţară';
$lang['clients_create_new_client'] = 'Crează Client Nou';
$lang['clients_delete_all_invoices'] = 'Şterge client şi toate facturile';
$lang['clients_delete_client'] = 'Şterge Client';
$lang['clients_delete_contact'] = 'Şterge Contact';
$lang['clients_deleted'] = 'Clientul a fost sters'; // NEEDS BETTER TRANSLATION
$lang['clients_deleted_error'] = 'Clientul nu a putut fi sters'; // NEEDS TRANSLATION
$lang['clients_edit_client'] = 'Modifică Client';
$lang['clients_edit_contact'] = 'Modifică Contact';
$lang['clients_email'] = 'Email';
$lang['clients_first_name'] = 'Prenume';
$lang['clients_id'] = 'Cod Client';
$lang['clients_last_name'] = 'Nume';
$lang['clients_name'] = 'Nume Client';
$lang['clients_notes'] = 'Notes';
$lang['clients_no_invoice_listed'] = 'There are no contacts currently listed for';
$lang['clients_new_contact_fail'] = 'Acest contact nu poate fii adaugat. Adaugarea necesita Numele, Prenumele şi o adresa de email validă.';
$lang['clients_phone'] = 'Telefon';
$lang['clients_postal'] = 'Cod Poştal';
$lang['clients_province'] = 'Judeţ';
$lang['clients_save_client'] = 'Salvează Client';
$lang['clients_to'] = 'către';
$lang['clients_update_client'] = 'Actualizare Client';
$lang['clients_website'] = 'Website';
$lang['clients_you_have'] = 'Aveţi ';

$lang['error_date_fill'] = 'Exista erori in informaţia introdusă. Data trebuie să fie introdusă in urmatorul format: AAAA-LL-ZZ, iar Suma trebuie sa fie un numar. Vă rugăm incercaţi dinnou.';
$lang['error_date_format'] = 'Data trebuie sa fie introdusă în urmatorul format: AAAA-LL-ZZ';
$lang['error_email_recipients'] = 'Va rugăm alegeţi cel puţin 1 primitor pentru aceasta factură.';
$lang['error_field_required'] = 'Completarea acestui câmp este obligatorie';
$lang['error_login_password'] = 'Va rugăm să introduceţi o parolă';
$lang['error_login_username'] = 'Va rugăm să introduceţi un nume de utilizator';
$lang['error_problem_editing'] = 'A intervenit o problema în modificarea acestei facturi. Va rugăm raportaţi eroarea invoice_controller_edit';
$lang['error_problem_inserting'] = 'Eroare în introducere';
$lang['error_problem_saving'] = 'A intervenit o eroare în salvarea facturii.';
$lang['error_selection'] = 'Selecţia dumneavoastră nu conţine facturi.';

$lang['invoice_add_note'] = 'Add Note';
$lang['invoice_all_clients'] = 'Toţi Clienţii';
$lang['invoice_all_invoices'] = 'Toate Facturile';
$lang['invoice_amount'] = 'Sumă';
$lang['invoice_amount_item'] = 'Sumă';
$lang['invoice_amount_error'] = 'Vă rugăm introduceţi o sumă';
$lang['invoice_amount_numbers_only'] = 'Numai numere vă rog';
$lang['invoice_bill_to'] = 'Facturează către';
$lang['invoice_client'] = 'Client';
$lang['invoice_client_id'] = 'Cod Client';
$lang['invoice_closed'] = 'Inchisă';
$lang['invoice_comment'] = 'Observaţii';
$lang['invoice_comment_success'] = 'Note successfully added, you can review below.'; // NEEDS TRANSLATION
$lang['invoice_contact_add'] = 'Nu există contacte cărora sa le trimiteţi aceasta factură. Pentru a adăuga contacte va rugam folosiţi ';
$lang['invoice_date_issued'] = 'Data Emiterii';
$lang['invoice_date_issued_full'] = 'Data Emiterii (în format AAAA-LL-ZZ)';
$lang['invoice_date_paid_full'] = 'Data Achitării (în format AAAA-LL-ZZ)';
$lang['invoice_email_demo'] = 'Pentru a preveni abuzul acestui program demonstraţie, email-ul <em>nu</em> va fii trimis. Pentru a vizualiza o copie a ataşamentului în format PDF, selectaţi &ldquo;Generare Factură&rdquo; din meniu.';
$lang['invoice_email_invoice_to'] = 'Trimite Factura prin Email către';
$lang['invoice_email_message'] = 'Trimite prin Email mesajul';
$lang['invoice_email_no_recipient'] = 'Vă rugăm încercaţi dinnou. Selectaţi către cine trebuie trimisă această factură.';
$lang['invoice_email_success'] = 'Factura a fost trimisa. Puteţi vizualiza istoricul acestei facturi dedesubt.';
$lang['invoice_export_to'] = 'Exportă datele facturii către';
$lang['invoice_generated_by'] = 'Invoice generated by'; // TO BE TRANSLATED
$lang['invoice_history_comments'] = 'Istoric Factură &amp; Observaţii';
$lang['invoice_invoice'] = 'Factură';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Factura a fost ştearsă';
$lang['invoice_invoice_edit_success'] = 'Factura a fost modificată';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'ultimul număr folosit ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Factură Nouă';
$lang['invoice_new_invoice_error'] = 'Eroare Factură Nouă';
$lang['invoice_new_invoice_to'] = 'Factură nouă către';
$lang['invoice_no_payments_entered'] = 'Nu au fost introduse plăţi pentru această factură. Pentru a introduce o plată, folosiţi opţiunea &quot;Introducere Plata&quot; din meniu.';
$lang['invoice_not_sent'] = 'Factura nu a fost trimisă înca la client. Pentru a trimite factura folosiţi opţiunea &quot;Trimitere Email Factură&quot; din meniu.';
$lang['invoice_not_taxable'] = 'Netaxabilă';
$lang['invoice_not_unique'] = 'Această factură nu este unică';
$lang['invoice_note'] = 'Notă factură';
$lang['invoice_note_max_chars'] = '(maximum 255 de litere)';
$lang['invoice_number'] = 'Număr Factură';
$lang['invoice_open'] = 'Deschide';
$lang['invoice_or'] = 'sau';
$lang['invoice_or_new_client'] = 'sau introduce-ţi un client nou';
$lang['invoice_overdue'] = 'Restanţă';
$lang['invoice_overdue_invoices'] = 'Factură/Facturi restante';
$lang['invoice_payment_enter'] = 'Introduce-ţi plată pentru';
$lang['invoice_payment_history'] = 'Istoric Plăţi';
$lang['invoice_payment_success'] = 'Plată Factură introdusă.';
$lang['invoice_payment_term'] = 'Termeni de plată';
$lang['invoice_premenently_delete'] = 'Sunteţi pe cale să <strong class="error">ştergeţi permanent</strong> factura!';
$lang['invoice_problem_creating'] = 'A existat o eroare în crearea facturii.';
$lang['invoice_quantity'] = 'Quantity'; // NEEDS TRANSLATION
$lang['invoice_return_invoice_view'] = 'înapoi la vizualizarea facturilor';
$lang['invoice_save_edited_invoice'] = 'Salveaza factura modificată';
$lang['invoice_select_client'] = 'Alege Clientul';
$lang['invoice_send_to'] = 'Trimite această factură către';
$lang['invoice_sent_to'] = 'Factură trimisă către';
$lang['invoice_status'] = 'Progres';
$lang['invoice_summary'] = 'Sumar';
$lang['invoice_sure_delete'] = 'Sunteţi sigur ca doriţi sa faceţi asta? ';
$lang['invoice_tax1_description'] = 'Numele taxei a fost schimbat';
$lang['invoice_tax1_rate'] = 'Rata taxei1';
$lang['invoice_tax2_description'] = 'Numele celei de-a doua taxe';
$lang['invoice_tax2_rate'] = 'Rata taxei2';
$lang['invoice_tax_exempt'] = 'Observaţie: Acest client este scutit de taxe';
$lang['invoice_tax_status'] = 'Statutul taxei';
$lang['invoice_taxable'] = 'Taxabil/ă';
$lang['invoice_there_are_currently'] = 'La momentul de faţa există';
$lang['invoice_total'] = 'Total';
$lang['invoice_work_description'] = 'Descrierea Muncii';
$lang['invoice_you_may_now'] = 'Acum puteţi să';
$lang['invoice_you'] = 'You';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Verificaţi ca tasta <em>Caps Lock</em> sa nu fie apăsată';
$lang['login_forgot_password'] = 'Parolă uitată';
$lang['login_login'] = 'Intrare în cont';
$lang['login_logout'] = 'Ieşire din cont';
$lang['login_logout_confirm'] = 'Sunteţi pe cale să ieşiţi din cont. Confirmaţi?';
$lang['login_logout_success1'] = "Ieşirea din cont a fost efectuată. Dacă doriţi puteţi să";
$lang['login_logout_success2'] = 'intraţi dinnou';
$lang['login_password'] = 'Parolă';
$lang['login_password_confirm'] = 'Password Confirm'; // to be translated
$lang['login_password_email'] = "poate să va trimită prin email parola la adresa cu care v-aţi inregistrat. Dacă aţi uitat parola şi vreţi sa o resetăm completaţi formularul de mai jos.";
$lang['login_password_email1'] = 'Parola a fost schimbată. Noua parolă este';
$lang['login_password_email2'] = 'şi poate fi folosită acum pentru ca să';
$lang['login_password_fail'] = "Ceva nu a mers cum trebuie. Ştiu ca nu este o eroare foarte folositoare dar se pare ca trebuie să reparăm ceva";
$lang['login_password_reset_demo'] = 'În acest program demonstraţie această funcţionalitate a fost dezactivată, dar ar fi rezultat într-un email cu informaţia de resetare.';
$lang['login_password_reset_disabled'] = 'Pentru această versiune, resetarea parolei a fost dezactivată.';
$lang['login_password_reset_email1'] = 'Cineva (probabil dumneavoastră), a cerut resetarea parolei pentru contul BambooInvoice.';
$lang['login_password_reset_email2'] = 'Pentru a completa resetarea urmaţi acest link către pagina noastră:';
$lang['login_password_reset_email3'] = "Dacă nu aţi iniţiat această cerere ignoraţi acest mesaj şi ne scuzaţi pentru deranjul cauzat.";
$lang['login_password_reset_title'] = 'Parolă BambooInvoice Resetată';
$lang['login_password_reset_unable'] = 'parola nu a putut fi resetată. va rugăm încercaţi dinnou.';
$lang['login_password_sent'] = 'Confirmarea resetării parolei a fost trimisă la';
$lang['login_password_submit'] = 'Trimite parolă';
$lang['login_password_success'] = 'Parola a fost schimbată şi trimisă prin email.';
$lang['login_remember_me'] = 'Păstrează-mă logat';
$lang['login_username'] = 'Email';
$lang['login_wrong_password'] = 'Ne pare rău. Numele de utilizator şi/sau parola nu au putut fii gasite sau sunt greşite. Incercaţi dinnou.';

$lang['menu_bugs'] = 'Probleme';
$lang['menu_catchphrase'] = 'Simpla,<br />Frumoasă,<br />Open Source,<br />Facturare Online';
$lang['menu_catchphrase_nobreak'] = 'Simplă, Frumoasă, Open Source, Facturare Online';
$lang['menu_changelog'] = 'Schimbare Log';
$lang['menu_clients'] = 'Clienţi';
$lang['menu_credits'] = 'Credite';
$lang['menu_delete_invoice'] = 'Ştergere Factură';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Ştiaţi?';
$lang['menu_edit_invoice'] = 'Modificare Factură';
$lang['menu_email_invoice'] = 'Trimitere Email Factură';
$lang['menu_enter_payment'] = 'Introducere Plată';
$lang['menu_faq'] = 'Intrebări Frecvente';
$lang['menu_generate_pdf'] = 'Generare PDF';
$lang['menu_help'] = 'Ajutor';
$lang['menu_invoice_summary'] = 'Sumar Factură';
$lang['menu_invoices'] = 'Facturi';
$lang['menu_logout'] = 'Ieşire din Cont';
$lang['menu_new_invoice'] = 'Factură Nouă';
$lang['menu_print_invoice'] = 'Printează Factura';
$lang['menu_private_note'] = 'Private Note';
$lang['menu_reports'] = 'Rapoarte';
$lang['menu_roadmap'] = 'Hartă';
$lang['menu_root_system'] = 'Sistem de bază';
$lang['menu_see_also'] = 'Vezi de asemenea';
$lang['menu_settings'] = 'Setări';
$lang['menu_utilties'] = 'Utilities'; // TO BE TRANSLATED

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Generată de';

$lang['reports_back_to_reports'] = 'înapoi la rapoarte';
$lang['reports_end_date'] = 'Data de terminare (aaaa-ll-zz)';
$lang['reports_first_quarter'] = 'primul trimestru';
$lang['reports_fourth_quarter'] = 'al patrulea trimestru';
$lang['reports_generate_report'] = 'Generează raport';
$lang['reports_legend'] = 'Legendă';
$lang['reports_second_quarter'] = 'al doilea trimestru';
$lang['reports_start_date'] = 'Data de incepere (aaaa-ll-zz)';
$lang['reports_third_quarter'] = 'al treilea trimestru';
$lang['reports_year_to_date'] = 'Anul in curs';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'Venit Anual';

$lang['settings_account_settings'] = 'Setari Cont'; // to be translated
$lang['settings_invoice_settings'] = 'Setari Factura'; // to be translated
$lang['settings_advanced_settings'] = 'Setari Avansate'; // to be translated

$lang['settings_company_name'] = 'Numele Companiei';
$lang['settings_currency_symbol'] = 'Simbolul Valutei';
$lang['settings_currency_type'] = 'Tipul Valutei';
$lang['settings_days_payment_due'] = 'Zile până la scadenţa facturii';
$lang['settings_default_note'] = 'Notă de Facturare';
$lang['settings_display_branding'] = 'Display BambooInvoice Branding';  // TO BE TRANSLATED
$lang['settings_logo'] = 'Emblemă';
$lang['settings_modify_fail'] = 'A avut loc o eroare in timpul modificării setărilor dumneavoastră';
$lang['settings_modify_success'] = 'Setările au fost modificate.';
$lang['settings_note_max_chars'] = '(maximum 255 de litere)';
$lang['settings_primary_contact'] = 'Contact Principal';
$lang['settings_primary_email'] = 'Email Contact Principal';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Salvează Setările';
$lang['settings_save_invoices'] = 'Salvează Factură';
$lang['settings_save_invoices_warning'] = '<strong>Warning:</strong> Turning this off will remove all currently saved invoices.'; // to be translated
$lang['settings_settings_default'] = 'Acestea sunt setările preexistente';
$lang['settings_short_language'] = 'ro';
$lang['settings_tax_code'] = 'Numărul/Codul de taxă';
$lang['settings_will_use'] = 'va fi folosit la generarea facturilor către clienţi.';

$lang['utilities_download_backup'] = 'Download backup';
$lang['utilities_automatic_version_check'] = 'Automatically check for new versions'; // to be translated
$lang['utilities_phpinfo'] = 'PHP info';
$lang['utilities_phpinfo_not_available'] = 'This feature is not available in the demo.'; // to be translated
$lang['utilities_new_version_available'] = "A new version of BambooInvoice version is now available. "; // space after period  // to be translated
$lang['utilities_up_to_date'] = "You are using the most recent version of BambooInvoice."; // to be translated
$lang['utilities_connection_failed'] = "A connection to http://bambooinvoice.org could not be established."; // to be translated
$lang['utilities_version_check'] = "New version check"; // to be translated
$lang['utilities_version_undetermined'] = "Version status could not be determined."; // to be translated

$lang['menu_did_you_know_quotes'] = array(
					"BambooINVOICE este lansat sub licenţă GPL.",
					"Puteţi să schimbaţi setările dumneavoastră oricând din meniul &ldquo;Setări&rdquo;.",
					"Manualul de ajutor se dezvoltă în fiecare zi. Vizitaţi BambooINVOICE.org pentru cea mai nouă versiune!",
					"Puteţi crea un nou client din meniul &ldquo;Clienţi&rdquo;, sau chiar înainte de a emite o factură!",
					"Un fir de bambus dintr-un sistem de bază ajunge la înăltimea maximă în doar un an!",
					"Viaţa indelungată a plantei de bambus este motivul pentru care a devenit smbolul chinezesc pentru longevitate si simbolul indian al prieteniei adevărate."
					);

?>