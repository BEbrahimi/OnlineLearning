

<!-- Main-body start -->
<div class="page-body">
    <div class="row">
        <div class="card-header col-sm-12 text-center" style="background: #fff;">
            <h5>Create Exam</h5>
        </div>
        <div class="col-sm-12" style="float: left;">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <?php
                $findExam = null;
                $findExam =findExam($id);
                if ($findExam){
                    $row = $findExam->fetch(PDO::FETCH_ASSOC);
//                                var_dump($row);
                }

                ?>
                <form action="" method="post">
                    <?php if (count($errors) > 0):?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error):?>
                                <p><?php echo $error;?> </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($query):?>
                        <div class="alert alert-success">
                            <p>Your user successfuly inserted</p>
                        </div>
                    <?php endif; ?>
                    <?php if ($query_exist):?>
                        <div class="alert alert-danger">
                            <p>Your email already exist</p>
                        </div>
                    <?php endif; ?>

                    <div class="card-block tooltip-icon button-list">
                        <div class="card-header col-sm-12">
                            <h5>Add Exam</h5>
                        </div>
                        <div class="input-group col-sm-6" style="margin-top: 10px">
                            <input type="text" name="examCategory" value="<?php echo $row['category']?>" class="form-control"
                                   placeholder="Enter New Exam Category" title="New Exam Category"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="examTime" value="<?php echo $row['exam_time']?>" class="form-control"
                                   placeholder="Enter Exam Time in Minutes" title="Exam Time in Minutes"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="submit" class="btn btn-success" name="update_exam_test" value="Update Now">
                        </div>
                    </div>

                </form>
            </div>
            <!-- Tooltips on textbox card end -->
        </div>

    </div>
</div>