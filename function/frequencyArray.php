<?php
    function frequencyArray ($array, $key){
        $newArray = [];
        for ($i = 0; $i < count($array); $i++){
            array_push($newArray, $array[$i][$key]);
        }
        $frequencyArray = array_count_values($newArray);
        return $frequencyArray;
    }