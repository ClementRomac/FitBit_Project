<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */
### Conversion du CSV en tableau PHP ###
$dataSet = parse_csv_file('..\data\data.csv', true, ';');

$subject = $dataSet[2]["date"];

print_r($matches);



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
