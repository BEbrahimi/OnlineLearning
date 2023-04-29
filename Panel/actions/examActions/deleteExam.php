<?php

include "../../../user/init.php";
if (isset($_GET['id'])&& !empty($_GET['id']) ){
    $id = intval($_GET['id']);

}else{
    header("Location:index.php");
    exit;

}
$deleteExamById = null;
$deleteExamById = deleteExamById($id);
if ($deleteExamById){
    header("location:../../create_test.php?deleteUserSuccessfully=1010");
}else{
    header("location:create_test.php?deleteUserFail=2020");
}