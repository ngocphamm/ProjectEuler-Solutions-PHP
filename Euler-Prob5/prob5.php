<?php

// Smallest positive number that is evenly divisible by all numbers 1-20

function smallestMultiple()
{
    $number = 1;

    while ($number >= 1) {
        $found = true;

        for ($i = 20; $i >=2; $i--) {
            if ($number % $i !== 0) {
                $found = false;
                break;
            }
        }

        if ($found === true) {
            echo $number;
            break;
        }

        $number += 60;
    }
}

smallestMultiple();
