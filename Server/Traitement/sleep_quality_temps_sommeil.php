<?php

// $dataSet is available with tih include
include 'include.php';

// Get imc by the last day until the nbr_jour given by parameter
function get_sleeping_time($dataset, $nbr_days = 20) {
    $index_imc = 3;
    $column_imc = $dataset[0][$index_imc];
    $length_dataset = count($dataset)-1;
    $imc = array();
    for ($i =$length_dataset; $i > $length_dataset-$nbr_days; $i--){
        $daily_imc = $dataset[$i][$column_imc];
        $imc[] = $daily_imc;
    }
    return $imc;
}

