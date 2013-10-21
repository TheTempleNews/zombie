<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert alert--warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->

  <?php
    do_action('get_header');
    // Use the navbar if enabled in config.php
    if (current_theme_supports('zombie-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div id="root" class="root  wrap  container" role="document">
    <div class="content  grid">
      <div class="main  grid__item  <?php echo zombie_main_class(); ?>" role="main">
        <div class="main__inner  pane">
          <?php include zombie_template_path(); ?>
        </div>
      </div><!-- /.main
    --><?php if (zombie_display_sidebar()) : ?><!--
      --><aside class="sidebar  grid__item  <?php echo zombie_sidebar_class(); ?>" role="complementary">
        <div class="sidebar__inner  pane">
          <?php include zombie_sidebar_path(); ?>
        </div>
      </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
    <div id="sticky-push"><!-- This is an empty div for our sticky footer. --></div>
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
