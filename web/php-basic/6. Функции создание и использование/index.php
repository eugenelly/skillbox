<?php

$textStorage = [];

function add(string $title, string $text, &$textStorage)
{
    $textStorage[] = [
        'title' => $title,
        'text' => $text,
    ];
}

function remove(int $index, &$textStorage): bool
{
    if (array_key_exists($index, $textStorage)) {
        unset($textStorage[$index]);
        return true;
    } else {
        return false;
    }
}

function edit(int $index, string $title, string $text, &$textStorage): bool
{
    if (array_key_exists($index, $textStorage)) {
        $textStorage[$index] = [
            'title' => $title,
            'text' => $text
        ];
        return true;
    } else {
        return false;
    }
}

add('Заголовок1', 'Текст1', $textStorage);
add('Заголовок2', 'Текст2', $textStorage);

remove(0, $textStorage);
remove(6, $textStorage);

edit(1, 'Заголовок1', 'Текст1', $textStorage);

print_r($textStorage);
var_dump(edit(6, 'Заголовок1', 'text1', $textStorage));
