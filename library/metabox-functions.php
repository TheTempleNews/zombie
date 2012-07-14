<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'ZOMBIE_METABOX_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => $prefix . 'section',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Section (required)',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	// 'pages' => array( 'post', 'slider' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'side',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		// RADIO BUTTONS
		array(
			// 'name'		=> 'Section select',
			'id'		=> "{$prefix}section-select",
			'type'		=> 'radio',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'nw'			=> 'News<br />',
				'sp'			=> 'Sports<br />',
				'lv'			=> 'Living<br />',
				'ae'			=> 'Arts & Entertainment<br />',
				'op'			=> 'Opinion<br />'
			),
			'std'		=> 'nw',
			'desc'		=> 'Select one of these to determine where the article will display on the front page.<br /><br />N.B. This is not a replacement for selecting categories! Don\'t forget!'
		),
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function ZOMBIE_METABOX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'ZOMBIE_METABOX_register_meta_boxes' );

?>