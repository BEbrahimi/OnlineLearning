
<!-- Main-body start -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin: 20px">All Ticket</h3>
            </div>
        </div>
        <hr style="background: #ec0003; height: 2px;" />

        <div class="row">
            <div class="col-lg-12">
                <div class="panel box box-info">
                    <div class="panel-body">
                        <div class="table-responsive" style="margin: 20px;">
                            <a href="create_ticket.php" style="width: 150px; border-radius: 5px;border: 1px solid #0b2e13;margin: 20px;color: #fff;font-weight: bold; height: 40px;background: #00c0ef;display: block;line-height: 30px;padding: 5px;"><span><i class="fa fa-plus" style="margin-right: 5px"></i></span>Sent New Ticket</a>
                            <div class="tab-pane" id="profile-user-all-tickets">
                                <?php
                                $findAllTickets = null;
                                $findAllTickets = findAllTickets();
                                if ($findAllTickets):
                                    $rows = $findAllTickets->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row):
                                        ?>
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-info">
                                                <div class="panel-heading-profile subject-style" id="" style="margin-bottom: 10px;background: #efefef;height: 40px;padding: 10px">
                                                    <a href="#s<?php echo $row['ticket_num'];?>" data-toggle="collapse" data-parent="accordion" style="color: #c200ff;">
                                                        <b>Ticket subject:-</b>
                                                        <?php echo $row['ticket_subject'];?>
                                                    </a>
                                                    <a href="#"><i class="fa fa-trash" style="color: #06b4c5; margin-left: 20px;margin-right: 20px;font-size: 20px;float: right;"></i></a>

                                                    <span class="ticket-no">Ticket No: <?php echo $row['ticket_num'];?></span>
                                                    <span class="ticket-no" style="display: none;">Ticket No: <?php echo $row['priority'];?></span>

                                                </div>



                                                <div id="s<?php echo $row['ticket_num'];?>" class="panel-collapse collapse in custom-panel-collapse">


                                                    <div class="sent-details-wrapper">
                                                        <?php
                                                        $findTicketDetailsByTicketNum = null;
                                                        $findTicketDetailByTicketNum = findTicketDetailsByTicketNum($row['ticket_num']);

                                                        $rows =$findTicketDetailByTicketNum->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($rows as $row):

                                                            ?>

                          <img class="img-circle sender-ticket-image" width="50" height="60"
                            <?php if ($row['status']==1): ?>
                               src=" <?php echo get_gravatar($row['admin_email']);?>">
                                                            <span style="color: #c200ff;">Admin:</span>
                             <?php else: ?>
                                                        src=" <?php echo get_gravatar($row['user_email']);?>">
                                                        <?php endif; ?>



                                                            <span>Posted on: <?php echo dateToShortLong($row['create_at']);?></span>


                                                            <div class="ticket-text" style="margin-top: 10px;margin-left: 95px;color: #c200ff;">
                                                                <?php echo $row['ticket_body'];?>
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
                                                    <textarea  name="ticket-reply-input"
                                                               class="form-control ticket-reply-input" rows="10" placeholder="Type your Comments..."></textarea>
                                                                </div>
                                                                <div class="form-group text-left" style="margin: 10px">
            <input type="hidden" name="ticket-num" class="ticket-num" value="<?php echo $row['ticket_num'];?>">
            <input type="hidden" name="ticket-priority" class="ticket-priority" value="<?php echo $row['priority'];?>">
            <input type="hidden" name="ticket-email" class="admin-ticket-email" value="<?php echo $row['user_email'];?>">
            <input type="hidden" name="admin-ticket-email" class="ticket-email" value="<?php echo $_SESSION['userInfo']['userEmail'];?>">
            <input type="hidden" name="ticket-subject" class="ticket-subject" value="<?php echo $row['ticket_subject'];?>">
            <input type="button" class="btn btn-success btn-admin-reply-ticket" value="Reply">
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


                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>