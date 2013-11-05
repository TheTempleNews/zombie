<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/style.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/plugins.js (in footer)
 * 4. /theme/assets/js/main.js    (in footer)
 */
function zombie_scripts() {
  // Main stylesheet
  // wp_enqueue_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), ZOM_VERSION, 'all' );
  wp_enqueue_style('zombie-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), 'de894f49196b5232dcfab0b828bb615d');

  // IE-only stylesheet
  // wp_register_style('zombie-ie-stylesheet', get_stylesheet_directory_uri() . '/assets/css/ie.css', array(), '');

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'zombie_jquery_local_fallback', 10, 2);
  }

  // Comment reply script
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // Register
  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('zombie-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', false, '70c43903eef3f63198d7c9f67e5413a4', true);
  wp_register_script('special-issue-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts-special-issues.min.js', array('jquery'), time(), true);
  wp_register_script('timeline-storyjs', get_stylesheet_directory_uri() . '/assets/js/plugins/timeline/js/storyjs-embed.js', array('jquery'), time(), false);

  // Enqueue
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr');
  wp_enqueue_script('zombie-scripts');

  // Conditional font loading
  // https://github.com/montchr/zombie/issues/39
  if ( is_page_template('page-essays.php') || get_post_type( $the_post = false )) {
    wp_register_style( 'font-vollkorn','//fonts.googleapis.com/css?family=Vollkorn:400italic,400' );
        wp_enqueue_style( 'font-vollkorn' );
  }

  // font for reunion 2013
  if ( REUNION_2013 ) {
    wp_enqueue_style( 'reunion-2013-fonts', '//fonts.googleapis.com/css?family=Abril+Fatface' );
  }

  // https://github.com/montchr/zombie/issues/39
  if ( is_page( 'music-issue' ) || is_page( 'the-american' )) {
    wp_enqueue_script( 'masonry-js' );
  }

}
add_action('wp_enqueue_scripts', 'zombie_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function zombie_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'zombie_jquery_local_fallback');

function zombie_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'zombie_google_analytics', 20);
}
