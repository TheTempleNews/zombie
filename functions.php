<?php
/*
Author: Eddie Machado // Chris Montgomery
URL: http://themble.com/bones/ // http://www.temple-news.com/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqeueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
// require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default
/*
5. CUSTOM METABOXES AND FIELDS FOR WORDPRESS 
	- add Custom Metaboxes and Fields for WordPress
	  http://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	- library/metabox/init.php
	- library/metabox/metabox-functions.php
*/
// require_once('library/metabox/init.php'); // this is very important
// require_once('library/metabox/metabox-functions.php'); // this is equally important
/*
6. META BOX SCRIPT FOR WP
	- in case the above option doesn't work (it doesn't)
*/
// include 'library/metabox-demo.php';
include 'library/metabox-functions.php';
/*
7. THE ZOMBIE LOOP
	- contains custom loops
		- for home
		- for sections
*/
require_once('library/zombie-loop.php');

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes

// add_image_size( 'bones-thumb-600', 600, 150, true );
// add_image_size( 'bones-thumb-300', 300, 100, true );


add_image_size( 'zom-thumb-96', 96, 96, true );

add_image_size( 'ttn-print-thumb', 400, 350, true );

// all have 1.50000000 ratio
add_image_size( 'zom-landscape-396', 396, 264, true );
add_image_size( 'zom-landscape-576', 576, 384, true );
add_image_size( 'zom-landscape-792', 792, 528, true );
add_image_size( 'zom-landscape-1080', 1080, 720, true );

add_image_size( 'zom-portrait-384', 384, 576, true );    // max ~50% of #main
add_image_size( 'zom-portrait-1080', 720, 1080, true );

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/


// Add thumbnail sizes to Gallery screen
// http://wp.tutsplus.com/tutorials/theme-development/using-custom-image-sizes-in-your-theme-and-resizing-existing-images-to-the-new-sizes/
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
	$custom_sizes = array(
		'zom-landscape-396' => 'Landscape Half',
		// 'zombie-landscape-768' => 'Landscape Full',
		'zom-portrait-384'  => 'Portrait Half'
	);
	return array_merge( $sizes, $custom_sizes );
}

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

	register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ ?>
			    <!-- custom gravatar call -->
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>&s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text(); ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<fieldset id="searchform-fields">
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="Go" />
	</fieldset>
	</form>';
	return $form;
} // don't remove this bracket!


/************* TGM-PLUGIN-ACTIVATION *****************/

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/library/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zombie_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

function zombie_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		
		array(
			'name'		=> 'Co-Authors Plus',
			'slug'		=> 'co-authors-plus',
			'required'	=> true,
		),
		
		array(
			'name'		=> 'Meta Box',
			'slug'		=> 'meta-box',
			'required'	=> true,
		),
		
		array(
			'name'		=> 'Custom Field Bulk Editor',
			'slug'		=> 'custom-field-bulk-editor',
			'required'	=> false,
		),
		
		array(
			'name'		=> 'mobble',
			'slug'		=> 'mobble',
			'required'	=> true,
		),
		
		array(
			'name'		=> 'Post Thumbnail Editor',
			'slug'		=> 'post-thumbnail-editor',
			'required'	=> true,
		),
		array(
			'name'		=> 'Advanced Excerpt',
			'slug'		=> 'advanced-excerpt',
			'required'	=> false,
		),		
		array(
			'name'		=> 'Another Wordpress Classifieds Plugin',
			'slug'		=> 'another-wordpress-classifieds-plugin',
			'required'	=> true,
		),
		array(
			'name'		=> 'Convert Post Types',
			'slug'		=> 'convert-post-types',
			'required'	=> false,
		),
		array(
			'name'		=> 'Enable Media Replace',
			'slug'		=> 'enable-media-replace',
			'required'	=> false,
		),
		array(
			'name'		=> 'FitVids for WordPress',
			'slug'		=> 'fitvids-for-wordpress',
			'required'	=> true,
		),
		array(
			'name'		=> 'Issuu Embed',
			'slug'		=> 'issuu-embed',
			'required'	=> true,
		),
		array(
			'name'		=> 'Video Thumbnails',
			'slug'		=> 'video-thumbnails',
			'required'	=> true,
		),
		array(
			'name'		=> 'AntiVirus',
			'slug'		=> 'antivirus',
			'required'	=> true,
		),
		array(
			'name'		=> 'BackWPup',
			'slug'		=> 'backwpup',
			'required'	=> true,
		),
		array(
			'name'		=> 'Exploit Scanner',
			'slug'		=> 'exploit-scanner',
			'required'	=> true,
		),
		array(
			'name'		=> 'Redirection',
			'slug'		=> 'redirection',
			'required'	=> true,
		),
		array(
			'name'		=> 'Social Metrics',
			'slug'		=> 'social-metrics',
			'required'	=> false,
		),
		array(
			'name'		=> 'Jetpack',
			'slug'		=> 'jetpack',
			'required'	=> false,
		),
		array(
			'name'		=> 'WP To Twitter',
			'slug'		=> 'wp-to-twitter',
			'required'	=> true,
		),
		array(
			'name'		=> 'Dev4Press Uodater',
			'slug'		=> 'dev4press-updater',
			'source'    => get_stylesheet_directory() . '/library/plugins/dev4press-updater.1.8.7.zip',
			'required'	=> false,
		),
		array(
			'name'		=> 'Flex Tetrodo',
			'slug'		=> 'flex-tetrodo',
			'source'    => get_stylesheet_directory() . '/library/plugins/flex-tetrodo.zip',
			'required'	=> true,
		),
		array(
			'name'		=> 'GD Custom Posts and Taxonomies Tools',
			'slug'		=> 'gd-taxonomies-tools',
			'source'    => get_stylesheet_directory() . '/library/plugins/gd-taxonomies-tools.3.6.6.zip',
			'required'	=> true,
		),
		array(
			'name'		=> 'Hello Zombie',
			'slug'		=> 'hello-zombie',
			'source'    => get_stylesheet_directory() . '/library/plugins/hello-zombie.zip',
			'required'	=> false,
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'zombietheme';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '/library/plugins',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
?>
<?php
// List a post's categories but exclude the categories specified in the argument
// Developed by ocshawn (http://wordpress.org/support/topic/the_category-exclude-categories?replies=13#post-1851015)
function the_category_but($excl='', $spacer=' &#124 '){
   $categories = get_the_category();
      if(!empty($categories)){
      	$exclude = $excl;
      	$exclude = explode(",", $exclude);
		$thecount = count(get_the_category()) - count($exclude);
      	foreach ($categories as $cat) {
      		$html = '';
      		if(!in_array($cat->cat_ID, $exclude)) {
				$html .= '<span class="post-category-list">';
				$html .= '<a href="' . get_category_link($cat->cat_ID) . '" ';
				$html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</a></span>';
				if($thecount>1) {
					$html .= $spacer;
				}
			$thecount--;
      		echo $html;
      		}
	      }
      }
}
?>
<?php
function zombie_section_name($post) {
	global $post;
	$custom_fields = get_post_custom( $post->ID );
	$selection = $custom_fields['ZOMBIE_METABOX_section-select'];
	
	foreach ( $selection as $key => $section ) :
		if ( $section == 'nw' ) {
			echo "News";
			break;
		} elseif ( $section == 'sp' ) {
			echo "Sports";
			break;
		} elseif ( $section == 'lv' ) {
			echo "Living";
			break;
		} elseif ( $section == 'ae' ) {
			echo "Arts &amp; Entertainment";
			break;
		} elseif ( $section == 'op' ) {
			echo "Opinion";
			break;
		}
	endforeach;	
}

/* Uses RegEx to remove those inline thumb dimensions automatically set up by WP in the HTML 
Solution by goldenapples @ http://wordpress.stackexchange.com/questions/5568/filter-to-remove-image-dimension-attributes */
add_filter( 'post_thumbnail_html', 'zombie_remove_thumb_dimensions', 10 );
add_filter( 'image_send_to_editor', 'zombie_remove_thumb_dimensions', 10 );

function zombie_remove_thumb_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
?>
<?php

// "Linking post published dates to their archives" by Justin Tadlock
// http://justintadlock.com/archives/2010/08/06/linking-post-published-dates-to-their-archives
add_shortcode( 'entry-link-published', 'ttn_article_published_link' );

function ttn_article_published_link() {

	/* Get the year, month, and day of the current post. */
	$year = get_the_time( 'Y' );
	$month = get_the_time( 'm' );
	$day = get_the_time( 'd' );
	$out = '';


	/* Add a link to the daily archive. */
	$out .= '<a href="' . get_day_link( $year, $month, $day ) . '" title="Archive for ' . esc_attr( get_the_time( 'd F Y' ) ) . '">' . $day . '</a>';
	
	/* Add a link to the monthly archive. */
	$out .= ' <a href="' . get_month_link( $year, $month ) . '" title="Archive for ' . esc_attr( get_the_time( 'F Y' ) ) . '">' . get_the_time( 'F' ) . '</a>';

	/* Add a link to the yearly archive. */
	$out .= ' <a href="' . get_year_link( $year ) . '" title="Archive for ' . esc_attr( $year ) . '">' . $year . '</a>';

	return $out;
}

?>
<?php

// add_action( 'pre_get_posts', 'ttn_article_loop_include_cat' );
/**
 * Modify Query
 * 
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-the-wordpress-query/
 * @param object $query data
 *
 * Modified from original to fit theme needs.
 *
 */

function ttn_article_loop_include_cat( $query ) {
	
	$post_type = get_query_var('post_type');
	$inc_cat = '';
	
	if ( $post_type == "article_news" ) {
		$inc_cat = 4;

	} elseif ( $post_type == "article_sports" ) {
		$inc_cat = 10;

	} elseif ( $post_type == "article_living" ) {
		$inc_cat = 11;

	} elseif ( $post_type == "article_ae" ) {
		$inc_cat = 2341;
		
	} elseif ( $post_type == "article_opinion" ) {
		$inc_cat = 5;
		
	}

	if ( $query->is_main_query() && $query->is_post_type_archive() ) {
		set_query_var( 'cat', $inc_cat );
	}

	//echo $query->is_post_type_archive();
	
	echo $post_type;
	echo get_query_var('cat');

}

function ttn_cat_loop_include_cpt( $query ) {
	
	if ( $query->is_main_query() ) {
		$query->set( 'post_type', $inc_cat );
	}
	
}
?>
<?php

function ttn_display_featured_media( $content_type ) {

	$post_type = get_post_type();
	
	if ( $post_type == "article_ae" ) {
		$cat_id     = 4;
	} elseif ( $post_type == "article_sports" ) {
		$cat_id     = 10;
	} elseif ( $post_type == "article_living" ) {
		$cat_id     = 11;
	} elseif ( $post_type == "article_ae" ) {
		$cat_id     = 2341;
	} elseif ( $post_type == "article_opinion" ) {
		$cat_id     = 5;
	} elseif ( $post_type == "multimedia" ) {
		$cat_id     = 194;
	} elseif ( $post_type == "slideshows" ) {
		$cat_id     = 39;
	}
	
	$html = '';
	global $post;
	
	// 
	if ( is_home() ) {
		
		$query = new WP_Query( array(
			'post_type'        => $content_type,
			'posts_per_page'   => 1
			)
		);
	
		$html .= '<div class="featured-' . $content_type . '">';
			
			// If you're asking for the top video
			if ( $content_type == 'multimedia') {
				
				 if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				 		
					 	// http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/				
						// Get the video URL and put it in the $video variable
						$videoID = get_post_meta($post->ID, 'video_link', true);
						// Check if there is in fact a video URL
						if ($videoID) {
						
							$html .= '<div class="video-container clearfix">';
							// Echo the embed code via oEmbed
							$html .= wp_oembed_get( $videoID ); 
							$html .= '</div>';
							
						}
				 
				 endwhile; endif; // close multimedia loop
				
			} // end multimedia
			
			if ( $content_type == 'slideshow') {
				
				 if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				 		
									 		
					    $gallery_shortcode = '[gallery id="' . intval( $post->post_parent ) . '"]';
					    //print apply_filters( 'the_content', $gallery_shortcode );
				 
					 	$html .= '<div class="slideshow-container" clearfix">';
					 	// $html .= apply_filters( 'the_content', $gallery_shortcode );
					 	$html .= do_shortcode($gallery_shortcode);
					 	$html .= '</div>';
					 	
					 	//$juicy = new Juicebox;
					 	//echo $juicy->shortcode_handler('[juicebox gallery_id="4"]');
					 	//echo $juicy->get_gallery_path();
				 
				 
				 endwhile; endif; // close slideshow loop
				
			} // end slideshow
			
		$html .= '</div>'; // end featured div
		
	} // end is_home()
	
	
	echo $html;
	
}

?>
<?php

function the_category_no_link() {
	foreach((get_the_category()) as $category) {
    echo $category->cat_name . ' | ';
}
	
}

?>
<?php

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'article_news', 'article_sports', 'article_living', 'article_ae', 'article_opinion', 'multimedia','slideshows'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

?>