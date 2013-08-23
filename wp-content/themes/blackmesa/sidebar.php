<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */
?>
<div id="sidebar">
	<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
		<li id="search" class="sidebox widget-container widget_search">
			<h3 class="head one"><?php _e('Search', 'blackmesa') ?></h3>
			<div class="body">
				<?php get_search_form(); ?>
			</div>
		</li>
		
		<li id="sidebar-nav" class="sidebox widget-container">
			<h3 class="head three widget-title"><?php _e('Navigation', 'blackmesa') ?></h3>
			<div class="body">
				<ul>
					<?php wp_nav_menu( array('menu' => 'secondary' )); ?> <!-- editable within the Wordpress backend -->
				</ul>
			</div>
		</li>
		
		<li id="archives" class="sidebox widget-container">
			<h3 class="head two widget-title"><?php _e( 'Archives', 'blackmesa' ); ?></h3>
			<div class="body">
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</div>
		</li>
		
		<li id="sidebar-meta" class="sidebox widget-container">
			<h3 class="head one widget-title"><?php _e( 'Meta', 'blackmesa' ); ?></h3>
			<div class="body">
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		</li>

	<?php endif; // end primary widget area ?>
	
	</ul>

</div>