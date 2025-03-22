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


$numSqrt = sqrt(379);
$numWhole = round($numSqrt, 0);
$numDec = round($numSqrt, 1);
$numHund = round($numSqrt, 2);

echo "$numSqrt, $numWhole, $numDec, $numHund \n\n";

$num2 = sqrt(587);
$num2RoundedUp = ceil($num2);
$num2RoundedDown = floor($num2);

$m2 = [4,-2,5,19,-130,0,10];
$m2Min = min($m2);
$m2Max = max($m2);

echo rand(0,100),"\n\n";

$m3 = [];
for ($i = 0; $i < 10; $i++) {
    $r = rand(0,100);
    array_push($m3,$r);
    echo $m3[$i], " ";
}


$d = abs($a-$b);
echo "\n$d \n";
$a += 2;
$b += 20;
$d2 = abs($a-$b);
echo $d2, "\n";

$m4 = [1,2,-1,-2,3,-3];
for ($i = 0; $i < count($m4); $i++) {
    $m4[$i] = abs($m4[$i]);
    echo $m4[$i]," ";
}

$num3 = 30;
$dels = [];
for ($i = 1; $i < $num3; $i++) {
    if ($num3 % $i == 0) array_push($dels,$i);
}

$m5 = [1,2,3,4,5,6,7,8,9,10];
for ($i = 0; $i < count($m5); $i++) {
    if (array_sum(array_slice($m5,0,$i)) > 10 ) {
        echo "\nНужно сложить первые $i элементов\n"; 
        break;
    }
}