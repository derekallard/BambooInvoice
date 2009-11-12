<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Откажи';
$lang['actions_change'] = 'Промени';
$lang['actions_create_invoice'] = 'Създай Фактура';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'Изтрий';
$lang['actions_edit'] = 'Редактирай';
$lang['actions_required_fields'] = 'Задължителни Полета';
$lang['actions_select_below'] = 'избери отдолу';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Invoice</span>';
$lang['bambooinvoice_version'] = 'Версия';

$lang['clients_add_contact'] = 'Добави Контакт';
$lang['clients_address1'] = 'Адрес1';
$lang['clients_address2'] = 'Адрес2';
$lang['clients_assigned_to_them'] = 'фактури свързани с тях. Напът си да <strong class="error">изтриеш завинаги</strong> този клиент, и <strong class="error">всяка фактура свързана с него</strong>. Сигурен ли си, че искаш да направиш това?';
$lang['clients_cancel_add_contact'] = 'Откажи добавянето на Контакт';
$lang['clients_city'] = 'Град';
$lang['clients_client_has'] = 'Този клиент има ';
$lang['clients_clients_registered'] = 'регистрирани клиенти';
$lang['clients_contact_add'] = 'Неуспешно добавяне на контакта. Моля имайте предвид, че Първо Име, Фамилия и реален емайл са задължителни.';
$lang['clients_contact_delete_fail'] = 'Неуспешно изтриване на контакта.';
$lang['clients_contacts'] = 'Контакти';
$lang['clients_country'] = 'Държава';
$lang['clients_create_new_client'] = 'Създай Нов Клиент';
$lang['clients_created'] = 'Нов Клиент е Добавен';
$lang['clients_delete_all_invoices'] = 'Изтрий клиента и всички фактури';
$lang['clients_delete_client'] = 'Изтрий Клиент';
$lang['clients_delete_contact'] = 'Изтрий Контакт';
$lang['clients_deleted'] = 'Клиентът е успешно изтрит';
$lang['clients_deleted_error'] = 'Клиентът не може да бъде изтрит'; 
$lang['clients_edit_client'] = 'Редактирай Клиент';
$lang['clients_edit_contact'] = 'Редактирай Контакт';
$lang['clients_edited'] = 'Клиента е успешно променен';
$lang['clients_edited_contact_info'] = 'Контакт информацията е успешно обновена';
$lang['clients_email'] = 'Емайл';
$lang['clients_first_name'] = 'Първо Име';
$lang['clients_id'] = 'Номер на Клиент';
$lang['clients_last_name'] = 'Фамилия';
$lang['clients_name'] = 'Име на Клиента';
$lang['clients_no_invoice_listed'] = 'Текущо няма контакти за';
$lang['clients_notes'] = 'Notes';
$lang['clients_new_contact_fail'] = 'Неуспешно добавяне на контакта. Моля имайте предвид, че Първо Име, Фамилия и реален емайл са задължителни.';
$lang['clients_phone'] = 'Телефон';
$lang['clients_postal'] = 'Пощенски Код';
$lang['clients_province'] = 'Провинция/Щат';
$lang['clients_save_client'] = 'Запази Клиента';
$lang['clients_title'] = 'Title'; // NEEDS TRANSLATION
$lang['clients_to'] = 'към';
$lang['clients_update_client'] = 'Обнови Клиент';
$lang['clients_website'] = 'Уеб страница';
$lang['clients_you_have'] = 'Имаш ';

$lang['error_date_fill'] = 'Изглежда има грешки. Моля имайте предвид, че датата трябва да е във формат ГГГГ-ММ-ДД, и количеството трябва да е число. Моля върнете се и опитайте отново.';
$lang['error_date_format'] = 'Датата трябва да е във формат ГГГГ-ММ-ДД';
$lang['error_email_recipients'] = 'Моля изберете поне 1 получател за тази фактура';
$lang['error_field_required'] = 'Това поле е задължително';
$lang['error_login_password'] = 'Моля напишете парола';
$lang['error_login_username'] = 'Моля напишете потребителско име';
$lang['error_problem_editing'] = 'Имаше проблем редактирайки тази фактура. Моля съобщете за грешка invoice_controller_edit';
$lang['error_problem_inserting'] = 'Проблем във въвеждането';
$lang['error_problem_saving'] = 'Имаше проблем в запазването на фактурата за изпращане.';
$lang['error_selection'] = 'В избора, който направихте, няма фактури.';

$lang['invoice_add_note'] = 'Add Note';
$lang['invoice_all_clients'] = 'Всички Клиенти';
$lang['invoice_all_invoices'] = 'Всички Фактури';
$lang['invoice_amount'] = 'Количество';
$lang['invoice_amount_item'] = 'Количество';
$lang['invoice_amount_error'] = 'Моля въведете количество';
$lang['invoice_amount_numbers_only'] = 'Само числа моля';
$lang['invoice_amount_paid'] = 'Amount Paid'; // NEEDS TRANSLATION
$lang['invoice_amount_outstanding'] = 'Amount Outstanding'; // NEEDS TRANSLATION
$lang['invoice_bill_to'] = 'Издадена на';
$lang['invoice_client'] = 'Клиент';
$lang['invoice_client_id'] = 'Номер на Клиент';
$lang['invoice_closed'] = 'Затворена';
$lang['invoice_comment'] = 'Коментар';
$lang['invoice_comment_success'] = 'Note successfully added, you can review below.'; // NEEDS TRANSLATION
$lang['invoice_contact_add'] = 'Няма налични контакти, на които да се изпрати фактурата. За да добавите, моля използвайте';
$lang['invoice_date_issued'] = 'Дата на издаване';
$lang['invoice_date_issued_full'] = 'Дата на издаване (във формат ГГГГ-ММ-ДД)';
$lang['invoice_date_paid_full'] = 'Дата на плащане (във формат ГГГГ-ММ-ДД)';
$lang['invoice_email_demo'] = 'Моля имайте предвид, че за да се предотвратят злоупотреби с това демо, емайл <em>не е</em> пратен. За да видите копие на PDF прикачения файл, изберете &ldquo;създай фактура&rdquo; от менюто.';
$lang['invoice_email_invoice_to'] = 'Прати по емайл фактурата на';
$lang['invoice_email_message'] = 'Емайл съобщение';
$lang['invoice_email_no_recipient'] = 'Моля върнете се, и изберете на кого да бъде пратена фактурата.';
$lang['invoice_email_success'] = 'Фактурата е успешно изпратена. Може да прегледате отдолу историята на тази фактура.';
$lang['invoice_export_to'] = 'Извадете фактурната информация към';
$lang['invoice_generated_by'] = 'Фактура издадена от';
$lang['invoice_history_comments'] = 'История на фактура &amp; Коментари';
$lang['invoice_invoice'] = 'Фактура';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Фактурата е успешно изтрита';
$lang['invoice_invoice_edit_success'] = 'Фактурата е успешно променена';
$lang['invoice_is_tax_exempt'] = 'е данъчно освободен';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'последен използван номер ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Нова Фактура';
$lang['invoice_new_invoice_error'] = 'Грешка в Нова Фактура';
$lang['invoice_new_invoice_to'] = 'Нова фактура за';
$lang['invoice_no_payments_entered'] = 'Няма парични постъпления за тази фактура. За да въведете плащане, използвайте &quot;Въведи Плащане&quot; от менюто.';
$lang['invoice_not_sent'] = 'Фактурата все още не е изпратена на клиент. За да пратите тази фактура, използвайте &quot;Прати по емайл Фактурата&quot; от менюто.';
$lang['invoice_not_taxable'] = 'Не подлежи на данъчно облагане';
$lang['invoice_not_unique'] = 'Този номер на фактура не е уникален';
$lang['invoice_note'] = 'Фактурна бележка';
$lang['invoice_note_max_chars'] = '(максимум 255 символа)';
$lang['invoice_no_invoice_match'] = 'Няма фактури в системата, които да отговарят на този критерии';
$lang['invoice_number'] = 'Номер на Фактура';
$lang['invoice_open'] = 'Отвори';
$lang['invoice_or'] = 'или';
$lang['invoice_or_new_client'] = 'или въведи нов клиент';
$lang['invoice_overdue'] = 'Пресрочен';
$lang['invoice_overdue_invoices'] = 'пресрочена фактура(и)';
$lang['invoice_payment_enter'] = 'Въведи плащане за';
$lang['invoice_payment_history'] = 'Платежна история';
$lang['invoice_payment_success'] = 'Направено е успешно плащане на фактура.';
$lang['invoice_payment_term'] = 'Платежни Условия';
$lang['invoice_premenently_delete'] = 'Напът сте да <strong class="error">изтриете завинаги</strong> фактура';
$lang['invoice_problem_creating'] = 'Имаше проблем при създаването на фактурата.';
$lang['invoice_quantity'] = 'Количество';
$lang['invoice_return_invoice_view'] = 'върни се към изгледа на фактурата';
$lang['invoice_save_edited_invoice'] = 'Запази редактираната Фактура';
$lang['invoice_select_client'] = 'Избери клиент';
$lang['invoice_send_to'] = 'Изпрати тази фактура на';
$lang['invoice_sent_to'] = 'Фактурата е изпратена на';
$lang['invoice_status'] = 'Статус';
$lang['invoice_summary'] = 'Извлечение';
$lang['invoice_sure_delete'] = 'Сигурен ли си, че искаш да направиш това? ';
$lang['invoice_tax1_description'] = 'Име на зачисления данък';
$lang['invoice_tax1_rate'] = 'Размер на данъка';
$lang['invoice_tax2_description'] = 'Име на втори данък';
$lang['invoice_tax2_rate'] = 'Размер на втори данък';
$lang['invoice_tax_exempt'] = 'Бележка: Този клиент е данъчно освободен';
$lang['invoice_tax_status'] = 'Данъчен Статус';
$lang['invoice_taxable'] = 'Подлежи на облагане с данъци';
$lang['invoice_there_are_currently'] = 'Текущо има';
$lang['invoice_total'] = 'Всичко';
$lang['invoice_work_description'] = 'Описание на Работа';
$lang['invoice_you_may_now'] = 'Сега можеш да';
$lang['invoice_you'] = 'You';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Моля убедете се, че <em>Caps Lock</em> клавиша не е натиснат';
$lang['login_forgot_password'] = 'Забравена парола';
$lang['login_login'] = 'Вход';
$lang['login_logout'] = 'Изход';
$lang['login_logout_confirm'] = 'Напът си да излезеш. Сигурен ли си, че искаш да го направиш?';
$lang['login_logout_success1'] = "Успешно излезе. Ако искаш,";
$lang['login_logout_success2'] = 'влез отново';
$lang['login_password'] = 'Парола';
$lang['login_password_confirm'] = 'Password Confirm'; // to be translated
$lang['login_password_email'] = "може да ти изпрати паролата на емайл адреса, с който си се регистрирал. Ако си я забравил и искаш да я смениш, просто попълни формата отдолу.";
$lang['login_password_email1'] = 'Смяната на паролата е успешна. Новата ти парола е';
$lang['login_password_email2'] = 'и сега може да се използва за';
$lang['login_password_fail'] = "Нещо се обърка. Знам, че това не е много полезна грешка, изглежда ще е необходимо проучване";
$lang['login_password_reset_demo'] = 'За демото, това е забранено, но ще си получил емайл с променената информация.';
$lang['login_password_reset_disabled'] = 'За демо версията, смяната на паролата е забранено.';
$lang['login_password_reset_email1'] = 'Някой (вероятно ти), е поискал смяна на паролата за твоя BambooInvoice профил.';
$lang['login_password_reset_email2'] = 'За да я смениш сега, последвай линка към нашата страница:';
$lang['login_password_reset_email3'] = "Ако не сте вие поискали това, моля пренебрегнете този емайл, и съжаляваме за безпокойството.";
$lang['login_password_reset_title'] = 'BambooInvoice Смяна на Парола';
$lang['login_password_reset_unable'] = 'Неуспешна промяна на паролата. Моля опитайте отново.';
$lang['login_password_sent'] = 'Потвърждението за смяна на парола е пратено на';
$lang['login_password_submit'] = 'Прати паролата';
$lang['login_password_success'] = 'Смяната на паролата бе успешна, и е пратена на емайла ти.';
$lang['login_remember_me'] = 'Запомни ме';
$lang['login_username'] = 'Емайл';
$lang['login_wrong_password'] = 'Съжалявам, потребителското име и/или паролата не могат да бъдат открити или са грешни. Моля опитай отново.';

$lang['menu_accounts'] = 'Accounts'; // to be translated
$lang['menu_bugs'] = 'Бъгове';
$lang['menu_catchphrase'] = 'Лесно,<br />Красиво,<br />Отворен Код,<br />Онлайн Фактуриране';
$lang['menu_catchphrase_nobreak'] = 'Лесно, Красиво, Отворен Код, Онлайн Фактуриране';
$lang['menu_changelog'] = 'Промени Архива';
$lang['menu_clients'] = 'Клиенти';
$lang['menu_credits'] = 'Кредити';
$lang['menu_delete_invoice'] = 'Изтрий Фактура';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Знаеше ли, че?';
$lang['menu_edit_invoice'] = 'Редактирай Фактура';
$lang['menu_email_invoice'] = 'Прати по емайл фактурата';
$lang['menu_enter_payment'] = 'Въведи Плащане';
$lang['menu_faq'] = 'Често Задавани Въпроси';
$lang['menu_generate_pdf'] = 'Създай PDF';
$lang['menu_help'] = 'Помощ';
$lang['menu_invoice_summary'] = 'Фактурно Извлечение';
$lang['menu_invoices'] = 'Фактури';
$lang['menu_logout'] = 'Изход';
$lang['menu_new_invoice'] = 'Нова Фактура';
$lang['menu_private_note'] = 'Private Note';
$lang['menu_print_invoice'] = 'Принтирай Фактура';
$lang['menu_reports'] = 'Отчети';
$lang['menu_roadmap'] = 'План';
$lang['menu_root_system'] = 'Главна Система';
$lang['menu_see_also'] = 'Виж Още';
$lang['menu_settings'] = 'Настройки';
$lang['menu_utilties'] = 'Приспособления';

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Създадено от';

$lang['reports_back_to_reports'] = 'обратно към отчетите';
$lang['reports_collected'] = 'събрани';
$lang['reports_end_date'] = 'Крайна Дата (гггг-мм-дд)';
$lang['reports_first_quarter'] = 'първа четвъртина';
$lang['reports_fourth_quarter'] = 'четвърта четвъртина';
$lang['reports_generate_report'] = 'Създай отчет';
$lang['reports_invoices_issued_year'] = 'фактури издадени тази година';
$lang['reports_legend'] = 'Легенда';
$lang['reports_second_quarter'] = 'втора четвъртина';
$lang['reports_start_date'] = 'Начална Дата (гггг-мм-дд)';
$lang['reports_third_quarter'] = 'трета четвъртина';
$lang['reports_year_to_date'] = 'Година до днес';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'Годишен Приход';

$lang['settings_account_settings'] = 'Account Settings'; // to be translated
$lang['settings_invoice_settings'] = 'Invoice Settings'; // to be translated
$lang['settings_advanced_settings'] = 'Advanced Settings'; // to be translated

$lang['settings_company_name'] = 'Име на фирмата';
$lang['settings_currency_symbol'] = 'Валутен символ';
$lang['settings_currency_type'] = 'Тип валута';
$lang['settings_days_payment_due'] = 'Дни до задължение по фактура';
$lang['settings_default_note'] = 'Фактурна бележка по подразбиране';
$lang['settings_display_branding'] = 'Показвай BambooInvoice Марка';
$lang['settings_logo'] = 'Лого';
$lang['settings_modify_fail'] = 'Имаше проблем при промяна на настройките';
$lang['settings_modify_success'] = 'Настройките са успешно променени';
$lang['settings_note_max_chars'] = '(максимум 255 символа)';
$lang['settings_primary_contact'] = 'Основен Контакт';
$lang['settings_primary_email'] = 'Основен емайл за контакт';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Запази Настройките';
$lang['settings_save_invoices'] = 'Запази Фактурите';
$lang['settings_save_invoices_warning'] = '<strong>Внимание:</strong> Изключвайки това, всички текущо запазени фактури ще бъдат премахнати.';
$lang['settings_settings_default'] = 'Тези настройки са по подразбиране';
$lang['settings_short_language'] = 'анг';
$lang['settings_tax_code'] = 'Твоят данъчен номер/код';
$lang['settings_will_use'] = 'ще се използва когато създавате фактури или клиенти.';

$lang['utilities_download_backup'] = 'Download backup';
$lang['utilities_automatic_version_check'] = 'Automatically check for new versions'; // to be translated
$lang['utilities_phpinfo'] = 'информация за PHP';
$lang['utilities_phpinfo_not_available'] = 'Тази услуга не е достъпна в демото.';
$lang['utilities_new_version_available'] = "A new version of BambooInvoice version is now available. "; // space after period
$lang['utilities_up_to_date'] = "You are using the most recent version of BambooInvoice.";
$lang['utilities_connection_failed'] = "A connection to http://bambooinvoice.org could not be established.";
$lang['utilities_version_check'] = "New version check";
$lang['utilities_version_undetermined'] = "Version status could not be determined.";

$lang['menu_did_you_know_quotes'] = array(
					"BambooINVOICE има форуми на forums.bambooinvoice.org за съпорт, заявяване на разширения, и за чат.",
					"BambooINVOICE е публикуван под GPL лиценз.",
					"Настройките ти могат да се променят по всяко време от меню &ldquo;настройки&rdquo;.",
					"Файлът с информация за помощ се обновява всеки ден. Посети BambooINVOICE.org за последната версия!",
					"Можеш да създадеш нов клиент от меню &ldquo;клиенти&rdquo;, или точно преди да издадеш фактура!",
					"Единично стебло на бамбук от изградена коренна система достига пълна височина само за една година!",
					"Дългият живот на бамбука го правят в Китай символ на дълъг живот, а в Индия е символ на приятелство."
					);

?>