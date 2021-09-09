<?php

echo '3. Написать функцию, возведения числа N в степень M';
echo '<br> <br>';

function myPow($nNumber, $mNumber)
{
    if($mNumber == 0) {
        return 1;
    };    

    $neg =false;
    if($mNumber < 0) {
        $mNumber = -$mNumber;
        $neg =true;
    };

    $res =$nNumber;
    for($i=0; $i < $mNumber-1; $i++)
    {
       $res *=  $nNumber; 
    }  

    if($neg) return 1/$res;
    return $res;
}

echo myPow(5, -2);

// echo '<br> <br>';
// echo Pow(5, -2);


