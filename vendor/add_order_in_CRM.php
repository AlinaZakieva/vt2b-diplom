<?php

include_once('url_to.php');

function str_outs($id, $price, $quantity, $number){
   $str = "&ROWS[$number][PRODUCT_ID]=$id&ROWS[$number][PRICE]=$price&ROWS[$number][QUANTITY]=$quantity";
   return $str;
}

session_start();

$userId = $_SESSION['SRM_id'];

$id_item = $_POST['id'];

$url = $url_api.'crm.deal.add.json?FIELDS[CONTACT_ID]=' . $userId . '';


$result = file_get_contents($url, false);
if ($result === FALSE) { /* Handle error */
}
$arr = (array) json_decode($result);

$temp_id = $arr['result'];

$str_out = '';

if ($temp_id != '') {
   $str_out .= "?ID=$temp_id";
   if ($id_item == 'cart') {
      $cart = $_SESSION['cart'];
      for ($i = 0; $i < count($cart); $i++) {

         $id = $cart[$i]['id'];
         $price = $cart[$i]['price'];
         $quantity = $cart[$i]['quantity'];
         $str_out.= str_outs($id, $price, $quantity, $i);
      }
   } else {
      $id = $_POST['id'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      $str_out.= str_outs($id, $price, $quantity, 0);
   }
   $url_add_item = $url_api.'crm.deal.productrows.set.json'.$str_out;
   $result_item = file_get_contents($url_add_item, false);
   if ($result_item === FALSE) { /* Handle error */
   }
   $arr_item = (array) json_decode($result_item );
   echo json_encode($arr_item );





}
