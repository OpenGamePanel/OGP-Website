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

define('OGP_LANG_error', "שגיאה");
define('OGP_LANG_title', "ממשק אינטרנט לטים ספיק 3");
define('OGP_LANG_update_available', "<h3>שים לב: גרסא חדשה (v%1) של תוכנה זו זמינה תחת <a href=\"%2\" target=\"_blank\">%2</a>.</h3> ");
define('OGP_LANG_head_logout', "התנתקות");
define('OGP_LANG_head_vserver_switch', "שנה ויסרבר");
define('OGP_LANG_head_vserver_overview', "ויסרבר סקירה כללית");
define('OGP_LANG_head_vserver_token', "ניהול טוקן.");
define('OGP_LANG_head_vserver_liveview', "שידור חי");
define('OGP_LANG_e_fill_out', "בבקשה מלא את כל השדות המבוקשים.");
define('OGP_LANG_e_upload_failed', "העלאה כשלה.");
define('OGP_LANG_e_server_responded', "השרת הגיב:");
define('OGP_LANG_e_conn_serverquery', "לא ניתן היה ליצור גישה לשאילתת שרת ServerQuery.");
define('OGP_LANG_e_conn_vserver', "לא ניתן לבחור בשרת וירטואלי.");
define('OGP_LANG_e_session_timedout', "פג תוקף החיבור.");
define('OGP_LANG_js_error', "שגיאה");
define('OGP_LANG_js_ajax_error', "אירעה שגיאת AJAX: % 1.");
define('OGP_LANG_js_confirm_server_stop', "האם ברצונך לעצור את השרת #%1 ?");
define('OGP_LANG_js_confirm_server_delete', "האם אתה באמת רוצה למחוק את השרת #%1 ?");
define('OGP_LANG_js_notice_server_deleted', "השרת% 1 נמחק בהצלחה./nדף הסקירה יעלה מחדש.");
define('OGP_LANG_js_prompt_banduration', "משך שעות (0 = ללא הגבלה):");
define('OGP_LANG_js_prompt_banreason', "סיבה (אופציה)");
define('OGP_LANG_js_prompt_msg_to', "הודעת טקסט ל- %1 #%2:");
define('OGP_LANG_js_prompt_poke_to', "שלח הודעה ללקוח מס #%1:");
define('OGP_LANG_js_prompt_new_propvalue', "ערך חדש עבור '%1':");
define('OGP_LANG_n_server_responded', "השרת הגיב:");
define('OGP_LANG_login_serverquery', "כניסה לשאילתת שרת ServerQuery.");
define('OGP_LANG_login_name', "שם משתמש");
define('OGP_LANG_login_password', "סיסמה");
define('OGP_LANG_login_submit', "התחבר");
define('OGP_LANG_vsselect_headline', "בחירת ויסרבר");
define('OGP_LANG_vsselect_id', "איידי #");
define('OGP_LANG_vsselect_name', "שם");
define('OGP_LANG_vsselect_ip', "אייפי");
define('OGP_LANG_vsselect_port', "פורט");
define('OGP_LANG_vsselect_state', "מצב");
define('OGP_LANG_vsselect_clients', "לקוחות");
define('OGP_LANG_vsselect_uptime', "זמן עבודה");
define('OGP_LANG_vsselect_choose', "בחר");
define('OGP_LANG_vsselect_start', "התחל");
define('OGP_LANG_vsselect_stop', "הפסק");
define('OGP_LANG_vsselect_delete', "מחק");
define('OGP_LANG_vsselect_new_headline', "צור שרת וירטואלי חדש");
define('OGP_LANG_vsselect_new_servername', "שם השרת");
define('OGP_LANG_vsselect_new_slots', "סלוטים לקוח");
define('OGP_LANG_vsselect_new_create', "צור");
define('OGP_LANG_vsselect_new_added_ok', "ויסרבר <span class=\"online\">%1</span> נוצר בהצלחה.");
define('OGP_LANG_vsselect_new_added_generated', "האסימון שנוצר הוא:");
define('OGP_LANG_vsoverview_virtualserver', "סרבר ווירטואלי");
define('OGP_LANG_vsoverview_information_head', "מידע");
define('OGP_LANG_vsoverview_connection_head', "חיבור");
define('OGP_LANG_vsoverview_info_general_head', "הגדרות כלליות");
define('OGP_LANG_vsoverview_info_servername', "שם שרת");
define('OGP_LANG_vsoverview_info_host', "מארח");
define('OGP_LANG_vsoverview_info_state', "מצב");
define('OGP_LANG_vsoverview_info_state_port', "פורט");
define('OGP_LANG_vsoverview_info_uptime', "זמן עבודה");
define('OGP_LANG_vsoverview_info_welcomemsg', "הודעת <br /> ברוך הבא");
define('OGP_LANG_vsoverview_info_hostmsg', "הודעה מארח");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "מוצא");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "אף אחד");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "ביומן הצ'אט");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "חלון");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "חלון + התנתק");
define('OGP_LANG_vsoverview_info_req_security', "רמת אבטחה");
define('OGP_LANG_vsoverview_info_req_securitylvl', "נדרש");
define('OGP_LANG_vsoverview_info_hostbanner_head', "באנר מארח");
define('OGP_LANG_vsoverview_info_hostbanner_url', "כתובת אתר");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "כתובת תמונה");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "כתובת אתר לחצן מארח");
define('OGP_LANG_vsoverview_info_antiflood_head', "נגד הצפה");
define('OGP_LANG_vsoverview_info_antiflood_warning', "אזהרה על");
define('OGP_LANG_vsoverview_info_antiflood_kick', "קיק על");
define('OGP_LANG_vsoverview_info_antiflood_ban', "באן על");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "משך באן");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "לפחות");
define('OGP_LANG_vsoverview_info_antiflood_points', "נקודות");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "שניות");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "נקודות לתיקייה");
define('OGP_LANG_vsoverview_conn_total_head', "סך הכל");
define('OGP_LANG_vsoverview_conn_total_packets', "חבילות");
define('OGP_LANG_vsoverview_conn_total_bytes', "בייט");
define('OGP_LANG_vsoverview_conn_total_send', "נשלח");
define('OGP_LANG_vsoverview_conn_total_received', "התקבל");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "רוחב פס");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "אחרון");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "שני");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "דקה");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "נשלח");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "התקבל");
define('OGP_LANG_vstoken_token_virtualserver', "שרת ווירטואלי");
define('OGP_LANG_vstoken_token_head', "אסימון");
define('OGP_LANG_vstoken_token_type', "סוג קבוצה");
define('OGP_LANG_vstoken_token_id1', "קבוצת שרת/<br /> קבוצת ערוץ");
define('OGP_LANG_vstoken_token_id2', "(ערוץ)");
define('OGP_LANG_vstoken_token_tokencode', "קוד אסימון");
define('OGP_LANG_vstoken_token_delete', "מחק");
define('OGP_LANG_vstoken_new_head', "צור אסימון חדש");
define('OGP_LANG_vstoken_new_create', "ליצור");
define('OGP_LANG_vstoken_new_tokentype', "סוג אסימון:");
define('OGP_LANG_vstoken_new_servergroup', "קבוצת שרת");
define('OGP_LANG_vstoken_new_channelgroup', "קבוצת ערוץ");
define('OGP_LANG_vstoken_new_select_group', "קבוצת שרת");
define('OGP_LANG_vstoken_new_select_channelgroup', "קבוצת ערוץ");
define('OGP_LANG_vstoken_new_select_channel', "ערוץ");
define('OGP_LANG_vstoken_new_tokentype_0', "שרת");
define('OGP_LANG_vstoken_new_tokentype_1', "ערוץ");
define('OGP_LANG_vstoken_new_added_ok', "האסימון נוצר בהצלחה.");
define('OGP_LANG_vsliveview_server_virtualserver', "שרת ווירטואלי");
define('OGP_LANG_vsliveview_server_head', "שידור חי");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "רענון אוטומטי");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "ל ערוץ #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "החלך");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "שלח הודעה");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "נדנד");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "בעיטה");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "באן");
define('OGP_LANG_vsoverview_banlist_head', "רשימת באנים");
define('OGP_LANG_vsoverview_banlist_id', "איידי #");
define('OGP_LANG_vsoverview_banlist_ip', "אייפי");
define('OGP_LANG_vsoverview_banlist_name', "שם");
define('OGP_LANG_vsoverview_banlist_uid', "איידי יחודי");
define('OGP_LANG_vsoverview_banlist_reason', "סיבה");
define('OGP_LANG_vsoverview_banlist_created', "נוצר");
define('OGP_LANG_vsoverview_banlist_duration', "תקופה");
define('OGP_LANG_vsoverview_banlist_end', "מסתיים");
define('OGP_LANG_vsoverview_banlist_unlimited', "ללא הגבלה");
define('OGP_LANG_vsoverview_banlist_never', "אף פעם");
define('OGP_LANG_vsoverview_banlist_new_head', "צור באן חדש");
define('OGP_LANG_vsoverview_banlist_new_create', "צור");
define('OGP_LANG_vsliveview_channelbackup_head', "גיבוי ערוץ");
define('OGP_LANG_vsliveview_channelbackup_get', "צור והורד");
define('OGP_LANG_vsliveview_channelbackup_load', "העלה את גיבוי הערוץ");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "ליצור מחדש");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "גיבוי הערוץ הצליח.");
define('OGP_LANG_time_day', "יום");
define('OGP_LANG_time_days', "ימים");
define('OGP_LANG_time_hour', "שעה");
define('OGP_LANG_time_hours', "שעות");
define('OGP_LANG_time_minute', "דקה");
define('OGP_LANG_time_minutes', "דקות");
define('OGP_LANG_time_second', "שניה");
define('OGP_LANG_time_seconds', "שניות");
define('OGP_LANG_e_2568', "אין לך מספיק זכויות.");
define('OGP_LANG_temp_folder_not_writable', "לא ניתן לכתוב (%s) את תיקיית התבניות");
define('OGP_LANG_unassign_from_subuser', "בטל הקצאה מהמשתמש.");
define('OGP_LANG_assign_to_subuser', "קשר לתת משתמש.");
define('OGP_LANG_select_subuser', "בחר תת משתמש.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "אין לך שרתים מוקצים לחשבון שלך.");
define('OGP_LANG_change_virtual_server', "שנה סרבר ווירטואלי");
define('OGP_LANG_change_remote_server', "שינוי שרת מרוחק");
?>