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

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">

		<!-- Pixeden Social Icon Font Set -->
		<!--Not on CDN o avoid CROS-->
		<link href="http://temple-news.com/css/pe-icon-social/css/pe-icon-social.css" media="all" rel="stylesheet" type="text/css">
		<!-- Optional - Adds useful class to manipulate icon font display and social color style -->
		<link href="http://temple-news.com/css/pe-icon-social/css/helper.css" media="all" rel="stylesheet" type="text/css">
		<link href="http://temple-news.com/css/pe-icon-social/css/social-style.css" media="all" rel="stylesheet" type="text/css">

		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Alegreya:400italic,400,700|Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>

		<!-- Typekit -->
		<script type="text/javascript" src="//use.typekit.net/qno7mfo.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<?php if (BASKETBALL_PREVIEW_2013 && HOME_TOP_PROMO) : ?>
			<script type="text/javascript" src="//use.typekit.net/zvl7ftj.js"></script>
			<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php endif; ?>

		<?php if (THE_OWLERY_BANNER && HOME_TOP_PROMO) : ?>
			<link href='http://fonts.googleapis.com/css?family=Vidaloka' rel='stylesheet' type='text/css'>
		<?php endif; ?>

		<?php
		// Load font Source Sans Pro 900 on Movers & Shakers page
		if ( is_page('movers-shakers') ) : ?>
			<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:900' rel='stylesheet' type='text/css'>
		<?php endif; ?>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<meta name="google-site-verification" content="ZnmdPLNGk7fPoSfVoEufiCekUIyd7_2nqvYTpsxQVj0" />
		<!-- advertisement fnord -->
		<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
		var gads = document.createElement('script');
		gads.async = true;
		gads.type = 'text/javascript';
		var useSSL = 'https:' == document.location.protocol;
		gads.src = (useSSL ? 'https:' : 'http:') +
		'//www.googletagservices.com/tag/js/gpt.js';
		var node = document.getElementsByTagName('script')[0];
		node.parentNode.insertBefore(gads, node);
		})();
		</script>

		<script type='text/javascript'>
		googletag.cmd.push(function() {
			googletag.defineSlot('/4602070/NSLeaderboard', [728, 90], 'div-gpt-ad-1342714724220-0').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSNewsBoxL', [300, 250], 'div-gpt-ad-1342714724220-1').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSOpinionBar', [728, 90], 'div-gpt-ad-1342714724220-2').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSSideBarMidBox', [300, 250], 'div-gpt-ad-1394035111008-0').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSSideBarMidTower', [300, 600], 'div-gpt-ad-1394035111008-1').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSSportsBoxR', [300, 250], 'div-gpt-ad-1342714724220-5').addService(googletag.pubads());
			googletag.defineSlot('/4602070/HalfPage', [300, 600], 'div-gpt-ad-1366661404407-0').addService(googletag.pubads());

			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
		});
		</script>
		<!-- end advertisement -->

		<!-- drop Google Analytics Here -->
			<!-- or use Yoast's Google Analytics for WordPress plugin @ http://yoast.com/wordpress/google-analytics/ -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="outer-header">

					<div class="wrap clearfix">

						<!-- DESKTOP-ONLY ADS -->
						<?php if ( function_exists( 'is_handheld' ) && !is_handheld() ) : ?>
						<div id="ad-topnavbar" class="ad">

						<!-- THIS IS AN ADVERTISEMENT FNORD -->
						<!-- NSLeaderboard -->
						<div id='div-gpt-ad-1342714724220-0' style='width:728px; height:90px; margin:0px auto;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-0'); });
						</script>
						</div>

						<!-- <p>ADVERTISEMENT</p> -->

						</div> <!-- end #ad-topnavbar -->

						<?php endif; // end if is NOT handheld (desktop) ?>

						<div id="top-header">
							<a href="<?php echo home_url(); ?>" rel="nofollow"><img id="logo" alt="The Temple News" title="The Temple News Home" src="<?php echo get_template_directory_uri(); ?>/library/images/logo-500-emboss-tr.png" /></a>
							<div id="tagline-social-container">
								<div class="header-social clearfix">									
									<a class="social-icon-large" target="_blank" href="https://www.facebook.com/thetemplenews" title="The Temple News on Facebook"><i class="pe-so-facebook pe-hover"></i></a>
									<a class="social-icon-large" target="_blank" href="https://www.twitter.com/thetemplenews" title="The Temple News on Twitter"><i class="pe-so-twitter pe-hover"></i></a>
									<a class="social-icon-large" target="_blank" href="https://www.instagram.com/templenews" tittle="The Temple News on Instagram"><i class="pe-so-instagram pe-hover"></i></a>
									<a class="social-icon-large" target="_blank" href="<?php bloginfo('rss2_url'); ?>" title="The Temple News RSS feed"><i class="pe-so-rss pe-hover"></i></a>
								</div>
								<!-- if you'd like to use the site description you can un-comment it below -->
								<span id="site-tagline"><?php bloginfo('description');?></span>
							</div>
							<!-- menu button -->
							<div class="menu-button icon-reorder last">
								MENU
							</div>
							<?php echo bones_wpsearch(); ?>
						</div> <!-- end #top-header -->
					</div><!-- end #outer-header .wrap -->
				</div><!-- end #outer-header -->
				<div class="outer-line"></div>
				<div id="inner-header" class="wrap clearfix">
					<nav role="navigation">
						<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					<?php // get_search_form(); ?>
				</div> <!-- end #inner-header -->
			</header> <!-- end header -->
