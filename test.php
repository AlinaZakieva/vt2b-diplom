<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <?php

$b24Url = "https://uslugivt2b.bitrix24.ru";	// укажите URL своего Битрикс24
$b24UserID = "1";						// ID пользователя, от имени которого будем добавлять лид
$b24WebHook = "rs4sft6js624mh4s";		// код вебхука, который мы только что получили

// формируем URL, на который будем отправлять запрос
$queryURL = "$b24Url/rest/$b24UserID/$b24WebHook/crm.lead.add.json";	

// формируем параметры для создания лида	
$queryData = http_build_query(array(
   "fields" => array(
      "TITLE" => "ПРЕДПРОЕКТНОЕ ОБСЛЕДОВАНИЕ",	// название лида
      "COMMENTS" => "Меган Фокс"// имя ;)
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
   die("Ошибка при сохранении лида: ".$result['error_description']);
}

echo "Лид добавлен, отличная работа :)";
?>
   



   <script>

   </script>
</body>

</html>