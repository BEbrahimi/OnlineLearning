<?php
function findSlider(){
    global $connect,$tbl_slider;
    $sql = ("SELECT * FROM `$tbl_slider` ORDER BY RAND()");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

function sliderIndicators(){
    $findSlider = null;
    $output = null;
    $count = 0;
    $findSlider = findSlider();
    $rows = $findSlider->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($rows);
    foreach ($rows as $row) {
        if ($count == 0){
            $output .= '<span class="dot" onclick="currentSlide('.$count.')"></span>';
        }else{
            $output .= '<span class="dot" onclick="currentSlide('.$count.')"></span>';

        }
        $count = $count ++;
    }
    return $output;
}

function sliderImageIndicators(){
    $findSlider = null;
    $output = null;
    $count = 0;
    $findSlider = findSlider();
    $rows = $findSlider->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($rows);
    foreach ($rows as $row) {
        if ($count == 0){
            $output .= '<div class="mySlides fade1">
                            <a href="'.$row['slider_url'].'"><img src="'.BASE_URL.'/panel/uploads/'.$row['slider_img'].'" style="width:100%">
                          </a>
                        </div>';
        }else{
            $output .= '<div class="mySlides fade1">
                            <a href="'.$row['slider_url'].'"><img src="'.BASE_URL.'/panel/uploads/'.$row['slider_img'].'" style="width:100%">
                          </a>
                        </div>';

        }
        $count = $count ++;
    }
    return $output;
}

function createSlider($sliderImg = null,$sliderUrl){
    global $connect, $tbl_slider;
    $sliderImg = sanitize($sliderImg);
    $sliderUrl = sanitize($sliderUrl);

    $sql = ("INSERT `$tbl_slider` SET `slider_img`=?,`slider_url`=?");

    $result = $connect->prepare($sql);
    $result ->bindValue(1,$sliderImg);
    $result ->bindValue(2,$sliderUrl);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}