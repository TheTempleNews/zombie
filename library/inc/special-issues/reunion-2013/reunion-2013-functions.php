<?php

/**
 * Reunion 2013 Functions.
 */

function zombie_reunion_2013_scripts_and_styles() {

  // Enqueue scripts and styles
  wp_enqueue_style( 'reunion-2013-stylesheet', get_stylesheet_directory_uri() . '/assets/css/reunion-2013.css', array('zombie-main'), time(), 'screen' );
  wp_enqueue_style( 'reunion-2013-fonts', '//fonts.googleapis.com/css?family=Abril+Fatface' );
  wp_enqueue_script( 'reunion-2013-scripts' );

  // Timeline.JS
  wp_enqueue_script( 'timeline-storyjs' );

}
add_action('wp_enqueue_scripts', 'zombie_reunion_2013_scripts_and_styles', 999);
