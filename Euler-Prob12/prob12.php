<?php

// Highly divisible triangular number

function countFactors(int $number)
{
    $primes = [];

    for ($candidate = 2; $number > 1; $candidate++) {
        for (; $number % $candidate === 0; $number /= $candidate) {
            // Store the prime factor, and its exponents
            if (array_key_exists($candidate, $primes)) {
                $primes[$candidate]++;
            } else {
                $primes[$candidate] = 1;
            }
        }
    }

    // The number of ALL the factors can be calculate by multiplying all the
    // prime factors's exponents plus 1.
    // http://www.wikihow.com/Find-How-Many-Factors-Are-in-a-Number
    $count = 1;
    foreach ($primes as $prime => $exp) {
        $count *= ($exp + 1);
    }

    return $count;
}

function main()
{
    // The sequence of triangle numbers is generated by adding the natural numbers.
    // So the 7th triangle number would be 1 + 2 + 3 + 4 + 5 + 6 + 7 = 28.

    $triangularNumber = 0;
    $index = 0;

    while ($triangularNumber >= 0) {
        $index++;
        $triangularNumber += $index;

        $factorsCount = countFactors($triangularNumber);

        if ($factorsCount > 500) {
            echo "{$triangularNumber} has {$factorsCount} factors." . PHP_EOL;
            break;
        }
    }
}

main();