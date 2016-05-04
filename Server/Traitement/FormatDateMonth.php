<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 04/05/2016
 * Time: 15:04
 */


function fromatDateMonth($dataSet, $i , $month){
    $yearAdd = explode('-',$dataSet[$i]["date"])[0];
    $oneMonceBefore = explode('-',$dataSet[$i]["date"])[1]-1;
    $monthAdd = formatDateMonthMoreNine($oneMonceBefore, $dataSet, $i, 1);
    if ($month == "twoMonths"){
        $twoMonthBefore= explode('-',$dataSet[$i]["date"])[1]-2;
        $twoMonthBefore = formatDateMonthMoreNine($twoMonthBefore, $dataSet, $i, 2);
        if ( $twoMonthBefore == 11)//si on est revenue en arrière on enlève une année
            $yearAdd --;

        $date = $yearAdd."-".$twoMonthBefore."/".$monthAdd;
    }
    if ($month=="oneMonth"){
        if (explode('-',$dataSet[$i]["date"])[1]-1== "00") {
            $yearAdd--;
        }
        $date = $yearAdd."-".$monthAdd;
    }

    return $date;
}

function formatDateMonthMoreNine($monceBefore, $dataSet, $i, $numberMonth){
    if($numberMonth == 2)
        $isEqual ="-1";
    else{
        $isEqual ="00";
    }
    if($monceBefore>9 || $monceBefore == $isEqual) {
        if ($monceBefore == $isEqual) {
            $monthAdd = 13-$numberMonth;
        } else {
            $monthAdd = (explode('-', $dataSet[$i]["date"])[1] - $numberMonth);
        }
    }
    else{
        $monthAdd= "0".(explode('-',$dataSet[$i]["date"])[1]-$numberMonth);
        echo $monthAdd;
    }
    return $monthAdd;
}