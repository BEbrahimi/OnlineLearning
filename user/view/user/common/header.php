<!--model config start-->

<?php
function setTitle(){
    $page = basename($_SERVER["REQUEST_URI"]);
    $pageClean = str_replace(".php","","$page");
    switch ($pageClean){
        case "index":
            echo "Main Page";
            break;
        case "single":
            echo "Free courses";
            break;
        case "course":
            echo "Main courses";
            break;
        case "login-registration":
            echo "Register Page";
            break;
        case "contact":
            echo "About As";
            break;
        case "new-password":
            echo "new password";
            break;
        case "reset-password":
            echo "reset-password";
            break;
        default:
            echo "Main page";
    }
    return;
}
?>
<!--model config end-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo setTitle();?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <base href="//localhost/bashir/project/user/">
    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/BootSideMenu.css" rel="stylesheet">
    <link href="assets/css/new-random.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/course.css" rel="stylesheet">
    <link href="assets/css/single.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/videojs.css" rel="stylesheet">





    <script src="assets/js/jquery.min.1.11.2.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
<?php include "init.php"?>