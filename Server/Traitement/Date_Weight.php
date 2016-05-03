<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */

// $dataSet is available with tih include
include 'parse_csv.php';

function meanDateWeight($dataSet){
    array_shift($dataSet);
    $sumWeek=0;
    $sumTwoMonths=0;
    $sumYear=0;
    $week = array();
    $twoMonths = array();
    $year = array();
    for ($i=0; $i<count($dataSet)+1;$i++){
        $sumWeek+=$dataSet[$i]["weight"];
        $sumTwoMonths+=$dataSet[$i]["weight"];
        $sumYear+=$dataSet[$i]["weight"];

        //------------------------------Traitement semaine
        if ($i%7 == 0){
            $weight =$week/7; //poids chaque semaine
            $date = $dataSet[$i]["weight"];//date rentrée chaque semaine
            $week[]= array("date"=> $date, "weight" => $weight); //ajout des données chaque semaine
            $sumWeek=0;
        }
        //------------------------------------------------


    }
}
?>
