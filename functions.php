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
5. THE ZOMBIE LOOP
	- contains custom loops
		- for home
		- for sections
*/
require_once('library/inc/zombie-loop.php');
/*
6. FLEX TETRODO
	- flexslider plugin for featured content slider
*/
require_once('library/inc/flex-tetrodo/flex-tetrodo.php');
/*
7. TGM PLUGIN ACTIVATION
*/
//require_once('library/inc/tgm-plugin-activation.php');
/*
8. ZOMBIE CONFIGURATION (library/inc/zombie-conf.php)
*/
require_once('library/inc/zombie-conf.php');
/*
9. SPECIAL ISSUES FUNCTIONS (library/inc/special-issues/special-issues.php)
*/
require_once('library/inc/special-issues/special-issues.php');


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes

// add_image_size( 'bones-thumb-600', 600, 150, true );
// add_image_size( 'bones-thumb-300', 300, 100, true );


add_image_size( 'zom-thumb-96', 96, 96, true );

// all have 1.50000000 ratio
add_image_size( 'zom-landscape-396', 396, 264, true );
add_image_size( 'zom-landscape-576', 576, 384, true );
add_image_size( 'zom-landscape-792', 792, 528, true );
add_image_size( 'zom-landscape-1080', 1080, 720, true );

add_image_size( 'zom-portrait-384', 384, 576, true );    // max ~50% of #main
add_image_size( 'zom-portrait-1080', 720, 1080, true );

// columnist headshot size
add_image_size( 'zom-columnist-200', 200, 300, true );

// full-width banner
add_image_size( 'zom-full-banner', 1140, 250, true );

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
		'zom-portrait-384'  => 'Portrait Half',
		'zom-columnist-200' => 'Columnist Headshot'
	);
	return array_merge( $sizes, $custom_sizes );
}



/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Primary Sidebar (First)',
		'description' => 'The first primary sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => 'Primary Sidebar (Second)',
		'description' => 'The second primary sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'widgetized-front-center-1',
		'name' => 'Homepage Center Widgets (First)',
		'description' => 'The first widgetized area for the home page center column.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'widgetized-front-center-2',
		'name' => 'Homepage Center Widgets (Second)',
		'description' => 'The second widgetized area for the home page center column.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'widgetized-broadcecil',
		'name' => 'Broad & Cecil RSS',
		'description' => 'This should be used to display an RSS feed from Broad & Cecil.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'id' => 'widgetized-thecherry',
		'name' => 'The Cherry RSS',
		'description' => 'This should be used to display an RSS feed from The Cherry.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
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
				<?php
				/* this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
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
function bones_wpsearch( $form = '' ) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<fieldset id="searchform-fields">
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="Go" />
	</fieldset>
	</form>';
	return $form;
} // don't remove this bracket!

/**
 * List a post's categories but exclude the categories specified in the argument
 * @link http://wordpress.org/support/topic/the_category-exclude-categories?replies=13#post-1851015
 */
function the_category_but($excl='', $spacer=' &#124; '){
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
				if( $thecount>1 ) {
					$html .= $spacer;
				}
			$thecount--;
			echo $html;
			}
		  }
	  }
}


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


/**
 * Customizes the output of image captions
 */
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);
function my_img_caption_shortcode_filter($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<p ' . $capid
	. 'class="wp-caption-text">' . $caption . '</p></div>';
}




// add_action( 'pre_get_posts', 'ttn_article_loop_include_cat' );
add_action('pre_get_posts', 'ttn_multimedia_paged');
add_action('pre_get_posts', 'ttn_author_archive_inc_cpt');
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

function ttn_multimedia_paged( $query ) {
	if ( $query->is_main_query() && is_post_type_archive('multimedia') && is_paged() ) {
		$query->set( 'posts_per_page', 9 );
	}
}


/**
 * Adds all public post types to author archive query.
 */
function ttn_author_archive_inc_cpt( $query ) {
	// Gets a list of the names of all public post types for use in a query
	$post_types_args = Array(
		'public'    => true
	);
	$post_types = get_post_types( $post_types_args );

	if ( $query->is_main_query() && is_author() ) {
		$query->set( 'post_type', $post_types );
	}
}


/**
 * Displays a list of an article's categories without links.
 *
 * Similar to the_category().
 *
 */
function the_category_no_link() {
	foreach((get_the_category()) as $category) {
		echo $category->cat_name . ' | ';
	}
}

/**
 * This adds custom post types to archives.
 *
 * It also breaks bulk editing of taxonomy if !is_admin() is not included.
 *
 * @see http://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/ See comments in CSS-Tricks article
 */
function ttn_add_custom_types( $query ) {
  if( !is_admin() && is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	$query->set( 'post_type', array(
	 'post', 'nav_menu_item', 'article_news', 'article_sports', 'article_living', 'article_ae', 'article_opinion', 'multimedia','slideshows'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'ttn_add_custom_types' );



/**
 * Automatically add FitVids to oembed YouTube videos.
 */
function zombie_embed_filter( $output, $data, $url ) {

	$return = '<div class="video-container">' . $output . '</div>';
	return $return;

}
add_filter('oembed_dataparse', 'zombie_embed_filter', 90, 3 );



/**
 * Hackish subpage conditional tag. Returns parent ID if is subpage.
 * @see http://codex.wordpress.org/Conditional_Tags#Testing_for_sub-Pages
 */
function is_subpage() {
	global $post;                              // load details about this page

	if ( is_page() && $post->post_parent ) {   // test to see if the page has a parent
		return $post->post_parent;             // return the ID of the parent post

	} else {                                   // there is no parent so ...
		return false;                          // ... the answer to the question is false
	}
}



/**
 * Removes the indicated top-level admin menu items for every role except Administrator.
 * @see http://speckyboy.com/2011/04/27/20-snippets-and-hacks-to-make-wordpress-user-friendly-for-your-clients/
 */
function remove_menus() {
	global $menu;
	global $current_user;
	get_currentuserinfo();

	$user_id = get_current_user_id();
	$user_info = get_userdata( $user_id );
	$user_role = $user_info->roles[1];

	if ($user_role !== 'administrator') {
		$restricted = array(__('Posts'),
							__('Pages'),
							__('Appearance'),
							__('Plugins'),
							__('Tools'),
							__('Settings')
		);
		end ($menu);
		while (prev($menu)) {
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		} // end while

	} // end if
}

add_action('admin_menu', 'remove_menus');



/**
 * Adds Editor to the roles allowed to approve new users, using the plugin New User Approve.
 * @see http://wordpress.org/support/topic/plugin-new-user-approve-how-do-i-make-it-so-a-user-with-editor-permission-can-approve-users?replies=4
 */
function nua_add_cap() {
	$editor = get_role( 'editor' );

	// $editor->add_cap('new_user_approve_minimum_cap');

	return 'edit_posts';
}
// add_action('admin_init','nua_add_cap');
add_filter( 'new_user_approve_minimum_cap', 'nua_add_cap' );


/**
 * To display the caption or any other post thumbnail metadata.
 * @see http://wordpress.org/support/topic/display-caption-with-the_post_thumbnail?replies=10
 */
function the_post_thumbnail_caption() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	);

   $thumbnail_image = get_posts($args);

   if ($thumbnail_image && isset($thumbnail_image[0])) {
	 //show thumbnail title
	 //echo $thumbnail_image[0]->post_title;

	 //Uncomment to show the thumbnail caption
	 echo $thumbnail_image[0]->post_excerpt;

	 //Uncomment to show the thumbnail description
	 //echo $thumbnail_image[0]->post_content;

	 //Uncomment to show the thumbnail alt field
	 //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	 //if(count($alt)) echo $alt;
  }
}
/**
 * Fixes issue where Editors cannot edit users (a capability added by User Role Editor plugin (?)).
 * @see http://wordpress.org/support/topic/plugin-user-role-editor-not-able-to-add-ability-to-edit-users?replies=4
 */
	function mc_admin_users_caps( $caps, $cap, $user_id, $args ){

		foreach( $caps as $key => $capability ){

			if( $capability != 'do_not_allow' )
				continue;

			switch( $cap ) {
				case 'edit_user':
				case 'edit_users':
					$caps[$key] = 'edit_users';
					break;
				case 'delete_user':
				case 'delete_users':
					$caps[$key] = 'delete_users';
					break;
				case 'create_users':
					$caps[$key] = $cap;
					break;
			}
		}

		return $caps;
	}
	add_filter( 'map_meta_cap', 'mc_admin_users_caps', 1, 4 );
	remove_all_filters( 'enable_edit_any_user_configuration' );
	add_filter( 'enable_edit_any_user_configuration', '__return_true');

	/**
	 * Checks that both the editing user and the user being edited are
	 * members of the blog and prevents the super admin being edited.
	 */
	function mc_edit_permission_check() {
		global $current_user, $profileuser;

		$screen = get_current_screen();

		get_currentuserinfo();

		if( $screen->base == 'user-edit' || $screen->base == 'user-edit-network' ) { // editing a user profile
			if ( ! is_super_admin( $current_user->ID ) && is_super_admin( $profileuser->ID ) ) { // trying to edit a superadmin while less than a superadmin
				wp_die( __( 'You do not have permission to edit this user.' ) );
			} elseif ( ! ( is_user_member_of_blog( $profileuser->ID, get_current_blog_id() ) && is_user_member_of_blog( $current_user->ID, get_current_blog_id() ) )) { // editing user and edited user aren't members of the same blog
				wp_die( __( 'You do not have permission to edit this user.' ) );
			}
		}

	}
	add_filter( 'admin_head', 'mc_edit_permission_check', 1, 4 );

/**
 * Displays a list of the 5 most recent posts from a network site.
 *
 * http://codex.wordpress.org/Function_Reference/fetch_feed
 *
 * @param string $domain Subdomain, if any.
 * @param string $url URL of an outside feed to get.
 */
	function ttn_network_feed( $domain, $url = null ) {

		if (!$url) {
			$feed_url = 'http://' . $domain . '.temple-news.com/feed/';
		} elseif ($url) {
			$feed_url = $url;
		}

		// Get RSS Feed(s)
		include_once(ABSPATH . WPINC . '/feed.php');
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( $feed_url );
		if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
			// Figure out how many total items there are, but limit it to 5.
			$maxitems = $rss->get_item_quantity(5);

			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items(0, $maxitems);
		endif;

		$output = '';

		$output .= '<ul>';
			if ($maxitems == 0) $output .= '<li>No items.</li>';
			else
			// Loop through each feed item and display each item as a hyperlink.
			foreach ( $rss_items as $item ) :
				$output .= '<li>';
					$output .= '<p class="ttn-network-feed-timestamp">' . $item->get_date('d F Y') . '</p>';
					$output .= '<a href="' . esc_url( $item->get_permalink() ) . '" title="Posted ' . $item->get_date('d F Y | H:i') . '">';
					$output .= esc_html( $item->get_title() );
					$output .= '</a>';
				$output .= '</li>';
			endforeach;
		$output .= '</ul>';

		echo $output;
	}

/**
 * Generates columnist headshot if post is a column or commentary
 *
 * Must be used within The Loop
 *
 * @author Chris Montgomery <mont.chr@gmail.com>
 * @version 1.0.0
 * @since 1.4.0
 * @deprecated 1.4.0 Because the output of the User Photo plugin is not as controllable as the builtin featured image.
 *
 * @return string|bool
 * @param string $context
 */
function zom_columnist_headshot($context) {

	// An array of category slugs for columns and commentaries
	$column_categories = array(
		'columns',
		'columns-arts-entertainment',
		'columns-living',
		'commentary', // Opinion commentary
		'commentaries' // Sports commentary
	);

	// Return true if post is a column or commentary
	$is_column = in_category($column_categories);

	// Columnist headshot displays if post is a column/commentary
	if ($is_column == true) {

		// $CONTEXT: If the context is within a single article...
		if ( $context == 'article' ) {
			echo '<div class="columnist-headshot-container">';
				if ( function_exists('userphoto_the_author_photo') ) :
					userphoto_the_author_photo( // display the user photo
						'', // before
						'', // after
						array( // attributes
							'width' => '',
							'height' => '',
							'class' => 'columnist-headshot'
						)
					);
				endif;
			echo '</div> <!-- end .columnist-headshot-container -->';
		} // end if article context

	} // end columnist headshot block

	return $column_categories;
	return $is_column;
}

/**
 * Shortcode for blockquotes with attribution.
 *
 * Usage: [blockquote who="Chris Montgomery" what="TTN Web Editor"]This is a quote![/blockquote]
 * Make sure opening and closing quotation marks are removed!
 *
 * @author Chris Montgomery <mont.chr@gmail.com>
 * @see http://wplifeguard.com/how-to-use-wordpress-shortcode/
 *
 */
function zom_blockquote($atts, $content = null) {
	extract(shortcode_atts(array(
		"who" => 'Unknown',
		"what" => 'what'
	), $atts));

	// If the "who" is not defined, only display the content (within curly quotes)
	if ( $who == 'Unknown' ) {
		return '<blockquote class="blockquote-full"><p>'.'&ldquo;'.$content.'&rdquo;'.'</p></blockquote>';

	// If the "who" is defined, but their "what" is not, display the who below a horizontal rule, preceded by an em dash
	} elseif ( $what == 'what' ) {
		return '<blockquote class="blockquote-full"><p>'.'&ldquo;'.$content.'&rdquo;'.'</p><hr /><p class="blockquote-cite">—'.$who.'</p></blockquote>';

	// If both the "who" and their "what" are defined, display both below a horizontal rule, preceded by an em dash, separated by ' / '. This is the preferred method.
	} else {
		return '<blockquote class="blockquote-full"><p>'.'&ldquo;'.$content.'&rdquo;'.'</p><hr /><p class="blockquote-cite">—'.$who.' / '.$what.'</p></blockquote>';
	}
}
add_shortcode("blockquote", "zom_blockquote");

/**
 * Get the first paragraph of the post content.
 *
 * Must be used within The Loop.
 *
 * @author J. Shamsul Bahri
 * @see http://jshamsul.com/2012/02/08/wordpress-get-first-paragraph-from-post/
 * @since 1.4.5
 *
 * @return string
 */
function get_the_content_first_graf() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content_explode = explode("</p>", $content);

	$c = 0; $p = count($content_explode); $return_data = "";
	while($c < $p) {
		$test = strip_tags($content_explode[$c]);
		if($test != '') {
			$return_data = $return_data . $content_explode[$c] . "</p>\n";
			break;
		};
	}
	return $return_data;
}

/**
 * Set Masonry grid class based on custom field value.
 *
 * @author Chris Montgomery
 *
 * @param int $width Override number of columns with an integer between 1 and 12
 * @param str $namespace Namespace to prepend $output
 * @return str $output
 *
 */
function ttn_gs_column_width( $width, $namespace ) {
	global $post;
	$output = '';

	if ( !$width ) {
		$width = get_post_meta( get_the_ID(), 'gs_column_width', true );
	}

	//echo $width;
	//print_r($width);

	if ( $namespace ) {
		$prefix = $namespace . '-';
	}


	if ( $width == 12 ) { // twelve columns
		$output = $prefix . 'twelvecol';
	} elseif ( $width == 6 ) { // six columns
		$output = $prefix . 'sixcol';
	} elseif ( $width == 4 ) { // four columns
		$output = $prefix . 'fourcol';
	}

	return $output;
}

/**
 * Add slug to body classes.
 */
function ttn_body_slug( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'ttn_body_slug' );

/* Function to process your thumbnail & image
   Copy and paste the code below to your functions.php */

/**
 * Three-pronged featured image fallback.
 *
 * Must be used within The Loop.
 *
 * This code first loads the featured image
 * if it's assigned to the post. If it is not set,
 * the code will look for the first image attached to the post.
 * Finally if there is no image associated with the post,
 * a default 'no image' photo will be loaded,
 * which should have been created and uploaded beforehand.
 *
 * @link https://coderwall.com/p/huidlw
 *
 * @param string $size The image size to get
 * @return string Echoes the URL of an image
 */
function ttn_get_featured_image_fallback( $size = 'zom-landscape-396' ) {
	global $post, $posts;
	$image_id = get_post_thumbnail_id(); //read featured image data for image url
	$attached_to_post = wp_get_attachment_image_src( $image_id, $size );
	$thumbnail =  $attached_to_post[0];

	if($thumbnail == ""):
		$attachments = get_children( array(
			'post_parent'    => get_the_ID(),
			'post_type'      => 'attachment',
			'numberposts'    => 1,
			'post_status'    => 'inherit',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ASC'
			) );

		// check if there's an image attached or not
		if(!empty($attachments)):
			foreach ( $attachments as $attachment_id => $attachment ) {
			  if(wp_get_attachment_image($attachment_id) != ""):
				  $thumbnail = wp_get_attachment_url( $attachment_id );
			  endif;
			}

		// if no attachment
		else:
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			$first_img = $matches [1] [0];

			if(!empty($first_img)):
				$thumbnail = $first_img;
			else:
				// define default thumbnail, you can use full url here.
				$thumbnail = bloginfo('template_directory') . "library/images/fallback.png";
			endif;
		endif;
	endif;

	echo $thumbnail;
}

/**
 * Get the current page's slug.
 *
 * @link http://www.tcbarrett.com/2011/09/wordpress-the_slug-get-post-slug-function/
 * @link http://stackoverflow.com/questions/4837006/how-to-get-the-current-page-name-in-wordpress
 * @link http://stackoverflow.com/questions/2805879/wordpress-taxonomy-title-output
 *
 * @param string $type Set an override post/page type of options: 'post' (including custom types), 'page', or 'cat'.
 *
 * @return $slug string The page slug
 */
function ttn_get_the_slug($type = '') {
	global $post;

	if (is_single() || $type === 'post') {

		/*$slug = basename(get_permalink());
		do_action('before_slug', $slug);
		$slug = apply_filters('slug_filter', $slug);
		if( $echo ) echo $slug;
		do_action('after_slug', $slug);*/

		$slug = $post->post_name;

	} elseif (is_page() || $type === 'page') {

		$slug = get_query_var('pagename');
		if ( !$pagename && $id > 0 ) {
			// If a static page is set as the front page,
			// $pagename will not be set. Retrieve it from the queried object
			$post = $wp_query->get_queried_object();
			$pagename = $post->post_name;
		}

	} elseif (is_category() || $type === 'cat') {
		$cat = get_category( get_query_var( 'cat' ) );
		$slug = $cat->slug;

		//$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		//$slug = $term->name;
	}

	return $slug;
}


/**
* Retrieve a post given its title.
*
* @link  http://wordpress.stackexchange.com/questions/11292/how-do-i-get-a-post-page-or-cpt-id-from-a-title-or-slug/11296#11296
*
* @uses $wpdb
*
* @param string $post_title Page title
* @param string $post_type post type ('post','page','any custom type')
* @param string $output Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
* @return mixed
*/
function zombie_get_post_by_title($page_title, $post_type ='post' , $output = OBJECT) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $page_title, $post_type));
        if ( $post )
            return get_post($post, $output);

    return null;
}



function zombie_feed_request($qv) {
    // If a request for the RSS feed is made, but the request
    // isn't specifically for a Custom Post Type feed
    if (isset($qv['feed']) && !isset($qv['post_type'])) {
        // Return a feed with posts of post type 'post' and 'thoughts'
        $qv['post_type'] = array(
                                 'post',
                                 'article_news',
                                 'article_sports',
                                 'article_living',
                                 'article_ae',
                                 'article_opinion',
                                 'multimedia',
                                 'slideshow'
                                 );
    }

    return $qv;
}
add_filter('request', 'zombie_feed_request');
