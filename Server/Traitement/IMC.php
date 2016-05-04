<?php

// $dataSet is available with tih include
include 'include.php';

// Get imc by the last day until the nbr_days given by parameter
function get_imc($dataSet, $nbr_days = 20) {
    $index_imc = 2;
    $column_imc = $dataSet[0][$index_imc];
    $imc = array();
    for ($i = 1; $i < $nbr_days+1; $i++){
        $daily_imc = $dataSet[$i][$column_imc];
        $imc[] = array("date" => $dataSet[$i]["date"],
            $dataSet[0][$index_imc] => $daily_imc);
    }
    return $imc;
}
