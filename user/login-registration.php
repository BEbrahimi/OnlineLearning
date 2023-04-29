<!--Header Start-->
<?php include "view/user/common/header.php" ?>
<!--Header End-->
<?php if (isUserLogin()) {
    header('location:index.php');
    exit();
}
?>
<!--Top-bar start-->
<?php include "view/user/common/tap-bar.php" ?>
<!--Top-bar End-->
<!--Sidebar nav Start-->
<?php include "view/user/common/slide-navbar.php"; ?>
<!--Sidebar nav End-->
<!-- Hero header Start -->
<?php include "view/user/login-registeration/hero-header.php" ?>
<!-- Hero header  End -->
<!--Login form start-->
<?php include "view/user/login-registeration/login-form.php" ?>
<!--Login form End-->
<!--Footer Start-->
<?php include "view/user/common/footer.php" ?>
<!--Footer End-->
