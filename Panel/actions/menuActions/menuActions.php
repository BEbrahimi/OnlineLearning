<?php
$hasError = false;
$hasSuccess = false;
$addMenu = null;
if (isset($_POST['btn-menu'])){
    if (!empty($_POST['menu_title']) && !empty($_POST['menu_href']) &&!empty($_POST['menu_status'])){
        $addMenu = addMenu($_POST['menu_title'],$_POST['menu_href'],$_POST['menu_status']);
//        var_dump($addMenu);
        if ($addMenu){
            $hasSuccess = true;
        }else{
            $hasError = true;
        }
    }else{
        $hasError = true;
    }
}




