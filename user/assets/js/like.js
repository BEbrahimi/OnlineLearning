alert('hi');
$(document).ready(function () {
    // get like result in ajax
    $('.likes-btn').on('click',function () {
        var post_id = $(this).data('id');
        var user_id = $(this).data('u_id');
        // var user_filter = $(this).data('filter');
        $cliked_btn = $(this);
        if ($cliked_btn.hasClass('far')){
            action = 'like';
            console.log (action);

        }else if ($cliked_btn.hasClass('fas')){
            action = 'unlike';
            console.log (action);
        }
        $.ajax({
            url:'model/posts.php',
            type:'POST',
            data:{
                'action':action,
                'post_id':post_id,
                'user_id':user_id,
            },
            beforeSend: function () {
            <?php
                if (!isUserLogin()): ?>
                swal({
                    title: "Dear user!",
                    text: "Please login to the site first",
                    icon: "warning",
                    button:false,
                    timer:5000,

                });
                return false;
            <?php endif; ?>
            },
            success:function (data) {
                result = JSON.parse(data);
                if (action == "like") {
                    $cliked_btn.removeClass('far');
                    $cliked_btn.addClass('fas');
                }else if (action == "unlike"){
                    $cliked_btn.removeClass('fas');
                    $cliked_btn.addClass('far');
                }
                $cliked_btn.siblings('span.likes-results').text(result.likes);
                $cliked_btn.siblings('span.dislikes-results').text(result.dislikes);
                $cliked_btn.siblings('i.disLikes-btn').removeClass('fas').addClass('far');
            }

        })
    });


    //get dislike result in ajax
    $('.disLikes-btn').on('click',function () {
        var post_id = $(this).data('id');
        var user_id = $(this).data('u_id');
        // var user_filter = $(this).data('filter');
        $cliked_btn = $(this);
        if ($cliked_btn.hasClass('far')){
            action = 'dislike';
            console.log (action);

        }else if ($cliked_btn.hasClass('fas')){
            action = 'undislike';
            console.log (action);
        }
        $.ajax({
            url:'model/posts.php',
            type:'POST',
            data:{
                'action':action,
                'post_id':post_id,
                'user_id':user_id,
            },
            beforeSend: function () {
            <?php
                if (!isUserLogin()): ?>
                swal({
                    title: "Dear user!",
                    text: "Please login to the site first",
                    icon: "warning",
                    button:false,
                    timer:5000,

                });
                return false;
            <?php endif; ?>
            },
            success:function (data) {
                result = JSON.parse(data);
                if (action == "dislike") {
                    $cliked_btn.removeClass('far');
                    $cliked_btn.addClass('fas');
                }else if (action == "undislike"){
                    $cliked_btn.removeClass('fas');
                    $cliked_btn.addClass('far');
                }
                $cliked_btn.siblings('span.likes-results').text(result.likes);
                $cliked_btn.siblings('span.dislikes-results').text(result.dislikes);
                $cliked_btn.siblings('.likes-btn').removeClass('fas').addClass('far');
            }

        })
    });
});


