<?php

if ( ! is_active_sidebar( 'footer-widgets' ) )
	return;
?>

<div id="showcase" class="showcase count-<?php echo wpparastrap_position_count( 'footer-widgets' ); ?> clearfix" role="complementary">
	<?php dynamic_sidebar( 'footer-widgets' ); ?>
</div><!-- #header-widgets -->