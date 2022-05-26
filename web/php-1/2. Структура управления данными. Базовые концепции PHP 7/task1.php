<?php

// начнем с создания простых массивов с данными об авторе и книге
// создайте многомерный массив $result1 — с двумя ключами ‘author’ и ‘book’
$result1 = [

    // в индекс (ключ) ‘author’ добавьте ассоциативный массив данных об авторе: фио, email
    'author' => [
        'full_name' => 'Noname',
        'e-mail' => 'noname@icloud.com',
    ],

    // в индекс (ключ) ‘book’ добавьте ассоциативный массив данных о книге: название и email автора
    'book' => [
        'title' => 'Noname',
        'e-mail' => 'noname@icloud.com',
    ]
];

?>

<pre>
    <?php

    // выведите массив
    var_dump($result1);
    ?>
</pre>
