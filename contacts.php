<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&family=Montserrat:ital,wght@0,500;0,600;0,800;1,700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.6.3.js"></script>

</head>

<body>
    <?php include_once("header.php") ?>



    <main>
        <div class="flex">
            <div class="contacts">
                <div class="contents">
                    <h6 class="h6_once">КОНТАКТЫ</h6>
                    <p class="contacts__text">
                        Адрес: г. Москва, Пресненская наб., 12, Москва-Сити, Федерация-Восток <br>
                        Тел: +7 495 118 33 99 | INFO@VT2B.RU <br><br>
                        Адрес: г. Оренбург, 460048, ул. Томилинская 238 Пом II <br>
                        Тел: +7 3532 48 50 11 | INFO@VT2B.RU <br>
                    </p>
                    <p class="bold__text">
                        Получить презентацию с перечнем<br> компетенций нашей компании
                    </p>

                    <div class="user-details">
                        <div class="input-box">
                            <input type="email" id="email_to_presentation" placeholder="email" required>
                        </div>
                    </div>
                    <div class="button_email">
                        <input type="submit" onclick="send_presentation()"  value="Получить">
                    </div>
                    <div class="warning_send_presentation" id="warning_send_presentation"></div>

                </div>
            </div>

            <section class="map">
                <div class="container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2467.496459736148!2d55.132747815780654!3d51.79708867968379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf7283aab60a9%3A0x5a745a792bbb83ee!2sVysokiye%20Tekhnologii%20Dlya%20Biznesa!5e0!3m2!1sen!2sru!4v1656356002260!5m2!1sen!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>


        </div>

    </main>
    <div class="bg__footer"></div>

    <footer class="footer">
        <p class="fottext">© 2016 - 2023 Компания «ВТ2Б»</p>
    </footer>
</body>
<script src="js/send_presentation.js"></script>
</html>