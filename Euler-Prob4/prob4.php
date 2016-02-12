<?php

// Largest palindrome made from the product of two 3-digit numbers.
// Palindrome number reads the same both ways, for example, 9009

function largestPalindrome($max = 999, $min = 100)
{
    $maxPalindrome = 0;

    for ($i = $max; $i > $min; $i--) {
        // To avoid checking both a*b and b*a, we assume one number is smaller
        // than the other
        for ($j = $max; $j > $i; $j--) {
            $product = $i * $j;

            // Early break if the product is already smaller than the max Pal
            if ($product < $maxPalindrome) break;

            if (isPalindrome($product)) {
                $maxPalindrome = max($maxPalindrome, $product);
            }
        }
    }

    echo $maxPalindrome;
}

function getNumberDigits($number)
{
    $digits = [];

    while ($number > 1) {
        $digits[] = intval($number) % 10;
        $number /= 10;
    }

    return array_reverse($digits);
}

function isPalindrome($number)
{
    $numberDigits = getNumberDigits($number);

    $numDigit = count($numberDigits);

    for ($i = 0; $i < floor($numDigit/2); $i++) {
        if ($numberDigits[$i] != $numberDigits[$numDigit - ($i + 1)])
            return false;
    }

    return true;
}

largestPalindrome();
