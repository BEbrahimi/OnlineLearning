<?php
session_start();
if (!isset($_SESSION['endtime'])) {
    echo '00:00:00';
} else {
    $time = gmdate("H:i:s", strtotime($_SESSION['end_time']) - strtotime(date("H:i:s")));
    if (strtotime($_SESSION['end_time']) < strtotime(date("Y-m-d H:i:s"))) {
        echo '00:00:00';
    }
    else{
        echo $time;
    }
}
