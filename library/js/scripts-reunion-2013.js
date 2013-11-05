/**
 * Reunion 2013 Scripts
 *
 * Enqueued in reunion-2013-functions.php
 */

jQuery(document).ready(function($) {
	var timelineBaseURL = '//temple-news.com';
	var timelineTemplateDir = timelineBaseURL + '/wp-content/themes/zombie';
	var timelineLibDir = timelineTemplateDir + '/library/js/libs/timeline';

	createStoryJS({
		width: "100%",
		height: "800",
		embed_id: 'timeline-embed',
		source: timelineTemplateDir + '/library/inc/special-issues/reunion-2013/reunion-2013-timeline.json',
		css: timelineLibDir + '/css/timeline.css',
		js: timelineLibDir + '/js/timeline-min.js'
	});
});
