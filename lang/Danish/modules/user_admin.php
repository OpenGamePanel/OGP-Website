<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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

define('your_profile', "Din profil");
define('new_password', "Ny Kodeord");
define('retype_new_password', "Indtast kodeord igen");
define('login_name', "Brugerens navn");
define('language', "Sprog");
define('first_name', "Fornavn");
define('page_limit', "Items per Page");
define('last_name', "Efternavn");
define('phone_number', "Telefon nummer");
define('email_address', "Email address");
define('city', "By");
define('province', "Region");
define('country', "Land");
define('comment', "Kommentar");
define('expires', "Udløber");
define('save_profile', "Gem profil");
define('new_password_info', "Hvis feltet hvor kodeordet er tomt, ville kodeordet ikke blive opdateret.");
define('theme', "Tema");
define('theme_info', "Dette tema, ville være det standarde tema for alle brugere. Brugere kan ændre deres tema, fra profil siden.");
define('expires_info', "Dato på, hvornår kontoen udløber. Kontoen bliver ikke slettet, men brugeren ka ikke logge ind mere.");
define('password_mismatch', "Adgangskode passer ikke sammen.");
define('current_password', "Nuværrende kodeord");
define('current_password_info', "Dir nuværrende kodeord.");
define('current_password_mismatch', "Din nuværrende adgangskode, passer ikke sammen med den I databasen.");
define('add_new_user', "Tilføj en ny bruger");
define('edit_user_groups', "Redigere Bruger Grupper");
define('users', "Brugere");
define('user_role', "Bruger rolle");
define('full_name', "Fuld Navn");
define('edit_games', "Redigere Spil");
define('edit_profile', "Redigere Profil");
define('confirm_password', "Bekræft adgangskode");
define('you_need_to_enter_both_passwords', "Du er nødtil at indtaste begge kodeord.");
define('passwords_did_not_match', "Kodeord matcher ikke sammen.");
define('could_not_add_user_because_user_already_exists', "Kunne ikke tilføje bruger, fordi bruger <em>%s</em> allerede eksistere.");
define('successfully_added_user', "Tilføjet ny bruger succesfuldt <em>%s</em>.");
define('add_a_new_user', "Tilføj en ny bruger");
define('admin', "Admin");
define('user', "Bruger");
define('user_with_id_does_not_exist', "Bruger med ID %s findes ikke.");
define('are_you_sure_you_want_to_delete_user', "Er du sikker på, at slette bruger <em>%s</em>?");
define('unable_to_delete_user', "Ikke muligt, at slette bruger %s.");
define('successfully_deleted_user', "Brugeren er slettet succesfuldt <b>%s</b>.");
define('failed_to_update_user_profile_error', "Fejlet i, at opdatere bruger profil. Fejl: %s");
define('profile_of_user_modified_successfully', "Profil af bruger <b>%s</b> blev redigeret succesfuldt.");
define('no_subusers', "No subusers are available to be assigned to a group. Please create subuser accounts.");
define('ownedby', "Parent Owner");
define('andSubUsers', " And all of his subusers?");
define('subusers', "Subusers");
define('show_subusers', "Show Subusers");
define('hide_subusers', "Hide Subusers");
define('info_group', "Fra denne side, er det muligt at fastsætte bruger grupper. Du ka tilføje servere til grupper, så de er tilgængelige til alle I gruppe brugere.");
define('add_new_group', "Tilføj ny gruppe");
define('group_name', "Gruppe Navn");
define('add_group', "Tilføj Gruppe");
define('no_groups_available', "Ingen grupper tilgængelige.");
define('delete_group', "Slet Gruppe");
define('add_user_to_group', "Tilføj bruger til gruppe");
define('add_user', "Tilføj Bruger");
define('remove_from_group', "Fjern fra gruppe");
define('add_server_to_group', "Tilføj server til gruppe");
define('add_server', "Tilføj Server");
define('no_remote_servers', "Ingen fjern servere tilgængelige.");
define('servers_in_group', "Servere I en gruppe");
define('no_servers_in_group', "Ingen servere I gruppen %s.");
define('available_groups', "Tilgængelig Grupper");
define('assign_homes', "Tilfæj Hjem");
define('successfully_added_group', "Tilføjet successfuldt gruppe %s.");
define('group_name_empty', "Gruppe navn kan ikke være tomt.");
define('failed_to_add_group', "Fejlet I at tilføje gruppe %s.");
define('could_not_add_user_to_group', "Kunne ikke tilføje brugere %s til gruppe %s, fordi den allerede tilhører.");
define('successfully_added_to_group', ">Tilføjet succesfuldt %s til gruppe <em>%s</em>.");
define('could_not_add_server_to_group', "Kunne ikke tilføje server til gruppe %s, fordi det allerede tilhører.");
define('successfully_added_server_to_group', "Tilføjet server succesfuldt til en gruppe <em>%s</em>.");
define('successfully_removed_from_group', "Fjernet succesfuldt %s fra gruppe <em>%s</em>.");
define('could_not_delete_server_from_group', "Kunne ikke slette server %s fra gruppe <em>%s</em>.");
define('successfully_removed_server_from_group', "Server fjernet succesfuldt %s fra gruppe <em>%s</em>.");
define('group_with_id_does_not_exist', "Bruger med ID %s eksistere ikke.");
define('are_you_sure_you_want_to_delete_group', "Er du sikker på, at du ville slette gruppen <em>%s</em>?");
define('unable_to_delete_group', "Ikke muligt, at slette bruger %s.");
define('successfully_deleted_group', "Slettet gruppen succesfuldt <b>%s</b>.");
define('editing_profile', "Editing Profile: %s");
define('valid_user', "Please specify a valid user.");
define('enter_valid_username', "Please enter a valid username.");
define('unexpected_role', "Unexpected user role received.");
?>
