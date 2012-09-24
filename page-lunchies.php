<?php
/*
Template Name: Lunchies
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div class="lunchies-top-promo">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/lunchies/lunchies-banner-<?php echo LUNCHIES_YEAR; ?>.png" alt="Lunchies <?php echo LUNCHIES_YEAR; ?>" />
					</div>
					
					
					
					
					<div class="lunchies-main first eightcol">
						
						<?php // The Map
						
						$args = array(
							'post_type'     => 'food_vendor',
							'category_name' => 'voters-ranking',
							'year'          => $year
						);
						
						
						echo LUNCHIES_YEAR;
						
						?>
						
					</div>
					
					
					
					
					<div class="lunchies-sidebar last fourcol">
						
					
					
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>