<?php
/*
Template Name: Special Issue: Imagetext
*/
?>

<?php get_header(); ?>

<div id="content" class="<?php echo ttn_get_the_slug(); ?> has-banner clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header id="page-header">
			<div class="special-issue-text-banner-container wrap clearfix">
				<h2 class="<?php echo ttn_get_the_slug(); ?>-text-banner special-issue-text-banner headline fittext"><a href="<?php echo home_url(); ?>/bar-guide-2014/"><?php the_title(); ?></a></h2>
			</div>
			<div id="special-issue-description">
				<?php the_content(); ?>
			</div> <!-- end #special-issue-description -->
		</header> <!-- end #page-header -->
	<?php endwhile; endif; ?>

	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="clearfix" role="main">

			<?php

			$post_types = array(
			                    article_news,
			                    article_sports,
			                    article_living,
			                    article_ae,
			                    article_opinion
			                   );
			$category   = (function_exists('get_field')) ? get_field('template_category') : false;
			$year       = (function_exists('get_field')) ? get_field('template_year') : false;

			$args = array(
				'post_type'     => $post_types,
				'cat'           => $category,
				'year'          => $year
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

			?>

				<article id="post-<?php echo $post->ID ?>" class="clearfix" role="article">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="featured-image-container box sixcol first">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
						</div>
					<?php } ?>
					<div class="box sixcol last">
						<h1 class="headline h3">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end .dek -->
					</div>
				</article> <!-- end article -->

			<?php endwhile; endif; 
			wp_reset_postdata(); ?>

		</div> <!-- end #main -->
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
