<?php

/**
 * Reunion 2013 Functions.
 */

function zombie_reunion_2013_scripts_and_styles() {
	// Dequeue unused scripts and styles
	wp_dequeue_style( 'flex-tetrodo-css' );
	//wp_dequeue_script( 'flex-tetrodo-js' );
	//wp_dequeue_script( 'fittext-js' );
	//wp_dequeue_script( 'slabtext-js' );
	//wp_dequeue_script( 'masonry' );

	// Enqueue/register scripts and styles
	wp_enqueue_style( 'reunion-2013-stylesheet', get_stylesheet_directory_uri() . '/library/css/reunion-2013.css', array(), time(), 'screen' );

	// Timeline.JS
	wp_register_script( 'timeline-storyjs', get_stylesheet_directory_uri() . '/library/js/libs/timeline/js/storyjs-embed.js', array('jquery'), time(), false );
	wp_enqueue_script( 'timeline-storyjs' );

}
add_action('wp_enqueue_scripts', 'zombie_reunion_2013_scripts_and_styles', 999);
