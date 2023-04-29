<?php
include 'init.php';
global $connect,$tbl_logs;

$user_id = $_SESSION['userInfo']['id'];
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_borwser = getUserBrowser($_SERVER['HTTP_USER_AGENT']);
$user_email = $_SESSION['userInfo']['userEmail'];
$user_name = $_SESSION['userInfo']['userName'];
$detail = 'logOut';
$sql=("INSERT `$tbl_logs` SET `user_id`=?,`ip`=?,`browser`=?,`email`=?,`user_name`=?,`detail`=?");
$result = $connect->prepare($sql);
$result->bindValue(1,$user_id);
$result->bindValue(2,$user_ip);
$result->bindValue(3,$user_borwser);
$result->bindValue(4,$user_email);
$result->bindValue(5,$user_name);
$result->bindValue(6,$detail);
$result->execute();
session_unset();
session_destroy();
header('location:login-registration.php');
exit();