<?php
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * Roots_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */
class Roots_Nav_Walker extends Walker_Nav_Menu {
	function check_current($classes) {
		return preg_match('/(current[-_])|active|dropdown/', $classes);
	}

	function start_lvl(&$output, $depth = 0, $args = array()) {
		/* Modified by Chris Montgomery 2013-07-25
		Add level classes to ul elements.
		.level-1 must be added in template file when calling wp_nav_menu() */
		$level = $depth + 2;
		$output .= "\n<ul class=\"";
		$output .= "level-" . $level . " ";
		$output .= "dropdown__menu nav--stacked nav\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		// Remove depth dependency for dropdown toggle
		// montchr 2013-07-25
		if ($item->is_dropdown) {
			$item_html = str_replace('<a', '<a class="dropdown__toggle" data-toggle="dropdown" data-target="#"', $item_html);
		}
		elseif (stristr($item_html, 'li class="divider')) {
			$item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
		}
		elseif (stristr($item_html, 'li class="nav-header')) {
			$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
		}

		$item_html = apply_filters('zombie_wp_nav_menu_item', $item_html);
		$output .= $item_html;
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

		// Add dropdown and dropdown--submenu classes to any nested item
		// montchr 2013-08-04
		if ($element->is_dropdown) {
			if ($depth === 0) {
				$element->classes[] = 'dropdown';
			} elseif ($depth >= 1) {
				$element->classes[] = 'dropdown dropdown--submenu';
			}
		}

		/*if ($depth === 0) {
			$element->classes[] = 'level-1';
		} elseif ($depth === 1) {
			$element->classes[] = 'level-2';
		} elseif ($depth === 2) {
			$element->classes[] = 'level-3';
		}*/

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}


/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function zombie_nav_menu_css_class($classes, $item) {
	$slug = sanitize_title($item->title);
	$classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', '', $classes);
	$classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

	$classes[] = 'menu-' . $slug;

	$classes = array_unique($classes);

	return array_filter($classes, 'is_element_empty');
}
add_filter('nav_menu_css_class', 'zombie_nav_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');


/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use Roots_Nav_Walker() by default
 */
function zombie_nav_menu_args($args = '') {
	$zombie_nav_menu_args['container'] = false;

	if (!$args['items_wrap']) {
		$zombie_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
	}

	// Increase max depth of dropdowns
	// $$DEV
	// montchr 2013-08-04
	if (current_theme_supports('zombie-top-navbar')) {
		$zombie_nav_menu_args['depth'] = 10;
	}

	if (!$args['walker']) {
		$zombie_nav_menu_args['walker'] = new Roots_Nav_Walker();
	}

	return array_merge($args, $zombie_nav_menu_args);
}
add_filter('wp_nav_menu_args', 'zombie_nav_menu_args');


/**
 * Wrapper functions for nav menus.
 */
// The Main Menu
function zombie_main_nav() {
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu' => 'The Main Menu',                           // nav name
		'menu_class' => 'nav nav--block top-nav clearfix',         // adding custom nav class
		'menu_id' => 'menu-top-navigation',				// id for nav ul
		'theme_location' => 'main-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''      // fallback function
	));
}

// Footer Menu: Sections
function zombie_footer_links_sections() {
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
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''  // fallback function
	));
}


// Footer Menu: About TTN
function zombie_footer_links_meta() {
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
		'fallback_cb' => ''  // fallback function
	));
}

// Footer Menu: Social Links
function zombie_footer_links_social() {
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
		'fallback_cb' => ''  // fallback function
	));
}

// Footer Menu: Misc. Links
function zombie_footer_links_misc() {
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
		'fallback_cb' => ''  // fallback function
	));
}

// Front Page Links
function ttn_menu_top_links() {
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
}

/**
 * Numeric page navigation.
 *
 * From Bones. Experimental.
 * 
 * @param  string $before Optional content to prepend.
 * @param  string $after  Optional content to append.
 */
function bones_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ol class="bones_page_navi clearfix">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'brandedtheme' );
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="bpn-current">'.$i.'</li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'brandedtheme' );
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ol></nav>'.$after."";
} /* end page navi */
