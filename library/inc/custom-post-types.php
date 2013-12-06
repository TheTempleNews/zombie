<?php

/**
 * CUSTOM POST TYPES
 */

/**
 * Register banner custom post type.
 */
function cpt_banner() {

	$labels = array(
		'name'                => 'Banners',
		'singular_name'       => 'Banner',
		'menu_name'           => 'Banners',
		'parent_item_colon'   => 'Parent Banner:',
		'all_items'           => 'All Banners',
		'view_item'           => 'View Banner',
		'add_new_item'        => 'Add New Banner',
		'add_new'             => 'New Banner',
		'edit_item'           => 'Edit Banner',
		'update_item'         => 'Update Banner',
		'search_items'        => 'Search banners',
		'not_found'           => 'No banners found',
		'not_found_in_trash'  => 'No banners found in Trash',
	);
	$args = array(
		'label'               => 'banner',
		'description'         => 'Top-of-site banners, including breaking news and promotions.',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'banner', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cpt_banner', 0 );
