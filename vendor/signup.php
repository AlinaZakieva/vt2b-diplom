<?php
session_start();

include_once("connect.php");

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$res_user_info_aut_register = $connect->query("SELECT * from users where user_login = '$login'");
if (mysqli_num_rows($res_user_info_aut_register) == 0){
    $cash_pass = password_hash($password,  PASSWORD_DEFAULT);
    $insert = "INSERT into users (user_login,user_password) values ('$login', '$cash_pass')";
    if (mysqli_query($connect, $insert)){
        $id= $connect->insert_id;

        $_SESSION['userId']=$id;
        $_SESSION['accept_field'] = null;
        $_SESSION['SRM_id'] = null;
        $error=0;

    }

}
else{
   $error=1; 
}

echo json_encode($error);


?>
