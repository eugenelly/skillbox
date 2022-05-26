<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/main_menu.php');
?>

    <div class="status">
        <div class="success" style="<?= (!$success) ? 'display:none' : '' ?>">Доступ получен</div>
        <div class="error" style="<?= (!$error) ? 'display:none' : '' ?>">Ошибка доступа</div>
    </div>

    <div class="header">
        <div class="logo"><img src="i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>

    <div class="clear">
        <ul class="main-menu">
            <?= showMenu($menu) ?>
        </ul>
    </div>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1>Возможности проекта — </h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками
                    с
                    друзьями и просматривать списки друзей.</p>
            </td>
            <td class="right-collum-index">
                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="index-auth">
                    <form class="form-auth" action="/index.php<?= ($_GET['login'] == 'yes') ? '?login=yes' : '' ?>"
                          method="post"
                          style="display: <?= (!empty($_GET)) && ($_GET['login'] == 'yes') && (!$success) ? 'block' : 'none' ?>">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login">
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Войти"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
        </tr>
    </table>

    <div class="clearfix">
        <ul class="main-menu bottom">
            <?php arraySort($menu); ?>
        </ul>
    </div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/footer.php');
