var form = document.getElementById("form")

form.addEventListener("submit", function check_regisrt(event) {
	document.getElementById("attemption").style.display = "none"

   event.preventDefault();

	var select_prof =document.getElementById("select_prof")

	var profession_id
	for(var i = 0; i< select_prof.options.length;i++){
		var option = select_prof.options[i]
		if(option.selected){
			profession_id=option.value
		}
	}

	if (profession_id == "" || document.getElementById("name").value == "" || document.getElementById("surname").value == "" || document.getElementById("email").value == "" || document.getElementById("password").value == "") {
		document.getElementById("attemption").style.display = "block"

		return false
   }
	else{
		var re = /^[\w]{1}[\w-\.]*@[\w-]+\.[a-z]{2,4}$/i;
		var valid = re.test(document.getElementById("email").value)
		if (!valid) {
			document.getElementById("email").style.boxShadow = "0px 0px 26px 9px rgba(255, 0, 34, 0.3) inset"
			return false
		}
		else{
			if (document.getElementById("password").value.length < 7) {
				document.getElementById("password").style.boxShadow = "0px 0px 26px 9px rgba(255, 0, 34, 0.3) inset"
				return false
			}
			else{
				var email = document.getElementById("email").value
				var password = document.getElementById("password").value

				jQuery.ajax({
					type: "POST",
					url: "../vendor/signup.php",
					data: {
						name: document.getElementById("name").value,
						surname: document.getElementById("surname").value,
						password: password,
						email: email,
						profession_user: profession_id
					},
					dataType: "json",
					// cache: false,
					success: function (result) {
						var error = String(result)
						console.log(result);
						if (error === "0") {
							console.log("registration okey");

							document.location.href = "courses.php";
						}
						if (error === "1") {
							document.getElementById("email").style.boxShadow = "0px 0px 26px 9px rgba(255, 0, 34, 0.3) inset"
						}
						if (error === "2") {
							document.getElementById("email").style.boxShadow = "0px 0px 26px 9px rgba(255, 0, 34, 0.3) inset"
						}
						if (error === "4") {
							console.log("ошибка вставки в бд");
						}
						if (error === "5") {
							console.log("ошибка в поиске");
						}
						if (error === "6") {
							console.log("добавление ошибка");
						}

					},
					error: function (result) {
						console.log(result);
					}
				})
			}
		}


	}

})







