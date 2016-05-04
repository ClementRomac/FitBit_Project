<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:44
 */
include 'include.php';
include 'Date_ColumnHeadings.php';
include '../BDD.php';

//$activity = (distance | steps) // $column = (day | week | month)
// $table = table corresponding to th insert
function feed_bdd_distance($activity, $table, $column)
{
    global $bdd;
    global $dataSet;
    $activity_column = meanDateColumnHeadings($dataSet, $activity);
    $activity_column = $activity_column[$column];
    for ($i = 0; $i < count($activity_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, steps) VALUES ("' . $activity_column[$i]["date"] . '", "'.$activity_column[$i][$activity].'")');
}

/*
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("distance", "kmDay", "day");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("distance", "kmWeek", "week");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("distance", "kmMonth", "month");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("steps", "StepsDay", "day");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("steps", "StepsWeek", "week");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * feed_bdd_distance("steps", "StepsMonth", "month");
 * DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
 * */

