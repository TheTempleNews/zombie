<?php
/*
Template Name: Bar Guide
*/
?>

<?php get_template_part('templates/head'); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="bar-guide clearfix" role="main">

						<div class="special-issue-text-banner-container clearfix">
							<h2 class="bar-guide-text-banner special-issue-text-banner headline fittext"><a href="http://temple-news.com/bar-guide/">Bar Guide <?php echo BAR_GUIDE_YEAR; ?></a></h2>
						</div>

						<div id="special-issue-description">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>

						<?php endwhile; endif; ?>

						</div> <!-- end #special-issue-description -->

						<?php include('library/inc/special-issues/bar-guide/bar-guide-2013.php'); ?>

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->


