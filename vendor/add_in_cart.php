<?php

session_start();

$result = 0;

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$id = $_POST['id'];

if ($name == "" || $price == "" || $id == "" || $quantity == "" || $quantity < 1) {
   $result = 1;
} else {
   if (isset($_SESSION['cart'])) {
      $session_array_id = array_column($_SESSION['cart'], "id");
      if (!in_array($id, $session_array_id)) {
         $session_array = array(
            'id' => $id,
            "name" => $name,
            "price" => $price,
            "quantity" => $quantity
         );
         $_SESSION['cart'][] = $session_array;
         $result=0;
      }
      else{
         $result=2;
      }
   } else {
         $session_array = array(
            'id' => $id,
            "name" => $name,
            "price" => $price,
            "quantity" => $quantity
         );
         $_SESSION['cart'][] = $session_array;
         $result=0;
   }
}

echo json_encode($result);


   // if (isset($_SESSION['cart'])) {
   //     $session_array_id = array_column($_SESSION['cart'], "id");

   //     if (!in_array($_GET['id'], $session_array_id)) {
   //         $session_array = array(
   //             'id' => $_POST['id'],
   //             "name" => $_POST['name'],
   //             "price" => $_POST['price'],
   //             "quantity" => $_POST['quantity']
   //         );

   //         $_SESSION['cart'][] = $session_array;
   //     }
   // } else {
   //     $session_array = array(
   //         'id' => $_POST['id'],
   //         "name" => $_POST['name'],
   //         "price" => $_POST['price'],
   //         "quantity" => $_POST['quantity']
   //     );

   //     $_SESSION['cart'][] = $session_array;
   // }
