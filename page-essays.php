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
							global $wp_query;
							$temp_query = $wp_query;
							$wp_query = null;
							$wp_query = new WP_Query();
							$essays = $wp_query;

							$essays_args = array(
								'post_type' => 'essay',
								'posts_per_page' => 5,
								'paged' => $paged
							);
							//$essays = new WP_Query($essays_args);
							$essays->query($essays_args);

							if ($essays->have_posts()) : while ($essays->have_posts()) : $essays->the_post(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class('sixcol push_three clearfix'); ?> role="article">
									<header class="article-header">
										<h3 class="headline h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
										<p class="byline"><i>by</i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>
									</header> <!-- end article header -->
									<div class="dek">
										<?php the_excerpt(); ?>
									</div> <!-- end .dek -->
								</article> <!-- end article -->
							<?php endwhile; endif; ?>

							<div class="essays-pagination sixcol push_three">
								<?php if (function_exists('bones_page_navi')) { // if experimental feature is active 
									bones_page_navi(); // use the page navi function
								} else { // if it is disabled, display regular wp prev & next links ?>
									<nav class="wp-prev-next">
										<ul class="clearfix">
											<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "zombietheme")) ?></li>
											<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "zombietheme")) ?></li>
										</ul>
									</nav>
								<?php }

								$essays = null;
								$wp_query = null;
								$wp_query = $temp_query;
								?>
							</div>

						</section> <!-- end #essay-feed -->

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
