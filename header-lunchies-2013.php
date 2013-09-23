<!doctype html>

<!--[if IEMobile 7]><html <?php language_attributes(); ?> class="no-js iem7"><![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><html <?php language_attributes(); ?> class="no-js"><![endif]-->
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 oldie"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html <?php language_attributes(); ?> class="no-js"><![endif]-->

	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Google Fonts -->
		<!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Alegreya:400italic,400,700|Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'> -->

		<!-- Typekit -->
		<script type="text/javascript" src="//use.typekit.net/qno7mfo.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
			<!-- or use Yoast's Google Analytics for WordPress plugin @ http://yoast.com/wordpress/google-analytics/ -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container" class="container">

			<header class="page-header" role="banner">

				<div class="page-header__brand">
					<h1 class="page-header__brand__title">Lunchies 2013</h1>

					<div class="page-header__brand__presents">
						<h2>The Temple News Presents</h2>
					</div>

					<div class="page-header__brand__image">

					</div>
				</div>


				<nav class="lunchies-nav">
					<ul class="lunchies-nav__main-nav">
						<li class="lunchies-nav__main-nav__item"><a href="<?php home_url(); ?>">Home</a></li>
						<li class="lunchies-nav__main-nav__item"><a href="#toc">Table of Contents</a></li>
						<li class="lunchies-nav__main-nav__item"><a href="#about">About</a></li>
						<li class="lunchies-nav__main-nav__item"><a href="#colophon">Colophon</a></li>
					</ul>
					<ul class="lunchies-nav__secondary-nav">
						<li class="lunchies-nav__secondary-nav__item"><a href="#about">About</a></li>
						<li class="lunchies-nav__secondary-nav__item"><a href="#toc">Table of Contents</a></li>
					</ul>
					<ul class="lunchies-nav__to-top">
						<li><a href="#top">To Top</a></li>
					</ul>
				</nav>

			</header> <!-- end header -->
