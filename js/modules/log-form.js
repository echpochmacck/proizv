function logForm() {
    // sessionStorage.setItem("key", "asASsawew");
   const  form = `    <div class="row d-flex contact-info">
        <div class="col-md-12 mb-1">
            <h2 class="h3">Авторизация</h2>
        </div>
    </div>
    <div class="row block-9">
        <div class="col-lg-6 d-flex">
            <form action="" class="bg-light p-5 contact-form">
                <div class="form-group">
                    <input type="text" class="form-control is-invalid" placeholder="Your Login" id="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control is-invalid" placeholder="Password" id="password">
                    <div class="invalid-feedback">
                        
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Вход" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>
    </div>`;
    $('.container').append(form);
    
}

function postLog(){
    
        e.preventDefault();
        const data = new FormData(login)
        console.log(data);
        // $.ajax({
        //     type: "GET",
        //     url: "../files-php/init/init-login.php",
        //     data: data,
        //     dataType: "json",
        //     success: function (response) {
                
        //     }
        // });
        
    };


export {logForm, postLog};