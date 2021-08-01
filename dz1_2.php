<?php

echo '2. Написать функцию которая выводит первые N чисел фибоначчи';
echo '<br> <br>';

function fibo($i)
{
    if ($i == 0) return 0;
    if ($i == 1 || $i == 2) {
        return 1;
    } else {
        return fibo($i - 1) + fibo($i - 2);
    }
}

fibo(5);
