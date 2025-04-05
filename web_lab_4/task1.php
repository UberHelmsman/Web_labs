<?php

$str = 'dfgojdffgdhgd dfjdhjkdfhgkdf hdfgjhdfjdkghjkdf';
$regexp = '/d...d/';
$matches = array();
$count = preg_match_all($regexp, $str, $matches);
echo "колво найденных подстрок: $count\n";

print_r( $matches[0] );
