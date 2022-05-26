<?php
declare(strict_types=1);

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/users.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/passwords.php');

$success = false;
$error = false;

if (!empty($_POST)) {
    $id_user = chkLogin($_POST['login'], $users);
    if ($id_user !== false) {
        chkPass($id_user, $_POST['password'], $passwords) ? $success = true : $error = true;
    } else $error = true;
}