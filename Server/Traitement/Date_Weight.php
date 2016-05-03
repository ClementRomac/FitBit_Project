<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */
### Conversion du CSV en tableau PHP ###
$dataSet = parse_csv_file('..\data\data.csv', true, ';');

meanDateWeight($dataSet);

//print_r($dataSet[1]);

function parse_csv_file($file, $columnheadings = false, $delimiter = ',', $enclosure = "\"") {

    $row = 1;
    $rows = array();
    $handle = fopen($file, 'r');

    while (($data = fgetcsv($handle, 1000, $delimiter, $enclosure )) !== FALSE) {
        if (!($columnheadings == false) && ($row == 1)) {
            $headingTexts = $data;
        } elseif (!($columnheadings == false)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);
                $data[$headingTexts[$key]] = $value;
            }
        }
        $rows[] = $data;
        $row++;
    }

    fclose($handle);
    return $rows;
}

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
        if ($i == 0)
            $modulo = 6;
        else{
            $modulo= 7;
        }
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
