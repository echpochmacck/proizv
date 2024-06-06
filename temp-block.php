<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-temp-block.php';
// var_dump($user);die;
echo $menu->writeHtml($user); ?>


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