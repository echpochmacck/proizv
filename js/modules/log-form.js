function logForm() {
    // sessionStorage.setItem("key", "asASsawew");
   const  form = `    <div class="row d-flex contact-info">
        <div class="col-md-12 mb-1">
            <h2 class="h3">Авторизация</h2>
        </div>
    </div>
    <div class="row block-9">
        <div class="col-lg-6 d-flex">
            <form action="" class="bg-light p-5 contact-form" id ="form" method="POST" >
                <div class="form-group">
                    <input type="text" class="form-control is-invalid" placeholder="Your Login" id="login" name="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control is-invalid" placeholder="Password" id="password" name="password">
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




export {logForm};