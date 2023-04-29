<!-- Main-body start -->
<div id="content">
    <div class="inner" style="background: #fff;">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin: 10px">New Topic</h3>
            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    style="margin-left: 31px;">
                Add Multimedia File
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Multimedia File</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="overflow: auto; height: 250px;">
                            <ul class="list-inline">
                                <?php
                                $dirName = 'uploads/';
                                $uploadFiles = glob($dirName . "*.*");
                                foreach ($uploadFiles as $uploadFile) {
                                    echo '
                                    <li style="width: 90px;float: right;margin: 10px;">
                                    <img src="' . $uploadFile . '" style="width: 90px;height: 90px;border: 1px solid #d4cdcd;float: left;margin: 10px;">
                                    <div style="width: 90px;text-align: center;font-size: 9px; ">
                                    ' . basename($uploadFile) . '
                                    
                                    </div>
                                    </li>
                                    
                                    ';
                                }


                                ?>
                            </ul>
                        </div>
                        <!--file uploader-->
                        <div class="modal-footer">
                            <form id="uploadForm" method="post" action="upload.php" enctype="multipart/form-data">

                                <input type="file" name="file" id="chooseFile">
                                <input type="submit" name="btn-file-send" value="Sent File" class="btn btn-primary">

                            </form>
                        </div>
                        <div id="loader-icon" style="display: none;">Uploading file...</div>

                        <!--                        <div class="alert alert-danger" style="margin: 10px" id="uploadMsg"></div>-->
                    </div>
                </div>
            </div>
        </div>


        <!--Sent file with Ajax -->
        <script>

            $(document).ready(function () {
                $('#uploadForm').on('submit', function (e) {
                    e.preventDefault();
                    var file = $.trim($('#chooseFile').val());
                    if (file === '') {
                        alert('Pleas select a File');
                        return false;
                    } else {
                        $.ajax({
                            url: 'upload.php',
                            type: 'post',
                            data: new FormData(this),
                            contentType: false,
                            ProcessData: false,
                            beforeSend: function () {
                                $('#loader-icon').show();
                            },
                            success: function (responce) {
                                // alert('Your file sucessfuly uploaded');
                                $('#uploadMsg').html(responce);
                                $('#loader-icon').hide();
                            }

                        })

                    }
                })
            })
        </script>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel box box-warning">
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-9" style="float: left;">
                                <!--post title-->
                                <div class="form-group" style="margin-top: 20px">
                                    <input type="text"
                                           value="<?php if (isset($_POST['post_title'])) echo $_POST['post_title']; ?>"
                                           name="post_title" class="form-control"
                                           placeholder="Insert topic title...">
                                </div>
                                <!--post_content-->
                                <div class="form-group">
                                   <textarea name="post_content" class="form-control ckeditor" style="direction: ltr"
                                             placeholder="Insert your details..">
                                       <?php if (isset($_POST['post_content'])) echo $_POST['post_content']; ?>
                                   </textarea>
                                </div>
                                <br>
                                <!--video_url -->
                                <div class="panel box box-info">
                                    <div class="panel-heading">Slug:<span style="color: red;">*</span></div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text"
                                                   value="<?php if (isset($_POST['slug'])) echo $_POST['slug']; ?>"
                                                   name="slug" class="form-control"
                                                   placeholder="Separate the nouns with a - sign.">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-info">
                                    <div class="panel-heading">Video Link:</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text"
                                                   value="<?php if (isset($_POST['video_url'])) echo $_POST['video_url']; ?>"
                                                   name="video_url" class="form-control"
                                                   placeholder="Video Link...">
                                        </div>
                                    </div>
                                </div>
                                <!--Author -->
                                <?php
                                $findUserByAccessRole = null;
                                $findUserByAccessRole = findUserByAccessRole();
                                $rows = $findUserByAccessRole->fetchAll(PDO::FETCH_ASSOC);

                                ?>
                                <div class="panel box box-info">
                                    <div class="panel-heading">Author:<span style="color: red;">*</span></div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <select name="author_id" class="form-control">
                                                <?php foreach ($rows as $row): ?>
                                                    <option name="" value="<?php echo $row['id']; ?>" <?php
                                                    if (isset($_POST['author_id']) && $_POST['author_id'] == $row['id']) echo 'selected ="selected"';
                                                    ?> ><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3" style="float: right;">
                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading" style="font-size: 12pt">Publish</div>
                                    <div class="panel-body" style="max-height: 200px; overflow: auto;">
                                        <input type="submit" name="preview" class="btn btn-info btn-sm"
                                               style="float:right; font-size: 11pt" value="Preview">
                                        <br>
                                        <br>
                                        <br>

                                        <?php
                                        $createPostTime = null;
                                        $createPostTime = createPostTime($postId);
                                        $row = $createPostTime->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <!--                                        --><?php //echo $row['create_time'];?>

                                        <span><i class="fa fa-calendar"></i> Date: <?php echo date('Y-m-d   H:i:s', time()); ?></span>
                                        <br>
                                        <br>
                                        <span style="color: red;"><i
                                                    class="fa fa-calendar"></i> Publish Date: <?php if (isset($postId)) {
                                                echo $row['create_time'];
                                            } ?></span>

                                    </div>
                                    <div class="panel-footer">
                                        <!-- Delete -->
                                        <input type="submit" name="delete_post" class="btn btn-danger btn-md"
                                               value="Delete">
                                        <!-- btn Publish -->
                                        <input type="submit" name="btn_post_publish" class="btn btn-success btn-md"
                                               value="Publish">
                                        <!-- btn Save -->
                                        <input type="submit" name="btn_post_draft" class="btn btn-success btn-md"
                                               value="Save to Draft">
                                    </div>
                                </div>
                                <!-- Categories -->
                                <?php
                                $findCats = null;
                                $findCats = findCats();
                                $rows = $findCats->fetchAll(PDO::FETCH_ASSOC);

                                ?>

                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Categories:<span style="color: red;">*</span></div>
                                    <div class="panel-body" style="max-height: 200px; overflow: auto;">
                                        <div class="form-group">
                                            <select name="cat_id" class="form-control">
                                                <?php foreach ($rows as $row): ?>
                                                    <option name="cats" value="<?php echo $row['cat_id']; ?>"<?php
                                                    if (isset($_POST['cat_id']) && $_POST['cat_id'] == $row['cat_id']) echo 'selected ="selected"';
                                                    ?> > <?php echo $row['cat_name']; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Labels<span style="color: red;">*</span></div>
                                    <div class="panel-body">
                                        <input type="text"
                                               value="<?php if (isset($_POST['post_tags'])) echo $_POST['post_tags']; ?>"
                                               class="form-control" name="post_tags" placeholder="Labels...">
                                    </div>
                                    <div class="panel-footer" style=" padding: 10px 11px;">
                                        <div class="label label-info">
                                            Note: Separate tags with commas ( , ).
                                        </div>

                                    </div>
                                </div>
                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Image Name<span style="color: red;">*</span></div>
                                    <div class="panel-body">
                                        <input type="text"
                                               value="<?php if (isset($_POST['post_img'])) echo $_POST['post_img']; ?>"
                                               class="form-control" name="post_img" placeholder="Image Name...">
                                    </div>

                                </div>
                                <!--                                <div class="panel box box-info"style="border-top: 3px solid #00c0ef!important;">-->
                                <!--                                    <div class="panel-heading">Featuring image</div>-->
                                <!--                                    <div class="panel-body">-->
                                <!---->
                                <!--                                        <input type="file" class="form-control" name="file">-->
                                <!--                                    </div>-->
                                <!--                                    <div class="panel-footer" style="padding: 10px 11px;">-->
                                <!--                                        <div class="label label-inverse-warning" style="color: #000!important;">-->
                                <!--                                            The size of your selected file must be less than 500 KB-->
                                <!---->
                                <!--                                        </div>-->
                                <!---->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--Input unique key start-->

                                <input type="hidden"
                                    <?php
                                    echo round(microtime(true));
                                    ?>
                                       value="
                                                   <?php
                                       if (isset($_POST['unique_post_key'])) {
                                           echo $_POST['unique_post_key'];
                                       } else {
                                           echo round(microtime(true));
                                       }
                                       ?>"
                                       name="unique_post_key" class="form-control">
                                <!--Input unique key start-->


                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Type Course:<span style="color: red;">*</span></div>
                                    <div class="panel-body" style="max-height: 200px; overflow: auto;">
                                        <div class="form-group">
                                            <select name="topic_type" class="form-control">
                                                <option value="0">Free</option>
                                                <option value="1">Paid</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Time<span style="color: red;">*</span></div>
                                    <div class="panel-body">
                                        <input type="text"
                                               value="<?php if (isset($_POST['video_length'])) echo $_POST['video_length']; ?>" class="form-control" name="video_length"
                                               placeholder="Enter video length">
                                    </div>
                                </div>

                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">
                                    <div class="panel-heading">Educational series:<span style="color: red;">*</span>
                                    </div>
                                    <div class="panel-body" style="max-height: 200px; overflow: auto;">
                                        <div class="form-group">
                                            <select name="course_id" class="form-control">
                                                <option>Select course Type</option>
                                                <?php
                                                $findCourse = null;
                                                $findCourse = findCourse();
                                                if ($findCourse):
                                                    $rows = $findCourse->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($rows as $row):
                                                        ?>
                                                        <option value="<?php echo $row['course_id']; ?>">
                                                            <?php echo $row['course_title']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="alert alert-info">We don't have any course right now
                                                    </div>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <!---->
                                <!--                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">-->
                                <!--                                    <div class="panel-heading">The position of content in the slider</div>-->
                                <!--                                    <div class="panel-body">-->
                                <!--                                        <div class="form-group">-->
                                <!--                                            <select name="slider_condition" class="form-control">-->
                                <!--                                                <option value="0">Active</option>-->
                                <!--                                                <option value="1">Inactive</option>-->
                                <!--                                            </select>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                               -->
                                <!--                                <div class="panel box box-info" style="border-top: 3px solid #00c0ef!important;">-->
                                <!--                                    <div class="panel-heading">Price</div>-->
                                <!--                                    <div class="panel-body">-->
                                <!--                                        <input type="input" class="form-control" name="price"-->
                                <!--                                               placeholder="Enter the Item price...">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
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

