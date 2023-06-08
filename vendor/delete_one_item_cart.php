<?php

session_start();

$id = $_POST['id'];

$arr = $_SESSION['cart'];

$arr = array_filter($arr, function ($x) use ($id){
   return $x['id']!==$id;
});

$_SESSION['cart']=$arr;

if(count($_SESSION['cart'])==0){
   unset($_SESSION['cart']);   
}
echo json_encode('21')



?>