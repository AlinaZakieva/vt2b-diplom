<?php

$to = 'alinazakievaaa@gmail.com';
$from = "From: Заявка с сайта <alinazakievaaa@gmail.com>\n\r";
$email = $_POST['email'];
$phone = $_POST['phone'];
$page = 'Анализ бизнес-процессов';

$message = '
<html>
<body>
<center>	
<table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td></tr>
 <tr>
  <td><b>Откуда</b></td>
  <td>'.$page.'</td>
 </tr>
 <tr>
  <td><b>Адресат</b></td>
  <td><a href="mailto:'.$email.'">'.$email.'</a></td>
 </tr>
 <tr>
  <td><b>Номер телефона</b></td>
  <td>'.$phone.'</td>
 </tr>
</table>
</center>	
</body>
</html>';

$headers  = "Content-type: text/html; charset=utf-8\r\n";
$headers .= $from;

if (mail("alinazakievaaa@gmail.com", $message, $headers)) {
    echo 'Отправлено';
} else {
    echo 'Не отправлено';
}

//$domain = substr(strrchr($email, "@"), 1);
//$res = getmxrr($domain, $mx_records, $mx_weight);
//if (false == $res || 0 == count($mx_records) || (1 == count($mx_records) && ($mx_records[0] == null || $mx_records[0] == "0.0.0.0"))) {
//    echo 1;
//} else {
//    mail($to, $message, $headers);
//}

?>