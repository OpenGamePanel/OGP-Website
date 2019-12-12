<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
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

define('OGP_LANG_maintenance_mode', "Modo de mantenimiento");
define('OGP_LANG_maintenance_mode_info', "Deshabilita el Panel para usuarios normales. Solo los administradores pueden acceder a él durante el mantenimiento.");
define('OGP_LANG_maintenance_title', "Titulo de mantenimiento");
define('OGP_LANG_maintenance_title_info', "Título que se muestra cuando la página esta en modo de mantenimiento.");
define('OGP_LANG_maintenance_message', "Mensaje de mantenimineto");
define('OGP_LANG_maintenance_message_info', "Este es el mensaje que se mostrara cuando la pagina este deshabilitada por mantenimiento.");
define('OGP_LANG_update_settings', "Actualizar configuración");
define('OGP_LANG_settings_updated', "Configuración actualizada.");
define('OGP_LANG_panel_language', "Lenguaje del panel");
define('OGP_LANG_panel_language_info', "El lenguaje que seleccione aquí será el lenguaje por defecto para todos los usuarios. Cada usuario podrá seleccionar un lenguaje posteriormente.");
define('OGP_LANG_page_auto_refresh', "Refresco de páginas automático");
define('OGP_LANG_page_auto_refresh_info', "el refresco de paginas automatico se utiliza principalmente en la depuración del panel. En el uso normal debe ser activado.");
define('OGP_LANG_smtp_server', "Servidor de correo saliente SMTP");
define('OGP_LANG_smtp_server_info', "Este es el servidor de correo saliente (servidor SMTP) que se utiliza, por ejemplo, para enviar las contraseñas olvidadas a los usuarios, por defecto 'localhost'.");
define('OGP_LANG_panel_email_address', "Email del administrador");
define('OGP_LANG_panel_email_address_info', "Esta es la direccion de email para el remitente en las comunicaciones de OGP.");
define('OGP_LANG_panel_name', "Nombre del panel");
define('OGP_LANG_panel_name_info', "Nombre del Panel que se muestra en el título de la página. Este valor invalidará todos los títulos de las páginas, si no está vacío.");
define('OGP_LANG_feed_enable', "Activar Feed LGSL");
define('OGP_LANG_feed_enable_info', "Si su webhost tiene un firewall que está bloqueando el puerto de consulta, entonces usted necesita para abrir el puerto manualmente.");
define('OGP_LANG_feed_url', "URL del Feed");
define('OGP_LANG_feed_url_info', "GrayCube.com comparte un feed LGSL en la URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Usuario de Steam");
define('OGP_LANG_steam_user_info', "Esta cuenta se necesita para descargar algunos juegos nuevos desde Steam como CS:GO.");
define('OGP_LANG_steam_pass', "Contraseña de Steam");
define('OGP_LANG_steam_pass_info', "Ponga aquí la contraseña de la cuenta de Steam.");
define('OGP_LANG_steam_guard', "Codigo de Steam Guard");
define('OGP_LANG_steam_guard_info', "Algunos usuarios tienen activado Steam Guard para proteger sus cuentas contra hackers,<br>este código es enviado a sú correo electrónico cuando se inicia la primera actualización.");
define('OGP_LANG_smtp_port', "Puerto SMTP");
define('OGP_LANG_smtp_port_info', "Sí el puerto SMTP no es el puerto por defecto (25) introduzca aqui el puerto SMTP.");
define('OGP_LANG_smtp_login', "Usuario SMTP");
define('OGP_LANG_smtp_login_info', "Sí su servidor SMTP requiere autenticación, introduzca aqui su nombre de usuario.");
define('OGP_LANG_smtp_passw', "Contraseña SMTP");
define('OGP_LANG_smtp_passw_info', "Sí no establece una contraseña no se usara la autenticación SMTP");
define('OGP_LANG_smtp_secure', "SMTP Seguro");
define('OGP_LANG_smtp_secure_info', "Usa SSL/TLS para conectarse al servidor SMTP");
define('OGP_LANG_time_zone', "Zona Horaria");
define('OGP_LANG_time_zone_info', "Establce la zona horaria predetermiada usada por todas las funciones de fecha/hora.");
define('OGP_LANG_query_cache_life', "Vida de la caché de peticiones");
define('OGP_LANG_query_cache_life_info', "Ajusta el retraso en segundos antes de que el estado del servidor sea refrescado.");
define('OGP_LANG_query_num_servers_stop', "Desactivar peticiones a los servidores si son mas de");
define('OGP_LANG_query_num_servers_stop_info', "Use esta configuración para desactivar las peticiones si un usuario tiene mas servidores de juegos que la cantidad especificada, de este modo se agiliza la carga del panel.");
define('OGP_LANG_editable_email', "Dirección de E-Mail editable");
define('OGP_LANG_editable_email_info', "Seleccione si los usuarios pueden editar su dirección de e-mail o no.");
define('OGP_LANG_old_dashboard_behavior', "Comportamiento anterior del Dashboard");
define('OGP_LANG_old_dashboard_behavior_info', "El Dashboard antiguo tarda mas en cargar, pero muestra mas información de los servidores (mapa y jugadores en linea).");
define('OGP_LANG_rsync_available', "Servidores de Rsync disponibles");
define('OGP_LANG_rsync_available_info', "Selecciona que lista de servidores será mostrada en la instalación Rsync.");
define('OGP_LANG_all_available_servers', "Todos los servidores disponibles ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Solo servidores remotos ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Solo servidores locales ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Codigo de cabeceras");
define('OGP_LANG_header_code_info', "Aquí puede añadir código de cabecera (como código HTML, código de inserción, etc.) sin editar la disposición del tema.");
define('OGP_LANG_support_widget_title', "Título widget soporte");
define('OGP_LANG_support_widget_title_info', "Un título personalizado para el widget de soporte del dashboard.");
define('OGP_LANG_support_widget_content', "Contenido widget soporte");
define('OGP_LANG_support_widget_content_info', "Contenido del widget de soporte (HTML permitido).");
define('OGP_LANG_support_widget_link', "Enlace widget soporte");
define('OGP_LANG_support_widget_link_info', "La URL de su web de soporte.");
define('OGP_LANG_recaptcha_site_key', "Clave Recaptcha (site key)");
define('OGP_LANG_recaptcha_site_key_info', "La clave que recibiste de Google.");
define('OGP_LANG_recaptcha_secret_key', "Clave secreta Recaptcha");
define('OGP_LANG_recaptcha_secret_key_info', "La clave secreta que te proporcionó Google.");
define('OGP_LANG_recaptcha_use_login', "Usar Recaptcha en el inicio de sesión");
define('OGP_LANG_recaptcha_use_login_info', "Si se activa, los usuarios deberán resolver una pregunta a parte de su inicio de sesión habitual. Esto intenta evitar intentos de inicio de sesión automatizados por parte de un programa.");
define('OGP_LANG_login_attempts_before_banned', "Número de intentos de logueo fallido antes de banear al usuario");
define('OGP_LANG_login_attempts_before_banned_info', "Si un usuario intenta loguearse con credenciales inválidas más de estas veces, el usuario será baneado temporalmente por el panel.");
define('OGP_LANG_custom_github_update_username', "Nombre de usuario de GitHub update");
define('OGP_LANG_custom_github_update_username_info', "Ingrese su nombre de usuario GitHub SOLAMENTE para usar sus propios repositorios bifurcados para actualizar OGP. Esto sólo debe ser cambiado por los desarrolladores que deseen utilizar sus propios repos para el desarrollo en lugar de comprobar el código posiblemente buggy en la rama principal.");
define('OGP_LANG_remote_query', "Peticiones remotas");
define('OGP_LANG_remote_query_info', "Usar el servidor remoto (Agente) para hacer peticiones a los servidores de juegos (Solo GameQ y LGSL).");
define('OGP_LANG_check_expiry_by', "Comprobar caducidad por");
define('OGP_LANG_check_expiry_by_info', "Al elegir <i>\"Una vez dentificado\"</i> los servidores ( o asignaciones de servidores ),<br>seran eliminados ( o quitados al usuario/grupo ) una vez que el usuario al que pertenecen <br>( o estan asignados ) se identifica.<br>Sin embargo, si elige la opción <i>\"Trabajo de Cron\"</i> usted debera tener configurado un trabajo de cron<br>para ejecutar cada cierto tiempo el script que comprueba la fecha de caducidad y,<br>de este modo, llevar a cabo estas tareas lo mas pronto posible.");
define('OGP_LANG_once_logged_in', "Una vez dentificado");
define('OGP_LANG_cron_job', "Trabajo de Cron");
define('OGP_LANG_theme_settings', "Ajustes de tema");
define('OGP_LANG_theme', "Tema");
define('OGP_LANG_theme_info', "El tema que seleccione aqui sera el tema por defecto para todos los usuarios. Cada usuario podra seleccionar un tema posteriormente.");
define('OGP_LANG_welcome_title', "Título de bienvenida");
define('OGP_LANG_welcome_title_info', "Habilita el mensaje que se muestra en la cabecera del Dashboard");
define('OGP_LANG_welcome_title_message', "Mensaje de bienvenida del título");
define('OGP_LANG_welcome_title_message_info', "Título del mensaje que se muestra en la cabecera del Dashboard (HTML permitido)");
define('OGP_LANG_logo_link', "Enlace del logo");
define('OGP_LANG_logo_link_info', "El hipervinculo del logo. <b style='font-size:10px; font-weight:normal;'>(Dejandolo en blanco apuntará al Dashboard)</b>");
define('OGP_LANG_custom_tab', "Botón de menú personalizado");
define('OGP_LANG_custom_tab_info', "Añade un boton personalizado al final del menú principal. <b style='font-size:10px; font-weight:normal;'>(Guarda y refresca la página para ajustar los botones de submenú)</b>");
define('OGP_LANG_custom_tab_name', "Nombre del botón personalizado");
define('OGP_LANG_custom_tab_name_info', "El nombre que muestra en el botón personalizado.");
define('OGP_LANG_custom_tab_link', "Enlace del botón");
define('OGP_LANG_custom_tab_link_info', "El hipervinculo asignado al botón.");
define('OGP_LANG_custom_tab_sub', "Submenú del botón personalizado");
define('OGP_LANG_custom_tab_sub_info', "Añade botones al submenú del botón personalizado.");
define('OGP_LANG_custom_tab_sub_name', "Nombre del botón #1");
define('OGP_LANG_custom_tab_sub_link', "Enlace del botón #1");
define('OGP_LANG_custom_tab_sub_name2', "Nombre del botón #2");
define('OGP_LANG_custom_tab_sub_link2', "Enlace del botón #2");
define('OGP_LANG_custom_tab_sub_name3', "Nombre del botón #3");
define('OGP_LANG_custom_tab_sub_link3', "Enlace del botón #3");
define('OGP_LANG_custom_tab_sub_name4', "Nombre del botón #4");
define('OGP_LANG_custom_tab_sub_link4', "Enlace del botón #4");
define('OGP_LANG_custom_tab_target_blank', "Comportamiento de los botones");
define('OGP_LANG_custom_tab_target_blank_info', "Establece todas las pestañas de destino. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Abre el enlace en la misma página. New_Page  =  Abre el enlace en la pestaña nueva.)</b>");
define('OGP_LANG_bg_wrapper', "Imagen de fondo");
define('OGP_LANG_bg_wrapper_info', "La imagen de fondo del panel. <b style='font-size:10px; font-weight:normal;'>(Solo funciona con algunos temas.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Mostrar ID de servidor en la página de Monitor de juegos");
define('OGP_LANG_show_server_id_game_monitor_info', "Muestra la columna ID del servidor de juegos en el Monitor de juegos para buscar los archivos creados por el Agente en el servidor de juego real.");
define('OGP_LANG_default_game_server_home_path_prefix', "Prefijo por defecto de los directorios iniciales de los servidores de juegos");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Introduzca un prefijo para la ruta en la que usted quiere que se almacenen las carpetas iniciales de los servidores creados por defecto. Puede usar \"{USERNAME}\" en la ruta, lo cual sera reemplazado por el nombre del usuario al que pertenece el serviodor. También pude usar \"{GAMEKEY}\" en la ruta, el cual sera reemplazado con la abreviatura en minúscula del nombre del juego. Puede usar \"{SKIPID}\" en cualquier parte de la ruta para impedir que se use el identificador del servidor en la ruta. 

Ejemplo: 
/ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} 
se convertiría en 
/ogp/games/username/arkse/. 

Ejemplo 2: 
/ogp/games 
se convertiría en 
/ogp/games/1 
donde 1 es el identificador del servidor.");
define('OGP_LANG_use_authorized_hosts', "Limitar API a hosts autorizados definidos");
define('OGP_LANG_use_authorized_hosts_info', "Habilite esta configuración para permitir solo llamadas a la API desde direcciones IP predefinidas y aprobadas.&nbsp; Las direcciones aprobadas se pueden establecer en esta página una vez que se haya habilitado la configuración.&nbsp; Si esta configuración está deshabilitada, un usuario que use una clave válida tendrá acceso a la API desde cualquier dirección IP.&nbsp; Los usuarios que utilicen una clave válida podrán usar la API para administrar cualquier servidor de juegos que tengan permisos para administrar.");
define('OGP_LANG_setup_api_authorized_hosts', "Configurar servidores autorizados de API");
define('OGP_LANG_autohorized_hosts', "Servidores autorizados");
define('OGP_LANG_add', "Añadir");
define('OGP_LANG_remove', "Eliminar");
define('OGP_LANG_default_trusted_hosts', "Servidores de confianza por defecto");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Servidores o Proxies de confianza (Direcciones IPv4/IPv6 o CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Direcciones IP reenviadas de confianza (Direcciones IPv4/IPv6 o CIDR)");
define('OGP_LANG_reset_game_server_order', "Reset Game Server Ordering");
define('OGP_LANG_reset_game_server_order_info', "Resets game server ordering back to the default of using the server ID");


?>
