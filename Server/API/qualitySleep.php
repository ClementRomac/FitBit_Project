<?php

// Number cycle sleep per night
function numberSleepCycle($SleepingDay){
    $modulo = 90;
    $reste = $SleepingDay % 90;
    $sleep_cycle = ($SleepingDay - $reste) / $modulo;
    $reste = ($reste > 60) ? true : false;
    if ($reste)
        $sleep_cycle += 1;
    return $sleep_cycle;
}


// Cycle sleep lost in night
function sleepCycleLost($AwakeDay){
    return $AwakeDay / 90;
}


//
function  penaltyNumberAwakening($SleepingDay, $AwakeDay){
    $numberSommeilCycle = numberSleepCycle($SleepingDay);
    if ($numberSommeilCycle < $AwakeDay)
        $res = 1;
    else if( $numberSommeilCycle > 2)
        $res = 0.7;
    else if( $numberSommeilCycle==1)
        $res = 0.5;
    else
        $res =0;
    return $res;
}


// Return % différentiel du sommeil sur la moyenne de la semaine passée.
function percentageFromWeek($SleepingDay, $SleepingWeek) {
    return ($SleepingDay * 100 / $SleepingWeek) - 100;
}


function QualitySleep($SleepingDay, $AwakeDay, $SleepingWeek) {
    $sleep_cycle_note = array( 0 => 0, 1=> 0.2, 2 => 0.4, 3 => 0.7, 4 => 0.8, 5 => 1, 6 => 1, 7 => 1, 8 => 0.9, 9 => 0.6, 10 => 0.3);

    $percentage_from_week = percentageFromWeek($SleepingDay, $SleepingWeek); // +4,3%
    $number_sleep_cycle =  numberSleepCycle($SleepingDay); // 5-6
    $sleep_cycle_lost = sleepCycleLost($AwakeDay); // 0,4-1,2
    $penalty_from_awakening = penaltyNumberAwakening($SleepingDay, $AwakeDay); // 0, 0.3, 0.7, 1

    // Max à $percentage_from_week * $number_cylce_sleep in $sleep_cycle_note.
    $quality_first = round($percentage_from_week * $sleep_cycle_note[$number_sleep_cycle], 1);

    if ($percentage_from_week < 0)
        $quality_first = $percentage_from_week - ($percentage_from_week-$quality_first);

    $pourcentage_potentiel_perdu = $sleep_cycle_lost * 100 / $number_sleep_cycle; // 10 %
    $note_awake = $pourcentage_potentiel_perdu * $penalty_from_awakening; // 7%
    $qualitySleep = $quality_first - $note_awake;

    return $qualitySleep;
}