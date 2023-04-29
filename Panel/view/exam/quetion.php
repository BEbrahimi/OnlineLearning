<!-- Main-body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="card-header col-sm-12">
                            <h5>Select Exam Categories for add and edit questions</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
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

                                    <th><?php echo $row['id'];?></th>
                                    <th><?php echo $row['category'];?></th>
                                    <th><?php echo $row['exam_time'];?></th>
                                    <th>
                                        <a href="add_edit_questions.php?id=<?php echo $row['id'];?>" class="label label-success">
                                            Select
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