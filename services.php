<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Услуги</title>
    <link rel="stylesheet" type="text/css" href="css/services.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&family=Montserrat:ital,wght@0,500;0,600;0,800;1,700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.6.3.js"></script>

</head>

<body>
    <?php include_once("header.php") ?>

    <div class="modal" id="new_modal_accept_order">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Результат заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modal_order.style.display='none'"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p id="warning_order">В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modal_order.style.display='none'">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="new_modal_accept">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modal.style.display='none'"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $profile_field = $_SESSION['accept_field'] ?? null;
                    if ($profile_field == 1) {
                        $SRM_id = $_SESSION['SRM_id'];
                        include_once('vendor/url_to.php');

                        $url = $url_api.'crm.contact.get.json?ID=' . $SRM_id . '';

                        $result = file_get_contents($url, false);
                        if ($result === FALSE) { /* Handle error */
                        }
                        $arr = (array) json_decode($result, true);
                        $user_phone = $arr['result']['PHONE'][0]['VALUE'];
                        $user_email = $arr['result']['EMAIL'][0]['VALUE'];
                        $fio = $arr['result']['SECOND_NAME'] . " " . $arr['result']['NAME'] . " " . $arr['result']['LAST_NAME'];
                        echo
                        '                        
                        <div class="mb-3">
                            <h2 class="col-form-label">Проверьте данные, если они не верны исправьте в <a href="lich.php">профиле</a></h2>
                            <p>Телефон: ' . $user_phone . '</p>
                            <p>Почта: ' . $user_email . '</p>
                            <p>ФИО: ' . $fio . '</p>
                        </div>                        
                        ';
                    } else {
                        echo
                        '
                        <div class="mb-3">
                            <h2 class="col-form-label">Заполните данные в <a href="lich.php">профиле</a></h2>
                        </div>                        
                        ';
                    }
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modal.style.display='none'">Закрыть</button>
                    <?php
                    if ($profile_field == 1) {
                        echo '
                            <button type="button" class="btn btn-primary" id="btn_send_in_cart" onclick="send_order_in_CRM(this)">Заказать</button>
                        ';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <script src="js/send_order_in_CRM.js"></script>

    <script>
        //Отрытие модального окна с отправкой заказа
        let modal = document.getElementById('new_modal_accept')
        var modal_order = document.getElementById('new_modal_accept_order')


        function open_modal(field) {

            let quantity_item = document.getElementById(`input_cart_${field.dataset.id}`).value
            if (document.getElementById('btn_send_in_cart') != null) {
                document.getElementById('btn_send_in_cart').dataset.id = field.dataset.id
                document.getElementById('btn_send_in_cart').dataset.name = field.dataset.name
                document.getElementById('btn_send_in_cart').dataset.price = field.dataset.price
                document.getElementById('btn_send_in_cart').dataset.quantity = quantity_item
            }


            modal.style.display = 'block'
            modal.style.opacity = 1

        }


        //отправка данных из корзины в CRM
        function send_order() {

        }
    </script>

    <div class="warning_popup_add_cart" id="warning_popup_add_cart" style="visibility: hidden; opacity: 0;">
        <div class="container_warning_popup_add_cart">
            <p class="text_warning_popup_add_cart" id="text_warning_popup_add_cart"></p>
        </div>
    </div>




    <?php
    $user = $userId ?? "null";
    ?>




    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">IT Услуги</h2>
                    <div class="col-md-12">
                        <div class="row" id="row_services">
                            <div class="load_services" style='text-align:center'>Загрузка</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pop_up" id="pop_up6">
        <div class="pop_up_container">
            <div class="pop_up_body6" id="pop_up_body6">
                <a href="#" class="pop_up_close" id="pop_up_close6"><img src="image/slim_cross_icon_149867.png" alt="close"></a>
                <span>Введите данные для связи. Менеджер свяжется с Вами в течение дня, для подтверждения заказа.</span>
                <form action="#" id="form-order" class="my-form">
                    <div class="input_box">
                        <input type="text" name="phone" id="phone" class="_req form__input" required>
                        <label>Номер телефона</label>
                    </div>
                    <div class="input_box">
                        <input type="email" name="email" class="_req _email form__input" required>
                        <label>Email</label>
                    </div>
                    <button class="send-btn" type="submit" id="send">Отправить</button>
                </form>
                <div class="mess"></div>
            </div>
        </div>
    </div>

    <div class="bg__footer"></div>

    <footer class="footer">
        <p class="fottext">© 2016 - 2023 Компания «ВТ2Б»</p>
    </footer>
</body>
<script src="js/script.js"></script>
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

<script>
    //Вывод товара

    let inner = document.getElementById('row_services')

    let login_accept = <?= $user ?>;

    var str_login_accept = ""



    jQuery.ajax({
        type: "POST",
        url: "vendor/get_uslugi.php",
        dataType: "json",
        success: function(result) {

            if (result.result.length < 1) {} else {
                var str_add = ''
                for (let i = 0; i < result.result.length; i++) {
                    if (login_accept != null) {
                        str_login_accept = `<input type="button" data-id="${result.result[i].ID}" data-price="${result.result[i].PRICE}" data-name="${result.result[i].NAME}" onclick="open_modal(this)" id="js-btn-order" name="order" class="btn btn-secondary btn-block my-2" value="Заказать">`

                    }
                    str_add +=
                        `
                    <div class="col-md-4 items-services">
                        <div class="container_services">
                            <h5 class="text-center">${result.result[i].NAME}</h5>
                            <h5 class="text-center">${result.result[i].PRICE} р.</h5>
                            <input type="hidden" name="name" id="inp_cart_name_${result.result[i].ID}" value="${result.result[i].NAME}">
                            <input type="hidden" name="price" id="inp_cart_price_${result.result[i].ID}" value="${result.result[i].PRICE}">
                            <div class="width-quantity">
                                <input type="number" name="quantity" value="1" id="input_cart_${result.result[i].ID}" class="form-control">
                            </div>
                            <div class="container">
                                <button class="btn btn-warning btn-block my-2" onclick="add_to_cart(${result.result[i].ID})">Добавить в корзину</button>
                                ${str_login_accept??""}
                            </div>
                        </div>
                    </div>
                    `

                }
                inner.innerHTML = str_add

            }



        },
        error: function(result) {
            console.log(result);
            console.log('error');
        }
    })
</script>
<script>
    function add_to_cart(id_tovar) {
        let quantity = document.getElementById(`input_cart_${id_tovar}`).value
        let name = document.getElementById(`inp_cart_name_${id_tovar}`).value
        let price = document.getElementById(`inp_cart_price_${id_tovar}`).value
        let popup_warninng_cart_container = document.getElementById(`warning_popup_add_cart`)
        let popup_warning_cart_text = document.getElementById(`text_warning_popup_add_cart`)

        jQuery.ajax({
            type: "POST",
            url: "vendor/add_in_cart.php",
            data: {
                id: id_tovar,
                quantity: quantity,
                price: price,
                name: name
            },
            dataType: "json",
            success: function(result) {
                let temp_res = toString(result)
                if (result === 0) {
                    console.log(result);
                    console.log('add in cart');
                    popup_warning_cart_text.textContent = "Товар добавлен"
                    popup_warning_cart_text.style.backgroundColor = 'rgba(30, 143, 54, 0.3)'

                }
                if (result === 1) {
                    console.log(result);
                    console.log('ошибка');
                    popup_warning_cart_text.textContent = "Ошибка"
                    popup_warning_cart_text.style.backgroundColor = 'rgba(233, 70, 70,0.3)'

                }
                if (result === 2) {
                    console.log(result);
                    console.log('Такой товар уже есть');
                    popup_warning_cart_text.textContent = "Товар был добавлен ранее"
                    popup_warning_cart_text.style.backgroundColor = 'rgba(233, 70, 70,0.3)'
                }
                console.log(window.getComputedStyle(popup_warninng_cart_container).opacity);
                if (window.getComputedStyle(popup_warninng_cart_container).opacity == 0) {
                    popup_warninng_cart_container.style.opacity = 1
                    popup_warninng_cart_container.style.visibility = 'visible'
                    setTimeout(() => {
                        popup_warninng_cart_container.style.opacity = 0
                        popup_warninng_cart_container.style.visibility = 'hidden'
                    }, 3000)
                }

            },
            error: function(result) {
                console.log(result);
                console.log('error');
                popup_warning_cart_text.textContent = "Ошибка"

            }
        })
    }
</script>


</html>