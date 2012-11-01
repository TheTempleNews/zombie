<?php
/*
Template Name: Election
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div id="si-banner-container">
						<?php
						$banner = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'zom-full-banner' );
						$banner_url = $banner['0'];
						?>
						
						<img src="<?php echo $banner_url ?>" class="si-banner" />
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>