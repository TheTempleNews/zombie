<header class="site-header" role="banner">

  <div class="site-header__leaderboard  wrap">
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

  <div class="site-header__branding">
    <div class="wrap">
      <div class="inner  grid  grid--full">

        <a href="<?php echo home_url(); ?>" class="site-header__branding__logo  icon-ttn-logo-500-white  logo  grid__item  portable--two-thirds  desk--one-third" title="The Temple News" rel="nofollow">
          The Temple News
        </a><!--

        --><div class="site-header__branding__social  grid__item  desk--one-third">
          <div class="inner">
            <a class="icon-facebook  social-icon-large" href="https://www.facebook.com/thetemplenews" title="The Temple News on Facebook"></a>
            <a class="icon-twitter  social-icon-large" href="https://twitter.com/thetemplenews" title="The Temple News on Twitter"></a>
            <a class="icon-rss  social-icon-large" href="<?php bloginfo('rss2_url'); ?>" title="The Temple News RSS feed"></a>
          </div>

          <p class="site-header__branding__social__tagline  tagline"><?php bloginfo('description'); ?></p>
        </div><!--

        --><!-- <div class="menu-toggle icon-reorder">
          <span>MENU</span>
        </div> --><!--

        --><div class="site-header__branding__search  grid__item  desk--one-third">
          <?php get_search_form( true ); ?>
        </div>

      </div> <!-- end .site-header__branding -->

    </div><!-- end .site-header__branding .wrap -->

  </div><!-- end .site-header__branding -->

  <hr class="rule  rule--site  brand-color" />

  <nav class="site-nav" role="navigation">
    <div class="inner  wrap">
      <?php zombie_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div>
  </nav>

  </div> <!-- end #inner-header -->

</header> <!-- end header -->
