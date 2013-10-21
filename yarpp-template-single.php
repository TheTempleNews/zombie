<?php /*
YARRP Template: Single Random
This template gives you some random other post in case there are no related posts
Author: montchr / mitcho
*/ ?>
<div id="related-posts-container">
  <h3 id="related-posts-headline" class="h6">Related Posts</h3>
  <?php if (have_posts()):?>
  <ol id="related-posts-list">
    <?php while (have_posts()) : the_post(); ?>
      <li class="related-posts-item"><a href="<?php the_permalink() ?>" rel="bookmark"><h4 class="related-posts-item-title"><?php the_title(); ?></h4></a><!-- (<?php the_score(); ?>)--></li>
    <?php endwhile; ?>
  </ol>

  <?php else:
    query_posts("orderby=rand&order=asc&limit=1");
    the_post();?>
    <p id="related-posts-null">No related posts were found, so here's a consolation prize: <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>.</p>
  <?php endif; ?>
</div>
