<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang['accounts_admin_account_create_success'] = 'Admin account successfully created'; // TO BE TRANSLATED
$lang['accounts_admin_account_create_fail'] = 'Problem creating Admin account'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_success'] = 'Admin account successfully deleted'; // TO BE TRANSLATED
$lang['accounts_admin_account_delete_fail'] = 'Problem deleting Admin account'; // TO BE TRANSLATED

$lang['actions_cancel'] = 'Cancelar';
$lang['actions_change'] = 'Cambiar';
$lang['actions_create_invoice'] = 'Crear factura';
$lang['actions_donate'] = 'Donate'; // TO BE TRANSLATED
$lang['actions_delete'] = 'Eliminar';
$lang['actions_edit'] = 'Editar';
$lang['actions_required_fields'] = 'Campos obligatorios';
$lang['actions_select_below'] = 'elegir debajo';

$lang['bambooinvoice_logo'] = '<span class=\'bamboo_invoice_bam\'>Bamboo</span><span class=\'bamboo_invoice_inv\'>Invoice</span>';
$lang['bambooinvoice_version'] = 'Versión';

$lang['clients_add_contact'] = 'Añadir contacto';
$lang['clients_address1'] = 'Dirección1';
$lang['clients_address2'] = 'Dirección2';
$lang['clients_assigned_to_them'] = 'facturas asignadas a éstos. Estás por <strong class="error">eliminar permanentemente</strong> a este cliente y <strong class="error">todas las facturas asociadas</strong> con éste. Estás seguro de querer proseguir?';
$lang['clients_cancel_add_contact'] = 'No añadir contacto';
$lang['clients_city'] = 'Ciudad';
$lang['clients_client_has'] = 'Este cliente ha ';
$lang['clients_clients_registered'] = 'clientes registrados';
$lang['clients_contact_add'] = 'No se ha podido añadir este contacto. Nota: los campos Nombre,  Apellido y Email son obligatorios.';
$lang['clients_contact_delete_fail'] = 'Incapaz de eliminar este contacto.';
$lang['clients_contacts'] = 'Contactos';
$lang['clients_country'] = 'País';
$lang['clients_create_new_client'] = 'Crear nuevo cliente';
$lang['clients_created'] = 'Añadir cliente';
$lang['clients_delete_all_invoices'] = 'Eliminar cliente y todas facturas asociadas';
$lang['clients_delete_client'] = 'Eliminar cliente';
$lang['clients_delete_contact'] = 'Eliminar contacto';
$lang['clients_deleted'] = 'Eliminar cliente'; 
$lang['clients_deleted_error'] = 'El cliente no puede ser eliminado'; 
$lang['clients_edit_client'] = 'Editar cliente';
$lang['clients_edited'] = 'Cliente modificado satisfactoriamente'; 
$lang['clients_edited_contact_info'] = 'Editar cliente';
$lang['clients_edit_contact'] = 'Editar contacto';
$lang['clients_email'] = 'Email';
$lang['clients_first_name'] = 'Nombre';
$lang['clients_id'] = 'Id de cliente';
$lang['clients_last_name'] = 'Apellido';
$lang['clients_name'] = 'Nombre del cliente';
$lang['clients_new_contact_fail'] = 'No se ha podido añadir este contacto. Nota: los campos Nombre, Apellido y Email son obligatorios.';
$lang['clients_no_invoice_listed'] = 'Actualmente no hay contactos listados para';
$lang['clients_notes'] = 'Notas';
$lang['clients_phone'] = 'Teléfono';
$lang['clients_postal'] = 'Código postal';
$lang['clients_province'] = 'Provincia/Estado';
$lang['clients_save_client'] = 'Guardar cliente';
$lang['clients_title'] = 'Title';
$lang['clients_to'] = 'a';
$lang['clients_update_client'] = 'Modificar cliente';
$lang['clients_website'] = 'Sitio web';
$lang['clients_you_have'] = 'Tienes ';

$lang['error_date_fill'] = 'Se ha detectado algunos errores. Nota: la fecha debe estar en formato YYYY-MM-DD y la cantidad debe ser un número. Vuelve hacia atrás e inténtalo nuevamente.';
$lang['error_date_format'] = 'La fecha debe estar en el formato YYYY-MM-DD';
$lang['error_email_recipients'] = 'Seleccionar al menos un destinatario para esta factura';
$lang['error_field_required'] = 'Este campo es obligatorio';
$lang['error_login_password'] = 'Introducir una contraseña';
$lang['error_login_username'] = 'Introducir un nombre de usuario';
$lang['error_problem_editing'] = 'Se han detectado errores al editar esta factura. Por favor enviar informe de error invoice_controller_edit';
$lang['error_problem_inserting'] = 'Se han detectado problemas al introducir';
$lang['error_problem_saving'] = 'Se han detectado problemas guardando la factura para enviar.';
$lang['error_selection'] = 'La selección que has hecho no tiene facturas asociadas.';

$lang['install_explain'] = 'Your email is used both as your &quot;username&quot; for logging in, and also for any email tasks, such as sending invoices, resetting passwords, etc.  The Primary Contact name is used in the &quot;from&quot; field when sending out invoices over email.';
$lang['install_install'] = 'Install';
$lang['install_welcome'] = 'Welcome to '.$lang['bambooinvoice_logo'].'.  In order to install I just need to gather a few things about you.';

$lang['invoice_add_note'] = 'Añadir notas';
$lang['invoice_all_clients'] = 'Todos los clientes';
$lang['invoice_all_invoices'] = 'Todas las facturas';
$lang['invoice_amount'] = 'Cantidad';
$lang['invoice_amount_item'] = 'Cantidad';
$lang['invoice_amount_error'] = 'Ingresar la cantidad';
$lang['invoice_amount_numbers_only'] = 'Introducir sólo números';
$lang['invoice_amount_paid'] = 'Cantidad pagada';
$lang['invoice_amount_outstanding'] = 'Cantidad pendiente';
$lang['invoice_bill_to'] = 'Facturar a';
$lang['invoice_client'] = 'Cliente';
$lang['invoice_client_id'] = 'Id de cliente';
$lang['invoice_closed'] = 'Cerrado';
$lang['invoice_comment'] = 'Comentario';
$lang['invoice_comment_success'] = 'Notas añadidas con exito, puedes verlo debajo.'; 
$lang['invoice_contact_add'] = 'No hay contactos disponibles para enviar esta fatura. Para añadir uno, usar el';
$lang['invoice_date_issued'] = 'Fecha de emisión';
$lang['invoice_date_issued_full'] = 'Fecha de emisión (en formato YYYY-MM-DD)';
$lang['invoice_date_paid_full'] = 'Fecha de pago (en formato YYYY-MM-DD)';
$lang['invoice_email_demo'] = 'Nota: para evitar abuso de esta demo los mensajes <em>no</em> son enviados. Para ver una copia del PDF adjunto elegir &ldquo;generar factura&rdquo; en el menú.';
$lang['invoice_email_invoice_to'] = 'Enviar factura a';
$lang['invoice_email_message'] = 'Enviar mensaje';
$lang['invoice_email_no_recipient'] = 'Volver atrás y elegir el destinatario de la factura.';
$lang['invoice_email_success'] = 'Factura enviada con éxito. Puedes revisar el historial de esta factura debajo.';
$lang['invoice_export_to'] = 'Exportar datos de factura a';
$lang['invoice_generated_by'] = 'Factura generada por';
$lang['invoice_history_comments'] = 'Historial y comentarios de factura';
$lang['invoice_invoice'] = 'Factura';
$lang['invoice_blind_copy_me'] = 'blind copy me on this email'; // TO BE TRANSLATED
$lang['invoice_invoice_delete_success'] = 'Se ha eliminado la factura con éxito';
$lang['invoice_invoice_edit_success'] = 'Se ha editado la factura con éxito';
$lang['invoice_is_tax_exempt'] = 'is tax exempt';
$lang['invoice_item'] = 'Item'; // to be translated
$lang['invoice_last_used'] = 'último número en uso ';
$lang['invoice_new_item'] = 'New Item'; // to be translated
$lang['invoice_new_invoice'] = 'Factura nueva';
$lang['invoice_new_invoice_error'] = 'Error en la factura nueva';
$lang['invoice_new_invoice_to'] = 'Nueva factura para';
$lang['invoice_no_payments_entered'] = 'No se ha ingresado ningún pago para esta factura. Para ingresar un pago, utilizar la opción &quot;Ingresar pago&quot; en el menú.';
$lang['invoice_not_sent'] = 'La factura todavía no ha sido enviada al cliente. Para hacerlo utilizar la opción &quot;Enviar factura&quot; en el menú.';
$lang['invoice_not_taxable'] = 'No recibe carga fiscal';
$lang['invoice_not_unique'] = 'El número de factura no es único';
$lang['invoice_note'] = 'Nota de la factura';
$lang['invoice_note_max_chars'] = '(max 255 letras)';
$lang['invoice_no_invoice_match'] = 'No se han encontrado facturas en el sistema que correspondan a los criterios ingresados.';
$lang['invoice_number'] = 'Número de factura';
$lang['invoice_open'] = 'Abrir';
$lang['invoice_or'] = 'o';
$lang['invoice_or_new_client'] = 'o ingresar un nuevo cliente.';
$lang['invoice_overdue'] = 'Vencida';
$lang['invoice_overdue_invoices'] = 'factura(s) vencida(s)';
$lang['invoice_payment_enter'] = 'Ingresar pago por';
$lang['invoice_payment_history'] = 'Historial de pago';
$lang['invoice_payment_success'] = 'Pago de factura ingresado con éxito.';
$lang['invoice_payment_term'] = 'Término de pago';
$lang['invoice_premenently_delete'] = 'Estas a punto de <strong class="error">eliminar definitivamente</strong> esta factura';
$lang['invoice_problem_creating'] = 'Se ha producido un problema al crear la factura.';
$lang['invoice_quantity'] = 'Cantidad';
$lang['invoice_return_invoice_view'] = 'volver a la vista de facturas';
$lang['invoice_save_edited_invoice'] = 'Guardar factura editada';
$lang['invoice_select_client'] = 'Elegir cliente';
$lang['invoice_send_to'] = 'Enviar esta factura a';
$lang['invoice_sent_to'] = 'Factura enviada a';
$lang['invoice_status'] = 'Estatus';
$lang['invoice_summary'] = 'Sumario';
$lang['invoice_sure_delete'] = 'Estás seguro de querer hacer esto? ';
$lang['invoice_tax1_description'] = 'Nombre del impuesto cobrado';
$lang['invoice_tax1_rate'] = 'Porcentaje del impuesto 1';
$lang['invoice_tax2_description'] = 'Nombre del segundo impuesto cobrado';
$lang['invoice_tax2_rate'] = 'Porcentaje del impuesto 2';
$lang['invoice_tax_exempt'] = 'Nota: este cliente está exento de impuestos';
$lang['invoice_tax_status'] = 'Estatus impositivo';
$lang['invoice_taxable'] = 'Lleva carga fiscal';
$lang['invoice_there_are_currently'] = 'Actualmente hay';
$lang['invoice_total'] = 'Total';
$lang['invoice_work_description'] = 'Descripción del trabajo';
$lang['invoice_you_may_now'] = 'Quizás sepas';
$lang['invoice_you'] = 'You';

$lang['login_allow_login'] = 'Add new admin account'; // to be translated
$lang['login_caps_lock'] = 'Asegúrate que la tecla  <em>Bloquear Mayúsculas</em> no está activada';
$lang['login_forgot_password'] = 'Contraseña olvidada';
$lang['login_login'] = 'Ingresar';
$lang['login_logout'] = 'Cerrar sesión';
$lang['login_logout_confirm'] = 'Estás por cerrar la sesión. Estás seguro de querer continuar con ésto?';
$lang['login_logout_success1'] = "Has cerrado la sesión con éxito. Si deseas puedes ";
$lang['login_logout_success2'] = 'ingresar de nuevo.';
$lang['login_password'] = 'Contraseña';
$lang['login_password_confirm'] = 'Confirmar contraseña'; 
$lang['login_password_email'] = "puede enviarte tu contraseña a la dirección email con la cual te has registrado. Si la has olvidado y desdeas que obtener una contraseña nueva simplemente llena el formulario de aquí abajo.";
$lang['login_password_email1'] = 'El cambio de contraseña se ha realizado con éxito. Tu nueva contraseña es';
$lang['login_password_email2'] = 'y la puedes usar para';
$lang['login_password_fail'] = "Encontramos un error. Disculpa por el mensaje poco explícito, pero pareciera que necesitamos monitoriar los errores de la aplicación.";
$lang['login_password_reset_demo'] = 'Función deshabilitada en la demo. En condiciones normales recibirás un mensaje email con la nueva información.';
$lang['login_password_reset_disabled'] = 'Para la versión demo se ha deshabilitado la función para generar nuevas contraseñas.';
$lang['login_password_reset_email1'] = 'Alguien (quizás seas tu), ha pedido una nueva contraseña para su cuenta con BambooInvoice.';
$lang['login_password_reset_email2'] = 'Para generar una nueva seguir el vínculo a nuestro sitio web:';
$lang['login_password_reset_email3'] = "Si no has pedido una contraseña nueva simplemente ignora este mensaje. Perdón por las molestias ocasionadas.";
$lang['login_password_reset_title'] = 'Nueva contraseña de BambooInvoice';
$lang['login_password_reset_unable'] = 'No se ha podido generar una nueva contraseña. Por favor intentarlo nuevamente.';
$lang['login_password_sent'] = 'Hemos enviado una mensaje de confirmación por el cambio de contraseña a';
$lang['login_password_submit'] = 'Enviar contraseña';
$lang['login_password_success'] = 'Se ha podido cambiar la contraseña con éxito. Un mensaje de confirmación fue enviado a ';
$lang['login_remember_me'] = 'Recordarme';
$lang['login_username'] = 'Email';
$lang['login_wrong_password'] = 'El sistema no se encontrado el nombre de usuario y/o contraseña ingresados. Posiblemente éstos no existan o sean incorrectos. Intentarlo nuevamente.';

$lang['menu_accounts'] = 'Cuentas de usuario';
$lang['menu_bugs'] = 'Problemas';
$lang['menu_catchphrase'] = 'Simple,<br />Maravilloso,<br />Código libre,<br />Sistema de facturación online';
$lang['menu_catchphrase_nobreak'] = 'Simple, Maravilloso, Código libre, Sistema de facturación online';
$lang['menu_changelog'] = 'Cambiar Log';
$lang['menu_clients'] = 'Clientes';
$lang['menu_credits'] = 'Créditos';
$lang['menu_delete_invoice'] = 'Eliminar factura';
$lang['menu_duplicate_invoice'] = 'Duplicate Invoice'; // TO BE TRANSLATED
$lang['menu_did_you_know'] = 'Sabías que?';
$lang['menu_edit_invoice'] = 'Editar factura';
$lang['menu_email_invoice'] = 'Enviar factura';
$lang['menu_enter_payment'] = 'Ingresar pago';
$lang['menu_faq'] = 'FAQ Preguntas frecuentes';
$lang['menu_generate_pdf'] = 'Generar PDF';
$lang['menu_help'] = 'Ayuda';
$lang['menu_invoice_summary'] = 'Sumario de factura';
$lang['menu_invoices'] = 'Facturas';
$lang['menu_logout'] = 'Cerrar sesión';
$lang['menu_new_invoice'] = 'Nueva factura';
$lang['menu_print_invoice'] = 'Imprimir factura';
$lang['menu_private_note'] = 'Nota privada';
$lang['menu_reports'] = 'Informes';
$lang['menu_roadmap'] = 'Hoja de ruta';
$lang['menu_root_system'] = 'Inicio del sistema';
$lang['menu_see_also'] = 'Ver también';
$lang['menu_settings'] = 'Configuración';
$lang['menu_utilties'] = 'Utilidades';

$lang['notice_english_only'] = 'Available in English Only'; // to be translated
$lang['notice_generated_by'] = 'Generado por';

$lang['reports_back_to_reports'] = 'volver a Informes';
$lang['reports_collected'] = 'escogidos';
$lang['reports_end_date'] = 'Fecha de finalización (yyyy-mm-dd)';
$lang['reports_first_quarter'] = 'primer trimestre';
$lang['reports_fourth_quarter'] = 'cuarto trimestre';
$lang['reports_generate_report'] = 'Generar informe';
$lang['reports_invoices_issued_year'] = 'facturas emitidas este año';
$lang['reports_legend'] = 'Observación';
$lang['reports_second_quarter'] = 'segundo trimestre';
$lang['reports_start_date'] = 'Fecha de inicio (yyyy-mm-dd)';
$lang['reports_third_quarter'] = 'cuarto trimestre';
$lang['reports_year_to_date'] = 'Años hasta la fecha';
$lang['reports_no_data'] = 'There is no data available for those dates.'; // to be translated
$lang['reports_yearly_income'] = 'Ingresos anuales';

$lang['settings_account_settings'] = 'Configurar cuenta'; 
$lang['settings_invoice_settings'] = 'Configurar factura'; 
$lang['settings_advanced_settings'] = 'Configuración avanzada'; 

$lang['settings_company_name'] = 'Nombre de empresa';
$lang['settings_currency_symbol'] = 'Símbolo de divisa';
$lang['settings_currency_type'] = 'Tipo de divisa';
$lang['settings_days_payment_due'] = 'Días hasta vencimiento de factura';
$lang['settings_default_note'] = 'Nota de factura por defecto';
$lang['settings_display_branding'] = 'Mostrar la marca BambooInvoice en la factura';
$lang['settings_logo'] = 'Logo';
$lang['settings_modify_fail'] = 'Se han encontrado algunos problemas al modificar la configuración';
$lang['settings_modify_success'] = 'Configuración modificada con éxito';
$lang['settings_note_max_chars'] = '(max 255 letras)';
$lang['settings_primary_contact'] = 'Contacto primario';
$lang['settings_primary_email'] = 'Dirección email del contacto primario';
$lang['settings_primary_email_message'] = 'Changing this email will also change the email you use to login with.'; // TO BE TRANSLATED
$lang['settings_save_settings'] = 'Guardar configuración';
$lang['settings_save_invoices'] = 'Guardar Factura';
$lang['settings_save_invoices_warning'] = '<strong>Precaución:</strong> Desmarcando esta opción puede provocar la perdida de todas las facturas almacenadas.'; 
$lang['settings_settings_default'] = 'Configuración por defecto';
$lang['settings_short_language'] = 'es';
$lang['settings_tax_code'] = 'Número/código fiscal'; //CIF in Spain, CUIT in Argentina
$lang['settings_will_use'] = 'se usará cuando crees nuevas facturas o clientes.';

$lang['utilities_download_backup'] = 'Descargar copia de seguridad';
$lang['utilities_automatic_version_check'] = 'Buscar nuevas versiones automaticamente'; 
$lang['utilities_phpinfo'] = 'información de PHP'; 
$lang['utilities_phpinfo_not_available'] = 'Esta opcion no esta disponible en la demo.'; 
$lang['utilities_new_version_available'] = "Hay una nueva versión de BambooInvoice disponible."; 
$lang['utilities_up_to_date'] = "Estas usando la versión mas reciente de BambooInvoice."; 
$lang['utilities_connection_failed'] = "La conexión con http://bambooinvoice.org no ha podido ser realizada."; 
$lang['utilities_version_check'] = "Buscar nueva versión"; 
$lang['utilities_version_undetermined'] = "El estado de la versión no puede ser determinado."; 

$lang['menu_did_you_know_quotes'] = array(
					"BambooINVOICE es distribuido bajo licencia GPL.",
					"Tu configuración puede ser cambiada en cualquier momento usando el menú &ldquo;Configuración&rdquo;.",
					"Los archivos de ayuda siguen creciendo dia a dia. Visita BambooINVOICE.org para consultar la ultima version!",
					"Puedes crear un cliente nuevo usando el menu &ldquo;clientes&rdquo; o tambien justo antes de emitir una nueva factura!",
					"Un simple gajo de bambu de un sistema de raiz establecida puede llegar a una altura total en solo un año!",
					"La larga vida del bambo hace que sea el simbolo chino de una vida larga. En India es el simbolo de la amistad."
					);
?>