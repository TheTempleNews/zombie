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

	$post_type  = "article_" . $ttn_section;

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
	
		?>
			<h2 class="section-box-title"><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo $cat_name; ?></a></h2>
			<?php		
			// ZOMBIE SWARM!
			if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
				
				// TOP ARTICLE
				if ( $count == 1 ) { ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( $top_article_class . ' clearfix' ); ?> role="article">
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h1 class="headline top-headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						</header>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-container featured-image-container-full twelvecol first last">
								<?php the_post_thumbnail('zom-landscape-576'); ?>
							</div>
						<?php endif; ?>
						<section class="dek">
							<?php the_excerpt(); ?>
						</section> <!-- end dek -->
					</article> <!-- end article -->
				<?php $count++; } else { // ALL OTHERS ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-container featured-image-container-thumb twocol first">
								<?php the_post_thumbnail('zom-thumb-96'); ?>
							</div>
						<?php endif; ?>
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h1 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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
		
	endif; // end is_front_page()
	
	
	
	/**********************
	** SECTION PAGE LOOP **
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
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-container featured-image-container-full twelvecol first last">
								<?php the_post_thumbnail('zom-landscape-792'); ?>
							</div>
						<?php endif; ?>
						<header>
							<div class="post-category-list-container"><?php the_category_but( $cat_id ); ?></div>
							<h1 class="headline top-headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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
						<h1 class="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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