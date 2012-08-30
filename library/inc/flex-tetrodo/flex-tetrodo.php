<?php
/*
Plugin Name: Flex Tetrodo
Plugin URI: https://github.com/montchr/Flex-Tetrodo
Description: A featured content slider plugin based off of Muffin's FlexSlider. Built for The Temple News "Zombie" theme.
Version: 0.1
Author: Chris Montgomery
License: GNUGPLv3

Copyright (C) 2012  Chris Montgomery

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

# CREDITS

* Practically stolen from FlexSlider. http://www.woothemes.com/flexslider/


*/


/************
ON ACTIVATION
*************/

// Check WP version
global $wp_version;

if ( !version_compare( $wp_version, 3.2, ">=" )) {
	die("Flex Tetrodo needs at least WordPress 3.2 running! Upgrade your WordPress installation!");
}

function ttx_activate() {
	error_log("Zombie does not think unless you tell him to think.");
}

register_activation_hook(__FILE__, "ttx_activate");





// Define constants
define('TTX_PREFIX', "ttx_");
define('TTX_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );  
define('TTX_NAME', "Flex Tetrodo");  
define ("TTX_VERSION", "0.1");

// Load FS2 Script
function ttx_script() {
	// For fade animation  
    /* print '<script type="text/javascript" charset="utf-8"> 
		jQuery(window).load(function() { 
				jQuery(\'.flexslider\').flexslider(); 
			}
		);
	</script>'; */
	
	// For slide animation
	// Not quite working as desired on iOS - when swiping, slideshow stops. pauseOnAction: false should disable this but that's not working either...
	print '<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery(\'.flexslider\').flexslider({
				animation: "slide",
				pauseOnAction: false,
				pauseOnHover: false,
		  });
		});
	</script>';
}  
      
add_action('wp_footer', 'ttx_script');

// Meet Tetrodo!
function ttx_get_slider() {
	$slider = "";
	$slider .= '<div class="flexslider flex-tetrodo twelvecol first last">
		<ul class="slides">';
		
		// Query posts in Featured category
		$ttx_query = new WP_Query( array(
			'cat' => 3,
			'posts_per_page' => 5,
			'post_type' => array(
				'article_news',
				'article_sports',
				'article_living',
				'article_ae',
				'article_opinion'
				)
			)
		);

		if ( $ttx_query->have_posts() ) : while ( $ttx_query->have_posts() ) : $ttx_query->the_post();
		
			$img = get_the_post_thumbnail(get_the_ID(), 'zom-landscape-576');
			$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'zom-landscape-576');
			$title = '<h1 class="headline">' . '<a href="' . get_post_permalink() . '" rel="bookmark" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</a></h1>';
			$dek = '<div class="dek"><p>' . get_the_excerpt() . '</p></div>';

			$slider .= '<li>';
				$slider .= $img;
				$slider .= '<div class="slide-info">';
					$slider .= $title;
					$slider .= $dek;
				$slider .= '</div>'; 
			$slider .= '</li>';

		endwhile; endif; wp_reset_query(); // End query

	$slider .= '</ul> 
	</div>';  

	return $slider; 
	
}

// Add shortcode
function ttx_insert_slider( $atts, $content = null ) {  
	$slider = ttx_get_slider();
	return $slider;
}

add_shortcode('ttx_slider', 'ttx_insert_slider');  

// Add template tag
function ttx_slider() {
	print ttx_get_slider();
}

?>