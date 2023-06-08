<?php
include_once('url_to.php');


$name_item = $_POST['name_item'];
$name = $_POST['name'];
$phone = $_POST['phone'];


$b24Url = $hr_url_site;	// укажите URL своего Битрикс24
$b24UserID = $hr_user_api;						// ID пользователя, от имени которого будем добавлять лид
$b24WebHook = $hr_url_webhook;		// код вебхука, который мы только что получили

// формируем URL, на который будем отправлять запрос
$queryURL = "$b24Url/rest/$b24UserID/$b24WebHook/crm.lead.add.json";	

// формируем параметры для создания лида	
$queryData = http_build_query(array(
   "fields" => array(
      "TITLE" =>$name_item,	// название лида
      "NAME"=>$name,
      'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']],

   ),
   'params' => array("REGISTER_SONET_EVENT" => "Y")	// Y = произвести регистрацию события добавления лида в живой ленте. Дополнительно будет отправлено уведомление ответственному за лид.	
));

// отправляем запрос в Б24 и обрабатываем ответ
$curl = curl_init();
curl_setopt_array($curl, array(
   CURLOPT_SSL_VERIFYPEER => 0,
   CURLOPT_POST => 1,
   CURLOPT_HEADER => 0,
   CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_URL => $queryURL,
   CURLOPT_POSTFIELDS => $queryData,
));
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result,1); 

// если произошла какая-то ошибка - выведем её
if(array_key_exists('error', $result))
{      
   echo json_encode('error');
}
else{
   echo json_encode('okey');
}


?>