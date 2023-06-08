<?php

include_once('url_to.php');


session_start();

include_once('connect.php');

$SRM_id= $_SESSION['SRM_id'];

$url = $url_api.'crm.deal.list.json?FILTER[CONTACT_ID]='.$SRM_id.'';

$result = file_get_contents($url, false);
if ($result === FALSE) { /* Handle error */ }
$arr = (array) json_decode($result);
echo json_encode($arr);

?>