<?php
/*
Template Name: Movers & Shakers
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div id="moversshakers-top-promo">
						<h2></h2>
					</div>
					
					<div id="moversshakers-main">
						
						<div id="moversshakers-summary">
							
						</div>
						
						<div id="moversshakers-articles">

									<?php
								
									$movers_shakers_args = array(
										'post_type'      => 'movers_shakers',
										'year'           => MOVERS_SHAKERS_YEAR, // will only pull posts from the year of the most recent 'movers_shakers' post
										'orderby'        => 'rand', // shaking things up a bit
										//'posts_per_page' => 5,
									);
								
									$movers_shakers_query = get_posts($movers_shakers_args);
								
									//
									foreach($movers_shakers_query as $post) : setup_postdata($post); ?>
								
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'top-multimedia-article clearfix' ); ?> role="article">

										<div class="moversshakers-featured-image-container featured-image-container">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
										</div> <!-- end .moversshakers-featured-image-container -->

										<header class="moversshakers-header">

											<h3 class="moversshakers-name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_terms( $post->ID, 'movers-shakers-people' ); ?></a></h3>

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
