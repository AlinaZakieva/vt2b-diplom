<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Высокие технологии для бизнеса | ИТ услуги</title>
    <link rel="stylesheet" href="css/vacancy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&family=Montserrat:ital,wght@0,500;0,600;0,800;1,700&display=swap" rel="stylesheet">
    <script src="js/js-inputmask.js"></script>
    <script src="js/jquery-3.6.3.js"></script>

</head>

<body>
    <?php include_once("header.php") ?>

    <section name="pop-up" id='popup' style="display: none;">
        <div class="pop_up" id="pop_up">
            <div class="pop_up_container">
                <div class="pop_up_body" id="pop_up_body">
                    <a onclick="document.getElementById('popup').style.display = 'none'" class="pop_up_close" id="pop_up_close"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                    <span>Введите данные для связи. Менеджер свяжется с Вами в течение дня.</span>
                    <div class="input_box">
                        <input type="text" name="user_name" id="name_vacancy" class="_req form__input" required>
                        <label>Имя</label>
                    </div>
                    <div class="input_box">
                        <input type="text" name="phone" id="phone_vacancy" class="_req form__input tel" required>
                        <label>Номер телефона</label>
                    </div>
                    <div>
                        <p id="warning_vacancy"></p>
                        <button class="send" type="submit" id="send_vacancy_btn" onclick="send_vacancy(this)">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>

        <section name="vacancy" class="vacancy">
            <div class="all">
                <h6>ВАКАНСИИ</h6>
                <span class="bottom">Вакансии группы компаний "Высокие Технологии для Бизнеса"</span>
                <div class="cont_vac" id='cont_vac'>
                </div>
            </div>
        </section>

    </main>

    <div class="bg__footer"></div>

    <footer class="footer">
        <p class="fottext">© 2016 - 2023 Компания «ВТ2Б»</p>
    </footer>

    <script src="js/popup_vac.js"></script>
</body>
<script defer>
    let vac_cont = document.getElementById('cont_vac')

    jQuery.ajax({
        type: "POST",
        url: "vendor/get_vacancy.php",
        dataType: "json",
        success: function(result) {
            console.log(result);
            let temp_res = result.error ?? true
            console.log(temp_res);
            if (temp_res) {
                for (let i = 0; i < result.result.length; i++) {
                    vac_cont.innerHTML += `
                    <div class='inform_ab_vac'>
                        <h5>${result.result[i].NAME}</h5>
                        <span class='city'>г. Оренбург</span>
                        <p class='text'>
                            ${result.result[i].DESCRIPTION}
                        </p>
                        <button class='button btn_npr' id='open_pop_up' onclick="open_popup_vacancy('${result.result[i].NAME}')">Откликнуться</button>
                    </div>
                    
                    `

                }
            }

        },
        error: function(result) {
            console.log(result);
            console.log('error');
        }
    })




    function open_popup_vacancy(name_item) {
        document.getElementById('popup').style.display = 'block'
        document.getElementById('send_vacancy_btn').dataset.name = name_item
    }

    function send_vacancy(field) {
        let name_item = field.dataset.name
        let name = document.getElementById('name_vacancy').value
        let temp_phone = document.getElementById('phone_vacancy').value.replace(/\s+/g, '').replace(/\+/g, '').replace(/[\(\)\+]/g, '');

        if (name == '' || temp_phone.length < 10) {
            document.getElementById('warning_vacancy').textContent = 'Проверьте заполненные данные'

        } else {
            jQuery.ajax({
                type: "POST",
                url: "vendor/add_vacancy_CRM.php",
                data: {
                    name_item:name_item,
                    name: name,
                    phone: temp_phone
                },
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    let temp_res = toString(result)
                    if (result == "okey") {

                        document.getElementById('warning_vacancy').textContent = 'В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.'

                    } else {
                        document.getElementById('warning_vacancy').textContent = 'Произошла ошибка, повторите попытку позже или свяжитесь с нами по телефону: +7 3532 48 50 11'

                    }
                },
                error: function(result) {
                    console.log(result);
                    console.log('error');
                }
            })
        }


    }
</script>

</html>