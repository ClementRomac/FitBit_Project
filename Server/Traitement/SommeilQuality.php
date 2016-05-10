<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 09/05/2016
 * Time: 14:57
 */

//penalityWhenAwakening(440);


//
function penalityWhenAwakening($sleeping){
    $res = $sleeping % 90;
    if ($res > 45) $res = 90 - $res;
    $res = $res/4.5; // note sur 10
    return $res;
}


// Number cycle sleep per night
function numberSommeilCycle($sleeping){
    return $sleeping % 90;
}


// Cycle sleep lost in night
function sleepCycleLost($awake){
    return $awake / 90;
}


//
function  penalityNumberAwakening($sleeping, $awake){
    $numberSommeilCycle = numberSommeilCycle($sleeping);
    if ($numberSommeilCycle < $awake){
        $res = 10;
    }
    else if( $numberSommeilCycle> 2){
        $res = 7;
    }
    else if( $numberSommeilCycle==1){
        $res = 5;
    }
    else{
        $res =0;
    }
}


// Return % différentiel du sommeil sur la moyenne de la semaine passée.
function percentageFromWeek($SleepingDay, $SleepingWeek) {
    return ($SleepingDay * 100 / $SleepingWeek) - 100;
}

function QualitySleep($Sleeping) {
    
}