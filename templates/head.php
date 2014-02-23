<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

  <!-- Google Chrome Frame for IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- mobile meta (hooray!) -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Alegreya:400italic,400,700|Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>

  <!-- Typekit -->
  <script type="text/javascript" src="//use.typekit.net/qno7mfo.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <?php
  // Load font Source Sans Pro 900 on Movers & Shakers page
  if ( is_page('movers-shakers') ) : ?>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:900' rel='stylesheet' type='text/css'>
  <?php endif; ?>

  <!-- wordpress head functions -->
  <?php wp_head(); ?>
  <!-- end of wordpress head -->

  <!-- Grunticon Loader -->
  <script>
  /* grunticon Stylesheet Loader | https://github.com/filamentgroup/grunticon | (c) 2012 Scott Jehl, Filament Group, Inc. | MIT license. */
  window.grunticon=function(e){if(e&&3===e.length){var t=window,n=!(!t.document.createElementNS||!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||window.opera&&-1===navigator.userAgent.indexOf("Chrome")),o=function(o){var r=t.document.createElement("link"),a=t.document.getElementsByTagName("script")[0];r.rel="stylesheet",r.href=e[o&&n?0:o?1:2],a.parentNode.insertBefore(r,a)},r=new t.Image;r.onerror=function(){o(!1)},r.onload=function(){o(1===r.width&&1===r.height)},r.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};
  grunticon( [ "/wp-content/themes/zombie/assets/img/icons/dist/icons.data.svg.css", "/wp-content/themes/zombie/assets/img/icons/dist/icons.data.png.css", "/wp-content/themes/zombie/assets/img/icons/dist/icons.fallback.css" ] );</script>
  <noscript><link href="/wp-content/themes/zombie/assets/img/icons/dist/icons.fallback.css" rel="stylesheet"></noscript>

  <meta name="google-site-verification" content="ZnmdPLNGk7fPoSfVoEufiCekUIyd7_2nqvYTpsxQVj0" />
  <!-- advertisement fnord -->
  <script type='text/javascript'>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
  (function() {
  var gads = document.createElement('script');
  gads.async = true;
  gads.type = 'text/javascript';
  var useSSL = 'https:' == document.location.protocol;
  gads.src = (useSSL ? 'https:' : 'http:') +
  '//www.googletagservices.com/tag/js/gpt.js';
  var node = document.getElementsByTagName('script')[0];
  node.parentNode.insertBefore(gads, node);
  })();
  </script>

  <script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/4602070/NSLeaderboard', [728, 90], 'div-gpt-ad-1342714724220-0').addService(googletag.pubads());
    googletag.defineSlot('/4602070/NSNewsBoxL', [300, 250], 'div-gpt-ad-1342714724220-1').addService(googletag.pubads());
    googletag.defineSlot('/4602070/NSOpinionBar', [728, 90], 'div-gpt-ad-1342714724220-2').addService(googletag.pubads());
    googletag.defineSlot('/4602070/NSSideBarMidBox', [300, 250], 'div-gpt-ad-1342714724220-3').addService(googletag.pubads());
    googletag.defineSlot('/4602070/NSSideBarMidBox', [300, 250], 'div-gpt-ad-1344368320426-0').addService(googletag.pubads());
    googletag.defineSlot('/4602070/NSSportsBoxR', [300, 250], 'div-gpt-ad-1342714724220-5').addService(googletag.pubads());
    googletag.defineSlot('/4602070/HalfPage', [300, 600], 'div-gpt-ad-1366661404407-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
  </script>
  <!-- end advertisement -->

  <!-- drop Google Analytics Here -->
    <!-- or use Yoast's Google Analytics for WordPress plugin @ http://yoast.com/wordpress/google-analytics/ -->
  <!-- end analytics -->
</head>
