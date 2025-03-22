<?php
$arr = [];
for ($i = 1; $i <= 10; $i++) {
    $arr[$i] = str_repeat('x', $i);
}
print_r($arr);

function arrayFill($value, $count): array
{
    $array = [];
    for ($i = 0; $i < $count; $i++) {
        $array[] = $value;
    }
    return $array;
}
print_r(arrayFill('x', 5));

$nums = [[1, 2, 3], [4, 5], [6]];
$sum = array_sum(array_merge(...$nums));
echo $sum,"\n";

$arr1 = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        $arr1[$i][$j] = $i * 3 + $j;
    }
}
print_r($arr);

$arr2 = [2, 5, 3, 9];
$result = $arr2[0] * $arr2[1] + $arr2[2] * $arr2[3];
echo $result,"\n";


$user = ['name' => 'произвольное значение "коля"', 'surname' => 'произвольное значение "буряк"', 'patronymic' => 'произвольное значение "вячеславович"'];
echo $user['surname'], ' ', $user['name'], ' ', $user['patronymic'], "\n";


$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'], '-', $date['month'], '-', $date['day'], "\n";


$arr = ['a', 'b', 'c', 'd', 'e'];
echo count($arr), "\n";
echo end($arr), "\n";
echo prev($arr), "\n";