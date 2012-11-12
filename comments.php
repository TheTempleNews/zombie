<?php
/*
The comments page for Zombie

YO: VERY IMPORTANT:
Because there's no way to modify the 'post comment' button's
class using the comment_form() function, I've hacked wp-includes/comment-template.php
as described in the Trac here <http://core.trac.wordpress.org/ticket/20446>.

Consider copying the button class styles so that there's no need
to hack core.

TL;DR When updating WP core, the comment button will look different.
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert help">
    	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "zombietheme"); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	
	<h3 id="comments" class="h4"><?php comments_number('<span>No</span> Responses', '<span>One</span> Response', '<span>%</span> Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=bones_comments'); ?>
	</ol>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
	
	<!-- If comments are closed. -->
	<p class="nocomments"><?php _e("Comments are closed.", "zombietheme"); ?></p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">
	
	<?php
	
	$fields = array(
		'class_submit'            => 'button',
		'comment_notes_after'     => ''
	);
	
	 comment_form($fields); ?>
	
	</form>

</section>

<?php endif; // if you delete this the sky will fall on your head ?>