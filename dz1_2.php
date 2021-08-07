<?php

echo '2. Написать функцию которая выводит первые N чисел фибоначчи';
echo '<br> <br>';

function fibo($n)
{
    $n--;
    echo 0 . '<br>';
    $n--;
    echo 1 . '<br>';

    $firstNum  = 0;
    $SecondNum = 1;
    $numFibo = 0;

    while ($n > 0) {
        $numFibo = ($firstNum) + ($SecondNum);
        $firstNum = $SecondNum;
        $SecondNum = $numFibo;
        $n--;
        echo $numFibo . '<br>';
    }
}

fibo(25);

