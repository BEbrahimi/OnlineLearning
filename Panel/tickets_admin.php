
<?php include 'view/common/header.php'?>

<?php include 'view/common/nav-bar.php'?>

<?php include 'view/common/sidebar.php'?>

<?php include 'view/tickets_admin/tickets_admin-content.php' ?>

<?php include 'view/common/footer.php'?>

<script>

    $(document).ready(function () {
        $('.btn-admin-reply-ticket').on('click',function (e) {
            e.preventDefault();
            var ticket_reply_body =$(this.form).find('textarea[name="ticket-reply-input"]').val();
            var ticket_num =$(this.form).find('input[name="ticket-num"]').val();
            var ticket_priority =$(this.form).find('input[name="ticket-priority"]').val();
            var ticket_email =$(this.form).find('input[name="ticket-email"]').val();
            var admin_ticket_email =$(this.form).find('input[name="admin-ticket-email"]').val();
            var ticket_subject =$(this.form).find('input[name="ticket-subject"]').val();

            // var ticket_num = $('.ticket-num').val();
            // var ticket_subject = $('.ticket-subject').val();
            // var ticket_priority = $('.ticket-priority ').val();
            // var ticket_email = $('.ticket-email').val();
            // var ticket_reply_body = $('.ticket-reply-input').val();
            console.log(ticket_num);
            console.log(ticket_subject);
            console.log(ticket_priority);
            console.log(ticket_email);
            console.log(ticket_reply_body);
            $.ajax({
                url:'<?php echo BASE_URL ?>user/model/ticket-model-ajax/insertAdminTicketReply.php',
                type:'POST',
                data:{
                    'ticket_reply_body':ticket_reply_body,
                    'ticket_num':ticket_num,
                    'ticket_priority':ticket_priority,
                    'ticket_email':ticket_email,
                    'admin_ticket_email':admin_ticket_email,
                    'ticket_subject':ticket_subject,

                },
                dataType:'JSON',
                success:function(data) {
                    alert(data);

                }
            })



        })
    })

</script>
