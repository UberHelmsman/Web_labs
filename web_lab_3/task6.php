<?php

$a = 10;
$b = 3;

$c = $a % $b;
echo "остаток от деления 10 на 3: ",$c,"\n\n";

$del = False;
if ($c == 0) {echo "Делится";} else {echo "Делится с остатком ", $c,"\n\n";} 
# пхп говорит, что можно поменять на switch, но сам он это сделает только если купить премиум)

$st = 2**10;

$square_root = sqrt(245);

$m = [4,2,5,19,13,0,10];

$sum = 0;
foreach ($m as $k => $v) {
    $sum += $v**2;
}

$square_root_2 = sqrt($sum);

$num = 379;
$numSqrt = sqrt($num);
$numWhole = round($numSqrt, 0);
$numDec = round($numSqrt, 1);
$numHund = round($numSqrt, 2);

echo "$numSqrt, $numWhole, $numDec, $numHund";