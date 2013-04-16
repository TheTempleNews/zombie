<?php
/*
Template Name: The Essayist
*/
?>

<?php get_header(); ?>

			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="the-essayist essayist-archive clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<header id="page-header" class="twelvecol clearfix">

								<div class="special-issue-text-banner-container clearfix">
									<h2 class="essayist-text-banner special-issue-text-banner headline"><a href="<?php echo home_url(); ?>/essays/"><?php the_title(); ?></a></h2>
								</div>

								<div id="special-issue-description">
									<?php the_content(); ?>
								</div> <!-- end #special-issue-description -->

							</header> <!-- end #page-header -->

						<?php endwhile; endif; ?>

						<section id="essay-feed" class="twelvecol clearfix">

							<?php

							// set class to first or last depending on position in two column layout
							// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
							$style_classes = array('first', 'last');
							$styles_count = count($style_classes);
							$style_index = 0;

							$featured_essays_args = array(
								'post_type' => 'essay',
								'meta_query' => array(
									array(
										'key' => 'feature',
										'value' => true,
										'compare' => '='
									)
								),
								'posts_per_page' => 2
							);

							$featured_essays = new WP_Query($featured_essays_args);

							if ($featured_essays->have_posts()) : while ($featured_essays->have_posts()) : $featured_essays->the_post();

								// this is the second part of the operation that determines first or last class based on column divisions. see above.
								$k = $style_classes[$style_index++ % $styles_count];

							?>

								<article id="post-42483" class="sixcol <?php echo $k; ?> clearfix" role="article">

									<header class="article-header">

										<h3 class="headline h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
										<p class="byline"><i>by</i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

									</header> <!-- end article header -->
							
									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end .dek -->
							
								</article> <!-- end article -->

							<?php endwhile; endif; 

							wp_reset_postdata();

							$is_featured = '';

							$essays_args = array(
								'post_type' => 'essay',
								//'meta_key' => 'feature',
								//'meta_value' => false
							);

							$essays = new WP_Query($essays_args);

							if ($essays->have_posts()) : while ($essays->have_posts()) : $essays->the_post();

								$is_featured = get_post_meta($post->ID, 'feature');

								if ($is_featured) {
									continue;
								}
							?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('sixcol push_three clearfix'); ?> role="article">

									<header class="article-header">

										<h3 class="headline h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
										<p class="byline"><i>by</i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

									</header> <!-- end article header -->
							
									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end .dek -->
							
								</article> <!-- end article -->

							<?php endwhile; endif; 

							wp_reset_postdata(); ?>

						</section> <!-- end #essay-feed -->

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>