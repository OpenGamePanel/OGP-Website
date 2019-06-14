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

define('OGP_LANG_add_new_remote_host', "Añadir nuevo servidor remoto");
define('OGP_LANG_configured_remote_hosts', "Servidores remotos configurados");
define('OGP_LANG_remote_host', "Servidor remoto");
define('OGP_LANG_remote_host_info', "Se debe poder hacer ping al servidor remoto!");
define('OGP_LANG_remote_host_port', "Puerto del servidor remoto");
define('OGP_LANG_remote_host_port_info', "El puerto que es escuchado por el Agente de OGP en el host remoto. Defecto: 12679.");
define('OGP_LANG_remote_host_name', "Nombre del servidor remoto");
define('OGP_LANG_ogp_user', "Nombre de usuario de OGP Agent");
define('OGP_LANG_remote_host_name_info', "Solo sirve para que lo identifiquen los usuarios.");
define('OGP_LANG_add_remote_host', "Asignar servidor remoto");
define('OGP_LANG_remote_encryption_key', "Clave de cifrado del servidor remoto");
define('OGP_LANG_remote_encryption_key_info', "La clave de cifrado remota se utiliza para cifrar los datos entre las páginas web y el agente. Esta clave debe ser igual en ambos.");
define('OGP_LANG_server_name', "Nombre del servidor");
define('OGP_LANG_agent_ip_port', "IP:Puerto");
define('OGP_LANG_agent_status', "Estado del servidor");
define('OGP_LANG_ips', "IPs");
define('OGP_LANG_add_more_ips', "Si desea introducir mas IPs, cuando todos los campos esten llenos un campo vacio aparecera.");
define('OGP_LANG_encryption_key_mismatch', "La llave de encriptación no coincide con la del Agente. Por favor, revisa la configuración de tu agente.");
define('OGP_LANG_no_ip_for_remote_host', "Es necesario añadir al menos una (1)<br>dirección IP para cada servidor remoto.");
define('OGP_LANG_note_remote_host', "Un host remoto es un servidor donde se está ejecutando el agente OGP. Cada host puede tener varias direcciones IP en las que los usuarios pueden enlazar servidores.");
define('OGP_LANG_ip_administration', "Servidores - Administración de IPs");
define('OGP_LANG_unknown_error', "Error desconocido.");
define('OGP_LANG_remote_host_user_name', "Usuario UNIX");
define('OGP_LANG_remote_host_user_name_info', "Usuario de linux donde instalaste el agente.");
define('OGP_LANG_remote_host_ftp_ip', "IP FTP");
define('OGP_LANG_remote_host_ftp_ip_info', "El servidor FTP <b>IP</b> para el Agente actual.");
define('OGP_LANG_remote_host_ftp_port', "Puerta FTP");
define('OGP_LANG_remote_host_ftp_port_info', "El servidor FTP  <b>puerta</b> es el Agente actual.");
define('OGP_LANG_view_log', "Ver log");
define('OGP_LANG_status', "Estado");
define('OGP_LANG_stop_firewall', "Parar Cortafuegos");
define('OGP_LANG_start_firewall', "Iniciar Cortafuegos");
define('OGP_LANG_seconds', "Segundos");
define('OGP_LANG_reboot', "Reiniciar el sistema");
define('OGP_LANG_restart', "Reiniciar el agente");
define('OGP_LANG_confirm_reboot', "Esta seguro de que desea reiniciar el servidor físico llamado '%s'?");
define('OGP_LANG_confirm_restart', "Está seguro de que desea reiniciar el agente denominado '%s'?");
define('OGP_LANG_restarting', "Agente de reinicio ... Espere.");
define('OGP_LANG_restarted', "Agente reiniciado correctamente.");
define('OGP_LANG_reboot_success', "El servidor llamado '%s' fue reiniciado correctamente. No podrás acceder a él hasta que inicie correctamente.");
define('OGP_LANG_invalid_remote_host_id', "La ID de servidor remoto '%s' no es valida.");
define('OGP_LANG_remote_host_removed', "El servidor remoto llamado '%s' se elimino correctamente.");
define('OGP_LANG_editing_remote_server', "Editando el servidor remoto '%s'");
define('OGP_LANG_remote_server_settings_changed', "Configuracion cambiada para el servidor remoto '%s' correctamente.");
define('OGP_LANG_save_settings', "Guardar cambios");
define('OGP_LANG_set_ips', "Asignar IPs");
define('OGP_LANG_remote_ip', "IP remota");
define('OGP_LANG_remote_ips_for', "IPs for Game Servers To Use on Agent Server '%s'");
define('OGP_LANG_ips_set_for_server', "IPs asignadas al servidor remoto '%s' correctamente.");
define('OGP_LANG_could_not_remove_ip', "No se pudo eliminar la IP.");
define('OGP_LANG_could_add_ip', "Imposible añadir la IP.");
define('OGP_LANG_areyousure_removeagent', "¿Seguro que desea eliminar el Agente llamado");
define('OGP_LANG_areyousure_removeagent2', "de la base de datos?");
define('OGP_LANG_error_while_remove', "Error al intentar eliminar.");
define('OGP_LANG_add_ip', "Añadir IP");
define('OGP_LANG_remove_ip', "Eliminar IP");
define('OGP_LANG_edit_ip', "Editar IP");
define('OGP_LANG_wrote_changes', "Cambios guardados correctamente.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Hay servidores ejecutandose en esta dirección IP.");
define('OGP_LANG_enter_ip_host', "Introduzca la IP del host.");
define('OGP_LANG_enter_valid_ip', "Introduzca una IP valida.");
define('OGP_LANG_could_not_add_server', "No se pudo agregar el servidor con direccion IP");
define('OGP_LANG_to_db', "a la base de datos.");
define('OGP_LANG_added_server', "Se ha agregado el servidor con IP");
define('OGP_LANG_with_port', "y puerto");
define('OGP_LANG_to_db_succesfully', "a la base de datos sadisfactoriamente.");
define('OGP_LANG_unable_discover', "No se ha podido detectar la IP del servidor en la direccion");
define('OGP_LANG_set_ip_manually', "Por favor, agregue la direccion o direcciones IP manualmente.");
define('OGP_LANG_found_ips', "Se han detectado las IP");
define('OGP_LANG_for_remote_server', "para el servidor remoto.");
define('OGP_LANG_failed_add_ip', "Error al añadir la IP.");
define('OGP_LANG_timeout', "Tiempo de espera maximo");
define('OGP_LANG_timeout_info', "El límite de tiempo en segundos para obtener respuesta de este agente.");
define('OGP_LANG_use_nat', "Usar NAT");
define('OGP_LANG_use_nat_info', "Habilite si su servidor remoto está usando reglas de NAT. Use esta configuración si sus servidores de juegos se ejecutan en direcciones IP de LAN privadas internas para que el panel use su dirección IP remota real para consultar los servidores de juegos.");
define('OGP_LANG_arrange_ports', "Organizar puertos");
define('OGP_LANG_assign_new_ports_range_for_ip', "Asignar nuevo intervalo de puertos para la IP %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Intervalos de puertos asignados para la IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Puertos asignados para la IP %s");
define('OGP_LANG_unspecified_game_types', "Tipos de juego sín especificar");
define('OGP_LANG_start_port', "Puerto inicial:");
define('OGP_LANG_end_port', "Puerto final:");
define('OGP_LANG_port_increment', "Incremento de puertos:");
define('OGP_LANG_total_assignable_ports', "Total de puertos asignables:");
define('OGP_LANG_available_range_ports', "Puertos del intervalo disponibles:");
define('OGP_LANG_assign_range', "Asignar intervalo");
define('OGP_LANG_edit_range', "Editar intervalo");
define('OGP_LANG_delete_range', "Eliminar intervalo");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Carpeta Home");
define('OGP_LANG_game_type', "Tipo de juego");
define('OGP_LANG_port', "Puerto");
define('OGP_LANG_invalid_values', "Valores no validos.");
define('OGP_LANG_ports_in_range_already_arranged', "Puertos en el intervalo ya asignados.");
define('OGP_LANG_ports_range_already_configured_for', "El intervalo de puertos para %s ya está configurado.");
define('OGP_LANG_ports_range_added_successfull_for', "Rango de puertos añadidos correctamente a %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Rango de puertos eliminados correctamente.");
define('OGP_LANG_ports_range_edited_successfull_for', "Rango de puertos editados correctamente a %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editando el cortafuegos para el servidor remoto llamado \"%s\"");
define('OGP_LANG_default_allowed', "Se permite por defecto");
define('OGP_LANG_allow_port_command', "Permitir el comando de puerto");
define('OGP_LANG_deny_port_command', "Denegar el comando de puerto");
define('OGP_LANG_allow_ip_port_command', "Permitir IP: comando de puerto");
define('OGP_LANG_deny_ip_port_command', "Denegar IP: comando de puerto");
define('OGP_LANG_enable_firewall_command', "Habilitar el comando de cortafuegos");
define('OGP_LANG_disable_firewall_command', "Deshabilitar el comando de cortafuegos");
define('OGP_LANG_get_firewall_status_command', "Obtener el estado de comando de el cortafuegos");
define('OGP_LANG_reset_firewall_command', "Restablecer comandos del cortafuegos");
define('OGP_LANG_firewall_status', "Estado del cortafuegos");
define('OGP_LANG_save_firewall_settings', "Guardar configuración del cortafuegos");
define('OGP_LANG_reset_firewall', "Restablecer cortafuegos");
define('OGP_LANG_firewall_settings', "Configuración del cortafuegos");
define('OGP_LANG_display_public_ip', "Mostrar IP Público");
define('OGP_LANG_ips_can_be_internal_external', "Introduzca las direcciones IP utilizables.&nbsp; Se pueden usar direcciones IP públicas y direcciones IP de LAN internas (para configuraciones NAT).");
?>
