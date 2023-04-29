<?php
//insert function and clearing
function createUser($firstName,$lastName,$userName,$password,$email,$mobile,$role,$activation_key){
global $connect,$tbl_users;
    $firstName = sanitize($firstName);
    $lastName = sanitize($lastName);
    $userName = sanitize($userName);
    $password = sanitize($password);
    $password = hashData("sha1",$password);
    $email = sanitize($email);
    $mobile = sanitize($mobile);
    $role = intval($role);
    $activation_key = sanitize($activation_key);

    $sql = "INSERT INTO $tbl_users(first_name,last_name,user_name,email,password,mobile,role,activation_key) VALUES ('$firstName','$lastName','$userName','$email','$password',$mobile,$role,'$activation_key')";
    $result = $connect->query($sql);
    return $result;

}

//findusers
function findUsers(){
    global $connect,$tbl_users;
    $sql = ("SELECT `id`,`first_name`,`last_name`,`user_name`,`email`,`mobile`,`role`,`status` FROM `$tbl_users` ORDER BY `id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;

}

//delete all user
function deleteAllUsers()
{
    global $connect,$tbl_users;
    if (isset($_POST['checkbox'])){
        $count = count($_POST['checkbox']);
        $check = $_POST['checkbox'];
        for ($i = 0;$i < $count; $i++){
            $checked = $check[$i];
            $sql = ("DELETE FROM `$tbl_users` WHERE `id`=?");
            $result = $connect->prepare($sql);
            $result->bindValue(1,$checked);
            $result->execute();
        }
        return $result;

    }
    return false;

}

//Select user by id
function findUserById($id){
    global $connect,$tbl_users;
    $sql = ("SELECT `first_name`,`last_name`,`user_name`,`email`,`mobile`,`role` FROM `$tbl_users` WHERE `id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}

// Update User
function updateUserById($id,$firstName,$lastName,$userName,$email,$mobile,$role){
    global $connect,$tbl_users;
    $id = intval($id);
    $firstName = sanitize($firstName);
    $lastName = sanitize($lastName);
    $userName = sanitize($userName);
    $email = sanitize($email);
    $mobile = sanitize($mobile);
    $role = intval($role);

    $sql = ("UPDATE `$tbl_users` SET `first_name`=?,`last_name`=?,`user_name`=?,`email`=?,`mobile`=?,`role`=? WHERE id=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$firstName);
    $result->bindValue(2,$lastName);
    $result->bindValue(3,$userName);
    $result->bindValue(4,$email);
    $result->bindValue(5,$mobile);
    $result->bindValue(6,$role);
    $result->bindValue(7,$id);

    $result->execute();
    return $result;
}

//Find user by role
function findUserByRole($role=null){
    global $connect,$tbl_users;
    $sql =("SELECT `id`,`first_name`,`last_name`,`user_name`,`email`,`mobile`,`role`,`status` FROM `$tbl_users` WHERE ");
    $role = intval($role);
    switch ($role){
        case 1:
            $sql .="`role` =1 ORDER BY `id` DESC";
            break;
        case 2:
            $sql .="`role` =2 ORDER BY `id` DESC";
            break;
        case 3:
            $sql .="`role` =3 ORDER BY `id` DESC";
            break;
        case 4:
            $sql .="`role` =4 ORDER BY `id` DESC";
            break;
    }
    $result = $connect->query($sql);
    if ($result){
        return $result;
    }
    return false;
}

//Delete User
function deleteUserById($id){
    global $connect,$tbl_users;
    $id = intval($id);
    $sql = ("DELETE FROM `$tbl_users` WHERE `id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if ($result->rowCount()==1){
        return $result;
    }
    return false;
}

//Delete Logs User
function deleteLogsUser($id){
    global $connect,$tbl_logs;
    $id = intval($id);
    $sql = ("DELETE FROM `$tbl_logs` WHERE `id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if ($result->rowCount()==1){
        return $result;
    }
    return false;
}

//user duplicate
function isUserExist($email){
    global $connect,$tbl_users;
    $email = sanitize($email);
    $sql = ("SELECT `email` FROM `$tbl_users` WHERE `email`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$email);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}

//it is for activation key
function isActivationKeyExist($activationKey){
    global $connect,$tbl_users;
    $activationKey = sanitize($activationKey);
    $sql = ("SELECT `activation_key` FROM `$tbl_users` WHERE `activation_key`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$activationKey);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}

//it for author
function findUserByAccessRole(){
    global $connect, $tbl_users;
    $sql =("SELECT `id`, `first_name`,`last_name` FROM `$tbl_users` WHERE `role` IN (3,4)");
    $result = $connect->query($sql);
    if ($result->rowCount()>=1){
        return $result;

    }
    return false;
}

//activateUserAccount
function activateUserAccount($activationKey){
    global $connect,$tbl_users;
    $activationKey = sanitize($activationKey);
    $sql = ("UPDATE `$tbl_users` SET `status`=? WHERE activation_key=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,1);
    $result->bindValue(2,$activationKey);
    $result->execute();
    return $result;
}

// Do login
function doLogin($email=null,$password=null,$rememberMe = null){
    global $connect,$tbl_users,$tbl_logs;
    $email = sanitize($email);
    $userCookiePassword = sanitize($password);
    $password = sanitize($password);
    $password = hashData("sha1",$password);
    $sql = ("SELECT `id`,`first_name`,`last_name`,`user_name`,`email`,`mobile`,`role`,`status`,`password` FROM $tbl_users WHERE `email`=? AND `password`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$email);
    $result->bindValue(2,$password);
    $result->execute();
    if ($result->rowCount()>= 1){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['id'];
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $user_borwser = getUserBrowser($_SERVER['HTTP_USER_AGENT']);
        $user_email = $row['email'];
        $user_name = $row['user_name'];
        $detail = 'login';
        $sql=("INSERT `$tbl_logs` SET `user_id`=?,`ip`=?,`browser`=?,`email`=?,`user_name`=?,`detail`=?");
        $result = $connect->prepare($sql);
        $result->bindValue(1,$user_id);
        $result->bindValue(2,$user_ip);
        $result->bindValue(3,$user_borwser);
        $result->bindValue(4,$user_email);
        $result->bindValue(5,$user_name);
        $result->bindValue(6,$detail);
        $result->execute();
        $userSession= array(
            'signInKey'=>true,
            'id'=>$row['id'],
            'userEmail'=>$row['email'],
            'userName'=>$row['user_name'],
            'firstName'=>$row['first_name'],
            'lasttName'=>$row['last_name'],
            'fullName'=>$row['first_name'].' '.$row['last_name'],
            'role'=>$row['role'],
            'password'=>$row['password'],
            'status'=>$row['status'],
            'expireTime'=> time() + 86400, // 2

        );
        $_SESSION['userInfo']= $userSession;
        if (!empty($rememberMe)){
            setcookie('userEmail',$email,time()+60);
            setcookie('userPassword',$userCookiePassword,time()+60);
        }else{
            if (isset($_COOKIE['userEmail'])){
                setcookie('userEmail',"");
            }
            if (isset($_COOKIE['userPassword'])){
                setcookie('userPassword',"");
            }
        }
        return $result;
    }
    return false;


}

//Is user login
function isUserLogin(){
    if (isset($_SESSION['userInfo'])){
        return $_SESSION['userInfo']['signInKey'];
        return $_SESSION['userInfo']['id'];

    }
    return false;
}

//Is user Admin
function isUserAdmin(){
    if (isset($_SESSION['userInfo'])){
        if ($_SESSION['userInfo']['role'] == 4){
            return $_SESSION['userInfo']['role'];
        }
        return false;
    }
    return false;
}

//Reset Password Key
function addResetPasswordKey($userEmail=null,$reset_password_key=null){
    global $connect,$tbl_users;
    $userEmail = sanitize($userEmail);
    $reset_password_key = sanitize($reset_password_key);

    $sql = ("UPDATE `$tbl_users` SET `reset_password_key`=? WHERE `email` = ? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$reset_password_key);
    $result->bindValue(2,$userEmail);
    $result->execute();
    return $result;


}

//isResetPasswordKeyExist
function isResetPasswordKeyExist($reset_password_key){
    global $connect,$tbl_users;
    $reset_password_key = sanitize($reset_password_key);
    $sql = ("SELECT `reset_password_key` FROM `$tbl_users` WHERE `reset_password_key`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$reset_password_key);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}

//update password or change password
function resetUserPassword($password= null, $reset_password_key){

    global $connect,$tbl_users;

    $password = sanitize($password);
    $password = hashData("sha1",$password);
    $reset_password_key = sanitize($reset_password_key);

    $sql = ("UPDATE `$tbl_users` SET `password`=? WHERE `reset_password_key` = ? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$password);
    $result->bindValue(2,$reset_password_key);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

//find User Profile data
function findUserProfileData($userEmail = null)
{
    global $connect,$tbl_users;
    $sql =("SELECT * FROM `$tbl_users` WHERE `email` = ? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$userEmail);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

//update User Profile ById
function updateUserProfileById($userID =null,$fistName=null,$lastName=null,$userName= null,$userEmail=null){
    global $connect,$tbl_users;
    $fistName = sanitize($fistName);
    $lastName = sanitize($lastName);
    $userName = sanitize($userName);
    $userEmail = sanitize($userEmail);

    $sql=("UPDATE `$tbl_users` SET `first_name`=?,`last_name`=?,`user_name`=?,`email`=? WHERE `id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$fistName);
    $result->bindValue(2,$lastName);
    $result->bindValue(3,$userName);
    $result->bindValue(4,$userEmail);
    $result->bindValue(5,$userID);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;


}















