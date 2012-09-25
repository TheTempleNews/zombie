					<?php // Article: Food-truck veteran reflects on 27 years of business

					$query = new WP_Query('p=36867&post_type=article_living'); ?>


					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							
							<div class="featured-image-container featured-image-container-full first sixcol clearfix">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
							</div>
							
							<div class="last sixcol clearfix">
								<header class="article-header">
				
									<h3 class="headline fittext"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header> <!-- end article header -->
		
							

								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
							</div>

						</article> <!-- end article -->
	
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
					
					
					
					<?php // Article: Dining on any budget

					$query = new WP_Query('p=36855&post_type=article_living'); ?>


					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							
							<div class="featured-image-container featured-image-container-full first sixcol clearfix">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
							</div>
							
							<div class="last sixcol clearfix">
								<header class="article-header">
				
									<h3 class="headline fittext"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header> <!-- end article header -->
		
							

								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
							</div>

						</article> <!-- end article -->
	
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>					
					
					
					
					
					<?php // Article: Namesake greets customers in more than one way
					
					$query = new WP_Query('p=36864&post_type=article_living'); ?>
					
					<div class="first fourcol clearfix">
					
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
									
								<h3 class="headline fittext"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<p class="byline fittext"><?php _e("by", "zombietheme"); ?> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

							</header> <!-- end article header -->
							
							<section class="post-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
							</section> <!-- end article section -->

							

						</article> <!-- end article -->
						
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
					
					</div>
					
					
					
					<?php // Article:  Rookie trucks put twist on traditional food items
					
					$query = new WP_Query('p=36862&post_type=article_living'); ?>
					
					<div class="fourcol clearfix">
					
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
									
								<h3 class="headline fittext"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
								
								<p class="byline fittext"><?php _e("by", "zombietheme"); ?> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->

							</header> <!-- end article header -->
							
							<section class="post-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
							</section> <!-- end article section -->

							

						</article> <!-- end article -->
						
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
					
					</div>
					
					
					
					
					<?php // Article: Nardolilli: Couple serves up low prices and personality
					
					$query = new WP_Query('p=36858&post_type=article_living'); ?>
					
					<div class="last fourcol clearfix">
					
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
									
								<h3 class="headline fittext"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<div class="featured-image-container">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-columnist-200'); ?></a>
								</div>
								
								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
								
								<p class="byline fittext"><?php _e("by", "zombietheme"); ?> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

							</header> <!-- end article header -->
							
							<section class="post-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
							</section> <!-- end article section -->

							

						</article> <!-- end article -->
						
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
					
					</div>