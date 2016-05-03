<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */

// $dataSet is available with tih include
include 'include.php';

function meanDateWeight($dataSet){
    array_shift($dataSet);
    $sumWeek=0;
    $sumTwoMonths=0;
    $sumYear=0;
    $week = array();
    $twoMonths = array();
    $year = array();
    $monthNow=0;
    $numberOfDayForTwoMonth=0;
    $incrementWeek =6;
    for ($i=0; $i<+count($dataSet);$i++){
      //  echo $dataSet[$i]["weight"]." ";
        $sumWeek+=$dataSet[$i]["weight"];
        $sumTwoMonths+=$dataSet[$i]["weight"];
        $sumYear+=$dataSet[$i]["weight"];
        $numberOfDayForTwoMonth++;

        //------------------------------Traitement semaine
      
        if ($i  == $incrementWeek){

            $weight =$sumWeek/7; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            $week[]= array("date"=> $date, "weight" => $weight); //ajout des données chaque semaine
            $sumWeek=0;
            $incrementWeek +=7;
        }
        //------------------------------Traitement deux mois
        if(explode('-',$dataSet[$i]["date"])[2] =="01"//tout les débuts
            && explode('-',$dataSet[$i]["date"])[1] %2!=0// de chaque mois impairs
            && $dataSet[$i]["date"] != "2010-01-01"){  //sauf si c est le premier jour du DataSet

            $weight =$sumTwoMonths/$numberOfDayForTwoMonth; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            $twoMonths[]= array("date"=> $date, "weight" => $weight); //ajout des données chaque mois
            $sumTwoMonths=0;
            $numberOfDayForTwoMonth=0;
        }
        //------------------------------Traitement année
        if(explode('-',$dataSet[$i]["date"])[1] =="01"//tout les débuts
            && explode('-',$dataSet[$i]["date"])[2] =="01"// de chaque mois impairs
            && explode('-',$dataSet[$i]["date"])[0] !="2010"){  //sauf si c est le premier jour du DataSet

            $numberOfDayForYear = 365;
            if ( explode('-',$dataSet[$i]["date"])[0] % 4 ==0) $numberOfDayForYear++; //si année bisextille ajout d'un jour
            $weight =$sumYear/$numberOfDayForYear; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque année
            $year[]= array("date"=> $date, "weight" => $weight); //ajout des données chaque semaine
            $sumYear=0;
        }
    }
    var_dump($year);
}
?>
