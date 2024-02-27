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

define('OGP_LANG_error', "错误");
define('OGP_LANG_title', "TeamSpeak 3 网页界面");
define('OGP_LANG_update_available', "<h3>注意：此软件的新版本 (v%1) 可在 <a href=\"%2\" target=\"_blank\">%2</a> 下载。</h3>");
define('OGP_LANG_head_logout', "登出");
define('OGP_LANG_head_vserver_switch', "更换虚拟服务器");
define('OGP_LANG_head_vserver_overview', "虚拟服务器概览");
define('OGP_LANG_head_vserver_token', "令牌管理");
define('OGP_LANG_head_vserver_liveview', "实时查看");
define('OGP_LANG_e_fill_out', "请填写所有必填字段。");
define('OGP_LANG_e_upload_failed', "上传失败。");
define('OGP_LANG_e_server_responded', "服务器回应：");
define('OGP_LANG_e_conn_serverquery', "无法创建 ServerQuery 访问。");
define('OGP_LANG_e_conn_vserver', "无法选择虚拟服务器。");
define('OGP_LANG_e_session_timedout', "会话超时。");
define('OGP_LANG_js_error', "错误");
define('OGP_LANG_js_ajax_error', "发生 AJAX 错误：%1。");
define('OGP_LANG_js_confirm_server_stop', "你真的要停止服务器 #%1 吗？");
define('OGP_LANG_js_confirm_server_delete', "你真的要删除服务器 #%1 吗？");
define('OGP_LANG_js_notice_server_deleted', "服务器 %1 已成功删除。\n现在将重新加载概览页面。");
define('OGP_LANG_js_prompt_banduration', "时长（小时）（0=无限）：");
define('OGP_LANG_js_prompt_banreason', "原因（可选）：");
define('OGP_LANG_js_prompt_msg_to', "文本消息给 %1 #%2：");
define('OGP_LANG_js_prompt_poke_to', "戳客户端 #%1 的消息：");
define('OGP_LANG_js_prompt_new_propvalue', "'%1' 的新值：");
define('OGP_LANG_n_server_responded', "服务器回应：");
define('OGP_LANG_login_serverquery', "ServerQuery 登录");
define('OGP_LANG_login_name', "用户名");
define('OGP_LANG_login_password', "密码");
define('OGP_LANG_login_submit', "登录");
define('OGP_LANG_vsselect_headline', "虚拟服务器选择");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "名称");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "端口");
define('OGP_LANG_vsselect_state', "状态");
define('OGP_LANG_vsselect_clients', "客户端");
define('OGP_LANG_vsselect_uptime', "运行时间");
define('OGP_LANG_vsselect_choose', "选择");
define('OGP_LANG_vsselect_start', "启动");
define('OGP_LANG_vsselect_stop', "停止");
define('OGP_LANG_vsselect_delete', "删除");
define('OGP_LANG_vsselect_new_headline', "创建新的虚拟服务器");
define('OGP_LANG_vsselect_new_servername', "服务器名称");
define('OGP_LANG_vsselect_new_slots', "客户端插槽");
define('OGP_LANG_vsselect_new_create', "创建");
define('OGP_LANG_vsselect_new_added_ok', "虚拟服务器 <span class=\"online\">%1</span> 创建成功。");
define('OGP_LANG_vsselect_new_added_generated', "生成的令牌是：");
define('OGP_LANG_vsoverview_virtualserver', "虚拟服务器");
define('OGP_LANG_vsoverview_information_head', "信息");
define('OGP_LANG_vsoverview_connection_head', "连接");
define('OGP_LANG_vsoverview_info_general_head', "常规设置");
define('OGP_LANG_vsoverview_info_servername', "服务器名称");
define('OGP_LANG_vsoverview_info_host', "主机");
define('OGP_LANG_vsoverview_info_state', "状态");
define('OGP_LANG_vsoverview_info_state_port', "端口");
define('OGP_LANG_vsoverview_info_uptime', "运行时间");
define('OGP_LANG_vsoverview_info_welcomemsg', "欢迎<br />信息");
define('OGP_LANG_vsoverview_info_hostmsg', "主机消息");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "输出");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "无");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "在聊天日志中");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "窗口");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "窗口 + 断开连接");
define('OGP_LANG_vsoverview_info_req_security', "安全级别");
define('OGP_LANG_vsoverview_info_req_securitylvl', "所需");
define('OGP_LANG_vsoverview_info_hostbanner_head', "主机横幅");
define('OGP_LANG_vsoverview_info_hostbanner_url', "URL");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "图片地址");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "主机按钮 URL");
define('OGP_LANG_vsoverview_info_antiflood_head', "防洪");
define('OGP_LANG_vsoverview_info_antiflood_warning', "警告开启");
define('OGP_LANG_vsoverview_info_antiflood_kick', "踢出开启");
define('OGP_LANG_vsoverview_info_antiflood_ban', "禁止开启");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "禁止时长");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "减少");
define('OGP_LANG_vsoverview_info_antiflood_points', "点");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "秒");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "每次减少点数");
define('OGP_LANG_vsoverview_conn_total_head', "总计");
define('OGP_LANG_vsoverview_conn_total_packets', "包");
define('OGP_LANG_vsoverview_conn_total_bytes', "字节");
define('OGP_LANG_vsoverview_conn_total_send', "已发送");
define('OGP_LANG_vsoverview_conn_total_received', "已接收");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "带宽");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "最后");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "秒");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "分钟");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "已发送");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "已接收");
define('OGP_LANG_vstoken_token_virtualserver', "虚拟服务器");
define('OGP_LANG_vstoken_token_head', "令牌");
define('OGP_LANG_vstoken_token_type', "组类型");
define('OGP_LANG_vstoken_token_id1', "服务器组/<br />频道组");
define('OGP_LANG_vstoken_token_id2', "(频道)");
define('OGP_LANG_vstoken_token_tokencode', "令牌代码");
define('OGP_LANG_vstoken_token_delete', "删除");
define('OGP_LANG_vstoken_new_head', "创建新令牌");
define('OGP_LANG_vstoken_new_create', "生成");
define('OGP_LANG_vstoken_new_tokentype', "令牌类型：");
define('OGP_LANG_vstoken_new_servergroup', "服务器组");
define('OGP_LANG_vstoken_new_channelgroup', "频道组");
define('OGP_LANG_vstoken_new_select_group', "服务器组");
define('OGP_LANG_vstoken_new_select_channelgroup', "频道组");
define('OGP_LANG_vstoken_new_select_channel', "频道");
define('OGP_LANG_vstoken_new_tokentype_0', "服务器");
define('OGP_LANG_vstoken_new_tokentype_1', "频道");
define('OGP_LANG_vstoken_new_added_ok', "令牌已成功生成。");
define('OGP_LANG_vsliveview_server_virtualserver', "虚拟服务器");
define('OGP_LANG_vsliveview_server_head', "实时查看");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "自动刷新");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "到频道 #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "切换");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "发送消息");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "戳一下");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "踢出");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "禁止");
define('OGP_LANG_vsoverview_banlist_head', "禁止列表");
define('OGP_LANG_vsoverview_banlist_id', "ID #");
define('OGP_LANG_vsoverview_banlist_ip', "IP");
define('OGP_LANG_vsoverview_banlist_name', "名称");
define('OGP_LANG_vsoverview_banlist_uid', "唯一ID");
define('OGP_LANG_vsoverview_banlist_reason', "原因");
define('OGP_LANG_vsoverview_banlist_created', "创建时间");
define('OGP_LANG_vsoverview_banlist_duration', "时长");
define('OGP_LANG_vsoverview_banlist_end', "结束");
define('OGP_LANG_vsoverview_banlist_unlimited', "无限");
define('OGP_LANG_vsoverview_banlist_never', "从不");
define('OGP_LANG_vsoverview_banlist_new_head', "创建新禁止");
define('OGP_LANG_vsoverview_banlist_new_create', "创建");
define('OGP_LANG_vsliveview_channelbackup_head', "频道备份");
define('OGP_LANG_vsliveview_channelbackup_get', "创建并下载");
define('OGP_LANG_vsliveview_channelbackup_load', "上传频道备份");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "重建");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "频道备份成功。");
define('OGP_LANG_time_day', "天");
define('OGP_LANG_time_days', "天");
define('OGP_LANG_time_hour', "小时");
define('OGP_LANG_time_hours', "小时");
define('OGP_LANG_time_minute', "分钟");
define('OGP_LANG_time_minutes', "分钟");
define('OGP_LANG_time_second', "秒");
define('OGP_LANG_time_seconds', "秒");
define('OGP_LANG_e_2568', "你没有足够的权限。");
define('OGP_LANG_temp_folder_not_writable', "模板文件夹（%s）不可写。");
define('OGP_LANG_unassign_from_subuser', "从子用户取消分配。");
define('OGP_LANG_assign_to_subuser', "分配给子用户。");
define('OGP_LANG_select_subuser', "选择子用户。");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "你的账户没有分配服务器。");
define('OGP_LANG_change_virtual_server', "更换虚拟服务器");
define('OGP_LANG_change_remote_server', "更换远程服务器");
?>