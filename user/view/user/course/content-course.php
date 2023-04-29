<div class="container-fluid">
    <div class="container py-5">
        <div class="row">
            <div class="course-detail">


                <div class="course-left col-md-8">
                    <div class="text-center" data-wow-delay="0.1s" style="border-bottom: 1px solid #efefef">
                        <i class="fa fa-video icon-course"></i>
                        <h6 class="section-title bg-white text-center text-primary px-3">Course Demo</h6>
                    </div>
                    <div class="video-demo">
                        <video src="<?php echo $row['course_demo']; ?>" controls autoplay
                               poster="assets/img/POSTER.jpg">
                        </video>
                    </div>
                    <p style="margin: 10px">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#sections" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Publish Sections
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#course-heading" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Course Heading
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#course-students" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Course Students
                        </a>
                    </p>
                    <!--list of course  -->
                    <div class="collapse" id="sections">
                        <div class="card card-body post-publish">

                            <ol class="course-parts">
                                <?php
                                $findOtherPartOfCourse = null;
                                $findOtherPartOfCourse = findOtherPartOfCourse($courseId);
                                if ($findOtherPartOfCourse):
                                    $rows = $findOtherPartOfCourse->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row1):
                                        ?>
                                        <li>
                                            <a href="./<?php echo $row1['post_id']; ?>/<?php echo $row1['slug']; ?>">
                                                <?php echo $row1['post_title']; ?>
                                            </a>
                                            <span class="part-duration"><?php echo $row1['video_length']; ?>
                                                Minutes </span>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <div class="alert alert-info">We haven't uploaded a video yet!</div>

                                <?php endif ?>

                            </ol>

                        </div>
                    </div>
                    <!-- List of Heading  -->
                    <div class="collapse" id="course-heading">
                        <div class="card card-body post-publish">
                            <?php echo htmlspecialchars_decode($row['course_reference']); ?>
                        </div>
                    </div>
                    <!--List of Student  -->
                    <div class="collapse" id="course-students">
                        <div class="card card-body post-publish">
                            <ul style="display: inline-block;list-style: none">
                                <?php
                                $findCourseStudents = null;
                                $courseId = intval($_GET['courseID']);
                                $findCourseStudents = findCourseStudents($courseId);
                                if ($findCourseStudents):
                                    $rows = $findCourseStudents->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $ro):
                                        ?>
                                        <li style="float: left;margin: 10px;background: #efefef;padding: 5px;"><?php echo $ro['user_name']; ?></li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-info">Till now we don't have any student for this course
                                    </div>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>


                    <!--comment section start-->
                    <div class="course-left-comment-section">
                        <div class="text-center" data-wow-delay="0.1s" style="border-bottom: 1px solid #efefef">
                            <h6 class="section-title bg-white text-center text-primary px-3"> Users Comments</h6>
                        </div>

                        <div class="media">
                            <div class="media-right" id="custom-media-right">
                                <img class="media-object img-circle" id="custom-media-object" src="assets/img/a.jpg"
                                     width="50" height="50" alt="commenter">
                                <div class="comment-line"></div>
                            </div>
                            <div class="media-body user-comment" id="comment-question">
                                <div class="user-comment-title">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>Bashir Ebrahimi</li>
                                        <li><i class="fa fa-calendar"></i>18/08/2022</li>
                                        <li class="comment-answer"><a href="#">Response</a></li>
                                        <li class="comment-edit"><a href="#" style="margin-left: 130px;">Edit</a></li>

                                    </ul>
                                </div>
                                <p>
                                    Can you tell me more about MD5?
                                </p>
                            </div>
                        </div>
                        <div class="media comment-answer-section">
                            <div class="media-right" id="custom-media-right-second">
                                <img class="media-object img-circle" id="custom-media-object-second"
                                     src="assets/img/a.jpg" width="50" height="50" alt="commenter"
                                     style="border-radius: 50px"/>
                                <div class="comment-line"></div>
                            </div>
                            <div class="media-body user-comment">
                                <div class="user-comment-title">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>Bashir Ebrahimi</li>
                                        <li><i class="fa fa-calendar"></i>18/08/2022</li>
                                        <li class="comment-answer"><a href="#">Response</a></li>
                                        <li class="comment-edit"><a href="#" style="margin-left: 130px;">Edit</a></li>

                                    </ul>
                                </div>
                                <p>
                                    Yes I'll sent in your mail
                                </p>
                            </div>
                        </div>
                        <div class="media comment-answer-section">
                            <div class="media-right" id="custom-media-right-second">
                                <img class="media-object img-circle" id="custom-media-object-second"
                                     src="assets/img/a.jpg" width="50" height="50" alt="commenter"
                                     style="border-radius: 50px"/>
                                <div class="comment-line"></div>
                            </div>
                            <div class="media-body user-comment">
                                <div class="user-comment-title">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>Bashir Ebrahimi</li>
                                        <li><i class="fa fa-calendar"></i>18/08/2022</li>
                                        <li class="comment-answer"><a href="#">Response</a></li>
                                        <li class="comment-edit"><a href="#" style="margin-left: 130px;">Edit</a></li>

                                    </ul>
                                </div>
                                <p>
                                    Yes I'll sent in your mail
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-right" id="custom-media-right">
                                <img class="media-object img-circle" id="custom-media-object" src="assets/img/a.jpg"
                                     width="50" height="50" alt="commenter">
                                <div class="comment-line"></div>
                            </div>
                            <div class="media-body user-comment" id="comment-question">
                                <div class="user-comment-title">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>Bashir Ebrahimi</li>
                                        <li><i class="fa fa-calendar"></i>18/08/2022</li>
                                        <li class="comment-answer"><a href="#">Response</a></li>
                                        <li class="comment-edit"><a href="#" style="margin-left: 130px;">Edit</a></li>

                                    </ul>
                                </div>
                                <p>
                                    Can you tell me more about MD5?
                                </p>
                            </div>
                        </div>
                        <div class="media comment-answer-section">
                            <div class="media-right" id="custom-media-right-second">
                                <img class="media-object img-circle" id="custom-media-object-second"
                                     src="assets/img/a.jpg" width="50" height="50" alt="commenter"
                                     style="border-radius: 50px"/>
                                <div class="comment-line"></div>
                            </div>
                            <div class="media-body user-comment">
                                <div class="user-comment-title">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>Bashir Ebrahimi</li>
                                        <li><i class="fa fa-calendar"></i>18/08/2022</li>
                                        <li class="comment-answer"><a href="#">Response</a></li>
                                        <li class="comment-edit"><a href="#" style="margin-left: 130px;">Edit</a></li>

                                    </ul>
                                </div>
                                <p>
                                    Yes I'll sent in your mail
                                </p>
                            </div>
                        </div>

                        <div class="sent-comment">
                            <div class="alert alert-warning text-center"> Dear user, to post your opinion, first <a
                                        href="#"><u><b>log</b></u></a> in to the site.
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading"><i class="fa fa-comment" style="margin-left: 15px"></i>Sent
                                    your Comments
                                </div>
                                <div class="panel-body">
                                    <p>Dear Bashir Ebrahimi You are logged in and you can send us your questions and
                                        comments.</p>
                                    <form>
                      <textarea class="form-control" rows="8" placeholder="دیدگاه تان راارسال نماید">

                      </textarea>
                                        <br>
                                        <button class="btn-comment">Sent Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--comment section end-->
                </div>


                <!--Course Details-->
                <div class="course-right col-md-4">
                    <div class="wrapper-free-styles" id="course-detail-sedebar">
                        <p style="color: #00a8bf; font-weight: bold;">Course Details</p>
                        <ul class="list-group" style="list-style: none; margin: 30px">
                            <li><i class="fa fa-clock"></i>Duration<span><?php echo $row['course_lenght'] ?></span></li>
                            <li><i class="fa fa-user"></i>Students<span>99 </span></li>
                            <li><i class="fa fa-box"></i>Course status<span><?php echo $row['course_status'] ?> </span>
                            </li>
                            <li><i class="fa fa-check"></i>Done<span
                                        class="course-start-time"><?php echo $row['course_start_at'] ?></span></li>
                        </ul>

                        <?php
                        $isUserAccessToCourse = null;
                        $id = $_SESSION['userInfo']['id'];

                        $isUserAccessToCourse = isUserAccessToCourse($id, $courseId);

                        if ($isUserAccessToCourse):
                            $row1 = $isUserAccessToCourse->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <div class="alert alert-info text-center">Your student for this class</div>
                        <?php else: ?>

                            <?php if ($row['course_discount'] != 0): ?>
                                <div class="course-discount">
                                    Discount <?php echo $row['course_discount'] ?>%
                                </div>
                                <span class="course-price">Price
                                <strike class="main-price">
                                    <?php echo $row['course_price'] ?> $
                                </strike>
                                <span>
                                    <?php echo finalPrice($row['course_price'], $row['course_discount']); ?>
                                </span>
                                $
                            </span>
                            <?php else: ?>
                                <span class="course-price">Price
            <span class="main-price"><?php echo $row['course_price'] ?>$</span>
        </span>
                            <?php endif; ?>

                        <?php endif; ?>

                        <form>
                            <?php if (isUserLogin()): ?>
                                <?php if ($isUserAccessToCourse): ?>

                                <?php else: ?>
                                    <div style="text-align: center;margin-top: 10px">
                                        <input type="hidden" value="1290000">
                                        <input type="submit" class="btn btn-success" style="border-radius: 5px"
                                               value="Join Now">
                                    </div>
                                <?php endif; ?>

                            <?php else: ?>

                                <div class="form-control" style="margin: 10px;background: #ffb839;text-align: center">
                                    First LogIn to website
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>

                    <div class="wrapper-free-styles" id="teacher-resume">
                        <p style="color: #00a8bf; font-weight: bold;">Teacher</p>
                        <div class="course-teacher" style="text-align: center">
                            <img src="<?php echo get_gravatar($row['course_teacher_email']) ?>"
                                 class="img-responsive img-circle" width="90">
                        </div>
                        <div class="course-teacher-name text-left"><?php echo $row['course_teacher'] ?></div>
                        <span class="about-teacher"><?php echo $row['course_teacher_resume'] ?></span>
                    </div>
                    <div class="wrapper-free-styles" id="prerequisite-course">
                        <p style="color: #00a8bf; font-weight: bold;">Prerequisites</p>
                        <span class="prerequisite"><?php echo $row['course_pre'] ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>