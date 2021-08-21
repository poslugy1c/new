<?php

echo '5. Для одномерного массива
<br> - Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
<br> - Отсортировать элементы по возрастанию/убыванию';
echo '<br> <br>';

function PercentRatio($arr){
    $numNegative =0;
    $numPositive =0;
    $num0 =0;
    $simple =0;

    for($i = 0; $i < count($arr); $i++){
        if ($arr[$i] < 0){
            $numNegative++;
        }else if($arr[$i] > 0){
            $numPositive++;
        }else{
            $num0++;
        };

        $isSimlple =true;
        for($j = 2; $j < $arr[$i]; $j++){
            if ($arr[$i] % $j == 0) 
            {
                $isSimlple =false;
                break;
            } 
        }

        if($isSimlple && $arr[$i] != 0) {
            $simple++;
            // echo '<br> simple ' . $arr[$i] . ' ' . $j;
        };

    }

    echo '<br>';
    echo 'Процент отрицательных в массиве: ' . ($numNegative * 100 / count($arr)) .'% <br>';
    echo 'Процент положительных в массиве: ' . ($numPositive * 100 / count($arr)) .'% <br>';
    echo 'Процент нулей в массиве: ' . ($num0 * 100 / count($arr)) . '% <br>';
    echo 'Процент простых чисел: ' . ($simple * 100 / count($arr)) . '% <br>';
    // echo '<br> simple ' . $simple;

}; 

$newArr = array(5, 7, 0 , 444, 17, 8, 4, 0, 8, -29, 0, 8, 4, 188, 11, 5); 

// $newArr = array(5, 0, 8, 8, -5, -5, 8); 

PercentRatio($newArr);

echo '<br>';

function SortArr(&$arr, $sort_dec =false){
    $m = 0;
    $n = count($arr);

    for($i = 0; $i < $n; $i++) {
        $m = $i;

        for($j = $i + 1; $j < $n; $j++) {
            if ($sort_dec){
                if(($arr[$j]) > ($arr[$m]) ){
                    $m = $j;
                };
            }else{
                if(($arr[$j]) < ($arr[$m]) ){
                    $m = $j;
                };
            }
        };

        $exch = $arr[$i];
        $arr[$i] = $arr[$m];
        $arr[$m] =$exch; 

        // echo ' arr i ' . $arr[$i];
    };
};  

echo '<br>';
echo 'Исходный массив' . '<br>';
print_r($newArr);
echo '<br>';
echo '<br>';
echo 'Отсортированный массив по возростанию' . '<br>';
SortArr($newArr);
print_r($newArr);
echo '<br>';
echo '<br>';
echo 'Отсортированный массив по убыванию' . '<br>';
SortArr($newArr, true);
print_r($newArr);