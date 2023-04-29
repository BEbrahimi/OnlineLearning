<?php
/**
 * Created by PhpStorm.
 * User: BEZ
 * Date: 3/19/2023
 * Time: 4:33 PM
 */
$hasError = false;
$hasSuccess = false;
$addSubMenu = null;


if (isset($_POST['btn-sub-menu'])){
    if (!empty($_POST['menu_title']) && !empty($_POST['menu_href']) &&!empty($_POST['menu_status']) &&!empty($_POST['sub_menu'])){
        $addSubMenu = addSubMenu($_POST['sub_menu'],$_POST['menu_title'],$_POST['menu_href'],$_POST['menu_status']);
//        var_dump($addMenu);
        if ($addSubMenu){
            $hasSuccess = true;
        }else{
            $hasError = true;
        }
    }else{
        $hasError = true;
    }
}