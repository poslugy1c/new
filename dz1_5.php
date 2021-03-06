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

    $res =[
        'Процент отрицательных в массиве: ' => ($numNegative * 100 / count($arr)),
        'Процент положительных в массиве: ' => ($numPositive * 100 / count($arr)),
        'Процент нулей в массиве: ' => ($num0 * 100 / count($arr)),
        'Процент простых чисел: ' => ($simple * 100 / count($arr)),
    ];
    return $res;

}; 

$newArr = array(5, 7, 0 , 444, 17, 8, 4, 0, 8, -29, 0, 8, 4, 188, 11, 5); 

$res = PercentRatio($newArr);
echo "<pre>";
print_r($res);

echo '<br>';

function SortArr(&$arr, $sort_dec =false){
    $tempVar = 0;
    $arrCount = count($arr);

    for($i = 0; $i < $arrCount; $i++) {
        $tempVar = $i;

        for($j = $i + 1; $j < $arrCount; $j++) {
            if ($sort_dec){
                if(($arr[$j]) > ($arr[$tempVar]) ){
                    $tempVar = $j;
                };
            }else{
                if(($arr[$j]) < ($arr[$tempVar]) ){
                    $tempVar = $j;
                };
            }
        };

        $exch = $arr[$i];
        $arr[$i] = $arr[$tempVar];
        $arr[$tempVar] =$exch; 
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