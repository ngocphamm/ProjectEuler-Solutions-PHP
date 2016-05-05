<?php

// Large sum
// Because the numbers contain 50 digit, it's too much for normal long/int sum.

function listToArray(string $list)
{
    $numbers = explode(PHP_EOL, trim($list));

    return array_map(function($number) {
        return str_split(trim($number));
    }, $numbers);
}

function main()
{
    include_once 'numbers.php';

    $numbers = listToArray($numberList);
    $digitCount = count($numbers[0]);
    $numberCount = count($numbers);

    $realSum = [];
    $startUnit = 0;

    /**
     * This use the elementary sum method from right to left.
     */
    for ($i = ($digitCount - 1); $i >= 0; $i--) {
        $sum = 0;

        for ($j = 0; $j < $numberCount; $j++) {
            $sum += intval($numbers[$j][$i]);
        }

        $sumSplit = array_reverse(str_split(strval($sum)));

        for ($k = 0; $k < count($sumSplit); $k++) {
            // NOTE: This null coalesce (??) only works on PHP 7
            $realSum[$startUnit + $k] = $realSum[$startUnit + $k] ?? 0;

            // Get the sum by column
            $colSum = $realSum[$startUnit + $k] + intval($sumSplit[$k]);

            // Put remainder to the current result column
            $realSum[$startUnit + $k] = $colSum % 10;

            // If the column sum is >= 10, put the carry number to the next result column
            if ($colSum >= 10) {
                $realSum[$startUnit + $k + 1] = $realSum[$startUnit + $k + 1] ?? 0;

                // NOTE: This intdiv() is also only on PHP 7
                $realSum[$startUnit + $k + 1] += intdiv($colSum, 10);
            }
        }

        $startUnit++;

    }

    var_dump(implode(array_reverse($realSum)));
}

main();
