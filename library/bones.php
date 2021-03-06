<?php
/*
Welcome to Bones :)
This is the core Bones file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

/*********************
LAUNCH BONES
Let's fire off all the functions
and tools. I put it up here so it's
right up top and clean.
*********************/

// we're firing all out initial functions at the start
add_action('after_setup_theme','bones_ahoy', 15);

function bones_ahoy() {

	// launching operation cleanup
	add_action('init', 'bones_head_cleanup');
	// remove WP version from RSS
	add_filter('the_generator', 'bones_rss_version');
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action('wp_head', 'bones_remove_recent_comments_style', 1);
	// clean up gallery output in wp
	add_filter('gallery_style', 'bones_gallery_style');

	// enqueue base scripts and styles
	add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
	// ie conditional wrapper
	add_filter( 'style_loader_tag', 'bones_ie_conditional', 10, 2 );

	// launching this stuff after theme setup
	add_action('after_setup_theme','bones_theme_support');
	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'bones_register_sidebars' );
	// adding the bones search form (created in functions.php)
	add_filter( 'get_search_form', 'bones_wpsearch' );

	// cleaning up random code around images
	add_filter('the_content', 'bones_filter_ptags_on_images');
	// cleaning up excerpt
	add_filter('excerpt_more', 'bones_excerpt_more');

} /* end bones ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );

} /* end bones head cleanup */

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
	  remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}


/*********************
SCRIPTS & ENQEUEING
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {
  if (!is_admin()) {

	// modernizr (without media query polyfill)
	wp_register_script( 'bones-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

	// register main stylesheet
	wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), ZOM_VERSION, 'all' );

	// ie-only style sheet
	wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), ZOM_VERSION );

	// comment reply script for threaded comments
	if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
	  wp_enqueue_script( 'comment-reply' );
	}

	//adding scripts file in the footer
	wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/library/js/scripts.min.js', array( 'jquery', 'fitvids', 'fittext-js', 'slabtext-js', 'masonry', 'flex-tetrodo-js' ), ZOM_VERSION, true );

	// adding flex tetrodo slider based on flexslider
	wp_register_script( 'flex-tetrodo-js', get_stylesheet_directory_uri() . '/library/inc/flex-tetrodo/jquery.flexslider-min.js', array( 'jquery' ), ZOM_VERSION, true );
	wp_register_style('flex-tetrodo-css', get_stylesheet_directory_uri() . '/library/inc/flex-tetrodo/flexslider.css', array(), ZOM_VERSION, 'screen');

	// Google Analytics Advanced Content Tracking
	// see http://cutroni.com/blog/2012/02/21/advanced-content-tracking-with-google-analytics-part-1/
	//wp_register_script( 'ga-tracking', get_stylesheet_directory_uri() . '/library/js/libs/jquery.ga.scrolltracking-ck.js', array( 'jquery' ), ZOM_VERSION, true );

	// FitText 1.1 http://fittextjs.com/
	wp_register_script( 'fittext-js', get_stylesheet_directory_uri() . '/library/js/libs/jquery.fittext.js', array( 'jquery' ), ZOM_VERSION, true );

	// SlabText
	wp_register_script( 'slabtext-js', get_stylesheet_directory_uri() . '/library/js/libs/jquery.slabtext-ck.js', array( 'jquery' ), ZOM_VERSION, true );

	// FitVids
	wp_register_script( 'fitvids', get_stylesheet_directory_uri() . '/library/js/libs/jquery.fitvids.min.js', array( 'jquery' ), ZOM_VERSION, true );

	// masonry
	wp_register_script( 'masonry', get_stylesheet_directory_uri() . '/library/js/libs/jquery.masonry.min.js', ('jquery'), ZOM_VERSION, true );

	// enqueue styles and scripts
	wp_enqueue_script( 'bones-modernizr' );
	wp_enqueue_style( 'bones-stylesheet' );
	wp_enqueue_style('bones-ie-only');

	wp_enqueue_script('flex-tetrodo-js');
	wp_enqueue_style('flex-tetrodo-css');

	wp_enqueue_script('fittext-js');
	wp_enqueue_script('slabtext-js');

	wp_enqueue_script('fitvids');

	wp_enqueue_script( 'bones-js' );

	// if the current page being displayed is single, load the scroll tracker for GA
	// if ( is_single() ) {
	// 	wp_enqueue_script( 'ga-tracking' );
	// }

	// conditional font loading
	if ( is_page_template('page-essays.php') || get_post_type( $the_post = false )) {
		wp_register_style( 'font-vollkorn','//fonts.googleapis.com/css?family=Vollkorn:400italic,400' );
        wp_enqueue_style( 'font-vollkorn' );
	}

	// font for reunion 2013
	if ( REUNION_2013 ) {
		wp_enqueue_style( 'reunion-2013-fonts', '//fonts.googleapis.com/css?family=Abril+Fatface' );
	}

	if ( is_page( 'music-issue' ) || is_page( 'the-american' )) {
		wp_enqueue_script( 'masonry' );
	}

  } // endif is_admin
} // endif

// adding the conditional wrapper around ie stylesheet
// source: http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
function bones_ie_conditional( $tag, $handle ) {
	if ( 'bones-ie-only' == $handle )
		$tag = '<!--[if lte IE 9]>' . "\n" . $tag . '<![endif]-->' . "\n";
	return $tag;
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support('post-thumbnails');

	// default thumb size
	set_post_thumbnail_size(96, 96, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
		'default-image' => '',  // background image default
		'default-color' => '', // background color default (dont add the #)
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
		)
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	/* add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);	*/

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu' ),    // main nav in header
			'home-top-links' => __( 'Home Top Links' ), // links in featured media area
			'footer-links-center-top' => __( 'Footer Links: Center Top' ), // secondary nav in footer
			'footer-links-center-middle' => __( 'Footer Links: Center Middle' ),
			'footer-links-center-bottom' => __( 'Footer Links: Center Bottom' ),
			'footer-links-left' => __( 'Footer Links: Left' ),
			'footer-links-right' => __( 'Footer Links: Right' ),
		)
	);
} /* end bones theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function bones_main_nav() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu' => 'The Main Menu',                           // nav name
		'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
		'menu_id' => 'menu-top-navigation',				// id for nav ul
		'theme_location' => 'main-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
	));
} /* end bones main nav */



// the footer menus (should you choose to use them)

// menu of sections
function zombie_footer_links_sections() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'footer-links footer-links-sections-container clearfix',   // class of container (should you choose to use it)
		'menu' => 'Footer Links: Sections',                       // nav name
		'menu_class' => 'nav footer-nav footer-nav-sections clearfix',      // adding custom nav class
		'theme_location' => 'footer-links-center-top',             // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 1,                                   // limit the depth of the nav
		'fallback_cb' => 'zombie_footer_links_sections_fallback'  // fallback function
	));
} /* end bones footer links sections */


// About TTN
function zombie_footer_links_meta() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'footer-links footer-links-meta-container clearfix',   // class of container (should you choose to use it)
		'menu' => 'Footer Links: Meta',                       // nav name
		'menu_class' => 'nav footer-nav footer-nav-meta clearfix',      // adding custom nav class
		'theme_location' => 'footer-links-center-bottom',             // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'zombie_footer_links_meta_fallback'  // fallback function
	));
} /* end bones footer links meta */


function zombie_footer_links_social() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'footer-links footer-links-social-container clearfix',   // class of container (should you choose to use it)
		'menu' => 'Footer Links: Social Media',                       // nav name
		'menu_class' => 'nav footer-nav footer-nav-social clearfix',      // adding custom nav class
		'theme_location' => 'footer-links-right',             // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'zombie_footer_links_social_fallback'  // fallback function
	));
} /* end bones footer links social */


function zombie_footer_links_misc() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'footer-links footer-links-misc-container clearfix',   // class of container (should you choose to use it)
		'menu' => 'Footer Links: Misc',                       // nav name
		'menu_class' => 'nav footer-nav footer-nav-misc clearfix',      // adding custom nav class
		'theme_location' => 'footer-links-center-middle',             // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'zombie_footer_links_misc_fallback'  // fallback function
	));
} /* end bones footer links misc */

function ttn_menu_top_links() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                                     // remove nav container
		'container_class' => '',                               // class of container (should you choose to use it)
		'menu' => 'Homepage Links Menu',                       // nav name
		'menu_class' => 'nav--stacked',                    // adding custom nav class
		'theme_location' => 'home-top-links',               // where it's located in the theme
		'before' => '',                                        // before the menu
		'after' => '',                                         // after the menu
		'link_before' => '',                                   // before each link
		'link_after' => '',                                    // after each link
		'depth' => 0,                                          // limit the depth of the nav
		'fallback_cb' => ''                                    // fallback function
	));
} /* end ttn top links */



// this is the fallback for header menu
function bones_main_nav_fallback() {
	wp_page_menu( 'show_home=Home' );
}

// this is the fallback for footer menu
function zombie_footer_links_sections_fallback() {
	/* you can put a default here if you like */
}

function zombie_footer_links_meta_fallback() {
	/* you can put a default here if you like */
}

function zombie_footer_links_social_fallback() {
	/* you can put a default here if you like */
}

function zombie_footer_links_misc_fallback() {
	/* you can put a default here if you like */
}


/**
 * Add parent classes for menu items
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_nav_menu#How_to_add_a_parent_class_for_menu_item
 * @version 1.0.1
 *
 */
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts($args);
		if($related_posts) {
			foreach ($related_posts as $post) : setup_postdata($post); ?>
				<li class="related_post"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; }
		else { ?>
			<li class="no_related_post">No Related Posts Yet!</li>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
	return;

	echo '<nav class="pagination">';

		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );

	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
}

