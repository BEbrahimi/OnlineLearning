<?php
function isUserInBlackList($userEmail=null){
    global $connect,$tbl_blackList;
    $userEmail = sanitize($userEmail);
    $sql = ("SELECT `userEmail` FROM `$tbl_blackList` WHERE  `userEmail`=? ");
    $result = $connect->prepare($sql);

    $result->bindValue(1,$userEmail);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}


function findUserInBlackList(){
    global $connect,$tbl_blackList;

    $sql = ("SELECT * FROM `$tbl_blackList` ");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}

function insertInBlackList($userName,$userEmail){
    global $connect,$tbl_blackList;
    $userName = sanitize($userName);
    $userEmail = sanitize($userEmail);
    $sql = "INSERT INTO $tbl_blackList(userName,userEmail) VALUES ('$userName','$userEmail')";
    $result = $connect->query($sql);

    return $result;

}