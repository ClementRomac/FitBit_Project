<?php

// $dataSet is available with this include
include 'include.php';

// Get imc by the last day until the nbr_days given by parameter
function get_sleeping_time($dataset, $nbr_days = 20) {
    $index_sleeping = 3;
    $column_sleeping = $dataset[0][$index_sleeping];
    $length_dataset = count($dataset)-1;
    $sleeping_time = array();
    for ($i =$length_dataset; $i > $length_dataset-$nbr_days; $i--){
        $daily_sleeping_time = $dataset[$i][$column_sleeping];
        $sleeping_time[] = convert_min_into_array($daily_sleeping_time);
    }
    return $sleeping_time;
}

$dump = get_sleeping_time($dataSet, 10);
print_r($dump[4]);
