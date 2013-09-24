<?php

/**
 * The Lunchies 2013 Template
 *
 * This template exists outside of the Zombie framework.
 * It enqueues an SCSS-compiled `lunchies-2013.css`,
 * foregoing any connection to the visual language of
 * the rest of temple-news.com.
 *
 *
 */

/**
 * Require Lunchies 2013 functions.
 */
require_once('library/inc/special-issues/lunchies/lunchies-2013-functions.php');

?>

<?php get_header('lunchies-2013'); ?>

<div class="main" id="main" role="main">
	<div class="main__inner" id="main__inner">

		<?php

		$standard_panel_slugs = array(
		                              'wrapped',
		                              'family-culture-ties-trucks',
		                              'one-freshman-first-time-truck-experience',
		                              'yumtown-debuts-new-fall-item',
		                              'food-pad-restaurant-traces-history-back-almost-30-years',
		                              );

		foreach ($standard_panel_slugs as $slug) {
			ttn_lunchies_2013_panel_loop($slug);
		}

		ttn_lunchies_2013_panel_loop('staff-favorites', 'panel-staff-favorites');

		?>

	<!--
	Slugs that deserve special attention.

	'staff-favorites',
	'lunchies-top-ten'
	 -->

	</div>
</div>

<?php get_footer('lunchies-2013'); ?>