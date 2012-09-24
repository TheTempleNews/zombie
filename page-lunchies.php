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
						
						<div class="lunchies-map">
						
							<?php // The Map
						
							$map_args = array(
								'map_post_type'           => 'food_vendor',
								'map_content'             => 'global',
								'auto_info_open'          => false,
								'marker_select_highlight' => true,
								'marker_select_center'    => true,
								'remove_geo_mashup_logo'  => false,
								'postal_code'             => array(19122,19121)
							);
						
							echo GeoMashup::map($map_args);
						
							?>
							
						</div> <!-- /.lunchies-map -->
						
						
						
					</div> <!-- /.lunchies-main -->
					
					
					
					
					<div class="lunchies-sidebar last fourcol">
						
						<ul class="rank-eds-list">
						
						<?php // Vendors: Editors' Rankings
						
							$args = array(
								'post_type'      => 'food_vendor',
								'category_name'  => 'editors-ranking',
								'year'           => LUNCHIES_YEAR,
								'posts_per_page' => 10,
								'meta_key'       => 'lunchies_rank_eds',
								'orderby'        => 'meta_value_num',
								'order'          => 'ASC'
							);
							
							$lunchies_rank_voters_query = get_posts($args);
					
							foreach($lunchies_rank_voters_query as $post) : setup_postdata($post); ?>
					
						
							<li class="rank-eds-item">
								<div class="rank-eds-item-head">
									<div class="rank-eds-item-outer-circle">
										<div class="rank-eds-item-inner-circle">
											<span class="rank-eds-item-rank"><?php echo get_post_meta( $post->ID, 'lunchies_rank_eds', true ) ?></span>
										</div>
									</div>
									<h3 class="rank-eds-item-title"><?php the_title(); ?></h3>
								</div>
								
								<div class="rank-eds-item-img">
									<?php the_post_thumbnail('zom-landscape-396')?>
								</div>
							</li>
					
							<?php endforeach; ?>
						
						</ul>
					
					</div> <!-- /.lunchies-sidebar -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>