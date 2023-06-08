<?php

session_start();
include_once('url_to.php');

include_once('connect.php');

$SRM_id= $_SESSION['SRM_id']??null;

$arr=null;

if($SRM_id==null){
   $arr = 'empty';
}
else{
   $url = $url_api.'crm.contact.get.json?ID='.$SRM_id.'';

   $result = file_get_contents($url, false);
   if ($result === FALSE) { /* Handle error */ }
   $arr = (array) json_decode($result);

}
echo json_encode($arr);

