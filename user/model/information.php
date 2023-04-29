<?php
function findInfo(){
    global $connect,$tbl_info;
    $sql = ("SELECT * FROM `$tbl_info` ORDER BY `info_id` DESC LIMIT 4");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

function findInfoPanel(){
    global $connect,$tbl_info;
    $sql = ("SELECT * FROM `$tbl_info` ORDER BY `info_id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

function createInfo($infoBody = null){
    global $connect, $tbl_info;
    $infoBody = sanitize($infoBody);

    $sql = ("INSERT `$tbl_info` SET `info_body`=?");

    $result = $connect->prepare($sql);
    $result ->bindValue(1,$infoBody);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}
