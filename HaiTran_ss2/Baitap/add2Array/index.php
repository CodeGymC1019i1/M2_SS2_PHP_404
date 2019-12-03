<?php
function add2Array($array1, $array2) {
    $arr = $array1;
    $index = count($array1);
    for ($i = 0; $i < count($array2); $i++) {
        $arr[$index++] = $array2[$i];
    }
    return $arr;
}

$arr1 = [1, 2, 3, 4, 5, 6];
$arr2 = [7, 8, 9, 10];

var_dump(add2Array($arr1, $arr2));