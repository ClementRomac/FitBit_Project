<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */

// $dataSet is available with this include
include 'include.php';
include 'Date_ColumnHeadings.php';
include '../BDD.php';
function meanDateWeight(){
    global $dataSet;
    array_shift($dataSet);
    $sumWeek=0;
    $sumTwoMonths=0;
    $sumYear=0;
    $week = array();
    $twoMonths = array();
    $year = array();
    $numberOfDayForTwoMonth=0;
    $incrementWeek =6;
    for ($i=0; $i<+count($dataSet);$i++){
        $sumWeek+=$dataSet[$i]["weight"];
        $sumTwoMonths+=$dataSet[$i]["weight"];
        $sumYear+=$dataSet[$i]["weight"];
        $numberOfDayForTwoMonth++;

        //------------------------------Traitement semaine
      
        if ($i  == $incrementWeek){

            $weight =$sumWeek/7; //poids chaque semaine
            $date = $dataSet[$i]["date"];//date rentrée chaque semaine
            $week[]= array("date"=> $date, "weight" => round($weight, 1)); //ajout des données chaque semaine
            $sumWeek=0;
            $incrementWeek +=7;
        }
        //------------------------------Traitement deux mois
        if(explode('-',$dataSet[$i]["date"])[2] =="01"//tout les débuts
            && explode('-',$dataSet[$i]["date"])[1] %2!=0// de chaque mois impairs
            && $dataSet[$i]["date"] != "2010-01-01"){  //sauf si c est le premier jour du DataSet

            $weight =$sumTwoMonths/$numberOfDayForTwoMonth; //poids chaque semaine

            $date = formatDateMonth($dataSet, $i, "twoMonths");

            //date rentrée chaque semaine
            $twoMonths[]= array("date"=> $date, "weight" => round($weight, 1)); //ajout des données chaque mois
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
            $year[]= array("date"=> $date, "weight" => round($weight, 1)); //ajout des données chaque semaine
            $sumYear=0;
        }
    }
    $return = array("week" => $week,
        "twoMonths" => $twoMonths,
        'year' => $year);
    return $return;
}

function feed_bdd_weight($table, $column)
{
    global $bdd;
    $weight_column = meanDateWeight();
    $weight_column = $weight_column[$column];
    for ($i = 0; $i < count($weight_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, weight) VALUES ("' . $weight_column[$i]["date"] . '", ' . $weight_column[$i]["weight"] . ')');
}

function feed_bdd_weight_day($activity, $table, $column)
{
    global $bdd;
    global $dataSet;
    $weight_column = meanDateColumnHeadings($dataSet, $activity);
    $weight_column = $weight_column[$column];
    for ($i = 0; $i < count($weight_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, weight) VALUES ("' . $weight_column[$i]["date"] . '", ' . $weight_column[$i]["weight"] . ')');
}


/*
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_weight("WeightWeek", "week");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_weight("WeightTwoMonth", "twoMonths");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_weight("WeightYear", "year");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
*/


