<?php

include_once('url_to.php');


$count_process =$_POST['count_process'];
$count_departaments =$_POST['count_departaments'];
$count_staff =$_POST['count_staff'];
$count_interv =$_POST['count_interv'];
$session_answer =$_POST['session_answer'];
$planning_answer =$_POST['planning_answer'];
$instructions_answer =$_POST['instructions_answer'];
$price  =$_POST['price'];
$phone  =$_POST['phone'];
$mail  =$_POST['mail'];

$out_comment= "Телефон: $phone; Почта $mail; Цена: $price; Процессов: $count_process; Отделы: $count_departaments; Сотрудникрв: $count_staff; Интервью: $count_interv; Сессия с участниками: $session_answer ; Планирование по оптимизации крит. моментов: $planning_answer ; Требуется ли подготовка инструкций по текущим процессам: $instructions_answer ";


$b24Url = $url_site;	// укажите URL своего Битрикс24
$b24UserID = $user_api;						// ID пользователя, от имени которого будем добавлять лид
$b24WebHook = $url_webhook;	// код вебхука, который мы только что получили

// формируем URL, на который будем отправлять запрос
$queryURL = "$b24Url/rest/$b24UserID/$b24WebHook/crm.lead.add.json";	

// формируем параметры для создания лида	
$queryData = http_build_query(array(
   "fields" => array(
      "TITLE" => "Анализ бизнес-процесссов",	// название лида
      "COMMENTS" => $out_comment,
      "OPPORTUNITY" =>  $price,
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
