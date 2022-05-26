<?php

$searchRoot = 'test_search/';
$searchName = 'file.txt';

$searchResult = [];

function recursiveFunction ($searchRoot, $searchName, &$searchResult) {
    $arr = scandir($searchRoot);
    unset($arr[0]);
    unset($arr[1]);
    // https://www.php.net/manual/ru/function.glob.php как вариант, или https://www.php.net/manual/en/class.directoryiterator.php в идеале

    foreach ($arr as $item) {
        if (is_dir($searchRoot . $item)) {
            recursiveFunction($searchRoot . $item . '/', $searchName,$searchResult);
        } else {
            $searchResult[] = $searchRoot . $item;
        }
    }
}

recursiveFunction($searchRoot, $searchName, $searchResult);

// $searchResult = array_filter($searchResult, 'filesize');

if (!empty($searchResult)) {
    var_dump(array_filter($searchResult, 'filesize'));
} else {
    echo 'Поиск не дал результатов';
}
