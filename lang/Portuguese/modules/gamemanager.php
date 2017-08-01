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

define('game_manager', "Game Manager");
define('no_games_to_monitor', "Você não possui nenhum jogo configurado que possa ser exibido.");
define('status', "Status");
define('fail_no_mods', "No mods enabled for this game! You need to ask your OGP admin to add mod(s) for the game assigned for you.");
define('no_game_homes_assigned', "Não há servidores de jogos associados a sua conta. Entre em contato com um administrador para que ele possa adicionar um para você.");
define('select_game_home_to_configure', "Escolha um servidor que deseja configurar");
define('file_manager', "Gerenciador de Arquivos");
define('configure_mods', "Configurar mods");
define('install_update_steam', "Instalar/Atualizar através do Steam");
define('install_update_manual', "Instalar/Atualizar manualmente");
define('assign_game_homes', "Associar servidores");
define('user', "Usuário");
define('group', "Grupo");
define('start', "Iniciar");
define('ogp_agent_ip', "IP do Agente OGP");
define('max_players', "Máx. Jogadores");
define('max', "Máx.");
define('ip_and_port', "IP e Porta");
define('available_maps', "Mapas Disponíveis");
define('map_path', "Pasta de Mapas");
define('available_parameters', "Parâmetros Disponíveis");
define('start_server', "Iniciar Servidor");
define('start_wait_note', "A inicialização do servidor pode levar um tempo. Por favor não encerre seu navegador.");
define('game_type', "Tipo de Jogo");
define('map', "Mapa");
define('starting_server', "Iniciando servidor, favor aguardar...");
define('starting_server_settings', "Iniciando servidor com a seguinte configuração");
define('startup_params', "Parâmetros de inicialização");
define('startup_cpu', "CPU em que o servidor está executando");
define('startup_nice', "Valor da prioridade nice do servidor");
define('game_home', "servidor");
define('server_started', "Servidor iniciado com sucesso.");
define('no_parameter_access', "Você não tem acesso aos parâmetros");
define('extra_parameters', "Parâmetros Adicionais");
define('no_extra_param_access', "Você não tem acesso aos parâmetros adicionais");
define('extra_parameters_info', "Esses parâmetros serão adicionados no final da linha de comando quando o servidor for iniciado.");
define('game_exec_not_found', "O executável %s não foi encontrado no servidor remoto.");
define('select_params_and_start', "Selecione os parâmetros de inicialização para o servidor e clique em '%s'.");
define('no_ip_port_pairs_assigned', "Não há um IP e porta associados para esse diretório. Se você não tem acesso a edição do mesmo, entre em contato com um administrador.");
define('unable_to_get_log', "Falha ao obter log, status %s.");
define('server_binary_not_executable', "O executável do servidor não tem permissões de execução. Verifique as permissões de arquivo na pasta do servidor.");
define('server_not_running_log_found', "O servidor não está em execução, mas um registro de log foi encontrado. NOTA: Esse registro pode não ser relacionado à ultima vez em que o servidor foi iniciado.");
define('ip_port_pair_not_owned', "IP:PORT pair not owned.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Unsuitable maxplayers value, maximum reachable number of slots has been set.");
define('server_running_not_responding', "O servidor está em execução mas não está respondendo, <br>pode haver algum tipo de problema e talvez você queira");
define('update_started', "Atualização iniciada, aguarde...");
define('failed_to_start_steam_update', "Falha ao iniciar o Steam. Verifique o log do agente para mais detalhes.");
define('failed_to_start_rsync_update', "Falha ao iniciar o Rsync. Verifique o log do agente para mais detalhes.");
define('update_completed', "Atualização concluída com sucesso.");
define('update_in_progress', "Atualização em andamento, aguarde...");
define('refresh_steam_status', "Atualizar status Steam");
define('refresh_rsync_status', "Atualizar status rsync");
define('server_running_cant_update', "Servidor em execução, não é possível atualizá-lo. Encerre-o primeiro antes de atualizar.");
define('xml_steam_error', "O tipo de servidor selecionado não suporta atualizações via Steam.");
define('mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
define('stop_update', "Pare de atualizar");
define('statistics', "Estatísticas");
define('servers', "Servidores");
define('players', "Jogadores");
define('current_map', "Mapa Atual");
define('stop_server', "Parar servidor");
define('server_ip_port', "IP:Porta do Servidor");
define('server_name', "Nome do Servidor");
define('server_id', "ID do Servidor");
define('player_name', "Nome do Jogador");
define('score', "Pontuação");
define('time', "Tempo");
define('no_rights_to_stop_server', "Você não tem permissões para parar esse servidor.");
define('no_ogp_lgsl_support', "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.");
define('server_status', "Server on %s is %s.");
define('server_stopped', "O servidor '%s' foi encerrado.");
define('if_want_to_start_homes', "Se você quer iniciar os servidores vá para %s.");
define('view_log', "Logs");
define('if_want_manage', "Se você deseja gerenciar seus jogos você pode fazê-lo na");
define('columns', "colunas");
define('group_users', "Group users:");
define('assigned_to', "Associado a:");
define('restart_server', "Reiniciar Servidor");
define('restarting_server', "Reiniciando servidor, aguarde...");
define('server_restarted', "O servidor '%s' foi reiniciado.");
define('server_not_running', "O servidor não está em execução.");
define('address', "Endereço");
define('owner', "Dono");
define('operations', "Operações");
define('search', "Pesquisar");
define('maps_read_from', "Mapas obtidos do");
define('file', "arquivo");
define('folder', "diretório");
define('unable_retrieve_mod_info', "Falha ao obter informações sobre o mod no banco de dados.");
define('unexpected_result_libremote', "Resultado inesperado do libremote, por favor informe aos desenvolvedores.");
define('unable_get_info', "Falha ao obter as informações necessárias para inicializar, cancelando inicialização.");
define('server_already_running', "O servidor já está em execução. Se você não o vê no Gerenciador de Servidores, pode haver algum tipo de problema e talvez você queira");
define('already_running_stop_server', "Parar servidor.");
define('error_server_already_running', "ERRO: Já existe um servidor rodando na porta");
define('failed_start_server_code', "Falha ao iniciar servidor removo. Código de erro: %s");
define('disabled', "desabilitado");
define('not_found_server', "Não foi possível encontrar o servidor com a ID");
define('rcon_command_title', "Comando RCON");
define('has_sent_to', "foi enviado para");
define('need_set_remote_pass', "Você precisa configurar uma senha rcon no");
define('before_sending_rcon_com', "antes de enviar comandos para ele.");
define('retry', "Tentar novamente");
define('page', "página");
define('server_cant_start', "servidor não pode iniciar");
define('server_cant_stop', "servidor não pôde parar");
define('error_occured_remote_host', "Ocorreu um erro no host remoto.");
define('follow_server_status', "You can follow the server status from");
define('addons', "Addons");
define('hostname', "Hostname");
define('rsync_install', "[Rsync Install]");
define('ping', "Ping");
define('team', "Team");
define('deaths', "Deaths");
define('pid', "PID");
define('skill', "Skill");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "Player");
define('port', "Port");
define('rcon_presets', "RCON presets");
define('update_from_local_master_server', "Update from local Master Server");
define('update_from_selected_rsync_server', "Update from selected Rsync server");
define('execute_selected_server_operations', "Execute selected server operations");
define('execute_operations', "Execute operations");
define('account_expiration', "Account expiration");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Falha ao consultar o servidor");
define('query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('name', "Name");
define('command', "RCON&nbsp;Command");
define('add_preset', "Add preset");
define('edit_presets', "Edit presets");
define('del_preset', "Delete");
define('change_preset', "Change");
define('send_command', "Send command");
define('starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('starting_sync_with', "Starting sync with %s...");
define('refresh_interval', "Log refreshing interval");
define('finished_manual_update', "Finished manual update.");
define('failed_to_start_file_download', "Failed to start file download");
define('game_name', "Game name");
define('dest_dir', "Destination directory");
define('remote_server', "Remote Server");
define('file_url', "File URL");
define('file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('dest_filename', "Destination Filename");
define('dest_filename_info', "The filename for the destination file.");
define('update_server', "Atualizar servidor");
define('unavailable', "Unavailable");
define('upload_map_image', "Upload map image");
define('upload_image', "Upload image");
define('jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('check_dev_console', "Error during uploading file, please check the browser developer console.");
define('uploaded_successfully', "Uploaded successfully.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unknown errors.");
define('directory', "Directory");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('auto_update_copy_me', "Copy");
define('auto_update_copy_me_success', "Copied!");
define('auto_update_copy_me_fail', "Failed to copy. Please manually copy the link.");
define('get_steam_autoupdate_api_link', "Auto Update Link");
define('update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('cannot_update_from_own_self', "Local Server Update may not run on a master server.");
define('show_server_id', "Show Server IDs");
define('hide_server_id', "Hide Server IDs");
?>