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

	/* fitText  */
	$("#moversshakers-page-title.fittext").fitText(0.8);
	$(".moversshakers-type-banner.fittext").fitText(1);
	$(".moversshakers-type-banner.fittext").fitText(0.75);

	/* slabText */
	$(".slabtextthis").slabText();
	
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

    } /* end smallest screen */




    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
		flexNav();

		/* fitText */
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-type-banner.fittext").fitText(0.75);
		
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
		$(".fittext").fitText(0.95);
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-type-banner.fittext").fitText(0.75);
    }




    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
		$(".fittext").fitText(1);
		$(".slabtextthis").slabText();
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-type-banner.fittext").fitText(0.75);
    }




    /* 300x250 sidebar ad display-related js (see style.less for info) - should load appropriate 300x250 ad js above this size */
    if (responsive_viewport > 1140) {
		$(".fittext").fitText(1);
		$(".slabtextthis").slabText();

		/* fitText  */
		$("#moversshakers-page-title.fittext").fitText(0.8);
		$(".moversshakers-type-banner.fittext").fitText(0.75);
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
