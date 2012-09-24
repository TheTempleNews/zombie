/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// as the page loads, call these scripts
jQuery(document).ready(function(e){function t(){e(".js .menu-button").click(function(){e("#menu-top-navigation").slideToggle("fast")});e("#menu-top-navigation .menu-parent-item").click(function(){e(this).find(".sub-menu").slideToggle("fast")})}var n=document.documentElement.clientWidth;n<481&&t();n>481&&t();if(n>768){e("#menu-top-navigation").show();e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))});e(".fittext").fitText(.95)}n>1030;n>1140});jQuery(window).load(function(){var e=0;$("#post-type-loop-main .article-container").each(function(){e=Math.max(e,$(this).height())}).height(e)});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);