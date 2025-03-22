<?php
function printStringReturnNumber(): int
{
    echo "Строка\n";
    return 42;
}

$my_num = printStringReturnNumber();
echo $my_num;