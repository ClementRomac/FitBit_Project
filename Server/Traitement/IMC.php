<?php
### Conversion du CSV en tableau PHP ###
$dataSet = parse_csv_file('data/data.csv', true, ';');

// Print an array with formatting
function test($dataset) {
    echo "<pre>" . print_r($dataset) . "</pre>";
}


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

// Get imc by the last day until the nbr_jour given by parameter
function get_imc($dataset, $nbr_jours = 20) {
    $index_imc = 2;
    $column_imc = $dataset[0][$index_imc];
    $lenght_dataset = count($dataset)-1;
    $imc = array();
    for ($i =$lenght_dataset; $i > $lenght_dataset-$nbr_jours; $i--){
        $daily_imc = $dataset[$i][$column_imc];
        $imc[] = $daily_imc;
    }
    return $imc;
}

