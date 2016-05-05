<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:04
 */
// $dataSet is available with this include
include 'include.php';
include 'Date_ColumnHeadings.php';
include '../BDD.php';

//$activity = (sleeping) // $column = (day | week | month)
// $table = table corresponding to th insert
function feed_bdd_sleeping($activity, $table, $column)
{
    global $bdd;
    global $dataSet;
    $activity_column = meanDateColumnHeadings($dataSet, $activity);
    $activity_column = $activity_column[$column];
    for ($i = 0; $i < count($activity_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, time) VALUES ("' . $activity_column[$i]["date"].'", "'.$activity_column[$i][$activity].'")');
}

/*
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_sleeping("sleeping", "SleepDay", "day");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_sleeping("sleeping", "SleepWeek", "week");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
feed_bdd_sleeping("sleeping", "SleepMonth", "month");
// DO NOT RUN THIS CODE | DO NOT RUN THIS CODE | DO NOT RUN THIS CODE
*/
