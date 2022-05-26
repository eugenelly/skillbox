<?php

$menu = [
    [
        'title' => 'Главная',
        'path' => '/',
        'sort' => 2,
    ],
    [
        'title' => 'О нас',
        'path' => '/about',
        'sort' => 1,
    ],
    [
        'title' => 'Контакты',
        'path' => '/contacts',
        'sort' => 3,
    ],
    [
        'title' => 'Новости',
        'path' => '/news',
        'sort' => 4,
    ],
    [
        'title' => 'Каталог',
        'path' => '/catalog',
        'sort' => 5,
    ],
];

function showMenu(array &$menu)
{
    foreach ($menu as $value) {
        if ($value['sort'] == 1)
            echo '<li><a href="' . $value['path'] . '">' . $value['title'] . '</a></li>';
        else
            echo '<li><a href="' . '/app/route' . $value['path'] . '">' . $value['title'] . '</a></li>';
    }
}

function arraySort(array &$menu, $key = 'sort', $sort = SORT_ASC)
{
    $arr_num = [];
    foreach ($menu as $value) {
        array_push($arr_num , $value[$key]);
    }
}
