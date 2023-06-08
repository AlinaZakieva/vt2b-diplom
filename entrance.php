<?php
session_start();
$userId = $_SESSION['userId'] ?? null;

 if ($userId) {
    header('Location:index.php');
    exit(0);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/entrance.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <script src="libs/jquery-3.6.3.js"></script>

</head>

<body>
    <!-- Форма авторизации -->
    <div class="form">
        <div class="logo_back">
            <a href="index.php" class='logo_vhod'><img src="image/Логотип/logo_bw.jpg" class="logo" alt=""></a>
        </div>
        <label>Логин</label>
        <input type="text" id="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" id="pass" placeholder="Введите пароль">
        <h3 id="attention" style="visibility: hidden;">Введены неверные данные</h3>

        <button onclick="login_user()">Войти</button>

        <p>
            У Вас нет аккаунта? - <a href="registration.php">зарегистрируйтесь</a>!
        </p>
    </div>

</body>


<script defer>
    function login_user() {
        console.log("login");
       
            jQuery.ajax({
                type: "POST",
                url: "vendor/login.php",
                data: {
                    login: document.getElementById("login").value,
                    password: document.getElementById("pass").value,
                },
                dataType: "json",
                // cache: false,
                success: function(result) {
                    var error = String(result)
                    console.log(result);
                    if (error === "0") {
                        console.log("login okey");

                        document.location.href = "index.php";
                    }
                    if (error === "1") {

                        document.getElementById("attention").style.visibility = "visible"
                        //Если такой пользователь есть, то выдает ошибку
                        console.log("неверные данные");
                    }

                },
                error: function(result) {
                    console.log(result);
                }
            })

        }
    
</script>

</html>