<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="eightcol first clearfix" role="main">
					
						<h1 id="archive-main-title">Archives <span class="archive-breadcrumb"> / category / <?php echo strtolower( single_cat_title('', false) ); ?></span></h1>
						
						
						

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							
							    <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							    <p class="meta"><?php _e("Posted", "zombietheme"); ?> <time datetime="<?php echo the_time('c'); ?>" pubdate><?php the_time('d F Y'); ?></time> <?php _e("by", "zombietheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "zombietheme"); ?> <?php the_category(', '); ?>.</p>
						
						    </header> <!-- end article header -->
					
						    <section class="post-content clearfix">
						
							    <?php the_post_thumbnail( 'bones-thumb-300' ); ?>
						
							    <?php the_excerpt(); ?>
					
						    </section> <!-- end article section -->
						
						    <footer class="article-footer">
							
						    </footer> <!-- end article footer -->
					
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
    
	    			<?php get_sidebar(); // sidebar 1 ?>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>