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

include('litefm.php');
define('curl_needed', "Esta página requer módulo curl PHP.");
define('no_access', "Você precisa de direitos de administrador para acessar esta página.");
define('dwl_update', "Carregando a atualização ...");
define('dwl_complete', "Download completo");
define('install_update', "Instalando atualização...");
define('update_complete', "Atualização completa");
define('ignored_files', "%s arquivos ignorados.");
define('not_updated_files_blacklisted', "Arquivos não atualizados/instalados (lista negra):<br>%s");
define('latest_version', "Última versão");
define('panel_version', "Versão do painel");
define('update_now', "Atualizar agora");
define('the_panel_is_up_to_date', "O Painel está atualizado.");
define('files_overwritten', "%s arquivos sobrescritos");
define('files_not_overwritten', "%s os arquivos NÃO são substituídos devido a lista negra");
define('can_not_update_non_writable_files', "Não é possível atualizar porque os seguintes arquivos / pastas não podem ser gravados");
define('dwl_failed', "O link de download não está disponível: \"%s\". <br> Tente novamente mais tarde.");
define('temp_folder_not_writable', "O download não pode ser colocado, porque o Apache não possui permissão de gravação na pasta temporária do sistema (%s).");
define('base_dir_not_writable', "O Painel não pode atualizar, porque o Apache não possui permissão de gravação na pasta \"%s\".");
define('new_files', "%s novos arquivos.");
define('updated_files', "Arquivos atualizados:<br>%s");
define('select_mirror', "Selecione o espelho");
define('view_changes', "Ver alterações");
define('updating_modules', "Módulos de atualização");
define('updating_finished', "Atualização concluída");
define('updated_module', "Módulo atualizado: '%s'.");
define('blacklist_files', "Arquivos da lista negra");
define('blacklist_files_info', "Todos os arquivos marcados não serão atualizados.");
define('save_to_blacklist', "Salvar na lista negra");
define('no_new_updates', "Não há novas atualizações");
define('module_file_missing', "esta em falta a pasta do arquivo module.php.");
define('query_failed', "Falha ao executar a consulta");
define('query_failed_2', "para o banco de dados.");
define('missing_zip_extension', "A extensão php-zip não está carregada. Por favor, habilite-o para usar o módulo de atualização.");
?>
