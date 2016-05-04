<?php

// $dataSet is available with tih include
include 'include.php';
include '../BDD.php';

// Get imc by the last day until the nbr_days given by parameter
function get_imc($dataSet) {
    $index_imc = 2;
    $column_imc = $dataSet[0][$index_imc];
    $imc = array();
    for ($i = 1; $i < count($dataSet); $i++){
        $daily_imc = $dataSet[$i][$column_imc];
        $imc[] = array("date" => $dataSet[$i]["date"],
            $dataSet[0][$index_imc] => $daily_imc);
    }
    return $imc;
}

function feed_bdd_weight()
{
    global $bdd;
    global $dataSet;
    $imc_per_day = get_imc($dataSet);
    for ($i = 0; $i < count($imc_per_day); $i++)
        $bdd->query('INSERT INTO Imc (date, imc) VALUES ("' . $imc_per_day[$i]["date"] . '", ' . $imc_per_day[$i]["bmi"] . ')');
}

/*
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_weight();
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
*/
