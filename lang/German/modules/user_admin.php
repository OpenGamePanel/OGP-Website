<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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

$lang['your_profile'] = "Dein Profil";
$lang['new_password'] = "Neues Passwort";
$lang['retype_new_password'] = "Passwort wiederholen";
$lang['login_name'] = "Benutzername";
$lang['language'] = "Sprache";
$lang['first_name'] = "Vorname";
$lang['last_name'] = "Nachname";
$lang['phone_number'] = "Telefonnummer";
$lang['email_address'] = "E-Mail Adresse";
$lang['city'] = "Stadt";
$lang['province'] = "Bundesland/Kanton";
$lang['country'] = "Land";
$lang['comment'] = "Kommentar";
$lang['expires'] = "Läuft ab";
$lang['save_profile'] = "Profil speichern";
$lang['new_password_info'] = "When password field is empty the password will not be updated.";
$lang['theme'] = "Theme";
$lang['theme_info'] = "If theme is empty the global value is used.";
$lang['expires_info'] = "Date when the user account expires. The account is not deleted, but user can not login anymore.";

$lang['password_mismatch'] = "Die Passwörter stimmen nicht überein.";

$lang['current_password'] = "Aktuelles Passwort";
$lang['current_password_info'] = "Dein aktuelles Passwort.";
$lang['current_password_mismatch'] = "Your current password did not match to the one in database.";

// show_users.php
$lang['add_new_user'] = "Neuen Benutzer hinzufügen";
$lang['edit_user_groups'] = "Edit User Groups";
$lang['users'] = "Benutzer";
$lang['username'] = "Benutzername";
$lang['user_role'] = "Rolle";
$lang['full_name'] = "Full Name";
$lang['edit_games'] = "Edit Games";
$lang['edit_profile'] = "Profil bearbeiten";
$lang[''] = "";

// add_user.php
$lang['confirm_password'] = "Passwort wiederholen";
$lang['you_need_to_enter_both_passwords'] = "You need to enter both passwords.";
$lang['passwords_did_not_match'] = "Die Passwörter stimmen nicht überein.";
$lang['could_not_add_user_because_user_already_exists'] = "Could not add user, because user <em>%s</em> already exists.";
$lang['successfully_added_user'] = "Successfully added user <em>%s</em>.";
$lang['add_a_new_user'] = "Add a new user";
$lang['admin'] = "Admin";
$lang['user'] = "User";
$lang['add_user'] = "Add User";
$lang['user_with_id_does_not_exist'] = "User with ID %s does not exist.";
$lang['are_you_sure_you_want_to_delete_user'] = "Are you sure you want to delete user <em>%s</em>?";
$lang['unable_to_delete_user'] = "Unable to delete user %s.";
$lang['successfully_deleted_user'] = "Successfully deleted user <b>%s</b>.";
$lang['failed_to_update_user_profile_error'] = "Failed to update user profile. Error: %s";
$lang['profile_of_user_modified_successfully'] = "Profile of user <b>%s</b> was modified successfully.";
$lang[''] = "";
$lang[''] = "";

// subuser used in show_groups.php
$lang['no_subusers'] = "No subusers are available to be assigned to a group. Please create subuser accounts.";
$lang['ownedby'] = "Parent Owner";
$lang['andSubUsers'] = " And all of his subusers?"; 

// *_group.php
$lang['info_group'] = "From this page it is possible to determine user groups. You can assign servers to group so that they are availble for all of the group users.";
$lang['add_new_group'] = "Neue Gruppe hinzufügen";
$lang['group_name'] = "Gruppen Name";
$lang['add_group'] = "Gruppe hinzufügen";
$lang['no_groups_available'] = "Keine Gruppen verfügbar.";
$lang['delete_group'] = "Gruppe löschen";
$lang['add_user_to_group'] = "Benutzer zur Gruppe hinzufügen";
$lang['add_user'] = "Benutzer hinzufügen";
$lang['remove_from_group'] = "Benutzer von Gruppe entfernen";
$lang['add_server_to_group'] = "Add server to group";
$lang['add_server'] = "Add Server";
$lang['no_remote_servers'] = "No remote servers available.";
$lang['servers_in_group'] = "Servers in group";
$lang['no_servers_in_group'] = "No servers in group %s.";
$lang['available_groups'] = "Verfügbare Gruppen";
$lang['assign_homes'] = "Homes zuweisen";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// add_group.php
$lang['successfully_added_group'] = "Successfully added group %s.";
$lang['group_name_empty'] = "Group name can not be empty.";
$lang['failed_to_add_group'] = "Failed to add group %s.";
$lang['could_not_add_user_to_group'] = "Could not add user %s to group %s, because already belongs.";
$lang['successfully_added_to_group'] = ">Successfully added %s to group <em>%s</em>.";
$lang['could_not_add_server_to_group'] = "Could not add server to group %s, because already belongs.";
$lang['successfully_added_server_to_group'] = "Successfully added server to group <em>%s</em>.";
$lang['successfully_removed_from_group'] = "Successfully removed %s from group <em>%s</em>.";
$lang['could_not_delete_server_from_group'] = "Could not delete server %s from group <em>%s</em>.";
$lang['successfully_removed_server_from_group'] = "Successfully removed server %s from group <em>%s</em>.";
$lang['group_with_id_does_not_exist'] = "User with ID %s does not exist.";
$lang['are_you_sure_you_want_to_delete_group'] = "Are you sure you want to delete group <em>%s/em>?";
$lang['unable_to_delete_group'] = "Unable to delete user %s.";
$lang['successfully_deleted_group'] = "Successfully deleted group <b>%s</b>.";
$lang[''] = "";
$lang[''] = "";



?>
