<?php

require_once 'autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['author']) && isset($_POST['text'])) {
    $author = $_POST['author'];
    $text = $_POST['text'];

    $fileStorage = new FileStorage();

    $telegraphText = new Text($author, './file', $fileStorage);

    $telegraphText->__set('text', $text);

    $telegraphText->addText('');

    if (isset($_POST['email'])) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com';
            $mail->Password = 'secret';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom($_POST['email'], $author);

            $mail->isHTML(true);
            $mail->Subject = 'Заголовок';
            $mail->Body = 'Текст';
            $mail->AltBody = 'Текст';

            $mail->send();
        } catch (Exception $exception) {
            echo 'Сообщение не было отправлено. Ошибка:';
        }
    }
}

?>

<div class="container">
    <div class="warning" id="warning">
        Текст ошибки
    </div>
</div>

<div class="container">
    <form class="form" action="/index.php" method="post">
        Автор:
        <label>
            <input class="input" type="text" name="author">
        </label>
        Текст:
        <label>
            <textarea class="textarea" name="text" rows="10"></textarea>
        </label>
        Email:
        <label>
            <input class="input" type="text" name="email">
        </label>
        <button class="button" type="submit">
            Отправить
        </button>
    </form>
</div>
