<?php

$users = [
    'user1',
    'user2',
    'user3',
];

/** Проверка логина
 * @param string $login введенный логин
 * @param array $users массив пользователей
 * @return false|int false | id пользователя
 */
function chkLogin(string $login, array &$users)
{
    return array_search($login, $users);
}
