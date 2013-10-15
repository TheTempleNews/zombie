<?php get_template_part('templates/head'); ?>

			<div id="content" class="the-american the-american-archive has-banner clearfix">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<header id="page-header" class="wrap clearfix">

						<div class="special-issue-text-banner-container twelvecol first last clearfix">
							<h2 class="the-american-text-banner special-issue-text-banner headline fittext"><a href="<?php echo home_url(); ?>/the-american/"><?php the_title(); ?></a></h2>
						</div>

						<div id="special-issue-description">
							<?php the_content(); ?>
						</div> <!-- end #special-issue-description -->

					</header> <!-- end #page-header -->

				<?php endwhile; endif; ?>
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="clearfix" role="main">

						<section class="featured-article twelvecol first last clearfix">

							<?php

							// Get Joey's story - this is a really bad way to do things.
							$featured_args = array(
								'p' => 43872,
								'post_type'     => 'article_sports',
								'category_name' => 'the-american-sports',
								'year'          => 2013,
							);

							$query = new WP_Query($featured_args);

							if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

							?>

								<article id="post-<?php echo $post->ID ?>" class="box <?php echo ttn_gs_column_width(6, 'mason'); ?> clearfix" role="article">

									<?php if ( has_post_thumbnail() ) { ?>
										<div class="featured-image-container eightcol first box">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-792'); ?></a>
										</div>
									<?php } ?>

									<header class="fourcol last">
										<h1 class="headline h2 box"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<section class="dek">
											<?php the_excerpt(); ?>
										</section> <!-- end .dek -->
									</header>
							
								</article> <!-- end article -->

							<?php endwhile; endif; 

							wp_reset_postdata(); ?>

						</section>

						<section class="mason twelvecol first last clearfix">

							<?php

							$args = array(
								'post_type'         => 'article_sports',
								'category_name'     => 'the-american-sports',
								'year'              => 2013,
								'nopaging'          => true,
								'post__not_in'      => array(43872),
								'category__not_in'  => array(25122)
							);

							$query = new WP_Query($args);

							if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

							?>

								<article id="post-<?php echo $post->ID ?>" class="box free-mason <?php echo ttn_gs_column_width(6, 'mason'); ?> clearfix" role="article">

									<?php if ( has_post_thumbnail() ) { ?>
										<div class="featured-image-container box">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
										</div>
									<?php } ?>

									<h1 class="headline h2 box"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							
									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end .dek -->
							
								</article> <!-- end article -->

							<?php endwhile; endif; 

							wp_reset_postdata(); ?>

						</section> <!-- end #essay-feed -->



						<section class="the-american__previews twelvecol first last clearfix">

							<div class="the-american__previews__inner box">
								
								<?php
	
								$args = array(
									'post_type'     => 'article_sports',
									'category_name' => 'the-american-previews',
									'year'          => 2013,
									'nopaging'      => true,
									'post__not_in'  => array(43872)
								);
	
								$query = new WP_Query($args);
	
								if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	
								?>
	
									<article id="post-<?php echo $post->ID ?>" class="the-american__preview" role="article">
	
										<h1 class="headline h3"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								
										<section class="dek">
											<?php the_excerpt(); ?>
										</section> <!-- end .dek -->
								
									</article> <!-- end article -->
	
								<?php endwhile; endif; 
	
								wp_reset_postdata(); ?>

							</div>

						</section> <!-- end #essay-feed -->

						<iframe width='85%' height='1300' frameborder='0' src='https://docs.google.com/spreadsheet/pub?key=0AoFxS8mAGpYldEU3Y0dRdkxPekY5c3Y4SU9TTW5RRVE&single=true&gid=0&output=html'></iframe>

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->


