<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- 
		Free WordPress Theme BlackMesa by Stefan Kroeber
		Download at http://www.arcance.net/freebies
	-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
		<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 * We filter the output of wp_title() a bit -- see
		 * blackmesa_filter_wp_title() in functions.php.
		 */
		wp_title( '|', true, 'right' );
	
		?>
	</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>

<body <?php body_class(); ?> id="body">
	
	<div id="wrap">
	
		<div id="top">
			<div id="header">
				<?php
				// Compatibility with versions of WordPress prior to 3.4.
				if ( function_exists( 'get_custom_header' ) ) {
					// We need to figure out what the minimum width should be for our featured image.
					// This result would be the suggested width if the theme were to implement flexible widths.
					$header_image_width = get_theme_support( 'custom-header', 'width' );
				} else {
					$header_image_width = HEADER_IMAGE_WIDTH;
				}

				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
				if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
						$image[1] >= $header_image_width ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID );
				elseif ( get_header_image() ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						$header_image_width  = get_custom_header()->width;
						$header_image_height = get_custom_header()->height;
					} else {
						$header_image_width  = HEADER_IMAGE_WIDTH;
						$header_image_height = HEADER_IMAGE_HEIGHT;
					}
				?>
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				<?php endif; ?>
				<span id="headerOverlay"></span>
				<span>
					<h1><a href="<?php echo home_url(); ?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<p><?php bloginfo('description'); ?></p>
				</span>
			</div>
			<div id="nav">
				<?php wp_nav_menu( array('menu' => 'primary' )); ?> 
			</div>
		</div>
		
		<div id="main">