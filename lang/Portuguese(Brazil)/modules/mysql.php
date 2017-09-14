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

define('configured_mysql_hosts', "Anfitrião MySQL configurado");
define('add_new_mysql_host', "Adicionar host MySQL");
define('enter_mysql_ip', "Digite o MySQL IP.");
define('enter_valid_port', "Digite uma porta válida.");
define('enter_mysql_root_password', "Digite a senha de root do MySQL.");
define('enter_mysql_name', "Digite o nome do MySQL.");
define('could_not_add_mysql_server', "Não foi possível adicionar o servidor MySQL.");
define('game_server_name_info', "O nome do servidor ajuda os usuários a identificar seus servidores.");
define('note_mysql_host', "Nota: Usando uma \"conexão direta\", o servidor deve aceitar conexões externas para que os servidores possam se conectar remotamente, enquanto a conexão através de um servidor remoto será usada apenas como uma conexão local.");
define('direct_connection', "Conexão direta");
define('connection_through_remote_server_named', "Conexão através do servidor remoto chamado %s");
define('add_mysql_server', "Adicionar servidor MySQL");
define('mysql_online', "MySQL online");
define('mysql_offline', "MySQL offline");
define('encryption_key_mismatch', "Falha na chave de criptografia");
define('unknown_error', "Erro desconhecido");
define('remove', "Exclui");
define('assign_db', "Atribuir banco de dados");
define('mysql_server_name', "Nome do servidor MySQL");
define('server_status', "Status do servidor");
define('mysql_ip_port', "IP MySQL: porta");
define('mysql_root_passwd', "Senha de root MySQL");
define('connection_method', "Método de conexão");
define('user_privilegies', "Privilégios de usuário");
define('current_dbs', "Bases de dados actuais ");
define('mysql_name', "Nome do servidor MySQL");
define('mysql_ip', "IP do MySQL");
define('mysql_port', "Porta MySQL");
define('privilegies', "privilégios");
define('all', "Todos");
define('custom', "Personalizado");
define('server_added', "Servidor adicionado.");
define('sql_alter', "ALTERAR");
define('sql_create', "CRIAR");
define('sql_create_temporary_tables', "CRIE TABELAS TEMPORÁRIAS");
define('sql_drop', "SOLTAR");
define('sql_index', "ÍNDICE");
define('sql_insert', "INSERIR");
define('sql_lock_tables', "TRANCAR TABELAS");
define('sql_select', "SELECIONAR");
define('sql_grant_option', "CONCEDER OPÇÃO");
define('sql_update', "ATUALIZAR");
define('sql_delete', "APAGAR");
define('sql_alter_info', "<b>Permite o uso de ALTERAR TABELA.</b>");	
define('sql_create_info', "<b>Permite o uso de CRIAR TABELA.</b>");	
define('sql_create_temporary_tables_info', "<b>Permite o uso de CRIAR TEMPORARIAMENTE UMA TABELA.</b>");
define('sql_delete_info', "<b>Permite o uso de APAGAR.</b>");
define('sql_drop_info', "<b>Permite o uso de SOLTAR TABELA.</b>");	
define('sql_index_info', "<b>Permite o uso de CRIAR INDÍCE e SOLTAR INDÍCE.</b>");	
define('sql_insert_info', "<b>Permite o uso de INSERIR.</b>");	
define('sql_lock_tables_info', "<b>Permite o uso de TRANCAR TABELAS em tabelas para as quais você tem o privilégio SELECIONAR.</b>");	
define('sql_select_info', "<b>Permite o uso de SELECIONAR.</b>");
define('sql_update_info', "<b>Permite o uso de ATUALIZAR.</b>");	
define('sql_grant_option_info', "<b>Permite que os privilégios sejam concedidos.</b>");
define('select_game_server', "Selecione o servidor do jogo");
define('invalid_mysql_server_id', "ID inválido do servidor MySQL.");
define('there_is_another_db_named_or_user_named', "Existe outro banco de dados chamado  <b>%s</b> ou outro usuário chamado <b>%s</b>.");
define('db_added_for_home_id', "Adicionado banco de dados para identificação do directorio <b>%s</b>.");
define('could_not_remove_db', "O banco de dados selecionado não pôde ser removido.");
define('db_removed_successfully_from_mysql_server_named', "O banco de dados foi removido do servidor %s.");
define('areyousure_remove_mysql_server', "Tem certeza de que deseja remover o servidor MySQL chamado <b>%s</b>?");
define('db_changed_successfully', "O banco de dados chamado %s foi alterado com sucesso.");
define('error_while_remove', "Erro ao remover.");
define('mysql_server_removed', "O servidor MySQL chamado <b>%s</ b> foi removido com sucesso.");
define('unable_to_set_changes_to', "Não foi possível configurar as alterações no servidor MySQL chamado <b>%s</b>.");
define('mysql_server_settings_changed', "O servidor MySQL chamado <b>%s</ b> foi alterado com sucesso.");
define('editing_mysql_server', "Editar o servidor MySQL chamado <b>%s</b>.");
define('save_settings', "Guardar defenições");
define('mysql_dbs_for', "Bancos de dados para o servidor %s");
define('edit_dbs', "Editar bancos de dados");
define('edit_db_settings', "Editar configurações do banco de dados");
define('remove_db', "Remover banco de dados");
define('save_db_changes', "Salve as alterações no banco de dados.");
define('add_db', "Adicionar banco de dados");
define('select_db', "Selecione o banco de dados");
define('db_user', "Usuário DB");
define('db_passwd', "Senha de banco de dados");
define('db_name', "Nome do banco de dados");
define('enabled', "Ativado");
define('game_server', "Servidor do jogo");
define('there_are_no_databases_assigned_for', "Não há bases de dados atribuídas para <b>%s</b>.");
define('unable_to_connect_to_mysql_server_as', "Não foi possível conectar-se ao servidor MySQL como %s.");
define('unable_to_create_db', "Não é possível criar banco de dados.");
define('unable_to_select_db', "Não foi possível selecionar o banco de dados %s.");
define('db_info', "Informações sobre o banco de dados");
define('db_tables', "Tabelas de banco de dados");
define('db_backup', "Backup de banco de dados");
define('download_db_backup', "Fazer Download do backup de banco de dados");
define('restore_db_backup', "Restaurar backup de banco de dados");
define('sql_file', "arquivo(.sql)");
?>