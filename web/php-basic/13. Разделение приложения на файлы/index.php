<?php

require_once './autoload.php';

$fileStorage = new FileStorage();

$text = new Text('Eugene', './file', $fileStorage);
$text->editText(
    'Заголовок',
    'Текст'
);

//$text->storeText();

//echo '<pre>';
//var_dump($text->loadText());
//echo '</pre>';

//$fileStorage->logMessage('test');
//$fileStorage->lastMessages(10);
//$fileStorage->attachEvent('testFunc', function () {
//    echo 'Вызов callback функции';
//});
//$fileStorage->detouchEvent('testFunc');

//$text->setSlug('./file');
//$text->setSlug('./file*');
