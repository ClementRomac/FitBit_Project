<?php
/**
 * Created by PhpStorm.
 * User: Cedric
 * Date: 10/05/2016
 * Time: 11:37
 */

include 'include.php';
include '../BDD.php';

// Valeur du record, date du dernier établi, nombre de fois
// Max$column, $table.date, numberMaxi$column
function max_per_table($table, $column, $label) {
    global $bdd;
    global $dataSet;
    $sql = 'SELECT MAX( alias.'.$column.' ) AS Max'.$column.', alias.date, (
    SELECT COUNT( * ) 
        FROM '.$table.' alias
        WHERE alias.'.$column.' = (
    SELECT MAX( '.$column.' )
            FROM '.$table.')) as numberMaxi'.$column.'
    FROM '.$table.' alias';
    $query = $bdd->query($sql);
    $result = $query->fetch();
    $bdd->query('INSERT INTO Records (label, record, date, nbr_record) VALUES ("' . $label . '", "'.$result[0].'", "'.$result[1].'", "'.$result[2].'")');
}


/*
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("WeightDay", "weight", "Weight");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("Imc", "imc", "Imc");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("SleepDay", "time", "Sleeping");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("AwakeDay", "time", "Awake");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("CaloriesDay", "calories", "Calories");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("StepsDay", "steps", "Steps");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("DistanceDay", "distance", "Distance");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("FloorsDay", "floors", "Floors");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("SedentaryDay", "time", "Sedentary");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("MobileDay", "time", "Mobile");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("ActiveDay", "time", "Active");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
$dump = max_per_table("VeryActiveDay", "time", "VeryActive");
*/
