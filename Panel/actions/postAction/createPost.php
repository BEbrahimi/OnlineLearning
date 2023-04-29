<?php
$createPost = null;
$currentPostId = null;
$postPublish =null;
$postId = null;
if (isset($_POST['btn_post_draft'])){
    if (!empty($_POST['post_title'])  && !empty($_POST['post_content']) && !empty($_POST['author_id']) && !empty($_POST['cat_id'])&& !empty($_POST['post_tags']) &&!empty($_POST['post_img']) &&!empty($_POST['slug']) && !empty($_POST['unique_post_key'])&& !empty($_POST['topic_type']) ){

        $createPost = createPost($_POST['post_title'],$_POST['post_content'],$_POST['video_url'] ,$_POST['author_id'],$_POST['cat_id'],$_POST['post_tags'],$_POST['post_img'],$_POST['unique_post_key'],$_POST['slug'],$_POST['topic_type'],$_POST['course_id'],$_POST['course_id'],$currentPostId);
        if ($createPost){
            echo 'Ok';
//            echo $currentzPostId;
//            echo $postId;
            $postId = postId($_POST['unique_post_key']);

        }else{
            echo 'false';
        }
    }else{
        echo 'error';
    }
}

if (isset($_POST['btn_post_publish'])){
    $postId = postId($_POST['unique_post_key']);
    $postPublish = postPublish($postId);
   echo '
                        <script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Course published!",
                        icon:"success",
                        timer:3000,
                        button: false,
                        });
                        </script>
                        
                        ';
}
?>
