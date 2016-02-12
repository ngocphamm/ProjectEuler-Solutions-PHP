<?php

// Max prime factor of a number

function maxPrimeFactor($number)
{
    $start = microtime(true);

    $divider = 2;

    while ($number != 1) {
        if ($number % $divider !== 0) {
            $divider++;
            continue;
        }

        $number /= $divider;

        echo $divider . PHP_EOL;
    }

    echo 'Execution time: ' . (microtime(true) - $start);

    return $divider;
}

echo maxPrimeFactor(600851475143);
