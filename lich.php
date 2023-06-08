<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ЛК</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;900&family=Montserrat:ital,wght@0,500;0,600;0,800;1,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/lich.css">
   <script src="js/js-inputmask.js"></script>
   <script src="js/jquery-3.6.3.js"></script>


</head>

<body>


   <div class="btn_container_logout_lich">
      <form action="vendor/logout.php" method="post">
         <button type="submit" class="btn_accept_services btn btn-danger btn-block" type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-whatever="@mdo">Выйти</button>
      </form>
   </div>
   <?php include_once("header.php") ?>

   <div class="containers">
      <?php

      $userId = $_SESSION['userId'] ?? null;
      $login = $_SESSION['userLogin'] ?? null;
      $accept_field = $_SESSION['accept_field'] ?? 0;

      if ($userId == null) {
         header('Location: index.php');
         exit(0);
      }



      ?>




      <div class="main" style="width: 80%; margin:0 auto; margin-top:30px;">

         <h2 style="font-weight: 300; font-size: 36px; text-align:center">Личный кабинет</h2>
         <div class="inf_cont">
            <div class="inf_id_user">Ваш уникальный индентификатор: <span><?= $userId ?></span> </div>
            <div class="edit_inf">
               <div class="fio_container" style="display: flex; gap:30px;">
                  <div class="item_edit_inf">
                     <p class="header_item_inf">Фамилия</p>
                     <input type="text" class="form-control input_item_inf" minlength="2" id="inp_surname" placeholder="Введите фамилию">
                  </div>
                  <div class="item_edit_inf">
                     <p class="header_item_inf">Имя</p>
                     <input type="text" class="form-control input_item_inf" minlength="2" id="inp_name" placeholder="Введите имя">
                  </div>
                  <div class="item_edit_inf">
                     <p class="header_item_inf">Отчество</p>
                     <input type="text" class="form-control input_item_inf" minlength="2" id="inp_lastname" placeholder="Введите отчество">
                  </div>
               </div>
               <div class="item_edit_inf">
                  <p class="header_item_inf">Телефон</p>
                  <input type="text" class="form-control input_item_inf tel" minlength="13" id="inp_phone" placeholder="+7(999)999 99 99">
               </div>
               <div class="last_item_inf">
                  <div class="item_edit_inf">
                     <p class="header_item_inf">Почта</p>
                     <input type="text" class="form-control input_item_inf" minlength="5" id="inp_mail" placeholder="pochta@mail.ru">
                  </div>
                  <div class="item_edit_inf">
                     <button class="btn_accept_user btn btn-success btn-block" type="button" onclick="send_inf_user()">Сохранить</button>
                  </div>
                  <div class="item_edit_inf">
                     <p id="error_message" style="margin-left: 20px; color:rgba(200,40,0);display:none;">Проверьте введенные данные</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="order_inf_container" style="margin-top: 40px;">
            <h2 style="font-weight: 300; font-size: 36px; text-align:center">Заказы</h2>
            <div class="container_deal" id='container_deal' style="margin-top: 40px;">
               <div class="order_inf" style="font-weight: 300; font-size: 30px; text-align:center">Заказов нет</div>

            </div>

            <div class="order_item">

            </div>
         </div>
      </div>



      <div class="bg__footer"></div>

      <footer class="footer">
         <p class="fottext">© 2016 - 2023 Компания «ВТ2Б»</p>
      </footer>
   </div>

</body>
<script src=""></script>
<script defer>
   jQuery.ajax({
      type: "POST",
      url: "vendor/get_inf_user.php",
      data: {
         id: <?= $userId ?>
      },
      dataType: "json",
      success: function(result) {
         console.log(result);
         let temp_res = result.error ?? true

         console.log(temp_res);
         if (temp_res && result != 'empty') {
            document.getElementById('inp_surname').value = result.result.SECOND_NAME
            document.getElementById('inp_lastname').value = result.result.LAST_NAME
            document.getElementById('inp_name').value = result.result.NAME
            document.getElementById('inp_phone').value = result.result.PHONE[0].VALUE
            document.getElementById('inp_mail').value = result.result.EMAIL[0].VALUE
            get_orders()
         }

      },
      error: function(result) {
         console.log(result);
         console.log('error');
      }
   })


   let orders_user;

   function get_orders() {
      jQuery.ajax({
         type: "POST",
         url: "vendor/get_order_user.php",
         data: {
            id: <?= $userId ?>
         },
         dataType: "json",
         success: function(result_deal) {
            console.log(result_deal);

            if (result_deal.result.length > 0) {
               orders_user = result_deal.result
               console.log(orders_user);
               create_table()
            }
         },
         error: function(result_deal) {
            console.log(result_deal);
            console.log('error_deal');
         }
      })
   }




   function create_table() {
      document.getElementById('container_deal').innerHTML = `   
         <table class='table table-bordered table-striped' id="table_id">
            <tr>
                <th>Номер</th>
                <th>Услуги</th>
                <th>Этап</th>
                <th>Итоговая стоимость</th>
                <th>Дата обращения</th>
            </tr>
         `

      var stages = {
         'NEW': 'Заявка отправлена',
         'PREPARATION': 'Работем с вами',
         'PREPAYMENT_INVOICE': 'Разрабатываем',
         'EXECUTING': 'Дорабатываем',
         'WON': 'Завершено',
         'LOSE': 'Отменено'
      }

      let output = ''
      console.log(orders_user.length);
      for (let j = 0; j < orders_user.length; j++) {

         let items_str = '';

         jQuery.ajax({
            type: "POST",
            url: "vendor/get_items_deal.php",
            data: {
               id: orders_user[j].ID
            },
            dataType: "json",
            success: function(result_items) {

               console.log(result_items);
               let temp_res_items = result_items.error ?? true
               console.log(temp_res_items);
               if (temp_res_items) {
                  if (result_items.result.length > 0) {
                     for (let f = 0; f < result_items.result.length; f++) {
                        if (f == result_items.result.length - 1) {
                           items_str += `${result_items.result[f].PRODUCT_NAME}(${result_items.result[f].QUANTITY})`

                        } else {
                           items_str += `${result_items.result[f].PRODUCT_NAME}(${result_items.result[f].QUANTITY}),`
                        }
                     }
                  }
               }

               document.getElementById('table_id').innerHTML += `
               <tr>
                  <td>${orders_user[j].ID}</td>
                  <td>${items_str}</td>
                  <td>${stages[orders_user[j].STAGE_ID]}</td>
                  <td>${orders_user[j].OPPORTUNITY}</td>
                  <td>${(orders_user[j].DATE_CREATE).substring(0,10)}</td>
               </tr>
            `
            },
            error: function(result_items) {
               console.log(result_items);
               console.log('error_items');
            }
         })

      }


      function check_stage(id_stage) {



      }

   }
</script>

<script defer>
   function send_inf_user() {

      let accept_field = <?= $accept_field ?>;
      let temp_phone = document.getElementById('inp_phone').value.replace(/\s+/g, '').replace(/\+/g, '').replace(/[\(\)\+]/g, '');


      let inputs = document.querySelectorAll('INPUT')
      let null_input = false;
      for (let items of inputs) {
         if (items.value.length == 0) {
            null_input = true
            items.style.background = 'rgba(250,0,0,0.1)'
            document.getElementById('error_message').style.display = 'block'
            setTimeout(() => {
               items.style.background = 'white'
               document.getElementById('error_message').style.display = 'none'
            }, 3000)

         }
      }
      console.log(null_input);
      if (null_input == false && accept_field == 1) {
         jQuery.ajax({
            type: "POST",
            url: "vendor/update_user_inf.php",
            data: {
               id: <?= $userId ?>,
               login: '<?= $login ?>',
               inf_user_surname: document.getElementById('inp_surname').value,
               inf_user_lastname: document.getElementById('inp_lastname').value,
               inf_user_name: document.getElementById('inp_name').value,
               inf_user_phone: temp_phone,
               inf_user_mail: document.getElementById('inp_mail').value,
            },
            dataType: "json",
            success: function(result) {
               console.log(result);
               let temp_res = result.error ?? true
               console.log(temp_res);
               if (temp_res) {
                  console.log('данные успешно обновлены');
               }

            },
            error: function(result) {
               console.log(result);
               console.log('error');
            }
         })
      }
      if (null_input == false && accept_field == 0) {
         jQuery.ajax({
            type: "POST",
            url: "vendor/add_user_in_CRM.php",
            data: {
               id: <?= $userId ?>,
               login: '<?= $login ?>',
               inf_user_surname: document.getElementById('inp_surname').value,
               inf_user_lastname: document.getElementById('inp_lastname').value,
               inf_user_name: document.getElementById('inp_name').value,
               inf_user_phone: temp_phone,
               inf_user_mail: document.getElementById('inp_mail').value,
            },
            dataType: "json",
            success: function(result) {
               console.log(result);
               let temp_res = result.error ?? true
               console.log(temp_res);
               if (temp_res) {
                  console.log('данные успешно обновлены');

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