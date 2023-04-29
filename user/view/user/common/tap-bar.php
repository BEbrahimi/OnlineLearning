<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>ONLINELEARNING</h2>
    </a>


    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <?php
                $findMenu = null;
                $findMenu = findMenu();
                if ($findMenu):
            $rows = $findMenu->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row):
            ?>
                <?php if ($row['menu_status'] == 1): ?>
            <a href="<?php echo $row['menu_href'] ; ?>" class="nav-item nav-link"><?php echo $row['menu_title'] ; ?></a>
            <?php elseif($row['menu_status'] == 2) :?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $row['menu_title'] ; ?></a>
                <div class="dropdown-menu fade-down m-0">
                    <?php
                    $findSubMenu = null;
                    $findSubMenu = findSubMenu($row['menu_id']);
                    if ($findSubMenu):
                        $rows = $findSubMenu->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row):
                    ?>
                    <a href="<?php echo $row['menu_href'];?>" class="dropdown-item"><?php echo $row['menu_title']; ?></a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php else: ?>
                <label class="alert alert-warning">First Create a menu!</label>
            <?php endif; ?>
        </div>

        <?php if (!isUserLogin()):?>
        <a href="login-registration.php" target="_blank" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
   <?php else: ?>
            <a href="profile-page.php" target="_blank" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">
                <?php
                $name = $_SESSION['userInfo']['fullName'];
                echo 'Hello ';
                echo $name;
                ?>

                <i class="fa fa-arrow-right ms-3"></i></a>
   <?php endif; ?>

    </div>
    </div>
</nav>
<!-- Navbar End -->
