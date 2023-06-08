<?php

include_once('url_to.php');


$url = $url_api.'crm.product.list';

$result = file_get_contents($url, false);
if ($result === FALSE) { /* Handle error */ }
$arr = (array) json_decode($result);
echo json_encode($arr);

?>