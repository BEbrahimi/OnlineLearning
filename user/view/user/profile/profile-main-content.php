<div class="container wrapper-free-styles wrapper-margin-top">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" id="profile-content">
            <h3>User Profile</h3>
            <div class="col-sm-2 col-md-2 col-lg-2" id="profile-menu" style="float: left;position: relative">
                <ul class="nav nav-tabs tabs-left" id="profile-nav">
                    <li>
                        <a href="#home-profile" data-bs-toggle="tab"><i class="fa fa-user"></i>User Profile</a>
                    </li>
                    <li>
                        <a href="#profile-course" data-bs-toggle="tab"><i class="fa fa-book"></i>Courses</a>
                    </li>
                    <li>
                        <a href="#profile-user-tickets" data-bs-toggle="tab"><i class="fa fa-receipt"></i>Sent
                            Ticket</a>
                    </li>
                    <li>
                        <a href="#profile-user-all-tickets" data-bs-toggle="tab"><i class="fa fa-edit"></i>Your Text</a>
                    </li>
                    <li>
                        <a href="#profile-user-transaction" data-bs-toggle="tab"><i class="fa fa-dollar-sign"></i>Transaction</a>
                    </li>

                    <li>
                        <a href="#mcqtest" data-bs-toggle="tab"><i class="fa fa-dollar-sign"></i>MSQ Exam</a>
                    </li>
                </ul>
            </div>


            <div class="col-sm-10 col-md-10 col-lg-10" id="tap-divider">
                <div class="tab-content">
                    <?php
                    $findUserProfileData = null;
                    $userEmail = $_SESSION['userInfo']['userEmail'];
                    $findUserProfileData = findUserProfileData($userEmail);
                    $row = $findUserProfileData->fetch(PDO::FETCH_ASSOC);
                    //                        var_dump($row);

                    ?>


                    <div class="tab-pane active" id="home-profile">
                        <div class="profile-img-holder text-center">
                            <img src="<?php echo get_gravatar($row['email']) ?>">
                        </div>

                        <form class="form-horizontal" id="login-register-form" method="post" action="">
                            <?php if (count($errors) > 0): ?>
                                <div class="alert alert-warning">
                                    <?php foreach ($errors as $error): ?>
                                        <p><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group input-container">
                                <div class="form-floating col-sm-9 col-sm-offset-3 center" style="left: 159px;">
                                    <input type="text" name="first-name" class="form-control" id="name"
                                           placeholder="Your name" value="<?php echo $row['first_name'] ?>">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group input-container">
                                <div class="form-floating col-sm-9 col-sm-offset-3 center" style="left: 159px;">
                                    <input type="text" name="last-name" class="form-control" id="last-name"
                                           placeholder="Your Last Name" value="<?php echo $row['last_name'] ?>">
                                    <label for="name">Your Last Name</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group input-container">
                                <div class="form-floating col-sm-9 col-sm-offset-3 center" style="left: 159px;">
                                    <input type="text" name="user-name" class="form-control" id="user-name"
                                           placeholder="Your User Name" value="<?php echo $row['user_name'] ?>">
                                    <label for="name">Your User Name</label>
                                </div>
                            </div>
                            <br>

                            <div class="form-group input-container">
                                <div class="form-floating col-sm-9 col-sm-offset-3 center" style="left: 159px;">
                                    <input type="email" value="<?php echo $row['email'] ?>" name="email"
                                           class="form-control" id="Email" placeholder="Your Email">
                                    <label for="name">Your Email</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group input-container">
                                <div class="form-floating col-sm-9 col-sm-offset-3 center" style="left: 159px;">
                                    <input type="submit" name="btn-update-profile" class="btn btn-success" id="btn1"
                                           value="Update Profile"
                                           style="background: #06bbcc;border: #06bbcc;height: 40px;border-radius: 10px">
                                </div>
                            </div>
                            <br>


                        </form>
                    </div>


                    <div class="tab-pane" id="profile-course">
                        <ul class="list-group">

                            <?php
                            $findUserAllCourse = null;

                            $findUserAllCourse = findUserAllCourse($_SESSION['userInfo']['id']);
                            if ($findUserAllCourse):
                                $rows = $findUserAllCourse->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):
                                    ?>
                                    <li>
                                        <a href="course.php?courseID=<?php echo $row['course_id']; ?>" >
                                            <i
                                                    class="fa fa-book-open">

                                            </i>
                                            <?php echo $row['course_title']; ?>
                                        </a>
                                        <br>
                                        <a href="course.php?courseID=<?php echo $row['course_id']; ?>" style="border: 1px solid #efefef; display:block;padding: 5px;text-align: center">
                                            <i class="fa fa-question"></i>

                                            <?php echo $row['course_title']; ?>
                                        </a>

                                    </li>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info">You don't have any course right now</div>
                            <?php endif; ?>

                        </ul>
                    </div>


                    <div class="tab-pane" id="profile-user-tickets">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Ticket Title*</label>
                                        <input type="text" name="ticket-subject" id="ticket-subject"
                                               class="form-control" placeholder="Ticket Title...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Priority*</label>
                                        <select class="form-control" name="ticket-priority" id="ticket-priority">
                                            <option value="0">Normal</option>
                                            <option value="1">Important</option>
                                            <option value="2">Very important</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Message*</label>
                                        <textarea name="ticket-body" id="ticket-body" class="form-control"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top:10px; ">
                                    <div class="form-group">
                                        <input type="button" id="btn-ticket-submit" name="btn-ticket-submit"
                                               class="btn btn-success" value="Sent Ticket"
                                               style="background: #06bbcc;border: #06bbcc;height: 37px!important;">
                                    </div>
                                </div>

                            </div>
                        </form>


                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#btn-ticket-submit').on('click', function (e) {
                                e.preventDefault();
                                var ticket_subject = $('#ticket-subject').val();
                                var ticket_priority = $('#ticket-priority option:selected').text();
                                var ticket_body = $('#ticket-body').val();
                                console.log(ticket_subject);
                                console.log(ticket_priority);
                                console.log(ticket_body);

                                $.ajax({
                                    url: '<?php echo BASE_URL ?>user/model/ticket-model-ajax/insertUserTickets.php',
                                    type: 'POST',
                                    data: {
                                        'ticket_subject': ticket_subject,
                                        'ticket_priority': ticket_priority,
                                        'ticket_body': ticket_body
                                    },
                                    dataType: 'JSON',
                                    success: function (data) {
                                        alert(data);

                                    }
                                })
                            })
                        })


                    </script>


                    <div class="tab-pane" id="profile-user-all-tickets">
                        <?php
                        $findTicketByEmail = null;
                        $findTicketByEmail = findTicketByEmail($_SESSION['userInfo']['userEmail']);
                        if ($findTicketByEmail):
                            $rows = $findTicketByEmail->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row):
                                ?>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-info">
                                        <div class="panel-heading-profile" id=""
                                             style="margin-bottom: 10px;background: #efefef;height: 40px;padding: 10px">
                                            <a href="#s<?php echo $row['ticket_num']; ?>" data-bs-toggle="collapse"
                                               data-parent="accordion" style="color: #c200ff;">
                                                <b>Ticket subject:-</b>
                                                <?php echo $row['ticket_subject']; ?>
                                            </a>

                                            <span class="ticket-no">Ticket No: <?php echo $row['ticket_num']; ?></span>
                                            <span class="ticket-no"
                                                  style="display: none;">Ticket No: <?php echo $row['priority']; ?></span>

                                        </div>


                                        <div id="s<?php echo $row['ticket_num']; ?>"
                                             class="panel-collapse collapse in custom-panel-collapse">


                                            <div class="sent-details-wrapper">
                                                <?php
                                                $findTicketDetailsByTicketNum = null;
                                                $findTicketDetailByTicketNum = findTicketDetailsByTicketNum($row['ticket_num']);

                                                $rows = $findTicketDetailByTicketNum->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($rows as $row):

                                                    ?>
                                                    <img class="img-circle sender-ticket-image" width="50" height="60"
                                                    <?php if ($row['status'] == 1): ?>
                                                    src=" <?php echo get_gravatar($row['admin_email']); ?>">
                                                    <span style="color: #c200ff;">Admin:</span>
                                                <?php else: ?>
                                                    src=" <?php echo get_gravatar($row['user_email']); ?>">
                                                <?php endif; ?>
                                                    <span>Posted on: <?php echo dateToShortLong($row['create_at']); ?></span>


                                                    <div class="ticket-text"
                                                         style="margin-top: 10px;margin-left: 90px;color: #c200ff;">
                                                        <?php echo $row['ticket_body']; ?>
                                                    </div>

                                                <?php
                                                endforeach;
                                                ?>
                                                <div class="ticket-answer" id="ticket-answer1">

                                                    <form>
                                                        <div class="alert alert-success text-center">
                                                            Your message has been sent successfully
                                                            Will reply again.
                                                        </div>
                                                        <div class="form-group">
                                                    <textarea name="ticket-reply-input"
                                                              class="form-control ticket-reply-input" rows="10"
                                                              placeholder="Type your Comments..."></textarea>
                                                        </div>
                                                        <div class="form-group text-left" style="margin: 10px">
                                                            <input type="hidden" name="ticket-num" class="ticket-num"
                                                                   value="<?php echo $row['ticket_num']; ?>">
                                                            <input type="hidden" name="ticket-priority"
                                                                   class="ticket-priority"
                                                                   value="<?php echo $row['priority']; ?>">
                                                            <input type="hidden" name="ticket-email"
                                                                   class="ticket-email"
                                                                   value="<?php echo $_SESSION['userInfo']['userEmail']; ?>">
                                                            <input type="hidden" name="ticket-subject"
                                                                   class="ticket-subject"
                                                                   value="<?php echo $row['ticket_subject']; ?>">

                                                            <input type="button"
                                                                   class="btn btn-success btn-reply-ticket"
                                                                   value="Reply">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-danger text-center">There are currently no messages!</div>

                        <?php endif; ?>
                    </div>


                    <script>
                        $(document).ready(function () {
                            $('.btn-reply-ticket').on('click', function (e) {
                                e.preventDefault();
                                var ticket_reply_body = $(this.form).find('textarea[name="ticket-reply-input"]').val();
                                var ticket_num = $(this.form).find('input[name="ticket-num"]').val();
                                var ticket_priority = $(this.form).find('input[name="ticket-priority"]').val();
                                var ticket_email = $(this.form).find('input[name="ticket-email"]').val();
                                var ticket_subject = $(this.form).find('input[name="ticket-subject"]').val();

                                // var ticket_num = $('.ticket-num').val();
                                // var ticket_subject = $('.ticket-subject').val();
                                // var ticket_priority = $('.ticket-priority ').val();
                                // var ticket_email = $('.ticket-email').val();
                                // var ticket_reply_body = $('.ticket-reply-input').val();
                                // console.log(ticket_num);
                                // console.log(ticket_subject);
                                // console.log(ticket_priority);
                                // console.log(ticket_email);
                                // console.log(ticket_reply_body);
                                $.ajax({
                                    url: '<?php echo BASE_URL ?>user/model/ticket-model-ajax/insertUserTicketReply.php',
                                    type: 'POST',
                                    data: {
                                        'ticket_reply_body': ticket_reply_body,
                                        'ticket_num': ticket_num,
                                        'ticket_priority': ticket_priority,
                                        'ticket_email': ticket_email,
                                        'ticket_subject': ticket_subject,

                                    },
                                    dataType: 'JSON',
                                    success: function (data) {
                                        alert(data);

                                    }
                                })


                            })
                        })


                    </script>


                    <div class="tab-pane" id="profile-user-transaction">
                        <table class="table table-bordered table-hover table-responsive" id="user-transaction-table">
                            <tr>
                                <th>Order Number</th>
                                <th>Transaction Number</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            $userTransactionFindByID = null;
                            $userID = $_SESSION['userInfo']['id'];
                            $userTransactionFindByID = userTransactionFindByID($userID);
                            if ($userTransactionFindByID):
                                $rows = $userTransactionFindByID->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['order_number']; ?></td>
                                        <td><?php
                                            if ($row['ref_number'] == '') {
                                                echo 'Unknown';
                                            } else {
                                                echo $row['ref_number'];
                                            }
                                            ?></td>
                                        <td><?php echo $row['transaction_create_at']; ?></td>
                                        <td><?php echo $row['course_price']; ?> $</td>
                                        <td><?php
                                            switch ($row['transaction_status']) {
                                                case 1:
                                                    echo '<span style="color: #fff;padding: 3px 8px;background: #ff0000;border-radius: 3px;">Unpaid</span>';
                                                    break;
                                                case 2:
                                                    echo '<span style="color: #fff;padding: 3px 8px;background: #008000;border-radius: 3px;">Paid</span>';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info">Right now you don't have any transaction!</div>
                            <?php endif; ?>


                        </table>
                    </div>


                    <div class="tab-pane" id="mcqtest" style="padding: 10px; text-align: center">
                        <h6 class="counter-test">Counter: <span id="demo">0</span></h6>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p class="question_part">
                                <select>
                                    <?php
                                    $findExam = null;
                                    $findExam = findExam();
                                    if ($findExam):
                                    $rows = $findExam->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row):
                                    ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>

                                    <?php endforeach; ?>
                                    <?php else: ?>

                                    <?php endif; ?>
                                </select>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    .counter-test {
        color: #ff0000;
        width: 300px;
        padding: 10px;
        border-radius: 5px;

    }
    .question_part{
        width: 100%;
        height: 50px;
        background: #06bbcc;
        line-height: 50px;
        color: #fff;
        font-size: 21px;
    }
    .question_part select{
        background: #06bbcc;
        border: none;
        color: #fff;
    }
</style>

<!--<script>-->
<!--    // Set the date we're counting down to-->
<!--    var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();-->
<!---->
<!--    // Update the count down every 1 second-->
<!--    var x = setInterval(function() {-->
<!---->
<!--        // Get today's date and time-->
<!--        var now = new Date().getTime();-->
<!---->
<!--        // Find the distance between now and the count down date-->
<!--        var distance = countDownDate - now;-->
<!---->
<!--        // Time calculations for days, hours, minutes and seconds-->
<!--        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));-->
<!--        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));-->
<!--        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));-->
<!--        var seconds = Math.floor((distance % (1000 * 60)) / 1000);-->
<!---->
<!--        // Output the result in an element with id="demo"-->
<!--        document.getElementById("demo").innerHTML =  minutes + " m " + seconds + " s ";-->
<!---->
<!--        // If the count down is over, write some text-->
<!--        if (distance < 0) {-->
<!--            clearInterval(x);-->
<!--            document.getElementById("demo").innerHTML = "EXPIRED";-->
<!--        }-->
<!--    }, 1000);-->
<!--</script>-->