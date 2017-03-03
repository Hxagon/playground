<?php
/**
 * Created by PhpStorm.
 * User: ronny
 * Date: 03.03.17
 * Time: 08:47
 */

$inputValues = ['a'];

$filtered = array_filter($inputValues, function ($value) {
    $possbileEntries = ['a', 'b', 'c'];
    if (in_array($value, $possbileEntries)) {
        return $value;
    }
    return null;
});

var_dump($filtered);
