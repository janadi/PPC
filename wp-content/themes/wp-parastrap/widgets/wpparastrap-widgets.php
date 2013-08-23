<?php

/**
 * Register widget areas used by WPParaStrap
 *
 * @since 1.0.0
 */
function wpparastrap_widget_areas() {
	
	register_sidebar( array(
		'name' => __( 'Showcase - Above Content', 'wpparastrap' ),
		'id' => 'showcase-widgets',
		'description' => __( 'Displays just above the mainbody. You can add up to 5 widgets in this location.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'wpparastrap' ),
		'id' => 'sidebar-home',
		'description' => __( 'Displays on the home page to the right of the posts - if using the testimonial section then only use this sidebar if you plan on showing more than the default 3 posts.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'wpparastrap' ),
		'id' => 'sidebar-blog',
		'description' => __( 'Displays on the blog feed archive pages.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar For Pages', 'wpparastrap' ),
		'id' => 'page-sidebar',
		'description' => __( 'Displays on the right of page content - default template.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar For Single Posts', 'wpparastrap' ),
		'id' => 'sidebar-single',
		'description' => __( 'Displays on the single view post.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'wpparastrap' ),
		'id' => 'footer-widgets',
		'description' => __( 'Displays just above the footer copyright area. You can add up to 5 widgets in this location.', 'wpparastrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpparastrap_widget_areas', 11 );

/**
 * Returns number of widgets in a widget position - used in the Showcase and Footer widget areas.
 *
 * @since 1.0.0
 * @return int
 */
function wpparastrap_position_count( $position ) {
	$sidebar_widgets = wp_get_sidebars_widgets();
	if( isset( $sidebar_widgets[$position] ) ) {
		return count( $sidebar_widgets[$position] );
	}
	return 0;
}

add_filter('widget_text', 'do_shortcode');
add_filter('wp_editor', 'do_shortcode');
add_filter('header_content', 'do_shortcode');