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
define('panel_name_info', "Nome do painel que é mostrado no título da página. Esse valor irá anular todos os títulos das páginas, se não estiver vazio.");
define('feed_enable', "Feed Habilitar LGSL");
define('feed_enable_info', "Se o seu webhost tiver um firewall que esteja bloqueando a porta da consulta, então você precisa abrir a porta manualmente.");
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
define('query_cache_life', "Status da cache de consulta");
define('query_cache_life_info', "Define o tempo limite em segundos antes do status do servidor ser atualizado.");
define('query_num_servers_stop', "Desativar as consultas do servidor de jogos após");
define('query_num_servers_stop_info', "Use esta configuração para desativar consultas se um usuário possui mais servidores de jogos do que esta quantidade especificada para acelerar o carregamento do painel.");
define('editable_email', "Endereço de E-mail editável ");
define('editable_email_info', "Selecione se os usuários podem editar seu endereço de e-mail ou não.");
define('old_dashboard_behavior', "Comportamento antigo do Dashboard");
define('old_dashboard_behavior_info', "O painel antigo estava sendo executado mais devagar, mas mostra mais informações do servidor, jogadores atuais e mapa.");
define('rsync_available', "Servidores rsync disponíveis");
define('rsync_available_info', "Selecione a lista de servidores que será exibida na instalação rsync.");
define('all_available_servers', "Todos os servidores disponíveis ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Somente servidores remotos ( rsync_sites.list )");
define('only_local_servers', "Apenas servidores locais ( rsync_sites_local.list )");
define('header_code', "Código de cabeçalho");
define('header_code_info', "Aqui você pode escrever seu próprio código de cabeçalho (como código HTML, código embutido etc.) sem editar o layout do tema.");
define('support_widget_title', "Título do widget de suporte");
define('support_widget_title_info', "Um título personalizado para o widget de suporte no Dashboard.");
define('support_widget_content', "Conteúdo do widget de suporte");
define('support_widget_content_info', "O conteúdo do widget de suporte, você pode usar o código HTML.");
define('support_widget_link', "Link de widget de suporte");
define('support_widget_link_info', "O URL do seu site de suporte.");
define('recaptcha_site_key', "Recaptcha Site Key");
define('recaptcha_site_key_info', "A chave do site fornecida pelo Google.");
define('recaptcha_secret_key', "Chave Secreta do Recaptcha");
define('recaptcha_secret_key_info', "A chave secreta fornecida pelo Google.");
define('recaptcha_use_login', "Use Recaptcha no Login");
define('recaptcha_use_login_info', "Se ativado, os usuários terão que resolver o Recaptcha não um robô ao tentar fazer o login.");
define('login_attempts_before_banned', "Número de tentativas de login falhadas antes do usuário ser banido");
define('login_attempts_before_banned_info', "Se um usuário tentar iniciar sessão com credenciais inválidas mais do que essas determinadas vezes, o usuário será banido temporariamente pelo painel.");
define('custom_github_update_username', "Nome de usuário da atualização do GitHub");
define('custom_github_update_username_info', "Digite seu nome de usuário GitHub SOMENTE para usar seus próprios repositórios bifurcados para atualizar o painel. Isso só deve ser alterado por desenvolvedores que desejam usar seus próprios repositórios para desenvolvimento em vez de verificar possivelmente o código de algum possivel BUG no código principal.");
define('remote_query', "Consulta remota");
define('remote_query_info', "Use o servidor remoto (agente) para fazer consultas aos servidores do jogo (Only GameQ and LGSL).");
define('check_expiry_by', "Verifique a expiração usando");
define('check_expiry_by_info', "Se configurado para once_logged_in, as atribuições do servidor do jogo do usuário serão excluídas automaticamente após a data de validade. Se configurado para cron_job, você precisará criar uma tarefa cron usando o módulo cron para verificar a data de validade em um intervalo configurado.");
define('once_logged_in', "Uma vez conectado");
define('cron_job', "Cron Job");
define('theme_settings', "Definições de tema");
define('theme', "Tema");
define('theme_info', "Tema selecionado aqui será o tema padrão para todos os usuários Os usuários podem alterar seu tema de sua página do perfil..");
define('welcome_title', "Bem-vindo Título");
define('welcome_title_info', "Permite que o título que é exibido na parte superior do painel.");
define('welcome_title_message', "Bem-vindo a Mensagem de título");
define('welcome_title_message_info', "A mensagem de título que é apresentado na parte superior do painel de instrumentos (html permitido).");
define('logo_link', "Logos Link");
define('logo_link_info', "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Deixá-lo em branco o vinculará ao Dashboard)</b>");
define('custom_tab', "Tab personalizado");
define('custom_tab_info', "Adiciona uma guia personalizável no final do menu. <b style='font-size:10px; font-weight:normal;'>(Aplique e atualize esta página para editar as configurações da aba)</b>");
define('custom_tab_name', "Nome da guia personalizada");
define('custom_tab_name_info', "As guias exibem o nome.");
define('custom_tab_link', "Link de guia personalizado");
define('custom_tab_link_info', "O hiperlink de guias.");
define('custom_tab_sub', "Custom Sub-Tabs");
define('custom_tab_sub_info', "Adiciona sub-guias personalizáveis ​​ao pairar sobre o 'separador personalizado'.");
define('custom_tab_sub_name', "Sub-Tab #1 Nome");
define('custom_tab_sub_link', "Sub-Tab #1 Link");
define('custom_tab_sub_name2', "Sub-Tab #2 Nome");
define('custom_tab_sub_link2', "Sub-Tab #2 Link");
define('custom_tab_sub_name3', "Sub-Tab #3 Nome");
define('custom_tab_sub_link3', "Sub-Tab #3 Link");
define('custom_tab_sub_name4', "Sub-Tab #4 Nome");
define('custom_tab_sub_link4', "Sub-Tab #4 Link");
define('custom_tab_target_blank', "Abas com trajecto personalizado");
define('custom_tab_target_blank_info', "Define todas as abas alvo. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Abre o link na mesma página. New_Page  =  Abre o link na nova guia.)</b>");
define('bg_wrapper', "Fundo Completo");
define('bg_wrapper_info', "A imagem de fundo completo. <b style='font-size:10px; font-weight:normal;'>(Apenas disponível em alguns temas.)</b>");
define('show_server_id_game_monitor', "Mostrar ID do servidor na página do Monitor de jogos");
define('show_server_id_game_monitor_info', "Mostre a coluna do ID do servidor do jogo no Game Monitor para fazer correspondência dos arquivos criados pelo agente no servidor do jogo real");
?>
