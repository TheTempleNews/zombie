<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="the-essayist essay sixcol push_three clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<div class="special-issue-text-banner-container clearfix">
									<h2 class="essayist-text-banner special-issue-text-banner headline"><a href="<?php echo home_url(); ?>/essays/">The Essayist</a></h2>
								</div>
						
								<header class="article-header eightcol clearfix">
									
									<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<p class="byline"><i>by</i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span></p>

									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end dek -->
						
								</header> <!-- end article header -->
					
								<section class="post-content twelvecol first last clearfix" itemprop="articleBody">

									<?php the_content(); ?>

								</section> <!-- end article section -->

								<section id="comments-section" class="page-break">
									<?php comments_template(); // comments should go inside the article element ?>
								</section>
					
							</article> <!-- end article -->

						<?php endwhile; ?>			
					
						<?php else : ?>
					
							<article id="post-not-found" class="hentry clearfix">
					    		<header class="article-header">
					    			<h1><?php _e("Oops, Post Not Found!", "zombietheme"); ?></h1>
					    		</header>
					    		<section class="post-content">
					    			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "zombietheme"); ?></p>
					    		</section>
					    	</article>
					
						<?php endif; ?>

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>