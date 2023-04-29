<?php
$findExamById = null;
$id = $_GET['id'];
$findExamById = findExamById($id);
if ($findExamById){
    $row = $findExamById->fetch(PDO::FETCH_ASSOC);
//                                var_dump($row);
}
$createExamQuestion = null;
$error = false;
$success = false;
$category = $row['category'];

if (isset($_POST['btn_exam_question'])){
    if (!empty($_POST['question']) &&!empty($_POST['question_no']) && !empty($_POST['opt1'])&& !empty($_POST['opt2'])&& !empty($_POST['opt3'])&& !empty($_POST['opt4'])&& !empty($_POST['answer'])){
        $createExamQuestion = createExamQuestion($_POST['question_no'],$_POST['question'],$_POST['opt1'],$_POST['opt2'],$_POST['opt3'],$_POST['opt4'],$_POST['answer'],$category);
        $success = true;
    }else{
        echo 'false';
    }
}
?>
<!-- Main-body start -->
<div class="page-body">
    <div class="row">
        <div class="card-header col-sm-12 text-center" style="background: #fff;">
            <h5>Add New Question</h5>
        </div>
        <div class="col-sm-12" style="float: left;">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <?php
                if ($success){
                    echo '<script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired question has been successfully created",
                        icon:"success",
                        timer:1000,
                        button:false,
                        });</script>';
                }

                ?>
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="card-header col-sm-12" style="margin-bottom: 15px;">
                            <h5>Add Exam For { <?php echo $row['category']?> }</h5>
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="question_no" class="form-control"
                                   placeholder="question_no" title="question_no"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6" style="float: left">
                            <input type="text" name="question" class="form-control"
                                   placeholder="Enter Your Question" title="Enter Your Question"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="opt1" class="form-control"
                                   placeholder="Option1" title="Option1"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6" style="float: left">
                            <input type="text" name="opt2" class="form-control"
                                   placeholder="Option2" title="Option2"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="opt3" class="form-control"
                                   placeholder="Option3" title="Option13"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6" style="float: left">
                            <input type="text" name="opt4" class="form-control"
                                   placeholder="Option4" title="Option14"
                                   data-toggle="tooltip">
                        </div>
                        <div class="input-group col-sm-6">
                            <input type="text" name="answer" class="form-control"
                                   placeholder="Enter answer" title="answer"
                                   data-toggle="tooltip">
                        </div>

                        <div class="input-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Submit" name="btn_exam_question">
                        </div>
                    </div>

                </form>
            </div>

            <!-- Tooltips on textbox card end -->
        </div>


        <div class="col-sm-12">
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
                                    <th>No</th>
                                    <th>Question</th>
                                    <th>Opt1</th>
                                    <th>Opt2</th>
                                    <th>Opt3</th>
                                    <th>Opt4</th>
                                    <th>Operation</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $findExamQuestion = null;
                                $findExamQuestion = findExamQuestion();
                                if ($findExamQuestion):
                                    $rows = $findExamQuestion->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row):
                                        ?>
                                        <tr>

                                            <th><?php echo $row['question_no'];?></th>
                                            <th><?php echo $row['question'];?></th>
                                            <th><?php echo $row['opt1'];?></th>
                                            <th><?php echo $row['opt2'];?></th>
                                            <th><?php echo $row['opt3'];?></th>
                                            <th><?php echo $row['opt4'];?></th>
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