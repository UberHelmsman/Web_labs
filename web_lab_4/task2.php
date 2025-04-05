<?php

$str = 'a1b2c3';
function func($matches)
{
        return $matches[0]*3;
}
$result = preg_replace_callback('/[0-9]/', "func", $str);

echo "реззультат: $result\n";