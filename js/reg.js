import regForm from "./modules/reg-form.js"

$(()=>{
    regForm();
    $('form').on('submit', function (e) {
        e.preventDefault();
         const formData = new FormData($('form')[0]);
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "./files-php/php-parts/register-form.php", 
            processData: false,
            contentType: false,
            data: formData,
            success: (response) => {
                const obj = $.parseJSON(response);
                if (obj.token) {
                    sessionStorage.setItem('userToken', obj.token);
                    window.location.href = 'index.php';
                } else if(obj.errors) {
                    const errors = obj.errors;
                    $($('form')[0]).find(':input').each(function (key, value) { 
                        console.log(value);
                        // console.log($(value).attr('name')+'Message');
                        if (errors[$(value).attr('name')+'Message']) {
                            console.log(true);
                            const div = `	<div class="invalid-feedback">
								${errors[$(value).attr('name')+'Message']}
							</div>`
                            $(value).next('.invalid-feedback').remove();
                            $(value).after(div);

                        }  
                    });
                }
            },
            error:  () => {
                console.log('не норм')
            }
        });
    });
})