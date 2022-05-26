<?php

do {
    // 1-й город
    $city1 = rand(0, 1000);
    $city1Radius = rand(1, 50);
    // границы 1-го города
    $city1Min = $city1 - $city1Radius;
    $city1Max = $city1 + $city1Radius;
    // 2-й город
    $city2 = rand(0, 1000);
    $city2Radius = rand(1, 50);
    // границы 2-го города
    $city2Min = $city2 - $city2Radius;
    $city2Max = $city2 + $city2Radius;
} while (
    (($city1Min < $city2) && ($city2 < $city1Max)) ||
    (($city1Min < $city2Min) && ($city2Min < $city1Max)) ||
    (($city1Min < $city2Max) && ($city2Max < $city1Max))
);

$carCount = 10; //кол-во машин

for ($i = 0; $i < $carCount; $i++) {
    $km[] = rand(0, 1000);

    if (((($city1Min < $km[$i]) && ($km[$i] < $city1Max)) || (($city2Min < $km[$i]) && ($km[$i] < $city2Max)))) echo 'Машина ' . ($i + 1) . ' едет по городу на ' . $km[$i] . ' км со скоростью не более 70 ';
    else echo 'Машина ' . ($i + 1) . ' едет по шоссе на ' . $km[$i] . ' км со скоростью не более 90 ';
    echo '<br>';
}