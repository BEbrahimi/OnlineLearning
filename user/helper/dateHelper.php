<?php
function dateToShort($date = null){
    $array = explode(' ',$date);
    list($year,$month,$day) = explode('-',$array[0]);
    list($hour,$minute,$second) = explode(':',$array[1]);
    $timestamp = mktime($hour,$minute,$second,$month,$day,$year);
    return date("Y-m-d ",$timestamp);
}
function dateToShortLong($date = null){
    $array = explode(' ',$date);
    list($year,$month,$day) = explode('-',$array[0]);
    list($hour,$minute,$second) = explode(':',$array[1]);
    $timestamp = mktime($hour,$minute,$second,$month,$day,$year);
    return date("Y-m-d | H:i:m ",$timestamp);
}
function dateTOGregorian($date = null){
//    $date = '';
    $date = explode('/',$date);
    $date = dateToShort($date[0],$date[1],$date[2],'-');
    return $date;
}