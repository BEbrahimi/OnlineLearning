<?php

// Post counter in all pages
function countPublishPost(){
    global $connect, $tbl_posts;
    $sql =("SELECT COUNT(*) FROM `$tbl_posts` WHERE `post_status`=1");
    $result = $connect->prepare($sql);
    $result->execute();
    $rowCounts = $result->fetchColumn(0);
    if ($rowCounts >0){
        echo $rowCounts;
    }else{
        echo '0';
    }
}

// count all user
function countAllUsers(){
    global $connect, $tbl_users;
    $sql =("SELECT COUNT(*) FROM `$tbl_users`");
    $result = $connect->prepare($sql);
    $result->execute();
    $rowCounts = $result->fetchColumn(0);
    if ($rowCounts >0){
        echo $rowCounts;
    }else{
        echo '0';
    }
}

// count all user
function countAllTopics(){
    global $connect, $tbl_posts;
    $sql =("SELECT COUNT(*) FROM `$tbl_posts`");
    $result = $connect->prepare($sql);
    $result->execute();
    $rowCounts = $result->fetchColumn(0);
    if ($rowCounts >0){
        echo $rowCounts;
    }else{
        echo '0';
    }
}

//function countAllUsersVisit(){
//    global $connect, $tbl_counter;
//    $sql =("SELECT COUNT(*) FROM `$tbl_counter`");
//    $result = $connect->query($sql);
//    $result->execute();
//    $rowCounts = $result->fetchColumn(0);
//    if ($rowCounts >0){
//        echo $rowCounts;
//    }else{
//        echo '0';
//    }
//}

// count all user visit
function countAllUsersVisit(){
    global $connect, $tbl_counter;
    $sql =("SELECT * FROM `$tbl_counter`");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }else{
       return false;
    }
}

// counter ++
function counterAllUsersVisit(){
    global $connect, $tbl_counter;
    $sql =("UPDATE `$tbl_counter` SET `visit_counter` = `visit_counter` +1 ");
    $result = $connect->prepare($sql);
    $result->execute();
}

