<?php get_header(); ?>

			<?php $post_type = get_post_type();
					    
						if ( $post_type == "article_news" ) {
							$cat_id     = 4;
						} elseif ( $post_type == "article_sports" ) {
							$cat_id     = 10;
						} elseif ( $post_type == "article_living" ) {
							$cat_id     = 11;
						} elseif ( $post_type == "article_ae" ) {
							$cat_id     = 2341;
						} elseif ( $post_type == "article_opinion" ) {
							$cat_id     = 5;
						} elseif ( $post_type == "multimedia" ) {
							$cat_id     = 194;
						} elseif ( $post_type == "slideshows" ) {
							$cat_id     = 39;
						} 
						
						// Get the single name of the post type
						global $wp_post_types;
						$obj = $wp_post_types[$post_type];
						$post_type_name = $obj->labels->singular_name; 
						
						// boolean var for custom field - determines whether the full featured image will display above the body of a single article
						$display_full_feat_img = get_post_meta( $post->ID, 'show_full_featured_image_in_article', true );
						
						?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol first clearfix" role="main">
						
						<h1 class="single-section-name" class="first last twelvecol"><?php echo $post_type_name; ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php ttn_special_issue_banner(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
								<header class="article-header">
									
									<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
									
									<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<section class="dek">
										<?php the_excerpt(); ?>
									</section> <!-- end dek -->
									
									<p class="byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="authors"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time></p>
						
								</header> <!-- end article header -->
					
								<section class="post-content clearfix" itemprop="articleBody">
									
									<?php if ( has_post_thumbnail() && $display_full_feat_img == true ) { ?>
										<div class="single-featured-image-full-container">
											<div class="single-featured-image-full">
												<?php the_post_thumbnail('zom-landscape-792'); ?>
											</div>
											<div class="single-featured-image-full-caption">
												<?php the_post_thumbnail_caption(); ?>
											</div>
										</div>
									<?php } ?>
									
									<?php the_content(); ?>
								</section> <!-- end article section -->
						
								<footer class="article-footer">
			
									<?php // the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
									
									<?php
									
									yarpp_related(array(
									    // Pool options: these determine the "pool" of entities which are considered
									    'post_type' => array(
											'article_news',
											'article_sports',
											'article_living',
											'article_ae',
											'article_opinion',
											'slideshow',
											'multimedia'
										),
									    'show_pass_post' => false, // show password-protected posts
									    'past_only' => false, // show only posts which were published before the reference post
									    'recent' => '12 month', // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.

									    // Relatedness options: these determine how "relatedness" is computed
									    // Weights are used to construct the "match score" between candidates and the reference post
									    'weight' => array(
									        'body' => 1,
									        'title' => 2, // larger weights mean this criteria will be weighted more heavily
									        /* 'tax' => array(
									            'post_tag' => 1
									        ) */
									    ),
									    // Specify taxonomies and a number here to require that a certain number be shared:
									    /* 'require_tax' => array(
									        'post_tag' => 1 // for example, this requires all results to have at least one 'post_tag' in common.
									    ), */
									    // The threshold which must be met by the "match score"
									    'threshold' => 1,

									    // Display options:
									    'template' => 'yarpp-template-single.php', // either the name of a file in your active theme or the boolean false to use the builtin template
									    'limit' => 5, // maximum number of results
									    'order' => 'score DESC'
									),
									$reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
									true); // third argument: (optional) true to echo the HTML block; false to return it
									
									?>
									
									<!--sharexy code start--><noindex><div id="shr_655191" class="sharexy"><script type='text/javascript'>(function(w) { if (!w.SharexyWidget) { w.SharexyWidget = {};} if (!w.SharexyWidget.Params) { w.SharexyWidget.Params = {}; } w.SharexyWidget.Params['655191'] = {'code_id':'655191','publisher_key':'0','design':'metro','layout_static':'h','type':'st','mode_float':'','size_float':'60','size_static':'32','buzz':'0','services':['facebook', 'twitter', 'stumbleupon', 'reddit', 'google_plus'],'url':'current','allways_show_ads':'0','show_ads_sharing':'0','show_ads_cursor':'0','bg_float':'0','bg_color':'#f1f1f1','labels':'','counters':'0', 'counters_float':'0'} })(window);</script><script type='text/javascript' src='http://shuttle.sharexy.com/LoaderLite.js'></script></div></noindex><!--sharexy code end -->
							
								</footer> <!-- end article footer -->

								<section id="comments-section" class="page-break">

									<?php comments_template('/templates/comments.php'); // comments should go inside the article element ?>

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
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "zombietheme"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>
			
					</div> <!-- end #main -->
					
					<aside id="sidebar" class="sidebar fourcol last clearfix" role="complementary">
    
						<?php get_sidebar(); // primary sidebar ?>
					
					</aside>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
