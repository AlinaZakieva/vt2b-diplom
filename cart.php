<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&family=Montserrat:ital,wght@0,500;0,600;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/js-inputmask.js"></script>
    <script src="js/jquery-3.6.3.js"></script>

</head>

<body>

    <?php
    include_once("header.php");


    if ($userId != null && isset($_SESSION['cart'])) {
        echo '    
        <div class="btn_container_accept_services">
        <button class="btn_accept_services btn btn-success btn-block" type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-whatever="@mdo" onclick="open_modal()">Заказать</button>
        </div>
        ';
    }

    ?>

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

    <div class="modal" id="new_modal_delete_all">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удаление товара из корзины</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modal_delete_all.style.display='none'"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p>Удалить все товары из корзины?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modal_delete_all.style.display='none'">Нет</button>
                    <button type="button" class="btn btn-primary" data-id_item="" onclick="delete_all_item_from_cart()">ДА</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="new_modal_delete_one">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удаление товара из корзины</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="modal_delete_one.style.display='none'"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p>Удалить из корзины: <span id="delete_item_name_modal_text"></span> </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modal_delete_one.style.display='none'">Отмена</button>
                    <button type="button" class="btn btn-primary" id="delete_btn_one_item" data-id_item="" onclick="delete_item_from_cart(this)">ДА</button>
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
                        echo "<button type='button' class='btn btn-primary' onclick='send_order_in_CRM(`cart`)'>Заказать</button>";
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


        function open_modal() {
            modal.style.display = 'block'
            modal.style.opacity = 1

        }


        //отправка данных из корзины в CRM
        function send_order() {

        }
    </script>

    <script>
        //Открытие окна с удлаение товара из корзины
        var modal_delete_one = document.getElementById('new_modal_delete_one')

        function open_delete_item_cart(id_item, name_item) {
            modal_delete_one.style.display = 'block'
            modal_delete_one.style.opacity = 1
            document.getElementById('delete_item_name_modal_text').textContent = name_item
            document.getElementById('delete_btn_one_item').dataset.id_item = id_item
        }

        function delete_item_from_cart(field) {
            let id_item = field.dataset.id_item
            jQuery.ajax({
                type: "POST",
                url: "vendor/delete_one_item_cart.php",
                data: {
                    id: id_item
                },
                dataType: "json",
                success: function(result) {
                    let temp_res = toString(result)
                    window.location.reload();
                },
                error: function(result) {
                    console.log(result);
                    console.log('error');
                }
            })
        }

        //удаление всех товаров из корзины
        var modal_delete_all = document.getElementById('new_modal_delete_all')

        function open_delete_all_item_cart() {
            modal_delete_all.style.display = 'block'
            modal_delete_all.style.opacity = 1

        }


        function delete_all_item_from_cart() {
            jQuery.ajax({
                type: "POST",
                url: "vendor/delete_all_item_cart.php",
                dataType: "json",
                success: function(result) {
                    let temp_res = toString(result)
                    window.location.reload();

                },
                error: function(result) {
                    console.log(result);
                    console.log('error');
                }
            })
        }
    </script>

    <?php
    include_once("vendor/connect.php");

    ?>




    <div class="container-fluid" style="margin-top: 40px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-back">
                        <a href="services.php"><img src="image/1491254409-leftarrowbackwardsign_82959.png" style="width: 50px;" alt="strelka"></a>
                    </div>
                    <h2 class="text-center">Корзина</h2>
                    <?php

                    $total = 0;

                    $output = "";
                    $output .= "
                        <table class='table table-bordered table-striped'>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Стоимость</th>
                                <th>Количество</th>
                                <th>Итоговая стоимость</th>
                                <th>Действие над товаром</th>
                            </tr>
                        ";

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $output .= '
                                <tr>
                                    <td>' . $value['id'] . '</td>
                                    <td>' . $value['name'] . '</td>
                                    <td>' . $value['price'] . '</td>
                                    <td>' . $value['quantity'] . '</td>
                                    <td>' . number_format($value['price'] * $value['quantity']) . ' р.</td>
                                    <td>                                        
                                        <button class="btn btn-danger btn-block" onclick="open_delete_item_cart(' . $value["id"] . ',`' . $value["name"] . '`)">Удалить</button>
                                    </td>
                                ';

                            $total = $total + $value['quantity'] * $value['price'];
                        }
                        $output .= "
                            <tr>
                                <td colspan='3'></td>
                                <td></b>Итоговая стоимость:</b></td>
                                <td>" . number_format($total) . " р.</td>
                                <td>                                    
                                    <button class='btn btn-warning btn-block' onclick='open_delete_all_item_cart()'>Очистить</button>                                    
                                </td>
                            </tr>
                            ";
                    }
                    $output .= "</table>";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>


</html>