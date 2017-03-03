<?php

function candies($n, $m) {
    if (($m / $n) < 1) {
        return 0;
    }
    $maxAmount = round($m / $n);
    $candies = $maxAmount * $n;

    return $candies;
}

echo candies(3, 6);