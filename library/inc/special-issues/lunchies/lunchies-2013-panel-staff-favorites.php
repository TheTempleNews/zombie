<article <?php post_class('slug-' . ttn_get_the_slug('post') . ' panel  panel--' . ttn_get_the_slug('post')); ?>>

  <div class="panel__inner">

    <header class="panel__header">
      <h1 class="panel__header__post-title  post-title"><?php the_title(); ?></h1>
    </header><!--

    --><section class="<?php echo 'panel__content  panel--' . ttn_get_the_slug('post') . '__content' ?>">

      <?php if (get_field('lunchies_staff_fav')) : ?>

      <ul class="matrix three-cols staff-favorites-list">

        <?php while(has_sub_field('lunchies_staff_fav')) : ?>

          <li class="staff-favorites-list__item">

            <p class="staff-favorites-list__item__staff-member">
              <span class="staff-favorites-list__item__staff-member__name"><?php $staff_name = get_sub_field('lunchies_staff_fav_staff_name'); echo $staff_name['display_name']; ?></span><br />
              <span class="staff-favorites-list__item__staff-member__position"><?php the_sub_field('lunchies_staff_fav_staff_position') ?></span>
            </p>

            <div class="staff-favorites-list__item__image">
              <?php echo wp_get_attachment_image( get_sub_field('lunchies_staff_fav_image'), 'thumbnail' ); ?>
            </div>

            <div class="staff-favorites-list__item__caption">
              <span class="staff-favorites-list__item__caption__dish"><?php the_sub_field('lunchies_staff_fav_dish') ?></span><br />
              <span class="staff-favorites-list__item__caption__vendor"><?php the_sub_field('lunchies_staff_fav_vendor') ?></span>
            </div>
          </li>

        <?php endwhile; ?>

      </ul>

      <?php endif; ?>

    </section><!--

  --></div><!--

  --><a class="panel__read-more  accessibility" href="<?php the_permalink(); ?>">Read More</a>

</article>
