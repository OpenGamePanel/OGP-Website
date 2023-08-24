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

define('OGP_LANG_add_new_remote_host', "إضافة مضيف بعيد جديد");
define('OGP_LANG_configured_remote_hosts', "تكوين المضيف البعيد");
define('OGP_LANG_remote_host', "المضيف البعيد");
define('OGP_LANG_remote_host_info', "يجب أن يكون المضيف البعيد اسم مضيف قابل للتوسيع!");
define('OGP_LANG_remote_host_port', "بورت المضيف البعيد");
define('OGP_LANG_remote_host_port_info', "المنفذ الذي يستمع إليه وكيل OGP على المضيف البعيد. الافتراضي: 12679.");
define('OGP_LANG_remote_host_name', "إسم المضيف البعيد");
define('OGP_LANG_ogp_user', "اسم مستخدم وكيل OGP");
define('OGP_LANG_remote_host_name_info', "يستخدم اسم المضيف البعيد لمساعدة المستخدمين على تحديد خوادمهم.");
define('OGP_LANG_add_remote_host', "إضافة المضيف البعيد");
define('OGP_LANG_remote_encryption_key', "مفتاح التشفير عن بعد");
define('OGP_LANG_remote_encryption_key_info', "يستخدم مفتاح التشفير عن بعد لتشفير البيانات بين الفريق والوكيل. يجب أن يكون هذا المفتاح نفسه في كلا الجانبين.");
define('OGP_LANG_server_name', "إسم السيرفر");
define('OGP_LANG_agent_ip_port', "وكيل أيبي:بورت");
define('OGP_LANG_agent_status', "حالة الوكيل");
define('OGP_LANG_ips', "الأيبيهات");
define('OGP_LANG_add_more_ips', "إذا كنت ترغب في إدخال المزيد من الأيبيهات اضغط على \"تعيين الأيبي\" عندما تكون جميع الحقول ممتلئة وسوف يظهر حقل فارغ.");
define('OGP_LANG_encryption_key_mismatch', "لا يتطابق مفتاح التشفير مع الوكيل. يرجى إعادة التحقق من تهيئة الوكيل.");
define('OGP_LANG_no_ip_for_remote_host', "تحتاج إلى إضافة عنوان IP واحد (1) على الأقل لكل مضيف بعيد.");
define('OGP_LANG_note_remote_host', "المضيف البعيد هو خادم يعمل عليه وكيل OGP. يمكن أن يكون لكل مضيف عدد متعدد من عناوين IP التي يمكن للمستخدمين ربط الخوادم بها.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "خطأ غير معروف - تم إرجاع status_chk");
define('OGP_LANG_remote_host_user_name', "مستخدم UNIX");
define('OGP_LANG_remote_host_user_name_info', "اسم المستخدم حيث يعمل الوكيل. مثال: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "أيبي الأف تي بي");
define('OGP_LANG_remote_host_ftp_ip_info', "خادم بروتوكول نقل الملفات <b>IP</b> للوكيل الحالي.");
define('OGP_LANG_remote_host_ftp_port', "بورت الأف تي بي");
define('OGP_LANG_remote_host_ftp_port_info', "سيرفر الأف تي بي <b>بورت</b> للوكيل الحالي.");
define('OGP_LANG_view_log', "عرض السجل");
define('OGP_LANG_status', "الحالة");
define('OGP_LANG_stop_firewall', "إيقاف جدار الحماية");
define('OGP_LANG_start_firewall', "تشغيل جدار الحماية");
define('OGP_LANG_seconds', "ثواني");
define('OGP_LANG_reboot', "إعادة تشغيل سيرفر التحكم");
define('OGP_LANG_restart', "إعادة تشغبل الوكيل");
define('OGP_LANG_confirm_reboot', "هل أنت متأكد من أنك تريد إعادة تشغيل الوكيل المسمى '%s'؟");
define('OGP_LANG_confirm_restart', "هل أنت متأكد من أنك تريد إعادة تشغيل الوكيل المسمى '%s'؟");
define('OGP_LANG_restarting', "إعادة تشغيل الوكيل... الرجاء الإنتظار");
define('OGP_LANG_restarted', "تم إعادة تشغيل الوكيل بنجاح");
define('OGP_LANG_reboot_success', "تمت إعادة تمهيد الخادم المسمى '%s' بنجاح. لن تتمكن من الوصول إلى الخادم حتى يتم تمهيده بنجاح.");
define('OGP_LANG_invalid_remote_host_id', "تم تقديم معرف مضيف بعيد '%s' غير صالح");
define('OGP_LANG_remote_host_removed', "تمت إزالة المضيف البعيد المسمى '%s' بنجاح.");
define('OGP_LANG_editing_remote_server', "تعديل خادم بعيد المسمى '%s'");
define('OGP_LANG_remote_server_settings_changed', "تم تغيير إعدادات الخادم البعيد '%s' بنجاح.");
define('OGP_LANG_save_settings', "حفظ الإعدادات");
define('OGP_LANG_set_ips', "تعيين عناوين IP");
define('OGP_LANG_remote_ip', "عنوان IP بعيد");
define('OGP_LANG_remote_ips_for', "عنواين IP لخوادم الألعاب لاستخدامها على خادم الوكيل '%s'");
define('OGP_LANG_ips_set_for_server', "تم تعيين عناوين IP للخادم المسمى '%s' بنجاح.");
define('OGP_LANG_could_not_remove_ip', "تعذرت إزالة عناوين IP القديمة من قاعدة البيانات.");
define('OGP_LANG_could_add_ip', "يمكن إضافة IP الخادم البعيد إلى قاعدة البيانات.");
define('OGP_LANG_areyousure_removeagent', "هل أنت متأكد أنك تريد إزالة الوكيل المسمى");
define('OGP_LANG_areyousure_removeagent2', "وجميع المنازل المرتبطة به من قاعدة بيانات ogp؟");
define('OGP_LANG_error_while_remove', "حدث خطأ عند محاولة ازالة الخادم البعيد.");
define('OGP_LANG_add_ip', "اضافة عنوان IP");
define('OGP_LANG_remove_ip', "ازالة عنوان IP");
define('OGP_LANG_edit_ip', "تعديل عنوان IP");
define('OGP_LANG_wrote_changes', "تم حفظ التغييرات بنجاح.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "هناك خوادم تعمل على عنوان ال IP هذا.");
define('OGP_LANG_enter_ip_host', "يجب عليك ادخال عنوان IP للمضيف البعيد.");
define('OGP_LANG_enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('OGP_LANG_could_not_add_server', "تعذر اضافة الخادم");
define('OGP_LANG_to_db', "إلى قاعدة البيانات.");
define('OGP_LANG_added_server', "الخادم المضاف");
define('OGP_LANG_with_port', "مع المنفذ");
define('OGP_LANG_to_db_succesfully', "إلى قاعدة البيانات بنجاح.");
define('OGP_LANG_unable_discover', "تعذر اكتشاف عناوين IP تلقائيًا على");
define('OGP_LANG_set_ip_manually', "سيكون عليك ضبطها يدويًا.");
define('OGP_LANG_found_ips', "تم العثور على عناوين IP");
define('OGP_LANG_for_remote_server', "للخادم البعيد.");
define('OGP_LANG_failed_add_ip', "تعذر اضافة IP");
define('OGP_LANG_timeout', "نفذ الوقت");
define('OGP_LANG_timeout_info', "المهلة بالثواني للحصول على رد من هذا الوكيل.");
define('OGP_LANG_use_nat', "استخدم NAT");
define('OGP_LANG_use_nat_info', "Enable if your remote server is using NAT rules. Use this setting if your game servers are running on internal private LAN IP addresses so that the panel will use your real remote IP address to query the game servers.");
define('OGP_LANG_arrange_ports', "ترتيب المنافذ");
define('OGP_LANG_assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('OGP_LANG_assigned_ports_for_ip', "المنافذ المخصصة لـ IP %s");
define('OGP_LANG_unspecified_game_types', "أنواع الألعاب غير المحددة");
define('OGP_LANG_start_port', "Start port:");
define('OGP_LANG_end_port', "End port:");
define('OGP_LANG_port_increment', "Port increment:");
define('OGP_LANG_total_assignable_ports', "Total assignable ports:");
define('OGP_LANG_available_range_ports', "Available range ports:");
define('OGP_LANG_assign_range', "تعيين نطاق");
define('OGP_LANG_edit_range', "تحرير النطاق");
define('OGP_LANG_delete_range', "حذف النطاق");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Home path");
define('OGP_LANG_game_type', "Game type");
define('OGP_LANG_port', "المنفذ");
define('OGP_LANG_invalid_values', "قيم غير صالحة.");
define('OGP_LANG_ports_in_range_already_arranged', "Ports in range already arranged.");
define('OGP_LANG_ports_range_already_configured_for', "Ports range already configured for %s.");
define('OGP_LANG_ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Ports range deleted successfully.");
define('OGP_LANG_ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('OGP_LANG_default_allowed', "Allowed by default");
define('OGP_LANG_allow_port_command', "Allow port command");
define('OGP_LANG_deny_port_command', "Deny port command");
define('OGP_LANG_allow_ip_port_command', "Allow IP:port command");
define('OGP_LANG_deny_ip_port_command', "Deny IP:port command");
define('OGP_LANG_enable_firewall_command', "Enable firewall command");
define('OGP_LANG_disable_firewall_command', "Disable firewall command");
define('OGP_LANG_get_firewall_status_command', "Get firewall status command");
define('OGP_LANG_reset_firewall_command', "Reset firewall command");
define('OGP_LANG_firewall_status', "حالة جدار الحماية");
define('OGP_LANG_save_firewall_settings', "Save firewall settings");
define('OGP_LANG_reset_firewall', "Reset Firewall");
define('OGP_LANG_firewall_settings', "اعدادات جدار الحماية");
define('OGP_LANG_display_public_ip', "عرض IP العام");
define('OGP_LANG_ips_can_be_internal_external', "Enter usable IP addresses.&nbsp; Public IP addresses and internal LAN IP addresses (for NAT setups) can be used.");
?>
