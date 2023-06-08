<?php
include_once('url_to.php');

include_once('connect.php');

session_start();


$userid= $_POST['id'];
$UF_CRM_1682604610076 = $_POST['login'];
$inf_user_surname = $_POST['inf_user_surname'];
$inf_user_lastname = $_POST['inf_user_lastname'];
$inf_user_name= $_POST['inf_user_name'];
$inf_user_phone = $_POST['inf_user_phone'];
$inf_user_mail = $_POST['inf_user_mail'];

$url = $url_api.'crm.contact.add.json?FIELDS[NAME]='.$inf_user_name.'&FIELDS[LAST_NAME]='.$inf_user_lastname.'&FIELDS[SECOND_NAME]='.$inf_user_surname.'&FIELDS[EMAIL][0][VALUE]='.$inf_user_mail.'&FIELDS[PHONE][0][VALUE]='.$inf_user_phone.'&FIELDS[UF_CRM_1682604610076]='.$UF_CRM_1682604610076.'';

// $context  = stream_context_create($options);

$result = file_get_contents($url, false);
if ($result === FALSE) { /* Handle error */
}
$arr = (array) json_decode($result);

$temp_id = $arr['result'];
$_SESSION['SRM_id'] = $temp_id;
$_SESSION['accept_field'] = 1;
$update_user = "UPDATE users set name_user = '$inf_user_name',surname_user='$inf_user_surname',lastname_user='$inf_user_lastname',phone_user='$inf_user_phone',  mail_user='$inf_user_mail',accept_field=1, SRM_id=$temp_id where  id = $userid";
mysqli_query($connect, $update_user);


echo json_encode($arr);

?>