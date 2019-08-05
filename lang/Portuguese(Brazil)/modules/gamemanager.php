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

define('OGP_LANG_no_games_to_monitor', "Você não possui nenhum jogo configurado que possa ser exibido.");
define('OGP_LANG_status', "Estado");
define('OGP_LANG_fail_no_mods', "Não há mods habilitados para este jogo! Você precisa pedir ao seu administrador do painel para adicionar mod(s) para o jogo atribuído para você.");
define('OGP_LANG_no_game_homes_assigned', "Você não tem nenhum servidor atribuído à sua conta.");
define('OGP_LANG_select_game_home_to_configure', "Escolha um servidor que deseja configurar");
define('OGP_LANG_file_manager', "Gerenciador de Arquivos");
define('OGP_LANG_configure_mods', "Configurar mods");
define('OGP_LANG_install_update_steam', "Instalar/Atualizar através do Steam");
define('OGP_LANG_install_update_manual', "Instalar/Atualizar manualmente");
define('OGP_LANG_assign_game_homes', "Associar servidores");
define('OGP_LANG_user', "Usuário");
define('OGP_LANG_group', "Grupo");
define('OGP_LANG_start', "Iniciar");
define('OGP_LANG_ogp_agent_ip', "IP do Agente OGP");
define('OGP_LANG_max_players', "Máx. Jogadores");
define('OGP_LANG_max', "Máx.");
define('OGP_LANG_ip_and_port', "IP e Porta");
define('OGP_LANG_available_maps', "Mapas Disponíveis");
define('OGP_LANG_map_path', "Pasta de Mapas");
define('OGP_LANG_available_parameters', "Parâmetros Disponíveis");
define('OGP_LANG_start_server', "Iniciar Servidor");
define('OGP_LANG_start_wait_note', "A inicialização do servidor pode levar um tempo. Por favor não encerre seu navegador.");
define('OGP_LANG_game_type', "Tipo de Jogo");
define('OGP_LANG_map', "Mapa");
define('OGP_LANG_starting_server', "Iniciando servidor, favor aguardar...");
define('OGP_LANG_starting_server_settings', "Iniciando servidor com a seguinte configuração");
define('OGP_LANG_startup_params', "Parâmetros de inicialização");
define('OGP_LANG_startup_cpu', "CPU em que o servidor está executando");
define('OGP_LANG_startup_nice', "Valor da prioridade nice do servidor");
define('OGP_LANG_game_home', "Caminho raiz");
define('OGP_LANG_server_started', "Servidor iniciado com sucesso.");
define('OGP_LANG_no_parameter_access', "Você não tem acesso aos parâmetros");
define('OGP_LANG_extra_parameters', "Parâmetros Adicionais");
define('OGP_LANG_no_extra_param_access', "Você não tem acesso aos parâmetros adicionais");
define('OGP_LANG_extra_parameters_info', "Esses parâmetros serão adicionados no final da linha de comando quando o servidor for iniciado.");
define('OGP_LANG_game_exec_not_found', "O executável %s não foi encontrado no servidor remoto.");
define('OGP_LANG_select_params_and_start', "Selecione os parâmetros de inicialização para o servidor e clique em '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Não há um IP e porta associados para esse diretório. Se você não tem acesso a edição do mesmo, entre em contato com um administrador.");
define('OGP_LANG_unable_to_get_log', "Falha ao obter log, status %s.");
define('OGP_LANG_server_binary_not_executable', "O executável do servidor não tem permissões de execução. Verifique as permissões de arquivo na pasta do servidor.");
define('OGP_LANG_server_not_running_log_found', "O servidor não está em execução, mas um registro de log foi encontrado. NOTA: Esse registro pode não ser relacionado à ultima vez em que o servidor foi iniciado.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT não é dono deste par.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Máximo valor máximo dos jogadores, o número máximo alcançável de slots foi definido.");
define('OGP_LANG_server_running_not_responding', "O servidor está em execução mas não está respondendo, <br>pode haver algum tipo de problema e talvez você queira");
define('OGP_LANG_update_started', "Atualização iniciada, aguarde...");
define('OGP_LANG_failed_to_start_steam_update', "Falha ao iniciar o Steam. Verifique o log do agente para mais detalhes.");
define('OGP_LANG_failed_to_start_rsync_update', "Falha ao iniciar o Rsync. Verifique o log do agente para mais detalhes.");
define('OGP_LANG_update_completed', "Atualização concluída com sucesso.");
define('OGP_LANG_update_in_progress', "Atualização em andamento, aguarde...");
define('OGP_LANG_refresh_steam_status', "Atualize o status do Steam");
define('OGP_LANG_refresh_rsync_status', "Atualizar o status do Rsync");
define('OGP_LANG_server_running_cant_update', "Servidor em execução, não é possível atualizá-lo. Encerre-o primeiro antes de atualizar.");
define('OGP_LANG_xml_steam_error', "O tipo de servidor selecionado não suporta atualizações via Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Tecla Mod '%s' não encontrado a partir do arquivo XML");
define('OGP_LANG_stop_update', "Parar atualização ");
define('OGP_LANG_statistics', "Estatísticas");
define('OGP_LANG_servers', "Servidores");
define('OGP_LANG_players', "Jogadores");
define('OGP_LANG_current_map', "Mapa Atual");
define('OGP_LANG_stop_server', "Parar servidor");
define('OGP_LANG_server_ip_port', "IP:Porta do Servidor");
define('OGP_LANG_server_name', "Nome do Servidor");
define('OGP_LANG_server_id', "ID do Servidor");
define('OGP_LANG_player_name', "Nome do Jogador");
define('OGP_LANG_score', "Pontuação");
define('OGP_LANG_time', "Tempo");
define('OGP_LANG_no_rights_to_stop_server', "Você não tem permissões para parar esse servidor.");
define('OGP_LANG_no_ogp_lgsl_support', "Este servidor (em execução: %s) não tem suporte LGSL no painel e as suas estatísticas não podem ser exibidas.");
define('OGP_LANG_server_status', "Servidor em %s é %s.");
define('OGP_LANG_server_stopped', "O servidor '%s' foi encerrado.");
define('OGP_LANG_if_want_to_start_homes', "Se você quer iniciar os servidores vá para %s.");
define('OGP_LANG_view_log', "Abrir Log");
define('OGP_LANG_if_want_manage', "Se você deseja gerenciar seus jogos você pode fazê-lo na");
define('OGP_LANG_columns', "Colunas");
define('OGP_LANG_group_users', "Usuários do grupo:");
define('OGP_LANG_assigned_to', "Associado a:");
define('OGP_LANG_restart_server', "Reiniciar Servidor");
define('OGP_LANG_restarting_server', "Reiniciando servidor, aguarde...");
define('OGP_LANG_server_restarted', "O servidor '%s' foi reiniciado.");
define('OGP_LANG_server_not_running', "O servidor não está em execução.");
define('OGP_LANG_address', "Endereço");
define('OGP_LANG_owner', "Dono");
define('OGP_LANG_operations', "Operações");
define('OGP_LANG_search', "Pesquisar");
define('OGP_LANG_maps_read_from', "Mapas lidos do");
define('OGP_LANG_file', "Arquivo");
define('OGP_LANG_folder', "Diretório");
define('OGP_LANG_unable_retrieve_mod_info', "Falha ao obter informações sobre o mod no banco de dados.");
define('OGP_LANG_unexpected_result_libremote', "Resultado inesperado do libremote, por favor informe aos desenvolvedores.");
define('OGP_LANG_unable_get_info', "Falha ao obter as informações necessárias para inicializar, cancelando inicialização.");
define('OGP_LANG_server_already_running', "O servidor já está em execução. Se você não o vê no Gerenciador de Servidores, pode haver algum tipo de problema e talvez você queira");
define('OGP_LANG_already_running_stop_server', "Parar servidor.");
define('OGP_LANG_error_server_already_running', "ERRO: Já existe um servidor rodando na porta");
define('OGP_LANG_failed_start_server_code', "Falha ao iniciar servidor remoto. Código de erro: %s");
define('OGP_LANG_disabled', "Desabilitado");
define('OGP_LANG_not_found_server', "Não foi possível encontrar o servidor com a ID");
define('OGP_LANG_rcon_command_title', "Comando RCON");
define('OGP_LANG_has_sent_to', "Foi enviado para");
define('OGP_LANG_need_set_remote_pass', "Você precisa configurar uma senha rcon no");
define('OGP_LANG_before_sending_rcon_com', "Antes de enviar comandos para ele.");
define('OGP_LANG_retry', "Tentar novamente");
define('OGP_LANG_page', "página");
define('OGP_LANG_server_cant_start', "servidor não pode iniciar");
define('OGP_LANG_server_cant_stop', "servidor não pôde parar");
define('OGP_LANG_error_occured_remote_host', "Ocorreu um erro no host remoto.");
define('OGP_LANG_follow_server_status', "Você pode seguir o status do servidor de");
define('OGP_LANG_addons', "Addons");
define('OGP_LANG_hostname', "Nome do servidor");
define('OGP_LANG_rsync_install', "[Instalar Rsync]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Equipe");
define('OGP_LANG_deaths', "Mortes");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Habilidade");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Jogador");
define('OGP_LANG_port', "Porta");
define('OGP_LANG_rcon_presets', "Predefinições RCON");
define('OGP_LANG_update_from_local_master_server', "Atualização do servidor Master Server");
define('OGP_LANG_update_from_selected_rsync_server', "Atualização do servidor Rsync selecionado");
define('OGP_LANG_execute_selected_server_operations', "Execute as operações selecionadas do servidor ");
define('OGP_LANG_execute_operations', "Execute operações");
define('OGP_LANG_account_expiration', "Vencimento da conta");
define('OGP_LANG_mysql_databases', "Bases de dados MySQL");
define('OGP_LANG_failed_querying_server', "* Falha ao consultar o servidor");
define('OGP_LANG_query_protocol_not_supported', "* Não há protocolo de consulta nopainel que possa ser suportado neste servidor.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Consultas desativadas por configuração: Desativar consultas após: %s, desde que você tem %s servidores.<br>");
define('OGP_LANG_presets_for_game_and_mod', "Predefinições RCON para %s e mod %s");
define('OGP_LANG_name', "Nome");
define('OGP_LANG_command', "RCON&nbsp;Comando");
define('OGP_LANG_add_preset', "Adicionar predefinição");
define('OGP_LANG_edit_presets', "Editar presets");
define('OGP_LANG_del_preset', "Apagar");
define('OGP_LANG_change_preset', "Mudar");
define('OGP_LANG_send_command', "Enviar comando");
define('OGP_LANG_starting_copy_with_master_server_named', "Iniciando a cópia com o Master Server chamado '%s'...");
define('OGP_LANG_starting_sync_with', "Iniciar sincronização com %s...");
define('OGP_LANG_refresh_interval', "Intervalo de atualização do log");
define('OGP_LANG_finished_manual_update', "Atualização manual concluída.");
define('OGP_LANG_failed_to_start_file_download', "Falha ao iniciar o download de arquivos");
define('OGP_LANG_game_name', "Nome do jogo");
define('OGP_LANG_dest_dir', "Diretório de destino");
define('OGP_LANG_remote_server', "Servidor remoto");
define('OGP_LANG_file_url', "URL do arquivo");
define('OGP_LANG_file_url_info', "O URL do arquivo foi carregado e descompactado para o diretório.");
define('OGP_LANG_dest_filename', "Nome do Destino");
define('OGP_LANG_dest_filename_info', "O nome do arquivo para o destino de arquivo.");
define('OGP_LANG_update_server', "Atualizar servidor");
define('OGP_LANG_unavailable', "Indisponível");
define('OGP_LANG_upload_map_image', "Carregar imagem do mapa");
define('OGP_LANG_upload_image', "Enviar Imagem");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "A imagem deve ser jpg, gif ou png e tamanho inferior a 1 MB.");
define('OGP_LANG_check_dev_console', "Erro durante o upload do arquivo, verifique o console do desenvolvedor no navegador.");
define('OGP_LANG_uploaded_successfully', "Carregado com sucesso.");
define('OGP_LANG_cant_create_folder', "Não foi possível criar a pasta:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Não foi possível gravar o arquivo:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Excedeu a diretriz PHP.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Erros desconhecidos.");
define('OGP_LANG_directory', "Diretório");
define('OGP_LANG_view_player_commands', "Ver comandos do jogador");
define('OGP_LANG_hide_player_commands', "Ocultar Comandos do Jogador");
define('OGP_LANG_no_online_players', "Não há jogadores online.");
define('OGP_LANG_invalid_game_mod_id', "ID invalido de Jogo/Mod especificado.");
define('OGP_LANG_auto_update_title_popup', "STEAM - atualização automática de Link");
define('OGP_LANG_auto_update_popup_html', "<p>Use o link abaixo para verificar e atualizar automaticamente seu servidor de jogos via Steam, se necessário.&nbsp; Você pode consultá-lo usando um cronjob ou iniciar manualmente o processo.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Selecione uma ação que você gostaria de realizar usando a API OGP para este servidor de jogos.&nbsp; Em seguida, use o link abaixo para realizar a ação desejada.&nbsp; Você pode executar a ação desejada usando um cronjob ou fazendo uma solicitação direta para ele.</p>");
define('OGP_LANG_auto_update_copy_me', "Copia");
define('OGP_LANG_auto_update_copy_me_success', "Copiado!");
define('OGP_LANG_auto_update_copy_me_fail', "Falha ao copiar. Por favor, copie manualmente o link.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Link de atualização automática");
define('OGP_LANG_show_api_actions', "Mostrar Ações da API");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Usuario %s tentou atualizar home_id %d De um servidor Non-Master. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Você está tentando atualizar este servidor a partir de um servidor Non-Master.");
define('OGP_LANG_cannot_update_from_own_self', "A atualização do servidor local pode não ser executada em um Master Server");
define('OGP_LANG_show_server_id', "Mostrar IDs do servidor");
define('OGP_LANG_hide_server_id', "Ocultar IDs de servidor");
define('OGP_LANG_edit_configuration_files', "Editar arquivos de config");
define('OGP_LANG_admin', "Administrador");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Fantasma");
define('OGP_LANG_sec', "Segundos");
define('OGP_LANG_unknown_rsync_mirror', "Você tentou iniciar um update de um mirror que não existe");
define('OGP_LANG_custom_fields', "Campos Adicionais");
?>
