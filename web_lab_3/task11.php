<?php

for ($i = 1; $i <= 20; $i++) {
    echo str_repeat(" ", 20-$i), str_repeat("x",$i*2-1), "\n";
}