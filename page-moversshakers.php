<?php
/*
Template Name: Movers & Shakers
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div id="moversshakers-page-header">
						<h2 id="moversshakers-page-title" class="special-issue-page-title fittext">Movers &amp; Shakers <?php echo MOVERS_SHAKERS_YEAR; ?></h2>

						<div id="moversshakers-page-summary">

							<?php // Easy. Just pull the description from the page. But it's not future friendly... how can full collections of special issues be considered a full package, archived together?

							if ( have_posts() ) : while ( have_posts() ) : the_post();

							the_content();

							endwhile; endif; ?>
							
						</div> <!-- end #moversshakers-summary -->
					</div> <!-- end #moversshakers-header -->
					
					<div id="moversshakers-main">
						
						<div id="moversshakers-articles">

									<?php

									// set class to first or last depending on position in three column layout
									// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
									$style_classes = array('first', 'last');
									$styles_count = count($style_classes);
									$style_index = 0;
								
									$movers_shakers_args = array(
										'post_type'      => 'article_living',
										'category_name'  => 'movers-shakers',
										'year'           => MOVERS_SHAKERS_YEAR, // will only pull posts from the year of the most recent post in the "movers-shakers" category
										'orderby'        => 'rand', // shaking things up a bit
										'posts_per_page' => 16 // it will never be 16
									);
								
									$movers_shakers_query = get_posts($movers_shakers_args);
								
									//
									foreach($movers_shakers_query as $post) : setup_postdata($post);

									// this is the second part of the operation that determines first or last class based on column divisions. see above.
									$k = $style_classes[$style_index++ % $styles_count];
									?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'moversshakers-article sixcol clearfix ' . $k ); ?> role="article">

										<div class="moversshakers-featured-image-container featured-image-container">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-792'); ?></a>
										</div> <!-- end .moversshakers-featured-image-container -->

										<header class="moversshakers-article-header">

											<?php
											$movers_shakers_people = get_the_terms( $post->ID, 'movers-shakers-people' );

											if ( $movers_shakers_people && !is_wp_error($movers_shakers_people)) {
												$people = array();

												foreach ( $movers_shakers_people as $person ) {
													$people[] = $person->name;
												}

												$mover_shaker_name = join(",", $people);
											}
											?>

											<h3 class="moversshakers-name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $mover_shaker_name; ?></a></h3>

											<div class="moversshakers-dek dek">
												<?php the_excerpt(); ?>
											</div> <!-- end .moversshakers-dek -->

										</header> <!-- end .moversshakers-header -->

									</article>
								
									<?php endforeach; ?>

						</div> <!-- end #moversshakers-articles -->
						
					</div> <!-- end #moversshakers-main -->
				
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
