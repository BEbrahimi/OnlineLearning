<?php if(isUserLogin()):?>
<nav id="sidebar" style="position: fixed; z-index: 999">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <?php
    $findUserProfileData = null;
    $userEmail = $_SESSION['userInfo']['userEmail'];
    $fullName = $_SESSION['userInfo']['fullName'];
    $findUserProfileData = findUserProfileData($userEmail);
    $row = $findUserProfileData->fetch(PDO::FETCH_ASSOC);
    //                        var_dump($row);

    ?>
    <div class="p-4">
        <h1><a href="index.php" class="logo"><img class="img-panel" src="<?php echo get_gravatar($row['email'])?>" ><span class="name-user"><?php echo $fullName;?></span></a></h1>
        <ul class="list-unstyled components mb-5">
            <?php if (isUserAdmin()):?>
            <li class="active">
                <a href="../panel/index.php"><span class="fa fa-tachometer-alt mr-3"></span> Admin Panel </a>
            </li>
            <li>
                <a href="#"><span class="fa fa-file mr-3"></span> Sent Text </a>
            </li>
            <li>
                <a href="#"><span class="fa fa-comment mr-3"></span> Comments <span class="course-counter">2</span></a>
            </li>
            <?php endif;?>
            <li>
                <a href="profile-page.php"><span class="fa fa-user mr-3"></span> Profile </a>
            </li>

            <li>
                <a href="#"><span class="fa fa-book mr-3"></span> My Course <span class="course-counter">2</span></a>
            </li>
            <li>
                <a href="logOut.php"><span class="fa fa-power-off mr-3"></span> LogOut </a>
            </li>

        </ul>

    </div>
</nav>
<script src="assets/js/nav-js/jquery.min.js"></script>
<script src="assets/js/nav-js/popper.js"></script>
<script src="assets/js/nav-js/bootstrap.min.js"></script>
<script src="assets/js/nav-js/main.js"></script>

<?php endif; ?>