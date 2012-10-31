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
				
					<div id="si-banner-container">
						<?php the_post_thumbnail('large', array('class' => "si-banner")); ?>
					</div>
					
					<div id="fboard-container">
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="fboard-box first sixcol clearfix">
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix fboard-article' ); ?> role="article">
								
								<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
									<div class="featured-image-container featured-image-container-full">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
									</div>
								<?php } ?>
								
								<header>
									<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
									<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								</header>
								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
								
							</article> <!-- end article -->
							
						</div> <!-- end .fboard-box -->
						
						
						<div class="fboard-box last sixcol clearfix">
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix fboard-article' ); ?> role="article">
								
								<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
									<div class="featured-image-container featured-image-container-full">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
									</div>
								<?php } ?>
								
								<header>
									<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
									<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								</header>
								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
								
							</article> <!-- end article -->
							
						</div> <!-- end .fboard-box -->
						
						
						<div class="fboard-box-showcase fboard-box first last twelvecol">
							
							<?php /* ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix fboard-article' ); ?> role="article">
								
								<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
									<div class="featured-image-container featured-image-container-full">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
									</div>
								<?php } ?>
								
								<header>
									<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
									<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								</header>
								<section class="dek">
									<?php the_excerpt(); ?>
								</section> <!-- end dek -->
								
							</article> <!-- end article -->
							
							<?php */ ?>
							
						</div> <!-- end .fboard-box-showcase -->
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					</div> <!-- end #fboard-container -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>