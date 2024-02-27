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

define('OGP_LANG_no_games_to_monitor', "您没有可以监控的配置游戏。");
define('OGP_LANG_status', "状态");
define('OGP_LANG_fail_no_mods', "此游戏未启用任何模组!您需要请求您的OGP管理员为您分配的游戏添加模组(s).");
define('OGP_LANG_no_game_homes_assigned', "您的账户没有分配任何服务器。");
define('OGP_LANG_select_game_home_to_configure', "选择您想要配置的游戏服务器");
define('OGP_LANG_file_manager', "文件管理器");
define('OGP_LANG_configure_mods', "配置模组");
define('OGP_LANG_install_update_steam', "通过Steam安装/更新");
define('OGP_LANG_install_update_manual', "手动安装/更新");
define('OGP_LANG_assign_game_homes', "分配游戏服务器");
define('OGP_LANG_user', "用户");
define('OGP_LANG_group', "组");
define('OGP_LANG_start', "开始");
define('OGP_LANG_ogp_agent_ip', "OGP代理IP");
define('OGP_LANG_max_players', "最大玩家数");
define('OGP_LANG_max', "最大");
define('OGP_LANG_ip_and_port', "IP和端口");
define('OGP_LANG_available_maps', "可用地图");
define('OGP_LANG_map_path', "地图路径");
define('OGP_LANG_available_parameters', "可用参数");
define('OGP_LANG_start_server', "启动服务器");
define('OGP_LANG_start_wait_note', "服务器启动可能需要一段时间。请不要关闭您的浏览器等待。");
define('OGP_LANG_game_type', "游戏类型");
define('OGP_LANG_map', "地图");
define('OGP_LANG_starting_server', "正在启动服务器，请等待...");
define('OGP_LANG_starting_server_settings', "正在使用以下设置启动服务器");
define('OGP_LANG_startup_params', "启动参数");
define('OGP_LANG_startup_cpu', "服务器运行所在的CPU");
define('OGP_LANG_startup_nice', "服务器的Nice值");
define('OGP_LANG_game_home', "主目录");
define('OGP_LANG_server_started', "服务器启动成功。");
define('OGP_LANG_no_parameter_access', "您无权访问参数。");
define('OGP_LANG_extra_parameters', "额外参数");
define('OGP_LANG_no_extra_param_access', "您无权访问额外参数。");
define('OGP_LANG_extra_parameters_info', "这些参数在游戏启动时被放置在命令行的末尾。");
define('OGP_LANG_game_exec_not_found', "远程服务器上未找到游戏可执行文件%s。");
define('OGP_LANG_select_params_and_start', "选择服务器的启动参数并按'%s'。");
define('OGP_LANG_no_ip_port_pairs_assigned', "此主目录没有分配IP端口对。如果您无法访问主目录编辑，请联系您的管理员。");
define('OGP_LANG_unable_to_get_log', "无法获取日志，retval %s。");
define('OGP_LANG_server_binary_not_executable', "服务器二进制文件不可执行。请检查服务器主目录中是否有适当的权限。");
define('OGP_LANG_server_not_running_log_found', "服务器未运行，但发现日志。注意：此日志可能与最后一次服务器启动无关。");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT对不属于所有者。");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "不适当的最大玩家值，已设置可达到的最大插槽数。");
define('OGP_LANG_server_running_not_responding', "服务器正在运行，但没有响应，<br>可能存在某种问题，您可能想要 ");
define('OGP_LANG_update_started', "更新已开始，请等待...");
define('OGP_LANG_failed_to_start_steam_update', "启动Steam更新失败。请查看代理日志。");
define('OGP_LANG_failed_to_start_rsync_update', "启动Rsync更新失败。请查看代理日志。");
define('OGP_LANG_update_completed', "更新成功完成。");
define('OGP_LANG_update_in_progress', "更新进行中，请等待...");
define('OGP_LANG_refresh_steam_status', "刷新Steam状态");
define('OGP_LANG_refresh_rsync_status', "刷新Rsync状态");
define('OGP_LANG_server_running_cant_update', "服务器运行中，因此无法更新。在更新前停止服务器。");
define('OGP_LANG_xml_steam_error', "所选服务器类型不支持steam安装/更新。");
define('OGP_LANG_mod_key_not_found_from_xml', "XML文件中未找到模组键'%s'。");
define('OGP_LANG_stop_update', "停止更新");
define('OGP_LANG_statistics', "统计");
define('OGP_LANG_servers', "服务器");
define('OGP_LANG_players', "玩家");
define('OGP_LANG_current_map', "当前地图");
define('OGP_LANG_stop_server', "停止服务器");
define('OGP_LANG_server_ip_port', "服务器IP:端口");
define('OGP_LANG_server_name', "服务器名称");
define('OGP_LANG_server_id', "服务器ID");
define('OGP_LANG_player_name', "玩家名称");
define('OGP_LANG_score', "得分");
define('OGP_LANG_time', "时间");
define('OGP_LANG_no_rights_to_stop_server', "您没有权限停止此服务器。");
define('OGP_LANG_no_ogp_lgsl_support', "此服务器（运行：%s）在OGP中不支持LGSL，无法显示其统计信息。");
define('OGP_LANG_server_status', "服务器在 %s 的状态是 %s。");
define('OGP_LANG_server_stopped', "服务器 '%s' 已停止。");
define('OGP_LANG_if_want_to_start_homes', "如果您想启动游戏服务器，请前往 %s。");
define('OGP_LANG_view_log', "查看日志");
define('OGP_LANG_if_want_manage', "如果您想管理您的游戏，您可以在");
define('OGP_LANG_columns', "列");
define('OGP_LANG_group_users', "用户组：");
define('OGP_LANG_assigned_to', "分配给：");
define('OGP_LANG_restart_server', "重启服务器");
define('OGP_LANG_restarting_server', "正在重启服务器，请等待...");
define('OGP_LANG_server_restarted', "服务器 '%s' 已重启。");
define('OGP_LANG_server_not_running', "服务器未运行。");
define('OGP_LANG_address', "地址");
define('OGP_LANG_owner', "所有者");
define('OGP_LANG_operations', "操作");
define('OGP_LANG_search', "搜索");
define('OGP_LANG_maps_read_from', "从读取地图 ");
define('OGP_LANG_file', "文件");
define('OGP_LANG_folder', "文件夹");
define('OGP_LANG_unable_retrieve_mod_info', "无法从数据库检索模组信息。");
define('OGP_LANG_unexpected_result_libremote', "libremote返回意外结果，请通知开发者。");
define('OGP_LANG_unable_get_info', "无法获取启动所需的信息，阻止启动。");
define('OGP_LANG_server_already_running', "服务器已在运行。如果您在游戏监视器中看不到服务器，可能存在某种问题，您可能想要");
define('OGP_LANG_already_running_stop_server', "停止服务器。");
define('OGP_LANG_error_server_already_running', "错误：服务器已在端口上运行");
define('OGP_LANG_failed_start_server_code', "远程服务器启动失败。错误代码：%s");
define('OGP_LANG_disabled', "已禁用 ");
define('OGP_LANG_not_found_server', "未找到具有ID的远程服务器");
define('OGP_LANG_rcon_command_title', "RCON命令");
define('OGP_LANG_has_sent_to', "已发送至");
define('OGP_LANG_need_set_remote_pass', "您需要在发送rcon命令之前设置远程控制密码");
define('OGP_LANG_before_sending_rcon_com', "发送rcon命令之前。");
define('OGP_LANG_retry', "重试");
define('OGP_LANG_page', "页面");
define('OGP_LANG_server_cant_start', "服务器无法启动");
define('OGP_LANG_server_cant_stop', "服务器无法停止");
define('OGP_LANG_error_occured_remote_host', "远程主机发生错误");
define('OGP_LANG_follow_server_status', "您可以从以下位置跟踪服务器状态");
define('OGP_LANG_addons', "插件");
define('OGP_LANG_hostname', "主机名");
define('OGP_LANG_rsync_install', "[Rsync安装]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "团队");
define('OGP_LANG_deaths', "死亡");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "技能");
define('OGP_LANG_AIBot', "AI机器人");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "玩家");
define('OGP_LANG_port', "端口");
define('OGP_LANG_rcon_presets', "RCON预设");
define('OGP_LANG_update_from_local_master_server', "从本地主服务器更新");
define('OGP_LANG_update_from_selected_rsync_server', "从选定的Rsync服务器更新");
define('OGP_LANG_execute_selected_server_operations', "执行选定的服务器操作");
define('OGP_LANG_execute_operations', "执行操作");
define('OGP_LANG_account_expiration', "账户到期");
define('OGP_LANG_mysql_databases', "MySQL数据库");
define('OGP_LANG_failed_querying_server', "* 查询服务器失败。");
define('OGP_LANG_query_protocol_not_supported', "* OGP中没有支持此服务器的查询协议。");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "通过设置禁用查询：在%s之后禁用查询，因为您有%s个服务器。<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON预设为%s和模组%s");
define('OGP_LANG_name', "名称");
define('OGP_LANG_command', "RCON&nbsp;命令");
define('OGP_LANG_add_preset', "添加预设");
define('OGP_LANG_edit_presets', "编辑预设");
define('OGP_LANG_del_preset', "删除");
define('OGP_LANG_change_preset', "更改");
define('OGP_LANG_send_command', "发送命令");
define('OGP_LANG_starting_copy_with_master_server_named', "开始与名为'%s'的主服务器复制...");
define('OGP_LANG_starting_sync_with', "开始与%s同步...");
define('OGP_LANG_refresh_interval', "日志刷新间隔");
define('OGP_LANG_finished_manual_update', "完成手动更新。");
define('OGP_LANG_failed_to_start_file_download', "启动文件下载失败");
define('OGP_LANG_game_name', "游戏名称");
define('OGP_LANG_dest_dir', "目标目录");
define('OGP_LANG_remote_server', "远程服务器");
define('OGP_LANG_file_url', "文件URL");
define('OGP_LANG_file_url_info', "上传并解压到目录的文件的URL。");
define('OGP_LANG_dest_filename', "目标文件名");
define('OGP_LANG_dest_filename_info', "目标文件的文件名。");
define('OGP_LANG_update_server', "更新服务器");
define('OGP_LANG_unavailable', "不可用");
define('OGP_LANG_upload_map_image', "上传地图图片");
define('OGP_LANG_upload_image', "上传图片");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "图片必须是jpg, gif或png且小于1 MB。");
define('OGP_LANG_check_dev_console', "上传文件时出错，请检查浏览器开发者控制台。");
define('OGP_LANG_uploaded_successfully', "上传成功。");
define('OGP_LANG_cant_create_folder', "无法创建文件夹：<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "无法写入文件：<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "超出PHP指令。<br><b>%s</b>。");
define('OGP_LANG_unknown_errors', "未知错误。");
define('OGP_LANG_directory', "目录");
define('OGP_LANG_view_player_commands', "查看玩家命令");
define('OGP_LANG_hide_player_commands', "隐藏玩家命令");
define('OGP_LANG_no_online_players', "没有在线玩家。");
define('OGP_LANG_invalid_game_mod_id', "指定了无效的游戏/模组ID。");
define('OGP_LANG_auto_update_title_popup', "Steam自动更新链接");
define('OGP_LANG_auto_update_popup_html', "<p>使用下面的链接检查并在需要时自动更新您的游戏服务器通过Steam。&nbsp;您可以使用cronjob查询它或手动启动该过程。</p>");
define('OGP_LANG_api_links_popup_html', "<p>选择您希望使用此游戏服务器的OGP API执行的操作。&nbsp;然后，使用下面的链接执行您希望的操作。&nbsp;您可以使用cronjob运行您希望的操作或通过直接请求来执行它。</p>");
define('OGP_LANG_auto_update_copy_me', "复制");
define('OGP_LANG_auto_update_copy_me_success', "已复制！");
define('OGP_LANG_auto_update_copy_me_fail', "无法复制。请手动复制链接。");
define('OGP_LANG_get_steam_autoupdate_api_link', "自动更新链接");
define('OGP_LANG_show_api_actions', "显示API操作");
define('OGP_LANG_api_links', "API链接");
define('OGP_LANG_update_attempt_from_nonmaster_server', "用户%s试图从非主服务器更新home_id %d。（主目录ID：%d）");
define('OGP_LANG_attempting_nonmaster_update', "您正在尝试从非主服务器更新此服务器。");
define('OGP_LANG_cannot_update_from_own_self', "本地服务器更新可能不会在主服务器上运行。");
define('OGP_LANG_show_server_id', "显示服务器ID");
define('OGP_LANG_hide_server_id', "隐藏服务器ID");
define('OGP_LANG_edit_configuration_files', "编辑配置文件");
define('OGP_LANG_admin', "管理员");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "幻影");
define('OGP_LANG_sec', "秒");
define('OGP_LANG_unknown_rsync_mirror', "您尝试从不存在的镜像开始更新。");
define('OGP_LANG_custom_fields', "自定义字段");
?>
