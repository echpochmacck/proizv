import {logForm} from "./modules/log-form.js";
// import getToken from "./modules/login.js";
$(() => {

    logForm();

    $('form').on('submit', function (e) {
        e.preventDefault();
        // получение данных с формы
        let  formData = $('form')[0];
        formData =  new FormData(formData);
        formData = Object.fromEntries(formData);
        // перевод в json
        formData = JSON.stringify(formData);
        console.log(formData);
        // запрос
        $.ajax({
            type: "POST",
            url: "./files-php/php-parts/log.php",
            data:  formData,
            // contentType: "application/json",
            // dataType: "json",
            success: function (response) {
                    const obj = ($.parseJSON(response));
                    if (obj.token) {
                    sessionStorage.setItem('userToken', obj.token);
                    window.location.href = 'index.php';
                    } else {
                        $('.invalid-feedback').text(obj.error);
                    }
            },
            error: () => {
                console.log('nenorm')
            }
        });
    });
})