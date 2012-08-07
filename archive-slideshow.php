<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="twelvecol first clearfix" role="main">
				    
				    <h1 class="single-section-name archive-main-title" class="first last twelvecol"><?php post_type_archive_title(); ?>
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
						
								<?php // no reason to change this stuff
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$cat_link = get_category_link($cat_id);
								$top_article_class = 'top-' . $post_type;
								
								// set class to first or last depending on position in three column layout
								// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
								$style_classes = array('first', '', 'last');
								$styles_count = count($style_classes);
								$style_index = 0;
								
								// sets up counter for grid row divs in mgallery main
								$row_count = 1;
								
								// sets up counter to display first post differently (see TOP ARTICLE)
								$firstpost = 'firstpost'; ?>
						
						<?php
						if ( !is_paged() ) { ?>
							
								
								<div id="slideshows-mgallery" class="mgallery ninecol last clearfix">
								
									<div id="post-type-loop-top" class="slideshows-mgallery-top article-container twelvecol first last clearfix">
							
										<?php // begin the loop, generated by the gd cpt plugin
										if (have_posts()) : while (have_posts()) : the_post();
									
										if ( $firstpost == 'firstpost' ) { ?>
								
											<?php $firstpost = ''; ?>
								
											<article id="post-<?php the_ID(); ?>" <?php post_class( 'top-slideshows-article clearfix' ); ?> role="article">
											
													<?php
													/* At least one of these options should work. But somethng about Juicebox won't let it work.
													// Get the slideshow's Juicebox shortcode
													$juicebox = get_post_meta( $post->ID, 'slideshow_embed', true);
													$wp_embed = new WP_Embed();
													
													if ( $juicebox ) {
														// Render Juicebox shortcode inside div
														echo '<div class="slideshow-container">';
														//echo do_shortcode( $juicebox );
														$post_embed = $wp_embed->run_shortcode('[juicebox gallery_id="4"]');
														echo $post_embed;
														//echo apply_filters('the_content', get_post_meta($post->ID, $juicebox, true));
														echo '</div>';
														
													}
													*/
													
													the_content();
													
													 ?>
			
													<header class="clearfix">
														<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
														<h1 class="slideshows-headline slideshows-top-headline headline top-headline"><a href="<?php the_permalink(); ?>" class="article-link" style="display: block;"><?php the_title(); ?></a></h1>
														<p class="slideshows-byline byline"><?php _e("by", "zombietheme"); ?> <span class="slideshows-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> | <time datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ); ?></time>
													</header>
			
													<section class="slideshows-dek media-dek">
														<?php echo get_post_meta($post->ID, 'media_dek', true); ?>
													</section> <!-- end slideshows-dek -->
												
												</a> <!-- end article-link -->
		
											</article> <!-- end article -->
		
										<?php } // end first post
								
										endwhile; endif; // close loop
								
										rewind_posts(); // start the loop over again ?>
									
									</div> <!-- end #post-type-loop-top -->
								
								
									<div id="post-type-loop-main" class="slideshows-mgallery-main">
									
										<div class="mgallery-row clearfix">
					
										<?php // begin the loop again
								
										$firstpost = 'firstpost';
								
										if (have_posts()) : while (have_posts()) : the_post();
								
										if ( $firstpost == 'firstpost' ) {
											$firstpost = '';
										} 
								
										else { // all non-first posts format ?>
												
												<?php 
												// this is the second part of the operation that determines first or last class based on column divisions. see above.
												$k = $style_classes[$style_index++ % $styles_count]; ?>
												
												<div class="article-container fourcol clearfix <?php echo $k ?>">
		
													<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
													
														<a href="<?php the_permalink(); ?>" class="article-link" style="display: block;">
	
															<?php if ( has_post_thumbnail() ) : ?>
																<div class="slideshows-thumbnail-container">
																	<?php the_post_thumbnail('zom-landscape-396'); ?>
																</div>
															<?php endif; ?>
						
															<header>
																<div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
																<h2 class="slideshows-headline headline"><?php the_title(); ?></h2>
																<p class="slideshows-byline byline"><?php _e("by", "zombietheme"); ?> <span class="slideshows-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> | <time datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ); ?></time>
															</header>
						
															<section class="slideshows-dek dek">
																<?php echo get_post_meta($post->ID, 'media_dek', true); ?>
															</section> <!-- end slideshows-dek -->
														
														</a> <!-- end article-link -->
					
													</article> <!-- end article -->
												
												</div> <!-- end article-container -->
								
										<?php
										if ( $row_count % 3 == 0 && $row_count !== 9 ) {
											echo '</div><div class="mgallery-row clearfix">';
										} elseif ( $row_count == 9 ) {
											echo '</div>';
										}
										
										$row_count++;
										
										} // end non-first posts
							
										endwhile; // close while_posts() loop but continue past the pagination area to see the real end
								
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
							
										<?php endif; // kill loop ?>
									
							
									</div> <!-- end #post-type-loop-main -->
								
								</div> <!-- end #slideshows-mgallery -->
								
								<aside id="slideshows-aside" class="threecol first">
							
								
							
								</aside>								
							
						<?php } // end if !is_paged() ?>
						
						
						
						
						
						<?php if ( is_paged() ){ ?>
						
								
						
								<div id="slideshows-mgallery" class="mgallery eightcol last clearfix">
							
									<div id="post-type-loop-main" class="twelvecol first last clearfix">
									
										<div class="mgallery-row clearfix">
					
										<?php // begin the loop again
								
										if (have_posts()) : while (have_posts()) : the_post(); ?>
										
												<?php 
												// this is the second part of the operation that determines first or last class based on column divisions. see above.
												$k = $style_classes[$style_index++ % $styles_count]; ?>
												
												<div class="article-container fourcol clearfix <?php echo $k ?>">
		
													<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
					
														<?php if ( has_post_thumbnail() ) : ?>
					
															<div class="slideshows-thumb mgallery-thumb">
																<?php the_post_thumbnail('zom-landscape-396'); ?>
															</div>
					
														<?php endif; ?>
					
														<header>
															<div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
															<h2 class="slideshows-headline headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
															<p class="slideshows-byline byline"><?php _e("by", "zombietheme"); ?> <span class="slideshows-authors authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> | <time datetime="<?php echo the_time('c'); ?>" pubdate><?php echo ttn_article_published_link(); ?></time>
														</header>
					
														<section class="slideshows-dek dek">
															<?php get_post_meta($post->ID, 'media_dek', true); ?>
														</section> <!-- end slideshows-dek -->
					
													</article> <!-- end article -->
												
												</div> <!-- end article-container -->
							
										<?php
										if ( $row_count % 3 == 0 && $row_count !== 9 ) {
											echo '</div><div class="mgallery-row clearfix">';
										} elseif ( $row_count == 9 ) {
											echo '</div>';
										}
										
										$row_count++;
										
										endwhile; // close while_posts() loop but continue past the pagination area to see the real end
								
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
							
										<?php endif; // kill loop ?>
									
							
									</div> <!-- end #post-type-loop-main -->
								
								</div> <!-- end #slideshows-mgallery -->
							
							
						<?php } // end if is_paged() ?>
						
    				</div> <!-- end #main -->
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>