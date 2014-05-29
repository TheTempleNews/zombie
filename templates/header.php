<header class="banner" role="banner">

  <div class="banner__leaderboard">
    <!-- DESKTOP-ONLY ADS -->
    <?php if ( !is_handheld() ) : ?>
      <div class="ad--leaderboard  ad">
        <!-- THIS IS AN ADVERTISEMENT FNORD -->
        <!-- NSLeaderboard -->
        <div id='div-gpt-ad-1342714724220-0' style='width:728px; height:90px; margin:0px auto;'>
        <script type='text/javascript'>
        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1342714724220-0'); });
        </script>
        </div>

        <!-- <p>ADVERTISEMENT</p> -->
      </div>
    <?php endif; // end if is NOT handheld (desktop) ?>
  </div>

  <div class="brand">
    <div class="wrap">

      <a href="<?php echo home_url(); ?>" class="brand__logo  icon-ttn-logo-500-white  logo" title="The Temple News" rel="nofollow">
        The Temple News
      </a>

      <div class="brand__social">
        <div class="inner">
          <a class="icon-facebook  icon  icon--l" href="https://www.facebook.com/thetemplenews" title="The Temple News on Facebook"></a>
          <a class="icon-twitter  icon  icon--l" href="https://twitter.com/thetemplenews" title="The Temple News on Twitter"></a>
          <a class="icon-rss  icon  icon--l" href="<?php bloginfo('rss2_url'); ?>" title="The Temple News RSS feed"></a>
        </div>
        <p class="brand__social__tagline  tagline"><?php bloginfo('description'); ?></p>
      </div>

      <a class="btn btn--navbar menu-link" data-toggle="collapse" data-target=".nav-collapse">
        <i class="icon-reorder"></i>
        <span class="accessibility">Menu</span>
      </a>

      <div class="brand__search">
        <?php get_search_form( true ); ?>
      </div>

    </div><!-- end .brand .wrap -->
  </div><!-- end .brand -->

  <hr class="rule  rule--site  brand-color" />

  <nav class="site-nav" role="navigation">
    <div class="inner  wrap">
      <?php zombie_main_nav(); ?>
    </div>
  </nav>
  </div> <!-- end #inner-header -->

</header> <!-- end header -->
