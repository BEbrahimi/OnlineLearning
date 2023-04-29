
<?php
if (isset($_GET['id'])&& !empty($_GET['id']) ){
    $id = intval($_GET['id']);

}else{
    header("Location:index.php");
    exit;
//    echo '<script>
//window.open("index.php");
//</script>';


}
$updateExamById = null;
$errors = [];
$haserror = false;
if (isset($_POST['update_exam_test'])) {
    if (!empty($_POST['examCategory']) && !empty($_POST['examTime'])){

        $updateExamById = updateExamById($id,$_POST['examCategory'],$_POST['examTime']);
        if ($updateExamById){

            echo '<script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired Exam has been successfully updated",
                        icon:"success",
                        timer:4000,
                        button:false,
                        });</script>';

        }else{
            echo '
                        <script>
                        sweetAlert({
                        title:"Error!",
                        text:"The desired update was not accepted",
                        icon:"warning",
                        timer:4000,
                        button: false,
                        });
                        </script>
                        
                        ';

        }


    }else{
        if (empty($_POST['examCategory'])){
            $haserror = true;
            $errors[]= 'examCategoryis empty';
        }

        if (empty($_POST['examTime'])){
            $haserror = true;
            $errors[]= 'examTime is empty';
        }

    }


}
?>


