<?php

// The sum of the squares of the first ten natural numbers is,
// 12 + 22 + ... + 102 = 385
// The square of the sum of the first ten natural numbers is,
// (1 + 2 + ... + 10)2 = 552 = 3025
// Calculate the difference between the two results

$input = range(1,100);

$sumOfSquares = array_sum(
    array_map(function($i) {
        return pow($i, 2);
    }, $input)
);

$squareOfSum = pow(array_sum($input), 2);

echo $squareOfSum - $sumOfSquares;
