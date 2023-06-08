<?php

include_once('url_to.php');


$url = $hr_url_api.'crm.product.list.json';

$result = file_get_contents($url, false);
if ($result === FALSE) { /* Handle error */
}
$arr = (array) json_decode($result);
echo json_encode($arr);

