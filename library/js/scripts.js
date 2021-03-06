/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/



// as the page loads, call these scripts
jQuery(document).ready(function($) {

	function flexNav() {
		// Based off of Jason Weaver's FlexNav (http://jasonweaver.name/lab/flexiblenavigation/)
		// Forked to github.com/montchr/zombie-flexnav/

		// Toggle for nav menu
		$('.js .menu-button').click(function() {
			$('#menu-top-navigation').slideToggle('fast');
		});
		// Toggle click for sub-menus on touch and or small screens
		$('#menu-top-navigation .menu-parent-item').click(function() {
			$(this).find('.sub-menu').slideToggle('fast');
		});
	}

  // Flexslider
  $('.flexslider').flexslider({
    animation: 'slide',
    pauseOnAction: false,
    pauseOnHover: false,
  });

	/* FitVids */
	$(".video-container").fitVids();

	/* fitText  */
	$('.fittext.top-banner--breaking').fitText(2.5);
	//$("#moversshakers-page-title.fittext").fitText(0.8);
	$(".moversshakers-text-banner.fittext").fitText(1);
	//$(".moversshakers-text-banner.fittext").fitText(0.75);
	$(".the-american-text-banner.fittext").fitText(1.75);
	$(".page-branded .page-title.fittext").fitText(0.5);
	//$(".documentary-banner .fittext").fitText();
	$('.special-issue-banner--lunchies-2013 h2.fittext').fitText();
	$('.breaking-news-banner.fittext p').fitText(2.25);
	$('.special-issue-banner--reunion-2013 h2.fittext').fitText();
	$('.special-issue-banner--basketball-preview-2013 h2.fittext').fitText(1.5);
	$('.launch-banner--the-owlery h2.fittext').fitText(1);

	/* slabText */
	$(".slabtextthis").slabText();

	/* masonry */
	var $masonContainer = $('.mason');

//	$masonContainer.imagesLoaded(function(){
		if (!!$masonContainer.masonry) {
			$masonContainer.masonry({
				itemSelector: 'article.free-mason',
				//columnWidth: 60,
				columnWidth: function( containerWidth ) {
					return containerWidth / 2;
				},
				gutterWidth: 0
			});
		}

//	});


	/*
	var maxHeight = 0;
	$('#post-type-loop-main .article-container')
		.each(function() { maxHeight = Math.max(maxHeight, $(this).height()); })
		.height(maxHeight);
	*/

	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it so, be sure to research and find the one
	that works for you best.
	*/

	/* getting viewport width */
	var responsive_viewport = document.documentElement.clientWidth;




	/* if is below 481px */
	if (responsive_viewport < 481) {

		flexNav();

		// fittext for menu button
		//$(".menu-button").fitText();

		/* fittext */
		$("h2.essayist-text-banner.fittext").fitText(1.5, {
			minFontSize: '96px'
		});

	} /* end smallest screen */




	/* if is larger than 481px */
	if (responsive_viewport > 481) {

		flexNav();

		/* fitText */
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-text-banner.fittext").fitText(0.75);
		$("h2.essayist-text-banner.fittext").fitText(1.5, {
			minFontSize: '120px'
		});

		// fittext for menu button
		//$(".menu-button").fitText();

	} /* end larger than 481px */




	/* if is above 768px */
	if (responsive_viewport > 768) {

		/* show top nav */
		$('#menu-top-navigation').show();

		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});

		/* fitText  */
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-text-banner.fittext").fitText(0.75);
		$("h2.essayist-text-banner.fittext").fitText(1.5, {
			minFontSize: '160px'
		});
	}




	/* off the bat large screen actions */
	if (responsive_viewport > 1030) {
		$(".slabtextthis").slabText();
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-text-banner.fittext").fitText(0.75);
		$("h2.essayist-text-banner.fittext").fitText(1.5, {
			minFontSize: '160px'
		});
	}




	/* 300x250 sidebar ad display-related js (see style.less for info) - should load appropriate 300x250 ad js above this size */
	if (responsive_viewport > 1140) {
		$(".slabtextthis").slabText();

		/* fitText  */
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-text-banner.fittext").fitText(0.75);
		$("h2.essayist-text-banner.fittext").fitText(1.5, {
			minFontSize: '160px'
		});
	}


	// add all your scripts here

}); /* end of as page load scripts */

jQuery(window).load(function() {

/* set .article-container elements in mgallery to the maximum height of one of those elements
THIS MUST BE PERFORMED ON WINDOW LOAD! */

var maxHeight = 0;
$('#post-type-loop-main .article-container')
	.each(function() { maxHeight = Math.max(maxHeight, $(this).height()); })
	.height(maxHeight);

}); /* end onload scripts */



/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
