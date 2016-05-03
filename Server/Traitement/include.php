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

