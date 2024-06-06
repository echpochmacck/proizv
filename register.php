<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-register.php';

echo $menu->writeHtml($user);?>
<div id="colorlib-main">
	<section class="contact-section px-md-2 pt-5">
		<!-- container -->
	</section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<?php require_once './files-php/parts/preloader.php' ?>
<?php require_once './files-php/parts/scripts.php' ?>
<script>
	$(document).ready(function() {
		$('#rules').click(function(e) {
			$(this).toggleClass('is-invalid');
			$(this).toggleClass('is-valid');
			$('#rulesFeedback').toggleClass('d-none');
		})
	})
</script>
<?php require_once './files-php/parts/end.php';?>