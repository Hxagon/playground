<?php
/**
 * Created by PhpStorm.
 * User: ronny
 * Date: 21.09.16
 * Time: 14:20
 */

$array = array(
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Ente',
    'Gans',
    'Gans',
    'Gans',
    'Gans',
    'Gans',
    'Gans',
    'Gans',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
    'Hund',
);

$keysAndCount = array_count_values($array);
$sortableArray = array();

foreach ($keysAndCount as $key => $value) {
    $sortableArray[$key] = $value;
}

$sortedArray = arsort($sortableArray);
print_r($sortableArray);
