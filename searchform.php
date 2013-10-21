<form method="get" class="form--search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="s" class="accessibility  form--search__label"><?php _e( 'Search', 'zombietheme' ); ?></label>
  <input type="search" class="textinput  textinput--rounded  form--search__input" name="s" placeholder="" /><!--
  --><button type="submit" class="btn  btn--small  btn--submit  form--search__submit" name="submit"><?php esc_attr_e( 'Search', 'zombietheme' ); ?></button>
</form>
