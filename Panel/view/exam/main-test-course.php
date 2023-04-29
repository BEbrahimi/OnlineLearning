<!-- Main-body start -->
<div class="page-body">
    <div class="row">
        <div class="card-header col-sm-12 text-center" style="background: #fff;">
            <h5>Create Exam</h5>
        </div>
        <div class="col-sm-6" style="float: left;">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="card-header col-sm-12">
                            <h5>Add Exam</h5>
                        </div>
                        <div class="input-group col-sm-12" style="margin-top: 10px">
                            <input type="text" name="examCategory" class="form-control"
                                   placeholder="Enter New Exam Category" title="New Exam Category"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-12">
                            <input type="text" name="examTime" class="form-control"
                                   placeholder="Enter Exam Time in Minutes" title="Exam Time in Minutes"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="submit" class="btn btn-success" name="btn_exam_test">
                        </div>
                    </div>

                </form>
            </div>
            <!-- Tooltips on textbox card end -->
        </div>
        <div class="col-sm-6">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="card-header col-sm-12">
                            <h5>Exam Categories</h5>
                        </div>
                        <div class="table-responsive">


                            <table class="table table-hover" style="width: 100%;">

                                <thead>
                                <tr>
                                    <th>Exam Name</th>
                                    <th>Exam Time</th>
                                    <th>Operation</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $findExam = null;
                                $findExam = findExam();
                                if ($findExam):
                                $rows = $findExam->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):
                                ?>
                                <tr>

                                    <th><?php echo $row['category'];?></th>
                                    <th><?php echo $row['exam_time'];?></th>
                                    <th>
                                        <a href="actions/examActions/deleteExam.php?id=<?php echo $row['id']; ?>"" class="label label-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="update_exam.php?id=<?php echo $row['id'];?>" class="label label-success">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                    </th>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>

                                <?php endif; ?>

                                </tbody>

                            </table>

                        </div>
                    </div>

                </form>
            </div>
            <!-- Tooltips on textbox card end -->
        </div>
    </div>
</div>