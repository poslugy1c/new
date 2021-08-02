<?php

echo '2. Написать функцию которая выводит первые N чисел фибоначчи';
echo '<br> <br>';

// function fibo($i)
// {
//     if ($i == 0) echo 0;
//     if ($i == 1 || $i == 2) {
//         echo 1;
//     } else {
//         echo fibo($i - 1) + fibo($i - 2);
//     }
// }


function fibo($n){
    $firstNum  = 0;
    $SecondNum = 1;
    $numFibo = 0;

    while ($n > 0) {
        $numFibo =$firstNum +$SecondNum;
        echo $numFibo . '<br>';
        $firstNum = $SecondNum;
        $SecondNum = $numFibo;       
        $n--;
    } 
}

fibo(12);
