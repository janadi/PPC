<?php
/**
 * The template for displaying Search Form.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */
?>
<form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform" role="search">
    <fieldset>
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
        <input type="submit" id="searchsubmit" value="Search" />
    </fieldset>
</form>