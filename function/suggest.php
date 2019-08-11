<?php
function suggest($array){
    $copyArray = $array;
    arsort($copyArray);
    $newArray = [];
    foreach ($copyArray as $key => $value) {
        array_push($newArray, $key);
    }
    $suggest = array_slice($newArray,0,3);
    return $suggest;
}