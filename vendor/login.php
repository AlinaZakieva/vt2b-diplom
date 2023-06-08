<?php
session_start();
include_once ("connect.php");
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_EMAIL);
$password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);


$result = $connect->query("SELECT * from users where user_login = '$login'");
if(mysqli_num_rows($result) != 0){
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['id'];
        $user_login = $row['user_login'];
        $user_password = $row['user_password'];
        $accept_field = $row['accept_field'];
        $SRM_id = $row['SRM_id'];

    }
    if(password_verify($password,$user_password)){
        $_SESSION['userId'] = $user_id;
        $_SESSION['userLogin'] = $user_login;
        $_SESSION['accept_field'] = $accept_field;
        $_SESSION['SRM_id'] = $SRM_id;

        $error= 0;
    }
    else{
        $error=1;
    }
}
else{  
    $error=1;
}

echo json_encode($error)

?>