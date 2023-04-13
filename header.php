<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
		<link rel="stylesheet" href="https://use.typekit.net/ohj5hav.css">
		<script src="https://kit.fontawesome.com/f65557eadf.js" crossorigin="anonymous"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQbHvpVKjrk5YF0nruF2MG3FcSxWZ4_Uk"></script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="site-wrap">
		<header id="header" role="banner"> 				
			<div class="wrapper">
				<div class="content-secondary">
					<ul>
						<?php 
							wp_nav_menu(
								array(
									'menu' 		 => 'secondary', 
									'menu_class' => 'secondary',
									'container'	 => false
								)
							); 
						?>
					</ul>
				</div>
				<div class="content-primary">
					<div class="logo">
						<a href="<?php echo get_site_url(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-white.png'?>">
						</a>
					</div>
					<ul class="nav">
						<?php 
							wp_nav_menu(
								array(
									'menu' 		 => 'primary', 
									'menu_class' => 'primary',
									'container'	 => false
								)
							); 
						?>
					</ul>
				</div>
			</div>
		</header>
				
		<script>
			jQuery(document).ready(function($){
				$(".secondary .login").mouseenter( function() {
					$(".secondary .login .sub-menu").show();
					$(".secondary .login .sub-menu").css("display", "grid");
					$(".primary .resources .sub-menu").hide();
				});
				$(".secondary .login").mouseleave( function() {
					$(".secondary .login .sub-menu").hide();
				});
				$(".primary .resources").mouseenter( function() {
					$(".primary .resources .sub-menu").show();
					$(".primary .resources .sub-menu").css("display", "grid");
					$(".secondary .login .sub-menu").hide();
				});
				$(".primary .resources").mouseleave( function() {
					$(".primary .resources .sub-menu").hide();
				});				
				$(".primary .providers").mouseenter( function() {
					$(".primary .providers .sub-menu").show();
					$(".primary .providers .sub-menu").css("display", "grid");
					$(".secondary .login .sub-menu").hide();
				});
				$(".primary .providers").mouseleave( function() {
					$(".primary .providers .sub-menu").hide();
				});
			});
		</script>
		
		<script>
			jQuery(document).ready(function($){
				var pathname = window.location.pathname;
				pathname = 'li.' + pathname.substring (1, (pathname.length-1));
				$(pathname).addClass("active");
			});
		</script>
		<style>		
			.show-nav-right .mobmenu-panel.show-panel {
				background: url("<?php echo site_url(); ?>/wp-content/uploads/2021/07/mobile-menu-bg.png") center center no-repeat;
				background-size:cover;
			}
		</style>	

		<main id="main" role="main">