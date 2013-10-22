<?php

register_taxonomy( 'movers-shakers-people',
                  array(
                        'article_living'
                        ),
                  array(
                        'hierarchical' => false,
                        'rewrite' => array(
                                           'hierarchical' => false,
                                           'with_front'   => true,
                                           'slug'         => 'movers-shakers-people'
                                           ),
                        'query_var'         => true,
                        'public'            => true,
                        'show_ui'           => true,
                        'show_tagcloud'     => true,
                        'show_admin_column' => false,
                        'labels' => array(
                                          'name' => 'Moving and Shaking People',
                                          'singular_name' => 'Moving and Shaking Person',
                                          'search_items' => 'Search Moving and Shaking People',
                                          'popular_items' => 'Popular Moving and Shaking People',
                                          'all_items' => 'All Moving and Shaking People',
                                          'parent_item' => 'Parent Moving and Shaking Person',
                                          'parent_item_colon' => 'Parent Moving and Shaking Person:',
                                          'edit_item' => 'Edit Moving and Shaking Person',
                                          'view_item' => 'View Moving and Shaking Person',
                                          'update_item' => 'Update Moving and Shaking Person',
                                          'add_new_item' => 'Add New Moving and Shaking Person',
                                          'new_item_name' => 'New Moving and Shaking Person Name',
                                          'separate_items_with_commas' => 'Separate Moving and Shaking People with commas',
                                          'add_or_remove_items' => 'Add or remove Moving and Shaking People',
                                          'choose_from_most_used' => 'Choose from the most used Moving and Shaking People',
                                          'menu_name' => 'Moving and Shaking People'
                                          ),
                        'capabilities' => array(
                                                'manage_terms' => 'manage_categories',
                                                'edit_terms' => 'manage_categories',
                                                'delete_terms' => 'manage_categories',
                                                'assign_terms' => 'manage_categories'),
                                                'show_in_nav_menus' => false
                                                )
 );
