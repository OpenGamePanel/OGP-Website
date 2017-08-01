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

define('maintenance_mode', "Manutenção");
define('maintenance_mode_info', "Desativa o painel para usuários comuns. Somente administradores terão acesso com essa opção ativada.");
define('maintenance_title', "Título para manutenção");
define('maintenance_title_info', "O título será exibido para os usuários que tentarem acessar o painel durante a manutenção.");
define('maintenance_message', "Mensagem");
define('maintenance_message_info', "A mensagem que é dispayed para usuários normais durante a manutenção.");
define('update_settings', "Salvar alterações");
define('settings_updated', "Configurações atualizadas com sucesso.");
define('panel_language', "Idioma do painel");
define('panel_language_info', "Esta linguagem é a linguagem padrão do painel de usuário pode alterar sua própria língua de sua página de edição de perfil..");
define('page_auto_refresh', "Atualizar páginas automaticamente");
define('page_auto_refresh_info', "Page Auto Refresh configurações é usado principalmente na depuração do painel No uso normal, este deve ser definido como Ligado..");
define('smtp_server', "Servidor de E-Mail de saída");
define('smtp_server_info', "Este é o servidor de correio de saída (servidor SMTP) que é usado, por exemplo, enviou senhas esquecidas para os usuários, localhost por padrão..");
define('panel_email_address', "Endereço de email de saída");
define('panel_email_address_info', "Este é o endereço de e-mail que está no campo de quando as senhas são enviadas para os usuários.");
define('panel_name', "nome Panel");
define('panel_name_info', "Name of the Panel that is shown in the page title. This value will overrule all page titles, if it's not empty.");
define('feed_enable', "Feed Habilitar LGSL");
define('feed_enable_info', "Se o seu webhost tem um firewall bloqueando a porta de consulta que você precisa ativá-lo.");
define('feed_url', "URL do feed");
define('feed_url_info', "GrayCube.com está compartilhando um feed LGSL na URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Codificação de Caracteres");
define('charset_info', "UTF8, ISO, ASCII, etc... Deixe em branco para utilizar codificação ISO");
define('steam_user', "Usuário Steam");
define('steam_user_info', "Um usuário e senha Steam é necessário para efetuar o download de alguns servidores de jogos como o CS:GO.");
define('steam_pass', "Senha do Steam");
define('steam_pass_info', "Aqui você define a senha para a conta Steam.");
define('steam_guard', "Código do Steam Guard");
define('steam_guard_info', "Alguns usuários poussem o Steam Guard ativado para protegerem suas contas de hackers.<br>O código é enviado para o email da conta quando a primeira autenticação no Steam é feita.");
define('smtp_port', "Porta SMTP");
define('smtp_port_info', "Se a porta SMTP não for a padrão (25), insira a porta nesse campo.");
define('smtp_login', "Usuário SMTP");
define('smtp_login_info', "Se o servidor SMTP exigir autenticação, insira o usuário nesse campo.");
define('smtp_passw', "Senha SMTP");
define('smtp_passw_info', "Se você não definir uma senha, a autenticação SMTP será desativada.");
define('smtp_secure', "Segurança SMTP");
define('smtp_secure_info', "Criptografia SSL/TLS para conexões SMTP");
define('time_zone', "Fuso horário");
define('time_zone_info', "Define um fuso horário padrão para todas as funções de hora/data.");
define('query_cache_life', "Query cache life");
define('query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('query_num_servers_stop', "Disable Game Server Queries After");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Editable E-Mail Address");
define('editable_email_info', "Select if users can edit their e-mail address or not.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Available rsync servers");
define('rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Only remote servers ( rsync_sites.list )");
define('only_local_servers', "Only local servers ( rsync_sites_local.list )");
define('header_code', "Header code");
define('header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "The URL of your support site.");
define('recaptcha_site_key', "Recaptcha Site Key");
define('recaptcha_site_key_info', "The site key provided to you by Google.");
define('recaptcha_secret_key', "Recaptcha Secret Key");
define('recaptcha_secret_key_info', "The secret key provided to you by Google.");
define('recaptcha_use_login', "Use Recaptcha on Login");
define('recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('login_attempts_before_banned', "Number of failed login attempts before user is banned");
define('login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('custom_github_update_username', "GitHub update username");
define('custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Check expiration using");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron Job");
define('theme_settings', "Definições de tema");
define('theme', "Tema");
define('theme_info', "Tema selecionado aqui será o tema padrão para todos os usuários Os usuários podem alterar seu tema de sua página do perfil..");
define('welcome_title', "Bem-vindo Título");
define('welcome_title_info', "Permite que o título que é exibido na parte superior do painel.");
define('welcome_title_message', "Bem-vindo a Mensagem de título");
define('welcome_title_message_info', "A mensagem de título que é apresentado na parte superior do painel de instrumentos (html permitido).");
define('logo_link', "Logos Link");
define('logo_link_info', "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>");
define('custom_tab', "Custom Tab");
define('custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('custom_tab_name', "Custom Tab Name");
define('custom_tab_name_info', "The tabs display name.");
define('custom_tab_link', "Custom Tab Link");
define('custom_tab_link_info', "The tabs hyperlink.");
define('custom_tab_sub', "Custom Sub-Tabs");
define('custom_tab_sub_info', "Adds customisable sub-tabs when hovering over the 'Custom Tab'.");
define('custom_tab_sub_name', "Sub-Tab #1 Name");
define('custom_tab_sub_link', "Sub-Tab #1 Link");
define('custom_tab_sub_name2', "Sub-Tab #2 Name");
define('custom_tab_sub_link2', "Sub-Tab #2 Link");
define('custom_tab_sub_name3', "Sub-Tab #3 Name");
define('custom_tab_sub_link3', "Sub-Tab #3 Link");
define('custom_tab_sub_name4', "Sub-Tab #4 Name");
define('custom_tab_sub_link4', "Sub-Tab #4 Link");
define('custom_tab_target_blank', "Custom Tabs Target");
define('custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Opens link on same page. New_Page  =  Opens link on new tab.)</b>");
define('bg_wrapper', "Wrapper Background");
define('bg_wrapper_info', "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on some themes.)</b>");
define('show_server_id_game_monitor', "Show Server IDs on Game Monitor page");
define('show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
?>
