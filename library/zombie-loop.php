<?php

function the_zombie_loop( $ttn_section, $show_posts = 5 ) {
	if ( $ttn_section == "news" ) {
		$cat_id     = 4;
		$cat_name   = "News";
		$meta_value = "nw";

	} elseif ( $ttn_section == "sports" ) {
		$cat_id     = 10;
		$cat_name   = "Sports";
		$meta_value = "sp";

	} elseif ( $ttn_section == "living" ) {
		$cat_id     = 11;
		$cat_name   = "Living";
		$meta_value = "lv";

	} elseif ( $ttn_section == "ae" ) {
		$cat_id     = 2341;
		$cat_name   = "Arts &amp; Entertainment";
		$meta_value = "ae";

	} elseif ( $ttn_section == "opinion" ) {
		$cat_id     = 5;
		$cat_name   = "Opinion";
		$meta_value = "op";
		
	}

	$post_type  = "article_" . strtolower($ttn_section);

	$count = 1;
	$cat_link = get_category_link($cat_id);
	$top_article_class = 'top-' . $ttn_section . '-article';
	// $cat_name_lower = strtolower( $cat_name );
	
	wp_reset_postdata(); 
	
	/*******************
	** HOME PAGE LOOP **
	********************/
	if ( is_front_page() ) :
	
		$query = new WP_Query( array(
			'posts_per_page'		=> $show_posts,
			'post_type'             => $post_type,
			'category__not_in'		=> 3
			)
		);
	
		global $post;
		
		if ( $post_type !== 'article_opinion' ) {
		?>
			<h2 id="<?php echo $ttn_section; ?>-section-box-title" class="section-box-title"><a href="<?php echo esc_url(site_url() . '/' . $ttn_section); ?>"><?php echo $cat_name; ?></a></h2>
			<?php		
			// ZOMBIE SWARM!
			if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				
				$display_feat_img = get_post_meta( $post->ID, 'show_first_featured_image', true );
				
				// TOP ARTICLE
				if ( $count == 1 ) { ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix' ); ?> role="article">
						<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
							<div class="featured-image-container featured-image-container-full twelvecol first last">
								<?php the_post_thumbnail('zom-landscape-576'); ?>
							</div>
						<?php } elseif ( has_post_thumbnail() && $display_feat_img == false ) { ?>
							<div class="featured-image-container featured-image-container-thumb twocol first">
								<?php the_post_thumbnail('zom-thumb-96'); ?>
							</div>
						<?php } ?>
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->
					</article> <!-- end article -->
				<?php $count++; } else {
				
				// ALL OTHERS ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
						<?php // disable small thumbnails because of a disproportionate amount of images in sections
						if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-container featured-image-container-thumb">
								<?php the_post_thumbnail('zom-thumb-96'); ?>
							</div>
						<?php endif; ?>
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->
					</article> <!-- end article -->
				<?php } // end all others
		
			// Aim for the head...
			endwhile; endif;
		
			// ...good shot!
			wp_reset_postdata(); 
		
		} // end the stuff for everything but opinion
		
		
		
		
		
		/* OPINION SECTION (HOZ) */	
		if ( $post_type == 'article_opinion' ) { ?>
			<h2 class="section-box-title"><a href="<?php echo esc_url(site_url() . '/' . $ttn_section); ?>"><?php echo $cat_name; ?></a></h2>
			<?php		
				// set class to first or last depending on position in n column layout where number of keys == n
				// http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
				$style_classes = array('first', '', '', '', '', 'last'); // 6 articles per row
				$styles_count = count($style_classes);
				$style_index = 0;
				
				// sets up counter to display first post differently (see TOP ARTICLE)
				$firstpost = 'firstpost'; 
				
				$query = new WP_Query( array(
					'posts_per_page'		=> $show_posts,
					'post_type'             => $post_type,
					'category__not_in'		=> 3,
					'cat'                   => 26
					)
				);
				
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

					// this is the second part of the operation that determines first or last class based on column divisions. see above.
					$k = $style_classes[$style_index++ % $styles_count];
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' twocol clearfix ' . $k ); ?> role="article">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="featured-image-container featured-image-container-thumb">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('zom-thumb-96'); ?></a>
								</div>
							<?php } ?>
						<header>
							<div class="post-category-list-container"><?php // the_category_but( $cat_id ); ?></div>
							<h2 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</header>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->
					</article> <!-- end article -->
				<?php
				
				endwhile; endif; // kill loop
				
		} // end opinion section
		
	endif; // end is_front_page() 
	
	
	
	
	
	
	
	
	
	/**********************
	** SECTION PAGE LOOP **    I'm pretty sure this is never used... 
	***********************/
	
	if ( is_post_type_archive( $post_type ) ) :
	
		wp_reset_postdata(); 
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
		$query = new WP_Query( array(
			'posts_per_archive_page'        => 10,
			'post_type'             => $post_type,
			'cat'	                => $cat_id,
			'paged'                 => $paged
			)
		);
			
			// ZOMBIE SWARM!
			if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				
				// TOP ARTICLE on first page
				if ( $count == 1 && !is_paged() ) { ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix' ); ?> role="article">
						<?php if ( has_post_thumbnail() && $display_feat_img == true ) { ?>
							<div class="featured-image-container featured-image-container-full twelvecol first last">
								<?php the_post_thumbnail('zom-landscape-792'); ?>
							</div>
						<?php } elseif ( has_post_thumbnail() && $display_feat_img == false ) { ?>
							<div class="featured-image-container featured-image-container-thumb twocol first">
								<?php the_post_thumbnail('zom-thumb-96'); ?>
							</div>
						<?php } ?>
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->
					</article> <!-- end article -->
				<?php $count++; } else { // ALL OTHERS ?>
				<article id="post-<?php the_ID(); ?>" post_class( 'clearfix' ); role="article">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image-container featured-image-container-thumb twocol first">
							<?php the_post_thumbnail('zom-thumb-96'); ?>
						</div>
					<?php endif; ?>
					<header>
						<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
						<h3 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					</header>
					<section class="dek">
						<?php the_excerpt(); ?>
					</section> <!-- end dek -->
				</article> <!-- end article -->
				<?php } // end all others
				
				
		
			// Aim for the head...
			endwhile; endif;
		
			// ...good shot!
			wp_reset_postdata();
	
	endif; // end is_category()
}

?>