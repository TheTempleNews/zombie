<article <?php post_class('slug-' . ttn_get_the_slug('post') . ' panel  panel--' . ttn_get_the_slug('post')); ?>>

  <div class="panel__inner">

    <header class="panel__header">
      <h1 class="panel__header__post-title  post-title"><?php the_title(); ?></h1>
    </header><!--

    --><section class="<?php echo 'panel__content  panel--' . ttn_get_the_slug('post') . '__content' ?>">

      <div class="tablepress-container">
        <?php echo do_shortcode( '[table id=1 /]' ); ?>
      </div><!--
      --><div class="tablepress-container">
        <?php echo do_shortcode( '[table id=2 /]' ); ?>
      </div>

    </section><!--

  --></div><!--

  --><a class="panel__read-more  accessibility" href="<?php the_permalink(); ?>">Read More</a>

</article>
