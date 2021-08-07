<?php

echo '3. Написать функцию, возведения числа N в степень M';
echo '<br> <br>';

function myPow($n, $m)
{
    if($m == 0) return 1;

    $neg =false;
    if($m < 0) {
        $m = -$m;
        $neg =true;
    };

    $res =$n;
    for($i=0; $i < $m-1; $i++)
    {
       $res *=  $n; 
    }  

    if($neg) return 1/$res;
    return $res;
}

echo myPow(5, -2);

// echo '<br> <br>';
// echo Pow(5, -2);


