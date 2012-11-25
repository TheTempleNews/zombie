<?php get_header(); ?>
			
	<div id="content" class="<?php if (HOME_TOP_PROMO == true) { echo 'has-banner'; } ?>">
	
		<div id="inner-content" class="wrap clearfix">
			
			
			<?php if (HOME_TOP_PROMO == true) {
				
				echo '<div class="home-top-promo">';
				
				if (NEW_LUNCHIES == true) { ?>
					<a href="http://temple-news.com/lunchies/" title="Lunchies <?php echo LUNCHIES_YEAR; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/lunchies/lunchies-banner-<?php echo LUNCHIES_YEAR; ?>.png" alt="Lunchies <?php echo LUNCHIES_YEAR; ?>" /></a>
				<?php } // end lunchies banner
				
				if (ELECTION_ISSUE == true) { ?>
					<?php
					$banner = wp_get_attachment_image_src( get_post_thumbnail_id(38224), 'zom-full-banner' );
					$banner_url = $banner['0'];
					?>
					
					<a href="http://temple-news.com/election/" title="Election Issue"><img src="<?php echo $banner_url ?>" class="si-banner" /></a>
				<?php } // end election banner
				
				echo '</div>';
				
			} // end top promo?>
			
			
			<div class="three-column-container clearfix">
			
			
			
			
			
			
				<div id="column-center" class="fourcol clearfix column push_four">
				
					<div id="column-center-inner" class="column-inner">
					
						
						
						<!-- FEATURED CONTENT -->
						<section id="section-box-featured-content" class="section-box section-box-featured clearfix">

							<h2 class="section-box-featured-title section-box-title">Featured Content</h2>

								<!-- featured content stuff goes here -->
								<?php
								if (function_exists('ttx_slider') ) {
									ttx_slider();
								} ?>
								
						</section> <!-- end #section-box-featured -->
						
						
						
						<!-- FEATURED MULTIMEDIA -->
						<section id="section-box-featured-multimedia" class="section-box section-box-featured clearfix">
							<h2 class="section-box-featured-title section-box-title">Featured Multimedia</h2>
						
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'top-multimedia-article clearfix' ); ?> role="article">

											<?php
											$featured_video = new WP_Query( array(
													'cat' => 3,
													'post_type' => 'multimedia',
													'posts_per_page' => 1
												)
											);
											
											if ($featured_video->have_posts()) : while ($featured_video->have_posts()) : $featured_video->the_post();
											
												// http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/				
												// Get the video URL and put it in the $video variable
												$videoID = get_post_meta($post->ID, 'video_link', true);
												// Check if there is in fact a video URL
												if ($videoID) {
													echo '<div class="video-container clearfix">';
													// Echo the embed code via oEmbed
													echo wp_oembed_get( $videoID ); 
													echo '</div>';
												}
												
											echo '<h1 class="headline">' . '<a href="' . get_post_permalink() . '" rel="bookmark" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</a></h1>';
											
											endwhile; endif; wp_reset_postdata();
											?>
	
										</article> <!-- end article -->
						
						</section> <!-- end #section-box-multimedia -->
				
				
						
						<!-- FEATURED SLIDESHOW -->
						<section id="section-box-featured-slideshow" class="section-box section-box-featured clearfix">
							<h2 class="section-box-featured-title section-box-title">Featured Slideshow</h2>
						
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'top-slideshow-article clearfix' ); ?> role="article">
								
											<?php
											$featured_slideshow = new WP_Query( array(
													'cat' => 3,
													'post_type' => 'slideshow',
													'posts_per_page' => 1
												)
											);
											
											if ($featured_slideshow->have_posts()) : while ($featured_slideshow->have_posts()) : $featured_slideshow->the_post();
											?>
											
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php
												
												the_post_thumbnail('zom-landscape-576');
												
												/*  Temporarily disable WooSlider until sporadic display issues resolved
												wooslider( array(
												 	'slider_type'         => 'attachments-hoz',
												 	'smoothheight'        => true,
												 	'animation_loop'      => true,
												 	'control_nav'         => false,
												 	'direction_nav'       => false,
												 	'size'                => 'zom-landscape-576',
												 	'slideshow_speed'     => 2,
												 	'animation_duration'  => 1
												 ));
												*/
												?>
											</a>
											
											<?php echo '<h1 class="headline">' . '<a href="' . get_post_permalink() . '" rel="bookmark" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</a></h1>'; ?>
											
											
											<?php endwhile; endif; wp_reset_postdata(); ?>
	
								</article> <!-- end article -->
						
						</section> <!-- end #section-box-featured-slideshow -->
						
						
						
						<?php /*
						<!-- PRINT EDITION -->
						<section id="section-box-print" class="section-box section-box-featured clearfix">
							
							<h2 class="section-box-featured-title section-box-title">Print Edition</h2>

								<?php
								$print_thumb = new WP_Query('post_type=print_edition&posts_per_page=1');
								if ($print_thumb->have_posts()) : while ($print_thumb->have_posts()) : $print_thumb->the_post();
								?>

									<a href="<?php get_site_url(); ?>/print" title="The Temple News Print Edition" alt="Link to The Temple News print archives"><?php the_post_thumbnail('ttn-print-thumb'); ?></a>
							
								<?php endwhile; endif; wp_reset_postdata(); ?>
							
						</section> <!-- end #section-box-print -->
						*/ ?>
						
						
						
						<div id="widgetized-front-center" class="clearfix" role="complementary">
    
						<?php get_sidebar('home'); // front and center sidebar ?>
					
						</div>
					
					
					
					</div> <!-- end column-center-inner -->
				
				</div> <!-- end column-center -->
				
				
				
				
			
			
				<div id="column-left" class="fourcol first clearfix column pull_eight">
				
					<div id="column-left-inner" class="column-inner">
					
					
					
						<!-- NEWS SECTION -->
						<section id="section-box-news" class="section-container section-box clearfix">
								
								<?php the_zombie_loop('news'); ?>

								<div id="broadcecil-feed" class="ttn-network-feed">
									<h3 class="broadcecil-feed-title network-feed-title">Broad &amp; Cecil</h3>
									<h4 class="broadandcecil-feed-subtitle network-feed-subtitle">The news blog of The Temple News</h4>

									<?php ttn_network_feed('broadandcecil'); ?>

								</div> <!-- end #broadcecil-feed -->
								
								<!--
								<div id="broadcecilad-main" class="broadcecilad ttn-network-banner">
									<a href="http://broadandcecil.temple-news.com/" title="Broad &amp; Cecil News Blog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/broadcecil-logo-crop.png" alt="broadcecil-logo" /></a>
								</div>
								-->
								
						</section> <!-- end #section-box-news -->
						
						
						
						<!-- DESKTOP-ONLY ADS -->
						<?php if ( !is_handheld() ) : ?>
						<div class="ad-container rectangle-ad-container clearfix">
							<div class="ad rectangle-ad adsense">
								
								<!-- NSSportsBoxR -->
								<div id='div-gpt-ad-1342714724220-5' style='width:300px; height:250px; margin:0 auto;'>
								<script type='text/javascript'>
								googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-5'); });
								</script>
								</div>
								
							</div>
							
						</div>
						<?php endif; ?>
						
						
						
						<!-- LIVING SECTION -->
						<section id="section-box-living" class="section-container section-box clearfix">
							
							<?php the_zombie_loop('living'); ?>
							
						</section> <!-- end #section-box-living -->
					
					
					
					</div> <!-- end column-left-inner -->
				
				</div> <!-- end column-left -->
				
				
				
				
				

				
				<div id="column-right" class="fourcol last clearfix column">
				
					<div id="column-right-inner" class="column-inner">

					
					
					
						<!-- SPORTS SECTION -->
						<section id="section-box-sports" class="section-container section-box clearfix">
							
								<?php the_zombie_loop('sports'); ?>

								<div id="thecherry-feed" class="ttn-network-feed">
									<h3 class="thecherry-feed-title network-feed-title">The Cherry</h3>
									<h4 class="thecherry-feed-subtitle network-feed-subtitle">The sports blog of The Temple News</h4>

									<?php ttn_network_feed('thecherry'); ?>

								</div> <!-- end #thecherry-feed -->								
								
								<!--
								<div id="thecherryad-main" class="thecherryad ttn-network-banner">
									<a href="http://thecherry.temple-news.com/" title="The Cherry Sports Blog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/thecherry-logo-crop.png" alt="thecherry-logo" /></a>
								</div>
								-->
								
						</section> <!-- end #section-box-sports -->
						
						
						
						<!-- DESKTOP-ONLY ADS -->
						<?php if ( !is_handheld() ) : ?>
						<div class="ad-container rectangle-ad-container clearfix">
							<div class="ad adsense rectangle-ad">
								
								<!-- NSNewsBoxL -->
								<div id='div-gpt-ad-1342714724220-1' style='width:300px; height:250px; margin:0 auto;'>
								<script type='text/javascript'>
								googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-1'); });
								</script>
								</div>	

							</div>
							
						</div>
						<?php endif; ?>
							
							
							
						<!-- A&E SECTION -->
						<section id="section-box-ae" class="section-container section-box clearfix">
							
							<?php the_zombie_loop('ae'); ?>
							
						</section> <!-- end #section-box-ae -->
					
					
					
					</div> <!-- end column-right-inner -->
				
				</div> <!-- column-right -->
		
			</div> <!-- end .three-column-container -->



			<!-- DESKTOP-ONLY ADS -->
			<?php if ( !is_handheld() ) : ?>
			<div class="ad-container twelvecol first last clearfix">
				<div class="advert banner-ad">
				
				<!-- NSOpinionBar -->
				<div id='div-gpt-ad-1342714724220-2' style='width:728px; height:90px; margin:0 auto;'>
				<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-2'); });
				</script>
				</div>
				
				</div>
			</div>
			<?php endif; ?>
			
			
			
			<!-- OPINION SECTION -->
			<section id="section-box-opinion" class="section-container section-box twelvecol first last clearfix">
				
				<?php the_zombie_loop( 'opinion', 6 ); ?>
				
			</section> <!-- end #section-box-opinion -->



			<!-- MULTIMEDIA SECTION -->
			<section id="section-box-multimedia" class="section-box section-container twelvecol first last clearfix">
				<h2 class="section-box-title"><a href="<?php get_site_url(); ?>/multimedia/">Multimedia</a></h2>
			
					
					<?php // no reason to change this stuff
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$top_article_class = 'top-' . $post_type;
					
					// set class to first or last depending on position in n column layout where number of keys == n
					// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
					$style_classes = array('first', '', '', 'last');
					$styles_count = count($style_classes);
					$style_index = 0;
					
					// sets up counter to display first post differently (see TOP ARTICLE)
					$firstpost = 'firstpost'; 
					
					$multimedia_query = new WP_Query( array(
						'post_type'     => 'multimedia',
						'posts_per_page' => 5
						)
					);
					
					?>
				
					
					<div id="multimedia-mgallery" class="mgallery twelvecol first last clearfix">
					
						<div class="multimedia-mgallery-top fourcol first clearfix">
				
							<?php // begin the loop, generated by the gd cpt plugin
							if ( $multimedia_query->have_posts() ) : while ( $multimedia_query->have_posts() ) : $multimedia_query->the_post();
						
							if ( $firstpost == 'firstpost' ) { ?>
					
								<?php $firstpost = ''; ?>
					
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'twelvecol first last clearfix' ); ?> role="article">
									
									<?php
									// http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/				
									// Get the video URL and put it in the $video variable
									$videoID = get_post_meta($post->ID, 'video_link', true);
									// Check if there is in fact a video URL
									if ($videoID) {
										echo '<div class="video-container clearfix">';
										// Echo the embed code via oEmbed
										echo wp_oembed_get( $videoID ); 
										echo '</div>';
									} ?>

									<header class="clearfix">
										<!-- <div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div> -->
										<h2 class="home-multimedia-headline multimedia-headline home-multimedia-top-headline multimedia-top-headline headline top-headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<?php /* <p class="home-multimedia-byline byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="home-multimedia-authors multimedia-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ) ?></time> */ ?>
									</header>

									<section class="home-multimedia-summary home-media-summary multimedia-summary media-summary clearfix">
										<?php get_post_meta($post->ID, 'media_dek', true); ?>
									</section> <!-- end multimedia-dek -->

								</article> <!-- end article -->

							<?php } // end first post
					
							endwhile; endif; // close loop
					
							rewind_posts(); // start the loop over again ?>
						
						</div> <!-- end #post-type-loop-top -->
					
					
						<div class="multimedia-mgallery-main eightcol last">
		
							<?php // begin the loop again
					
							$firstpost = 'firstpost';
					
							if ( $multimedia_query->have_posts() ) : while ( $multimedia_query->have_posts() ) : $multimedia_query->the_post();
					
							if ( $firstpost == 'firstpost' ) {
								$firstpost = '';
							} 
					
							else { // all non-first posts format ?>
									
									<?php 
									// this is the second part of the operation that determines first or last class based on column divisions. see above.
									$k = $style_classes[$style_index++ % $styles_count]; ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'threecol clearfix ' . $k ); ?> role="article">
										
											<?php if ( has_post_thumbnail() ) : ?>
												<div class="video-thumbnail-container">
													<?php the_post_thumbnail('zom-landscape-396'); ?>
												</div>
											<?php endif; ?>
		
											<header>
												<div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
												<h2 class="home-multimedia-headline multimedia-headline headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
												<?php /* <p class="home-multimedia-byline multimedia-byline byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="home-multimedia-authors multimedia-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ); ?></time> */ ?>
											</header>
		
											<section class="multimedia-dek dek">
												<?php echo get_post_meta($post->ID, 'media_dek', true); ?>
											</section> <!-- end multimedia-dek -->
	
									</article> <!-- end article -->
					
							<?php } // end non-first posts
				
							endwhile; endif; // kill loop
							
							wp_reset_postdata(); ?>
				
						</div> <!-- end #post-type-loop-main -->
					
					</div> <!-- end #multimedia-mgallery -->
					
			
			</section> <!-- end #section-box-multimedia -->
			
			
			
			
			
			<!-- SLIDESHOWS SECTION -->
			<section id="section-box-slideshows" class="section-box section-container twelvecol first last clearfix">
				<h2 class="section-box-title"><a href="<?php get_site_url(); ?>/slideshows/">Slideshows</a></h2>
			
					
					<?php // no reason to change this stuff
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$top_article_class = 'top-' . $post_type;
					
					// set class to first or last depending on position in n column layout where number of keys == n
					// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
					$style_classes = array('first', '', '', '', '', 'last');
					$styles_count = count($style_classes);
					$style_index = 0;
					
					// sets up counter to display first post differently (see TOP ARTICLE)
					// disable this because wooslider is borked
					//$firstpost = 'firstpost'; 
					
					$slideshows_query = new WP_Query( array(
						'post_type'     => 'slideshow',
						'posts_per_page' => 6
						)
					);
					
					?>
				
					
					<div id="slideshows-mgallery" class="mgallery twelvecol first last clearfix">
						
						<?php /* As a result of the sporadic display of WooSlider, disable the larger most recent slideshow
						
						<div class="slideshows-mgallery-top fourcol first clearfix">
				
							<?php // begin the loop, generated by the gd cpt plugin
							if ( $slideshows_query->have_posts() ) : while ( $slideshows_query->have_posts() ) : $slideshows_query->the_post();
						
							if ( $firstpost == 'firstpost' ) { ?>
					
								<?php $firstpost = ''; ?>
					
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'twelvecol first last clearfix' ); ?> role="article">
									
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php
										 wooslider( array(
										 	'slider_type'         => 'attachments-hoz',
										 	'smoothheight'        => true,
										 	'animation_loop'      => true,
										 	'control_nav'         => false,
										 	'direction_nav'       => false,
										 	'size'                => 'zom-landscape-576',
										 	'slideshow_speed'     => 2,
										 	'animation_duration'  => 1
										 ));
										?>
									</a>

									<header class="clearfix">
										<h2 class="home-slideshows-headline slideshows-headline home-slideshows-top-headline slideshows-top-headline headline top-headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									</header>

									<section class="home-slideshows-summary home-media-summary slideshows-summary media-summary clearfix">
										<?php get_post_meta($post->ID, 'media_dek', true); ?>
									</section> <!-- end slideshows-dek -->

								</article> <!-- end article -->

							<?php } // end first post
					
							endwhile; endif; // close loop
					
							rewind_posts(); // start the loop over again ?>
						
						</div> <!-- end #post-type-loop-top -->
						
						*/ ?>
					
						<div class="slideshows-mgallery-main">
		
							<?php // begin the loop again
					
							//$firstpost = 'firstpost';
					
							if ( $slideshows_query->have_posts() ) : while ( $slideshows_query->have_posts() ) : $slideshows_query->the_post();
					
							/* if ( $firstpost == 'firstpost' ) {
								$firstpost = '';
							} */
					
							// else { // all non-first posts format ?>
									
									<?php 
									// this is the second part of the operation that determines first or last class based on column divisions. see above.
									$k = $style_classes[$style_index++ % $styles_count]; ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'twocol clearfix ' . $k ); ?> role="article">
										
											<?php if ( has_post_thumbnail() ) : ?>
												<div class="slideshows-thumbnail-container">
													<?php the_post_thumbnail('zom-landscape-396'); ?>
												</div>
											<?php endif; ?>
		
											<header>
												<div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
												<h2 class="home-slideshows-headline slideshows-headline headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
												<?php /* <p class="home-slideshows-byline slideshows-byline byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="home-slideshows-authors slideshows-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ); ?></time> */ ?>
											</header>
		
											<section class="slideshows-dek dek">
												<?php echo get_post_meta($post->ID, 'media_dek', true); ?>
											</section> <!-- end slideshows-dek -->
	
									</article> <!-- end article -->
					
							<?php // } // end non-first posts
				
							endwhile; endif; // kill loop ?>
				
						</div> <!-- end #post-type-loop-main -->
					
					</div> <!-- end #slideshows-mgallery -->
					
			
			</section> <!-- end #section-box-slideshows -->

				
				
		
		
		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>