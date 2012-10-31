<?php
/*
Template Name: Flipboard Grid
Post Template: Flipboard Grid
*/
?>

<?php
/**
 * A Flipboard-inspired layout for articles in a category.
 * 
 * @package Zombie\Layouts
 * @subpackage Special Issue Layouts
 */

?>



<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
				
					<div class="si-banner-container">
						<?php get_the_post_thumbnail('large', array('class' => "si-banner")); ?>
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>