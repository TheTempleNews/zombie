<?php
/*
Template Name: Election
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div id="si-banner-container">
						<?php
						$banner = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'zom-full-banner' );
						$banner_url = $banner['0'];
						?>
						
						<img src="<?php echo $banner_url ?>" class="si-banner" />
					</div>
					
					<?php
					$post_type = array(
						'article_news',
						'article_opinion'
					);
					
					$query = new WP_Query( array(
						'post_type' 				=> 'any',
						'category__in'	        	=> 18223
						)
					);
					
					
					if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
					?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

						<?php /* if ( has_post_thumbnail() ) : ?>

							<div class="featured-image-container featured-image-container-thumb twocol first">
								<?php the_post_thumbnail('zom-thumb-96'); ?>
							</div>

						<?php endif;  */ ?>

						<header>
							<div class="post-category-list-container"><?php the_category_but(18223); ?></div>
							<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="authors sc"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> | <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time>
						</header>

						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->

					</article> <!-- end article -->
					
					<hr />
					
					<?php endwhile; endif; ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>