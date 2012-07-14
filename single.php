<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol first clearfix" role="main">
						
						<h1 class="single-section-name" class="first last twelvecol"><?php zombie_section_name(); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
								<header class="article-header">
									
									<div class="post-category-list-container"><?php the_category('&ensp;&#124;&ensp;'); ?></div>
									
									<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end dek -->
									
									<p class="byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo ttn_article_published_link(); ?></time>
						
								</header> <!-- end article header -->
					
								<section class="post-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->
						
								<footer class="article-footer">
									
									<!--sharexy code start--><noindex><div id="shr_655191" class="sharexy"><script type='text/javascript'>(function(w) { if (!w.SharexyWidget) { w.SharexyWidget = {};} if (!w.SharexyWidget.Params) { w.SharexyWidget.Params = {}; } w.SharexyWidget.Params['655191'] = {'code_id':'655191','publisher_key':'0','design':'metro','layout_static':'h','type':'st','mode_float':'','size_float':'60','size_static':'32','buzz':'0','services':['facebook', 'twitter', 'stumbleupon', 'reddit', 'google_plus'],'url':'current','allways_show_ads':'0','show_ads_sharing':'0','show_ads_cursor':'0','bg_float':'0','bg_color':'#f1f1f1','labels':'','counters':'0', 'counters_float':'0'} })(window);</script><script type='text/javascript' src='http://shuttle.sharexy.com/LoaderLite.js'></script></div></noindex><!--sharexy code end -->
			
									<?php // the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
								</footer> <!-- end article footer -->
					
								<?php comments_template(); // comments should go inside the article element ?>
					
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
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "zombietheme"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>
			
					</div> <!-- end #main -->
    
					<?php get_sidebar(); // sidebar 1 ?>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>