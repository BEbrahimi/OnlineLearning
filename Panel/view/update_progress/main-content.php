
<!-- Main-body start -->
<div id="content">
    <div class="inner">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title" style="margin: 10px">Manage the progress of the course(s)</h4>
            </div>
        </div>
        <hr />
        <span style="margin: 10px">Manage progress of existing course(s).</span><i class="fa fa-caret-down"></i>

        <div class="row">
            <div class="col-lg-12" >
                <br>
                <div class="panel box box-success"  >
                    <div class="panel-body card-block tooltip-icon button-list"style="margin: 10px">
                        <form method="post" action="">

                            <div class="row" style="margin: 20px;">
                                <?php
                                $progressQuery = null;
                                $progressQuery = findCourseProgress();
                                $rows = $progressQuery->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row ): ?>
                                <div class="col-md-6">
                                    <li style="list-style: none; margin-top: 20px">
                                        <span><?php echo $row['title'];?></span>
                                        <br>
                                        <br>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-<?php echo $row['color']; ?>" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"" role="progressbar" aria-valuenow="0" aria-valuemax="100" style="width: <?php echo $row['percentage'];?>%;" >
                                                <?php echo $row['percentage']; ?>

                                            </div>

                                        </div>
                                    </li>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <br>
                            <div class="form-group" style="padding: 10px;">
                                <label >Course Title*</label>
                                <select name="title" class="form-control">
                                    <option  value="">PHP scripting course </option>
                                    <option  value="">Telegram bot programmer course </option>
                                    <option  value="">PHP Telegram bot programmer course </option>
                                    <option  value="">Object Oriented Programming Course  </option>
                                    <option  value="">Laravel framework course </option>
                                    <option  value="">WordPress theme design course </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label >Color*</label>
                                <select name="color" class="form-control">
                                    <option value="default">Default (Dark Blue)</option>
                                    <option value="info">Blue</option>
                                    <option value="warning">Orange</option>
                                    <option value="success">Green</option>
                                    <option value="danger">Red</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Course progress*</label>
                                <input type="text" name="percent" class="form-control"  placeholder="Course progress (example: enter a number between 1 and 100)">
                            </div>

                            <button style="margin-left: 44%" type="button" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit">Submit
                            </button>
                        </form>

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