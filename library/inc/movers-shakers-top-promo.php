<div id="movers-and-shakers-top-promo">

	<div class="special-issue-type-banner-container top-promo-block first sixcol clearfix">
		<h2 class="moversshakers-type-banner special-issue-type-banner fittext"><a href="http://temple-news.com/movers-shakers/">Movers &amp; Shakers <?php echo MOVERS_SHAKERS_YEAR; ?></a></h2>
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

	</div>
</div>
