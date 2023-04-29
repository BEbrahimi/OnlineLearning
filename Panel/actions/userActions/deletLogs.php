<?php

include "../../../user/init.php";
if (isset($_GET['id'])&& !empty($_GET['id']) ){
    $id = intval($_GET['id']);

}else{
    echo '
            <script>
    sweetAlert({
            title:"Dear User!",
            text:"You must select at least one row",
            icon:"warning",
            timer:3000,
            button: false,
            });
            </script>

    ';
    header("Location:index.php");
    exit;

}
$deleteLogsUser = null;
$deleteLogsUser = deleteLogsUser($id);
if ($deleteLogsUser){
    header("location:../../logs.php?deleteLogsSuccessfully=1010");
}else{
    header("location:users.php?deleteLogsFail=2020");
}