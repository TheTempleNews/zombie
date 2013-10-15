<header class="banner" role="banner">
	<div class="banner__inner container">
		<a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
		<a class="btn btn--navbar menu-link" data-toggle="collapse" data-target=".nav-collapse">
			<i class="icon-menu">Menu</i>
			<span class="accessibility">Menu</span>
		</a>
		<nav class="main-nav" role="navigation">
			<?php
				if (has_nav_menu('primary_navigation')) :
					wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-nav__primary-navigation  level-1  nav'));
				endif;
			?>
		</nav>
	</div>
</header>