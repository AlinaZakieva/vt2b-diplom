<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/entrance.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <script src="libs/jquery-3.6.3.js"></script>

</head>

<body>
    <?php
    session_start();
    $userId = $_SESSION['userId'] ?? null;

    if($userId!=null){
        header('Location: index.php');
    }
    ?>
    <!-- Форма регистрации -->
    <div class="form">
    <div class="logo_back">
            <a href="index.php" class='logo_vhod'><img src="image/Логотип/logo_bw.jpg" class="logo" alt=""></a>
        </div>
        <label>Логин</label>
        <input type="text" name="login" id="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" name="password" id="pass" placeholder="Введите пароль">
        <label>Подтвердите пароль</label>
        <input type="password" name="password_confirm" id="pass_confirm" placeholder="Введите пароль">

        <h3 id="attention" style="visibility: hidden;">Такой пользователь существует</h3>
        <button id="submit" onclick="registr_user()">Зарегистрироваться</button>
        <p>
            Уже есть аккаунт? - <a href="entrance.php">войдите</a>!
        </p>
    </div>


</body>
<script defer>
    function registr_user() {
        console.log("reg");
        if (document.getElementById("pass").value == document.getElementById("pass_confirm").value) {

            jQuery.ajax({
                type: "POST",
                url: "vendor/signup.php",
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
                        console.log("registration okey");

                        document.location.href = "index.php";
                    }
                    if (error === "1") {

                        document.getElementById("attention").style.visibility = "visible"
                        //Если такой пользователь есть, то выдает ошибку

                    }

                },
                error: function(result) {
                    console.log(result);
                }
            })

        }
    }
</script>
<script defer>

</script>
<!-- <script src="js/registr.js"></script> -->

</html>