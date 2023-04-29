<?php
//create ads
function createAd($adTitle = null, $adHref = null,$startAd = null, $endAd = null, $adImg = null){
    global $connect, $tbl_ad;
    $adTitle = sanitize($adTitle);
    $adHref = sanitize($adHref);
    $startAd = sanitize($startAd);
    $endAd = sanitize($endAd);
    $adImg = sanitize($adImg);
    $sql = ("INSERT `$tbl_ad` SET `ad_title`=?,`ad_href`=?,`start_ad`=?, `end_ad`=?,`ad_img`=? ");

    $result = $connect->prepare($sql);
    $result ->bindValue(1,$adTitle);
    $result ->bindValue(2,$adHref);
    $result ->bindValue(3,$startAd);
    $result ->bindValue(4,$endAd);
    $result ->bindValue(5,$adImg);

    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

//find ad
function findAd(){
    global $connect, $tbl_ad;
    $sql =("SELECT * FROM `$tbl_ad` ORDER BY `ad_id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;

}

//find ad by date
function findAdByDate(){
    global $connect, $tbl_ad;
    $date = date('Y-m-d');
    $sql =("SELECT * FROM `$tbl_ad` WHERE `end_ad`>= ? ORDER BY RAND()");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$date);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}