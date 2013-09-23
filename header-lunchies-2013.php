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

			<header class="header" role="banner">

			</header> <!-- end header -->
