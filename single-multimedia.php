<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="twelvecol first last clearfix" role="main">
						
						<h1 class="single-section-name" class="first last twelvecol"><a href="<?php home_url(); ?>/multimedia">Multimedia</a></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
								<header class="article-header">
								
									<?php
									// $fnord = get_post_meta($post->ID, 'slideshow_embed', true);
									// echo do_shortcode($fnord); 
									// echo $fnord; ?>
									
									<div class="post-category-list-container"><?php the_category_no_link(); ?></div>
									
									<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<section class="dek">
										<p><?php echo get_post_meta($post->ID, 'media_dek', true); ?></p>
									</section> <!-- end dek -->
									
									<p class="byline"><?php _e("by", "zombietheme"); ?> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> <time datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time>
						
								</header> <!-- end article header -->
					
								<section class="post-content twelvecol first last clearfix" itemprop="articleBody">
									
									<div class="single-video single-multimedia single-mgallery">
										<?php
												// http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/				
												// Get the video URL and put it in the $video variable
												$videoID = get_post_meta($post->ID, 'video_link', true);
												// Check if there is in fact a video URL
												if ($videoID) {
													echo '<div class="video-container">';
													// Echo the embed code via oEmbed
													echo wp_oembed_get( $videoID ); 
													echo '</div>';
										} ?>
									</div>
									
									<div class="single-multimedia-dek single-media-dek">
										<?php echo get_post_meta($post->ID, 'media_dek', true); ?>
									</div>
									
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
    
					<?php // get_sidebar(); // sidebar 1 ?>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>