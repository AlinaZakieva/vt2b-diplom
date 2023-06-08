<?php
session_start();
$userId = $_SESSION['userId'] ?? null;

?>

<link rel="stylesheet" href="css/header.css">
<header class="header">
   <section name="menu" class="menu">
      <div class="header__inner">
         
            <a href="index.php" class="container_logo"><img src="image/Логотип/logo_bw.jpg" alt="logo" class="logo"></a>

         

         <nav class="nav-bar">
            <a href="about.php" class="nav__link">О КОМПАНИИ</a>
            <a href="projects.php" class="nav__link">ПРОЕКТЫ</a>
            <a href="vacancy.php" class="nav__link">ВАКАНСИИ</a>
            <a href="contacts.php" class="nav__link">КОНТАКТЫ</a>
            <a href="services.php" class="nav__link">УСЛУГИ</a>

         </nav>

         <div class="entrance">
            <a href="cart.php" class="img_cart"><img src="image/shopping-cart_icon-icons.com_69913.png" alt=""></a>
            <div class="btn-reg">
               <?php

               if ($userId) {
                  echo '<a href="lich.php" class="btn-enterance">ЛК</a>';
               } else {
                  echo '<a href="entrance.php" class="btn-enterance">Войти</a>';
               }

               ?>
            </div>
         </div>
      </div>
      <div class="bg__menu" id="bg_menu"></div>

   </section>
</header>