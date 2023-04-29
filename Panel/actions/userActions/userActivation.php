<?php
$queryActiveUser = null;
$msg = '';
$msgError = false;
$msgSuccess = false;

if (isset($_GET['activation_key']) && !empty($_GET['activation_key'])){
    $queryActiveUser = isActivationKeyExist($_GET['activation_key']);
    if ($queryActiveUser){
        activateUserAccount($_GET['activation_key']);
        $msgSuccess = true;
//        $msg = 'Dear user, your account has been successfully activated... Now you can login to the site';

    }else{
        $msgError = true;
        $msg = 'Your account activation key is not valid!!! If you want, contact the management ';
    }
}

?>