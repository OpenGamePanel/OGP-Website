<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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

// settings.php

$lang['settings'] = "Opciones";
$lang['maintenance_mode'] = "Modo de mantenimiento";
$lang['maintenance_mode_info'] = "El mensaje que se mostrara cuando la pagina este deshabilitada por mantenimiento.";
$lang['maintenance_title'] = "Maintenance Title";
$lang['maintenance_title_info'] = "The title that is displayed to normal users during maintenance.";
$lang['maintenance_message'] = "Mensaje de mantenimineto";
$lang['maintenance_message_info'] = "Este es el mensaje que se mostrara cuando la pagina este deshabilitada por mantenimiento.";
$lang['update_settings'] = "Aplicar";
$lang['settings_updated'] = "Opciones aplicadas correctamente.";
$lang['panel_language'] = "Lenguaje del panel";
$lang['panel_language_info'] = "El lenguaje que seleccione aqui sera el lenguaje por defecto para todos los usuarios. Cada usuario podra seleccionar un lenguaje posteriormente.";
$lang['page_auto_refresh'] = "Refresco de paginas automatico";
$lang['page_auto_refresh_info'] = "el refresco de paginas automatico se utiliza principalmente en la depuración del panel. En el uso normal debe ser activado.";
$lang['smtp_server'] = "Servidor de correo saliente SMTP";
$lang['smtp_server_info'] = "Este es el servidor de correo saliente (servidor SMTP) que se utiliza, por ejemplo, para enviar las contraseñas olvidadas a los usuarios, por defecto 'localhost'.";
$lang['panel_email_address'] = "Email del administrador";
$lang['panel_email_address_info'] = "Esta es la direccion de email para el remitente en las comunicaciones de OGP.";
$lang['panel_name'] = "Nombre del panel";
$lang['panel_name_info'] = "Nombre que se muestra en el titulo de la pagina del panel.";
$lang['feed_enable'] = "Activar Feed LGSL";
$lang['feed_enable_info'] = "Sí tu alojamiento web tiene el cortafuegos bloqueando el puerto Query deberas activarlo.";
$lang['feed_url'] = "URL del Feed";
$lang['feed_url_info'] = "GrayCube.com comparte un feed LGSL en la URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>";
$lang['charset'] = "Codificación de caracteres";
$lang['charset_info'] = "UTF8, ISO, ASCII, etc... Dejalo en blanco para usar la codificacion de caracteres ISO (por defecto).";
$lang['steam_user'] = "Usuario de Steam";
$lang['steam_user_info'] = "Esta cuenta se necesita para descargar algunos juegos nuevos desde Steam como CS:GO.";
$lang['steam_pass'] = "Contraseña de Steam";
$lang['steam_pass_info'] = "Ponga aquí la contraseña de la cuenta de Steam.";
$lang['steam_guard'] = "Codigo de Steam Guard";
$lang['steam_guard_info'] = "Algunos usuarios tienen activado Steam Guard para proteger sus cuentas contra hackers,<br>este código es enviado a sú correo electrónico cuando se inicia la primera actualización.";
$lang['smtp_port'] = "Puerto SMTP";
$lang['smtp_port_info'] = "Sí el puerto SMTP no es el puerto por defecto (25) introduzca aqui el puerto SMTP.";
$lang['smtp_login'] = "Usuario SMTP";
$lang['smtp_login_info'] = "Sí su servidor SMTP requiere autenticación, introduzca aqui su nombre de usuario.";
$lang['smtp_passw'] = "Contraseña SMTP";
$lang['smtp_passw_info'] = "Sí no establece una contraseña no se usara la autenticación SMTP";
$lang['smtp_ssl'] = "SMTP SSL";
$lang['smtp_ssl_info'] = "Usa SSL para conectarse al servidor SMTP";
$lang['time_zone'] = "Zona Horaria";
$lang['time_zone_info'] = "Establce la zona horaria predetermiada usada por todas las funciones de fecha/hora.";
$lang['query_cache_life'] = "Vida de la caché de peticiones";
$lang['query_cache_life_info'] = "Ajusta el retraso en segundos antes de que el estado del servidor sea refrescado.";
$lang['query_num_servers_stop'] = "Desactivar peticiones a los servidores si son mas de";
$lang['query_num_servers_stop_info'] = "Use esta configuración para desactivar las peticiones si un usuario tiene mas servidores de juegos que la cantidad especificada, de este modo se agiliza la carga del panel.";
$lang['editable_email'] = "Dirección de E-Mail editable";
$lang['editable_email_info'] = "Seleccione si los usuarios pueden editar su dirección de e-mail o no.";
$lang['old_dashboard_behavior'] = "Comportamiento anterior del Dashboard";
$lang['old_dashboard_behavior_info'] = "El Dashboard anterior funcionaba mas lentamente pero muestra mas información del servidor, mapa y jugadores actuales.";
$lang['rsync_available'] = "Servidores Rsync Disponibles";
$lang['rsync_available_info'] = "Selecciona que lista de servidores será mostrada en la instalación Rsync.";
$lang['all_available_servers'] = "Todos los servidores disponibles ( rsync_sites.list + rsync_sites_local.list )";
$lang['only_remote_servers'] = "Solo servidores remotos ( rsync_sites.list )";
$lang['only_local_servers'] = "Solo servidores locales ( rsync_sites_local.list )";
$lang['header_code'] = "Codigo de cabeceras";
$lang['header_code_info'] = "Aquí puede añadir código de cabecera (como código HTML, código de inserción, etc.) sin editar la disposición del tema.";
$lang[''] = "";

// Theme settings
$lang['theme_settings'] = "Ajustes de tema";
$lang['themes'] = "Ajustes de tema";
$lang['theme'] = "Tema";
$lang['theme_info'] = "El tema que seleccione aqui sera el tema por defecto para todos los usuarios. Cada usuario podra seleccionar un tema posteriormente.";
$lang['welcome_title'] = "Bienvenido Título";
$lang['welcome_title_info'] = "Permite que el título que aparece en la parte superior del salpicadero.";
$lang['welcome_title_message'] = "Mensaje de bienvenida del título";
$lang['welcome_title_message_info'] = "El mensaje del título que se muestra en la parte superior del salpicadero (html permitido).";
$lang['logo_link'] = "Logos Link";
$lang['logo_link_info'] = "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>";
$lang['custom_tab'] = "Custom Tab";
$lang['custom_tab_info'] = "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>";
$lang['custom_tab_name'] = "Custom Tab Name";
$lang['custom_tab_name_info'] = "The tabs display name.";
$lang['custom_tab_link'] = "Custom Tab Link";
$lang['custom_tab_link_info'] = "The tabs hyperlink.";
$lang['custom_tab_sub'] = "Custom Sub-Tabs";
$lang['custom_tab_sub_info'] = "Adds customisable sub-tabs when hovering over the 'Custom Tab'.";
$lang['custom_tab_sub_name'] = "Sub-Tab #1 Name";
$lang['custom_tab_sub_link'] = "Sub-Tab #1 Link";
$lang['custom_tab_sub_name2'] = "Sub-Tab #2 Name";
$lang['custom_tab_sub_link2'] = "Sub-Tab #2 Link";
$lang['custom_tab_sub_name3'] = "Sub-Tab #3 Name";
$lang['custom_tab_sub_link3'] = "Sub-Tab #3 Link";
$lang['custom_tab_sub_name4'] = "Sub-Tab #4 Name";
$lang['custom_tab_sub_link4'] = "Sub-Tab #4 Link";
$lang['custom_tab_target_blank'] = "Custom Tabs Target";
$lang['custom_tab_target_blank_info'] = "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>('_self' = Opens link on same page. '_blank'  =  Opens link on new tab.)</b>";
$lang['bg_wrapper'] = "Wrapper Background";
$lang['bg_wrapper_info'] = "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on Revolution themes.)</b>";

?>
