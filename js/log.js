import { logForm, postLog } from "./modules/log-form.js";
// import getToken from "./modules/login.js";
$(() => {
    logForm();

    $('form').on('submit', function (e) {
        e.preventDefault();
        // console.log('click');
        let user = {};
        user.login = $('#login').val()
        user.password = $('#password').val()
        user = JSON.stringify(user);
        // запрос с данными формы
        $.ajax({
            type: "get",
            url: "./files-php/init/init-login.php",
            data: { user: user },
            // dataType: 'srting',
            success: function (response) {
                if (response) {
                    sessionStorage.setItem('userToken', response);
                    window.location.href = 'index.php';
                }
            },
            error: () => {
                console.log('nenorm')
            }
        });

        // postLog()
    });
})