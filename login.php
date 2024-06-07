<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-login.php';
echo $menu->writeHtml($user);?>
<div id="colorlib-main">
	<section class="contact-section px-md-2  pt-5">
		<!-- container -->
		 <div class="container"></div>
	</section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<?php require_once './files-php/parts/preloader.php' ?>
<?php require_once './files-php/parts/scripts.php' ?>
<script type="module" src="js/log.js"></script>
<?php require_once './files-php/parts/end.php'  ?>