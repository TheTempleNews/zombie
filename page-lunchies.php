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
							'year'          => LUNCHIES_YEAR,
							'posts_per_page' => 10
						);
						
						$map_args = array(
							'map_post_type'           => 'food_vendor',
							'map_content'             => 'global',
							'auto_info_open'          => false,
							'marker_select_highlight' => true,
							'marker_select_center'    => true,
							'remove_geo_mashup_logo'  => false,
							'postal_code'             => array(19122,19121)
						);
						
						$lunchies_rank_voters_query = new WP_Query($args);
						
						echo GeoMashup::map($map_args);
						
						
						
						/* while ( $lunchies_rank_voters_query->have_posts() ) : $lunchies_rank_voters_query->the_post();
						
						
						the_title();
						
						endwhile; */
						
						//foreach($lunchies_rank_voters_query as $post) : setup_postdata($post); ?>
						
						
						
						<?php //endforeach; ?>
						
						
						
					</div>
					
					
					
					
					<div class="lunchies-sidebar last fourcol">
						
					
					
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>