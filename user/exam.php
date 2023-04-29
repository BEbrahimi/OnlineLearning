
<!--Header Start-->
<?php include "view/user/common/header.php" ?>
<!--Header End-->
<?php if (!isUserLogin()) {
    header('location:login-registration.php');
    exit();
}
?>
<!--Top-bar start-->
<?php include "view/user/common/tap-bar.php" ?>
<!--Top-bar End-->
<?php include "view/user/exam/exam-main.php" ?>

<!--Footer Start-->
<?php include "view/user/common/footer.php" ?>
<!--Footer End-->