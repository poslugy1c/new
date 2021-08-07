<?php

echo '1. Написать функцию которая по параметрам принимает число из десятичной системы счисления и 
преобразовывает в двоичную.  <br> Написать функцию которая выполняет преобразование наоборот.';
echo '<br> <br>';

echo 'из десятичной в двоичную <br> ';
function from10to2($a)
{
    $a = (int) $a;
    $neg = $a < 0;
    $a = abs($a);
    $bin = '';
    while ($a != 0) {
        $bin = ($a % 2) . $bin;
        $a = (int)($a / 2);
    }
    if ($neg) $bin = '-' . $bin;
    return $bin;
}

echo '42 res = ' . from10to2(42);

echo '<br> <br>';

echo ' из двоичной в десятичную';
function from2to10($bin)
{
    $str_bin =(string)$bin;
    $n = 1;
    $dec = 0;

    for ($i = strlen($str_bin) - 1; $i >= 0; $i--)
        {
            if((int)$str_bin[$i] == 1){
                 $dec += $n;                    
            }
            $n *=  2;
        }
    return $dec;
}

echo '<br> 101010 res = ' . from2to10(101010);