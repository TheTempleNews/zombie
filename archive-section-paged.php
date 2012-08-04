<?php
						$post_type = get_post_type();
					    
						if ( $post_type == "article_ae" ) {
							$cat_id     = 4;
						} elseif ( $post_type == "article_sports" ) {
							$cat_id     = 10;
						} elseif ( $post_type == "article_living" ) {
							$cat_id     = 11;
						} elseif ( $post_type == "article_ae" ) {
							$cat_id     = 2341;
						} elseif ( $post_type == "article_opinion" ) {
							$cat_id     = 5;
						} elseif ( $post_type == "multimedia" ) {
							$cat_id     = 194;
						} elseif ( $post_type == "slideshows" ) {
							$cat_id     = 39;
						}

					    ?>
					    
<h1 class="single-section-name archive-main-title" class="first last twelvecol"><a href="<?php echo get_post_type_archive_link( $post_type ); ?>"><?php post_type_archive_title(); ?></a>
							<?php if ( is_post_type_archive() ) : ?>
								<span class="archive-breadcrumb"><?php
									if ( is_year() || is_day() || is_month() ) { ?>
										 / archive / <?php the_time('Y'); }
										if ( is_day() || is_month() ) { ?>
											 / <?php the_time('F'); } 
											if ( is_day() ) { ?>
												 / <?php the_time('d'); } ?></span>
							<?php endif; ?>
						</h1>

						
						<?php
						// no reason to change this stuff
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$cat_link = get_category_link($cat_id);
						$top_article_class = 'top-' . $post_type;
						
						// sets up counter to display first post differently (see TOP ARTICLE)
						$firstpost = 'firstpost';
						
						// i set this query up not knowing offset and pagination don't get along. not used.
						/* $main_query = new WP_Query( array(
							'post_type'                => $post_type,
							'posts_per_archive_page'   => 10,
							'offset'                   => 1,
							'nopaging'                 => false,
							'paged'                    => $paged
							)
						); */
						
						?>
												
						<div id="post-type-loop-main" class="ninecol last">
				
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

											<?php if ( has_post_thumbnail() ) : ?>

												<div class="featured-image-container featured-image-container-thumb twocol first">
													<?php the_post_thumbnail('zom-thumb-96'); ?>
												</div>

											<?php endif; ?>

											<header>
												<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
												<h1 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
												<p class="byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span>&ensp;<time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time>
											</header>

											<section class="dek">
												<?php the_excerpt(); ?>
											</section> <!-- end dek -->

										</article> <!-- end article -->
				
							<?php endwhile; // close while_posts() loop but continue past the pagination area to see the real end
				
							wp_reset_postdata();
					
							if (function_exists('bones_page_navi')) { // if experimental feature is active 

									bones_page_navi(); // use the page navi function 
	
								} else { // if it is disabled, display regular wp prev & next links ?>
									<nav class="wp-prev-next">
										<ul class="clearfix">
											<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "zombietheme")) ?></li>
											<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "zombietheme")) ?></li>
										</ul>
									</nav>
							<?php } ?>
						
							<?php else : // if the loop returns nothing ?>
				
								<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
									</header>
									<section class="post-content">
										<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
									</section>
									<footer class="article-footer">
										<p><?php _e("This is the error message in the custom posty type archive template.", "bonestheme"); ?></p>
									</footer>
								</article>
				
							<?php endif; // shoot the loop in the head ?>
							
					
							</div> <!-- end #post-type-loop-main -->
							
							<aside id="post-type-aside" class="threecol first">
								
								
								<!-- SECTION FIRST SLIDESHOW -->
								<!-- <section class="archive-section-box section-box threecol">
									<h2 class="section-box-title">Most Recent Slideshow</h2>
								
										<?php // ttn_display_featured_media('slideshow') ?>
								
								</section> <!-- end #section-box-multimedia -->
								
								
							</aside>

						
    				</div> <!-- end #main -->
    
	    			<aside id="sidebar" class="sidebar fourcol last clearfix" role="complementary">
    
						<?php get_sidebar(); // primary sidebar ?>
					
					</aside>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>