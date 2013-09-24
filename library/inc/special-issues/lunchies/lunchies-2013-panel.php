<article <?php post_class('slug-' . ttn_get_the_slug('post') . ' panel  panel--' . ttn_get_the_slug('post')); ?>>

	<?php if(has_post_thumbnail()) { ?>
		<div class="panel__featured-image  featured-image">
			<?php the_post_thumbnail('zom-landscape-792'); ?>
		</div><!--

	--><?php } ?><!--

	--><header class="panel__header">
		<h1 class="panel__header__post-title  post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="panel__header__dek  dek">
			<?php the_excerpt(); ?>
		</div>
	</header><!--

	--><a class="panel__read-more" href="<?php the_permalink(); ?>">Read More</a>

</article>