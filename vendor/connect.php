<?php
    $connect = mysqli_connect("localhost", "root", "root", "services");

    //if (!$connect) {
    //    die('Error connect to DataBase');
    //}
    if (mysqli_connect_errno()) {
        printf("Не удалось подключиться: %s\n", mysqli_connect_error());
        die();
    }