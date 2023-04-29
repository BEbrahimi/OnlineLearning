
<!-- Main-body start -->
<div id="content">
    <div class="inner" style="background: #fff;">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin: 10px">Create Course</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel box box-warning">
                    <div class="panel-body">

                        <?php if ($hasError): ?>
                            <div class="alert alert-danger"><?php echo $msg;?></div>
                        <?php endif; ?>
                        <?php if ($hasSuccess): ?>
                            <div class="alert alert-success"><?php echo $msg;?></div>
                        <?php endif; ?>

                        <form method="post" action="">
                            <!--                            Course Title-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group" style="margin-top: 20px">
                                    <label style="font-weight: bold">Course Title*</label>
                                    <input type="text" name="courseTitle" class="form-control" id="title"
                                           placeholder="Course title..."title="First Upload your Image" data-toggle="tooltip">
                                </div>
                            </div>

                            <!--                            course_demo_link-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group" style="margin-top: 20px">
                                    <label style="font-weight: bold">Course Demo link*</label>
                                    <input type="text" name="courseDemoLink" class="form-control"
                                           placeholder="Course Demo Link...">
                                </div>
                            </div>

                            <!--                            course_length-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group" ">
                                    <label style="font-weight: bold">Duration*</label>
                                    <input type="text" name="courseLength" class="form-control"
                                           placeholder="Course duration...">
                                </div>
                            </div>


                            <!--                            course_start_at-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course Start at*</label>
                                    <input type="text" name="courseStartAt" class="form-control"
                                           placeholder="Course start at...">
                                </div>
                            </div>

                            <!--                            course_status-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course status*</label>
                                    <input type="text" name="courseStatus" class="form-control"
                                           placeholder="Course status...">
                                </div>
                            </div>

                            <!--                            course_price-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course price*</label>
                                    <input type="text" name="coursePrice" class="form-control"
                                           placeholder="Course price...">
                                </div>
                            </div>
                            <!--                            course_discount-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Discount*</label>
                                    <input type="text" value="0" name="courseDiscount" class="form-control"
                                           placeholder="Course Discount...">
                                </div>
                            </div>

                            <!--                            course_img-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course Image*</label>
                                    <input type="text" name="courseImg" class="form-control"
                                           placeholder="Course Image Name...">
                                </div>
                            </div>
                            <!--                            CourseTeacher-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course Teacher*</label>
                                    <input type="text" name="courseTeacher" class="form-control" placeholder="Teacher name...">
                                </div>
                            </div>
                    <!--                            CourseTeacher-->
                    <div class="col-md-6" style="float: left;">
                        <div class="form-group">
                            <label style="font-weight: bold">Teacher Email*</label>
                            <input type="text" name="teacherEmail" class="form-control" placeholder="Teacher email...">
                        </div>
                    </div>

                            <!--                            teacher_resume-->
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Teacher resume*</label>
                                    <textarea type="text" rows="8" name="teacherResume"  class="form-control"
                                              placeholder="Course Prerequisites..."></textarea>
                                </div>
                            </div>

                            <!--                            course Prerequisites -->

                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course Prerequisites*</label>
                                    <textarea type="text" rows="8" name="coursePre"  class="form-control"
                                              placeholder="Course Prerequisites..."></textarea>
                                </div>
                            </div>
                            <!--                            course_reference-->
                            <div class="col-md-12" style="float: left;">
                                <div class="form-group">
                                    <label style="font-weight: bold">Course Details*</label>
                                    <textarea type="text" rows="8" name="courseReference"  class="form-control ckeditor"
                                              placeholder="Course reference..."></textarea>
                                </div>
                            </div>

                            <!--                            course button-->
                            <div class="col-md-12" style="float: left;">
                                <div class="form-group" style="margin: 20px">
                                    <input type="submit" name="createCourse" class="btn btn-success" id="btn-ticket-submit">
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Warning Section Starts -->

<div id="styleSelector">

</div>
</div>
</div>
</div>
</div>
</div>
</div>

