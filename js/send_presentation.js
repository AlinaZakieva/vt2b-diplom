function send_presentation() {
   let warn = document.getElementById('warning_send_presentation')
   let email = document.getElementById('email_to_presentation').value

   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   //var address = document.getElementById[email].value;
   if (reg.test(email) == false) {
       warn.innerHTML = "Введите верную почту"
   } else {
       jQuery.ajax({
           type: "POST",
           url: "vendor/send_mail_presentation.php",
           data: {
               email: email
           },
           dataType: "json",
           success: function(result) {
               console.log(result);
               if(result.success==true){
                   warn.innerHTML='Письмо отправлено(Проверьте "спам")'
               }
               else{
                   warn.innerHTML='Произошла ошибка'
               }
           },
           error: function(result) {
               console.log(result);
               console.log('error');
           }
       })
   }







}