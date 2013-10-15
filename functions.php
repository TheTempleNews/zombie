<?php

/**
 * Roots includes
 */
require_once locate_template('/lib/utils.php');           // Utility functions
require_once locate_template('/lib/init.php');            // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');         // Theme wrapper class
require_once locate_template('/lib/sidebar.php');         // Sidebar class
require_once locate_template('/lib/config.php');          // Configuration
require_once locate_template('/lib/login.php');           // Login page
require_once locate_template('/lib/activation.php');      // Theme activation
require_once locate_template('/lib/titles.php');          // Page titles
require_once locate_template('/lib/cleanup.php');         // Cleanup
require_once locate_template('/lib/nav.php');             // Custom nav modifications
require_once locate_template('/lib/gallery.php');         // Custom [gallery] modifications
require_once locate_template('/lib/comments.php');        // Custom comments modifications
require_once locate_template('/lib/rewrites.php');        // URL rewriting for assets
require_once locate_template('/lib/relative-urls.php');   // Root relative URLs
require_once locate_template('/lib/widgets.php');         // Sidebars and widgets
require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets


require_once locate_template('/lib/custom.php');          // Custom functions


/*
5. THE ZOMBIE LOOP
	- contains custom loops
		- for home
		- for sections
*/
require_once('library/inc/zombie-loop.php');
/*
/*
8. ZOMBIE CONFIGURATION (library/inc/zombie-conf.php)
*/
require_once('library/inc/zombie-conf.php');
/*
9. SPECIAL ISSUES FUNCTIONS (library/inc/special-issues/special-issues.php)
*/
require_once('library/inc/special-issues/special-issues.php');


