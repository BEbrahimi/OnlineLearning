<!-- Courses section Start -->
<div class="container-xxl py-5">
    <div class="container wrapper-margin-top">
        <div class="container wrapper-margin-top">
            <div class="row g-3">
                <div class="content-header">Main Courses</div>
                <?php
                $findCourse = null;
                $findCourse = findCourse();
                if ($findCourse):
                $rows = $findCourse->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row): ?>


                <div class="col-sm-6 col-md-6 col-lg-6 main-wrapper box-shadow" >
                    <div class="course-info">
                        <div class="course-thumbnail">
                            <img class="img-responsive" src="<?php echo BASE_URL ?>Panel/uploads/<?php echo $row['course_image'];?>">
                        </div>
                        <div class="course-detail">
                            <h3 class="text-center course-title"><i class="fa fa-arrow-right text-primary me-2"></i><?php echo $row['course_title'];?></h3>
                            <div class="course-meta" id="course-meta-section">
                                <ul class="list-inline text-center">
                                    <li><i class="fa fa-user" style="margin-right: 10px"></i>Teacher: <span><?php echo $row['course_teacher'];?></span></li>
                                    <li><i class="fa fa-clock" style="margin-right: 10px"></i>Duration:<span><?php echo $row['course_lenght'];?></span></li>
                                    <li><i class="fa fa-solid fa-graduation-cap" style="margin-right: 10px"></i>students: <span><span> 123</span></span></li>
                                </ul>
                                <div class="text-center">
                                    <a href="course.php?courseID=<?php echo $row['course_id'];?>" class="btn btn-primary" style="border-radius: 5px">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>




                <div class="text-center" id="more-course">
                    <a href="all-post.html" class="btn btn-primary" style="border-radius: 30px; width: 200px;"> <<< More >>></a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Courses section End -->