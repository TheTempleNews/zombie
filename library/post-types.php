<?php

// Hook into the 'init' action
add_action( 'init', 'zombie_register_custom_post_types', 0 );

function zombie_register_custom_post_types() {

  /**
   * News Articles
   */
  register_post_type( 'article_news',
                     array(
                           'labels' => array(
                                             'name'               => 'News',
                                             'singular_name'      => 'News',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New News Article',
                                             'edit_item'          => 'Edit News Article',
                                             'new_item'           => 'New News Article',
                                             'view_item'          => 'View News Article',
                                             'search_items'       => 'Search News Articles',
                                             'not_found'          => 'No News Articles Found',
                                             'not_found_in_trash' => 'No News Article Found In Trash',
                                             'parent_item_colon'  => 'Parent News Articles:',
                                             'menu_name'          => 'News Articles'
                                             ),
                           'publicly_queryable'  => true,
                           'exclude_from_search' => false,
                           'capability_type'     => 'post',
                           'hierarchical'        => false,
                           'public'              => true,
                           'rewrite' => array(
                                              'slug'       => 'news',
                                              'with_front' => true,
                                              'feeds'      => true,
                                              'pages'      => true
                                              ),
                           'show_in_menu'      => true,
                           'show_in_admin_bar' => true,
                           'has_archive'       => 'news',
                           'query_var'         => true,
                           'supports' => array(
                                               'title',
                                               'editor',
                                               'author',
                                               'thumbnail',
                                               'excerpt',
                                               'comments',
                                               'revisions'
                                               ),
                           'taxonomies' => array(
                                                 'category',
                                                 'post_tag'
                                                 ),
                           'show_ui'           => true,
                           'can_export'        => true,
                           'show_in_nav_menus' => false,
                           '_edit_link'        => 'post.php?post=%d',
                           'description'       => 'These articles are from the News Section.'
                           )
  );


  /**
   * Sports Articles
   */
  register_post_type( 'article_sports',
                     array(
                           'labels' => array(
                                             'name'               => 'Sports',
                                             'singular_name'      => 'Sports',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Sports Article',
                                             'edit_item'          => 'Edit Sports Article',
                                             'new_item'           => 'New Sports Article',
                                             'view_item'          => 'View Sports Article',
                                             'search_items'       => 'Search Sports Articles',
                                             'not_found'          => 'No Sports Articles Found',
                                             'not_found_in_trash' => 'No Sports Article Found In Trash',
                                             'parent_item_colon'  => 'Parent Sports Articles:',
                                             'menu_name'          => 'Sports Articles'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'sports',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => 'sports',
                     'query_var'         => true,
                     'supports' => array(
                                         'title',
                                         'editor',
                                         'author',
                                         'thumbnail',
                                         'excerpt',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d',
                     'description'       => 'This is an article from the Sports Desk.'
                     )
  );


  /**
   * Living Articles
   */
  register_post_type( 'article_living',
                     array(
                           'labels' => array(
                                             'name'               => 'Living',
                                             'singular_name'      => 'Living',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Living Article',
                                             'edit_item'          => 'Edit Living Article',
                                             'new_item'           => 'New Living Article',
                                             'view_item'          => 'View Living Article',
                                             'search_items'       => 'Search Living Articles',
                                             'not_found'          => 'No Living Articles Found',
                                             'not_found_in_trash' => 'No Living Article Found In Trash',
                                             'parent_item_colon'  => 'Parent Living Articles:',
                                             'menu_name'          => 'Living Articles'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'living',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => 'living',
                     'query_var'         => true,
                     'supports' => array(
                                         'title',
                                         'editor',
                                         'author',
                                         'thumbnail',
                                         'excerpt',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d',
                     'description'       => 'This is an article from the Living Desk.'
                     )
  );


  /**
   * A&E Articles
   */
  register_post_type( 'article_ae',
                     array(
                           'labels' => array(
                                             'name'               => 'Arts & Entertainment',
                                             'singular_name'      => 'Arts & Entertainment',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New A&E Article',
                                             'edit_item'          => 'Edit A&E Article',
                                             'new_item'           => 'New A&E Article',
                                             'view_item'          => 'View A&E Article',
                                             'search_items'       => 'Search A&E Articles',
                                             'not_found'          => 'No A&E Articles Found',
                                             'not_found_in_trash' => 'No A&E Article Found In Trash',
                                             'parent_item_colon'  => 'Parent A&E Articles:',
                                             'menu_name'          => 'A&E Articles'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'arts',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => 'arts',
                     'query_var'         => true,
                     'supports' => array(
                                         'title',
                                         'editor',
                                         'author',
                                         'thumbnail',
                                         'excerpt',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d',
                     'description'       => 'This is an article from the Arts & Entertainment Desk.'
                     )
  );


  /**
   * Opinion Articles
   */
  register_post_type( 'article_opinion',
                     array(
                           'labels' => array(
                                             'name'               => 'Opinion',
                                             'singular_name'      => 'Opinion',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Opinion Article',
                                             'edit_item'          => 'Edit Opinion Article',
                                             'new_item'           => 'New Opinion Article',
                                             'view_item'          => 'View Opinion Article',
                                             'search_items'       => 'Search Opinion Articles',
                                             'not_found'          => 'No Opinion Articles Found',
                                             'not_found_in_trash' => 'No Opinion Article Found In Trash',
                                             'parent_item_colon'  => 'Parent Opinion Articles:',
                                             'menu_name'          => 'Opinion Articles'
                                             ),
                           'publicly_queryable'  => true,
                           'exclude_from_search' => false,
                           'capability_type'     => 'post',
                           'hierarchical'        => false,
                           'public'              => true,
                           'rewrite' => array(
                                              'slug'       => 'opinion',
                                              'with_front' => true,
                                              'feeds'      => true,
                                              'pages'      => true
                                              ),
                           'show_in_menu'      => true,
                           'show_in_admin_bar' => true,
                           'has_archive'       => 'opinion',
                           'query_var'         => true,
                           'supports' => array(
                                               'title',
                                               'editor',
                                               'author',
                                               'thumbnail',
                                               'excerpt',
                                               'comments',
                                               'revisions'
                                               ),
                           'taxonomies' => array(
                                                 'category',
                                                 'post_tag'
                                                 ),
                           'show_ui'           => true,
                           'can_export'        => true,
                           'show_in_nav_menus' => false,
                           '_edit_link'        => 'post.php?post=%d',
                           'description'       => 'This is an article from the Opinion Desk.'
                           )
  );


  /**
   * Multimedia
   */
  register_post_type( 'multimedia',
                     array(
                           'labels' => array(
                                             'name'               => 'Multimedia',
                                             'singular_name'      => 'Multimedia',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       =>
                                             'Add New Multimedia',
                                             'edit_item'          => 'Edit Multimedia',
                                             'new_item'           => 'New Multimedia',
                                             'view_item'          => 'View Multimedia',
                                             'search_items'       => 'Search Multimedia',
                                             'not_found'          => 'No Multimedia Found',
                                             'not_found_in_trash' => 'No Multimedia Found In Trash',
                                             'parent_item_colon'  => 'Parent Multimedia:',
                                             'menu_name'          => 'Multimedia'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'multimedia',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => 'multimedia',
                     'query_var'         => true,
                     'supports' => array(
                                         'title',
                                         'author',
                                         'thumbnail',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d',
                     'description'       => 'This is an article from the Multimedia Desk.'
                     )
  );


  /**
   * Slideshows
   */
  register_post_type( 'slideshow',
                     array(
                           'labels' => array(
                                             'name'               => 'Slideshows',
                                             'singular_name'      => 'Slideshow',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Slideshow',
                                             'edit_item'          => 'Edit Slideshow',
                                             'new_item'           => 'New Slideshow',
                                             'view_item'          => 'View Slideshow',
                                             'search_items'       => 'Search Slideshows',
                                             'not_found'          => 'No Slideshows Found',
                                             'not_found_in_trash' => 'No Slideshow Found In Trash',
                                             'parent_item_colon'  => 'Parent Slideshows:',
                                             'menu_name'          => 'Slideshows'
                                             ),
                           'publicly_queryable'  => true,
                           'exclude_from_search' => false,
                           'capability_type'     => 'post',
                           'hierarchical'        => false,
                           'public'              => true,
                           'rewrite' => array(
                                              'slug'       => 'slideshows',
                                              'with_front' => false,
                                              'feeds'      => true,
                                              'pages'      => true
                                              ),
                           'show_in_menu'      => true,
                           'show_in_admin_bar' => true,
                           'has_archive'       => 'slideshows',
                           'query_var'         => true,
                           'supports' => array(
                                               'title',
                                               'editor',
                                               'author',
                                               'thumbnail',
                                               'comments',
                                               'revisions'
                                               ),
                           'taxonomies' => array(
                                                 'category',
                                                 'post_tag'
                                                 ),
                           'show_ui'           => true,
                           'can_export'        => true,
                           'show_in_nav_menus' => false,
                           '_edit_link'        => 'post.php?post=%d',
                           'description'       => 'These are slideshow posts from the Photo Desk.'
                           )
  );


  /**
   * Print Editions
   */
  register_post_type( 'print_edition',
                     array(
                           'labels' => array(
                                             'name'               => 'Print Editions',
                                             'singular_name'      => 'Print Edition',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Print Edition',
                                             'edit_item'          => 'Edit Print Edition',
                                             'new_item'           => 'New Print Edition',
                                             'view_item'          => 'View Print Edition',
                                             'search_items'       => 'Search Print Editions',
                                             'not_found'          => 'No Print Editions Found',
                                             'not_found_in_trash' => 'No Print Editions Found In Trash',
                                             'parent_item_colon'  => 'Parent Print Editions:',
                                             'all_items'          => 'All Print Editions',
                                             'menu_name'          => 'Print Editions'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => true,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'print',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => false,
                     'query_var'         => true,
                     'supports' => array('title',
                                         'editor',
                                         'thumbnail',
                                         'comments',
                                         'page-attributes'
                                         ),
                     'taxonomies' => array(
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d',
                     'description'       => 'This is a post with info about the Temple News print edition. Mainly the issuu embed code.'
                     )
  );


  /**
   * Food Vendors
   */
  register_post_type( 'food_vendor',
                     array(
                           'labels' => array(
                                             'name'               => 'Food Vendors',
                                             'singular_name'      => 'Food Vendor',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Food Vendor',
                                             'edit_item'          => 'Edit Food Vendor',
                                             'new_item'           => 'New Food Vendor',
                                             'view_item'          => 'View Food Vendor',
                                             'search_items'       => 'Search Food Vendors',
                                             'not_found'          => 'No Food Vendors Found',
                                             'not_found_in_trash' => 'No Food Vendor Found In Trash',
                                             'parent_item_colon'  => 'Parent Food Vendors:',
                                             'menu_name'          => 'Food Vendors'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'food_vendor',
                                        'with_front' => false,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => true,
                     'query_var'         => true,
                     'supports' => array(
                                         'title',
                                         'editor',
                                         'thumbnail',
                                         'excerpt',
                                         'trackbacks',
                                         'custom-fields',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui'           => true,
                     'can_export'        => true,
                     'show_in_nav_menus' => false,
                     '_edit_link'        => 'post.php?post=%d'
                     )
  );


  /**
   * Essays
   */
  register_post_type( 'essay',
                     array(
                           'labels' => array(
                                             'name' => 'Essays',
                                             'singular_name' => 'Essay',
                                             'add_new' => 'Add New',
                                             'add_new_item' => 'Add New Essay',
                                             'edit_item' => 'Edit Essay',
                                             'new_item' => 'New Essay',
                                             'view_item' => 'View Essay',
                                             'search_items' => 'Search Essays',
                                             'not_found' => 'No Essays Found',
                                             'not_found_in_trash' => 'No Essays Found In Trash',
                                             'parent_item_colon' => 'Parent Essays:',
                                             'all_items' => 'All Essays',
                                             'menu_name' => 'Essays'
                                             ),
                     'publicly_queryable' => true,
                     'exclude_from_search' => false,
                     'capability_type' => 'post',
                     'hierarchical' => false,
                     'public' => true,
                     'rewrite' => array(
                                        'slug' => 'essay',
                                        'with_front' => false,
                                        'feeds' => true,
                                        'pages' => true
                                        ),
                     'show_in_menu' => true,
                     'show_in_admin_bar' => true,
                     'has_archive' => false,
                     'query_var' => true,
                     'supports' => array(
                                         'title',
                                         'editor',
                                         'author',
                                         'thumbnail',
                                         'excerpt',
                                         'trackbacks',
                                         'custom-fields',
                                         'comments',
                                         'revisions'
                                         ),
                     'taxonomies' => array(
                                           'category',
                                           'post_tag'
                                           ),
                     'show_ui' => true,
                     'can_export' => true,
                     'show_in_nav_menus' => false,
                     '_edit_link' => 'post.php?post=%d'
                     )
  );

}
