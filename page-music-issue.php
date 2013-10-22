<?php
/*
Template Name: Music Issue
*/
?>

<?php get_template_part('templates/head'); ?>

      <div id="content" class="music-issue music-issue-archive has-banner clearfix">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <header id="page-header">

            <div class="special-issue-text-banner-container wrap clearfix">
              <h2 class="music-issue-text-banner special-issue-text-banner headline fittext"><a href="<?php echo home_url(); ?>/music-issue/"><?php the_title(); ?></a></h2>
            </div>

            <div id="special-issue-description">
              <?php the_content(); ?>
            </div> <!-- end #special-issue-description -->

          </header> <!-- end #page-header -->

        <?php endwhile; endif; ?>

        <div id="inner-content" class="wrap clearfix">

          <div id="main" class="clearfix" role="main">

            <section class="mason twelvecol first last clearfix">

              <?php

              $args = array(
                'post_type'     => 'article_ae',
                'category_name' => 'music-issue-music',
                'year'          => MUSIC_ISSUE_YEAR
              );

              $query = new WP_Query($args);

              if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

              ?>

                <article id="post-<?php echo $post->ID ?>" class="box free-mason <?php echo ttn_gs_column_width(6, 'mason'); ?> clearfix" role="article">

                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="featured-image-container box">
                      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('zom-landscape-576'); ?></a>
                    </div>
                  <?php } ?>

                  <h1 class="headline h2 box"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                  <section class="dek">
                    <?php the_excerpt(); ?>
                  </section> <!-- end .dek -->

                </article> <!-- end article -->

              <?php endwhile; endif;

              wp_reset_postdata(); ?>

            </section> <!-- end #essay-feed -->

          </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

      </div> <!-- end #content -->


