<?php

// Find all multiples of 3 and 5 under 1000, and sum them up

function isMultipleOf3($number)
{
    return $number % 3 === 0;
}

function isMultipleOf5($number)
{
    return $number % 5 === 0;
}

function main()
{
    $sum = 0;

    for ($i = 1; $i < 1000; $i++) {
        if (isMultipleOf3($i) || isMultipleOf5($i)) {
            $sum += $i;
        }
    }

    return $sum;
}

echo main();


