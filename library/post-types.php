<?php


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
   * Lifestyle Articles
   *
   * Formerly known as Living Articles, for the Living Section. The post type
   * name should most likely not be changed unless you're up for some SQL
   * wrangling. Changing `article_living` to anything but that could cause
   * issues. In the admin interface, however, references to Living are changed
   * to Lifestyle wherever possible.
   *
   * Also, in the future, if an EIC wants to change the name of a section, warn
   * them strongly against doing so.
   */
  register_post_type( 'article_living',
                     array(
                           'labels' => array(
                                             'name'               => 'Lifestyle',
                                             'singular_name'      => 'Lifestyle',
                                             'add_new'            => 'Add New',
                                             'add_new_item'       => 'Add New Lifestyle Article',
                                             'edit_item'          => 'Edit Lifestyle Article',
                                             'new_item'           => 'New Lifestyle Article',
                                             'view_item'          => 'View Lifestyle Article',
                                             'search_items'       => 'Search Lifestyle Articles',
                                             'not_found'          => 'No Lifestyle Articles Found',
                                             'not_found_in_trash' => 'No Lifestyle Article Found In Trash',
                                             'parent_item_colon'  => 'Parent Lifestyle Articles:',
                                             'menu_name'          => 'Lifestyle Articles'
                                             ),
                     'publicly_queryable'  => true,
                     'exclude_from_search' => false,
                     'capability_type'     => 'post',
                     'hierarchical'        => false,
                     'public'              => true,
                     'rewrite' => array(
                                        'slug'       => 'lifestyle',
                                        'with_front' => true,
                                        'feeds'      => true,
                                        'pages'      => true
                                        ),
                     'show_in_menu'      => true,
                     'show_in_admin_bar' => true,
                     'has_archive'       => 'lifestyle',
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
                     'description'       => 'This is an article from the Lifestyle Desk.'
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


  /**
   * Banners
   */
  $banner_labels = array(
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
  $banner_args = array(
      'label'               => 'banner',
      'description'         => 'Top-of-site banners, including breaking news and promotions.',
      'labels'              => $banner_labels,
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
  register_post_type( 'banner', $banner_args );

} // don't touch this


// Hook into the 'init' action
add_action( 'init', 'zombie_register_custom_post_types', 0 );
