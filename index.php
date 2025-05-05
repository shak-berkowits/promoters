<?php
	session_start();
	include_once("./include/config/config.php");
	include_once("./include/config/constant.php");
	include_once("./include/functioins.php");
	//var_dump("promoter=".$_REQUEST['promoterpage']);
	//var_dump("adminpage=".$_REQUEST['adminpage']);
	//var_dump("page=".$_REQUEST['page']);
?>

<!doctype html>
<html lang="en">
<?php include_once("./include/components/head.inc.php"); ?>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPNRQKR"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- PRELOADER SPINNER
		============================================= -->
	<div id="loading" class="loading--theme">
		<div id="loading-center">
			<span class="loader"><span class="loader-inner"></span></span>
		</div>
	</div>
	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">
		<?php
		// include_once("./include/components/menu.inc.php");
		// if(isset($_REQUEST['page'])){
		// 	//include_once("./include/components/menu.inc.php");
		// }
		$excluded_pages = ['promoter/login', 'admin/login'];

		if (isset($_REQUEST['promoterpage']) && !empty($_REQUEST['promoterpage'])) {
			// Check if the page is an admin page but NOT 'admin/login'
			if ($_REQUEST['promoterpage'] !== 'login') {
				include_once("./include/components/menu.inc.php"); // Admin menu
			} 
		}
		if (isset($_REQUEST['adminpage']) && !empty($_REQUEST['adminpage'])) {
			// Check if the page is an admin page but NOT 'admin/login'
			if ($_REQUEST['adminpage'] !== 'login') {
				include_once("./include/components/admin-menu.inc.php"); // Admin menu
			} 
		}
		if (isset($_REQUEST['page']) AND !empty($_REQUEST['page'])) {
			// Check if the page is an admin page but NOT 'admin/login'
			if (strpos($_REQUEST['page'], 'admin/') === 0 && $_REQUEST['page'] !== 'admin/login') {
				include_once("./include/components/admin-menu.inc.php"); // Admin menu
			} elseif (!in_array($_REQUEST['page'], $excluded_pages)) {
				include_once("./include/components/menu.inc.php"); // Normal user menu
			}
		}


		?>

		<!--  Include VIEWS HERE
            ----------------------------------  -->
		<?php

		// if ($show_msg) {
		// 	echo "<section id='hero-20'><div class='container'><div class='alert alert-warning' role='alert'>
		// 			<i style='margin-right: 10px;font-size:x-large' class='fa fa-solid fa-check' aria-hidden='true'></i> SUCCESS : Thank you! We have received your request, we will contact you shortly!
		// 			</div></div></section>";
		// }

		if (isset($_REQUEST['page'])) {
			$pagename = $_REQUEST['page'];
			$pagetoload = "./include/views/" . $pagename . ".inc.php";
			include_once($pagetoload);
		} elseif (isset($_REQUEST['adminpage'])) {
			$pagetoload = "./include/views/admin/" . $pagename . ".inc.php";
			include_once($pagetoload);
		} elseif (isset($_REQUEST['promoterpage'])) {
			$pagetoload = "./include/views/promoter/" . $pagename . ".inc.php";
			include_once($pagetoload);
		} else {
			include_once("./include/views/promoter/login.inc.php");
		}
		include_once("./include/modals/request-form.inc.php");
		?>

	</div> <!-- END PAGE CONTENT -->
	<!-- EXTERNAL SCRIPTS
		============================================= -->
	<script src="path/to/cookies-message-plugin.js"></script>
	<script src="<?= BASE_URL ?>js/jquery-3.7.1.min.js"></script>
	<script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
	<script src="<?= BASE_URL ?>js/modernizr.custom.js"></script>
	<script src="<?= BASE_URL ?>js/jquery.easing.min.js"></script>
	<script src="<?= BASE_URL ?>js/jquery.appear.js"></script>
	<script src="<?= BASE_URL ?>js/menu.js"></script>
	<script src="<?= BASE_URL ?>js/tweenmax.min.js"></script>
	<script src="<?= BASE_URL ?>js/slideshow.js"></script>
	<script src="<?= BASE_URL ?>js/owl.carousel.min.js"></script>
	<script src="<?= BASE_URL ?>js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= BASE_URL ?>js/isotope.pkgd.min.js"></script>
	<script src="<?= BASE_URL ?>js/jquery.magnific-popup.min.js"></script>
	<!--<script src="js/request-form.js"></script>-->
	<script src="<?= BASE_URL ?>js/jquery.validate.min.js"></script>
	<script src="<?= BASE_URL ?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= BASE_URL ?>js/popper.min.js"></script>
	<script src="<?= BASE_URL ?>js/lunar.js"></script>
	<script src="<?= BASE_URL ?>js/wow.js"></script>
	<!--<script src="js/cookies-message.js"></script>-->
	<!-- Custom Script -->
	<script src="<?= BASE_URL ?>js/custom.js"></script>
	<script>
		$('div.check-remaind.required :checkbox:checked').length > 0

		function validateLandingForm() {
			// validate location selection
			var text = '';
			text = $("#centre").find(":selected").val();
			//alert(text);
			if (text == 'LocationNotSelected') alert("ERROR: Select location");

		}
	</script>
	<!-- COOKIES MESSAGE -->
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				$.CookiesMessage();
			}, 1800)
		});
	</script>
</body>

</html>