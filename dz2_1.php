<?php

echo '<br> <br>';

echo 'из десятичной в двоичную <br> ';
function from10to2($dec)
{
    try {	
        if(gettype($dec) != 'integer'){
            throw new Exception('переданный параметр ' .$dec . ' не является корректным числом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };

    $neg = $dec < 0;
    $dec = abs($dec);
    $bin = '';
    while ($dec != 0) {
        $bin = ($dec % 2) . $bin;
        $dec = (int)($dec / 2);
    }
    if ($neg) { 
        $bin = '-' . $bin;
    }
    return $bin;
}

echo ' test res = ' . from10to2('test');
echo '<br>';

function from2to10($bin)
{
    try {	
        if(gettype($bin) != 'integer'){
            throw new Exception('переданный параметр  не является корректным числом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };

    $str_bin =(string)$bin;

    $n = 1;
    $dec = 0;

    for ($i = strlen($str_bin) - 1; $i >= 0; $i--)
        {
            if((int)$str_bin[$i] == 1){
                 $dec += $n;                    
            }
            $n *=  2;
        }
    return $dec;
}

echo '101010 res = ' . from2to10([]);
echo '<br>';

function fibo($nNumber)
{
    try {	
        if(gettype($nNumber) != 'integer'){
            throw new Exception('переданный параметр  не является корректным числом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };

    $arrFibo = array();

    $nNumber--;
    $arrFibo[] =0;

    $nNumber--;
    $arrFibo[] =1;

    $firstNum  = 0;
    $secondNum = 1;
    $numFibo = 0;

    while ($nNumber > 0) {
        $numFibo = ($firstNum) + ($secondNum);
        $firstNum = $secondNum;
        $secondNum = $numFibo;
        $nNumber--;
        $arrFibo[] =$numFibo;
    }
    return $arrFibo;
}

var_dump(fibo('xxx'));

echo '<br>';

function myPow($nNumber, $mNumber)
{

    try {	
        if(gettype($nNumber) != 'integer' || gettype($mNumber) != 'integer'){
            throw new Exception('один из переданных параметров  не является корректным числом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };   

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

echo myPow(5, 'zzz');

echo '<br>';

function inDiapazon($ip, $beginDiap, $endDiap)
{

    try {	
        if(gettype($ip) != 'string' || gettype($beginDiap) != 'string'  || gettype($endDiap) != 'string'){
            throw new Exception('один из переданных параметров  не является корректным <br>');
        }else{         
            if(!filter_var($ip, FILTER_VALIDATE_IP) || !filter_var($beginDiap, FILTER_VALIDATE_IP)  || !filter_var($endDiap, FILTER_VALIDATE_IP)) {
                throw new Exception('один из переданных параметров  не является корректным ip адресом <br>');
            };
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    }; 

    $arrIp = array();
    $triada ='';
    $numTriad =0;

    for ($i = 0; $i < strlen($ip); $i++){

        if($ip[$i] == '.'){
            $arrIp[] = (int) $triada;
            $numTriad++;
            // echo '<br> ' . (int) $triada .' / '. $numTriad;

            $bTriada ='';
            $numBeginTriad =0;
            $eTriada ='';
            $numEndTriad =0;

            for ($j = 0; $j < strlen($beginDiap); $j++){               
                if($beginDiap[$j] == '.'){
                    $numBeginTriad++;

                    if( ((int) $triada < (int)$bTriada) && $numBeginTriad == $numTriad){
                        return false;
                    } 

                    $bTriada = '';
                } else {
                    $bTriada = $bTriada . $beginDiap[$j];
                }
            }   

            for ($x = 0; $x < strlen($endDiap); $x++){
                
                if($endDiap[$x] == '.'){
                    $numEndTriad++;

                    if( ((int) $triada > (int)$eTriada) && $numEndTriad == $numTriad){
                        return false;
                    } 

                    $eTriada = '';
                } else {
                    $eTriada = $eTriada . $endDiap[$x];
                }
            }    

            $triada = '';
        }else{
            $triada = $triada . $ip[$i];
        }
    }

    $arrIp[] = (int) $triada;
    $numBeginTriad++;
    $numEndTriad++;
    $numTriad++;

    if( ((int) $triada < (int)$bTriada) && $numBeginTriad == $numTriad){
        return false;
    } 
    if( ((int) $triada > (int)$eTriada) && $numEndTriad == $numTriad){
        return false;
    } 

    return true;
}

$res =inDiapazon('192.168.1.77', '192.168.1.44ccc', '192.168.1.255');

echo 'in diapazon = ' . $res;

echo '<br>';

function PercentRatio($arr){
    $numNegative =0;
    $numPositive =0;
    $num0 =0;
    $simple =0;


    try {	
        if(!is_array($arr)){
            throw new Exception('переданный параметр не является массивом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };  


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

// $newArr = array(5, 7, 0 , 444, 17, 8, 4, 0, 8, -29, 0, 5, 4, 188, 11, 5); 

$newArr = array('hh','dd', 5); 

$res = PercentRatio($newArr);
echo "<pre>";
print_r($res);

echo '<br>';

function SortArr(&$arr, $sort_dec =false){

    try {	
        if(!is_array($arr)){
            throw new Exception('переданный параметр не является массивом <br>');
        }else if(gettype($sort_dec) != 'boolean'){
            throw new Exception('второй параметр переданный параметр не является boolean <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    }; 


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
    };
};  

echo '<br>';
echo 'Исходный массив' . '<br>';
print_r($newArr);
echo '<br>';
echo '<br>';
echo 'Отсортированный массив по возростанию' . '<br>';
SortArr($newArr, 'not boolean');
print_r($newArr);
echo '<br>';
echo '<br>';
echo 'Отсортированный массив по убыванию' . '<br>';
SortArr($newArr, true);
print_r($newArr);

$matr = [
    [1, 2, 3, 12],
    [4, 5, 6, 0],
    [7, 8, 9, -1],
    [4, 1, 'iii', 44],
];

function transposeArray(&$arr)
{

    try {	
        if(!is_array($arr)){
            throw new Exception('переданный параметр не является массивом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    };  

    $newArray = $arr;

    for ($i = 0; $i < count($newArray); $i++) {
        for ($j = 0; $j < count($newArray); $j++) {
            // echo $newArray[$i][$j];
            $arr[$j][$i] = $newArray[$i][$j];
        };
    };
}

echo '<br> Исходная матрица <br>';
echo "<pre>";
$notArr = 0;
print_r($notArr);

echo '<br>';

transposeArray($notArr);

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
    [33, 'xxx', 6],
    [11, 3, 17]
];

// $matr2 =5;

function SumMatrix($matrix1, $matrix2)
{

    try {	
        if(!is_array($matrix1) || !is_array($matrix2)){
            throw new Exception('один из переданный параметров не является массивом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    }; 

    $m1Count = count($matrix1);
    $m2Count = count($matrix1[0]);
    $mRes = array();

    for ($i = 0; $i < $m1Count; $i++) {
        $mRes[$i] = array();
        for ($j = 0; $j < $m2Count; $j++) {

            try {	
                if(gettype($matrix1[$i][$j]) != 'integer' || gettype($matrix2[$i][$j]) != 'integer'){
                    throw new Exception('один из элементов матрицы не является числом <br>');
                };
            } catch (Exception $e) {
               echo $e -> getMessage();
               return null;
            }; 

            $mRes[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
        }
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
    [-19, 8, 'xxx',  1]
];

function removeRow(&$matrix)
{

    try {	
        if(!is_array($matrix) || !is_array($matrix)){
            throw new Exception('один из переданный параметров не является массивом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    }; 


    $mLength =count($matrix);
    for ($i = 0; $i < $mLength; $i++) {
        $sum = 0;
        $nulElem = false;

        for ($j = 0; $j < count($matrix[$i]); $j++) {

            try {	
                if(gettype($matrix[$i][$j]) != 'integer' ){
                    throw new Exception('один из элементов матрицы не является числом <br>');
                };
            } catch (Exception $e) {
               echo $e -> getMessage();
               return null;
            }; 


            $sum += $matrix[$i][$j];

            if ($matrix[$i][$j] == 0) {
                $nulElem = true;
            };
        };
        if (($sum >= 0) && ($nulElem)) {
              unset($matrix[$i]); 
        };
    };
}

function removeCol(&$matrix)
{

    try {	
        if(!is_array($matrix) || !is_array($matrix)){
            throw new Exception('один из переданный параметров не является массивом <br>');
        };
    } catch (Exception $e) {
       echo $e -> getMessage();
       return null;
    }; 

    $indNumbers = array();

    for ($i = 0; $i < count($matrix[0]); $i++) {
        $sum = 0;
        $nulElem = false;
        for ($j = 0; $j < count($matrix[$i]); $j++) {

            try {	
                if(gettype($matrix[$j][$i]) != 'integer' ){
                    throw new Exception('один из элементов матрицы не является числом <br>');
                };
            } catch (Exception $e) {
               echo $e -> getMessage();
               return null;
            }; 


            $sum += $matrix[$j][$i];

            if ($matrix[$j][$i] == 0) {
                $nulElem = true;
            };
        };

        if (($sum >= 0) && ($nulElem)) {
            $indNumbers[] = $i;
        };
    };

    echo '<br>';
    print_r($indNumbers);

    for ($i = 0; $i < count($matrix[0]); $i++) {
        for ($x = 0; $x < count($indNumbers); $x++) {
            if ($indNumbers[$x] == $i) {
                for ($j = 0; $j < count($matrix); $j++) {
                    unset($matrix[$j][$i]);
                };
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