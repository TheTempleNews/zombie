<?php

/**
 * Returns the year of the most recent Living article in the Weekender category.
 *
 * The most recent should always be at the time of the last Weekender issue.
 */
function ttn_weekender_year() {
  $args = array(
    'post_type'     => 'article_living',
    'category_name' => 'weekender'
  );
  $query = get_posts($args);
  $most_recent = $query[0];
  $most_recent_post_date = $most_recent->post_date;
  $output = date( 'Y', strtotime( $most_recent_post_date ) );

  return $output;
}
define('WEEKENDER_YEAR', ttn_weekender_year());

/**
 * Returns the year of the most recent food_vendor post type.
 *
 * The most recent should always be at the time of the last lunchies issue.
 */
function lunchies_year() {
  $query = get_posts('post_type=food_vendor');
  $most_recent = $query[0];
  $most_recent_post_date = $most_recent->post_date;
  $output = date( 'Y', strtotime( $most_recent_post_date ) );

  return $output;
}
define('LUNCHIES_YEAR', lunchies_year());

/**
 * Returns the year of the most recent Movers & Shakers article.
 *
 * The most recent should always be at the time of the last Movers & Shakers issue.
 */
function ttn_movers_shakers_year() {
  $args = array(
    'post_type'     => 'article_living',
    //'category_name' => 'movers-shakers'
  );
  $query = get_posts($args);
  $most_recent = $query[0];
  $most_recent_post_date = $most_recent->post_date;
  $output = date( 'Y', strtotime( $most_recent_post_date ) );

  return $output;
}
define('MOVERS_SHAKERS_YEAR', ttn_movers_shakers_year());

/**
 * Returns the year of the most recent Bar Guide article.
 *
 * The most recent should always be at the time of the last Bar Guide issue.
 */
function ttn_bar_guide_year() {
  $args = array(
    'post_type'     => 'article_ae',
    'category_name' => 'bar-guide'
  );
  $query = get_posts($args);
  $most_recent = $query[0];
  $most_recent_post_date = $most_recent->post_date;
  $output = date( 'Y', strtotime( $most_recent_post_date ) );

  return $output;
}
define('BAR_GUIDE_YEAR', ttn_bar_guide_year());

/**
 * Returns the year of the most recent Music Issue article.
 *
 * The most recent should always be at the time of the last Music Issue.
 */
function ttn_music_issue_year() {
  $args = array(
    'post_type'     => 'article_ae',
    'category_name' => 'music-issue-music'
  );
  $query = get_posts($args);
  $most_recent = $query[0];
  $most_recent_post_date = $most_recent->post_date;
  $output = date( 'Y', strtotime( $most_recent_post_date ) );

  return $output;
}
define('MUSIC_ISSUE_YEAR', ttn_music_issue_year());

/**
 * Displays the name of a Mover & Shaker.
 *
 * Will only work when a single 'movers-shakers-people' item exists per post.
 *
 * @author Chris Montgomery <mont.chr@gmail.com>
 * @since 1.4.0
 * @see the_category_no_link()
 *
 * @param mixed $post
 */
function ttn_movers_shakers_name_no_link() {
  //global $post;
  $persons = the_terms( the_ID(), 'movers-shakers-people' );
  foreach( $persons as $person) {
      echo $person;
  }
}

/**
 * Wrapper for include of top banners.
 *
 * @author Chris Montgomery <mont.chr@gmail.com>
 * @since 1.4.5
 *
 */
function ttn_special_issue_banner() {
  include('banners.php');
}
