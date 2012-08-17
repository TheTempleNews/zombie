<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="wrap clearfix">
			
			<div class="three-column-container clearfix">
			
			
			
			
			
			
				<div id="column-center" class="fourcol clearfix column push_four">
				
					<div id="column-center-inner" class="column-inner">
					
						
						
						<!-- FEATURED CONTENT -->
						<section id="section-box-featured-content" class="section-box section-box-featured clearfix">

							<h2 class="section-box-featured-title section-box-title">Featured Content</h2>

								<!-- featured content stuff goes here -->
								<?php ttx_slider(); ?>

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
												} ?>
											
											<?php endwhile; endif; wp_reset_postdata(); ?>
	
										</article> <!-- end article -->
						
						</section> <!-- end #section-box-multimedia -->
				
				
				
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
								
								<div id="broadcecilad" class="ttn-network-banner">
									<a href="http://broadandcecil.temple-news.com/" title="Broad &amp; Cecil News Blog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/broadcecil-logo-crop.png" alt="broadcecil-logo" /></a>
								</div>
								
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
								
								<div id="thecherryad" class="ttn-network-banner">
									<a href="http://thecherry.temple-news.com/" title="The Cherry Sports Blog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/thecherry-logo-crop.png" alt="thecherry-logo" /></a>
								</div>
								
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
				
							endwhile; endif; // kill loop ?>
				
						</div> <!-- end #post-type-loop-main -->
					
					</div> <!-- end #multimedia-mgallery -->
					
			
			</section> <!-- end #section-box-multimedia -->
				
				
		
		
		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>