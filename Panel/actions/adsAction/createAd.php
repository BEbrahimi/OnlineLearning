<?php
/**
 * Created by PhpStorm.
 * User: BEZ
 * Date: 3/8/2023
 * Time: 5:05 PM
 */

$msgError = false;
$msgSuccess = false;
$msg = null;
$createAd = null;
if (isset($_POST['ad-submit'])){
    if (!empty($_POST['ad-title']) && !empty($_POST['ad-href'])&& !empty($_POST['start_at'])&& !empty($_POST['end_at'])&& !empty($_POST['ad-img'])){
       $createAd = createAd($_POST['ad-title'],$_POST['ad-href'],$_POST['start_at'],$_POST['end_at'],$_POST['ad-img']);
       if ($createAd){
           $msgSuccess = true;
//           $msg = 'Your ads has been successfully created!';
       }
    }else{
        $msgError = true;
//        $msg = 'You must ot fill the form';
    }
}

