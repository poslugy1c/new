
<?php

function bulbSort_weight(&$arr, $compare)
{
    for ($i = 0, $count = count($arr); $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($compare($arr[$i], $arr[$j])) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
}

$weights = [2 => 4, 4 => 5, 7 => 2, 1 => 2];
$m = [2, 4, 7, 1];

$compare = function ($value1, $value2) use ($weights) {
    return $weights[$value1] < $weights[$value2];
};

bulbSort_weight($m, $compare);

echo "<pre>";
print_r($m);

/////////////////////////////////////////////////////

echo '<br>';
echo '<br>';

function bulbSort(&$arr)
{
    for ($i = 0, $count = count($arr); $i < $count; $i++) {

        for ($j = $i + 1; $j < $count; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
}

$m = [2, 4, 7, 1];

echo "<pre>";
print_r($m);
bulbSort($m);
echo "<pre>";
print_r($m);

/////////////////////////////////////////////////////

echo '<br>';
echo '<br>';

function bulbSortRec(&$arr, $i=0, $n=0)
{
    $n =$i+1;  
    
    echo ' ';    
    echo $i;
    echo $n;

    if ($i >= count($arr)-1){
        return $arr;
    };    

    if ($arr[$i] > $arr[$n]) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$n];
        $arr[$n] = $temp;
    };   

    bulbSortRec($arr, ++$i, ++$n);

}

$m = [2, 4, 7, 1];


echo "<pre>";
print_r($m);
bulbSortRec($m);
echo "<pre>";
print_r($m);

//http://localhost/dz/new/buble.php

// echo '<br>';
// echo '<br>';
// echo 'bubbleSortRecursive';

// function bubbleSortRecursive(&$arr, $i=0, $j=0) {
//     if ($j ==0){
//         $j = count($arr);
//     };

//     if ($i > $j) {
//         return $arr;
//     } else if ($i == $j - 1) {
//         bubbleSortRecursive($arr, 0, $j - 1);
//     } else if ($arr[$i] > $arr[$i + 1]) {
//         $temp = $arr[$i];
//         $arr[$i] = $arr[$i + 1];
//         $arr[$i+1] = $temp;
//         bubbleSortRecursive($arr, $i + 1, $j);
//     } else {
//         bubbleSortRecursive($arr, $i + 1, $j);
//     }
// }

// $m = [2, 4, 7, 1];

// echo "<pre>";
// print_r($m);
//  bubbleSortRecursive($m);
// echo "<pre>";
// print_r($m);

// echo '<br>';
// echo '<br>';

echo '<br>';
echo '<br>';
echo 'bubbleSortRecursive';

function SortArrRec(&$arr, $i=0, $j=0 , $n =0) {

    if ($n ==0){
        $n = count($arr);
    };

    if($j == $n-$i-1)
    {
        $i = $i+1;
        $j = 0;
    }
    if($i == $n-1)
        return $arr;

    if($arr[$j] > $arr[$j+1]) {
        $temp = $arr[$j];
        $arr[$j] = $arr[$j + 1];
        $arr[$j+1] = $temp;}

    $j++;
    SortArrRec($arr,$i,$j,$n);
}

$m = [2, 17, 1, 4, 3, 9, 7, 1];

echo "<pre>";
print_r($m);
SortArrRec($m);
echo "<pre>";
print_r($m);

echo '<br>';
echo '<br>';