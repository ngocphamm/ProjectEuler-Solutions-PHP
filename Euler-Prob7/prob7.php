<?php

// Find the 10001th Prime number

function isPrime($number)
{
    if ($number <= 1) return false;

    if ($number < 4) return true; // 2 & 3

    // All prime numbers except 2 are odd
    if ($number % 2 === 0) return false;

    // All prime numbers > 3 can will be in form of 3*k +/- 1
    if ($number % 3 === 0) return false;

    $i = 5;
    while ($i <= floor(sqrt($number))) {
        if ($number % $i === 0 || $number % ($i + 2) === 0) return false;
        $i += 6;
    }

    return true;
}

function main()
{
    $n = 10001;
    $number = 2;
    $i = 0;

    while (1) {
        if (isPrime($number)) {
            $i++;

            // echo $i . ' --  '. $number . PHP_EOL;

            if ($i === $n) {
                echo $number;
                break;
            }
        }

        $number++;
    }
}

main();
