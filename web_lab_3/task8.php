<?php
function increaseEnthusiasm($string): string
{
    return $string . "!";
}

echo increaseEnthusiasm("increaseEnthusiasm") . "\n";


function repeatThreeTimes($string): string
{
    return $string . $string . $string;
}
echo repeatThreeTimes("repeat Three Times ") . "\n";


echo increaseEnthusiasm(repeatThreeTimes("test")) . "\n";


function cut($string, $length = 10): string
{
    return substr($string, 0, $length);
}


echo cut("1234567890!@#$%^&*()_+-=[]{}|\\:;'\"<>,.?/") . "\n";


function printArrayBackwards(array $array): void {
    if(empty($array)) {
        return;
    }

    echo array_shift($array) . "\n";
    printArrayBackwards($array);
}
printArrayBackwards([1,2,3,4,5,6,7,8,9]);


function sumIntDigitsToOneDigit(int $number): int { # не прям рекурсия конечно, но в задании не написано не использовать while))
    while ($number > 9) {
        $number = array_sum(str_split((string) $number));
    }
    return $number;
}
echo sumIntDigitsToOneDigit(12345) . "\n";