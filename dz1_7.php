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

function fibo($limit, $a = 0, $b = 1, $sum = 0)
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
        return myPow(1 / $n, -$m);
    }
    return $n * myPow($n, $m - 1);
}

echo myPow(5, -2);

echo '<br>';
echo '<br>';

echo '4. Рекурсия. Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.';
echo '<br>';

function inDiapazon($ip, $beginDiap, $endDiap, $triada = 0)
{
    // return $ip .' not in diapazon';
    $arrIp = explode(".", $ip);
    $arrBeginDiap = explode(".", $beginDiap);
    $arrEndDiap = explode(".", $endDiap);

    if ($triada > count($arrIp) - 1) {
        return true;
    } elseif (($arrIp[$triada] < $arrBeginDiap[$triada]) || ($arrIp[$triada] > $arrEndDiap[$triada])) {
        // echo '<br> ';
        // echo $triada;
        // echo '<br> ';
        return false;
    };

    return inDiapazon($ip, $beginDiap, $endDiap, ++$triada);
}

$res = inDiapazon('192.168.1.48', '192.168.1.44', '192.168.1.255');

echo 'in diapazon = ' . $res;

echo '<br>';
echo '<br>';

echo '5. Рекурсия. Для одномерного массива
<br> - Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
<br> - Отсортировать элементы по возрастанию/убыванию';
echo '<br>';
echo '<br>';

function PercentRatio($arr, $n = 0, $numNegative = 0, $numPositive = 0, $num0 = 0, $simple = 0)
{

    if ($n > count($arr) - 1) {
        $res = [
            'Процент отрицательных в массиве: ' => ($numNegative * 100 / count($arr)),
            'Процент положительных в массиве: ' => ($numPositive * 100 / count($arr)),
            'Процент нулей в массиве: ' => ($num0 * 100 / count($arr)),
            'Процент простых чисел: ' => ($simple * 100 / count($arr)),
        ];
        return $res;
    };

    if ($arr[$n] < 0) {
        $numNegative++;
    } else if ($arr[$n] > 0) {
        $numPositive++;
    } else {
        $num0++;
    };

    $isSimlple = true;
    for ($j = 2; $j < $arr[$n]; $j++) {
        if ($arr[$n] % $j == 0) {
            $isSimlple = false;
            break;
        }
    }

    if ($isSimlple && $arr[$n] != 0) {
        $simple++;
    };

    return PercentRatio($arr, ++$n, $numNegative, $numPositive, $num0, $simple);
};

$newArr = array(5, 7, 0, 444, 17, 8, 4, 0, 8, -29, 0, 8, 4, 188, 11, 5);

$res = PercentRatio($newArr);
echo "<pre>";
print_r($res);
echo '</pre>';

echo '<br>';
echo '<br>';

function SortArrRec(&$arr, $rev = false, $i = 0, $j = 0, $n = 0)
{

    if ($n == 0) {
        $n = count($arr);
    };

    if ($j == $n - $i - 1) {
        $i = $i + 1;
        $j = 0;
    }
    if ($i == $n - 1)
        return $arr;

    if ($rev == 1) {
        if ($arr[$j] < $arr[$j + 1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    } else {
        if ($arr[$j] > $arr[$j + 1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    };

    $j++;
    SortArrRec($arr, $rev, $i, $j, $n, $rev);
}

echo '<br>';
echo 'Исходный массив' . '<br>';
echo "<pre>";
print_r($newArr);
echo '</pre>';

echo '<br>';
echo '<br>';
echo 'Отсортированный массив по возростанию' . '<br>';
SortArrRec($newArr);
echo "<pre>";
print_r($newArr);
echo '</pre>';

echo '<br>';
echo '<br>';
echo 'Отсортированный массив по убыванию' . '<br>';
SortArrRec($newArr, true);

echo "<pre>";
print_r($newArr);
echo '</pre>';

echo '<br>';
echo '<br>';

//1 Транспонировать матрицу
echo '6. Рекурсия. Транспонировать матрицу';

$matr = [
    [1, 2, 3, 12],
    [4, 5, 6, 0],
    [7, 8, 9, -1],
    [4, 1, 18, 44],
];

// $matr = [
//     [1, 2, 3],
//     [4, 5, 6],
//     [7, 8, 9],
// ];

function transposeArrayRec(&$arr, $i = 0, $newArray = [])
{
    if ($i >=  count($arr)) {
        return $arr;
    };

    if (count($newArray) == 0) {
        $newArray = $arr;
    };

    for ($j = 0; $j < count($newArray); $j++) {
        $arr[$j][$i] = $newArray[$i][$j];
    };

    transposeArrayRec($arr, ++$i, $newArray);
};

echo '<br> Исходная матрица <br>';
echo "<pre>";
print_r($matr);
echo "</pre>";

transposeArrayRec($matr);
echo '<br> Транспонированая матрица <br>';
echo "<pre>";
print_r($matr);
echo "</pre>";
//2  Сложить две матрицы
echo '7. Рекурсия.  Сложить две матрицы';
echo '<br>';

$matr1 = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

$matr2 = [
    [5, 6, 66],
    [33, 1, 6],
    [11, 3, 17]
];

function SumMatrix($m1, $m2, $i = 0, $mRes = [])
{
    $m = count($m1);
    $n = count($m1[0]);

    if ($i >=  count($m1)) {
        return $mRes;
    };

    if (count($mRes) == 0) {
        $mRes = $m1;
    };

    $mRes[$i] = array();
    for ($j = 0; $j < $n; $j++) $mRes[$i][$j] = $m1[$i][$j] + $m2[$i][$j];

    return SumMatrix($m1, $m2, ++$i, $mRes);
};

echo '<br> Матрица 1 <br>';
echo "<pre>";
print_r($matr1);
echo "</pre>";
echo '<br> Матрица 2 <br>';

echo "<pre>";
print_r($matr2);
echo "</pre>";

$resM = SumMatrix($matr1, $matr2);

echo '<br> Результирующая матрица <br>';
echo "<pre>";
print_r($resM);
// echo "</pre>";

echo '<br> <br>';

//3 Удалить те строки, в которых сумма элементов положительна 
//и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.
echo '7. Рекурсия.  Удалить те строки, в которых сумма элементов положительна ';
echo '<br>';
echo 'и присутствует хотя бы один нулевой элемент. Аналогично для столбцов. ';

echo '<br> <br>';

$matrNew = [
    [1,  2, 3, -17],
    [4,  2, 6,  0],
    [3,  0, 6,  3],
    [-19, 8, 0,  1]
];

function removeRow(&$m, $i = 0, $mLength = 0)
{
    if ($mLength == 0) {
        $mLength = count($m);
    };

    if ($i >=  $mLength) {
        return $m;
    };

    $sum = 0;
    $nulElem = false;

    for ($j = 0; $j < count($m[$i]); $j++) {
        $sum += $m[$i][$j];

        if ($m[$i][$j] == 0) {
            $nulElem = true;
        };
        // echo $m[$i][$j]; 
    };
    if (($sum >= 0) && ($nulElem)) {
        unset($m[$i]);
    };

    removeRow($m, ++$i, $mLength);
}

function removeCol(&$m1, $i = 0)
{
    if ($i >= count($m1)) {
        return $m1;
    };

    $sum = 0;
    $nulElem = false;
    for ($j = 0; $j < count($m1); $j++) {
        if ($m1[$j][$i] == 0) {
            $nulElem = true;
        };
        $sum += $m1[$j][$i];
        // echo $m1[$j][$i] . ' ';
    };

    // echo '(' . $z .')';    
    if (($sum >= 0) && ($nulElem)) {
        for ($j = 0; $j < count($m1); $j++) {
            unset($m1[$j][$i]);
        };
    };
    // echo ' | ';
    return removeCol($m1, ++$i);
}

echo '<br> Исходная матрица <br>';
print_r($matrNew);
$matrix_copy = $matrNew;

removeRow($matrNew);

echo '<br> Результат обработки строк <br>';
print_r($matrNew);

removeCol($matrix_copy);

echo '<br> Результат обработки столбцов <br>';
print_r($matrix_copy);


echo '<br>';
echo '<br>';
echo '8. Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности';
echo '<br>';

$arrTest = [
    [1, 8, 7],
    4,
    [77, [99, 55, 44]],
    [-17, 219],
    333,
    [5 , [7, 0 ,-6, [[3]]]]
];

function rec($arr)
{
    foreach ($arr as $arrInd) {
        if (is_array($arrInd)) {
            echo '<br>';
            rec($arrInd);
            echo '<br>';
        } else {
            echo ' ' . $arrInd;
        };
    };

};

rec($arrTest);
