<?php

// $dataSet is available with this include
include 'include.php';

// Get imc by the last day until the nbr_days given by parameter
function get_sleeping_time($dataSet, $nbr_days = 20) {
    $index_sleeping = 3;
    $column_sleeping = $dataSet[0][$index_sleeping];
    $sleeping_time = array();
    for ($i =1; $i < $nbr_days+1; $i++){
        $daily_sleeping_time = $dataSet[$i][$column_sleeping];
        $sleeping_time[] = array("date" => $dataSet[$i]["date"],
            $dataSet[0][$index_sleeping] => convert_min_into_array($daily_sleeping_time));
    }
    return $sleeping_time;
}

