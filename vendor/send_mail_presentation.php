<?php

$url = 'https://api.elasticemail.com/v2/email/send';

$mail_to = $_POST['email'];

$filename = "prezentatsia.pdf";
$file_name_with_full_path = realpath('../'.$filename);
$filetype = "text/plain"; // Change correspondingly to the file type

try {
   $post = array(
      'from' => 'timakornov@gmail.com',
      'fromName' => 'Команда vt2b',
      'apikey' => '0C8B93DF12062060371925FC3550DA402D41C73BCD6D64F1EF358B27FEC9442A0AE6134DC1903CFA27A0DE1FCAD64F33',
      'subject' => 'Презентация компании VT2B',
      'to' => "$mail_to",
      'template' => 'Presentation_company',
      'isTransactional' => false,
      'file_1'=> new CurlFile($file_name_with_full_path, $filetype, $filename),
      
   );

   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $post,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
   ));

   $result = curl_exec($ch);
   curl_close($ch);

   echo $result;
} catch (Exception $ex) {
   echo $ex->getMessage();
}


?>