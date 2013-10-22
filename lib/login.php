<?php

/**
 * Login page CSS.
 */
function zombie_login_css() {
  echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/login.min.css">';
}

/**
 * Login page logo links to home URL.
 */
function zombie_login_url() { echo bloginfo('url'); }

/**
 * Logo alt text.
 */
function zombie_login_title() { echo get_option('blogname'); }

// Calling it only on the login page
add_action('login_head', 'zombie_login_css');
add_filter('login_headerurl', 'zombie_login_url');
add_filter('login_headertitle', 'zombie_login_title');
