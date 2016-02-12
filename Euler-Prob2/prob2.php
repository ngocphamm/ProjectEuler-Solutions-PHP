<?php

// Sum of all even Fibonacci numbers <= 4 million

function sumFibo($max)
{
    $fi1 = 1;
    $fi2 = 2;
    $fi3 = 0;

    $sum = $fi2;

    while (1) {
        // Find the next Fibonacci number
        $fi3 = $fi1 + $fi2;

        // Do not continue if the result is bigger than the defined max
        if ($fi3 > $max) break;

        // Take only even number
        if ($fi3 % 2 === 0) {
            $sum += $fi3;
        }

        // Shift the old previous numbers
        $fi1 = $fi2;
        $fi2 = $fi3;
    }

    return $sum;
}

echo sumFibo(4000000);
