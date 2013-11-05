<form role="search" method="get" class="form--search" action="<?php echo home_url('/'); ?>">
  <label class="accessibility" for="s"><?php _e('Search for:', 'zombie'); ?></label>
  <input type="text" class="text-input" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="form--search__input" placeholder="<?php _e('Search', 'zombie'); ?> <?php bloginfo('name'); ?>">
  <button type="submit" value="<?php _e('Search', 'zombie'); ?>" class="form--search__submit  btn--submit  btn">
</form>
