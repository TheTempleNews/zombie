<?php
/*
Template Name: Lunchies
*/
?>

<?php get_template_part('templates/head'); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

          <div class="lunchies-top-promo">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banners/lunchies/lunchies-banner-<?php echo LUNCHIES_YEAR; ?>.png" alt="Lunchies <?php echo LUNCHIES_YEAR; ?>" />
          </div>




          <div class="lunchies-main first eightcol">

            <div class="lunchies-summary">
              <p>Every year, The Temple News dedicates an issue to appreciate the food trucks and vendors that are a staple of Main Campus culture. Whether it’s the no-name carts that make sure the food speaks for itself, the “Buszes” that are slowly monopolizing Norris Street, or one of the veteran food spots on the 12th Street Food Vendor Pad, there are options for everyone.</p>
              <p>In this year’s Lunchies, you will learn about new trucks that have opened in the last year, find out how to eat on any budget and spend a day with the couple that runs the Five Dollar Foot Long truck. Most importantly, once you flip the page you’ll be introduced to the winner of this year’s Lunchies Awards and the rest of the Top 10, which features new trucks that have knocked a few Lunchies regulars off our list this year.</p>
              <p>Join The Temple News as it continues to be the eyes, ears and taste buds of the Temple community.</p>
              <p>—Luis Fernando Rodriguez, Living Editor</p>
            </div>

            <div class="lunchies-map">

              <?php // The Map

              $map_args = array(
                'map_post_type'           => 'food_vendor',
                'map_content'             => 'global',
                'auto_info_open'          => false,
                'marker_select_highlight' => true,
                'marker_select_center'    => true,
                'remove_geo_mashup_logo'  => false,
              );

              // Invoke the map
              echo GeoMashup::map($map_args);

              ?>

            </div> <!-- /.lunchies-map -->

            <h2 id="headline-voters-map" class="fittext">You put them on the map</h2>

            <div class="rank-voters-container clearfix">

              <div class="rank-voters-firstcol first sixcol clearfix">
                <ul class="rank-voters-list-first rank-voters-list">
                  <?php // Vendors: Voters' Rankings (first 5)

                  $voter_args_first = array(
                    'post_type'      => 'food_vendor',
                    'category_name'  => 'voters-ranking',
                    'year'           => LUNCHIES_YEAR,
                    'posts_per_page' => 5,
                    'meta_key'       => 'lunchies_rank_voter',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'ASC'
                  );

                  $lunchies_rank_voters_first_query = get_posts($voter_args_first);

                  // Begin first column of the voters' ranking loop
                  foreach($lunchies_rank_voters_first_query as $post) : setup_postdata($post); ?>

                  <li class="rank-voters-item clearfix">
                    <div class="rank-voters-item-rank-container">
                      <div class="rank-voters-item-rank"><?php echo get_post_meta( $post->ID, 'lunchies_rank_voter', true ); ?></div>
                      <div class="rank-voters-item-percent"><?php echo get_post_meta( $post->ID, 'lunchies_vote_percent', true ) . '%'; ?></div>
                    </div>

                    <div class="rank-voters-item-info">
                      <h3 class="rank-voters-item-title fittext"><?php the_title(); ?></h3>

                      <?php if ( get_post_meta( $post->ID, 'address_street' ) == true ) { ?>
                        <span class="rank-voters-item-address-1"><?php echo get_post_meta( $post->ID, 'address_street', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'address_street_2' ) == true ) { ?>
                        <span class="rank-voters-item-address-2"><?php echo get_post_meta( $post->ID, 'address_street_2', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_owner' ) == true ) { ?>
                        <span class="rank-voters-item-lunchies-owner"><strong>Owner: </strong><?php echo get_post_meta( $post->ID, 'lunchies_owner', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_founded' ) == true ) { ?>
                        <span class="rank-voters-item-lunchies-founded"><strong>Founded: </strong><?php echo get_post_meta( $post->ID, 'lunchies_founded', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_pricerange' ) == true ) { ?>
                        <span class="rank-voters-item-pricerange"><strong>Price Range: </strong><?php echo get_post_meta( $post->ID, 'lunchies_pricerange', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_signature' ) == true ) { ?>
                        <span class="rank-voters-item-signature"><strong>Signature Item: </strong><?php echo get_post_meta( $post->ID, 'lunchies_signature', true ); ?></span><?php } ?>
                    </div>
                  </li>

                  <?php endforeach; // End the first column of the voters' ranking loop ?>
                </ul>
              </div>


              <div class="rank-voters-secondcol last sixcol clearfix">
                <ul class="rank-voters-list-last rank-voters-list">
                  <?php // Vendors: Voters' Rankings (second 5)

                  $voter_args_first = array(
                    'post_type'      => 'food_vendor',
                    'category_name'  => 'voters-ranking',
                    'year'           => LUNCHIES_YEAR,
                    'posts_per_page' => 5,
                    'meta_key'       => 'lunchies_rank_voter',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'ASC',
                    'offset'         => 5
                  );

                  $lunchies_rank_voters_2nd_query = get_posts($voter_args_first);

                  // Begin 2nd column of the voters' ranking loop
                  foreach($lunchies_rank_voters_2nd_query as $post) : setup_postdata($post); ?>

                  <li class="rank-voters-item clearfix">
                    <div class="rank-voters-item-rank-container">
                      <div class="rank-voters-item-rank"><?php echo get_post_meta( $post->ID, 'lunchies_rank_voter', true ); ?></div>
                      <div class="rank-voters-item-percent"><?php echo get_post_meta( $post->ID, 'lunchies_vote_percent', true ) . '%'; ?></div>
                    </div>

                    <div class="rank-voters-item-info">
                      <h3 class="rank-voters-item-title fittext"><?php the_title(); ?></h3>

                      <?php if ( get_post_meta( $post->ID, 'address_street' ) == true ) { ?>
                        <span class="rank-voters-item-address-1"><?php echo get_post_meta( $post->ID, 'address_street', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'address_street_2' ) == true ) { ?>
                        <span class="rank-voters-item-address-2"><?php echo get_post_meta( $post->ID, 'address_street_2', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_owner' ) == true ) { ?>
                        <span class="rank-voters-item-lunchies-owner"><strong>Owner: </strong><?php echo get_post_meta( $post->ID, 'lunchies_owner', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_founded' ) == true ) { ?>
                        <span class="rank-voters-item-lunchies-founded"><strong>Founded: </strong><?php echo get_post_meta( $post->ID, 'lunchies_founded', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_pricerange' ) == true ) { ?>
                        <span class="rank-voters-item-pricerange"><strong>Price Range: </strong><?php echo get_post_meta( $post->ID, 'lunchies_pricerange', true ); ?></span><br /><?php } ?>
                      <?php if ( get_post_meta( $post->ID, 'lunchies_signature' ) == true ) { ?>
                        <span class="rank-voters-item-signature"><strong>Signature Item: </strong><?php echo get_post_meta( $post->ID, 'lunchies_signature', true ); ?></span><?php } ?>
                    </div>
                  </li>

                  <?php endforeach; // End the 2nd column of the voters' ranking loop ?>
                </ul>
              </div>

            </div>


            <div class="lunchies-articles clearfix">
            <?php include('library/inc/special-issues/lunchies/lunchies-2012.php'); ?>
            </div>



          </div> <!-- /.lunchies-main -->




          <div class="lunchies-sidebar last fourcol">

            <h2 id="headline-eds-list" class="slabtextthis">Our Top Ten</h2>

            <ul class="rank-eds-list">

            <?php // Vendors: Editors' Rankings

              $eds_args = array(
                'post_type'      => 'food_vendor',
                'category_name'  => 'editors-ranking',
                'year'           => LUNCHIES_YEAR,
                'posts_per_page' => 10,
                'meta_key'       => 'lunchies_rank_eds',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC'
              );

              $lunchies_rank_eds_query = get_posts($eds_args);

              // Begin the editors' ranking loop
              foreach($lunchies_rank_eds_query as $post) : setup_postdata($post); ?>


              <li class="rank-eds-item">
                <div class="rank-eds-item-head">
                  <div class="rank-eds-item-outer-circle">
                    <div class="rank-eds-item-inner-circle">
                      <span class="rank-eds-item-rank"><?php echo get_post_meta( $post->ID, 'lunchies_rank_eds', true ); ?></span>
                    </div>
                  </div>
                  <h3 class="rank-eds-item-title"><?php the_title(); ?></h3>
                </div>

                <div class="rank-eds-item-img">
                  <?php the_post_thumbnail('zom-landscape-396'); ?>
                </div>
              </li>

              <?php endforeach; // Close the editors' ranking loop ?>

            </ul>

          </div> <!-- /.lunchies-sidebar -->

        </div> <!-- end #inner-content -->

      </div> <!-- end #content -->


