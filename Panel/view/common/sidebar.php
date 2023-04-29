
<!--Side Bar start-->
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="<?php echo get_gravatar($row['email'])?>" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details"><?php echo $fullName;?></span>
                </div>
            </div>

        </div>
        <!-- Start Side bar -->
        <div class="pcoded-navigation-label">Navigation</div>
        <!-- 0 - content Dashboard start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="index.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <!-- content DashboardEnd -->
        <!-- 1 - content management start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Content Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="posts.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" target="_blank">All Content</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="new-post.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Add Content</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="categories.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Categories</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
<!--                    <li class=" ">-->
<!--                        <a href="#" class="waves-effect waves-dark">-->
<!--                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>-->
<!--                            <span class="pcoded-mtext">Training Courses</span>-->
<!--                            <span class="pcoded-mcaret"></span>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </li>
        </ul>
        <!--content management End -->
        <!-- 2 comment start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="comment.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-comment"></i><b>B</b></span>
                    <span class="pcoded-mtext">Comments</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>
        <!--comment End-->
        <!-- 3 Progress of courses start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(1)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-credit-card-alt"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Progress of courses</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="create_progress.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Course Progress</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="update_progress.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">CourseProgressManagement</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!--Progress of courses End -->
        <!-- 4 Menu Management start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-gears"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Manage Menus</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="create_menu.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Menu</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="menus.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Menu Management</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!--Menu Management End -->
        <!-- 5 User Profile start-->
<!--        <ul class="pcoded-item pcoded-left-item">-->
<!--            <li class="pcoded-hasmenu">-->
<!--                <a href="javascript:void(0)" class="waves-effect waves-dark">-->
<!--                    <span class="pcoded-micon"><i class="fa fa-user"></i><b>CM</b></span>-->
<!--                    <span class="pcoded-mtext">User Profile</span>-->
<!--                    <span class="pcoded-mcaret"></span>-->
<!--                </a>-->
<!--                <ul class="pcoded-submenu">-->
<!--                    <li class=" ">-->
<!--                        <a href="profile.php" class="waves-effect waves-dark">-->
<!--                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>-->
<!--                            <span class="pcoded-mtext">User Information</span>-->
<!--                            <span class="pcoded-mcaret"></span>-->
<!--                        </a>-->
<!--                    </li>-->
<!---->
<!---->
<!--                </ul>-->
<!--            </li>-->
<!--        </ul>-->
        <!--User Profile End -->
        <!-- 6 Manage transactions start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-dollar"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Manage Transactions</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="transaction.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">View Transactions</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
        </ul>
        <!--Manage transactions End -->
        <!-- 7 Management of tickets start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-ticket"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Tickets Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="tickets.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Tickets</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="tickets_admin.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">User Ticket Management</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                </ul>
            </li>
        </ul>
        <!--Management of tickets End -->
        <!-- 8 Management of discounts start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-shopping-cart"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Discount Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="create-discount.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Add Discount</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                </ul>
            </li>
        </ul>
        <!--Management of discounts End -->
        <!-- 9 New User start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-user"></i><b>CM</b></span>
                    <span class="pcoded-mtext">New User</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="create_user.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create New User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="users.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Update User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                </ul>
            </li>
        </ul>
        <!-- New User End -->



        <!-- 9 New User start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-address-book"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Courses</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="create_course.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create New Course</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="courses.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Update Course</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="add-user-course.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Add Course for User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="list-course-user.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">List of course User</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                </ul>
            </li>
        </ul>
        <!-- New User End -->
        <!-- 9 New User start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-question-circle-o"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Program Exam</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="create_test.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Exam Categories</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="create_question.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Questions</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                </ul>
            </li>
        </ul>
        <!-- New User End -->




        <!-- 10 Template Setting start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-gears"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Template Setting</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="information.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Notification</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="slider.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Slider</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="gateway.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Bank Portal</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>




                </ul>
            </li>
        </ul>
        <!-- Template Setting End -->
        <!-- 11 Advertising Management start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-adn"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Advertising </span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="ads.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Advertise</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Advertising Management End -->
        <!-- 12 Urgent management start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-caret-square-o-left fa-block"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Urgent management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="logs.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Event (Logs)</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="blacklist.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Black List</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Urgent management End -->
        <!-- 13 Survey start-->
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-camera"></i><b>CM</b></span>
                    <span class="pcoded-mtext">Survey</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="posts.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"> Active Survey</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="create_poll.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Survey Management</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Survey End -->
    </div>
</nav>
<!--Side Bar End-->
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome Online Learning Website</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Page-header end -->