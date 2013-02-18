<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="eightcol first clearfix" role="main">
					
						<?php 
							$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) :
								get_userdata(intval($author));
						?>
					
						<h1 class="archive-main-title">Archives <span class="archive-breadcrumb"> / author / <?php echo strtolower($curauth->display_name); ?></span></h1>
						
						
						
					    
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' top-archive-article clearfix' ); ?> role="article">

								<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
									<div class="featured-image-container featured-image-container-full twelvecol first last">
										<?php the_post_thumbnail('zom-landscape-792'); ?>
									</div>
								<?php } elseif ( has_post_thumbnail() && $display_feat_img == false ) { ?>
									<div class="featured-image-container featured-image-container-thumb twocol first">
										<?php the_post_thumbnail('zom-thumb-96'); ?>
									</div>
								<?php } ?>

								<header>
									<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
									<h1 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="authors sc"><?php if(function_exists('coauthors_posts_links')) coauthors_posts_links(); else the_author_posts_link(); ?></span> | <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time>
								</header>

								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->

							</article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { // if experimental feature is active ?>
						
						        <?php bones_page_navi(); // use the page navi function ?>

					        <?php } else { // if it is disabled, display regular wp prev & next links ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "zombietheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "zombietheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix">
    						    <header class="article-header">
    							    <h1><?php _e("Oops, Post Not Found!", "zombietheme"); ?></h1>
    					    	</header>
    						    <section class="post-content">
    							    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "zombietheme"); ?></p>
        						</section>
    	    					<footer class="article-footer">
    		    				    <p><?php _e("This is the error message in the archive.php template.", "zombietheme"); ?></p>
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
