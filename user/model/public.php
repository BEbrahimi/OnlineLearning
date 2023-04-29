<?php

//findusers
function findLastUsers()
{
    global $connect, $tbl_users;
    $sql = ("SELECT *FROM `$tbl_users` ORDER BY `create_at` DESC LIMIT 4");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;

}