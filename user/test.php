
<?php
//// trim();                              // Remove extra space right and left
//// strip_tags();                        // Remove tags when we enter input                  this two tags work for sql enjuction
//// htmlentities();                      // It is powerful then html special cars            like xss atuck
//// htmlspecialchars();                  // This function change tags to some special char
//
//$strip = strip_tags("<p> vvvv </p>");
//$trim = trim("        Hello World");
//$htmlentities = htmlentities("<p> pppp <p/>");
//$htmlspecialchars = htmlspecialchars("<p> vvvv </p>");
//echo $trim;
//echo '<br>';
//echo $htmlentities;
//echo '<br>';
//echo $htmlspecialchars;
//echo '<br>';
//echo $strip;
//
//if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) == 'Login'){
//
//    $email = test_input($_POST['email']);
//    $password = test_input($_POST['password']);
//    $passw = sha1($password);
//
//    echo sha1($passw);
//
//    $sql = mysqli_query($con,"select id,email,password from users
//        where email = '".$email."' and password = '".$passw."'");
//    $row = mysqli_fetch_array($sql);
//    if(mysqli_num_rows($sql) == 1){
//        session_start();
//        $_SESSION['admin_id'] = $row['admin_id'];
//        $_SESSION['admin_email'] = $row['admin_email'];
//
//        if($_SESSION['admin_id']){
//            header("Location:admin.php");
//        }}
//
//    else{
//        echo '<center><span class="displayerror">Invalid User Name and Password Combination</span></center>';
//    }
//
//
//
//}

//date_default_timezone_set('Asia/Kabul');
//echo '<br>';
//echo date_default_timezone_get();
//echo '<br>';
//echo time();
//echo '<br>';
//echo date('Y-M-D H:H:s',time());
//$user_ip = $_SERVER['REMOTE_ADDR'];
//echo $user_ip;
//echo '<br>';
//$user_agent = $_SERVER['HTTP_USER_AGENT'];
//echo $user_agent;

//setcookie("test",'bashir.ebrahimi@gamil.com',time() + 15);
//setcookie("test1",'123',time() + 15);
//if (isset($_COOKIE['test']) && isset($_COOKIE['test1'])){
//    echo $_COOKIE['test'],'<br>';
//    echo $_COOKIE['test1'],'<br>';
//}else{
//    echo 'no cookies';
//}

$teckit_num = date('Ymdhis');
echo $teckit_num;
?>
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--<h3 class="text-center" style="color:#666666;">-->
<!--    Admin Login-->
<!--</h3>-->
<!---->
<!--<form method="post" action="--><?php //echo $_SERVER["PHP_SELF"];?><!--">-->
<!--    <label for="inputEmail3" >Email</label>-->
<!--    <input type="email"  id="inputEmail" name="lemail"/>-->
<!--    <div id="login_email_error" class="displayerror"></div>-->
<!--    <label for="inputPassword3" >Password</label>-->
<!--    <input type="password" id="inputPassword" name="lpassword"/>-->
<!--    <div id="login_password_error" class="displayerror"></div>-->
<!--    <label><input type="checkbox" /> Remember me</label>-->
<!--    <input type="submit" value="Login" name="login" id="submit_login">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!---->


