<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Высокие технологии для бизнеса | ИТ услуги</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">

    <script src="js/jquery-3.6.3.js"></script>
    <script src="js/js-inputmask.js"></script>

</head>

<body>
    <?php include_once("header.php") ?>

    <main class="main">
        <div class="new_intro">
            <div class="container_intro">
                <div class="left_section_intro">

                    <div class="title">Создаем цифровые продукты <br> Автоматизируем бизнес-процессы</div>
                    <a href="#button" class="button">Оценить проект</a>

                </div>
                <div class="right_section_intro">
                    <img src="image/Rectangle 4.svg" alt="bg" class="img_intro">

                </div>
            </div>
        </div>
        <section name="napravleniya">
            <h6 class="heading">НАПРАВЛЕНИЯ</h6>
            <div class="flex">
                <div class="first__column">
                    <img src="image/Значки/1.svg" alt="1"> <br>
                    <span class="main_text">Разработка web-систем и порталов</span>
                    <div class="line"></div>
                    <nav>
                        <span class="Bold_text">Web-разработка <br></span>
                        <ul>
                            <li>интернет-магазины/e-commerce</li>
                            <li>корпоративные порталы</li>
                            <li>сайты с системами бронирования и оплатами</li>
                            <li>высоконагруженные системы</li>
                            <li>сайты государственных учреждений</li>
                        </ul>
                    </nav>
                    <div class="btn_1">
                        <a href="#" class="btn_npr" id="open_pop_up">Подробнее</a>
                        <!--<a href="services.php" class="btn_npr">Подробнее</a>-->
                    </div>
                </div>
                <div class="second__column">
                    <img src="image/Значки/2.svg" alt="2"> <br>
                    <span class="main_text">Автоматизация бизнес-процессов</span>
                    <div class="line"></div>
                    <nav>
                        <span class="Bold_text">Консалтинг<br></span>
                        <ul>
                            <li>анализ и проектирование бизнес-процессов</li>
                            <li>внедрение управленческого учета</li>
                            <li>внедрение аналитики Power BI</li>
                        </ul>
                    </nav>
                    <div class="button__abp">
                        <div class="btn_2">
                            <a href="#" class="btn_npr" id="open_pop_up2">Подробнее</a>
                        </div>
                        <div class="btn_4">
                            <a href="#" class="btn_calc" id="open_pop_up5"><img src="image/calculator.svg" alt="calculator"></a>
                        </div>
                    </div>
                </div>
                <div class="last__column">
                    <img src="image/Значки/3.svg" alt="3"> <br>
                    <span class="main_text">Разработка цифровых продуктов</span>
                    <div class="line"></div>
                    <nav class="last_column_text">
                        <ul>
                            <li>Предпроектная аналитика и составление технического задания</li>
                            <li>Разработка и поддержка АИС (автоматизированных информационных систем)</li>
                            <li>Разработка и поддержка web-приложений</li>
                        </ul>
                    </nav>
                    <div class="btn_3">
                        <a href="#" class="btn_npr" id="open_pop_up3">Подробнее</a>
                    </div>
                </div>
            </div>
        </section>

        <section name="popup">
            <div class="pop_up" id="pop_up">
                <div class="pop_up_container">
                    <div class="pop_up_body" id="pop_up_body">
                        <a href="#" class="pop_up_close" id="pop_up_close"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <div class="icon">
                            <img src="image/Значки/1.svg" alt="1"> <br>
                        </div>
                        <span class="main_text_pop_up">Разработка web-систем и порталов</span>
                        <div class="line_pop_up"></div>
                        <nav>
                            <span class="bold_text_pop_up">Web-разработка <br></span>
                            <ul>
                                <li>интернет-магазины/e-commerce</li>
                                <li>корпоративные порталы</li>
                                <li>сайты с системами бронирования и оплатами</li>
                                <li>высоконагруженные системы</li>
                                <li>сайты государственных учреждений</li>
                            </ul>
                            <span class="bold_text_pop_up">Web-интеграция с внешними сервисами <br></span>
                            <ul>
                                <li>транспортными компаниями</li>
                                <li>CRM- системами</li>
                                <li>платежными системами</li>
                                <li>учетными системами</li>
                            </ul>
                            <span class="bold_text_pop_up">Техническая поддержка сайтов на 1С-Битрикс, Wordpress</span>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="pop_up" id="pop_up2">
                <div class="pop_up_container">
                    <div class="pop_up_body" id="pop_up_body2">
                        <a href="#" class="pop_up_close" id="pop_up_close2"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <div class="icon">
                            <img src="image/Значки/2.svg" alt="1"> <br>
                        </div>
                        <span class="main_text_pop_up">Автоматизация бизнес-процессов</span>
                        <div class="line_pop_up"></div>
                        <nav>
                            <span class="bold_text_pop_up">Консалтинг <br></span>
                            <ul>
                                <li>анализ и проектирование бизнес-процессов</li>
                                <li>внедрение управленческого учета</li>
                                <li>внедрение аналитики Power BI</li>
                            </ul>
                            <span class="bold_text_pop_up">1С- Программирование <br></span>
                            <span class="bold_text_pop_up">CRM-система Битрикс24 <br></span>
                            <ul>
                                <li>проработка бизнес-процессов на базе Битрикс24</li>
                                <li>приобретение и продление лицензий с бонусами от партнера</li>
                                <li>индивидуальная настройка Битрикс24 под ваши процессы</li>
                                <li>внедрение под ключ и обучение сотрудников</li>
                            </ul>
                            <span class="bold_text_pop_up">Автоматизация маркировки Честный знак</span>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="pop_up" id="pop_up3">
                <div class="pop_up_container">
                    <div class="pop_up_body3" id="pop_up_body3">
                        <a href="#" class="pop_up_close" id="pop_up_close3"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <div class="icon">
                            <img src="image/Значки/3.svg" alt="1"> <br>
                        </div>
                        <span class="main_text_pop_up">Разработка цифровых продуктов</span>
                        <div class="line_pop_up"></div>
                        <nav>
                            <ul>
                                <li>Предпроектная аналитика и составление технического задания</li>
                                <li>Разработка и поддержка АИС (автоматизированных информационных систем)</li>
                                <li>Разработка и поддержка web-приложений</li>
                                <li>Разработка и поддержка мобильных приложений</li>
                                <li>Интеграция с внешними сервисами (в том числе с государственными информационными системами)</li>
                                <li>Технический аудит Вашего программного обеспечения</li>
                                <li>Разработка чат-ботов в мессенджерах</li>
                                <li>Разработка MVP продукта для тестирования</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="pop_up4" id="pop_up4">
                <div class="pop_up_container">
                    <div class="pop_up_body4" id="pop_up_body4">
                        <a href="#" class="pop_up_close" id="pop_up_close4"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <h6>Заполните данные</h6>
                        <form action="" enctype="multipart/form-data" id="preproject_form">
                            <div class="input_box">
                                <input type="text" name="name-organiz" id="name_org_project" class="_req form__input" required>
                                <label>Название организации</label>
                            </div>
                            <div class="input_box2">
                                <label for="file-input">Реквизиты компании</label><br>
                                <input id="file-input" type="file" name="file" class="_req form__input" required>
                            </div>
                            <div class="input_box">
                                <input type="text" name="user-contact" id="contact_org_project" class="_req form__input" required>
                                <label>Контактное лицо</label>
                            </div>
                            <div class="input_box">
                                <input type="text" name="user-phone" id="phone_project" class="_req form__input tel" required>
                                <label>Номер телефона</label>
                            </div>
                            <div class="input_box">
                                <input type="text" name="inf-project" id="descr_project" class="_req form__input" required>
                                <label>Информация о предполагаемом проекте</label>
                            </div>
                            <div>
                                <p id="warning_preproject"></p>
                                <button class="send" type="submit" id="send" style="margin: 0 auto;" >Отправить</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="pop_up" id="pop_up5">
                <div class="pop_up_container">
                    <div class="pop_up_body5" id="pop_up_body5">
                        <a href="#" class="pop_up_close" id="pop_up_close5"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <h6>КАЛЬКУЛЯТОР</h6>
                        <h5>Анализ бизнес-процесссов</h5>
                        <span>Заполните поля:</span>
                        <div class="input_box">
                            <input type="number" id="count_process" name="process" class="js-input-a _req form__input" value="1" required>
                            <label>Количество процессов</label>
                        </div>
                        <div class="input_box">
                            <input type="number" id="count_departaments" name="departments" class="_req form__input" value="4" required>
                            <label>Количество отделов, участвующих в процессах</label>
                        </div>
                        <div class="input_box">
                            <input type="number" id="count_staff" name="staff" class="_req form__input" value="50" required>
                            <label>Количество сотрудников</label>
                        </div>
                        <div class="input_box">
                            <input type="number" id="count_interv" class="js-input-b _req form__input" value="10" name="interview" required>
                            <label>Количество интервью</label>
                        </div>
                        <div class="input_box_radio">
                            <span>Контрольная сессия со всеми участниками</span>
                            <label><input type="radio" name="Chouse" value="Yes" id="session-yes" checked>Да</label>
                            <label><input type="radio" name="Chouse" value="No" id="session-no">Нет</label>
                        </div>
                        <div class="input_box_radio">
                            <span>Планирование по оптимизации критических моментов</span>
                            <label><input type="radio" name="Chouse2" value="Yes" id="planning-yes" checked>Да</label>
                            <label><input type="radio" name="Chouse2" value="No" id="planning-no">Нет</label>
                        </div>
                        <div class="input_box_radio">
                            <span>Требуется ли подготовка инструкций по текущим процессам</span>
                            <label><input type="radio" name="Chouse3" value="Yes" id="instructions-yes" checked>Да</label>
                            <label><input type="radio" name="Chouse3" value="No" id="instructions-no">Нет</label>
                        </div>
                        <div class="cost-calc">
                            <span>Стоимость услуги: </span>
                            <span class="js-output" id="js-p"></span>
                        </div>
                        <div class="btn-flex">
                            <button class="js-btn-result" type="submit">Рассчитать стоимость</button>
                            <button class="js-btn-result" type="button" id="js-btn-order">Заказать услугу</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pop_up" id="pop_up6">
                <div class="pop_up_container">
                    <div class="pop_up_body6" id="pop_up_body6">
                        <a href="#" class="pop_up_close" id="pop_up_close6"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <span>Введите данные для связи. Менеджер свяжется с Вами в течение дня, для подтверждения заказа.</span>
                        <div class="input_box">
                            <input type="text" name="phone" id="phone_calc" class="_req form__input tel" required>
                            <label>Номер телефона</label>
                        </div>
                        <div class="input_box">
                            <input type="email" name="email" id="mail_calc" class="_req _email form__input" required>
                            <label>Email</label>
                        </div>
                        <div>
                            <p id='warning_calc'></p>
                            <button class="send-btn" type="submit" id="send" onclick="send_calc_crm()">Отправить</button>

                        </div>
                        <div class="mess"></div>
                    </div>
                </div>
            </div>

            <div class="pop_up" id="pop_up7">
                <div class="pop_up_container">
                    <div class="pop_up_body7" id="pop_up_body7">
                        <a href="#" class="pop_up_close" id="pop_up_close7"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                        <span class="main_text_pop_up">Проведение предпроектного обследования позволяет решить следующие задачи:</span>
                        <nav>
                            <ul>
                                <li>Предварительное выявление требований к будущей системе</li>
                                <li>Определение структуры организации</li>
                                <li>Определение перечня целевых функций организации</li>
                                <li>Анализ распределения функций по подразделениям и сотрудникам</li>
                                <li>Выявление функциональных взаимодействий между подразделениями, информационных потоков внутри подразделений и между ними, внешних информационных воздействий</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section name="predproektnoe_obsledovanie">
            <h6 class="heading">ПРЕДПРОЕКТНОЕ ОБСЛЕДОВАНИЕ</h6>
            <p class="text_pr_obsl">
                Предпроектное обследование – это комплекс работ, проводимый комиссией специалистов, во время которого собирается полный объем информации о техническом состоянии здания, инженерно-коммуникационных систем, особенностях земельного участка.
            </p>
            <div class="btn_pr_obsl_1">
                <a href="#" class="btn_pr_obls" id="open_pop_up4">Заказать услугу</a>
            </div>
            <div class="btn_pr_obsl_2">
                <a href="#" class="btn_pr_obls_2" id="pr_obsl_btn_pp">?</a>
            </div>
            <img src="image/Rectangle 11.svg" alt="bg" class="img_pr_obsl">
        </section>

        <section name="kompetencii">
            <h6 class="heading">КОМПЕТЕНЦИИ</h6>
            <div class="flex__pic">
                <div class="pics">
                    <img src="image/Компетенции svg/1.svg" alt="1">
                    <img src="image/Компетенции svg/2.svg" alt="2">
                    <img src="image/Компетенции svg/3.svg" alt="3">
                    <img src="image/Компетенции svg/4.svg" alt="4">
                    <img src="image/Компетенции svg/5.svg" alt="5">
                    <img src="image/Компетенции svg/6.svg" alt="6">
                    <img src="image/Компетенции svg/7.svg" alt="7">
                    <img src="image/Компетенции svg/8.svg" alt="8">
                    <img src="image/Компетенции svg/15.svg" alt="9">
                    <img src="image/Компетенции svg/10.svg" alt="10">
                    <img src="image/Компетенции svg/11.svg" alt="11">
                    <img src="image/Компетенции svg/12.svg" alt="12">
                    <img src="image/Компетенции svg/13.svg" alt="13">
                    <img src="image/Компетенции svg/14.svg" alt="14">
                    <img src="image/Компетенции svg/9.svg" alt="15">
                </div>
            </div>
        </section>

        <section name="projects" class="project">
            <h6 class="heading">ПРОЕКТЫ</h6>
            <button class="pre-btn"><img src="image/Проекты/right.svg" alt=""></button>
            <button class="nxt-btn"><img src="image/Проекты/right.svg" alt=""></button>
            <div class="project-container">
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/1.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Поддержка городского сервиса "Активный гражданин"</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/2.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Поддержка и сопровождение сервисов Meet for Сharity</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/3.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Мобильное приложение ITS Price</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/4.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Разработка и сопровождение облачной платформы IT-Desk</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/5.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Разработка и развитие интернет-магазина "Воентека" (e-commerce)</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/6.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Hobot: Доработка сайта и внедрение Битрикс24</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/7.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Автоматизация бизнес-процессов для компании "Городские парковки"</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/8.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Разработка интернет-магазина Wenger</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/9.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Разработка мобильного приложения "Хранители"</h2>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <a href="#"><img src="image/Проекты/10.webp" class="project-thumb" alt=""></a>
                        <a href="projects.php"><button class="card-btn">Подробнее</button></a>
                    </div>
                    <div class="project-info">
                        <h2 class="project-name">Мобильное приложение "7 Верст"</h2>
                    </div>
                </div>
        </section>

        <?php
        include_once('presentation_send_block.php');
        ?>
    </main>

    <footer class="footer">
        <p class="fottext">© 2016 - 2023 Компания «ВТ2Б»</p>
    </footer>

    <script src="js/script.js"></script>
    <script src="js/index.js"></script>
    <!--<script src="js/submitting_a_form.js"></script>-->
    <script type="text/javascript" src="libs/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="libs/jquery/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="libs/jquery/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $('.my-form').submit(function(e) {
            e.preventDefault();
            let th = $(this);
            let mess = $('.mess');
            let send = th.find('.send-btn');
            send.addClass('progress-bar-striped progress-bar-animated')

            $.ajax({
                url: 'foo.php',
                type: 'POST',
                data: th.serialize(),
                success: function(data) {
                    if (data == 1) {
                        send.removeClass('progress-bar-striped progress-bar-animated');
                        mess.html('<div class="alert alert-danger">Email введен неверно!</div>');
                        return false;
                    } else {
                        send.removeClass('progress-bar-striped progress-bar-animated');
                        mess.html('<div class="alert alert-success">Сообщение успешно отправлено!</div>');
                        setTimeout(function() {
                            th.trigger('reset');
                        })
                    }
                },
                error: function() {
                    mess.html('<div class="alert alert-danger">Ошибка отправки!</div>');
                    send.removeClass('progress-bar-striped progress-bar-animated');
                }
            })
        })
    </script>
</body>


<script defer>
    document.getElementById('bg_menu').style.display = 'none';
</script>


</html>