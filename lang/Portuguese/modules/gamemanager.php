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

define('game_manager', "Gestão do Servidor");
define('no_games_to_monitor', "Você não possui nenhum jogo configurado que possa ser exibido.");
define('status', "Estado");
define('fail_no_mods', "Não há mods habilitados para este jogo! Você precisa pedir ao seu administrador do painel para adicionar mod(s) ao jogo que lhe foi atribuído.");
define('no_game_homes_assigned', "Não há servidores de jogos associados a sua conta. Entre em contato com um administrador para que ele possa adicionar um para você.");
define('select_game_home_to_configure', "Escolha um servidor que deseja configurar");
define('file_manager', "Gestor de Arquivos");
define('configure_mods', "Configurar mods");
define('install_update_steam', "Instalar/Atualizar através do Steam");
define('install_update_manual', "Instalar/Atualizar manualmente");
define('assign_game_homes', "Associar servidores");
define('user', "Usuário");
define('group', "Grupo");
define('start', "Iniciar");
define('ogp_agent_ip', "IP do Server Agent");
define('max_players', "Máx. Jogadores");
define('max', "Máx.");
define('ip_and_port', "IP e Porta");
define('available_maps', "Mapas Disponíveis");
define('map_path', "Pasta de Mapas");
define('available_parameters', "Parâmetros Disponíveis");
define('start_server', "Iniciar Servidor");
define('start_wait_note', "A inicialização do servidor pode levar uns breves instantes. Por Favor não faça REFRESH a pagina, não feche a pagina ou encerre o navegador. O próprio PAINEL fará tudo isso por si... Apenas tenha um pouco de paciência se demorar alguns segundos.");
define('game_type', "Tipo de Jogo");
define('map', "Mapa");
define('starting_server', "A iniciar o servidor, por favor aguarde uns instantes...");
define('starting_server_settings', "A iniciar o servidor com as seguintes configurações");
define('startup_params', "Parâmetros de inicialização");
define('startup_cpu', "CPU em que o servidor está em execução");
define('startup_nice', "Defina a prioridade do server");
define('game_home', "Caminho raiz");
define('server_started', "Servidor iniciado com sucesso.");
define('no_parameter_access', "Você não tem acesso aos parâmetros");
define('extra_parameters', "Parâmetros Adicionais");
define('no_extra_param_access', "Você não tem acesso aos parâmetros adicionais");
define('extra_parameters_info', "Esses parâmetros serão adicionados no final da linha de comando quando o servidor for iniciado.");
define('game_exec_not_found', "O servidor executado %s não foi encontrado no servidor remoto.");
define('select_params_and_start', "Selecione os parâmetros de inicialização para o servidor e clique em '%s'.");
define('no_ip_port_pairs_assigned', "Não há um IP e porta associados para este directório. Se você não tem acesso a edição do mesmo, entre em contacto com um administrador.");
define('unable_to_get_log', "Falha ao obter resposta do log, status %s.");
define('server_binary_not_executable', "O executável do servidor não tem permissões de execução. Verifique as permissões de arquivo na pasta do servidor.");
define('server_not_running_log_found', "O servidor não está em execução, mas um registo de log foi encontrado. NOTA: Esse registo pode não ser relacionado à ultima vez que o servidor foi iniciado.");
define('ip_port_pair_not_owned', "IP:PORT não é dono deste par.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "O valor maxplayers não não se encontra adequado, o número máximo de slots alcançado foi definido.");
define('server_running_not_responding', "O servidor está em execução mas não está a responder, <br>pode possivelmente haver algum tipo de problema e talvez você queira");
define('update_started', "Actualização iniciada, por favor aguarde...");
define('failed_to_start_steam_update', "Falha ao iniciar a actualização via Steam. Verifique o log do agente para  averiguar com mais detalhes.");
define('failed_to_start_rsync_update', "Falha ao iniciar o Rsync. Verifique o log do agente para mais detalhes.");
define('update_completed', "Atualização concluída com sucesso.");
define('update_in_progress', "Atualização em andamento, por favor aguarde...");
define('refresh_steam_status', "Actualize o status da Steam");
define('refresh_rsync_status', "Actualize o status rsync");
define('server_running_cant_update', "Servidor em execução, não é possível actualizá-lo. Por favor,  encerre-o primeiro antes de qualquer actualização.");
define('xml_steam_error', "O tipo de servidor seleccionado não suporta actualizações via Steam.");
define('mod_key_not_found_from_xml', "Tecla Mod '%s' não encontrado a partir do arquivo XML");
define('stop_update', "Pare de actualizar");
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
define('no_rights_to_stop_server', "Você não tem permissões para parar este servidor.");
define('no_ogp_lgsl_support', "Este servidor (em execução: %s) não tem suporte LGSL no painel e as suas estatísticas não podem ser exibidas.");
define('server_status', "Servidor em %s é %s.");
define('server_stopped', "O servidor '%s' foi encerrado.");
define('if_want_to_start_homes', "Se você quer iniciar os servidores vá para %s.");
define('view_log', "Verificação de Logs");
define('if_want_manage', "Se você deseja fazer a gestão dos seus jogos você pode fazê-lo na");
define('columns', "colunas");
define('group_users', "Usuários do grupo:");
define('assigned_to', "Associado a:");
define('restart_server', "Reiniciar Servidor");
define('restarting_server', "A reiniciar servidor, por favor aguarde...");
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
define('error_server_already_running', "ERRO: Já existe um servidor nesta mesma porta");
define('failed_start_server_code', "Falha ao iniciar servidor remoto. Código de erro: %s");
define('disabled', "desactivado ");
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
define('follow_server_status', "Você pode seguir o status do servidor de");
define('addons', "Addons");
define('hostname', "Nome de anfitrião");
define('rsync_install', "[Instalar Rsync]");
define('ping', "Ping");
define('team', "Equipa");
define('deaths', "Mortes");
define('pid', "PID");
define('skill', "Habilidade");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "Jogador");
define('port', "Porta");
define('rcon_presets', "Predefinições RCON");
define('update_from_local_master_server', "Atualização do servidor Master Server");
define('update_from_selected_rsync_server', "Atualização do servidor Rsync selecionado");
define('execute_selected_server_operations', "Execute as operações selecionadas do servidor ");
define('execute_operations', "Execute operações");
define('account_expiration', "Vencimento da conta");
define('mysql_databases', "Bases de dados MySQL");
define('failed_querying_server', "* Falha ao consultar o servidor");
define('query_protocol_not_supported', "* Não há protocolo de consulta no painel que possa ser suportado neste servidor.");
define('queries_disabled_by_setting_disable_queries_after', "Consultas desativadas por configuração: Desativar consultas após: %s, desde que você tem %s servidores.<br>");
define('presets_for_game_and_mod', "Predefinições RCON para %s e mod %s");
define('name', "Nome");
define('command', "RCON&nbsp;Comando");
define('add_preset', "Adicionar predefinido");
define('edit_presets', "Editar predefinições");
define('del_preset', "Apagar");
define('change_preset', "Mudar");
define('send_command', "Enviar comando");
define('starting_copy_with_master_server_named', "Iniciando a cópia com o Master Server chamado '%s'...");
define('starting_sync_with', "Iniciar sincronização com %s...");
define('refresh_interval', "Intervalo de atualização do log");
define('finished_manual_update', "Atualização manual concluída.");
define('failed_to_start_file_download', "Falha ao iniciar o download de arquivos");
define('game_name', "Nome do jogo");
define('dest_dir', "Diretório de destino");
define('remote_server', "Servidor remoto");
define('file_url', "URL do arquivo");
define('file_url_info', "O URL do arquivo foi carregado e descompactado para o diretório.");
define('dest_filename', "Nome do Destino");
define('dest_filename_info', "O nome do arquivo para o destino de arquivo.");
define('update_server', "Atualizar servidor");
define('unavailable', "Indisponível");
define('upload_map_image', "Carregar imagem do mapa");
define('upload_image', "Enviar Imagem");
define('jpg_gif_png_less_than_1mb', "A imagem deve ser jpg, gif ou png e tamanho inferior a 1 MB.");
define('check_dev_console', "Erro durante o upload do arquivo, verifique o console do desenvolvedor no navegador.");
define('uploaded_successfully', "Carregado com sucesso.");
define('cant_create_folder', "Não foi possível criar a pasta:<br><b>%s</b>");
define('cant_write_file', "Não foi possível gravar o arquivo:<br><b>%s</b>");
define('exceeded_php_directive', "Excedeu a diretriz PHP.<br><b>%s</b>.");
define('unknown_errors', "Erros desconhecidos.");
define('directory', "Diretório");
define('view_player_commands', "Ver comandos do jogador");
define('hide_player_commands', "Ocultar Comandos do Jogador");
define('no_online_players', "Não há jogadores online.");
define('invalid_game_mod_id', "ID invalido de Jogo/Mod especificado.");
define('auto_update_title_popup', "STEAM - atualização automática de Link");
define('auto_update_popup_html', "<p>Use o link abaixo para verificar e atualizar automaticamente seu servidor de jogos via Steam, se necessário.&nbsp; Você pode consultá-lo usando um cronjob ou iniciar manualmente o processo.</p>");
define('auto_update_copy_me', "Copia");
define('auto_update_copy_me_success', "Copiado!");
define('auto_update_copy_me_fail', "Falha ao copiar. Por favor, copie manualmente o link.");
define('get_steam_autoupdate_api_link', "Link de atualização automática");
define('update_attempt_from_nonmaster_server', "Usuario %s tentou atualizar home_id %d De um servidor Non-Master. (Home ID: %d)");
define('attempting_nonmaster_update', "Você está tentando atualizar este servidor a partir de um servidor Non-Master.");
define('cannot_update_from_own_self', "A atualização do servidor local pode não ser executada em um Master Server");
define('show_server_id', "Mostrar IDs do servidor");
define('hide_server_id', "Ocultar IDs de servidor");
define('edit_configuration_files', "Editar arquivos de configuração");
define('admin', "Administrador");
define('cid', "CID");
define('phan', "Fantasma");
define('sec', "Segundos");
?>