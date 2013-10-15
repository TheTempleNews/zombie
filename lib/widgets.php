<?php
/**
 * Register sidebars and widgets
 */
function zombie_widgets_init() {
	// Sidebars
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

	// Widgets
	register_widget('Roots_Vcard_Widget');
}
add_action('widgets_init', 'zombie_widgets_init');

/**
 * Example vCard widget
 */
class Roots_Vcard_Widget extends WP_Widget {
	private $fields = array(
		'title'          => 'Title (optional)',
		'street_address' => 'Street Address',
		'locality'       => 'City/Locality',
		'region'         => 'State/Region',
		'postal_code'    => 'Zipcode/Postal Code',
		'tel'            => 'Telephone',
		'email'          => 'Email'
	);

	function __construct() {
		$widget_ops = array('classname' => 'widget_zombie_vcard', 'description' => __('Use this widget to add a vCard', 'zombie'));

		$this->WP_Widget('widget_zombie_vcard', __('Roots: vCard', 'zombie'), $widget_ops);
		$this->alt_option_name = 'widget_zombie_vcard';

		add_action('save_post', array(&$this, 'flush_widget_cache'));
		add_action('deleted_post', array(&$this, 'flush_widget_cache'));
		add_action('switch_theme', array(&$this, 'flush_widget_cache'));
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_zombie_vcard', 'widget');

		if (!is_array($cache)) {
			$cache = array();
		}

		if (!isset($args['widget_id'])) {
			$args['widget_id'] = null;
		}

		if (isset($cache[$args['widget_id']])) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args, EXTR_SKIP);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'zombie') : $instance['title'], $instance, $this->id_base);

		foreach($this->fields as $name => $label) {
			if (!isset($instance[$name])) { $instance[$name] = ''; }
		}

		echo $before_widget;

		if ($title) {
			echo $before_title, $title, $after_title;
		}
	?>
		<p class="vcard">
			<a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
			<span class="adr">
				<span class="street-address"><?php echo $instance['street_address']; ?></span><br>
				<span class="locality"><?php echo $instance['locality']; ?></span>,
				<span class="region"><?php echo $instance['region']; ?></span>
				<span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
			</span>
			<span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
			<a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
		</p>
	<?php
		echo $after_widget;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_zombie_vcard', $cache, 'widget');
	}

	function update($new_instance, $old_instance) {
		$instance = array_map('strip_tags', $new_instance);

		$this->flush_widget_cache();

		$alloptions = wp_cache_get('alloptions', 'options');

		if (isset($alloptions['widget_zombie_vcard'])) {
			delete_option('widget_zombie_vcard');
		}

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_zombie_vcard', 'widget');
	}

	function form($instance) {
		foreach($this->fields as $name => $label) {
			${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'zombie'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
		</p>
		<?php
		}
	}
}

