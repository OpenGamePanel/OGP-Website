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

define('OGP_LANG_error', "خطأ");
define('OGP_LANG_title', "واجهة ويب TeamSpeak 3");
define('OGP_LANG_update_available', "<h3>تنبيه: يتوفر إصدار جديد (v%1) متاح تحت <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "تسجيل الخروج");
define('OGP_LANG_head_vserver_switch', "تغيير vServer");
define('OGP_LANG_head_vserver_overview', "vServer نظرة عامة");
define('OGP_LANG_head_vserver_token', "إدارة الرموز");
define('OGP_LANG_head_vserver_liveview', "المعاينة الحية");
define('OGP_LANG_e_fill_out', "من فضلك إملأ كل الخانات المطلوبة.");
define('OGP_LANG_e_upload_failed', "الرفع غير ناجح.");
define('OGP_LANG_e_server_responded', "استجابة السيرفر:");
define('OGP_LANG_e_conn_serverquery', "تعذر إنشاء صلاحيات ServerQuery.");
define('OGP_LANG_e_conn_vserver', "لا يمكن اختيار الخادم الإفتراضي.");
define('OGP_LANG_e_session_timedout', "انتهت صلاحية الجلسة.");
define('OGP_LANG_js_error', "خطأ");
define('OGP_LANG_js_ajax_error', "خطأ AJAX قد حدث: %1.");
define('OGP_LANG_js_confirm_server_stop', "هل تريد بالفعل إيقاف السيرفر #%1؟");
define('OGP_LANG_js_confirm_server_delete', "هل تريد حقاً حذف الخادم #%1؟");
define('OGP_LANG_js_notice_server_deleted', "تم حذف الخادم %1 بنجاح.\nستتم إعادة تحميل صفحة النظرة العامة الآن.");
define('OGP_LANG_js_prompt_banduration', "المدة بالساعات (0= غير محدود):");
define('OGP_LANG_js_prompt_banreason', "السبب (اختياري):");
define('OGP_LANG_js_prompt_msg_to', "رسالة نصية إلى %1 #%2:");
define('OGP_LANG_js_prompt_poke_to', "رسالة نكز إلى المستخدم #%1:");
define('OGP_LANG_js_prompt_new_propvalue', "قيمة جديدة لـ '%1': ");
define('OGP_LANG_n_server_responded', "السيرفر استجاب:");
define('OGP_LANG_login_serverquery', "تسجيل دخول ServerQuery");
define('OGP_LANG_login_name', "إسم المستخدم");
define('OGP_LANG_login_password', "كلمة المرور");
define('OGP_LANG_login_submit', "تسجيل الدخول");
define('OGP_LANG_vsselect_headline', "اختيار vServer");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "إسم");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Port");
define('OGP_LANG_vsselect_state', "الحالة");
define('OGP_LANG_vsselect_clients', "عملاء");
define('OGP_LANG_vsselect_uptime', "مدة التشغيل");
define('OGP_LANG_vsselect_choose', "اختر");
define('OGP_LANG_vsselect_start', "إبدأ");
define('OGP_LANG_vsselect_stop', "توقف");
define('OGP_LANG_vsselect_delete', "حذف");
define('OGP_LANG_vsselect_new_headline', "إنشاء سيرفر افتراضي جديد");
define('OGP_LANG_vsselect_new_servername', "إسم السيرفر");
define('OGP_LANG_vsselect_new_slots', "عدد المستخدمين");
define('OGP_LANG_vsselect_new_create', "انشاء");
define('OGP_LANG_vsselect_new_added_ok', "تم إنشاء السيرفر <span class=\"online\">%1</span> بنجاح.");
define('OGP_LANG_vsselect_new_added_generated', "الرمز الذي تم إنشاؤه هو:");
define('OGP_LANG_vsoverview_virtualserver', "خادم إفتراضي");
define('OGP_LANG_vsoverview_information_head', "معلومات");
define('OGP_LANG_vsoverview_connection_head', "اتصال");
define('OGP_LANG_vsoverview_info_general_head', "الإعدادت العامة");
define('OGP_LANG_vsoverview_info_servername', "إسم السيرفر");
define('OGP_LANG_vsoverview_info_host', "المضيف");
define('OGP_LANG_vsoverview_info_state', "الحالة");
define('OGP_LANG_vsoverview_info_state_port', "Port");
define('OGP_LANG_vsoverview_info_uptime', "مدة التشغيل");
define('OGP_LANG_vsoverview_info_welcomemsg', "رسالة<br />الترحيب");
define('OGP_LANG_vsoverview_info_hostmsg', "رسالة المضيف");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "الناتج");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "لاشيء");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "في سجل المحادثات");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "نافذة");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "نافذة + قطع الإتصال");
define('OGP_LANG_vsoverview_info_req_security', "مستوى الأمان");
define('OGP_LANG_vsoverview_info_req_securitylvl', "مطلوب");
define('OGP_LANG_vsoverview_info_hostbanner_head', "شعار المضيف");
define('OGP_LANG_vsoverview_info_hostbanner_url', "الرابط");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "عنوان الصورة");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "عنوان URL لزر المضيف");
define('OGP_LANG_vsoverview_info_antiflood_head', "مكافحة الفيضانات");
define('OGP_LANG_vsoverview_info_antiflood_warning', "تحذير عند");
define('OGP_LANG_vsoverview_info_antiflood_kick', "طرد عند");
define('OGP_LANG_vsoverview_info_antiflood_ban', "حظر عند");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "مدة الحظر");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "إنقاص");
define('OGP_LANG_vsoverview_info_antiflood_points', "نقاط");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "ثواني");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "نقاط لكل جزء من الثانية");
define('OGP_LANG_vsoverview_conn_total_head', "المجموع");
define('OGP_LANG_vsoverview_conn_total_packets', "حِزَمْ");
define('OGP_LANG_vsoverview_conn_total_bytes', "بايت");
define('OGP_LANG_vsoverview_conn_total_send', "تم الإرسال");
define('OGP_LANG_vsoverview_conn_total_received', "تم الإستلام");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "النطاق");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "الأخير");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "ثانية");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "دقيقة");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "تم الإرسال");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "تم الإستلام");
define('OGP_LANG_vstoken_token_virtualserver', "السيرفر الإفتراضي");
define('OGP_LANG_vstoken_token_head', "الرمز");
define('OGP_LANG_vstoken_token_type', "نوع المجموعة");
define('OGP_LANG_vstoken_token_id1', "مجموعة السيرفر\<br />مجموعة القناة");
define('OGP_LANG_vstoken_token_id2', "(قناة)");
define('OGP_LANG_vstoken_token_tokencode', "رمز الشفرة");
define('OGP_LANG_vstoken_token_delete', "حذف");
define('OGP_LANG_vstoken_new_head', "إنشاء رمز جديد");
define('OGP_LANG_vstoken_new_create', "توليد");
define('OGP_LANG_vstoken_new_tokentype', "نوع الرمز:");
define('OGP_LANG_vstoken_new_servergroup', "مجموعة السيرفر");
define('OGP_LANG_vstoken_new_channelgroup', "مجموعة القناة");
define('OGP_LANG_vstoken_new_select_group', "مجموعة السيرفر");
define('OGP_LANG_vstoken_new_select_channelgroup', "مجموعة القناة ");
define('OGP_LANG_vstoken_new_select_channel', "القناة");
define('OGP_LANG_vstoken_new_tokentype_0', "السيرفر");
define('OGP_LANG_vstoken_new_tokentype_1', "القناة");
define('OGP_LANG_vstoken_new_added_ok', "تم إنشاء الرمز بنجاح.");
define('OGP_LANG_vsliveview_server_virtualserver', "السيرفر الإفتراضي");
define('OGP_LANG_vsliveview_server_head', "مشاهدة حية");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "تحديث تلقائي");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "إلى القناة #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "تبديل");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "إرسال رسالة");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "نكز");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "طرد");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "حظر");
define('OGP_LANG_vsoverview_banlist_head', "قائمة الحظر");
define('OGP_LANG_vsoverview_banlist_id', "الأيدي #");
define('OGP_LANG_vsoverview_banlist_ip', "IP");
define('OGP_LANG_vsoverview_banlist_name', "الإسم");
define('OGP_LANG_vsoverview_banlist_uid', "أيدي فريد");
define('OGP_LANG_vsoverview_banlist_reason', "السبب");
define('OGP_LANG_vsoverview_banlist_created', "تم الإنشاء");
define('OGP_LANG_vsoverview_banlist_duration', "المدة");
define('OGP_LANG_vsoverview_banlist_end', "تنتهي");
define('OGP_LANG_vsoverview_banlist_unlimited', "غير محدود");
define('OGP_LANG_vsoverview_banlist_never', "أبداً");
define('OGP_LANG_vsoverview_banlist_new_head', "إنشاء حظر جديد");
define('OGP_LANG_vsoverview_banlist_new_create', "إنشاء");
define('OGP_LANG_vsliveview_channelbackup_head', "قناة النسخ الإحتياطي");
define('OGP_LANG_vsliveview_channelbackup_get', "إنشاء و تحميل");
define('OGP_LANG_vsliveview_channelbackup_load', "رفع قناة النسخ الاحتياطي");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "إعادة إنشاء");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "النسخة إحطياطية للقناتة بنجاح.");
define('OGP_LANG_time_day', "يوم");
define('OGP_LANG_time_days', "أيام");
define('OGP_LANG_time_hour', "ساعة");
define('OGP_LANG_time_hours', "ساعات");
define('OGP_LANG_time_minute', "دقيقة");
define('OGP_LANG_time_minutes', "دقائق");
define('OGP_LANG_time_second', "ثانية");
define('OGP_LANG_time_seconds', "ثواني");
define('OGP_LANG_e_2568', "ليس لديك الصلاحيات اللازمة.");
define('OGP_LANG_temp_folder_not_writable', "مجلد القوالب (%s) غير قابلة للكتابة.");
define('OGP_LANG_unassign_from_subuser', "إلغاء تعيين من المستخدم الفرعي.");
define('OGP_LANG_assign_to_subuser', "تعين إلى المستخدم الفرعي.");
define('OGP_LANG_select_subuser', "تعين المستخدم الفرعي.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "لا يوجد لديك خوادم تم تعيينها لحسابك.");
define('OGP_LANG_change_virtual_server', "تغيير الخادم الافتراضي");
define('OGP_LANG_change_remote_server', "تغيير الخادم عن بعد");
?>