<?php
$catID_news = 4;
$catID_sports = 10;
$catID_living = 11;
$catID_ae = 2341;
$catID_opinion = 5;

$category_news_link = get_category_link($catID_news);
$category_sports_link = get_category_link($catID_sports);
$category_living_link = get_category_link($catID_living);
$category_ae_link = get_category_link($catID_ae);
$category_opinion_link = get_category_link($catID_opinion);
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
					
						<div id="media-container-solo" class="fourcol clearfix section-container push_four" role="featured">
							<!-- FEATURED CONTENT -->
							<section id="section-box-featured" class="section-box">

								<h2 class="section-box-title">Featured Content</h2>

									<!-- featured content stuff goes here -->

							</section> <!-- end #section-box-featured -->

						</div> <!-- end #media-container-solo -->
					
			
					<div id="region-left" class="fourcol first clearfix" role="region">
			
						<!-- NEWS SECTION -->
						<section id="section-box-news" class="section-container section-box first clearfix">
							<h2 class="section-box-title"><a href="<?php echo esc_url( $category_news_link ); ?>">News</a></h2>
								
								<?php // Reset Post Data
								wp_reset_postdata();
								
								// News Query
								$recentnews = new WP_Query( array(
									'posts_per_page'		=> 15,
									'meta_key'				=> 'ZOMBIE_METABOX_section-select',
									'meta_value'			=> 'nw',
									'category__not_in'		=> 3
									)
								);
								
								// Recent News Loop
								while ( $recentnews -> have_posts() ) : $recentnews -> the_post();
								?>
								
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
									<header>
										<?php the_category_but($catID_news); ?>
										<h1 class="h2 headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									</header>
									
									<section class="teaser clearfix">
										<div class="featured-image-container">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
										</div>
										
										<div class="dek">
											<?php the_excerpt(); ?>
										</div>
									</section> <!-- end teaser -->
								</article> <!-- end article -->
								
								<?php // End Recent News Loop
								endwhile; 
								
								// Reset Post Data
								wp_reset_postdata(); ?>
								
						</section> <!-- end #section-box-news -->

					</div> <!-- end #region-left -->



					<div id="region-right" class="eightcol last clearfix" role="region">
						
						<div id="media-container" class="fourcol clearfix section-container push_four" role="featured">
							<!-- FEATURED CONTENT -->
							<section id="section-box-featured" class="section-box">
								<h2 class="section-box-title">Featured Content</h2>
							
									<!-- featured content stuff goes here -->
							
							</section> <!-- end #section-box-featured -->
					
							<!-- FEATURED MULTIMEDIA -->
							<section id="section-box-multimedia" class="section-box">
								<h2 class="section-box-title">Featured Multimedia</h2>
							
									<!-- featured multimedia stuff goes here -->
							
							</section> <!-- end #section-box-multimedia -->
					
							<!-- PRINT EDITION -->
							<section id="section-box-print" class="section-box">
								<h2 class="section-box-title">Print Edition</h2>
							
									<!-- print edition stuff goes here -->
							
							</section> <!-- end #section-box-print -->
							
						</div> <!-- end #media-container -->

						<!-- SPORTS SECTION -->
						<section id="section-box-sports" class="section-container section-box sixcol last clearfix">
							<h2 class="section-box-title"><a href="<?php echo esc_url( $category_sports_link ); ?>">Sports</a></h2>
								
								<?php // Sports Query
								$recentsports = new WP_Query( array(
									'posts_per_page'		=> 5,
									'meta_key'				=> 'ZOMBIE_METABOX_section-select',
									'meta_value'			=> 'sp',
									'category__not_in'		=> 3
									)
								);
								
								// Recent Sports Loop
								while ( $recentsports -> have_posts() ) : $recentsports -> the_post(); ?>
								
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
									<header>
										<?php the_category_but($catID_sports); ?>
										<h1 class="h2 headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									</header>
									
									<section class="teaser clearfix">
										<div class="featured-image-container">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
										</div>
										
										<div class="dek">
											<?php the_excerpt(); ?>
										</div>
									</section> <!-- end teaser -->
								</article> <!-- end article -->
								
								<?php // End Recent Sports Loop
								endwhile; 
								
								// Reset Post Data
								wp_reset_postdata(); ?>
						</section> <!-- end #section-box-sports -->
						
							
							<!-- LIVING SECTION -->
							<section id="section-box-living" class="section-container section-box sixcol first clearfix">
								<h2 class="section-box-title"><a href="<?php echo esc_url( $category_living_link ); ?>">Living</a></h2>
								
									<?php // Living Query
									$recentliving = new WP_Query( array(
										'posts_per_page'		=> 5,
										'meta_key'				=> 'ZOMBIE_METABOX_section-select',
										'meta_value'			=> 'lv',
										'category__not_in'		=> 3
										)
									);
								
									// Recent Living Loop
									while ( $recentliving -> have_posts() ) : $recentliving -> the_post(); ?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
										<header>
											<?php the_category_but($catID_living); ?>
											<h1 class="h2 headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										</header>
									
										<section class="teaser clearfix">
											<div class="featured-image-container">
												<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
											</div>
										
											<div class="dek">
												<?php the_excerpt(); ?>
											</div>
										</section> <!-- end teaser -->
									</article> <!-- end article -->
								
									<?php // End Recent Living Loop
									endwhile; 
								
									// Reset Post Data
									wp_reset_postdata(); ?>
							</section> <!-- end #section-box-living -->
						
						
							<!-- A&E SECTION -->
							<section id="section-box-ae" class="section-container section-box sixcol last clearfix">
								<h2 class="section-box-title"><a href="<?php echo esc_url( $category_ae_link ); ?>">Arts &amp; Entertainment</a></h2>
								
									<?php // A&E Query
									$recentae = new WP_Query( array(
										'posts_per_page'		=> 5,
										'meta_key'				=> 'ZOMBIE_METABOX_section-select',
										'meta_value'			=> 'ae',
										'category__not_in'		=> 3
										)
									);
								
									// Recent A&E Loop
									while ( $recentae -> have_posts() ) : $recentae -> the_post(); ?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
										<header>
											<?php the_category_but($catID_ae); ?>
											<h1 class="h2 headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										</header>
									
										<section class="teaser clearfix">
											<div class="featured-image-container">
												<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
											</div>
										
											<div class="dek">
												<?php the_excerpt(); ?>
											</div>
										</section> <!-- end teaser -->
									</article> <!-- end article -->
								
									<?php // End Recent A&E Loop
									endwhile; 
								
									// Reset Post Data
									wp_reset_postdata(); ?>
									
							</section> <!-- end #section-box-ae -->
							
						</div> <!-- end .section-container -->
						
						
						<!-- OPINION SECTION -->
						<section id="section-box-opinion" class="section-container section-box eightcol last clearfix">
							<h2 class="section-box-title"><a href="<?php echo esc_url( $category_opinion_link ); ?>">Opinion</a></h2>
								
								<?php // Opinion Query
								$recentopinion = new WP_Query( array(
									'posts_per_page'		=> 5,
									'meta_key'				=> 'ZOMBIE_METABOX_section-select',
									'meta_value'			=> 'op',
									'category__not_in'		=> 3
									)
								);
								
								// Recent Opinion Loop
								while ( $recentopinion -> have_posts() ) : $recentopinion -> the_post(); ?>
								
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
									<header>
										<?php the_category_but($catID_opinion); ?>
										<h1 class="h2 headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									</header>
									
									<section class="teaser clearfix">
										<div class="featured-image-container">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
										</div>
										
										<div class="dek">
											<?php the_excerpt(); ?>
										</div>
									</section> <!-- end teaser -->
								</article> <!-- end article -->
								
								<?php // End Recent Opinion Loop
								endwhile; 
								
								// Reset Post Data
								wp_reset_postdata(); ?>
						</section> <!-- end #section-box-opinion -->
				
					</div> <!-- end #region-right -->
				
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
