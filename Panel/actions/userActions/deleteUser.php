<?php

include "../../../user/init.php";
if (isset($_GET['id'])&& !empty($_GET['id']) ){
    $id = intval($_GET['id']);

}else{
    header("Location:index.php");
    exit;

}
$deleteUserById = null;
$deleteUserById = deleteUserById($id);
if ($deleteUserById){
    header("location:../../users.php?deleteUserSuccessfully=1010");
}else{
    header("location:users.php?deleteUserFail=2020");
}