<?php ttn_special_issue_banner(); ?>

<!-- FEATURED CONTENT -->
<div id="featured-content-banner" class="pane  featured-content-banner">
  <h2 class="pane__title  accessibility">Featured Content</h2>
</div> <!-- end #featured-content-banner -->

<div class="region-alpha  grid">
  <section id="home-featured" class="home-featured  grid__item  desk--one-half">
    <div class="inner">

      <!-- FEATURED EDITORIAL -->
      <section id="box-featured-editorial" class="box box-featured clearfix">
        <h2 class="box-featured-title box-title">Featured Editorial</h2>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'top-multimedia-article clearfix' ); ?> role="article">
          <?php
          $feat_editorial_query = new WP_Query( array(
                              'category__and'  => array(3, 28),
                              'post_type'      => 'article_opinion',
                              'posts_per_page' => 1
                                               )
          );

          if ($feat_editorial_query->have_posts()) : while ($feat_editorial_query->have_posts()) : $feat_editorial_query->the_post();
          ?>

            <h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <div class="dek">
              <?php the_excerpt(); ?>
            </div> <!-- end dek -->

          <?php
          endwhile;
          endif;
          ?>
        </article>
      </section>

      <!-- FEATURED MULTIMEDIA -->
      <div id="home-featured-multimedia" class="home-featured-multimedia  pane--section  pane">
        <h2 class="pane--section__title  pane__title">Featured Multimedia</h2>
          <?php

          $featured_video = new WP_Query( array(
              'cat' => 3,
              'post_type' => 'multimedia',
              'posts_per_page' => 1
            )
          );

          if ($featured_video->have_posts()) : while ($featured_video->have_posts()) : $featured_video->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'home-featured-multimedia__article' ); ?> role="article">

              <?php
              // http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/
              // Get the video URL and put it in the $video variable
              $videoID = get_post_meta($post->ID, 'video_link', true);
              // Check if there is in fact a video URL
              if ($videoID) {
                // Echo the embed code via oEmbed
                echo wp_oembed_get( $videoID );
              }
              ?>

              <h1 class="headline"><a href="<?php get_post_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(!$echo); ?>"><?php get_the_title(); ?></a></h1>

            </article>
          <?php endwhile; endif; wp_reset_postdata(); ?>
      </div> <!-- end #section-box-multimedia -->


      <!-- FEATURED SLIDESHOW -->
      <div id="home-featured-slideshow" class="home-featured-slideshow  pane  pane--section">
        <h2 class="pane--section__title  pane__title">Featured Slideshow</h2>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'home-featured-slideshow__article' ); ?> role="article">
          <?php
          $featured_slideshow = new WP_Query( array(
              'cat' => 3,
              'post_type' => 'slideshow',
              'posts_per_page' => 1
            )
          );

          if ($featured_slideshow->have_posts()) : while ($featured_slideshow->have_posts()) : $featured_slideshow->the_post();
          ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_post_thumbnail('zom-landscape-576'); ?>
            </a>

            <h1 class="headline"><a href="<?php get_post_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(!$echo); ?>"><?php get_the_title(); ?></a></h1>

          <?php endwhile; endif; wp_reset_postdata(); ?>

        </article> <!-- end article -->
      </div> <!-- end #section-box-featured-slideshow -->

      <div id="widgetized-front-center" class="widgetized-front-center">
        <?php get_sidebar('home'); ?>
      </div>

    </div> <!-- end .home-featured-box .inner -->
  </section><!-- end .home-featured-box --><!--





  --><div id="home-column-left" class="home-column-left  column  grid__item  desk--one-half">
    <div class="inner  grid">

      <!-- NEWS SECTION -->
      <section id="home-pane-news" class="home-pane--news  home-pane  section-pane  pane  grid__item">

          <?php the_zombie_loop('news'); ?>

          <div id="broadcecil-feed" class="ttn-network-feed">
            <h3 class="broadcecil-feed-title network-feed-title"><a href="http://broadandcecil.temple-news.com/" title="Broad &amp; Cecil">Broad &amp; Cecil</a></h3>
            <h4 class="broadandcecil-feed-subtitle network-feed-subtitle">The news blog of The Temple News</h4>
            <?php ttn_network_feed('broadandcecil'); ?>
          </div> <!-- end #broadcecil-feed -->

      </section><!-- end #section-box-news

      DESKTOP-ONLY ADS
      <?php /* if ( !is_handheld() ) : ?>
        <div class="ad-pane">
          <div class="ad  ad--rect">
            <!-- NSSportsBoxR -->
            <div id='div-gpt-ad-1342714724220-5' style='width:300px; height:250px; margin:0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-5'); });
            </script>
            </div>
          </div>
        </div>
      <?php endif; */ ?>

      LIVING SECTION
      --><section id="home-pane-living" class="home-pane--living  home-pane  section-pane  pane  grid__item">
        <?php the_zombie_loop('living'); ?>
      </section><!-- end #section-box-living


      SPORTS SECTION
      --><section id="home-pane-sports" class="home-pane--sports  home-pane  section-pane  pane  grid__item">

          <?php the_zombie_loop('sports'); ?>

          <div id="thecherry-feed" class="ttn-network-feed">
            <h3 class="thecherry-feed-title network-feed-title"><a href="http://thecherry.temple-news.com/">The Cherry</a></h3>
            <h4 class="thecherry-feed-subtitle network-feed-subtitle">The sports blog of The Temple News</h4>
            <?php ttn_network_feed('thecherry'); ?>
          </div> <!-- end #thecherry-feed -->

      </section><!-- end #section-box-sports

      DESKTOP-ONLY ADS
      <?php /* if ( !is_handheld() ) : ?>
        <div class="ad-container rectangle-ad-container">
          <div class="ad adsense rectangle-ad">

            <!-- NSNewsBoxL -->
            <div id='div-gpt-ad-1342714724220-1' style='width:300px; height:250px; margin:0 auto;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-1'); });
            </script>
            </div>

          </div>

        </div>
      <?php endif; */ ?>

      A&E SECTION
                  // Get the video URL
      --><section id="home-pane-ae" class="home-pane--ae  home-pane  section-pane  pane">
        <?php the_zombie_loop('ae'); ?>
      </section><!-- end #section-box-ae -->

    </div> <!-- end column-right-inner -->
  </div> <!-- column-right -->



  <!-- DESKTOP-ONLY ADS -->
  <?php /* if ( !is_handheld() ) : ?>
  <div class="ad-container twelvecol first last ">
    <div class="advert banner-ad">

    <!-- NSOpinionBar -->
    <div id='div-gpt-ad-1342714724220-2' style='width:728px; height:90px; margin:0 auto;'>
    <script type='text/javascript'>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-2'); });
    </script>
    </div>

    </div>
  </div>
  <?php endif; */ ?>

</div><!-- end .region-alpha -->



<!-- OPINION SECTION -->
<section id="section-box-opinion" class="pane  section-container section-box">

  <?php the_zombie_loop( 'opinion', 6 ); ?>

</section> <!-- end #section-box-opinion -->



<!-- MULTIMEDIA SECTION -->
<section id="section-box-multimedia" class="pane  section-box section-container">
  <h2 class="section-box-title"><a href="<?php get_site_url(); ?>/multimedia/">Multimedia</a></h2>


    <?php // no reason to change this stuff
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $top_article_class = 'top-' . $post_type;

    // sets up counter to display first post differently (see TOP ARTICLE)
    $firstpost = 'firstpost';

    $multimedia_query = new WP_Query( array(
      'post_type'     => 'multimedia',
      'posts_per_page' => 5
      )
    );

    ?>


    <div id="multimedia-mgallery" class="mgallery">

      <div class="multimedia-mgallery-top">

        <?php // begin the loop, generated by the gd cpt plugin
        if ( $multimedia_query->have_posts() ) : while ( $multimedia_query->have_posts() ) : $multimedia_query->the_post();

        if ( $firstpost == 'firstpost' ) { ?>

          <?php $firstpost = ''; ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

            <?php
            // http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/
            // Get the video URL and put it in the $video variable
            $videoID = get_post_meta($post->ID, 'video_link', true);
            // Check if there is in fact a video URL
            if ($videoID) {
              // Echo the embed code via oEmbed
              echo wp_oembed_get( $videoID );
            } ?>

            <header class="">
              <!-- <div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div> -->
              <h2 class="home-multimedia-headline multimedia-headline home-multimedia-top-headline multimedia-top-headline headline top-headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <?php /* <p class="home-multimedia-byline byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="home-multimedia-authors multimedia-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ) ?></time> */ ?>
            </header>

            <section class="home-multimedia-summary home-media-summary multimedia-summary media-summary ">
              <?php get_post_meta($post->ID, 'media_dek', true); ?>
            </section> <!-- end multimedia-dek -->

          </article> <!-- end article -->

        <?php } // end first post

        endwhile; endif; // close loop

        rewind_posts(); // start the loop over again ?>

      </div> <!-- end #post-type-loop-top -->


      <div class="multimedia-mgallery-main">

        <?php // begin the loop again

        $firstpost = 'firstpost';

        if ( $multimedia_query->have_posts() ) : while ( $multimedia_query->have_posts() ) : $multimedia_query->the_post();

          if ( $firstpost == 'firstpost' ) {
            $firstpost = '';
          }

          else { // all non-first posts format

            ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

                <div class="video-thumbnail-container">

                  <?php
                  // Use a fallback image for video thumbnails in case
                  // the Video Thumbnails plugin doesn't do its job
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('zom-landscape-396');
                  } else {
                    echo '<img width="396" height="264" src="' . get_template_directory_uri() . '/assets/img/fallback.png" class="wp-image-fallback" alt="This article has no featured image.">';
                  }
                  ?>

                </div>

                <header>
                  <div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
                  <h2 class="home-multimedia-headline multimedia-headline headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  <?php /* <p class="home-multimedia-byline multimedia-byline byline"><i><?php _e("by", "zombietheme"); ?></i> <span class="home-multimedia-authors multimedia-authors authors"><?php if(function_exists('coauthors')) coauthors(); else the_author(); ?></span> <time class="sc" datetime="<?php echo the_time('c'); ?>" pubdate><?php echo get_the_time( 'd F Y' ); ?></time> */ ?>
                </header>

                <div class="multimedia-dek dek">
                  <?php echo get_post_meta($post->ID, 'media_dek', true); ?>
                </div> <!-- end multimedia-dek -->

            </article><?php

            } // end non-first posts

        endwhile; endif; wp_reset_postdata();

        ?>

      </div> <!-- end #post-type-loop-main -->
    </div> <!-- end #multimedia-mgallery -->
</section> <!-- end #section-box-multimedia -->





<!-- SLIDESHOWS SECTION -->
<section id="section-box-slideshows" class="pane  section-box section-container">
  <h2 class="section-box-title"><a href="<?php get_site_url(); ?>/slideshows/">Slideshows</a></h2>

    <?php // no reason to change this stuff
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $top_article_class = 'top-' . $post_type;

    $slideshows_query = new WP_Query( array(
      'post_type'     => 'slideshow',
      'posts_per_page' => 6
      )
    );

    ?>

    <div id="slideshows-mgallery" class="mgallery">
      <div class="slideshows-mgallery-main">

        <?php

        if ( $slideshows_query->have_posts() ) : while ( $slideshows_query->have_posts() ) : $slideshows_query->the_post();

          ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

            <div class="slideshows-thumbnail-container">
              <?php
              // Use a fallback image for video thumbnails in case
              // the Video Thumbnails plugin doesn't do its job
              if (has_post_thumbnail()) {
                the_post_thumbnail('zom-landscape-396');
              } else {
                echo '<img width="396" height="264" src="' . get_template_directory_uri() . '/assets/img/fallback.png" class="wp-image-fallback" alt="This article has no featured image.">';
              }
              ?>
            </div>

              <div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
              <h2 class="home-slideshows-headline slideshows-headline headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

            <div class="slideshows-dek dek">
              <?php echo get_post_meta($post->ID, 'media_dek', true); ?>
            </div> <!-- end slideshows-dek -->

          </article><?php

          endwhile; endif;

          ?>

      </div> <!-- end #post-type-loop-main -->

    </div> <!-- end #slideshows-mgallery -->

</section> <!-- end #section-box-slideshows -->


