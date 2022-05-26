<?php

$studentCount = rand(1, 200);
$message = 'на учёбе ' . $studentCount;

if ((substr($studentCount,-2) == 11) ||
    (substr($studentCount,-2) == 12) ||
    (substr($studentCount,-2) == 13) ||
    (substr($studentCount,-2) == 14)) {
    $message .= ' студентов';
} elseif ($studentCount % 10 === 1) {
    $message .= ' студент';
} elseif (($studentCount % 10 === 2) ||
          ($studentCount % 10 === 3) ||
          ($studentCount % 10 === 4)) {
    $message .= ' студента';
} else {
    $message .= ' студентов';
}

echo $message;
