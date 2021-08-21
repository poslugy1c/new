<?php

echo '<p> 6. Для двумерных массивов
<br> - Транспонировать матрицу
<br> - Сложить две матрицы
<br> - Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.
 </p>';

//1 Транспонировать матрицу
$matr = [
    [1, 2, 3, 12],
    [4, 5, 6, 0],
    [7, 8, 9, -1],
    [4, 1, 18, 44],
];

function transposeArray(&$arr)
{
    $newArray = $arr;

    for ($i = 0; $i < count($newArray); $i++) {
        for ($j = 0; $j < count($newArray); $j++) {
            // echo $newArray[$i][$j];
            $arr[$j][$i] = $newArray[$i][$j];
        };
    };
}

echo '<br> Исходная матрица <br>';
print_r($matr);

transposeArray($matr);
echo '<br> Транспонированая матрица <br>';
print_r($matr);

//2  Сложить две матрицы
echo '<br> <br>';

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

function SumMatrix($m1, $m2)
{
    $m = count($m1);
    $n = count($m1[0]);
    $mRes = array();

    for ($i = 0; $i < $m; $i++) {
        $mRes[$i] = array();
        for ($j = 0; $j < $n; $j++) $mRes[$i][$j] = $m1[$i][$j] + $m2[$i][$j];
    }
    return $mRes;
};

$mRes = SumMatrix($matr1, $matr2);

echo '<br> Матрица 1 <br>';
print_r($matr1);
echo '<br> Матрица 2 <br>';
print_r($matr2);
echo '<br> Результирующая матрица <br>';
print_r($mRes);

//3 Удалить те строки, в которых сумма элементов положительна 
//и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.

echo '<br> <br>';

$matrNew = [
    [1,  2, 3, -17],
    [4,  2, 6,  0],
    [3,  0, 6,  3],
    [-9, 8, 0,  1]
];

function removeRow(&$m)
{
    $IndNumbers = array();

    for ($i = 0; $i < count($m); $i++) {
        $sum = 0;
        $nulElem = false;

        for ($j = 0; $j < count($m[$i]); $j++) {
            $sum += $m[$i][$j];

            if ($m[$i][$j] == 0) {
                $nulElem = true;
            };
        };

        if (($sum >= 0) && ($nulElem)) {
              unset($m[$i]); 
        };
    };
}

function removeCol(&$m)
{
    $IndNumbers = array();

    for ($i = 0; $i < count($m[0]); $i++) {
        $sum = 0;
        $nulElem = false;
        for ($j = 0; $j < count($m[$i]); $j++) {
            $sum += $m[$j][$i];

            if ($m[$j][$i] == 0) {
                $nulElem = true;
            };
            // echo '<br>';
        };

        if (($sum >= 0) && ($nulElem)) {
            $IndNumbers[] = $i;
        };
    };

    // echo '<br>';
    // print_r($IndNumbers);

    for ($i = 0; $i < count($m[0]); $i++) {
        for ($x = 0; $x < count($IndNumbers); $x++) {
            if ($IndNumbers[$x] == $i) {
                for ($j = 0; $j < count($m); $j++) {
                    // array_splice($m[$j], $i, 1);
                    unset($m[$j][$i]);
                };
                // array_splice($IndNumbers, $x, 1);
            };
        };
    };
}

echo '<br> Исходная матрица <br>';
print_r($matrNew);
$matrix_copy =$matrNew;

removeRow($matrNew);

echo '<br> Результат обработки строк <br>';
print_r($matrNew);

removeCol($matrix_copy);

echo '<br> Результат обработки столбцов <br>';
print_r($matrix_copy);

