<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 09/05/2016
 * Time: 14:57
 */

penalityWhenAwakening(440);

function penalityWhenAwakening($sleeping){
    $res = $sleeping % 90;
    if ($res > 45) $res = 90 - $res;
    $res = 45/4.5; // note sur 10
    echo $res;
}

function numberSommeilCycle($sleeping){
    return $sleeping % 90;
}

function sleepCycleLost($awake){
    return $awake / 90;
}

function  penalityNumberAwakening($sleeping, $awake){
    $numberSommeilCycle = numberSommeilCycle($sleeping);
    
}