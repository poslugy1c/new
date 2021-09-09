<?php

echo '<br> <br>';

echo 'из десятичной в двоичную <br> ';
function from10to2($dec)
{
    try {	
        if(gettype($dec) != 'integer'){
            throw new Exception('переданный параметр ' .$dec . ' не является корректным числом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };

    $neg = $dec < 0;
    $dec = abs($dec);
    $bin = '';
    while ($dec != 0) {
        $bin = ($dec % 2) . $bin;
        $dec = (int)($dec / 2);
    }
    if ($neg) { 
        $bin = '-' . $bin;
    }
    return $bin;
}

echo ' test res = ' . from10to2('test');