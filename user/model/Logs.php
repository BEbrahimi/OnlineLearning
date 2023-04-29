<?php
function findUsersLogs(){
    global $connect,$tbl_logs;
    $sql = ("SELECT `id`,`user_id`,`time`,`ip`,`browser`,`email`,`user_name`,`detail` FROM `$tbl_logs` ORDER BY `id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;

}