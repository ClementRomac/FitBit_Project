<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 02/05/2016
 * Time: 16:10
 */
### Conversion du CSV en tableau PHP ###
var_dump(parse_csv_file('..\data\data.csv', true, ';')); /* selection du fichier */
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
            $rows[] = $data;
        } else {
            $rows[] = $data;
        }
        $row++;
    }

    fclose($handle);
    return $rows;
}

?>
