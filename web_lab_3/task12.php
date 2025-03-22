<?php

$numbers = [12312,123,32,12,11];
$average = array_sum($numbers) / count($numbers);
echo "среднее знач: $average\n";

$sum = array_sum(range(1, 100));
echo "сумма от 1 до 100: $sum\n"; 
# нам в школе рассказывали, что гауссу учитель в школе задал посчитать сумму чисел от 1 до 100, чтобы он отстал и он сразу посчитал


$numbers = [12312,543,12,23,1];
$squareRoots = array_map('sqrt', $numbers);
print_r($squareRoots);

$letters = range('a', 'z');
$numbers = range(1, 26);
$array = array_combine($letters, $numbers);
print_r($array);

$string = '1234567890';
$pairs = str_split($string, 2);
$sumOfPairs = array_sum($pairs);
echo $sumOfPairs,"\n";