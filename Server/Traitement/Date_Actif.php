<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:41
 */
include 'include.php';
include '../BDD.php';
include 'Date_ColumnHeadings.php';

//$activity = (sedentary | mobile | active | very_active | calories) // $column = (day | week | month)
// $table = table corresponding to th insert
function feed_bdd_activity($activity, $table, $column)
{
    global $bdd;
    global $dataSet;
    $activity_column = meanDateColumnHeadings($dataSet, $activity);
    $activity_column = $activity_column[$column];
    for ($i = 0; $i < count($activity_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, hours, minutes) VALUES ("' . $activity_column[$i]["date"].'", "'.$activity_column[$i][$activity]["hours"].'", "'.$activity_column[$i][$activity]["minutes"].'")');
}

function feed_bdd_calories($activity, $table, $column)
{
    global $bdd;
    global $dataSet;
    $activity_column = meanDateColumnHeadings($dataSet, $activity);
    $activity_column = $activity_column[$column];
    for ($i = 0; $i < count($activity_column); $i++)
        $bdd->query('INSERT INTO '.$table.' (date, calories) VALUES ("' . $activity_column[$i]["date"].'", "'.$activity_column[$i][$activity].'")');
}

/*
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_activity("active", "ActiveDay", "day");
feed_bdd_activity("active", "ActiveWeek", "week");
feed_bdd_activity("active", "ActiveMonth", "month");
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_activity("mobile", "MobileDay", "day");
feed_bdd_activity("mobile", "MobileWeek", "week");
feed_bdd_activity("mobile", "MobileMonth", "month");
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_activity("sedentary", "SedentaryDay", "day");
feed_bdd_activity("sedentary", "SedentaryWeek", "week");
feed_bdd_activity("sedentary", "SedentaryMonth", "month");
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_activity("very_active", "VeryActiveDay", "day");
feed_bdd_activity("very_active", "VeryActiveWeek", "week");
feed_bdd_activity("very_active", "VeryActiveMonth", "month");
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
feed_bdd_calories("calories", "CaloriesDay", "day");
feed_bdd_calories("calories", "CaloriesWeek", "week");
feed_bdd_calories("calories", "CaloriesMonth", "month");
// DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK | DO NOT RUN THIS HOOK
*/

feed_bdd_activity("active", "ActiveMonth", "month");
feed_bdd_activity("mobile", "MobileMonth", "month");
feed_bdd_activity("sedentary", "SedentaryMonth", "month");
feed_bdd_activity("very_active", "VeryActiveMonth", "month");
feed_bdd_calories("calories", "CaloriesMonth", "month");
