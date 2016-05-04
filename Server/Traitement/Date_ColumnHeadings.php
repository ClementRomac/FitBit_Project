<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:33
 */

include 'FormatDateMonth.php';
function meanDateColumnHeadings($dataSet, $column_headings){
    $where_minutes = array("sleeping", "awake", "awakening", "in_bed", "sedentary", "mobile", "active", "very_active");
    $isConvertible = false;
    if (in_array($column_headings, $where_minutes))
        $isConvertible = true;
    array_shift($dataSet);
    $sumWeek=0;
    $sumMonth=0;
    $week = array();
    $month = array();
    $day = array();
    $numberOfDayForMonth=0;
    $incrementWeek =6;
    for ($i=0; $i<+count($dataSet);$i++){
        $sumWeek+=$dataSet[$i][$column_headings];
        $sumMonth+=$dataSet[$i][$column_headings];
        $date = $dataSet[$i]["date"];
        if ($isConvertible)
            $day[] = array("date"=> $date, $column_headings => convert_min_into_array($dataSet[$i][$column_headings]));
        else
            $day[] = array("date"=> $date, $column_headings => $dataSet[$i][$column_headings]);
        $numberOfDayForMonth++;

        //------------------------------Traitement semaine

        if ($i  == $incrementWeek){
            $dataColumn_headings =$sumWeek/7; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            if ($isConvertible)
                $week[]= array("date"=> $date, $column_headings => convert_min_into_array($dataColumn_headings)); //ajout des données chaque semaine
            else {
                if ($column_headings == "steps")
                    $week[] = array("date" => $date, $column_headings => round($dataColumn_headings, 0)); //ajout des données chaque semaine
                else if ($column_headings == "floors")
                    $week[] = array("date" => $date, $column_headings => round($dataColumn_headings, 1)); //ajout des données chaque semaine
                else
                    $week[] = array("date" => $date, $column_headings => round($dataColumn_headings, 2)); //ajout des données chaque semaine
            }
            $sumWeek=0;
            $incrementWeek +=7;
        }
        //------------------------------Traitement chaque mois
        if(explode('-',$dataSet[$i]["date"])[2] =="01"//tout les débuts
            && $dataSet[$i]["date"] != "2010-01-01"){  //sauf si c'est le premier jour du DataSet

            $dataColumn_headings =$sumMonth/$numberOfDayForMonth; //poids chaque semaine
            $date = formatDateMonth($dataSet, $i, "oneMonth");
           // $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            if ($isConvertible)
                $month[]= array("date"=> $date, $column_headings => convert_min_into_array($dataColumn_headings)); //ajout des données chaque mois
            else {
                if ($column_headings == "steps")
                    $month[] = array("date" => $date, $column_headings => round($dataColumn_headings, 0)); //ajout des données chaque mois
                else if ($column_headings == "floors")
                    $month[] = array("date" => $date, $column_headings => round($dataColumn_headings, 1)); //ajout des données chaque mois
                else
                    $month[] = array("date" => $date, $column_headings => round($dataColumn_headings, 2)); //ajout des données chaque mois
            }
            $sumMonth=0;
            $numberOfDayForMonth=0;
        }

    }
    $return = array("day" => $day,
        "week" => $week,
        'month' => $month);
    return $return;
}
