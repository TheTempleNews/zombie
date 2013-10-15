<?php
/*
Template Name: Documentary
*/
?>

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

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Alegreya:400italic,400,700|Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header wrap" role="banner">

				<a href="<?php echo home_url(); ?>" rel="nofollow"><img id="logo" alt="The Temple News" title="The Temple News Home" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-500-emboss-tr.png" /></a>

				<h3>Documentaries</h3>

			</header> <!-- end header -->


			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title fittext" itemprop="headline"><?php the_title(); ?></h1>

								</header> <!-- end article header -->

								<section class="post-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->

							</article> <!-- end article -->

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e("Oops, Post Not Found!", "zombietheme"); ?></h1>
								</header>
								<section class="post-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "zombietheme"); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e("This is the error message in the page.php template.", "zombietheme"); ?></p>
								</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->


