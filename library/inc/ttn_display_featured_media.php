<?php
// development
function ttn_display_featured_media( $content_type ) {

	$post_type = get_post_type();
	
	if ( $post_type == "article_ae" ) {
		$cat_id     = 4;
	} elseif ( $post_type == "article_sports" ) {
		$cat_id     = 10;
	} elseif ( $post_type == "article_living" ) {
		$cat_id     = 11;
	} elseif ( $post_type == "article_ae" ) {
		$cat_id     = 2341;
	} elseif ( $post_type == "article_opinion" ) {
		$cat_id     = 5;
	} elseif ( $post_type == "multimedia" ) {
		$cat_id     = 194;
	} elseif ( $post_type == "slideshows" ) {
		$cat_id     = 39;
	}
	
	$html = '';
	global $post;
	
	$query = new WP_Query( array(
			'post_type'        => $content_type,
			'posts_per_page'   => 1,
			'cat'              => $cat_id
			)
		);
	
	
	if ( is_home() ) {
		
		
	
		$html .= '<div class="featured-' . $content_type . '">';
			
			// If you're asking for the top video
			if ( $content_type == 'multimedia') {
				
				 if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				 		
					 	// http://designisphilosophy.com/tutorials/simple-video-embedding-with-custom-fields-in-wordpress-youtube/				
						// Get the video URL and put it in the $video variable
						$videoID = get_post_meta($post->ID, 'video_link', true);
						// Check if there is in fact a video URL
						if ($videoID) {
						
							$html .= '<div class="video-container clearfix">';
							// Echo the embed code via oEmbed
							$html .= wp_oembed_get( $videoID ); 
							$html .= '</div>';
							
						}
				 
				 endwhile; endif; // close multimedia loop
				
			} // end multimedia
			

		
	} // end is_home()
	
	if ( !is_home() ) {
		
		if ( $content_type == 'slideshow') {
			
			
				
				 if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				 
				 		$pid = get_the_ID();
				 		
				 		echo $pid;
				 
				 		$args = array(
				 			'post_parent'      => $pid,
				 			'post_type'        => 'attachment',
				 			'post_mime_type'   => 'image',
				 			'orderby'          => 'menu_order',
				 			'numberposts'      => -1,
				 			'post_status'      => null,
				 		);
				 		
				 		$attachments = new WP_Query($args);
				 		
				 		if ($attachments) {
					 		echo "Yep.";
				 		} else {
					 		echo "Fuck.";
				 		}
				 		
									 		
					    $gallery_shortcode = '[gallery id="' . intval( $post->post_parent ) . '"]';
					    //print apply_filters( 'the_content', $gallery_shortcode );
				 
					 	$html .= '<div class="slideshow-container" clearfix">';
					 	$html .= apply_filters( 'the_content', $gallery_shortcode );
					 	$html .= '</div>';
					 	
					 	//$juicy = new Juicebox;
					 	//echo $juicy->shortcode_handler('[juicebox gallery_id="4"]');
					 	//echo $juicy->get_gallery_path();
				 
				 
				 endwhile; endif; // close slideshow loop
				
			} // end slideshow
			
		$html .= '</div>'; // end featured div
		
		
	}
	
	
	echo $html;
	
}
?>