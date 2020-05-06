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

define('OGP_LANG_add_new_remote_host', "הוסף מארח מרוחק חדש");
define('OGP_LANG_configured_remote_hosts', "מארח מרוחק מוגדר");
define('OGP_LANG_remote_host', "מארח מרוחק");
define('OGP_LANG_remote_host_info', "המארח המרוחק חייב להיות שם מארח אפשרי לשליחת פינג ");
define('OGP_LANG_remote_host_port', "פורט מארח מרוחק");
define('OGP_LANG_remote_host_port_info', "הפורט שמאוזן על ידי סוכן OGP במארח מרוחק. 
ברירת מחדל: 12679.");
define('OGP_LANG_remote_host_name', "שם מארח מרוחק");
define('OGP_LANG_ogp_user', "שם משתמש סוכן OGP");
define('OGP_LANG_remote_host_name_info', "שם מארח מרוחק משומש בשביל לעזור למשתמשים לזהות את השרתים שלהם.");
define('OGP_LANG_add_remote_host', "הוסף מארח מרוחק");
define('OGP_LANG_remote_encryption_key', "מפתח הצפנה מרוחק");
define('OGP_LANG_remote_encryption_key_info', "מפתח קידוד מרוחק משומש לקידוד נתונים בין הפאנל לסוכן. מפתח זה צריך להיות בשתי הצדדים.");
define('OGP_LANG_server_name', "שם השרת");
define('OGP_LANG_agent_ip_port', "סוכן אייפי:פורט");
define('OGP_LANG_agent_status', "מצב סוכן");
define('OGP_LANG_ips', "אייפים");
define('OGP_LANG_add_more_ips', "If you want to enter more IPs press 'Set IPs' when all fields are full and an empty field will appear.");
define('OGP_LANG_encryption_key_mismatch', "Encryption key does not match with the Agent. Please recheck your Agent configuration.");
define('OGP_LANG_no_ip_for_remote_host', "You need to add at least one (1) IP address for each remote host.");
define('OGP_LANG_note_remote_host', "A remote host is a server where the OGP Agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "שגיאה לא ידועה - מצב_chk הוחזרה");
define('OGP_LANG_remote_host_user_name', "משתמש UNIX");
define('OGP_LANG_remote_host_user_name_info', "Username where the Agent is running. Example: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP אייפי");
define('OGP_LANG_remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current Agent.");
define('OGP_LANG_remote_host_ftp_port', "פורט FTP");
define('OGP_LANG_remote_host_ftp_port_info', "The FTP server <b>port</b> for the current Agent.");
define('OGP_LANG_view_log', "צפה ביומן");
define('OGP_LANG_status', "מצב");
define('OGP_LANG_stop_firewall', "הפסק חומת אש");
define('OGP_LANG_start_firewall', "התחל חומת אש");
define('OGP_LANG_seconds', "שניות");
define('OGP_LANG_reboot', "הפעלת שרת מרוחקת");
define('OGP_LANG_restart', "הפעל סוכן מחדש");
define('OGP_LANG_confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('OGP_LANG_confirm_restart', "Are you sure you want to restart the Agent named '%s'?");
define('OGP_LANG_restarting', "מפעיל סוכן מחדש... אנה המתן.");
define('OGP_LANG_restarted', "סוכן הופעל מחדש בהצלחה.");
define('OGP_LANG_reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('OGP_LANG_invalid_remote_host_id', "ניתן מזהה שרת '%s' מרוחק שגוי.");
define('OGP_LANG_remote_host_removed', "Remote host called '%s' removed successfully.");
define('OGP_LANG_editing_remote_server', "Editing remote server called '%s'");
define('OGP_LANG_remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('OGP_LANG_save_settings', "שמור הגדרות");
define('OGP_LANG_set_ips', "הגדרת כתובת IPs");
define('OGP_LANG_remote_ip', "אייפי מרוחק");
define('OGP_LANG_remote_ips_for', "IPs for Game Servers To Use on Agent Server '%s'");
define('OGP_LANG_ips_set_for_server', "IPs הוגדר לסרבר הנקרא '%s' בהצלחה.");
define('OGP_LANG_could_not_remove_ip', "לא יכול להסיר כתובת אייפי ישנה ממאגר הנתונים.");
define('OGP_LANG_could_add_ip', "יכול להוסיף אייפי של שרת מרוחק אל מאגר הנתונים.");
define('OGP_LANG_areyousure_removeagent', "Are you sure you want to remove the Agent called");
define('OGP_LANG_areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('OGP_LANG_error_while_remove', "אירעה שגיאה בעת הסרת שרת מרוחק.");
define('OGP_LANG_add_ip', "הוסף אייפי");
define('OGP_LANG_remove_ip', "הסר אייפי");
define('OGP_LANG_edit_ip', "ערוך אייפי");
define('OGP_LANG_wrote_changes', "שינויים נשמרו בהצלחה");
define('OGP_LANG_there_are_servers_running_on_this_ip', "יש שרתים שכבר משתמשים בכתובת אייפי זו.");
define('OGP_LANG_enter_ip_host', "אתה חייב להכניס אייפי בשביל המארח המרוחק");
define('OGP_LANG_enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('OGP_LANG_could_not_add_server', "לא יכול להוסיף שרת");
define('OGP_LANG_to_db', "אל מאגר הנתונים");
define('OGP_LANG_added_server', "שרת התווסף");
define('OGP_LANG_with_port', "עם פורט");
define('OGP_LANG_to_db_succesfully', "אל מאגר הנתונים בהצלחה.");
define('OGP_LANG_unable_discover', "לא יכול למצוא IPs באופן אוטומטי ב");
define('OGP_LANG_set_ip_manually', "תצטרך להוסיף אותם באופן ידני.");
define('OGP_LANG_found_ips', "IPs נמצא");
define('OGP_LANG_for_remote_server', "בשביל השרת המרוחק.");
define('OGP_LANG_failed_add_ip', "נכשל בהוספת אייפי");
define('OGP_LANG_timeout', "פסק זמן");
define('OGP_LANG_timeout_info', "ההגבלה בשניות כדי לקבל תגובה מסוכן זה.");
define('OGP_LANG_use_nat', "השתמש ב NAT");
define('OGP_LANG_use_nat_info', "Enable if your remote server is using NAT rules. Use this setting if your game servers are running on internal private LAN IP addresses so that the panel will use your real remote IP address to query the game servers.");
define('OGP_LANG_arrange_ports', "ארגן פורטים");
define('OGP_LANG_assign_new_ports_range_for_ip', "הקצה טווח פורטים חדש עבור אייפי %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "טווח פורטים מוקצים עבור אייפי %s");
define('OGP_LANG_assigned_ports_for_ip', "פרוטים מוקצים עבור אייפי %s");
define('OGP_LANG_unspecified_game_types', "סוגי משחק לא מוגדרים");
define('OGP_LANG_start_port', "פורט: התחלתי");
define('OGP_LANG_end_port', "פורט: סופי");
define('OGP_LANG_port_increment', "פורט מתווסף:");
define('OGP_LANG_total_assignable_ports', "סך כל הפורטים: הניתנים להקצאה");
define('OGP_LANG_available_range_ports', "טווח פורטים זמינים");
define('OGP_LANG_assign_range', "טווח הקצאה");
define('OGP_LANG_edit_range', "טווח עריכה");
define('OGP_LANG_delete_range', "טווח מחיקה");
define('OGP_LANG_home_id', "מזהה בית");
define('OGP_LANG_home_path', "נטיב בית");
define('OGP_LANG_game_type', "סוג משחק");
define('OGP_LANG_port', "פורט");
define('OGP_LANG_invalid_values', "ערכים שגויים.");
define('OGP_LANG_ports_in_range_already_arranged', "פורטים בטווח כבר מאורגנים.");
define('OGP_LANG_ports_range_already_configured_for', "טווח פורטים כבר מוגדר עבור %s.");
define('OGP_LANG_ports_range_added_successfull_for', "טווח פורטים נוסף בהצלחה עבור %s.");
define('OGP_LANG_ports_range_deleted_successfull', "טווח פורטים נמחק בהצלחה.");
define('OGP_LANG_ports_range_edited_successfull_for', "טווח פורטים נערך בהצלחה עבור %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "עורך חומת אש עבור שרת מרוחק בשם '%s'");
define('OGP_LANG_default_allowed', "מורשה כברירת מחדל");
define('OGP_LANG_allow_port_command', "פקודת הרשאת פורט");
define('OGP_LANG_deny_port_command', "פקודת שלילת פורט");
define('OGP_LANG_allow_ip_port_command', "פקודת הרשאת אייפי:ופורט");
define('OGP_LANG_deny_ip_port_command', "פקודת שלילת אייפי:ופורט");
define('OGP_LANG_enable_firewall_command', "פקודת הפעלת חומת אש");
define('OGP_LANG_disable_firewall_command', "פקודת ביטול חומש אש");
define('OGP_LANG_get_firewall_status_command', "פקודת קבלת מצב חומת אש");
define('OGP_LANG_reset_firewall_command', "פקודת איפוס חומת אש");
define('OGP_LANG_firewall_status', "מצב חומת האש");
define('OGP_LANG_save_firewall_settings', "שמור הגדרות חומת אש");
define('OGP_LANG_reset_firewall', "איפוס חומת אש");
define('OGP_LANG_firewall_settings', "הגדרות חומת אש");
define('OGP_LANG_display_public_ip', "הצג כתובת אייפי ציבורית");
define('OGP_LANG_ips_can_be_internal_external', "הכנס כתובת אייפי שמישה ו nbsp; כתובת אייפי ציבורית ו כתובת אייפי LAN פנימית (בשביל התקנות NAT) שמישים.");
?>
