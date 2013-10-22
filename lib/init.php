<?php
/**
 * Roots initial setup and constants
 */
function zombie_setup() {
  /**
   * Make theme available for translation
   */
  //load_theme_textdomain('zombie', get_template_directory() . '/lang');


  /**
   * Register wp_nav_menu() menus.
   *
   * @link  http://codex.wordpress.org/Function_Reference/register_nav_menus 
   */
  register_nav_menus(array(
    'main-nav' => __( 'The Main Menu' ),    // main nav in header
    'home-top-links' => __( 'Home Top Links' ), // links in featured media area
    'footer-links-center-top' => __( 'Footer Links: Center Top' ), // secondary nav in footer
    'footer-links-center-middle' => __( 'Footer Links: Center Middle' ),
    'footer-links-center-bottom' => __( 'Footer Links: Center Bottom' ),
    'footer-links-left' => __( 'Footer Links: Left' ),
    'footer-links-right' => __( 'Footer Links: Right' ),
  ));


  /**
   * Post thumbnails.
   */
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(96, 96, true); // Default post thumbnail size
  add_image_size( 'zom-thumb-96', 96, 96, true ); // 1:1
  add_image_size( 'zom-landscape-396', 396, 264, true ); // 3:2
  add_image_size( 'zom-landscape-576', 576, 384, true ); // 3:2
  add_image_size( 'zom-landscape-792', 792, 528, true ); // 3:2
  add_image_size( 'zom-landscape-1080', 1080, 720, true ); // 3:2
  add_image_size( 'zom-portrait-384', 384, 576, true );    // 2:3, max ~50% of <main>
  add_image_size( 'zom-portrait-1080', 720, 1080, true ); // 2:3
  add_image_size( 'zom-columnist-200', 200, 300, true ); // 2:3, columnist headshot size
  add_image_size( 'zom-full-banner', 1140, 250, true ); // full-width banner


  /**
   * Add thumbnail sizes to Gallery screen
   *
   * @link  http://wp.tutsplus.com/tutorials/theme-development/using-custom-image-sizes-in-your-theme-and-resizing-existing-images-to-the-new-sizes/
   */
  function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
      'zom-landscape-396' => 'Landscape Half',
      // 'zombie-landscape-768' => 'Landscape Full',
      'zom-portrait-384'  => 'Portrait Half',
      'zom-columnist-200' => 'Columnist Headshot'
    );
    return array_merge( $sizes, $custom_sizes );
  }
  add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );


  /**
   * Tell the TinyMCE editor to use a custom stylesheet
   */
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'zombie_setup');

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }
