<?php

echo '2. Написать функцию которая выводит первые N чисел фибоначчи';
echo '<br> <br>';

function fibo($nNumber)
{
    $arrFibo = array();

    $nNumber--;
    $arrFibo[] =0;

    $nNumber--;
    $arrFibo[] =1;

    $firstNum  = 0;
    $secondNum = 1;
    $numFibo = 0;

    while ($nNumber > 0) {
        $numFibo = ($firstNum) + ($secondNum);
        $firstNum = $secondNum;
        $secondNum = $numFibo;
        $nNumber--;
        $arrFibo[] =$numFibo;
    }
    return $arrFibo;
}

var_dump(fibo(25));