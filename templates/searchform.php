<form role="search" method="get" class="form--search  input-group  form" action="<?php echo home_url('/'); ?>">
  <label class="accessibility  form--search__label  form__control-label" for="s"><?php _e('Search for:', 'zombie'); ?></label>
  <input type="search" class="form__control" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" placeholder="<?php _e('Search', 'zombie'); ?>">
  <span class="input-group__btn">
    <button type="submit" class="form--search__submit  form__submit  btn--submit  btn" value="<?php _e('Search', 'zombie'); ?>"><?php esc_attr_e( 'Search', 'zombie' ); ?></button>
  </span>
</form>
