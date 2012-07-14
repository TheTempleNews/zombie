<?php
/* Zombie Custom Post Type
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a seperate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Author: Chris Montgomery
URL: http://www.temple-news.com/

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


function article_news() { 
	$section = "News";
	$section_lower = strtolower($section);
	$nom = $section . " Article";
	$noms = $nom . "s";
	
	// creating (registering) the custom type 
	register_post_type( 'article_news', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __($noms, 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __($nom, 'post type singular name'), /* This is the individual type */
			'all_items' => __('All ' . $noms), /* the all items menu item */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New' . $nom), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit ' . $nom), /* Edit Display Title */
			'new_item' => __('New ' . $nom), /* New Display Title */
			'view_item' => __('View ' . $nom), /* View Display Title */
			'search_items' => __('Search ' . $noms), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These articles are passed through the ' . $section . ' Desk' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => $section_lower, 'with_front' => true ), /* you can specify it's url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'article_news');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'article_news');
	
	/* this makes the appropriate cat the default for this type */
	wp_set_object_terms( 'article_news', 4, 'category' );
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'article_news');