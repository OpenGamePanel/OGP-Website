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

include('litefm.php');
define('OGP_LANG_curl_needed', "Esta página requer módulo curl PHP.");
define('OGP_LANG_no_access', "Você precisa de direitos de administrador para acessar esta página.");
define('OGP_LANG_dwl_update', "Carregando a atualização ...");
define('OGP_LANG_dwl_complete', "Download completo");
define('OGP_LANG_install_update', "Instalando atualização...");
define('OGP_LANG_update_complete', "Atualização completa");
define('OGP_LANG_ignored_files', "%s arquivo(s) ignorado(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Arquivos não atualizados/instalados (lista negra):<br>%s");
define('OGP_LANG_latest_version', "Última versão");
define('OGP_LANG_panel_version', "Versão do painel");
define('OGP_LANG_update_now', "Atualizar agora");
define('OGP_LANG_the_panel_is_up_to_date', "O Painel está atualizado.");
define('OGP_LANG_files_overwritten', "%s arquivos sobrescritos");
define('OGP_LANG_files_not_overwritten', "%s os arquivos NÃO são substituídos devido a lista negra");
define('OGP_LANG_can_not_update_non_writable_files', "Não é possível atualizar porque os seguintes arquivos / pastas não podem ser gravados");
define('OGP_LANG_dwl_failed', "O link de download não está disponível: \"%s\". <br> Tente novamente mais tarde.");
define('OGP_LANG_temp_folder_not_writable', "O download não pode ser colocado, porque o Apache não possui permissão de gravação na pasta temporária do sistema (%s).");
define('OGP_LANG_base_dir_not_writable', "O Painel não pode atualizar, porque o Apache não possui permissão de gravação na pasta \"%s\".");
define('OGP_LANG_new_files', "%s novos arquivos.");
define('OGP_LANG_updated_files', "Arquivos atualizados:<br>%s");
define('OGP_LANG_select_mirror', "Selecione o espelho");
define('OGP_LANG_view_changes', "Ver alterações");
define('OGP_LANG_updating_modules', "Módulos de atualização");
define('OGP_LANG_updating_finished', "Atualização concluída");
define('OGP_LANG_updated_module', "Módulo atualizado: '%s'.");
define('OGP_LANG_blacklist_files', "Arquivos da lista negra");
define('OGP_LANG_blacklist_files_info', "Todos os arquivos marcados não serão atualizados.");
define('OGP_LANG_save_to_blacklist', "Salvar na lista negra");
define('OGP_LANG_no_new_updates', "Não há novas atualizações");
define('OGP_LANG_module_file_missing', "esta em falta a pasta do arquivo module.php.");
define('OGP_LANG_query_failed', "Falha ao executar a consulta");
define('OGP_LANG_query_failed_2', "para o banco de dados.");
define('OGP_LANG_missing_zip_extension', "A extensão php-zip não está carregada. Por favor, habilite-o para usar o módulo de atualização.");
?>