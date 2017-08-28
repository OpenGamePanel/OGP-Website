<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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

define('add_new_remote_host', "Adicionar novo host remoto");
define('configured_remote_hosts', "Host remoto configurado");
define('remote_host', "Host remoto");
define('remote_host_info', "O host remoto deve ser um nome de host pingable!");
define('remote_host_port', "Porta de host remoto");
define('remote_host_port_info', "A porta que é ouvida pelo agente do painel no host remoto. Padrão: 12679.");
define('remote_host_name', "Nome do host remoto");
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "O nome do host remoto é usado para ajudar os usuários a identificar seus servidores.");
define('add_remote_host', "Adicionar host remoto");
define('remote_encryption_key', "Chave de criptografia remota");
define('remote_encryption_key_info', "A chave de criptografia remota é usada para criptografar os dados entre o Painel e o Agente. Essa chave deve ser igual em ambos os lados.");
define('server_name', "Nome do servidor");
define('agent_ip_port', "Agent IP:Porta");
define('agent_status', "Agent Status");
define('ips', "IPs");
define('add_more_ips', "Se você deseja inserir mais IPs, pressione 'Set IPs' quando todos os campos estiverem cheios um novo campo vazio aparecerá.");
define('encryption_key_mismatch', "A chave de criptografia não coincide com o agente. Verifique novamente a configuração do seu agente");
define('no_ip_for_remote_host', "Você precisa adicionar pelo menos um (1) endereço IP para cada host remoto.");
define('note_remote_host', "Um host remoto é um servidor onde o agente do painel stá sendo executado. Cada host pode ter um número múltiplo de endereços IP nos quais os usuários podem ligar servidores.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Erro desconhecido - status_chk returned");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "Nome de usuário onde o agente está sendo executado. Exemplo: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "O servidor FTP <b>IP</ b> para o agente atual.");
define('remote_host_ftp_port', "Porta FTP");
define('remote_host_ftp_port_info', "O servidor FTP <b>porta</ ​​b> para o agente atual.");
define('view_log', "Mostrar log");
define('status', "Estado");
define('stop_firewall', "Pare o firewall");
define('start_firewall', "Iniciar Firewall");
define('seconds', "Segundos");
define('reboot', "Reinicialização remota do servidor");
define('restart', "Restart Agent");
define('confirm_reboot', "Tem certeza de que deseja reiniciar remotamente todo o servidor físico chamado '%s'?");
define('confirm_restart', "Tem certeza de que deseja reiniciar o agente chamado '%s'?");
define('restarting', "A reiniciar o agente... Por favor aguarde.");
define('restarted', "Agente reiniciado com sucesso.");
define('reboot_success', "O servidor chamado '%s' foi reiniciado com sucesso. Você não poderá acessar o servidor até que ele seja inicializado com sucesso.");
define('invalid_remote_host_id', "ID de host remoto inválido '%s' fornecido.");
define('remote_host_removed', "Remote host called '%s' removed successfully.");
define('editing_remote_server', "Editing remote server called '%s'");
define('remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('save_settings', "Save Settings");
define('set_ips', "Set IPs");
define('remote_ip', "Remote IP");
define('remote_ips_for', "Remote IPs for server called '%s'");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('could_not_remove_ip', "Could not remove old IP's from database.");
define('could_add_ip', "Could add remote server IP to database.");
define('areyousure_removeagent', "Are you sure you want to remove the agent called");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Error occurred while removing remote server.");
define('add_ip', "Add IP");
define('remove_ip', "Remove IP");
define('edit_ip', "Edit IP");
define('wrote_changes', "Changes saved successfully.");
define('there_are_servers_running_on_this_ip', "There are servers running on this IP address.");
define('enter_ip_host', "You must enter IP for the remote host.");
define('enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('could_not_add_server', "Could not add server");
define('to_db', "to the database.");
define('added_server', "Added server");
define('with_port', "with port");
define('to_db_succesfully', "to the database successfully.");
define('unable_discover', "Unable to auto discover IPs on");
define('set_ip_manually', "You'll have to set them manually.");
define('found_ips', "Found IPs");
define('for_remote_server', "for the remote server.");
define('failed_add_ip', "Failed to add IP");
define('timeout', "Time Out");
define('timeout_info', "Limitar em segundos em que o agente responde.");
define('use_nat', "Usar NAT");
define('use_nat_info', "Activate se o servidor remoto está usando regras de NAT.");
define('arrange_ports', "Arrange ports");
define('assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('assigned_ports_for_ip', "Assigned ports for IP %s");
define('unspecified_game_types', "Unspecified game types");
define('start_port', "Start port:");
define('end_port', "End port:");
define('port_increment', "Port increment:");
define('total_assignable_ports', "Total assignable ports:");
define('available_range_ports', "Available range ports:");
define('assign_range', "Assign range");
define('edit_range', "Edit range");
define('delete_range', "Delete range");
define('home_id', "Home ID");
define('home_path', "Home path");
define('game_type', "Game type");
define('port', "Port");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfully.");
define('ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('default_allowed', "Allowed by default");
define('allow_port_command', "Allow port command");
define('deny_port_command', "Deny port command");
define('allow_ip_port_command', "Allow IP:port command");
define('deny_ip_port_command', "Deny IP:port command");
define('enable_firewall_command', "Enable firewall command");
define('disable_firewall_command', "Disable firewall command");
define('get_firewall_status_command', "Get firewall status command");
define('reset_firewall_command', "Reset firewall command");
define('firewall_status', "Firewall status");
define('save_firewall_settings', "Save firewall settings");
define('reset_firewall', "Reset Firewall");
define('firewall_settings', "Firewall Settings");
define('display_public_ip', "Display Public IP");
?>