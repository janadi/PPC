<?php
/**
 * BlackMesa functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, blackmesa_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'blackmesa_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run blackmesa_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'blackmesa_setup' );

if ( ! function_exists( 'blackmesa_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override blackmesa_setup() in a child theme, add your own blackmesa_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 *
 */
function blackmesa_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'blackmesa', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Header Menu', 'blackmesa' ),
		'secondary' => __( 'Sidebar Menu', 'blackmesa' ),
	) );
}
endif;

$args = array(
	'width'         => 980,
	'height'        => 150,
	'uploads'       => true,
	'wp-head-callback' => 'blackmesa_header_style',
);
add_theme_support( 'custom-header', $args );


if ( ! function_exists( 'blackmesa_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 */
function blackmesa_header_style() {
	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;
		
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#header span h1,
		#header span p {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#header span h1,
		#header span p {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // blackmesa_header_style


/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function blackmesa_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'blackmesa' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'blackmesa' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'blackmesa' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'blackmesa_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 */
function blackmesa_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'blackmesa_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @return int
 */
function blackmesa_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'blackmesa_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @return string "Continue Reading" link
 */
function blackmesa_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'blackmesa' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and blackmesa_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @return string An ellipsis
 */
function blackmesa_auto_excerpt_more( $more ) {
	return ' &hellip;' . blackmesa_continue_reading_link();
}
add_filter( 'excerpt_more', 'blackmesa_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function blackmesa_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= blackmesa_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'blackmesa_custom_excerpt_more' );


if ( ! function_exists( 'blackmesa_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own blackmesa_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function blackmesa_comment( $comment, $args, $depth ) {
	global $bm_cc; // Variable for alternating comment styles
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li id="comment-<?php comment_ID(); ?>" class="comment body push <?php $bm_cc++; if($bm_cc == 1) { echo 'odd';} else {echo 'even';} ?> <?php $user_info = get_userdata(1); if ($user_info->ID == $comment->user_id) echo 'authorComment'; ?>">
	    <?php if ( $comment->comment_approved == '0' ) : ?>
	    	<em><?php _e( 'Your comment is awaiting moderation.', 'blackmesa' ); ?></em>
	    	<br />
	    <?php endif; ?>
	    
	    
	    <div class="gravatar"><?php echo get_avatar($comment, $size='60' ); ?></div>
	    <div class="commentText">
	    	<p>
	    		<strong><?php comment_author_link(); echo ' '; _e('on', 'blackmesa'); echo ' '; comment_date(); echo ' '; _e('at', 'blackmesa'); echo ' '; comment_time();  _e(' ', 'blackmesa');?></strong>
	    		<?php edit_comment_link( __( '(Edit)', 'blackmesa' ), ' ' ); ?>
	    		<span class="reply">
	    			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    		</span>
	    	</p>
	        <?php comment_text(); ?>
	    </div>
	    <?php if ($bm_cc == 2) { $bm_cc = 0; } ?>
	
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback <?php $bm_cc++; if($bm_cc == 1) { echo 'odd';} else {echo 'even';} ?>">
		<p><?php _e( 'Pingback:', 'blackmesa' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'blackmesa'), ' ' ); ?></p>
		<?php if ($bm_cc == 2) { $bm_cc = 0; } ?>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override blackmesa_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function blackmesa_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'blackmesa' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'blackmesa' ),
		'before_widget' => '<li id="%1$s" class="sidebox">',
		'after_widget' => '</div></li>',
		'before_title' => '<h3 class="head head_class">',
		'after_title' => '</h3><div class="body">',
	) );

	// Area 2, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Left Footer Widget Area', 'blackmesa' ),
		'id' => 'footer-left',
		'description' => __( 'The first footer widget area', 'blackmesa' ),
		'before_widget' => '<div class="third">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="hr"></div>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Middle Footer Widget Area', 'blackmesa' ),
		'id' => 'footer-center',
		'description' => __( 'The second footer widget area', 'blackmesa' ),
		'before_widget' => '<div class="third">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="hr"></div>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Right Footer Widget Area', 'blackmesa' ),
		'id' => 'footer-right',
		'description' => __( 'The third footer widget area', 'blackmesa' ),
		'before_widget' => '<div class="third">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="hr"></div>',
	) );

}
/** Register sidebars by running blackmesa_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'blackmesa_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 */
function blackmesa_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'blackmesa_remove_recent_comments_style' );


/**
 * Alternating widget headers
 *
 */
function blackmesa_head_class($params) {
	global $widget_num;		
	// Widget class
	$class = array();		
	// Iterated class
	$widget_num++;		
	// Alt class
	if ($widget_num == 1) :
	$class[] = 'one';
	elseif ($widget_num == 2) :
	$class[] = 'two';
	else :
	$class[] = 'three';
	endif;
	if ($widget_num == 3) : $widget_num = 0; endif;		
	// Join the classes in the array
	$class = join(' ', $class);
	// Interpolate the 'head_class' placeholder
	$params[0]['before_title'] = str_replace('head_class', $class, $params[0]['before_title']);
	return $params;
}
add_filter('dynamic_sidebar_params', 'blackmesa_head_class');


/**
 * Remove size-attributes from img-tag of featured thumbnails
 * Size is fixed throug CSS
 *
 */
add_filter( 'post_thumbnail_html', 'blackmesa_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'blackmesa_remove_width_attribute', 10 );
function blackmesa_remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/**
 * Where the post has no post title, but must still display a link to the single-page post view
 *
 */
function blackmesa_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}
add_filter('the_title', 'blackmesa_title');


/**
 * Print a space character into widget title if none is set via widget menu.
 * Preventing the sidebar to collapse.
 *
 */
function blackmesa_widget_title($title)
{
	if ($title == '')
		$title = '&nbsp;';

    return $title;
}
add_filter('widget_title', 'blackmesa_widget_title');


/**
 * Load CSS & JS
 *
 */
function blackmesa_scripts() {
	wp_enqueue_script(
		'scroll',
		get_template_directory_uri() . '/js/scroll.js'
	);
}
add_action('wp_enqueue_scripts', 'blackmesa_scripts');

function blackmesa_styles()  
{ 
  wp_register_style( 'style', 
    get_template_directory_uri() . '/style.css');

	wp_enqueue_style( 'style' );
}
add_action('wp_enqueue_scripts', 'blackmesa_styles');