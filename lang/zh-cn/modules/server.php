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

define('OGP_LANG_add_new_remote_host', "添加新的远程主机");
define('OGP_LANG_configured_remote_hosts', "已配置的远程主机");
define('OGP_LANG_remote_host', "远程主机");
define('OGP_LANG_remote_host_info', "远程主机必须是一个可以ping通的主机名！");
define('OGP_LANG_remote_host_port', "远程主机端口");
define('OGP_LANG_remote_host_port_info', "远程主机上OGP代理监听的端口。默认：12679。");
define('OGP_LANG_remote_host_name', "远程主机名称");
define('OGP_LANG_ogp_user', "OGP代理用户名");
define('OGP_LANG_remote_host_name_info', "远程主机名称用于帮助用户识别他们的服务器。");
define('OGP_LANG_add_remote_host', "添加远程主机");
define('OGP_LANG_remote_encryption_key', "远程加密密钥");
define('OGP_LANG_remote_encryption_key_info', "远程加密密钥用于加密面板和代理之间的数据。这个密钥在两边必须相同。");
define('OGP_LANG_server_name', "服务器名称");
define('OGP_LANG_agent_ip_port', "代理IP：端口");
define('OGP_LANG_agent_status', "代理状态");
define('OGP_LANG_ips', "IP地址");
define('OGP_LANG_add_more_ips', "如果你想输入更多IP，请在所有字段都填满后按'设置IP'，将会出现一个空字段。");
define('OGP_LANG_encryption_key_mismatch', "加密密钥与代理不匹配。请重新检查你的代理配置。");
define('OGP_LANG_no_ip_for_remote_host', "你需要为每个远程主机添加至少一个（1个）IP地址。");
define('OGP_LANG_note_remote_host', "远程主机是运行OGP代理的服务器。每个主机可以有多个IP地址，用户可以将服务器绑定到这些IP地址上。");
define('OGP_LANG_ip_administration', "服务器 &amp; IP管理 :: 开放游戏面板");
define('OGP_LANG_unknown_error', "未知错误 - status_chk返回");
define('OGP_LANG_remote_host_user_name', "UNIX用户");
define('OGP_LANG_remote_host_user_name_info', "代理运行的用户名。例如：Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "当前代理的FTP服务器<b>IP</b>。");
define('OGP_LANG_remote_host_ftp_port', "FTP端口");
define('OGP_LANG_remote_host_ftp_port_info', "当前代理的FTP服务器<b>端口</b>。");
define('OGP_LANG_view_log', "查看日志");
define('OGP_LANG_status', "状态");
define('OGP_LANG_stop_firewall', "停止防火墙");
define('OGP_LANG_start_firewall', "启动防火墙");
define('OGP_LANG_seconds', "秒");
define('OGP_LANG_reboot', "远程服务器重启");
define('OGP_LANG_restart', "重启代理");
define('OGP_LANG_confirm_reboot', "你确定要远程重启名为'%s'的整个物理服务器吗？");
define('OGP_LANG_confirm_restart', "你确定要重启名为'%s'的代理吗？");
define('OGP_LANG_restarting', "正在重启代理...请等待。");
define('OGP_LANG_restarted', "代理成功重启。");
define('OGP_LANG_reboot_success', "名为'%s'的服务器已成功重启。在服务器成功启动之前，你将无法访问服务器。");
define('OGP_LANG_invalid_remote_host_id', "无效的远程主机id '%s'。");
define('OGP_LANG_remote_host_removed', "名为'%s'的远程主机已成功移除。");
define('OGP_LANG_editing_remote_server', "正在编辑名为'%s'的远程服务器");
define('OGP_LANG_remote_server_settings_changed', "远程服务器'%s'的设置已成功更改。");
define('OGP_LANG_save_settings', "保存设置");
define('OGP_LANG_set_ips', "设置IP");
define('OGP_LANG_remote_ip', "远程IP");
define('OGP_LANG_remote_ips_for', "代理服务器'%s'上游戏服务器使用的IP");
define('OGP_LANG_ips_set_for_server', "服务器名为'%s'的IP设置成功。");
define('OGP_LANG_could_not_remove_ip', "无法从数据库中移除旧的IP。");
define('OGP_LANG_could_add_ip', "无法将远程服务器IP添加到数据库。");
define('OGP_LANG_areyousure_removeagent', "你确定要移除名为");
define('OGP_LANG_areyousure_removeagent2', "的代理以及与其相关的所有家园从ogp数据库中吗？");
define('OGP_LANG_error_while_remove', "移除远程服务器时发生错误。");
define('OGP_LANG_add_ip', "添加IP");
define('OGP_LANG_remove_ip', "移除IP");
define('OGP_LANG_edit_ip', "编辑IP");
define('OGP_LANG_wrote_changes', "更改保存成功。");
define('OGP_LANG_there_are_servers_running_on_this_ip', "这个IP地址上有服务器正在运行。");
define('OGP_LANG_enter_ip_host', "你必须为远程主机输入IP。");
define('OGP_LANG_enter_valid_ip', "你必须为远程主机输入有效的端口。端口值可以在0和65535之间，但建议在1024和65535之间。");
define('OGP_LANG_could_not_add_server', "无法添加服务器");
define('OGP_LANG_to_db', "到数据库。");
define('OGP_LANG_added_server', "添加了服务器");
define('OGP_LANG_with_port', "与端口");
define('OGP_LANG_to_db_succesfully', "成功添加到数据库。");
define('OGP_LANG_unable_discover', "无法在");
define('OGP_LANG_set_ip_manually', "上自动发现IP。你将不得不手动设置它们。");
define('OGP_LANG_found_ips', "发现的IP");
define('OGP_LANG_for_remote_server', "对于远程服务器。");
define('OGP_LANG_failed_add_ip', "无法添加IP");
define('OGP_LANG_timeout', "超时");
define('OGP_LANG_timeout_info', "从这个代理获取响应的时间限制（秒）。");
define('OGP_LANG_use_nat', "使用NAT");
define('OGP_LANG_use_nat_info', "启用如果你的远程服务器使用NAT规则。使用此设置如果你的游戏服务器在内部私有LAN IP地址上运行，以便面板将使用你的真实远程IP地址来查询游戏服务器。");
define('OGP_LANG_arrange_ports', "排列端口");
define('OGP_LANG_assign_new_ports_range_for_ip', "为IP %s分配新的端口范围");
define('OGP_LANG_assigned_port_ranges_for_ip', "为IP %s分配的端口范围");
define('OGP_LANG_assigned_ports_for_ip', "为IP %s分配的端口");
define('OGP_LANG_unspecified_game_types', "未指定的游戏类型");
define('OGP_LANG_start_port', "起始端口：");
define('OGP_LANG_end_port', "结束端口：");
define('OGP_LANG_port_increment', "端口增量：");
define('OGP_LANG_total_assignable_ports', "总可分配端口：");
define('OGP_LANG_available_range_ports', "可用范围端口：");
define('OGP_LANG_assign_range', "分配范围");
define('OGP_LANG_edit_range', "编辑范围");
define('OGP_LANG_delete_range', "删除范围");
define('OGP_LANG_home_id', "家园ID");
define('OGP_LANG_home_path', "家园路径");
define('OGP_LANG_game_type', "游戏类型");
define('OGP_LANG_port', "端口");
define('OGP_LANG_invalid_values', "无效值。");
define('OGP_LANG_ports_in_range_already_arranged', "范围内的端口已经安排好了。");
define('OGP_LANG_ports_range_already_configured_for', "端口范围已经为%s配置。");
define('OGP_LANG_ports_range_added_successfull_for', "端口范围已成功为%s添加。");
define('OGP_LANG_ports_range_deleted_successfull', "端口范围已成功删除。");
define('OGP_LANG_ports_range_edited_successfull_for', "端口范围已成功为%s编辑。");
define('OGP_LANG_editing_firewall_for_remote_server', "正在编辑名为'%s'的远程服务器的防火墙");
define('OGP_LANG_default_allowed', "默认允许");
define('OGP_LANG_allow_port_command', "允许端口命令");
define('OGP_LANG_deny_port_command', "拒绝端口命令");
define('OGP_LANG_allow_ip_port_command', "允许IP：端口命令");
define('OGP_LANG_deny_ip_port_command', "拒绝IP：端口命令");
define('OGP_LANG_enable_firewall_command', "启用防火墙命令");
define('OGP_LANG_disable_firewall_command', "禁用防火墙命令");
define('OGP_LANG_get_firewall_status_command', "获取防火墙状态命令");
define('OGP_LANG_reset_firewall_command', "重置防火墙命令");
define('OGP_LANG_firewall_status', "防火墙状态");
define('OGP_LANG_save_firewall_settings', "保存防火墙设置");
define('OGP_LANG_reset_firewall', "重置防火墙");
define('OGP_LANG_firewall_settings', "防火墙设置");
define('OGP_LANG_display_public_ip', "显示公共IP");
define('OGP_LANG_ips_can_be_internal_external', "输入可用的IP地址。&nbsp;可以使用公共IP地址和内部LAN IP地址（对于NAT设置）。");
?>
