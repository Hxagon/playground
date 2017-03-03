<?php
require_once 'Benchmark.php';
/**
 * Created by PhpStorm.
 * User: ronny
 * Date: 15.02.17
 * Time: 16:48
 */

$benchmark = new Benchmark();

echo "By Value\n";
$benchmark->runByValueTests(9999);
var_dump(round($benchmark->getExecutionTime(), 3));

$benchmark->runByReferenceTests(9999);
echo "By Reference\n";
var_dump(round($benchmark->getExecutionTime(), 3));

