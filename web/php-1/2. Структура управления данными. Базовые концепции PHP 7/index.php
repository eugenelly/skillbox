<?php require_once(__DIR__ . '/task4.php'); ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> <?= $title ?> </title>
    <style type="text/css">.red {
            color: red;
        }</style>
</head>
<body>

<h1<?= ($red) ? ' class = \'red\'' : '' ?>> <?php echo $title ?> </h1>
<div> Авторов на портале <?= count($result3['author']['ФИО']) ?></div>
<?php foreach ($result3['books'] as $book): ?>
    <p>Книга <?= $book['name'] ?>, ее написал <?= $result3['authors'][$book['e-mail']]['name'] ?>
        (<?= $result3['authors'][$book['e-mail']]['birth'] ?>, <?= $book['e-mail'] ?>)
    </p>
<?php endforeach ?>

</body>
</html>
