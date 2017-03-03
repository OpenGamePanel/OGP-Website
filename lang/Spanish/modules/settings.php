<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

define('maintenance_mode', "Modo de mantenimiento");
define('maintenance_mode_info', "Disable the Panel for normal users. Only administrators can access it during maintenance.");
define('maintenance_title', "Titulo de mantenimiento");
define('maintenance_title_info', "Título que se muestra cuando la página esta en modo de mantenimiento.");
define('maintenance_message', "Mensaje de mantenimineto");
define('maintenance_message_info', "Este es el mensaje que se mostrara cuando la pagina este deshabilitada por mantenimiento.");
define('update_settings', "Actualizar configuración");
define('settings_updated', "Configuración actualizada.");
define('panel_language', "Lenguaje del panel");
define('panel_language_info', "El lenguaje que seleccione aqui sera el lenguaje por defecto para todos los usuarios. Cada usuario podra seleccionar un lenguaje posteriormente.");
define('page_auto_refresh', "Refresco de paginas automatico");
define('page_auto_refresh_info', "el refresco de paginas automatico se utiliza principalmente en la depuración del panel. En el uso normal debe ser activado.");
define('smtp_server', "Servidor de correo saliente SMTP");
define('smtp_server_info', "Este es el servidor de correo saliente (servidor SMTP) que se utiliza, por ejemplo, para enviar las contraseñas olvidadas a los usuarios, por defecto 'localhost'.");
define('panel_email_address', "Email del administrador");
define('panel_email_address_info', "Esta es la direccion de email para el remitente en las comunicaciones de OGP.");
define('panel_name', "Nombre del panel");
define('panel_name_info', "Nombre que se muestra en el titulo de la pagina del panel.");
define('feed_enable', "Activar Feed LGSL");
define('feed_enable_info', "Sí tu alojamiento web tiene el cortafuegos bloqueando el puerto Query deberas activarlo.");
define('feed_url', "URL del Feed");
define('feed_url_info', "GrayCube.com comparte un feed LGSL en la URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Codificación de caracteres");
define('charset_info', "UTF8, ISO, ASCII, etc... Leave it blank to use ISO encoding.");
define('steam_user', "Usuario de Steam");
define('steam_user_info', "Esta cuenta se necesita para descargar algunos juegos nuevos desde Steam como CS:GO.");
define('steam_pass', "Contraseña de Steam");
define('steam_pass_info', "Ponga aquí la contraseña de la cuenta de Steam.");
define('steam_guard', "Codigo de Steam Guard");
define('steam_guard_info', "Algunos usuarios tienen activado Steam Guard para proteger sus cuentas contra hackers,<br>este código es enviado a sú correo electrónico cuando se inicia la primera actualización.");
define('smtp_port', "Puerto SMTP");
define('smtp_port_info', "Sí el puerto SMTP no es el puerto por defecto (25) introduzca aqui el puerto SMTP.");
define('smtp_login', "Usuario SMTP");
define('smtp_login_info', "Sí su servidor SMTP requiere autenticación, introduzca aqui su nombre de usuario.");
define('smtp_passw', "Contraseña SMTP");
define('smtp_passw_info', "Sí no establece una contraseña no se usara la autenticación SMTP");
define('smtp_secure', "SMTP Seguro");
define('smtp_secure_info', "Usa SSL/TLS para conectarse al servidor SMTP");
define('time_zone', "Zona Horaria");
define('time_zone_info', "Establce la zona horaria predetermiada usada por todas las funciones de fecha/hora.");
define('query_cache_life', "Vida de la caché de peticiones");
define('query_cache_life_info', "Ajusta el retraso en segundos antes de que el estado del servidor sea refrescado.");
define('query_num_servers_stop', "Desactivar peticiones a los servidores si son mas de");
define('query_num_servers_stop_info', "Use esta configuración para desactivar las peticiones si un usuario tiene mas servidores de juegos que la cantidad especificada, de este modo se agiliza la carga del panel.");
define('editable_email', "Dirección de E-Mail editable");
define('editable_email_info', "Seleccione si los usuarios pueden editar su dirección de e-mail o no.");
define('old_dashboard_behavior', "Comportamiento anterior del Dashboard");
define('old_dashboard_behavior_info', "El Dashboard anterior funcionaba mas lentamente pero muestra mas información del servidor, mapa y jugadores actuales.");
define('rsync_available', "Servidores Rsync Disponibles");
define('rsync_available_info', "Selecciona que lista de servidores será mostrada en la instalación Rsync.");
define('all_available_servers', "Todos los servidores disponibles ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Solo servidores remotos ( rsync_sites.list )");
define('only_local_servers', "Solo servidores locales ( rsync_sites_local.list )");
define('header_code', "Codigo de cabeceras");
define('header_code_info', "Aquí puede añadir código de cabecera (como código HTML, código de inserción, etc.) sin editar la disposición del tema.");
define('support_widget_title', "Título widget soporte");
define('support_widget_title_info', "Un título personalizado para el widget de soporte del dashboard.");
define('support_widget_content', "Contenido widget soporte");
define('support_widget_content_info', "El contenido del widget de soporte, puede usar codigo HTML.");
define('support_widget_link', "Enlace widget soporte");
define('support_widget_link_info', "La URL de su web de soporte.");
define('recaptcha_site_key', "Clave Recaptcha (site key)");
define('recaptcha_site_key_info', "La clave que recibiste de Google.");
define('recaptcha_secret_key', "Clave secreta Recaptcha");
define('recaptcha_secret_key_info', "La clave secreta que te proporcionó Google.");
define('recaptcha_use_login', "Usar Recaptcha en el inicio de sesión");
define('recaptcha_use_login_info', "Si se activa, los usuarios deberán resolver una pregunta a parte de su inicio de sesión habitual. Esto intenta evitar intentos de inicio de sesión automatizados por parte de un programa.");
define('login_attempts_before_banned', "Number of failed login attempts before user is banned");
define('login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('remote_query', "Peticiones remotas");
define('remote_query_info', "Usar el servidor remoto (Agente) para hacer peticiones a los servidores de juegos (Solo GameQ y LGSL).");
define('check_expiry_by', "Comprobar caducidad por");
define('check_expiry_by_info', "Al elegir <i>\"Una vez dentificado\"</i> los servidores ( o asignaciones de servidores ),<br>seran eliminados ( o quitados al usuario/grupo ) una vez que el usuario al que pertenecen <br>( o estan asignados ) se identifica.<br>Sin embargo, si elige la opción <i>\"Trabajo de Cron\"</i> usted debera tener configurado un trabajo de cron<br>para ejecutar cada cierto tiempo el script que comprueba la fecha de caducidad y,<br>de este modo, llevar a cabo estas tareas lo mas pronto posible.");
define('once_logged_in', "Una vez dentificado");
define('cron_job', "Trabajo de Cron");
define('theme_settings', "Ajustes de tema");
define('theme', "Tema");
define('theme_info', "El tema que seleccione aqui sera el tema por defecto para todos los usuarios. Cada usuario podra seleccionar un tema posteriormente.");
define('welcome_title', "Título de bienvenida");
define('welcome_title_info', "Permite que el título que aparece en la parte superior del salpicadero.");
define('welcome_title_message', "Mensaje de bienvenida del título");
define('welcome_title_message_info', "El mensaje del título que se muestra en la parte superior del salpicadero (html permitido).");
define('logo_link', "Enlace del logo");
define('logo_link_info', "El hipervinculo del logo. <b style='font-size:10px; font-weight:normal;'>(Dejandolo en blanco apuntará al Dashboard)</b>");
define('custom_tab', "Botón de menú personalizado");
define('custom_tab_info', "Añade un boton personalizado al final del menú principal. <b style='font-size:10px; font-weight:normal;'>(Guarda y refresca la página para ajustar los botones de submenú)</b>");
define('custom_tab_name', "Nombre del botón personalizado");
define('custom_tab_name_info', "El nombre que muestra en el botón personalizado.");
define('custom_tab_link', "Enlace del botón");
define('custom_tab_link_info', "El hipervinculo asignado al botón.");
define('custom_tab_sub', "Submenú del botón personalizado");
define('custom_tab_sub_info', "Añade botones al submenú del botón personalizado.");
define('custom_tab_sub_name', "Nombre del botón #1");
define('custom_tab_sub_link', "Enlace del botón #1");
define('custom_tab_sub_name2', "Nombre del botón #2");
define('custom_tab_sub_link2', "Enlace del botón #2");
define('custom_tab_sub_name3', "Nombre del botón #3");
define('custom_tab_sub_link3', "Enlace del botón #3");
define('custom_tab_sub_name4', "Nombre del botón #4");
define('custom_tab_sub_link4', "Enlace del botón #4");
define('custom_tab_target_blank', "Comportamiento de los botones");
define('custom_tab_target_blank_info', "Ajusta el comportamiento de todos los botones personalizados. <b style='font-size:10px; font-weight:normal;'>('_self' = Abre el enlace en la misma pagina. '_blank'  =  Abre el enlace en una pestaña o ventana nueva.)</b>");
define('bg_wrapper', "Imagen de fondo");
define('bg_wrapper_info', "La imagen de fondo del panel. <b style='font-size:10px; font-weight:normal;'>(Solo funciona con algunos temas.)</b>");
?>
