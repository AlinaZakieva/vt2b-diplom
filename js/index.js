const inputANode = document.querySelector('.js-input-a');
const inputBNode = document.querySelector('.js-input-b');
const btnResultNode = document.querySelector('.js-btn-result');
const outputNode = document.querySelector('.js-output');

function calc() {
    const a = Number(inputANode.value);
    const b = Number(inputBNode.value);

    let c = b * 2;
    let d = a * 5;

    if (document.getElementById('session-yes').checked) {
        e = 3;
    }
    else if (document.getElementById('session-no').checked) {
        e = 0;
    }
    if (document.getElementById('planning-yes').checked) {
        f = a * 0.5;
        g = a * f;
    }
    else if (document.getElementById('planning-no').checked) {
        g = 0;
    }
    if (document.getElementById('instructions-yes').checked) {
        h = b * 1.2;
    }
    else if (document.getElementById('planning-no').checked) {
        h = 0;
    }

    result = (c + d + e + g + h) * 2500;
    return result;
}

btnResultNode.addEventListener('click', function () {
    outputNode.innerHTML = calc()
    outputNode.innerHTML += " Р."
});

$("#preproject_form").submit(function (evt) {

    evt.preventDefault();
    var formData = new FormData($(this)[0]);



    $.ajax({
        url: 'vendor/add_preproject_in_CRM.php',
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success: function (response) {
            document.getElementById('warning_preproject').textContent = "Ожидайте звонка от менеджера, он скоро вам позвонит."

        }, 
        error: function (result) {
            document.getElementById('warning_preproject').textContent = "Ошибка отправки."

        }
    });

    return false;

});

function send_preproject_srm() {
    let name = document.getElementById('name_org_project').value,
        contact = document.getElementById('contact_org_project').value,
        descr = document.getElementById('descr_project').value
    let temp_phone = document.getElementById('phone_project').value.replace(/\s+/g, '').replace(/\+/g, '').replace(/[\(\)\+]/g, '');
    var files; // переменная. будет содержать данные файлов

    // заполняем переменную данными, при изменении значения поля file 
    $('input[type=file]').on('change', function () {
        files = this.files;
    });
    var file_data = $('#file-input').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    console.log(form_data);



    // if (name == '' || contact == '' || temp_phone == '' || descr == ''  || temp_phone.length < 11) {
    //     document.getElementById('warning_preproject').textContent = 'Заполните все поля верно'

    // } else {
    //     jQuery.ajax({
    //         type: "POST",
    //         url: "vendor/add_preproject_in_CRM.php",
    //         data: {
    //             file: formData,
    //             name: name,
    //             contact: contact,
    //             descr: descr,
    //             phone: temp_phone
    //         },
    //         dataType: "json",
    //         processData: false,
    //         contentType: false,
    //         success: function (result) {
    //             console.log(result);
    //             let temp_res = toString(result)
    //             if (result.result == "okey") {

    //                 document.getElementById('warning_preproject').textContent = 'В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.'

    //             }
    //             else {
    //                 document.getElementById('warning_preproject').textContent = 'Произошла ошибка, повторите попытку позже или свяжитесь с нами по телефону: +7 3532 48 50 11'

    //             }
    //         },
    //         error: function (result) {
    //             console.log(result);
    //             console.log('error');
    //         }
    //     })
    // }


}


function send_calc_crm() {
    let count_process = document.getElementById('count_process').value,
        count_departaments = document.getElementById('count_departaments').value,
        count_staff = document.getElementById('count_staff').value,
        count_interv = document.getElementById('count_interv').value
    let session_answer = true,
        planning_answer = true,
        instructions_answer = true
    let price = calc()
    let temp_phone = document.getElementById('phone_calc').value.replace(/\s+/g, '').replace(/\+/g, '').replace(/[\(\)\+]/g, '');
    let mail = document.getElementById('mail_calc').value

    if (!document.getElementById('session-yes').checked) {
        session_answer = false
    }
    if (!document.getElementById('planning-yes').checked) {
        planning_answer = false
    }
    if (!document.getElementById('instructions-yes').checked) {
        instructions_answer = false
    }

    if (count_process == "" || count_departaments == "" || count_staff == "" || count_interv == "" || count_process < 1 || count_departaments < 1 || count_staff < 1 || count_interv < 1) {
        document.getElementById('warning_calc').textContent = 'Заполните все поля верно'
        console.log('cp= ', count_process, "cd= ", count_departaments, "cs= ", count_staff, "ci= ", count_interv);
    } else {
        jQuery.ajax({
            type: "POST",
            url: "vendor/add_calc_in_CRM.php",
            data: {
                count_process: count_process,
                count_departaments: count_departaments,
                count_staff: count_staff,
                count_interv: count_interv,
                session_answer: session_answer,
                planning_answer: planning_answer,
                instructions_answer: instructions_answer,
                price: price,
                phone: temp_phone,
                mail: mail
            },
            dataType: "json",
            success: function (result) {
                console.log(result);
                let temp_res = toString(result)
                if (result == "okey") {

                    document.getElementById('warning_calc').textContent = 'В скором времени с вами свяжется наш оператор для уточнения деталей, будьте на связи, команда vt2b.'

                }
                else {
                    document.getElementById('warning_calc').textContent = 'Произошла ошибка, повторите попытку позже или свяжитесь с нами по телефону: +7 3532 48 50 11'

                }
            },
            error: function (result) {
                console.log(result);
                console.log('error');
            }
        })
    }


}