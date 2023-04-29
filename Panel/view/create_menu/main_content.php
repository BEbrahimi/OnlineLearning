<!-- Main-body start -->
<div class="page-body">
    <div class="row">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible" style="margin: 50px">
                <div class="card-header">
                    <h5>Create Main Menu</h5>
                </div>

                <?php
                if ($hasSuccess){
                    echo '   <script>
                            swal({
                                title: "Dear user!",
                                text: "your Menu has been successfully created",
                                icon: "success",
                                button:false,
                                timer:3000,

                            });
                        </script>';
                }
                if ($hasError){
                    echo '   <script>
                            swal({
                                title: "Error!",
                                text: "Fill the form",
                                icon: "warning",
                                button:false,
                                timer:3000,

                            });
                        </script>';
                }

                ?>


                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list col-sm-3" style="float: left;">
                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                        class="input-group-text">Title*</label></span>
                            <input type="text" class="form-control" name="menu_title" placeholder="Enter Menu Title..."
                                   title="Enter Menu Title" data-toggle="tooltip">
                        </div>

                    </div>

                    <div class="card-block tooltip-icon button-list col-sm-6" style="float:left;">
                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                        class="input-group-text">Link*</label></span>
                            <input type="text" class="form-control" name="menu_href" placeholder="Enter Menu link..."
                                   title="Enter Menu link" data-toggle="tooltip">
                        </div>
                    </div>

                    <div class="card-block tooltip-icon button-list col-sm-3" style="float:left;">

                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                        class="input-group-text">Type*</label></span>
                            <select name="menu_status" class="form-control" title="Type of Menu"
                                    data-toggle="tooltip">
                                <option selected>Select Menu type</option>
                                <option value="1">Simple</option>
                                <option value="2">Sub Menu</option>
                                <option value="3">Child</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-block tooltip-icon button-list col-sm-12 text-center" style="float:left;">
                        <input type="submit" name="btn-menu" class="btn btn-success" value="Submit"
                               data-toggle="tooltip" data-placement="top" title="Sent Data">
                    </div>

                </form>


                <?php
                $isExistSubMenu = null;
                $isExistSubMenu = isExistSubMenu();
                if ($isExistSubMenu):?>

                    <div class="card-header">
                        <h5>Create Sub Menu</h5>
                    </div>

                    <form action="" method="post">
                        <div class="card-block tooltip-icon button-list col-sm-3" style="float: left;">
                            <div class="input-group">
                                <span class="input-group-prepend" id="firstName"><label
                                            class="input-group-text">Title*</label></span>
                                <input type="text" class="form-control" name="menu_title" placeholder="Enter Menu Title..."
                                       title="Enter Menu Title" data-toggle="tooltip">
                            </div>

                        </div>

                        <div class="card-block tooltip-icon button-list col-sm-3" style="float:left;">
                            <div class="input-group">
                                <span class="input-group-prepend" id="firstName"><label
                                            class="input-group-text">Link*</label></span>
                                <input type="text" class="form-control" name="menu_href" placeholder="Enter Menu link..."
                                       title="Enter Menu link" data-toggle="tooltip">
                            </div>
                        </div>

                        <div class="card-block tooltip-icon button-list col-sm-3" style="float:left;">

                            <div class="input-group">
                                <span class="input-group-prepend" id="firstName"><label
                                            class="input-group-text">Type*</label></span>
                                <select name="menu_status" id="" class="form-control" title="Type of Menu"
                                        data-toggle="tooltip">
                                    <option selected>Select Menu type</option>
                                    <option value="0">Simple</option>
                                    <option value="1">Sub Menu</option>
                                    <option value="2">Child</option>

                                </select>
                            </div>
                        </div>


                        <div class="card-block tooltip-icon button-list col-sm-3" style="float:left;">

                            <div class="input-group">
                                <span class="input-group-prepend" id="firstName"><label class="input-group-text">Position*</label></span>
                                <select name="sub_menu" id="" class="form-control" title="Menu Position"
                                        data-toggle="tooltip">
                                    <?php
                                    $findMenuWithSubMenu = null;
                                    $findMenuWithSubMenu = findMenuWithSubMenu();
                                    if ($findMenuWithSubMenu):
                                        $rows = $findMenuWithSubMenu->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row):
                                            ?>
                                            <option value="<?php echo $row['menu_id'] ?>"><?php echo $row['menu_title'] ?></option>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="0">First create Menu!</option>
                                    <?php endif; ?>
                                </select>

                            </div>
                        </div>


                        <div class="card-block tooltip-icon button-list col-sm-12 text-center" style="float:left;">
                            <input type="submit" name="btn-sub-menu" class="btn btn-success" value="Submit"
                                   data-toggle="tooltip" data-placement="right" title="Sent Data">
                        </div>

                    </form>
                <?php else: ?>
                    <div class="alert alert-info" style="margin: 25px">For creating sub menu first create a sub menu form main menu</div>
                <?php endif; ?>

            </div>
            <!-- Tooltips on textbox card end -->
        </div>
    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>