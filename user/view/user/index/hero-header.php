
<!-- Hero header Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="assets/img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                            <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                            <a href="contact.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contact</a>
                            <?php if (!isUserLogin()):?>
                            <a href="login-registration.php" target="_blank" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Register Now</a>
                            <?php else:?>
                            <a href="profile-page.php" target="_blank" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Profile</a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="assets/img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                            <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                            <a href="contact.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">CONTACT</a>
                            <?php if (!isUserLogin()):?>
                                <a href="login-registration.php" target="_blank" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Register Now</a>
                            <?php else:?>
                                <a href="profile-page.php" target="_blank" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Profile</a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero header  End -->