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
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Alegreya:400italic,400,700|Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>

		<!-- Typekit -->
		<script type="text/javascript" src="//use.typekit.net/qno7mfo.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

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
			googletag.defineSlot('/4602070/NSSideBarMidBox', [300, 250], 'div-gpt-ad-1342714724220-3').addService(googletag.pubads());
			googletag.defineSlot('/4602070/NSSideBarMidBox', [300, 250], 'div-gpt-ad-1344368320426-0').addService(googletag.pubads());
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
		<header class="site-header" role="banner">

			<div class="site-header__leaderboard  wrap">
				<!-- DESKTOP-ONLY ADS -->
				<?php if ( !is_handheld() ) : ?>
					<div class="ad--leaderboard  ad">
						<!-- THIS IS AN ADVERTISEMENT FNORD -->
						<!-- NSLeaderboard -->
						<div id='div-gpt-ad-1342714724220-0' style='width:728px; height:90px; margin:0px auto;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-0'); });
						</script>
						</div>

						<!-- <p>ADVERTISEMENT</p> -->
					</div>
				<?php endif; // end if is NOT handheld (desktop) ?>
			</div>

			<div class="site-header__branding">
				<div class="wrap">
					<div class="inner">

						<a href="<?php echo home_url(); ?>" class="site-header__branding__logo  logo"  rel="nofollow">
							<img alt="The Temple News" title="The Temple News" src="<?php echo get_template_directory_uri(); ?>/library/images/logo-500-emboss-tr.png" />
						</a><!--

						--><div class="site-header__branding__social">
							<div class="inner">
								<a class="icon-facebook  social-icon-large" href="https://www.facebook.com/thetemplenews" title="The Temple News on Facebook"></a>
								<a class="icon-twitter  social-icon-large" href="https://twitter.com/thetemplenews" title="The Temple News on Twitter"></a>
								<a class="icon-rss  social-icon-large" href="<?php bloginfo('rss2_url'); ?>" title="The Temple News RSS feed"></a>
							</div>

							<p class="site-header__branding__social__tagline  tagline"><?php bloginfo('description'); ?></p>
						</div><!--

						--><!-- <div class="menu-toggle icon-reorder">
							<span>MENU</span>
						</div> --><!--

						--><div class="site-header__branding__search">
							<?php get_search_form( true ); ?>
						</div>

					</div> <!-- end .site-header__branding -->

				</div><!-- end .site-header__branding .wrap -->

			</div><!-- end .site-header__branding -->

			<hr class="rule  rule--site  brand-color" />

			<nav class="site-nav" role="navigation">
				<div class="inner  wrap">
					<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
				</div>
			</nav>

			</div> <!-- end #inner-header -->

		</header> <!-- end header -->
