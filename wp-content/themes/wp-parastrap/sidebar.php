<?php

if ( ! is_active_sidebar( 'sidebar' ) )
	return;
?>

    <div id="tertiary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
    </div><!-- #tertiary -->
