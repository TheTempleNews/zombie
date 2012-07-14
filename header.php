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

		 <link href='http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700|Alegreya+SC:400,700,400italic|Open+Sans:300,400,700,600' rel='stylesheet' type='text/css'>
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->
		
	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="outer-header">

					<div class="wrap clearfix">
						
						<!-- DESKTOP-ONLY ADS -->
						<?php if ( !is_handheld() ) : ?>
						<div id="ad-topnavbar" class="ad ad-container twelvecol first last">

						    <!-- THIS IS AN ADVERTISEMENT FNORD -->

						           <!-- Leaderboard -->
							<div style="width: 728px; height: 90px; margin: auto;" id="div-gpt-ad-1334976460364-0">
								<script type="text/javascript">
									googletag.cmd.push(function() { googletag.display('div-gpt-ad-1334976460364-0'); });
								</script>
							<iframe width="728" scrolling="no" height="90" frameborder="0" id="google_ads_iframe_/4602070/Leaderboard_0" name="google_ads_iframe_/4602070/Leaderboard_0" marginwidth="0" marginheight="0" style="max-width: 100%; border: 0px none;"></iframe>
							<iframe width="0" scrolling="no" height="0" frameborder="0" id="google_ads_iframe_/4602070/Leaderboard_0__hidden__" name="google_ads_iframe_/4602070/Leaderboard_0__hidden__" marginwidth="0" marginheight="0" style="border: 0px none; visibility: hidden; display: none;"></iframe></div>

						      <p>ADVERTISEMENT</p>  

						</div> <!-- end #ad-topnavbar -->
						
						<?php endif; // end if is NOT handheld (desktop) ?>

						<div id="logo" class="fivecol">

							<a href="<?php echo home_url(); ?>" rel="nofollow"><img alt="The Temple News" title="The Temple News Home" src="<?php echo get_template_directory_uri(); ?>/library/images/logo-500.png" /></a>
							
							<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
							
							
							<!-- if you'd like to use the site description you can un-comment it below -->
							<?php // bloginfo('description'); ?>
							
						</div>

						<!-- menu button -->
						<div class="menu-button icon-reorder">
							MENU
						</div>

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
