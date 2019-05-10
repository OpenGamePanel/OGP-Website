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

define('OGP_LANG_add_new_remote_host', "Adicionar novo host remoto");
define('OGP_LANG_configured_remote_hosts', "Host remoto configurado");
define('OGP_LANG_remote_host', "Host remoto");
define('OGP_LANG_remote_host_info', "O host remoto deve ser um nome de host pingable!");
define('OGP_LANG_remote_host_port', "Porta de host remoto");
define('OGP_LANG_remote_host_port_info', "A porta que esta em escuta pelo Painel Agent no host remoto. Padrão: 12679.");
define('OGP_LANG_remote_host_name', "Nome do host remoto");
define('OGP_LANG_ogp_user', "OGP Agent Username");
define('OGP_LANG_remote_host_name_info', "O nome do host remoto é usado para ajudar os usuários a identificar seus servidores.");
define('OGP_LANG_add_remote_host', "Adicionar host remoto");
define('OGP_LANG_remote_encryption_key', "Chave de criptografia remota");
define('OGP_LANG_remote_encryption_key_info', "A chave de criptografia remota é usada para criptografar os dados entre o Painel e o Agente. Essa chave deve ser igual em ambos os lados.");
define('OGP_LANG_server_name', "Nome do servidor");
define('OGP_LANG_agent_ip_port', "Agent IP:Porta");
define('OGP_LANG_agent_status', "Agent Status");
define('OGP_LANG_ips', "IPs");
define('OGP_LANG_add_more_ips', "Se você deseja inserir mais IPs, pressione 'Set IPs' quando todos os campos estiverem cheios um novo campo vazio aparecerá.");
define('OGP_LANG_encryption_key_mismatch', "A chave de criptografia não coincide com o agente. Verifique novamente a configuração do seu agente");
define('OGP_LANG_no_ip_for_remote_host', "Você precisa adicionar pelo menos um (1) endereço IP para cada host remoto.");
define('OGP_LANG_note_remote_host', "Um host remoto é um servidor onde o Painel Agent está funcionando. Cada host pode ter um número múltiplo de endereços IP nos quais os usuários podem ligar servidores.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "Erro desconhecido - status_chk returned");
define('OGP_LANG_remote_host_user_name', "UNIX user");
define('OGP_LANG_remote_host_user_name_info', "Nome de usuário onde o agente está sendo executado. Exemplo: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "O servidor FTP <b>IP</b> para o atual Agente.");
define('OGP_LANG_remote_host_ftp_port', "Porta FTP");
define('OGP_LANG_remote_host_ftp_port_info', "O servidor FTP <b>port</b> para o atual Agente.");
define('OGP_LANG_view_log', "Ver Log");
define('OGP_LANG_status', "Estado");
define('OGP_LANG_stop_firewall', "Pare o firewall");
define('OGP_LANG_start_firewall', "Iniciar Firewall");
define('OGP_LANG_seconds', "Segundos");
define('OGP_LANG_reboot', "Reinicialização remota do servidor");
define('OGP_LANG_restart', "Restart Agent");
define('OGP_LANG_confirm_reboot', "Tem certeza de que deseja reiniciar remotamente todo o servidor físico chamado '%s'?");
define('OGP_LANG_confirm_restart', "Tem certeza de que deseja reiniciar o agente chamado '%s'?");
define('OGP_LANG_restarting', "A reiniciar o agente... Por Favor Aguarde.");
define('OGP_LANG_restarted', "Agente reiniciado com sucesso.");
define('OGP_LANG_reboot_success', "O servidor chamado '%s' foi reiniciado com sucesso. Você não poderá acessar o servidor até que ele seja inicializado com sucesso.");
define('OGP_LANG_invalid_remote_host_id', "ID de host remoto inválido '%s' fornecido.");
define('OGP_LANG_remote_host_removed', "O host remoto chamado '%s' foi removido com sucesso.");
define('OGP_LANG_editing_remote_server', "Editando o servidor remoto chamado '%s'");
define('OGP_LANG_remote_server_settings_changed', "Mudou as configurações para o servidor remoto '%s' com sucesso.");
define('OGP_LANG_save_settings', "Salvar configurações");
define('OGP_LANG_set_ips', "Definir IPs");
define('OGP_LANG_remote_ip', "IP remoto");
define('OGP_LANG_remote_ips_for', "IPs para servidores de jogos a usar no servidor do agente '%s'");
define('OGP_LANG_ips_set_for_server', "Os IPs definidos para o servidor chamados '%s' com sucesso.");
define('OGP_LANG_could_not_remove_ip', "Não foi possível remover os antigos IP do banco de dados.");
define('OGP_LANG_could_add_ip', "Poderia adicionar IP do servidor remoto ao banco de dados.");
define('OGP_LANG_areyousure_removeagent', "Tem certeza de que deseja remover o agente chamado");
define('OGP_LANG_areyousure_removeagent2', "e todos os diretorios relacionadas a ela a partir do banco de dados do painel?");
define('OGP_LANG_error_while_remove', "Ocorreu um erro ao remover o servidor remoto.");
define('OGP_LANG_add_ip', "Adicionar IP");
define('OGP_LANG_remove_ip', "Remover IP");
define('OGP_LANG_edit_ip', "Edite o IP");
define('OGP_LANG_wrote_changes', "Alterações salvas com sucesso.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Existem servidores em execução neste endereço IP.");
define('OGP_LANG_enter_ip_host', "Você deve digitar IP para o host remoto.");
define('OGP_LANG_enter_valid_ip', "Você deve digitar a porta válida para o host remoto. O valor da porta pode estar entre 0 e 65535, no entanto a recomendação é entre 1024 e 65535.");
define('OGP_LANG_could_not_add_server', "Não foi possível adicionar servidor");
define('OGP_LANG_to_db', "para o banco de dados.");
define('OGP_LANG_added_server', "Servidor adicionado");
define('OGP_LANG_with_port', "com porta");
define('OGP_LANG_to_db_succesfully', "para o banco de dados com sucesso.");
define('OGP_LANG_unable_discover', "Não é possível descobrir os IPs automaticamente");
define('OGP_LANG_set_ip_manually', "Você terá que configurá-los manualmente.");
define('OGP_LANG_found_ips', "IPs encontrados");
define('OGP_LANG_for_remote_server', "Para o servidor remoto.");
define('OGP_LANG_failed_add_ip', "Falha ao adicionar IP");
define('OGP_LANG_timeout', "Tempo esgotado");
define('OGP_LANG_timeout_info', "O limite de tempo em segundos para obter a resposta deste Agente.");
define('OGP_LANG_use_nat', "Usar NAT");
define('OGP_LANG_use_nat_info', "Ativar apenas se o seu servidor remoto estiver a usar regras NAT. Use essas configurações se os servidores do seus jogos estiverem a ser executados em endereços IP internos da LAN, para que o painel use um endereço IP remoto real, assim consultar os servidores de jogos.");
define('OGP_LANG_arrange_ports', "Organizar portas");
define('OGP_LANG_assign_new_ports_range_for_ip', "Atribuir uma nova faixa de portas para IP %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Faixas de portas atribuídas para IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Portas atribuídas para IP %s");
define('OGP_LANG_unspecified_game_types', "Tipos de jogos não especificados");
define('OGP_LANG_start_port', "Porta de início:");
define('OGP_LANG_end_port', "Porta final:");
define('OGP_LANG_port_increment', "Aumento da porta:");
define('OGP_LANG_total_assignable_ports', "Total de portas atribuíveis:");
define('OGP_LANG_available_range_ports', "Portas de alcance disponíveis:");
define('OGP_LANG_assign_range', "Atribuir alcance");
define('OGP_LANG_edit_range', "Editar distancia");
define('OGP_LANG_delete_range', "Apagar distancia");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Home path");
define('OGP_LANG_game_type', "Tipo de jogo");
define('OGP_LANG_port', "Porta");
define('OGP_LANG_invalid_values', "Valores inválidos.");
define('OGP_LANG_ports_in_range_already_arranged', "Portas na faixa já arranjados.");
define('OGP_LANG_ports_range_already_configured_for', "A gama de portas já está configurada para %s.");
define('OGP_LANG_ports_range_added_successfull_for', "O intervalo de portas foi adicionado com sucesso para %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Escala de portas excluída com sucesso.");
define('OGP_LANG_ports_range_edited_successfull_for', "O intervalo de portas foi editado com sucesso para %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editando o Firewall para o servidor remoto chamado '%s'");
define('OGP_LANG_default_allowed', "Permitido por padrão");
define('OGP_LANG_allow_port_command', "Permitir comando de porta");
define('OGP_LANG_deny_port_command', "Regeitar o comando da porta");
define('OGP_LANG_allow_ip_port_command', "Permitir IP: comando de porta");
define('OGP_LANG_deny_ip_port_command', "Negar IP: comando de porta");
define('OGP_LANG_enable_firewall_command', "Habilitar o comando de firewall");
define('OGP_LANG_disable_firewall_command', "Desativar o comando do firewall");
define('OGP_LANG_get_firewall_status_command', "Obter o comando de status do firewall");
define('OGP_LANG_reset_firewall_command', "Redefinir o comando de firewall");
define('OGP_LANG_firewall_status', "Estado da Firewall");
define('OGP_LANG_save_firewall_settings', "Salvar configurações de firewall");
define('OGP_LANG_reset_firewall', "Redefinir Firewall");
define('OGP_LANG_firewall_settings', "Configurações do Firewall");
define('OGP_LANG_display_public_ip', "Exibir IP público");
define('OGP_LANG_ips_can_be_internal_external', "Digite os endereços IP utilizáveis.&nbsp; Endereços IP públicos e endereços IP internos da LAN (para configurações NAT) podem ser usados.");
?>
