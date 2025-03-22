<?php


function is_sum_larger_than_10($num1, $num2): int|float
{
    return ($num1 + $num2) > 10;
}
echo is_sum_larger_than_10(3, 8);

function equals($num1, $num2)
{
    return $num1 === $num2;
}
echo equals(4, 4), "\n";

$test = 0;
echo ($test == 0) ? 'верно' : '', "\n";

$age = 52;
if ($age < 10 or $age > 99) {
    echo "число вне диапазона\n";
} else {
    $sum = array_sum(str_split((string)$age));
    if ($sum <= 9) {
        echo "сумма однозначна\n";
    } else {
        echo "всё не так однозначно: сумма двузначна\n";
    }
}

$arr = [1, 2, 3];
if (count($arr) == 3) {
    echo array_sum($arr);
}