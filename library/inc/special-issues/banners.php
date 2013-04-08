				<?php if ( is_home() && HOME_TOP_PROMO == true ) : ?>

				<div class="home-top-promo clearfix">
				
					<?php if (NEW_LUNCHIES == true) { // lunchies top banner ?>

						<a href="http://temple-news.com/lunchies/" title="Lunchies <?php echo LUNCHIES_YEAR; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/lunchies/lunchies-banner-<?php echo LUNCHIES_YEAR; ?>.png" alt="Lunchies <?php echo LUNCHIES_YEAR; ?>" /></a>

					<?php } elseif (ELECTION_ISSUE == true) { // election issue top banner

						$banner = wp_get_attachment_image_src( get_post_thumbnail_id(38224), 'zom-full-banner' );
						$banner_url = $banner['0'];
						?>
						
						<a href="http://temple-news.com/election/" title="Election Issue"><img src="<?php echo $banner_url ?>" class="si-banner" /></a>

					<?php } elseif (MOVERS_AND_SHAKERS == true) { // movers and shakers banner ?>

						<div id="movers-and-shakers-top-promo">

							<div class="special-issue-text-banner-container top-promo-block first sixcol clearfix">
								<h2 class="moversshakers-type-banner special-issue-text-banner fittext"><a href="http://temple-news.com/movers-shakers/">Movers &amp; Shakers <?php echo MOVERS_SHAKERS_YEAR; ?></a></h2>
							</div>
							
							<div class="top-promo-teasers top-promo-block last sixcol clearfix">

								<?php

								// Gets 3 random Living articles in the Movers & Shakers category from within the last year
								$movers_shakers_args = array(
									'post_type'      => 'article_living',
									'category_name'  => 'movers-shakers',
									'year'           => MOVERS_SHAKERS_YEAR, // will only pull posts from the year of the most recent post in the "movers-shakers" category
									'orderby'        => 'rand', // shaking things up a bit
									'posts_per_page' => 3 // it will never be 16
								);

								$movers_shakers_query = get_posts($movers_shakers_args); ?>

								<ul>
								<?php foreach($movers_shakers_query as $post) : setup_postdata($post); ?>

									<li class="top-promo-teaser-item"><h4 class="teaser-headline headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></li>

								<?php endforeach; ?>
								</ul>

							</div> <!-- end top-promo-teasers -->
						</div> <!-- end #movers-and-shakers-top-promo -->

					<?php } elseif (WEEKENDER == true) { // weekender issue

						$weekender_id = get_cat_ID( 'weekender' );
						$weekender_link = get_category_link( $weekender_id );
						?>

						<div id="weekender-top-promo">

							<div class="special-issue-text-banner-container clearfix">
								<h2 class="weekender-text-banner special-issue-text-banner fittext"><a href="<?php echo esc_url( $weekender_link ); ?>">The Weekender <?php echo WEEKENDER_YEAR; ?></a></h2>
							</div>

						</div>

					<?php } elseif (BAR_GUIDE == true) { // bar guide issue ?>

						<div id="bar-guide-top-promo"> 

							<div class="special-issue-text-banner-container clearfix">
								<h2 class="bar-guide-text-banner special-issue-text-banner fittext"><a href="http://temple-news.com/bar-guide/">Bar Guide <?php echo BAR_GUIDE_YEAR; ?></a></h2>
							</div>

						</div> <!-- end #bar-guide-top-promo -->

					<?php } // END IT ALL! ?>
				
				</div> <!-- end .home-top-promo -->

				<?php endif; // endif is_home() && HOME_TOP_PROMO == true



				if ( is_single() && SINGLE_TOP_PROMO == true ) : ?>

					<div class="single-top-promo">

					<?php
					// Lunchies Banner
					if ( in_category('the-lunchies') ) { ?>

						<div id="lunchies-top-promo"> 

							<a href="http://temple-news.com/lunchies/" title="Lunchies <?php echo LUNCHIES_YEAR; ?>">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/lunchies/lunchies-banner-<?php the_year('Y'); ?>.png" alt="Lunchies <?php echo LUNCHIES_YEAR; ?>" />
							</a>

						</div> <!-- end #lunchies-top-promo -->

					<?php } elseif ( in_category('bar-guide') ) { ?>

						<div class="special-issue-text-banner-container clearfix">
							<h2 class="bar-guide-text-banner special-issue-text-banner fittext"><a href="http://temple-news.com/bar-guide/">Bar Guide <?php the_year('Y'); ?></a></h2>
						</div>

					<?php } // end bar guide banner ?>

					</div> <!-- end .single-top-promo -->

				<?php endif; // end if is_single()