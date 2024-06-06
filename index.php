<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-index.php';
// var_dump($user);die;
echo $menu->writeHtml($user);

?>
<div id="colorlib-main">
    <section class="ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-2">
                    <div class="row pt-md-4"></div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->


<!-- loader -->
<script type="module" src="js/mainScript.js"></script>
<?php require_once('./files-php/parts/preloader.php') ?>
<?php require_once('./files-php/parts/scripts.php') ?>

<?php require_once('./files-php/parts/end.php') ?>