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

define('add_mods_note', "Você precisa adicionar mods depois de adicionar qualquer servidor ao usuário. Isso pode ser feito editando o servidor.");
define('game_servers', "Servidores de Jogos");
define('game_path', "Caminho do jogo");
define('game_path_info', "Um caminho absoluto do servidor. Exemplo: /home/panelbot/panel_User_Files/My_Server");
define('game_server_name_info', "O nome de servidor ajuda os usuários a identificar os seus serviços e aplicações.");
define('control_password', "Control password/");
define('control_password_info', "Esta senha é usada para o controle do servidor, como a senha do RCON. Se a senha estiver vazia, outros meios serão usados.");
define('add_game_home', "Adicionar servidor/aplicação");
define('game_path_empty', "O caminho do jogo não pode estar vazio.");
define('game_home_added', "O servidor de jogos foi adicionado com sucesso. Redirecionando para a página de edição doméstica.");
define('failed_to_add_home_to_db', "Falha ao adicionar \"home\"ao banco de dados. Erro: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Atenção!</b> O Agente está offline, não pode obter o tipo de SO e arquitetura,<br> Exibindo servidores para todas as plataformas:");
define('select_remote_server', "Selecione Servidor Remoto");
define('no_remote_servers_configured', "Nenhum servidor remoto configurado para o painel. <br> Você precisa adicionar servidores remotos antes de poder adicionar servidores para usuários.");
define('no_game_configurations_found', "Nenhuma configuração de jogo encontrada. Você precisa adicionar configurações de jogos do");
define('game_configurations', ">página de configuração do jogo");
define('add_remote_server', "Adicione um servidor.");
define('wine_games', "Wine Games");
define('home_path', "Caminho \"Home\"");
define('change_home_info', "A localização do servidor de jogos instalado. Exemplo: /home/painel/my_server/");
define('game_server_name', "Nome do servidor do jogo");
define('change_name_info', "O nome do servidor para ajudar os usuários a identificá-lo.");
define('game_control_password', "Senha de controlo remoto do jogo, mais info. abaixo linha   a)");
define('change_control_password_info', "a).  É uma senha de controle remoto como por exemplo, senha do RCON, sendo uma senha administrativa de gestão/controlo remoto.");
define('available_mods', "Mods disponíveis");
define('note_no_mods', "Sem mod(es) disponíveis para este jogo.");
define('change_home', "Mudar diretorio Home");
define('change_control_password', "Alterar senha de controle");
define('change_name', "Mudar o nome");
define('add_mod', "Adicionar Mod");
define('set_ip', "Definir IP");
define('ips_and_ports', "IP's e portas");
define('mod_name', "Nome do Mod");
define('max_players', "Máximo de jogadores");
define('extra_cmd_line_args', "Linha de comando extra Args");
define('extra_cmd_line_info', "A linha de comando extra args fornece uma maneira de inserir argumentos extras para a linha de comando do jogo quando ele é iniciado.");
define('cpu_affinity', "Afinidade de CPU");
define('nice_level', "Nível agradável");
define('set_options', "Definir opções");
define('remove_mod', "Remover Mod");
define('mods', "Mods");
define('ip', "IP");
define('port', "Porta");
define('no_ip_ports_assigned', "Atenção: Sem quaisquer portas IP atribuídas. Você não pode prosseguir com a configuração sem primeiro atribuir uma porta disponível ao servidor");
define('successfully_assigned_ip_port', "IP atribuído com sucesso: par de portas para Home.");
define('port_range_error', "As portas deve estar entre o intervalo 0 e 65535.");
define('failed_to_assing_mod_to_home', "Falha ao atribuir mod com id %d no diretorio \"home\".");
define('successfully_assigned_mod_to_home', "Modificação atribuída com sucesso com id %d  para home.");
define('successfully_modified_mod', "Informações de mod modificadas com êxito.");
define('back_to_game_monitor', "De volta para Game Monitor");
define('back_to_game_servers', "De volta para Game Servers");
define('user_id_main', "Proprietário principal");
define('change_user_id_main', "Alterar o proprietário principal");
define('change_user_id_main_info', "O proprietário principal do servidor.");
define('server_ftp_password', "Senha de FTP");
define('change_ftp_password', "Alterar senha de FTP");
define('change_ftp_password_info', "Esta é a senha para acessar o servidor FTP para este servidor de jogo.");
define('Delete_old_user_assigned_homes', "Não atribuir servidor do jogo é que os usuários atuais.");
define('editing_home_called', "Editar chamada de \"home\"");
define('control_password_updated_successfully', "Controle a senha atualizada com sucesso.");
define('control_password_update_failed', "Falha na atualização da senha de controle");
define('successfully_changed_game_server', "Mudado com sucesso o jogo de servidor.");
define('error_ocurred_on_remote_server', "Ocorreu um erro no servidor remoto.");
define('ftp_password_can_not_be_changed', "A senha do FTP não pode ser alterada.");
define('ftp_can_not_be_switched_on', "O FTP não pode ser ligado.");
define('ftp_can_not_be_switched_off', "O FTP não pode ser desligado.");
define('invalid_home_id_entered', "ID de home introduzido de forma invalida.");
define('ip_port_already_in_use', "O %s:%s já está em uso. Por favor escolha outro.");
define('successfully_assigned_ip_port_to_server_id', "Atribuído com sucesso %s:%s para \"home\" com identificação %s.");
define('no_ip_addresses_configured', "O servidor do seu jogo não tem nenhum endereço IP configurado para ele. Você pode configurá-los a partir de");
define('server_page', "Página do servidor");
define('successfully_removed_mod', "Mod de jogo removido com sucesso.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Aviso - Agente offline, a contagem de CPU padrão para 1.");
define('mod_install_cmds', "Mod Install CMDs");
define('cmds_for', "Comandos para");
define('preinstall_cmds', "Preinstall Commands");
define('postinstall_cmds', "Postinstall Commands");
define('edit_preinstall_cmds', "Editar Preinstall Commands");
define('edit_postinstall_cmds', "Editar Postinstall Commands");
define('save_as_default_for_this_mod', "Salvar como padrão para este mod");
define('empty', "vazio");
define('master_server_for_clon_update', "Master server para atualização local");
define('set_as_master_server', "Definir como servidor Master Server");
define('set_as_master_server_for_local_clon_update', "Defina como Master Server para atualização local.");
define('only_available_for', "Apenas disponível para '%s' hospedado no servidor remoto chamado '%s'.");
define('ftp_on', "Habilitar FTP");
define('ftp_off', "Desativar FTP");
define('change_ftp_account_status', "Alterar o status da conta FTP");
define('change_ftp_account_status_info', "Uma vez que uma conta de FTP está habilitada ou desativada, ela é adicionada ou removida do banco de dados do FTP.");
define('server_ftp_login', "Login do FTP do servidor");
define('change_ftp_login_info', "Altere o login de FTP com um FTP personalizado.");
define('change_ftp_login', "Alterar o login do FTP");
define('ftp_login_can_not_be_changed', "Não é possível alterar o login do FTP.");
define('server_is_running_change_addresses_not_available', "O servidor está realmente em execução, o IP não pode ser alterado.");
define('change_game_type', "Alterar Tipo de Jogo");
define('change_game_type_info', "Ao alterar o tipo de jogo, a configuração atual dos mods será excluída.");
define('force_mod_on_this_address', "Forçar mod neste endereço");
define('successfully_assigned_mod_to_address', "Mod atribuido com sucesso para o endereço");
define('switch_mods', "Alternar mods");
define('switch_mod_for_address', "Alternar mod para o endereço %s");
define('invalid_path', "Caminho inválido");
define('add_new_game_home', "Adicionar novo servidor de jogo");
define('no_game_homes_found', "Nenhum servidor de jogos encontrado");
define('available_game_homes', "Servidores de jogos disponíveis");
define('home_id', "Home ID");
define('game_server', "Game Server");
define('game_type', "Tipo de jogo");
define('game_home', "Caminho Raiz");
define('game_home_name', "Nome do Servidor do Jogo");
define('clone', "Clonar");
define('unassign', "Desatribuir");
define('access_rights', "Direitos de acesso");
define('assigned_homes', "Locais atualmente atribuídos");
define('assign', "Atribuir");
define('allow_updates', "Permitir atualizações de jogos");
define('allow_updates_info', "Permite ao usuário atualizar a instalação do jogo se for possível.");
define('allow_file_management', "Permitir a gestão de arquivos");
define('allow_file_management_info', "Permite ao usuário acessar o servidor do jogo com módulos de gerenciamento de arquivos.");
define('allow_parameter_usage', "Permitir o uso de parâmetros");
define('allow_parameter_usage_info', "Permite que o usuário altere os parâmetros da linha de comando disponíveis.");
define('allow_extra_params', "Permitir parametros extras");
define('allow_extra_params_info', "Permite ao usuário modificar parâmetros de linha de comando adicionais.");
define('allow_ftp', "Permitir FTP");
define('allow_ftp_info', "Mostre as informações de acesso FTP ao usuário.");
define('allow_custom_fields', "Permitir campos personalizados");
define('allow_custom_fields_info', "Permite ao usuário acessar campos personalizados do servidor do jogo, se houver.");
define('select_home', "Selecione Home para atribuir");
define('assign_new_home_to_user', "Atribuir novo diretório ao usuário %s");
define('assign_new_home_to_group', "Atribuir novo diretório ao grupo %s");
define('assigned_home_to_user', "Foi atribuido com sucesso um diretório (ID: %d) ao usuário %s.");
define('failed_to_assign_home_to_user', "Ocorreu uma falha ao atribuir o directório raiz (ID: %d) ao usuário %s.");
define('assigned_home_to_group', "Foi atribuido com sucesso um diretório (ID: %d) ao grupo %s.");
define('unassigned_home_from_user', "Foi retirado com sucesso um diretório (ID: %d) ao usuário %s.");
define('unassigned_home_from_group', "Foi retirado com sucesso um diretório (ID: %d) ao grupo %s.");
define('no_homes_assigned_to_user', "Nenhum diretório atrubuído ao usuário %s.");
define('no_homes_assigned_to_group', "Nenhum diretório atrubuído ao grupo %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "Não existem mais directórios disponíveis que possam ser atribuídos a este usuário");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "Não existem mais directórios disponíveis que possam ser atribuídos a este grupo");
define('you_can_add_a_new_game_server_from', "Você pode adicionar um novo servidor de jogos a partir de %s.");
define('no_remote_servers_available_please_add_at_least_one', "Não há servidores remotos disponíveis, por favor, adicione pelo menos um!");
define('cloning_of_home_failed', "Colonagem do diretório com o id '%s' falhou.");
define('no_mods_to_clone', "Ainda não há mod(s) habilitados para este jogo. Nenhum será clonado.");
define('failed_to_add_mod', "Falha ao adicionar mod com id '%s' para o diretório com id '%s'.");
define('failed_to_update_mod_settings', "Falha ao atualizar as configurações do mod para o diretório com id '%s'.");
define('successfully_cloned_mods', "Mods clonados com sucesso para o diretório com o id '%s'.");
define('successfully_copied_home_database', "Banco de dados do diretório copiado com sucesso.");
define('copying_home_remotely', "Copiando o diretório em um server remoto a partir de '%s' para '%s'.");
define('cloning_home', "Clonagem do diretório camado '%s'");
define('current_home_path', "Caminho do diretório atual");
define('current_home_path_info', "A localização atual do diretório copiado no servidor remoto.");
define('clone_home', "Clonar o directório");
define('new_home_name', "Novo nome do diretório");
define('new_home_path', "Novo caminho para o directório raiz");
define('agent_ip', "IP do Agent");
define('game_server_copy_is_running', "A cópia do servidor do jogo está sendo executada ...");
define('game_server_copy_was_successful', "A cópia do servidor do jogo foi bem sucedida");
define('game_server_copy_failed_with_return_code', "A cópia do servidor de jogos falhou com o código de retorno %s");
define('clone_mods', "Clonar Mods");
define('game_server_owner', "Proprietário do servidor de jogo");
define('the_name_of_the_server_to_help_users_to_identify_it', "O nome do servidor para ajudar os usuários a identificá-lo.");
define('ips_and_ports_used_in_this_home', "IPs e Portas utilizados neste diretório");
define('note_ips_and_ports_are_not_cloned', "Nota: IPs e portas não estão clonados");
define('mods_and_settings_for_this_game_server', "Os mods e as configurações para este servidor do jogo/app");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Tem certeza de que deseja excluir o servidor do jogo (ID: %s) do servidor %s e está no diretório %s");
define('yes_and_delete_the_files', "Sim e Excluir os arquivos");
define('failed_to_remove_gamehome_from_database', "Falha ao remover o directório raiz do banco de dados.");
define('successfully_deleted_game_server_with_id', "Servidor de jogo excluído com sucesso com o ID %s.");
define('failed_to_remove_ftp_account_from_remote_server', "Falha ao remover a conta FTP do servidor remoto.");
define('remove_it_anyway', "Gostaria de removê-lo de qualquer maneira?");
define('sucessfully_deleted', "Excluido com sucesso %s");
define('the_agent_had_a_problem_deleting', "O Agente do painel detectou um problema ao excluir %s. Por favor, verifique os Logs de registo do Agente.");
define('connection_timeout_or_problems_reaching_the_agent', "Tempo limite de conexão ou problemas com o alcance do agente");
define('does_not_exist_yet', "Ainda não existe.");
define('go_to_custom_fields', "Ir para campos personalizados");
define('back_to_edit_server', "Voltar ao servidor de edição");
define('update_settings', "Atualizar configurações");
define('settings_updated', "Configurações atualizadas.");
define('selected_path_already_in_use', "O caminho selecionado já está em uso.");
define('browse', "Procurar");
define('cancel', "Cancelar");
define('set_this_path', "Defina este caminho");
define('select_home_path', "Selecione o caminho do diretório raiz");
define('folder', "Pasta");
define('owner', "Proprietário");
define('group', "Grupo");
define('level_up', "Subir de nível");
define('level_up_info', "Volte para a pasta anterior.");
define('add_folder', "Adicionar pasta");
define('add_folder_info', "Escreva o nome da nova pasta e clique no ícone.");
define('valid_user', "Por favor, especifique um usuário válido.");
define('valid_group', "Por favor, especifique um grupo válido.");
define('set_affinity', "Definir afinidade do servidor");
define('cpu_affinity_info', "Seleccione o(s) núcleos do CPU que deseja atribuir ao servidor do jogo/app.");
define('expiration_date_changed', "A data de validade para o directório seleccionado foi alterada.");
define('expiration_date_could_not_be_changed', "A data de validade para o directório seleccionado não pôde ser alterado.");
define('search', "Pesquisar");
define('ftp_account_username_too_long', "O nome do usuário FTP é demasiado longo. Experimente um nome de usuário mais curto que não contenha mais de 20 caracteres.");
define('ftp_account_password_too_long', "O nome do usuário FTP é demasiado longo. Experimente um nome de usuário mais curto que não contenha mais de 20 caracteres.");
?>
