<?php

// Speicial Pythagorean triplet

function main()
{
    $sum = 1000;

    for ($c = 999; $c > 1; $c--) {
        for ($b = 1; $b < $c; $b++) {
            $a = sqrt(pow($c, 2) - pow($b, 2));

            if (intval($a) != $a) continue;

            if (intval($a + $b + $c) === $sum) {
                echo "a = {$a}, b = {$b}, c = {$c}" . PHP_EOL;
                echo 'Product = ' . ($a * $b *$c) . PHP_EOL;
                break;
            }
        }
    }
}

main();
