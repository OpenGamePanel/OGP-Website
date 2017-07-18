<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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
define('login_name', "Имя пользователя");
define('language', "Язык");
define('first_name', "Имя");
define('page_limit', "элементов на Страницу");
define('page_limit_info', "Количество позиций, отображаемых на странице. Количество позиций  не может быть меньше 10.");
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
define('theme_info', "Выбранная тема будет установлена всем пользователям по умолчанию, но они смогут ее сменить в настройках своего профиля.");
define('expires_info', "Дата когда истекает срок действия аккаунта. Аккаунт не будет удален, но на него нельзя будет зайти.");
define('password_mismatch', "Пароли не совпадают.");
define('current_password', "Текущий пароль");
define('current_password_info', "Ваш текущий пароль.");
define('current_password_mismatch', "Пароль не верный.");
define('add_new_user', "Добавить нового пользователя");
define('edit_user_groups', "Редактировать группу пользователя");
define('users', "Пользователи");
define('user_role', "Права пользователя");
define('full_name', "Полное имя");
define('edit_games', "Редактировать игры");
define('edit_profile', "Редактировать профиль");
define('confirm_password', "Подтвердите пароль");
define('you_need_to_enter_both_passwords', "Вам нужно ввести оба пароля.");
define('passwords_did_not_match', "Пароли не совпадают.");
define('could_not_add_user_because_user_already_exists', "Не удалось добавить пользователя, потому что пользователь <em>%s</em>уже существует.");
define('successfully_added_user', "Пользователь <em>%s</em> успешно добавлен.");
define('add_a_new_user', "Добавление нового пользователя");
define('admin', "Администратор");
define('user', "Пользователь");
define('user_with_id_does_not_exist', "Пользователь с ID %s не существует.");
define('are_you_sure_you_want_to_delete_user', "Вы уверены что хотите удалить этого пользователя <em>%s</em>?");
define('unable_to_delete_user', "Не удалось удалить пользователя %s.");
define('successfully_deleted_user', "Пользователь <b>%s</b> успешно удален.");
define('failed_to_update_user_profile_error', "Не удалось обновить профиль пользователя. Ошибка: %s");
define('profile_of_user_modified_successfully', "Профиль пользователя <b>%s</b> успешно изменен.");
define('no_subusers', "Нет суб-пользователей, которые могут быть назначены группе. Пожалуйста создайте аккаунт суб-пользователей.");
define('ownedby', "Родительский владелец");
define('andSubUsers', "  И всех его суб-пользователей?");
define('subusers', "Суб-пользователей");
define('show_subusers', "Показать Суб-пользователей");
define('hide_subusers', "Скрыть Суб-пользователей");
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
define('successfully_added_group', "Группа была добавлена успешно %s.");
define('group_name_empty', "Имя группы не может быть пустым.");
define('failed_to_add_group', "Не удалось добавить группу %s.");
define('could_not_add_user_to_group', "Не удалось добавить пользователя %s в группу %s, потому что он уже в этой группе.");
define('successfully_added_to_group', ">Успешно добавлено %sв группу <em>%s</em>.");
define('could_not_add_server_to_group', "Не удалось добавить сервер в группу %s, потому что он уже в этой группе.");
define('successfully_added_server_to_group', "Сервер успешно добавлено в группу <em>%s</em>.");
define('successfully_removed_from_group', "Успешно удаление %s из группы <em>%s</em>.");
define('could_not_delete_server_from_group', "Не удалось удалить сервер %sиз группы <em>%s</em>.");
define('successfully_removed_server_from_group', "Сервер успешно удален %s из группы <em>%s</em>.");
define('group_with_id_does_not_exist', "%s группа не существует.");
define('are_you_sure_you_want_to_delete_group', "Вы уверенны что хотите удалить группу <em>%s</em>?");
define('unable_to_delete_group', "Не удалось удалить группу %s.");
define('successfully_deleted_group', "Группа <b>%s</b>успешно удалена.");
define('editing_profile', "Редактирование профиля: %s");
define('valid_user', "Укажите действительного пользователя.");
define('enter_valid_username', "Пожалуйста введите действительное имя пользователя.");
define('unexpected_role', "Неизвестная роль пользователя");
define('search', "Поиск");
?>