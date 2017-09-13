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

define('error', "Erro");
define('title', "TeamSpeak 3 Web Interface");
define('update_available', "<h3>Atenção: uma nova versão (v%1) deste software está disponível sob
 <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('head_logout', "Sair");
define('head_vserver_switch', "Alterar vServer");
define('head_vserver_overview', "Visão geral do vServer");
define('head_vserver_token', "Token Management");
define('head_vserver_liveview', "Visualização ao vivo");
define('e_fill_out', "Preencha todos os campos obrigatórios.");
define('e_upload_failed', "Envio sem sucesso.");
define('e_server_responded', "O servidor respondeu:");
define('e_conn_serverquery', "Não foi possível criar o acesso ServerQuery.");
define('e_conn_vserver', "Não foi possível escolher o servidor virtual.");
define('e_session_timedout', "Sessão expirada.");
define('js_error', "Erro");
define('js_ajax_error', "Ocorreu algum erro no AJAX: %1.");
define('js_confirm_server_stop', "Você realmente quer PARAR o servidor? #%1?");
define('js_confirm_server_delete', "Você realmente quer APAGAR o servidor #%1?");
define('js_notice_server_deleted', "O servidor %1 foi excluído com êxito.\nA página de visão geral ficará recarregada agora.");
define('js_prompt_banduration', "Duração em horas (0=ilimitado):");
define('js_prompt_banreason', "Razão (opcional): ");
define('js_prompt_msg_to', "Text Message to %1 #%2: ");
define('js_prompt_poke_to', "Poke Message to Client #%1: ");
define('js_prompt_new_propvalue', "Novo valor para '%1': ");
define('n_server_responded', "O servidor respondeu: ");
define('login_serverquery', "ServerQuery Login");
define('login_name', "Nome de usuário");
define('login_password', "Password");
define('login_submit', "Login");
define('vsselect_headline', "Seleção do vServer");
define('vsselect_id', "ID #");
define('vsselect_name', "Nome");
define('vsselect_ip', "IP");
define('vsselect_port', "Porta");
define('vsselect_state', "Estado");
define('vsselect_clients', "Clientes");
define('vsselect_uptime', "Tempo de atividade");
define('vsselect_choose', "Selecione");
define('vsselect_start', "Começar");
define('vsselect_stop', "Parar");
define('vsselect_delete', "EXCLUIR");
define('vsselect_new_headline', "Crie um novo servidor virtual");
define('vsselect_new_servername', "Nome do servidor");
define('vsselect_new_slots', "Slot do cliente");
define('vsselect_new_create', "Criar");
define('vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> foi criado com sucesso.");
define('vsselect_new_added_generated', "O token gerado é:");
define('vsoverview_virtualserver', "Servidor virtual");
define('vsoverview_information_head', "informação");
define('vsoverview_connection_head', "Conexão");
define('vsoverview_info_general_head', "Configurações Gerais");
define('vsoverview_info_servername', "Nome do servidor");
define('vsoverview_info_host', "Anfitrião");
define('vsoverview_info_state', "Estado");
define('vsoverview_info_state_port', "Porta");
define('vsoverview_info_uptime', "Tempo de atividade");
define('vsoverview_info_welcomemsg', "Bem-vindo <br /> mensagem");
define('vsoverview_info_hostmsg', "Mensagem de anfitrião");
define('vsoverview_info_hostmsg_mode_output', "saída");
define('vsoverview_info_hostmsg_mode_0', "Nenhum");
define('vsoverview_info_hostmsg_mode_1', "No log de bate-papo");
define('vsoverview_info_hostmsg_mode_2', "janela");
define('vsoverview_info_hostmsg_mode_3', "Window + Disconnect");
define('vsoverview_info_req_security', "Nível de segurança");
define('vsoverview_info_req_securitylvl', "exigido");
define('vsoverview_info_hostbanner_head', "Hostbanner");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Endereço da imagem");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Aviso sobre");
define('vsoverview_info_antiflood_kick', "Kikar ligado");
define('vsoverview_info_antiflood_ban', "Banimento ligado");
define('vsoverview_info_antiflood_banduration', "Tempo de Banimento");
define('vsoverview_info_antiflood_decrease', "Diminuir");
define('vsoverview_info_antiflood_points', "pontos");
define('vsoverview_info_antiflood_in_seconds', "segundos");
define('vsoverview_info_antiflood_points_per_tick', "Pontos por segundo\"Points per tick\"");
define('vsoverview_conn_total_head', "Total");
define('vsoverview_conn_total_packets', "Pacotes");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "enviado");
define('vsoverview_conn_total_received', "recebido");
define('vsoverview_conn_bandwidth_head', "Largura de banda");
define('vsoverview_conn_bandwidth_last', "último");
define('vsoverview_conn_bandwidth_second', "segundo");
define('vsoverview_conn_bandwidth_minute', "minuto");
define('vsoverview_conn_bandwidth_send', "enviado");
define('vsoverview_conn_bandwidth_received', "recebido");
define('vstoken_token_virtualserver', "Servidor virtual");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Tipo de grupo");
define('vstoken_token_id1', "Grupo de Servidores/<br />Grupo de canais");
define('vstoken_token_id2', "(Canal)");
define('vstoken_token_tokencode', "Código Token");
define('vstoken_token_delete', "Excluir");
define('vstoken_new_head', "Crie um novo token");
define('vstoken_new_create', "Gerar");
define('vstoken_new_tokentype', "Tipo de token:");
define('vstoken_new_servergroup', "Grupo de Servidores");
define('vstoken_new_channelgroup', "Grupo de canais");
define('vstoken_new_select_group', "Grupo de servidor");
define('vstoken_new_select_channelgroup', "Grupo de Canal");
define('vstoken_new_select_channel', "Canal");
define('vstoken_new_tokentype_0', "Servidor");
define('vstoken_new_tokentype_1', "Canal");
define('vstoken_new_added_ok', "Token foi gerado com sucesso.");
define('vsliveview_server_virtualserver', "Servidor virtual");
define('vsliveview_server_head', "Visualização ao vivo");
define('vsliveview_liveview_enable_autorefresh', "Atualização automática");
define('vsliveview_liveview_tooltip_to_channel', "ao canal #");
define('vsliveview_liveview_tooltip_switch', "trocar");
define('vsliveview_liveview_tooltip_send_msg', "Enviar mensagem");
define('vsliveview_liveview_tooltip_poke', "Cutucar \"poke\"");
define('vsliveview_liveview_tooltip_kick', "Kickar");
define('vsliveview_liveview_tooltip_ban', "Banir");
define('vsoverview_banlist_head', "Lista de banimentos");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Nome");
define('vsoverview_banlist_uid', "ID único");
define('vsoverview_banlist_reason', "Razão");
define('vsoverview_banlist_created', "Criada");
define('vsoverview_banlist_duration', "Duração");
define('vsoverview_banlist_end', "Termina");
define('vsoverview_banlist_unlimited', "ilimitado");
define('vsoverview_banlist_never', "nunca");
define('vsoverview_banlist_new_head', "Criar novo ban");
define('vsoverview_banlist_new_create', "criar");
define('vsliveview_channelbackup_head', "Backup de canal");
define('vsliveview_channelbackup_get', "Criar e baixar");
define('vsliveview_channelbackup_load', "Carregar backup de canal");
define('vsliveview_channelbackup_load_submit', "Recriar");
define('vsliveview_channelbackup_new_added_ok', "O backup do canal foi bem-sucedido.");
define('time_day', "dia");
define('time_days', "dias");
define('time_hour', "horas");
define('time_hours', "horas");
define('time_minute', "minuto");
define('time_minutes', "minutos");
define('time_second', "segundo");
define('time_seconds', "segundos");
define('e_2568', "Você não tem direitos suficientes.");
define('temp_folder_not_writable', "A pasta de templates (%s) não pode ser gravada.");
define('unassign_from_subuser', "Cancelar atribuição do sub-usuário");
define('assign_to_subuser', "Atribuir ao sub-usuário.");
define('select_subuser', "Selecione o sub-usuário.");
define('no_ts3_servers_assigned_to_account', "Você não possui servidores atribuídos à sua conta.");
define('change_virtual_server', "Alterar servidor virtual");
define('change_remote_server', "Alterar Servidor Remoto");
?>