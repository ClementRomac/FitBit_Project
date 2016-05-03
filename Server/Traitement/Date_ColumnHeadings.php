<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:33
 */

function meanDateColumnHeadings($dataSet, $column_headings){
    array_shift($dataSet);
    $sumWeek=0;
    $sumMonth=0;
    $week = array();
    $month = array();
    $day = array();
    $monthNow=0;
    $numberOfDayForMonth=0;
    $incrementWeek =6;
    for ($i=0; $i<+count($dataSet);$i++){
        $sumWeek+=$dataSet[$i][$column_headings];
        $sumMonth+=$dataSet[$i][$column_headings];
        $day[] =$dataSet[$i][$column_headings];
        $numberOfDayForMonth++;

        //------------------------------Traitement semaine

        if ($i  == $incrementWeek){

            $dataColumn_headings =$sumWeek/7; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            $week[]= array("date"=> $date, $column_headings => $dataColumn_headings); //ajout des données chaque semaine
            $sumWeek=0;
            $incrementWeek +=7;
        }
        //------------------------------Traitement deux mois
        if(explode('-',$dataSet[$i]["date"])[2] =="01"//tout les débuts
            && $dataSet[$i]["date"] != "2010-01-01"){  //sauf si c est le premier jour du DataSet

            $dataColumn_headings =$sumMonth/$numberOfDayForMonth; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            $month[]= array("date"=> $date, $column_headings => $dataColumn_headings); //ajout des données chaque mois
            $sumMonth=0;
            $numberOfDayForMonth=0;
        }
    }
    var_dump($day);
}
