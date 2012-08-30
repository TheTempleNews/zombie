<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="eightcol first clearfix" role="main">
						
						<?php
						if ( !is_paged() ) {
							include('archive-section.php');
						}
						
						if ( is_paged() ){
							include('archive-section-paged.php');
						}
						
						?>
						
    				</div> <!-- end #main -->
    
	    			<aside id="sidebar" class="sidebar fourcol last clearfix" role="complementary">
    
						<?php get_sidebar(); // primary sidebar ?>
					
					</aside>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>