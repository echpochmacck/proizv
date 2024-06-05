<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-temp-block.php';
// var_dump($user);die;
echo $menu->writeHtml(); ?>
<div id="colorlib-main">
    <section class="contact-section px-md-2  pt-5">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-12 mb-1">
                    <h2 class="h3">Временная блокировка пользователя</h2>
                    <div>
                        Пользователь: <?=$user->request->get('loogin')?>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-lg-6 d-flex">
                    <form action="#" class="bg-light p-5 contact-form" method="POST">
                        <div class="form-group">
                            <label for="date-block">Дата временной блокировки</label>
                            <input type="text" class="form-control" id="date-block" name="date_block" value="" required>
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

<!-- loader -->
<?php require_once './files-php/parts/preloader.php' ?>
<?php require_once './files-php/parts/scripts.php' ?>
<script src="css/moment.min.js"></script>
<script src="css/daterangepicker.js"></script>
<script>
$(document).ready(function() {
    $(function() {
        $('#date-block').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePicker24Hour: true,
            minYear: 2023,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'DD.MM.YYYY HH:mm'
            }
        });
    });
})
$('#date-block').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD.MM.YYYY HH:mm'))
});
</script>
<?php require_once './files-php/parts/preloader.php' ?>
<?php require_once './files-php/parts/end.php' ?>