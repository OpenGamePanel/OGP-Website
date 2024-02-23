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
define('OGP_LANG_curl_needed', "此页面需要PHP curl模块。");
define('OGP_LANG_no_access', "您需要管理员权限才能访问此页面。");
define('OGP_LANG_dwl_update', "正在下载更新...");
define('OGP_LANG_dwl_complete', "下载完成");
define('OGP_LANG_install_update', "正在安装更新...");
define('OGP_LANG_update_complete', "更新完成");
define('OGP_LANG_ignored_files', "%s 个文件被忽略");
define('OGP_LANG_not_updated_files_blacklisted', "未更新/安装的文件（黑名单中）：<br>%s");
define('OGP_LANG_latest_version', "最新版本");
define('OGP_LANG_panel_version', "面板版本");
define('OGP_LANG_update_now', "立即更新");
define('OGP_LANG_the_panel_is_up_to_date', "面板已是最新。");
define('OGP_LANG_files_overwritten', "%s 个文件被覆盖");
define('OGP_LANG_files_not_overwritten', "%s 个文件由于黑名单而未被覆盖");
define('OGP_LANG_can_not_update_non_writable_files', "无法更新因以下文件/文件夹不可写");
define('OGP_LANG_dwl_failed', "下载链接不可用：\"%s\"。<br>请稍后再试。");
define('OGP_LANG_temp_folder_not_writable', "下载无法进行，因为Apache没有在系统临时文件夹（%s）的写入权限。");
define('OGP_LANG_base_dir_not_writable', "面板无法更新，因为Apache没有对\"%s\"文件夹的写入权限。");
define('OGP_LANG_new_files', "%s 个新文件。");
define('OGP_LANG_updated_files', "更新的文件：<br>%s");
define('OGP_LANG_select_mirror', "选择镜像");
define('OGP_LANG_view_changes', "查看更改");
define('OGP_LANG_updating_modules', "正在更新模块");
define('OGP_LANG_updating_finished', "更新完成");
define('OGP_LANG_updated_module', "已更新的模块：'%s'。");
define('OGP_LANG_blacklist_files', "黑名单文件");
define('OGP_LANG_blacklist_files_info', "所有标记的文件都不会被更新。");
define('OGP_LANG_save_to_blacklist', "保存到黑名单");
define('OGP_LANG_no_new_updates', "没有新的更新");
define('OGP_LANG_module_file_missing', "目录缺少module.php文件。");
define('OGP_LANG_query_failed', "查询执行失败");
define('OGP_LANG_query_failed_2', "到数据库。");
define('OGP_LANG_missing_zip_extension', "php-zip扩展未加载。请启用它以使用更新模块。");
?>