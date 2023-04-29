
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
<!--Sidebar nav Start-->
<?php include "view/user/common/slide-navbar.php"; ?>
<!--Sidebar nav End-->
<!-- Hero header Start -->
<?php include "view/user/profile/hero-header.php" ?>
<!-- Hero header  End -->
<!--Profile page start-->
<?php include "view/user/profile/profile-main-content.php" ?>
<!--Profile page End-->
<!--Footer Start-->
<?php include "view/user/common/footer.php" ?>
<!--Footer End-->