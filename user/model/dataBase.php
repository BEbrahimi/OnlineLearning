<?php
$Host = "localhost";
$dataBase ="ol-script";
$userName = "root";
$PassWord = "";
$setName = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

try{
    $connect = new PDO("mysql:host=$Host;dbname=$dataBase",$userName ,$PassWord,$setName);
//echo 'You are connected to the database';
}catch(PDOException $error){
    echo 'not connect'.$error->getmessage();
}
$tbl_users ="ol_users";
$tbl_posts = "ol_posts";
$tbl_cats = "ol_cats";
$tbl_logs = "ol_logs";
$tbl_blackList = "tbl_blacklist";
$tbl_postLikes = "ol_post_likes";
$tbl_progress = "ol_progress";
$tbl_poll = "ol_poll";
$tbl_poll_item = "ol_poll_item";
$tbl_poll_item_choice = "ol_poll_item_user_choice";
$tbl_ad = 'ol_ads';
$tbl_user_ticket = 'ol_user_ticket';
$tbl_info = 'ol_info';
$tbl_slider = 'ol_slider';
$tbl_menu = 'ol_menu';
$tbl_counter = 'ol_visit_counter';
$tbl_course = 'ol_course';
$tbl_transaction = 'ol_transactions';
$tbl_user_course = 'ol_users_course';
$tbl_exam_cat = 'ol_exam_categories';
$tbl_online_quiz = 'ol_online_quiz';