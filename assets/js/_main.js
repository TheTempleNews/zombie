// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var Zombie = {
  // All pages
  common: {
    init: function() {

      $('body').addClass('js');

      /**
       * Sitewide Navigation
       */
      var $menu = $('.main-nav'),
          $menulink = $('.menu-link'),
          //$menuItem = $('.main-nav ul li a'),
          $menuTrigger = $('.dropdown__toggle');

      $menulink.click(function(e) {
        e.preventDefault();
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
      });

      $menuTrigger.click(function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.toggleClass('active').next('ul').toggleClass('active');
      });


      /**
       * FitVids
       */
      $(document).fitVids();

      /**
       * FitText
       */
      $('.fittext.top-banner--breaking').fitText(2.5);
      $(".moversshakers-text-banner.fittext").fitText(1);
      $(".the-american-text-banner.fittext").fitText(1.75);
      $(".page-branded .page-title.fittext").fitText(0.5);
      $('.special-issue-banner--lunchies-2013 h2.fittext').fitText();
      $('.breaking-news-banner.fittext p').fitText(2.25);
      $('.special-issue-banner--reunion-2013 h2.fittext').fitText();
      $('.special-issue-banner--basketball-preview-2013 h2.fittext').fitText(1.5);
      $('.launch-banner--the-owlery h2.fittext').fitText(1);

      /**
       * SlabText
       */
      $(".slabtextthis").slabText();

    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  },
  'page-music-issue': {
    init: function() {

      /**
       * Masonry
       */
      var masonContainer = $('.mason');
      if (!!masonContainer.masonry) {
        masonContainer.masonry({
          itemSelector: 'article.free-mason',
          columnWidth: function( containerWidth ) {
            return containerWidth / 2;
          },
          gutterWidth: 0
        });
      }

    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Zombie;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);

/* On window load scripts */
jQuery(window).load(function() {

  /* set .article-container elements in mgallery to the maximum height of one of those elements
  THIS MUST BE PERFORMED ON WINDOW LOAD! */
  var maxHeight = 0;
  $('#post-type-loop-main .article-container')
    .each(function() { maxHeight = Math.max(maxHeight, $(this).height()); })
      .height(maxHeight);

});
