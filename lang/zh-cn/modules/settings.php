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

define('OGP_LANG_maintenance_mode', "维护模式");
define('OGP_LANG_maintenance_mode_info', "禁用面板对普通用户。只有管理员在维护期间可以访问。");
define('OGP_LANG_maintenance_title', "维护标题");
define('OGP_LANG_maintenance_title_info', "维护期间显示给普通用户的标题。");
define('OGP_LANG_maintenance_message', "维护信息");
define('OGP_LANG_maintenance_message_info', "维护期间显示给普通用户的信息。");
define('OGP_LANG_update_settings', "更新设置");
define('OGP_LANG_settings_updated', "设置成功更新。");
define('OGP_LANG_panel_language', "面板语言");
define('OGP_LANG_panel_language_info', "该语言是面板的默认语言。用户可以从他们的个人资料编辑页面更改自己的语言。");
define('OGP_LANG_page_auto_refresh', "页面自动刷新");
define('OGP_LANG_page_auto_refresh_info', "页面自动刷新设置主要用于面板调试。正常使用时应设置为开。");
define('OGP_LANG_smtp_server', "外发电子邮件服务器");
define('OGP_LANG_smtp_server_info', "这是用于发送邮件的外发邮件服务器（SMTP服务器），例如，用于向用户发送忘记的密码，默认为localhost。");
define('OGP_LANG_panel_email_address', "外发电子邮件地址");
define('OGP_LANG_panel_email_address_info', "发送密码给用户时，邮件中的发件人地址。");
define('OGP_LANG_panel_name', "面板名称");
define('OGP_LANG_panel_name_info', "显示在页面标题中的面板名称。如果不为空，此值将覆盖所有页面标题。");
define('OGP_LANG_feed_enable', "启用LGSL Feed");
define('OGP_LANG_feed_enable_info', "如果您的网络主机有防火墙阻止查询端口，则需要手动打开端口。");
define('OGP_LANG_feed_url', "Feed网址");
define('OGP_LANG_feed_url_info', "GrayCube.com在以下URL共享LGSL feed：<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Steam 用户");
define('OGP_LANG_steam_user_info', "下载一些新游戏如CS:GO时需要登录steam的用户。");
define('OGP_LANG_steam_pass', "Steam 密码");
define('OGP_LANG_steam_pass_info', "在这里设置steam账户密码。");
define('OGP_LANG_steam_guard', "Steam 保护");
define('OGP_LANG_steam_guard_info', "一些用户激活了steam保护来保护他们的账户不被黑客攻击，<br>当第一次启动steam更新时，此代码会发送到账户的电子邮件。");
define('OGP_LANG_smtp_port', "SMTP 端口");
define('OGP_LANG_smtp_port_info', "如果SMTP端口不是默认端口（25），在这里输入SMTP端口。");
define('OGP_LANG_smtp_login', "SMTP 用户");
define('OGP_LANG_smtp_login_info', "如果您的SMTP服务器需要认证，请在这里输入您的用户名。");
define('OGP_LANG_smtp_passw', "SMTP 密码");
define('OGP_LANG_smtp_passw_info', "如果您不设置密码，则SMTP认证将被禁用。");
define('OGP_LANG_smtp_secure', "SMTP 安全");
define('OGP_LANG_smtp_secure_info', "使用SSL/TLS连接到SMTP服务器");
define('OGP_LANG_time_zone', "时区");
define('OGP_LANG_time_zone_info', "设置所有日期/时间函数使用的默认时区。");
define('OGP_LANG_query_cache_life', "查询缓存寿命");
define('OGP_LANG_query_cache_life_info', "设置服务器状态刷新前的超时秒数。");
define('OGP_LANG_query_num_servers_stop', "禁用游戏服务器查询后");
define('OGP_LANG_query_num_servers_stop_info', "使用此设置在用户拥有的游戏服务器数量超过此指定数量时禁用查询，以加快面板加载。");
define('OGP_LANG_editable_email', "可编辑电子邮件地址");
define('OGP_LANG_editable_email_info', "选择用户是否可以编辑他们的电子邮件地址。");
define('OGP_LANG_old_dashboard_behavior', "旧仪表板行为");
define('OGP_LANG_old_dashboard_behavior_info', "旧仪表板运行较慢，但显示更多服务器信息（例如当前玩家和地图）。");
define('OGP_LANG_rsync_available', "可用的Rsync服务器");
define('OGP_LANG_rsync_available_info', "选择将在rsync安装中显示哪些服务器列表。");
define('OGP_LANG_all_available_servers', "所有可用服务器 ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "仅远程服务器 ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "仅本地服务器 ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "头部代码");
define('OGP_LANG_header_code_info', "在这里你可以编写自己的头部代码（如HTML代码、嵌入代码等），无需编辑主题布局。");
define('OGP_LANG_support_widget_title', "支持小部件标题");
define('OGP_LANG_support_widget_title_info', "仪表板中支持小部件的自定义标题。");
define('OGP_LANG_support_widget_content', "支持小部件内容");
define('OGP_LANG_support_widget_content_info', "支持小部件的内容（允许HTML代码）。");
define('OGP_LANG_support_widget_link', "支持小部件链接");
define('OGP_LANG_support_widget_link_info', "您的支持站点的URL。");
define('OGP_LANG_recaptcha_site_key', "Recaptcha 站点密钥");
define('OGP_LANG_recaptcha_site_key_info', "Google提供给您的站点密钥。");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha 秘密密钥");
define('OGP_LANG_recaptcha_secret_key_info', "Google提供给您的秘密密钥。");
define('OGP_LANG_recaptcha_use_login', "登录时使用Recaptcha");
define('OGP_LANG_recaptcha_use_login_info', "如果启用，用户尝试登录时将必须解决Not a Robot Recaptcha。");
define('OGP_LANG_login_attempts_before_banned', "用户被禁止前的失败登录尝试次数");
define('OGP_LANG_login_attempts_before_banned_info', "如果用户尝试使用无效凭据登录超过这么多次，用户将被面板暂时禁止。");
define('OGP_LANG_custom_github_update_username', "GitHub更新用户名");
define('OGP_LANG_custom_github_update_username_info', "仅输入您的GitHub用户名以使用您自己的forked仓库更新OGP。这应该只由希望使用自己的仓库进行开发而不是将可能有bug的代码检入主分支的开发者更改。");
define('OGP_LANG_custom_github_update_branch_name', "GitHub分支名称");
define('OGP_LANG_custom_github_update_branch_name_info', "输入您希望用于更新OGP的分支名称。这应该只由希望使用自己的仓库进行开发而不是将可能有bug的代码检入主分支的开发者更改。&nbsp; 将此字段留空默认为“master”");
define('OGP_LANG_remote_query', "远程查询");
define('OGP_LANG_remote_query_info', "使用远程服务器（代理）对游戏服务器进行查询（仅GameQ和LGSL）。");
define('OGP_LANG_check_expiry_by', "检查过期使用");
define('OGP_LANG_check_expiry_by_info', "如果设置为once_logged_in，如果过了到期日期，用户的游戏服务器分配将自动删除。如果设置为cron_job，您需要使用cron模块创建一个cron任务，以配置的间隔检查到期日期。");
define('OGP_LANG_once_logged_in', "一旦登录");
define('OGP_LANG_cron_job', "Cron 任务");
define('OGP_LANG_theme_settings', "主题设置");
define('OGP_LANG_theme', "主题");
define('OGP_LANG_theme_info', "在这里选择的主题将是所有用户的默认主题。用户可以从他们的个人资料页面更改他们的主题。");
define('OGP_LANG_welcome_title', "欢迎标题");
define('OGP_LANG_welcome_title_info', "启用在仪表板顶部显示的标题。");
define('OGP_LANG_welcome_title_message', "欢迎标题信息");
define('OGP_LANG_welcome_title_message_info', "在仪表板顶部显示的标题信息（允许HTML代码）。");
define('OGP_LANG_logo_link', "标志链接");
define('OGP_LANG_logo_link_info', "标志的超链接。<b style='font-size:10px; font-weight:normal;'>(留空将链接到仪表板)</b>");
define('OGP_LANG_custom_tab', "自定义标签");
define('OGP_LANG_custom_tab_info', "在菜单末尾添加一个可自定义的标签。<b style='font-size:10px; font-weight:normal;'>(应用并刷新此页面以编辑标签设置)</b>");
define('OGP_LANG_custom_tab_name', "自定义标签名称");
define('OGP_LANG_custom_tab_name_info', "标签的显示名称。");
define('OGP_LANG_custom_tab_link', "自定义标签链接");
define('OGP_LANG_custom_tab_link_info', "标签的超链接。");
define('OGP_LANG_custom_tab_sub', "自定义子标签");
define('OGP_LANG_custom_tab_sub_info', "当悬停在“自定义标签”上时添加可自定义的子标签。");
define('OGP_LANG_custom_tab_sub_name', "子标签#1名称");
define('OGP_LANG_custom_tab_sub_link', "子标签#1链接");
define('OGP_LANG_custom_tab_sub_name2', "子标签#2名称");
define('OGP_LANG_custom_tab_sub_link2', "子标签#2链接");
define('OGP_LANG_custom_tab_sub_name3', "子标签#3名称");
define('OGP_LANG_custom_tab_sub_link3', "子标签#3链接");
define('OGP_LANG_custom_tab_sub_name4', "子标签#4名称");
define('OGP_LANG_custom_tab_sub_link4', "子标签#4链接");
define('OGP_LANG_custom_tab_target_blank', "自定义标签目标");
define('OGP_LANG_custom_tab_target_blank_info', "设置所有标签的目标。<b style='font-size:10px; font-weight:normal;'>(Self_Page = 在同一页面打开链接。New_Page  =  在新标签中打开链接。)</b>");
define('OGP_LANG_bg_wrapper', "包装背景");
define('OGP_LANG_bg_wrapper_info', "包装的背景图像。<b style='font-size:10px; font-weight:normal;'>(仅在某些主题上可用。)</b>");
define('OGP_LANG_show_server_id_game_monitor', "在游戏监视器页面上显示服务器ID");
define('OGP_LANG_show_server_id_game_monitor_info', "在游戏监视器中显示游戏服务器ID列，以便将代理创建的文件与实际游戏服务器匹配。");
define('OGP_LANG_default_game_server_home_path_prefix', "默认游戏服务器主目录前缀");
define('OGP_LANG_default_game_server_home_path_prefix_info', "输入您希望默认创建游戏服务器主目录的路径前缀。您可以在路径中使用“{USERNAME}”，它将被替换为游戏服务器被分配给的OGP用户名。您可以在路径中使用“{GAMEKEY}”，它将被替换为友好的小写名称。您可以在路径中的任何位置使用“{SKIPID}”来跳过将主目录ID附加到路径中。示例：/ogp/games/{USERNAME}/{GAMEKEY}{SKIPID}将变为/ogp/games/username/arkse/。示例2：/ogp/games将变为/ogp/games/1，其中1是游戏服务器的ID。");
define('OGP_LANG_use_authorized_hosts', "限制API到定义的授权主机");
define('OGP_LANG_use_authorized_hosts_info', "启用此设置仅允许来自预定义和批准的IP地址的API调用。&nbsp; 启用此设置后，可以在此页面上设置批准的地址。&nbsp; 如果禁用此设置，使用有效密钥的用户将能够从任何IP地址访问API。&nbsp; 使用有效密钥的用户将能够使用API管理他们有权限管理的任何游戏服务器。");
define('OGP_LANG_allow_setting_cpu_affinity', "允许设置游戏服务器的CPU核心分配");
define('OGP_LANG_allow_setting_cpu_affinity_info', "如果启用，创建游戏主目录的管理员将显示游戏服务器的CPU亲和性（核心分配）选项。");
define('OGP_LANG_setup_api_authorized_hosts', "设置API授权主机");
define('OGP_LANG_autohorized_hosts', "授权主机");
define('OGP_LANG_add', "添加");
define('OGP_LANG_remove', "移除");
define('OGP_LANG_default_trusted_hosts', "默认受信任的主机");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "受信任的主机或代理（IPv4/IPv6地址或CIDR）");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "受信任的转发IP（IPv4/IPv6地址或CIDR）");
define('OGP_LANG_reset_game_server_order', "重置游戏服务器排序");
define('OGP_LANG_reset_game_server_order_info', "将游戏服务器排序重置回使用服务器ID的默认值");
define('OGP_LANG_regex_invalid_file_name_chars', "无效文件名字符正则表达式");
define('OGP_LANG_regex_invalid_file_name_chars_info', "如果您想在文件名中允许一组不同的字符，请更改此正则表达式模式。");
define('OGP_LANG_login_ban_time', "失败登录封禁时间（秒）");
define('OGP_LANG_login_ban_time_info', "在定义的失败登录尝试次数后，IP地址被封禁登录面板的时间（以秒为单位）。");
?>
