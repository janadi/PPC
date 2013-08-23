<?php do_action('wpparastrap_pre_searchform'); ?>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
  <label class="hide" for="s"><?php _e('', 'wpparastrap'); ?></label>
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Search for', 'swpparastrap'); ?> <?php bloginfo('name'); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'wpparastrap'); ?>" class="btn">
</form>
<?php do_action('wpparastrap_after_searchform'); ?>