<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="eightcol first clearfix" role="main">
						
						<?php
						if ( !is_paged() ) {
							include_once('archive-section.php');
						}
						
						if ( is_paged() ){
							include_once('archive-section-paged.php');
						}
						
						?>
						
    				</div> <!-- end #main -->
    				


    
	    			<?php get_sidebar(); // sidebar 1 ?>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>