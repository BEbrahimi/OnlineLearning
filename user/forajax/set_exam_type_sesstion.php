<?php

session_start();
include '../init.php';
$exam_category = $_GET['exam_category'];
$_SESSION['exam_category'] = $exam_category;

global $connect, $tbl_exam_cat;
$sql = mysqli_query($connect,"SELECT * FROM `$tbl_exam_cat` WHERE `category` =$exam_category");
while ($row = mysqli_fetch_array($sql))
{
    $_SESSION['exam_category']= $row ['exam_time'];
}
$date = date("Y-m-d H:i:s");
$_SESSION['end_time'] = date("Y-m-d H:i:s",strtotime($date."+ $_SESSION[exam_time] minutes"));
$_SESSION['exam_start'] ="yes";
