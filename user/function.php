<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Set Page Title
//function setTitle(){
//    $page = basename($_SERVER["REQUEST_URI"]);
//    $pageClean = str_replace(".php","","$page");
//    switch ($pageClean){
//        case "index":
//            echo "Main Page";
//            break;
//        case "single":
//            echo "Free courses";
//            break;
//        case "course":
//            echo "Main courses";
//            break;
//        case "login-registeration":
//            echo "Register Page";
//            break;
//        case "contact":
//            echo "About As";
//            break;
//        default:
//            echo "Main page";
//    }
//    return;
//}


//Set sanitize string
function sanitize($value){
    $level1 = trim($value);
    $level2 = strip_tags($level1);
    return $level2;
}
function sanitizeForbody($value){
    $level1 = trim($value);
    $level2 = htmlspecialchars($level1);
    return $level2;
}
function sanitizeArray($value){
    $level1 = array_map('trim',$value);
    $level2 = array_map('strip_tags',$level1);
    return $level2;

}

//hashing (hash data)
function hashData($type,$value){
    switch ($type){
        case "md5":
            return md5($value);
            break;
        case "sha1":
            return sha1($value);
            break;
    }
    return $value;
}

// public sent email function
function sendMail($current_user_mail,$mail_subject,$mail_body){
    require 'utility/phpmailer/Exception.php';
    require 'utility/phpmailer/PHPMailer.php';
    require 'utility/phpmailer/SMTP.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
//        $mail->SMTPDebug =  2;                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bashir.ebrahimi01@gmail.com';                     //SMTP username
        $mail->Password   = 'kuhpwpexayciimnz';                               //SMTP password
//        $mail->SMTPSecure = 'tls';              //Enable implicit TLS encryption
        $mail->SMTPSecure = 'ssl';  ;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        //Recipients

        $mail->CharSet ='utf-8';
        $mail->FromName ='From Online Learning';
        $mail->ContentType = 'text/html; charset = utf-8';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->AddAddress($current_user_mail,'cue');
        $mail->Subject = $mail_subject;
        $mail->Body    = $mail_body;

        $mail->send();
//        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    return;
}

//Get user browser
function getUserBrowser($user_agent){
    if (strpos($user_agent,'Edg')) return 'MS Edge';
    elseif (strpos($user_agent,'Chrome')) return 'Chrome';
    elseif (strpos($user_agent,'Safari')) return 'Safari';
    elseif (strpos($user_agent,'Firefox')) return 'Firefox';
    elseif (strpos($user_agent,'MSIE') ||strpos($user_agent,'Trident/7')) return 'Internet Explorer';
    elseif (strpos($user_agent,'Opera') ||strpos($user_agent,'OPR/')) return 'Opera';
    return 'Other';
}
