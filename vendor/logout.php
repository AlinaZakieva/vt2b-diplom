<?php

session_start();
unset($_SESSION['userId']);
unset($_SESSION['userLogin']);
unset($_SESSION['accept_field']);
unset($_SESSION['SRM_id']);

header('Location: ..\\index.php');
?>