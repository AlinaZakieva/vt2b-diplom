function send_order_in_CRM(id_item) {

   if (id_item == 'cart') {
      console.log('crm_cart');
      jQuery.ajax({
         type: "POST",
         url: "vendor/add_order_in_CRM.php",
         data: {
            id: id_item
         },
         dataType: "json",
         success: function (result) {
            let temp_res = toString(result)
            if (result.result == 1) {
               modal.style.display = 'none'
               modal.style.opacity = 0
               document.getElementById('warning_order').textContent = 'В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.'

               document.getElementById('new_modal_accept_order').style.display = 'block'
               document.getElementById('new_modal_accept_order').style.opacity = 1
            }
            else {
               document.getElementById('warning_order').textContent = 'Произошла ошибка, повторите попытку позже или свяжитесь с нами по телефону: +7 3532 48 50 11'

               document.getElementById('new_modal_accept_order').style.display = 'block'
               document.getElementById('new_modal_accept_order').style.opacity = 1
            }
         },
         error: function (result) {
            console.log(result);
            console.log('error');
         }
      })
   }
   else {
      jQuery.ajax({
         type: "POST",
         url: "vendor/add_order_in_CRM.php",
         data: {
            id: id_item.dataset.id,
            price: id_item.dataset.price,
            name: id_item.dataset.name,
            quantity: id_item.dataset.quantity
         },
         dataType: "json",
         success: function (result) {
            let temp_res = toString(result)
            if (result.result == 1) {
               modal.style.display = 'none'
               modal.style.opacity = 0
               document.getElementById('warning_order').textContent = 'В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.'

               document.getElementById('new_modal_accept_order').style.display = 'block'
               document.getElementById('new_modal_accept_order').style.opacity = 1
            }
            else {
               document.getElementById('warning_order').textContent = 'Произошла ошибка, повторите попытку позже или свяжитесь с нами по телефону: +7 3532 48 50 11'

               document.getElementById('new_modal_accept_order').style.display = 'block'
               document.getElementById('new_modal_accept_order').style.opacity = 1
            }
         },
         error: function (result) {
            console.log(result);
            console.log('error');
         }
      })
   }

}