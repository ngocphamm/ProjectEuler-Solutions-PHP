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

    for ($i = ($digitCount - 1); $i >= 0; $i--) {
        $sum = 0;

        for ($j = 0; $j < $numberCount; $j++) {
            $sum += intval($numbers[$j][$i]);
        }

        $sumSplit = array_reverse(str_split(strval($sum)));

        for ($k = 0; $k < count($sumSplit); $k++) {
            if ( ! isset($realSum[$startUnit + $k])) {
                $realSum[$startUnit + $k] = 0;
            }

            $colSum = $realSum[$startUnit + $k] + intval($sumSplit[$k]);

            $realSum[$startUnit + $k] = $colSum % 10;

            if ($colSum >= 10) {
                if ( ! isset($realSum[$startUnit + $k + 1])) {
                    $realSum[$startUnit + $k + 1] = 0;
                }
                $realSum[$startUnit + $k + 1] += 1;
            }
        }

        $startUnit++;

    }

    var_dump(implode(array_reverse($realSum)));
}

main();
