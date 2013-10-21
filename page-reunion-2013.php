<?php
/**
 * The Reunion 2013 Template
 */

/**
 * Require Reunion 2013 specific functions.
 */
require_once('library/inc/special-issues/reunion-2013/reunion-2013-functions.php');

?>

<?php get_header(); ?>

<main class="content" id="content" role="main">
  <div class="content__inner" id="content__inner">

    <div class="special-issue-banner--reunion-2013  special-issue-banner clearfix">
      <h2 class="fittext">The Temple News Reunion 2013</h2>
    </div>

    <div class="reunion-2013-intro">

      <?php

      $intro_args = array(
                          'name' => 'getting-reacquainted'
                          );

      $intro_query = new WP_Query($intro_args);

      if ( $intro_query->have_posts() ) : while ( $intro_query->have_posts() ) : $intro_query->the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix slug-' . ttn_get_the_slug('post')); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

          <header class="article__header">
            <h1 class="article__header__title  headline" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <div class="article__header__dek  dek">
              <?php the_excerpt(); ?>
            </div> <!-- end dek -->
          </header> <!-- end article header -->

          <section class="post-content" itemprop="articleBody">
            <?php the_content(); ?>
          </section> <!-- end article section -->

        </article> <!-- end article -->

      <?php
      endwhile;
      endif;
      ?>

    </div>

    <div class="reunion-2013-articles  grid">

      <?php
      $id = zombie_get_post_by_title('getting-reacquainted', 'post');
      echo $id;
      $main_args = array(
                         'category_name' => 'reunion-2013',
                         'post__not_in'  => array (
                                                   47623
                                                   ),
                         'orderby'       => 'rand'
                         );

      $main_query = new WP_Query($main_args);

      if ( $main_query->have_posts() ) : while ( $main_query->have_posts() ) : $main_query->the_post();
        ?><article id="post-<?php the_ID(); ?>" <?php post_class('desk--one-half  grid__item  slug-' . ttn_get_the_slug('post')); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

          <header class="article__header">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="featured-image-container">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
              </div>
            <?php endif; ?>
            <h1 class="article__header__title  headline" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <div class="article__header__dek  dek">
              <?php the_excerpt(); ?>
            </div>
          </header>

        </article><?php
      endwhile;
      endif;
      ?>

    </div>


    <div id="timeline-embed"></div>

  </div>
</main>

<?php get_footer(); ?>
