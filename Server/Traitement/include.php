<?php
### Conversion du CSV en tableau PHP ###
$dataSet = parse_csv_file('../data/data.csv', true, ';');

function parse_csv_file($file, $column_headings = false, $delimiter = ',', $enclosure = "\"") {

    $row = 1;
    $rows = array();
    $handle = fopen($file, 'r');
    $headingTexts = null;

    while (($data = fgetcsv($handle, 1000, $delimiter, $enclosure )) == true) {
        if ($column_headings && $row == 1) {
            $headingTexts = $data;
        }
        elseif ($column_headings) {
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

function convert_min_into_array($minutes) {
    $modulo_hours = 60;
    $minutes_left = $minutes % $modulo_hours;
    $hours_left = intval(($minutes-$minutes_left) / $modulo_hours);
    $array = array("hours" => $hours_left,
        "minutes" => $minutes_left);
    return $array;
}

function convert_min_into_string($minutes){
    $modulo_hours = 60;
    $minutes_left = $minutes % $modulo_hours;
    $hours_left = intval(($minutes-$minutes_left) / $modulo_hours);
    $hours_minutes = $hours_left." h".$minutes_left." min";
    return $hours_minutes;
}
