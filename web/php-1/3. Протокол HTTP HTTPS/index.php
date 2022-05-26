<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/users.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php');

$login = '';
$password = '';

$success = false;
$error = false;

if (!empty($_POST)) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($login || $password) {
        $login_check = chkLogin($login, $users);
        if ($login_check !== false) chkPass(
            $login_check, $password, $passwords
        ) ? header('Location: include/success.php') : $error = true;
    } else $error = true;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Project - ведение списков</title>
    <link href="/styles.css" rel="stylesheet">
</head>

<body>
<div class="status">
    <div class="error" style="<?= (!$error) ? 'display:none' : '' ?>">Ошибка доступа</div>
</div>

<div class="wrapper">
    <div class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>

    <div class="clear">
        <ul class="main-menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1>Возможности проекта — </h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками
                    с друзьями и просматривать списки друзей.</p>
            </td>

            <td class="right-collum-index">
                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="/index.php?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <?php if (!empty($_GET) && $_GET['login'] == 'yes') { ?>
                    <div class="index-auth">
                        <form class="form-auth"
                              action="/index.php?login=yes"
                              method="post">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="iat">
                                        <label for="login_id">Ваш e-mail:</label>
                                        <input id="login_id" size="30" name="login" value="<?= $login ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="iat">
                                        <label for="password_id">Ваш пароль:</label>
                                        <input id="password_id" size="30" name="password" type="password"
                                               value="<?= $password ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Войти"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php } ?>

            </td>
        </tr>
    </table>

    <div class="clearfix">
        <ul class="main-menu bottom">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <div class="footer">&copy;&nbsp;<nobr>2020</nobr>
        Project.
    </div>
</div>
</body>
</html>