<?php
/**
 * Created by PhpStorm.
 * User: BEZ
 * Date: 3/19/2023
 * Time: 1:11 AM
 */

function findMenu()
{
    global $connect, $tbl_menu;
    $sql = ("SELECT * FROM `$tbl_menu` WHERE `menu_parent_id` = 0");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;

}

function findSubMenu($menuID = null)
{
    global $connect, $tbl_menu;
    $menuID = intval($menuID);
    $sql = ("SELECT * FROM `$tbl_menu` WHERE `menu_parent_id` = ?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $menuID);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function isExistSubMenu()
{
    global $connect, $tbl_menu;
    $sql = ("SELECT `menu_status` FROM `$tbl_menu` WHERE `menu_status` = 2");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function findMenuWithSubMenu()
{
    global $connect, $tbl_menu;
    $sql = ("SELECT * FROM `$tbl_menu` WHERE `menu_status` = 2");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;

}

function addMenu($menuTitle = null, $menuHref = null, $menuStatus = null)
{
    global $connect, $tbl_menu;
    $menu_parent_id = 0;
    $menuTitle = sanitize($menuTitle);
    $menuHref = sanitize($menuHref);
    $menuStatus = sanitize($menuStatus);

    $sql = ("INSERT `$tbl_menu` SET `menu_parent_id`=?, `menu_title`=?,`menu_href`=?,`menu_status`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$menu_parent_id);
    $result->bindValue(2,$menuTitle);
    $result->bindValue(3,$menuHref);
    $result->bindValue(4,$menuStatus);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;

}
function addSubMenu($menu_parent_id=null,$menuTitle = null, $menuHref = null, $menuStatus = null)
{
    global $connect, $tbl_menu;
    $menu_parent_id = sanitize($menu_parent_id);
    $menuTitle = sanitize($menuTitle);
    $menuHref = sanitize($menuHref);
    $menuStatus = sanitize($menuStatus);

    $sql = ("INSERT `$tbl_menu` SET `menu_parent_id`=?, `menu_title`=?,`menu_href`=?,`menu_status`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$menu_parent_id);
    $result->bindValue(2,$menuTitle);
    $result->bindValue(3,$menuHref);
    $result->bindValue(4,$menuStatus);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;




}











