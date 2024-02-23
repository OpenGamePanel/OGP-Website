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

define('OGP_LANG_add_mods_note', "添加服务器到用户后，您需要添加模组。这可以通过编辑服务器来完成。");
define('OGP_LANG_game_servers', "游戏服务器");
define('OGP_LANG_game_path', "游戏路径");
define('OGP_LANG_game_path_info', "绝对服务器路径。例如：/home/ogpbot/OGP_User_Files/My_Server");
define('OGP_LANG_game_server_name_info', "服务器名称帮助用户识别他们的服务器。");
define('OGP_LANG_control_password', "控制密码");
define('OGP_LANG_control_password_info', "此密码用于服务器控制，例如 RCON 密码。如果密码为空，则使用其他方法。");
define('OGP_LANG_add_game_home', "添加游戏服务器");
define('OGP_LANG_game_path_empty', "游戏路径不能为空。");
define('OGP_LANG_game_home_added', "游戏服务器添加成功。正在重定向到主页编辑页面。");
define('OGP_LANG_failed_to_add_home_to_db', "无法将主页添加到数据库。错误：%s");
define('OGP_LANG_caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>注意！</b> 代理离线，无法获取操作系统类型和架构，<br> 显示所有平台的服务器：");
define('OGP_LANG_select_remote_server', "选择远程服务器");
define('OGP_LANG_no_remote_servers_configured', "Open Game Panel 没有配置远程服务器。<br>您需要在添加用户服务器之前添加远程服务器。");
define('OGP_LANG_no_game_configurations_found', "未找到游戏配置。您需要从");
define('OGP_LANG_game_configurations', ">游戏配置页面");
define('OGP_LANG_add_remote_server', "添加服务器。");
define('OGP_LANG_wine_games', "Wine 游戏");
define('OGP_LANG_home_path', "主目录路径");
define('OGP_LANG_change_home_info', "已安装游戏服务器的位置。例如：/home/ogp/my_server/");
define('OGP_LANG_game_server_name', "游戏服务器名称");
define('OGP_LANG_change_name_info', "服务器的名称，以帮助用户识别它。");
define('OGP_LANG_game_control_password', "游戏控制密码");
define('OGP_LANG_change_control_password_info', "控制密码，例如 rcon 密码。");
define('OGP_LANG_available_mods', "可用模组");
define('OGP_LANG_note_no_mods', "此游戏没有可用的模组。");
define('OGP_LANG_change_home', "更改主目录");
define('OGP_LANG_change_control_password', "更改控制密码");
define('OGP_LANG_change_name', "更改名称");
define('OGP_LANG_add_mod', "添加模组");
define('OGP_LANG_set_ip', "设置 IP");
define('OGP_LANG_ips_and_ports', "IP 和端口");
define('OGP_LANG_mod_name', "模组名称");
define('OGP_LANG_max_players', "最大玩家数");
define('OGP_LANG_extra_cmd_line_args', "额外的命令行参数");
define('OGP_LANG_extra_cmd_line_info', "额外的命令行参数提供了一种方式，在游戏启动时输入额外的参数。");
define('OGP_LANG_cpu_affinity', "CPU 亲和性");
define('OGP_LANG_nice_level', "优先级");
define('OGP_LANG_set_options', "设置选项");
define('OGP_LANG_remove_mod', "移除模组");
define('OGP_LANG_mods', "模组");
define('OGP_LANG_ip', "IP");
define('OGP_LANG_port', "端口");
define('OGP_LANG_no_ip_ports_assigned', "至少需要分配一个 IP:端口 对给主目录。");
define('OGP_LANG_successfully_assigned_ip_port', "成功分配 IP:端口 对给主目录。");
define('OGP_LANG_port_range_error', "端口需要在 0 到 65535 范围内。");
define('OGP_LANG_failed_to_assing_mod_to_home', "无法将模组 id %d 分配给主目录。");
define('OGP_LANG_successfully_assigned_mod_to_home', "成功将模组 id %d 分配给主目录。");
define('OGP_LANG_successfully_modified_mod', "成功修改模组信息。");
define('OGP_LANG_back_to_game_monitor', "返回游戏监视器");
define('OGP_LANG_back_to_game_servers', "返回游戏服务器");
define('OGP_LANG_user_id_main', "主要所有者");
define('OGP_LANG_change_user_id_main', "更改主要所有者");
define('OGP_LANG_change_user_id_main_info', "主服务器主目录所有者。");
define('OGP_LANG_server_ftp_password', "FTP 密码");
define('OGP_LANG_change_ftp_password', "更改 FTP 密码");
define('OGP_LANG_change_ftp_password_info', "这是登录此主目录的 FTP 服务器的密码。");
define('OGP_LANG_Delete_old_user_assigned_homes', "取消分配当前用户的主目录。");
define('OGP_LANG_editing_home_called', "编辑名为的主目录");
define('OGP_LANG_control_password_updated_successfully', "控制密码更新成功。");
define('OGP_LANG_control_password_update_failed', "控制密码更新失败");
define('OGP_LANG_successfully_changed_game_server', "成功更改游戏服务器。");
define('OGP_LANG_error_ocurred_on_remote_server', "远程服务器发生错误，");
define('OGP_LANG_ftp_password_can_not_be_changed', "FTP 密码无法更改。");
define('OGP_LANG_ftp_can_not_be_switched_on', "FTP 无法开启。");
define('OGP_LANG_ftp_can_not_be_switched_off', "FTP 无法关闭。");
define('OGP_LANG_invalid_home_id_entered', "输入了无效的主目录 ID。");
define('OGP_LANG_ip_port_already_in_use', "IP %s:%s 已经被使用。请选择另一个。");
define('OGP_LANG_successfully_assigned_ip_port_to_server_id', "成功将 %s:%s 分配给 ID 为 %s 的主目录。");
define('OGP_LANG_no_ip_addresses_configured', "您的游戏服务器没有配置 IP 地址。您可以从");
define('OGP_LANG_server_page', "服务器页面");
define('OGP_LANG_successfully_removed_mod', "成功移除游戏模组。");
define('OGP_LANG_warning_agent_offline_defaulting_CPU_count_to_1', "警告 - 代理离线，默认 CPU 数量为 1。");
define('OGP_LANG_mod_install_cmds', "模组安装命令");
define('OGP_LANG_cmds_for', "命令用于");
define('OGP_LANG_preinstall_cmds', "预安装命令");
define('OGP_LANG_postinstall_cmds', "安装后命令");
define('OGP_LANG_edit_preinstall_cmds', "编辑预安装命令");
define('OGP_LANG_edit_postinstall_cmds', "编辑安装后命令");
define('OGP_LANG_save_as_default_for_this_mod', "保存为此模组的默认值");
define('OGP_LANG_empty', "空");
define('OGP_LANG_master_server_for_clon_update', "本地更新的主服务器");
define('OGP_LANG_set_as_master_server', "设置为主服务器");
define('OGP_LANG_set_as_master_server_for_local_clon_update', "设置为本地更新的主服务器。");
define('OGP_LANG_only_available_for', "仅适用于 '%s'，托管在名为 '%s' 的远程服务器上。");
define('OGP_LANG_ftp_on', "启用 FTP");
define('OGP_LANG_ftp_off', "禁用 FTP");
define('OGP_LANG_change_ftp_account_status', "更改 FTP 账户状态");
define('OGP_LANG_change_ftp_account_status_info', "一旦 FTP 账户被启用或禁用，它就会被添加或从 FTP 的数据库中移除。");
define('OGP_LANG_server_ftp_login', "服务器 FTP 登录");
define('OGP_LANG_change_ftp_login_info', "更改 FTP 登录为自定义的一个。");
define('OGP_LANG_change_ftp_login', "更改 FTP 登录");
define('OGP_LANG_ftp_login_can_not_be_changed', "无法更改 FTP 登录。");
define('OGP_LANG_server_is_running_change_addresses_not_available', "服务器实际上正在运行，IP 不能被更改。");
define('OGP_LANG_change_game_type', "更改游戏类型");
define('OGP_LANG_change_game_type_info', "更改游戏类型时，当前的模组配置将被删除。");
define('OGP_LANG_force_mod_on_this_address', "在此地址上强制模组");
define('OGP_LANG_successfully_assigned_mod_to_address', "成功将模组分配给地址");
define('OGP_LANG_switch_mods', "切换模组");
define('OGP_LANG_switch_mod_for_address', "为地址 %s 切换模组");
define('OGP_LANG_invalid_path', "无效路径");
define('OGP_LANG_add_new_game_home', "添加新游戏服务器");
define('OGP_LANG_no_game_homes_found', "未找到游戏服务器");
define('OGP_LANG_available_game_homes', "可用的游戏服务器");
define('OGP_LANG_home_id', "主目录 ID");
define('OGP_LANG_game_server', "游戏服务器");
define('OGP_LANG_game_type', "游戏类型");
define('OGP_LANG_game_home', "主目录路径");
define('OGP_LANG_game_home_name', "游戏服务器名称");
define('OGP_LANG_clone', "克隆");
define('OGP_LANG_unassign', "取消分配");
define('OGP_LANG_access_rights', "访问权限");
define('OGP_LANG_assigned_homes', "当前分配的主目录");
define('OGP_LANG_assign', "分配");
define('OGP_LANG_allow_updates', "允许游戏更新");
define('OGP_LANG_allow_updates_info', "允许用户更新游戏安装（如果可能）。");
define('OGP_LANG_allow_file_management', "允许文件管理");
define('OGP_LANG_allow_file_management_info', "允许用户访问游戏服务器的文件管理模块。");
define('OGP_LANG_allow_parameter_usage', "允许参数使用");
define('OGP_LANG_allow_parameter_usage_info', "允许用户更改可用的命令行参数。");
define('OGP_LANG_allow_extra_params', "允许额外参数");
define('OGP_LANG_allow_extra_params_info', "允许用户修改额外的命令行参数。");
define('OGP_LANG_allow_ftp', "允许 FTP");
define('OGP_LANG_allow_ftp_info', "向用户显示 FTP 访问信息。");
define('OGP_LANG_allow_custom_fields', "允许自定义字段");
define('OGP_LANG_allow_custom_fields_info', "允许用户访问游戏服务器的自定义字段（如果有）。");
define('OGP_LANG_select_home', "选择要分配的主目录");
define('OGP_LANG_assign_new_home_to_user', "为用户 %s 分配新主目录");
define('OGP_LANG_assign_new_home_to_group', "为组 %s 分配新主目录");
define('OGP_LANG_assigned_home_to_user', "成功为用户 %s 分配主目录（ID：%d）。");
define('OGP_LANG_failed_to_assign_home_to_user', "未能为用户 %s 分配主目录（ID：%d）。");
define('OGP_LANG_assigned_home_to_group', "成功为组 %s 分配主目录（ID：%d）。");
define('OGP_LANG_unassigned_home_from_user', "成功从用户 %s 取消分配主目录（ID：%d）。");
define('OGP_LANG_unassigned_home_from_group', "成功从组 %s 取消分配主目录（ID：%d）。");
define('OGP_LANG_no_homes_assigned_to_user', "没有为用户 %s 分配的主目录。");
define('OGP_LANG_no_homes_assigned_to_group', "没有为组 %s 分配的主目录。");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_user', "没有更多可分配给此用户的主目录。");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_group', "没有更多可分配给此组的主目录。");
define('OGP_LANG_you_can_add_a_new_game_server_from', "您可以从 %s 添加新的游戏服务器。");
define('OGP_LANG_no_remote_servers_available_please_add_at_least_one', "没有可用的远程服务器，请至少添加一个！");
define('OGP_LANG_cloning_of_home_failed', "克隆 ID 为 '%s' 的主目录失败。");
define('OGP_LANG_no_mods_to_clone', "此游戏尚未启用任何模组。将不会克隆任何内容。");
define('OGP_LANG_failed_to_add_mod', "无法将模组 ID '%s' 添加到 ID 为 '%s' 的主目录。");
define('OGP_LANG_failed_to_update_mod_settings', "更新 ID 为 '%s' 的主目录的模组设置失败。");
define('OGP_LANG_successfully_cloned_mods', "成功为 ID 为 '%s' 的主目录克隆模组。");
define('OGP_LANG_successfully_copied_home_database', "成功复制主目录数据库。");
define('OGP_LANG_copying_home_remotely', "正在从 '%s' 到 '%s' 在远程服务器上复制主目录。");
define('OGP_LANG_cloning_home', "克隆主目录称为 '%s'");
define('OGP_LANG_current_home_path', "当前主目录路径");
define('OGP_LANG_current_home_path_info', "远程服务器上复制的主目录的当前位置。");
define('OGP_LANG_clone_home', "克隆主目录");
define('OGP_LANG_new_home_name', "新主目录名称");
define('OGP_LANG_new_home_path', "新主目录路径");
define('OGP_LANG_agent_ip', "代理 IP");
define('OGP_LANG_game_server_copy_is_running', "游戏服务器复制正在进行中...");
define('OGP_LANG_game_server_copy_was_successful', "游戏服务器复制成功");
define('OGP_LANG_game_server_copy_failed_with_return_code', "游戏服务器复制失败，返回代码 %s");
define('OGP_LANG_clone_mods', "克隆模组");
define('OGP_LANG_game_server_owner', "游戏服务器所有者");
define('OGP_LANG_the_name_of_the_server_to_help_users_to_identify_it', "服务器的名称，以帮助用户识别它。");
define('OGP_LANG_ips_and_ports_used_in_this_home', "此主目录中使用的 IP 和端口");
define('OGP_LANG_note_ips_and_ports_are_not_cloned', "注意 - IP 和端口不会被克隆");
define('OGP_LANG_mods_and_settings_for_this_game_server', "此游戏服务器的模组和设置");
define('OGP_LANG_sure_to_delete_serverid_from_remoteip_and_directory', "您确定要从服务器 %s 和目录 %s 中删除游戏服务器（ID：%s）吗");
define('OGP_LANG_yes_and_delete_the_files', "是的，并删除文件");
define('OGP_LANG_failed_to_remove_gamehome_from_database', "从数据库中删除游戏主目录失败。");
define('OGP_LANG_successfully_deleted_game_server_with_id', "成功删除 ID 为 %s 的游戏服务器。");
define('OGP_LANG_failed_to_remove_ftp_account_from_remote_server', "从远程服务器中删除 FTP 账户失败。");
define('OGP_LANG_remove_it_anyway', "无论如何都要删除它吗？");
define('OGP_LANG_sucessfully_deleted', "成功删除 %s");
define('OGP_LANG_the_agent_had_a_problem_deleting', "代理在删除 %s 时遇到问题。请检查代理的日志。");
define('OGP_LANG_connection_timeout_or_problems_reaching_the_agent', "连接超时或到达代理的问题");
define('OGP_LANG_does_not_exist_yet', "尚不存在。");
define('OGP_LANG_update_settings', "更新设置");
define('OGP_LANG_settings_updated', "设置已更新。");
define('OGP_LANG_selected_path_already_in_use', "所选路径已在使用中。");
define('OGP_LANG_browse', "浏览");
define('OGP_LANG_cancel', "取消");
define('OGP_LANG_set_this_path', "设置此路径");
define('OGP_LANG_select_home_path', "选择主目录路径");
define('OGP_LANG_folder', "文件夹");
define('OGP_LANG_owner', "所有者");
define('OGP_LANG_group', "组");
define('OGP_LANG_level_up', "上一级");
define('OGP_LANG_level_up_info', "返回到上一个文件夹。");
define('OGP_LANG_add_folder', "添加文件夹");
define('OGP_LANG_add_folder_info', "写下新文件夹的名称，然后点击图标。");
define('OGP_LANG_valid_user', "请指定一个有效的用户。");
define('OGP_LANG_valid_group', "请指定一个有效的组。");
define('OGP_LANG_set_affinity', "设置服务器亲和性");
define('OGP_LANG_cpu_affinity_info', "选择您想要分配给游戏服务器的 CPU 核心。");
define('OGP_LANG_expiration_date_changed', "已更改选定主目录的到期日期。");
define('OGP_LANG_expiration_date_could_not_be_changed', "无法更改选定主目录的到期日期。");
define('OGP_LANG_search', "搜索");
define('OGP_LANG_ftp_account_username_too_long', "FTP 用户名太长。尝试一个不超过 20 个字符的较短用户名。");
define('OGP_LANG_ftp_account_password_too_long', "FTP 密码太长。尝试一个不超过 20 个字符的较短密码。");
define('OGP_LANG_other_servers_exist_with_path_please_change', "存在具有相同路径的其他主目录。建议（但不是必须）您将此路径更改为某个唯一的路径。如果您不这样做，可能会遇到问题。");
define('OGP_LANG_change_access_rights_for_selected_servers', "更改选定服务器的访问权限");
?>
