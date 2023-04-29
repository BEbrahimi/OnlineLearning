<!-- Main-body start -->
<div class="card o-visible">
    <div class="card-header">
        <h5>Create Course progress</h5>
    </div>

    <form action="" method="post">

        <?php if (count($errors) > 0):?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error):?>
                    <p><?php echo $error;?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($successMsg):?>

            <script>
                swal({
                    title: "Dear user!",
                    text: "Course progress has been successfully created",
                    icon: "success",
                    button:false,
                    timer:3000,

                });
            </script>
        <?php endif; ?>
        <?php if ($query_exist):?>
            <div class="alert alert-danger">
                <p>Your title already exist</p>
            </div>
        <?php endif; ?>


        <div class="card-block tooltip-icon button-list">
            <div class="input-group">
                <span class="input-group-prepend" id="firstName"><label class="input-group-text">Title*</label></span>
                <input type="text" class="form-control" name="title" placeholder="Enter Course progress..." title="Course progress" data-toggle="tooltip">
            </div>
            <div class="input-group">
                <span class="input-group-prepend" id="lastName"><label class="input-group-text">Course progress*</label></span>
                <input type="text" class="form-control" name="percent" placeholder="Degree progress (example: enter a number between 1 and 100)" title="Course progress" data-toggle="tooltip">
            </div>
            <div class="input-group">
                <span class="input-group-prepend" id="userName"><label class="input-group-text">Color*</label></span>
                <select name="color" id="" class="form-control">
                    <option value="Default">Default (Dark Blue)</option>
                    <option value="Success">Blue</option>
                    <option value="warning">Orange</option>
                    <option value="danger">Red</option>
                </select>
            </div>

            <input type="submit" name="btn-progress" class="btn btn-success" value="Submit" data-toggle="tooltip" data-placement="right" title="Sent Data">

        </div>
    </form>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>