<div id="colorlib-main">
    <section class="contact-section px-md-2  pt-5">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-12 mb-1">
                    <h2 class="h3"> блокировка пользователя</h2>
                    <div>
                        Пользователь: <?=$user->request->get('loogin')?>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-lg-6 d-flex">
                    <form action="#" class="bg-light p-5 contact-form" method="POST">
                        <div class="form-group">
                            <label for="date-block">Причина блокировки</label>
                            <input type="text" class="form-control" id="date-block" name="couse" value="" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Блокировать" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->