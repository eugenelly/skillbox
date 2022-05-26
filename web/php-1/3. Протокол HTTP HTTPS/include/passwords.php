<?php

$passwords = [
    'pass1',
    'pass2',
    'pass3',
];

/** Проверка пароля
 * @param int $id id пользователя
 * @param string $password введенный пароль
 * @param array $passwords массив паролей
 * @return bool вход выполнен/не выполнен
 */
function chkPass(int $id, string $password, array &$passwords): bool
{
    if ($password == $passwords[$id]) return true;
    else return false;
}
