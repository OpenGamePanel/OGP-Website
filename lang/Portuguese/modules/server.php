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
define('remote_host_port_info', "The port that is listened by the OGP Agent on remote host. Default: 12679.");
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
define('note_remote_host', "A remote host is a server where the OGP Agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Erro desconhecido - status_chk returned");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "Nome de usuário onde o agente está sendo executado. Exemplo: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current Agent.");
define('remote_host_ftp_port', "FTP Port");
define('remote_host_ftp_port_info', "The FTP server <b>port</b> for the current Agent.");
define('view_log', "Mostrar log");
define('status', "Estado");
define('stop_firewall', "Pare o firewall");
define('start_firewall', "Iniciar Firewall");
define('seconds', "Segundos");
define('reboot', "Reinicialização remota do servidor");
define('restart', "Restart Agent");
define('confirm_reboot', "Tem certeza de que deseja reiniciar remotamente todo o servidor físico chamado '%s'?");
define('confirm_restart', "Are you sure you want to restart the Agent named '%s'?");
define('restarting', "Restarting Agent... Please wait.");
define('restarted', "Agente reiniciado com sucesso.");
define('reboot_success', "O servidor chamado '%s' foi reiniciado com sucesso. Você não poderá acessar o servidor até que ele seja inicializado com sucesso.");
define('invalid_remote_host_id', "ID de host remoto inválido '%s' fornecido.");
define('remote_host_removed', "O host remoto chamado '%s' foi removido com sucesso.");
define('editing_remote_server', "Editando o servidor remoto chamado '%s'");
define('remote_server_settings_changed', "Mudou as configurações para o servidor remoto '%s' com sucesso.");
define('save_settings', "Salvar configurações");
define('set_ips', "Definir IPs");
define('remote_ip', "IP remoto");
define('remote_ips_for', "IPs remotos para servidor chamado '%s'");
define('ips_set_for_server', "Os IPs definidos para o servidor chamados '%s' com sucesso.");
define('could_not_remove_ip', "Não foi possível remover os antigos IP do banco de dados.");
define('could_add_ip', "Poderia adicionar IP do servidor remoto ao banco de dados.");
define('areyousure_removeagent', "Are you sure you want to remove the Agent called");
define('areyousure_removeagent2', "e todos os diretorios relacionadas a ela a partir do banco de dados do painel?");
define('error_while_remove', "Ocorreu um erro ao remover o servidor remoto.");
define('add_ip', "Adicionar IP");
define('remove_ip', "Remover IP");
define('edit_ip', "Edite o IP");
define('wrote_changes', "Alterações salvas com sucesso.");
define('there_are_servers_running_on_this_ip', "Existem servidores em execução neste endereço IP.");
define('enter_ip_host', "Você deve digitar IP para o host remoto.");
define('enter_valid_ip', "Você deve digitar a porta válida para o host remoto. O valor da porta pode estar entre 0 e 65535, no entanto a recomendação é entre 1024 e 65535.");
define('could_not_add_server', "Não foi possível adicionar servidor");
define('to_db', "para o banco de dados.");
define('added_server', "Servidor adicionado");
define('with_port', "com porta");
define('to_db_succesfully', "para o banco de dados com sucesso.");
define('unable_discover', "Não é possível descobrir os IPs automaticamente");
define('set_ip_manually', "Você terá que configurá-los manualmente.");
define('found_ips', "IPs encontrados");
define('for_remote_server', "Para o servidor remoto.");
define('failed_add_ip', "Falha ao adicionar IP");
define('timeout', "Tempo esgotado");
define('timeout_info', "The time limit in seconds to get response from this Agent.");
define('use_nat', "Usar NAT");
define('use_nat_info', "Activate se o servidor remoto está usando regras de NAT.");
define('arrange_ports', "Organizar portas");
define('assign_new_ports_range_for_ip', "Atribuir uma nova faixa de portas para IP %s");
define('assigned_port_ranges_for_ip', "Faixas de portas atribuídas para IP %s");
define('assigned_ports_for_ip', "Portas atribuídas para IP %s");
define('unspecified_game_types', "Tipos de jogos não especificados");
define('start_port', "Porta de início:");
define('end_port', "Porta final:");
define('port_increment', "Aumento da porta:");
define('total_assignable_ports', "Total de portas atribuíveis:");
define('available_range_ports', "Portas de alcance disponíveis:");
define('assign_range', "Atribuir alcance");
define('edit_range', "Editar distancia");
define('delete_range', "Apagar distancia");
define('home_id', "Home ID");
define('home_path', "Home path");
define('game_type', "Tipo de jogo");
define('port', "Porta");
define('invalid_values', "Valores inválidos.");
define('ports_in_range_already_arranged', "Portas na faixa já arranjados.");
define('ports_range_already_configured_for', "A gama de portas já está configurada para %s.");
define('ports_range_added_successfull_for', "O intervalo de portas foi adicionado com sucesso para %s.");
define('ports_range_deleted_successfull', "Escala de portas excluída com sucesso.");
define('ports_range_edited_successfull_for', "O intervalo de portas foi editado com sucesso para %s.");
define('editing_firewall_for_remote_server', "Editando o Firewall para o servidor remoto chamado '%s'");
define('default_allowed', "Permitido por padrão");
define('allow_port_command', "Permitir comando de porta");
define('deny_port_command', "Regeitar o comando da porta");
define('allow_ip_port_command', "Permitir IP: comando de porta");
define('deny_ip_port_command', "Negar IP: comando de porta");
define('enable_firewall_command', "Habilitar o comando de firewall");
define('disable_firewall_command', "Desativar o comando do firewall");
define('get_firewall_status_command', "Obter o comando de status do firewall");
define('reset_firewall_command', "Redefinir o comando de firewall");
define('firewall_status', "Estado da Firewall");
define('save_firewall_settings', "Salvar configurações de firewall");
define('reset_firewall', "Redefinir Firewall");
define('firewall_settings', "Configurações do Firewall");
define('display_public_ip', "Exibir IP público");
?>