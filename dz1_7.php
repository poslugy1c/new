<?php

echo '<p> 7. Рекурсии
<br> - Все задачи на циклы которые можно реализовать с помощью рекурсии, переписать с помощью рекурсивных функций
<br> - Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
 </p>';
echo '<br>';


echo '1. Рекурсия. из десятичной в двоичную рекурсией <br> ';

function from10to2($a)
{
    if ($a != 0) {
        $bin = ($a % 2) + 10 * from10to2($a / 2);
        return $bin;
    } else {
        return 0;
    };
};

echo '104 res = ' . from10to2(104);

echo '<br>';
echo '<br>';

echo '1. Рекурсия.  из двоичной в десятичную рекурсией';

function from2to10($bin)
{
    if ($bin == 0) return 0;
    return $bin % 10 + 2 * from2to10($bin / 10);
}


echo '<br> 101010 res = ' . from2to10(1101000);

echo '<br>';
echo '<br>';

echo '2. Рекурсия.  найти сумму всех первых N чисел фибоначи ';
echo '<br>';

function fibo($limit, $a = 0, $b = 1, $sum =0)
{
    if ($limit < 1) {
        return $sum;
    }        
    return fibo($limit - 1, $b, $a + $b, $sum + $a);
}

echo 'сумма всех первых 9 чисел фибоначи ' . fibo(9);
