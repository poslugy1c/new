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

echo '<br>';
echo '<br>';

echo '3. Рекурсия. Написать функцию, возведения числа N в степень M';
echo '<br>';

function myPow($n, $m)
{
    if ($m == 0) {
        return 1;
      }
      if ($m < 0) {
        return myPow(1/$n, -$m);
      }
      return $n * myPow($n, $m-1);
}

echo myPow(5, -2);

echo '<br>';
echo '<br>';

echo '4. Рекурсия. Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.';
echo '<br>';

function inDiapazon($ip, $beginDiap, $endDiap, $triada =0)
{
    // return $ip .' not in diapazon';
    $arrIp = explode(".", $ip);
    $arrBeginDiap = explode(".", $beginDiap);
    $arrEndDiap = explode(".", $endDiap);

    if($triada >count($arrIp)-1){
        return $ip .' in diapazon';
    }elseif(($arrIp[$triada] < $arrBeginDiap[$triada]) || ($arrIp[$triada] > $arrEndDiap[$triada])){
        // echo '<br> ';
        // echo $triada;
        // echo '<br> ';
        return $ip .' not in diapazon';
    };

    return inDiapazon($ip, $beginDiap, $endDiap, ++$triada);
}

$res =inDiapazon('192.168.1.48', '192.168.1.44', '192.168.1.255');

echo $res;

echo '<br>';
echo '<br>';

echo '5. Рекурсия. Для одномерного массива
<br> - Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
<br> - Отсортировать элементы по возрастанию/убыванию';
echo '<br>';
echo '<br>';

function PercentRatio($arr, $n =0, $numNegative =0, $numPositive =0, $num0 =0, $simple =0){

    if($n >count($arr)-1){
        //возвращаю результат
        echo 'Процент отрицательных в массиве: ' . ($numNegative * 100 / count($arr)) .'% <br>';
        echo 'Процент положительных в массиве: ' . ($numPositive * 100 / count($arr)) .'% <br>';
        echo 'Процент нулей в массиве: ' . ($num0 * 100 / count($arr)) . '% <br>';
        echo 'Процент простых чисел: ' . ($simple * 100 / count($arr)) . '% <br>';
        return 0;
    };

    if ($arr[$n] < 0){
        $numNegative++;
    }else if($arr[$n] > 0){
        $numPositive++;
    }else{
        $num0++;
    };

    $isSimlple =true;
    for($j = 2; $j < $arr[$n]; $j++){
        if ($arr[$n] % $j == 0) 
        {
            $isSimlple =false;
            break;
        } 
    }

    if($isSimlple && $arr[$n] != 0) {
        $simple++;
    };

    return PercentRatio($arr, ++$n, $numNegative, $numPositive,$num0,$simple);   
}; 

$newArr = array(5, 7, 0 , 444, 17, 8, 4, 0, 8, -29, 0, 8, 4, 188, 11, 5); 

PercentRatio($newArr);

//

