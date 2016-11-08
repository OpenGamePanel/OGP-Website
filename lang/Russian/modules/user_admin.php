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

define('your_profile', "Ваш профиль");
define('new_password', "Новый пароль");
define('retype_new_password', "Повторите новый пароль");
define('login_name', "Логин");
define('language', "Язык");
define('first_name', "Имя");
define('last_name', "Фамилия");
define('phone_number', "Номер телефона");
define('email_address', "Адрес e-mail");
define('city', "Город");
define('province', "Регион");
define('country', "Страна");
define('comment', "Комментарий");
define('expires', "Истекает");
define('save_profile', "Сохранить профиль");
define('new_password_info', "Если оставить поле пароля пустое, то пароль изменен не будет.");
define('theme', "Тема");
define('theme_info', "Если пустое, то будет установлена тема по умолчанию.");
define('expires_info', "Дата когда истекает срок действия аккаунта. Аккаунт не будет удален, но на него нельзя будет зайти.");
define('password_mismatch', "Введённые пароли не совпадают.");
define('current_password', "Текущий пароль");
define('current_password_info', "Ваш текущий пароль.");
define('current_password_mismatch', "Пароль не верный.");

// show_users.php
define('add_new_user', "Добавить нового пользователя");
define('edit_user_groups', "Редактировать группу пользователя");
define('users', "Пользователи");
define('user_role', "Права пользователя");
define('full_name', "Полное имя");
define('edit_games', "Редактировать игры");
define('edit_profile', "Редактировать профиль");

// add_user.php
define('confirm_password', "Подтвердить пароль");

// subuser used in show_groups.php
define('no_subusers', "No subusers are available to be assigned to a group. Please create subuser accounts.");
define('ownedby', "Parent Owner");
define('andSubUsers', " And all of his subusers?"); 
define('subusers', "Subusers"); 
define('show_subusers', "Show Subusers");
define('hide_subusers', "Hide Subusers");

// *_group.php
define('info_group', "Здесь вы можете настроить группы и пользователей. Пользователи, вступившие в группы будут иметь все права этой группы.");
define('add_new_group', "Добавить новую группу");
define('group_name', "Имя группы");
define('add_group', "Добавить группу");
define('no_groups_available', "Нет доступных групп.");
define('delete_group', "Удалить группу");
define('add_user_to_group', "Добавить пользователя в группу");
define('add_user', "Добавить пользователя");
define('remove_from_group', "Удалить из группы");
define('add_server_to_group', "Добавить сервер в группу");
define('add_server', "Добавить сервер");
define('no_remote_servers', "Нет доступных удаленных серверов.");
define('servers_in_group', "Серверов в группе");
define('no_servers_in_group', "Нет доступных серверов в группе %s.");
define('available_groups', "Доступные группы");
define('assign_homes', "Привязать сервер");

// add_group.php
define('successfully_added_group', "Группа была добавлена успешно %s.");
define('group_name_empty', "Имя группы не может быть пустым.");
define('failed_to_add_group', "Не удалось добавить группу %s.");
define('you_need_to_enter_both_passwords', 'You need to enter both passwords');
define('passwords_did_not_match', 'Passwords did not match');
define('could_not_add_user_because_user_already_exists', 'Could not add user because user already exists');
define('successfully_added_user', 'Successfully added user');
define('add_a_new_user', 'Add a new user');
define('admin', 'Admin');
define('user', 'User');
define('user_with_id_does_not_exist', 'User with id does not exist');
define('are_you_sure_you_want_to_delete_user', 'Are you sure you want to delete user');
define('unable_to_delete_user', 'Unable to delete user');
define('successfully_deleted_user', 'Successfully deleted user');
define('failed_to_update_user_profile_error', 'Failed to update user profile. Error: %s');
define('profile_of_user_modified_successfully', 'Profile of user modified successfully');
define('could_not_add_user_to_group', 'Could not add user to group');
define('successfully_added_to_group', 'Successfully added to group');
define('could_not_add_server_to_group', 'Could not add server to group');
define('successfully_added_server_to_group', 'Successfully added server to group');
define('successfully_removed_from_group', 'Successfully removed from group');
define('could_not_delete_server_from_group', 'Could not delete server from group');
define('successfully_removed_server_from_group', 'Successfully removed server from group');
define('group_with_id_does_not_exist', 'Group with id does not exist');
define('are_you_sure_you_want_to_delete_group', 'Are you sure you want to delete group');
define('unable_to_delete_group', 'Unable to delete group');
define('successfully_deleted_group', 'Successfully deleted group');
?>
