<?php
/**
 * wp-strap-frame functions and definitions
 *
 * @package wp-strap-frame
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'tashan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function tashan_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on wp-strap-frame, use a find and replace
	 * to change 'tashan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tashan', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 125, 125, true ); // 125 pixels wide by 125 pixels high

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tashan' ),
		'secondary' => __( 'Secondary Menu', 'tashan' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'tashan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tashan_setup
add_action( 'after_setup_theme', 'tashan_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function tashan_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Header Widget', 'tashan' ),
		'description'   => __( 'Intended for adding the Jetpack subscribe form and no other widgets. Note: This widget will fade and disappear with the header - this is the intentional behavior of the Skrollr Script.', 'tashan' ),
		'id'            => 'header-widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Showcase - Above Content', 'tashan' ),
		'id' => 'showcase',
		'description' => __( 'Displays just above the mainbody. You can add up to 5 widgets in this location.', 'tashan' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tashan' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tashan_widgets_init' );

include(get_template_directory() . '/inc/widgets/tashan-recent-comment.php');
include(get_template_directory() . '/inc/widgets/tashan-recent-posts.php');

function load_tashan_widgets() {
	register_widget("Tashan_RecentCommentWidget");
	register_widget("Tashan_RecentPostWidget");
}
add_action("widgets_init", "load_tashan_widgets");

/**
 * Returns number of widgets in a widget position - used in the Showcase and Footer widget areas.
 *
 * @since 1.0.0
 * @return int
 */
function tashan_position_count( $position ) {
	$sidebar_widgets = wp_get_sidebars_widgets();
	if( isset( $sidebar_widgets[$position] ) ) {
		return count( $sidebar_widgets[$position] );
	}
	return 0;
}

/**
 * Enqueue scripts and styles
 */
function tashan_scripts() {
	global $wp_styles;
	// CSS Scripts
	wp_enqueue_style('tashan-style', get_template_directory_uri().'/css/style.css', false ,'1.0.0', 'all' );
	wp_enqueue_style('tashan-bootstrap', get_template_directory_uri().'/css/bootstrap.css', false ,'2.2.2', 'all' );
    wp_enqueue_style('tashan-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css', false ,'2.2.2', 'all' );
	wp_enqueue_style('tashan-custom', get_template_directory_uri().'/css/custom.css', false ,'1.0.0', 'all' );
	
	// Load style.css from child theme
    if (is_child_theme()) {
       wp_enqueue_style('tashan_child', get_stylesheet_uri(), false, null);
    }
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script('respond.js', get_template_directory_uri().'/js/respond/respond.js', array('jquery'),'1.1.0', false );
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'1.0', true );
	wp_enqueue_script('tashan-skrollr.js', get_template_directory_uri().'/js/skrollr.js', array('jquery'),'1.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'tashan_scripts' );



/**
 * Sets the post excerpt length to 80 words.
 */
function tashan_excerpt_length($length) { 
    if ( get_theme_mod('tashan_blogfeed_excerpt_length') ) : 
       return ( get_theme_mod('tashan_blogfeed_excerpt_length') ); 
    else : 
       return 80;
    endif;	   
}
add_filter('excerpt_length', 'tashan_excerpt_length');

// Lets do a separate excerpt length for the slider
function tashan_recentpost_excerpt () {
	$theContent = trim(strip_tags(get_the_content()));
		$output = str_replace( '"', '', $theContent);
		$output = str_replace( '\r\n', ' ', $output);
		$output = str_replace( '\n', ' ', $output);
			if (get_theme_mod( 'tashan_recentpost_excerpt' )) :
			$limit = get_theme_mod( 'tashan_recentpost_excerpt' );
			else : 
			$limit = '15';
			endif;
			$content = explode(' ', $output, $limit);
			array_pop($content);
		$content = implode(" ",$content)."  ";
	return strip_tags($content, ' ');
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';
// Not in use yet but working on setting it as a site logo image handler.

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/nav-menu-walker.php';
require get_template_directory() . '/inc/tashan-customizer.php';
