<?php

if ( ! is_active_sidebar( 'showcase-widgets' ) )
	return;
?>

<div id="showcase" class="showcase count-<?php echo wpparastrap_position_count( 'showcase' ); ?> clearfix" role="complementary">
	<?php dynamic_sidebar( 'showcase-widgets' ); ?>
</div><!-- #header-widgets -->