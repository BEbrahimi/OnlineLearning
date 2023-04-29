<!-- Main-body start -->
<?php
//if (isset($_POST['item'])){
//    var_dump($_POST['item']);
//}
//
//?>


<div id="content">
    <div class="inner" style="margin: 15px">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title" style="margin: 10px">Add Survey</h4>
            </div>
        </div>
        <hr/>
        <span style="margin: 10px">Create new Survey</span><i class="fa fa-caret-down"></i>

        <div class="row">
            <div class="col-lg-12">
                <br>

                <div class="panel box box-success">
                    <div class="panel-body card-block tooltip-icon button-list">

                        <?php
                        if ($hasError): ?>
                            <div class="alert alert-danger"> <?php echo $msg; ?> </div>
                        <?php endif;
                        ?>
                        <?php
                        if ($success) {
                            echo '
                              <script>
                swal({
                    title: "Dear user!",
                    text: "your Survey is has been successfully created",
                    icon: "success",
                    button:false,
                    timer:3000,

                });
            </script>
                            
                            ';
                        }

                        ?>


                        <form method="post" action="">

                            <div class="row" style="margin: 20px;">

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="D_cod"><label class="input-group-text">Survey Title*</label></span>
                                        <input type="text" name="question" class="form-control"
                                               placeholder="Discount Code..." title="Discount Code..."
                                               data-toggle="tooltip">
                                    </div>
                                </div>
                                <!--                                <div class="col-md-4">-->
                                <!--                                    <div class="input-group">-->
                                <!--                                        <span class="input-group-prepend" id="D_amount"><label class="input-group-text">Start Date*</label></span>-->
                                <!--                                        <input type="date" class="form-control" placeholder="Amount of discount..." title="Amount of discount..." data-toggle="tooltip">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="col-md-4">-->
                                <!--                                    <div class="input-group">-->
                                <!--                                        <span class="input-group-prepend" id="D_SDate"><label class="input-group-text">End Date*</label></span>-->
                                <!--                                        <input type="date" class="form-control" placeholder="Discount start date..." title="Discount start date..." data-toggle="tooltip">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                            </div>
                            <div class="row" style="margin: 20px;">
                                <div class="col-md-4 input_fields_wrap">
                                    <!-- Javascript code is inside script.js in js folder in line 246 -->
                                    <button class="btn btn-info add_field_button">Add a field for your survey</button>
                                    <br>
                                    <br>


                                    <label class="poll-item-label">Survey items <span
                                                style="color: #ff0000;">*</span></label>
                                    <br>
                                    <div><input type="text" class="form-control" name="item[]"
                                                placeholder="Survey items..."></div>
                                    <br>
                                </div>

                            </div>

                            <input type="submit" name="btn-poll" style="margin-left: 700px" type="button"
                                   class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip"
                                   data-placement="right" title="submit">

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div id="content1">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-warning">
                            <h4 style="margin: 10px">
                                AllSurvey
                            </h4>
                            <form method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th><input type="checkbox" class="select-all"></th>
                                                <th>Title Comment</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $findPoll = null;
                                            $findPoll = findPoll();
                                            $rows = $findPoll->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($rows as $row): ?>

                                                <tr>
                                                    <th><input type="checkbox" class="checkbox" name="checkbox"
                                                               value=""></th>
                                                    <th> <?php echo $row['question']; ?></th>
                                                    <th>
                                                        <a href="poll-delete.php/?pollId=<?php echo $row['poll_id']; ?>"
                                                           class="label label-danger">Delete</a>
                                                    </th>
                                                </tr>

                                            <?php endforeach; ?>


                                            </tbody>

                                        </table>
                                        <ul class="list-inline user-page-admin" style=" margin-right:50%;">
                                            <li style="float: right;">
                                                <button class="label label-danger" type="submit" name="del-all">Delete
                                                    All
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Main-body End -->
</div>
<!-- Main-body End -->

</div>
</div>
</div>
</div>
</div>