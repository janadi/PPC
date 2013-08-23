<?php
/**
 * Theme Functions
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Load Core
require_once( get_template_directory() . '/cyberchimps/init.php' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

function cyberchimps_add_site_info() { ?>
	<p>&copy; Company Name</p>	
<?php }
add_action('cyberchimps_site_info', 'cyberchimps_add_site_info');	

// set up next and previous post links for lite themes only
function cyberchimps_next_previous_posts() {
	if( get_next_posts_link() || get_previous_posts_link() ): ?>
	<div class="more-content">
		<div class="row-fluid">
			<div class="span6 previous-post">
				<?php previous_posts_link( __( 'Previous Page', 'cyberchimps' ) ); ?>
			</div>
			<div class="span6 next-post">
				<?php next_posts_link( __( 'Next Page', 'cyberchimps' ) ); ?>
			</div>
		</div>
	</div>
<?php
	endif;
}
add_action( 'cyberchimps_after_content', 'cyberchimps_next_previous_posts' );

if ( ! function_exists( 'cyberchimps_comment' ) ) :
// Template for comments and pingbacks.
// Used as a callback by wp_list_comments() for displaying the comments.
function cyberchimps_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'cyberchimps' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'cyberchimps' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment hreview">
			<aside class="comment-avatar">
					<?php echo get_avatar( $comment, 66 ); ?>
      </aside>
      <section class="comment-main-container">
      	<div class="comment-main">
      	<div class="comment-author reviewer vcard">
					<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
            <span class="comment-moderation">
              <em> - <?php _e( 'Your comment is awaiting moderation.', 'cyberchimps' ); ?></em>
            </span>
          <?php endif; ?>
				</div><!-- comment author -->

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="dtreviewed"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'cyberchimps' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
          
					<?php edit_comment_link( __( '(Edit)', 'cyberchimps' ), ' ' ); ?>
          
          <span class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
          </span><!-- .reply -->
				</div><!-- .comment-meta .commentmetadata -->

			<div class="comment-content"><?php comment_text(); ?></div>
      </div><!-- comment-main -->
			</section>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for cyberchimps_comment()

/* Posted on */
function cyberchimps_posted_on() {
	
	if( is_single() ) {
		$show_date = ( cyberchimps_get_option( 'single_post_byline_date', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_date', 1 ) : false;
	}
	elseif( is_archive() ) {
		$show_date = ( cyberchimps_get_option( 'archive_post_byline_date', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_date', 1 ) : false;  
	}
	else {
		$show_date = ( cyberchimps_get_option( 'post_byline_date', 1 ) ) ? cyberchimps_get_option( 'post_byline_date', 1 ) : false;
	}
	
	if( $show_date ) {
		$posted_on = sprintf( '<div class="entry-date updated meta-item"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></div>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
		
		apply_filters( 'cyberchimps_posted_on', $posted_on );
		echo $posted_on;
	}
}

/* Posted by */
function cyberchimps_posted_by() {
	if( is_single() ) {
		$show_author = ( cyberchimps_get_option( 'single_post_byline_author', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_author', 1 ) : false;  
	}
	elseif( is_archive() ) {
		$show_author = ( cyberchimps_get_option( 'archive_post_byline_author', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_author', 1 ) : false; 
	}
	else {
		$show_author = ( cyberchimps_get_option( 'post_byline_author', 1 ) ) ? cyberchimps_get_option( 'post_byline_author', 1 ) : false; 
	}
	
	if( $show_author ) {
		$posted_by = sprintf( '<div class="entry-author meta-item"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></div>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by', 'cyberchimps' ) . ' %s', get_the_author() ) ),
			esc_html( get_the_author() )
		);
		
		apply_filters( 'cyberchimps_posted_by', $posted_by );
		echo $posted_by;
	}
}

/* Posted in */
function cyberchimps_posted_in() {
	global $post;

	if( is_single() ) {
		$show = ( cyberchimps_get_option( 'single_post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_categories', 1 ) : false; 
	}
	elseif( is_archive() ) {
		$show = ( cyberchimps_get_option( 'archive_post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_categories', 1 ) : false;  
	}
	else {
		$show = ( cyberchimps_get_option( 'post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'post_byline_categories', 1 ) : false;  
	}
	if( $show ):
				$categories_list = get_the_category_list( ', ' );
				if ( $categories_list ) :
					$cats = $categories_list; 
				?>
          <div class="entry-cats meta-item">
            <?php echo apply_filters( 'cyberchimps_post_categories', $cats ); ?>
          </div>
	<?php endif;
	endif;
}

/* Post Tags */
function cyberchimps_post_tags() {
	global $post;
	
	if( is_single() ) {
		$show = ( cyberchimps_get_option( 'single_post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_tags', 1 ) : false; 
	}
	elseif( is_archive() ) {
		$show = ( cyberchimps_get_option( 'archive_post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_tags', 1 ) : false;  
	}
	else {
		$show = ( cyberchimps_get_option( 'post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'post_byline_tags', 1 ) : false;  
	}
	
	if( $show ):
		$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ) :
						$tags = $tags_list;
					?>
						<div class="entry-tags meta-item">
							<?php echo apply_filters( 'cyberchimps_post_tags', $tags ); ?>
						</div>
					<?php endif; // End if $tags_list
	endif;
}

/* Post Comments */
function cyberchimps_post_comments() {
	global $post;
	
	if( is_single() ) {
		$show = ( cyberchimps_get_option( 'single_post_byline_comments', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_comments', 1 ) : false; 
	}
	elseif( is_archive() ) {
		$show = ( cyberchimps_get_option( 'archive_post_byline_comments', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_comments', 1 ) : false;  
	}
	else {
		$show = ( cyberchimps_get_option( 'post_byline_comments', 1 ) ) ? cyberchimps_get_option( 'post_byline_comments', 1 ) : false;  
	}
	
	$leave_comment = ( is_single() || is_page() ) ? '' : __( 'Leave a comment', 'cyberchimps' );
	
	if( $show ):
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<div class="entry-comments meta-item"><?php comments_popup_link( $leave_comment, __( '1 Comment', 'cyberchimps' ), '% ' . __( 'Comments', 'cyberchimps' ) ); ?></div>
    <?php endif;
	endif;
}

// add single class to post class
function cyberchimps_post_classes( $classes ) {
	global $post;
		if( is_single( $post->ID ) ) {
	    $classes[] = 'single';
		}
	return $classes;
}
add_filter( 'post_class', 'cyberchimps_post_classes' );

// core options customization Names and URL's
//Pro or Free
function cyberchimps_theme_check() {
	$level = 'free';
	return $level;
}
//Theme Name
function cyberchimps_options_theme_name(){
	$text = 'Eclipse 2';
	return $text;
}
//Doc's URL
function cyberchimps_options_documentation_url() {
	$url = 'http://cyberchimps.com/guides/c-free/';
	return $url;
}
// Support Forum URL
function cyberchimps_options_support_forum() {
	$url = 'http://cyberchimps.com/forum/free/eclipse-free/';
	return $url;
}
add_filter( 'cyberchimps_current_theme_name', 'cyberchimps_options_theme_name', 1 );
add_filter( 'cyberchimps_documentation', 'cyberchimps_options_documentation_url' );
add_filter( 'cyberchimps_support_forum', 'cyberchimps_options_support_forum' );

// Help Section
function cyberchimps_options_help_header() {
	$text = 'Eclipse 2';
	return $text;
}
function cyberchimps_options_help_sub_header(){
	$text = __( 'Eclipse 2 Responsive WordPress Theme', 'cyberchimps' );
	return $text;
}

add_filter( 'cyberchimps_help_heading', 'cyberchimps_options_help_header' );
add_filter( 'cyberchimps_help_sub_heading', 'cyberchimps_options_help_sub_header' );

// Branding images and defaults

// Banner default
function cyberchimps_banner_default() {
	$url = '/images/branding/banner.jpg';
	return $url;
}
add_filter( 'cyberchimps_banner_img', 'cyberchimps_banner_default' );

//theme specific skin options in array. Must always include option default
function cyberchimps_skin_color_options( $options ) {
	// Get path of image
	$imagepath = get_template_directory_uri(). '/inc/css/skins/images/';
	
	$options = array(
		'default'	=> $imagepath . 'default.png'
	);		
	return $options;
}
add_filter( 'cyberchimps_skin_color', 'cyberchimps_skin_color_options', 1 );

//Post format icons default
function cyberchimps_post_format_icons_default() {
	$default = 1;
	return $default;
}
add_filter( 'cyberchimps_post_format_icons_default', 'cyberchimps_post_format_icons_default' );

// theme specific background images
function cyberchimps_background_image( $options ) {
	$imagepath =  get_template_directory_uri() . '/cyberchimps/lib/images/';
	$options = array(
			'none' => $imagepath . 'backgrounds/thumbs/none.png',
			'noise' => $imagepath . 'backgrounds/thumbs/noise.png',
			'blue' => $imagepath . 'backgrounds/thumbs/blue.png',
			'dark' => $imagepath . 'backgrounds/thumbs/dark.png',
			'space' => $imagepath . 'backgrounds/thumbs/space.png'
			);
	return $options;
}
add_filter( 'cyberchimps_background_image', 'cyberchimps_background_image' );

// theme specific typography options
function cyberchimps_typography_sizes( $sizes ) {
	$sizes = array( '8','9','10','12','14','16','20' );
	return $sizes;
}
function cyberchimps_typography_faces( $faces ) {
	$faces = array(
				'Arial, Helvetica, sans-serif'						 => 'Arial',
				'Arial Black, Gadget, sans-serif'					 => 'Arial Black',
				'Comic Sans MS, cursive'							 => 'Comic Sans MS',
				'Courier New, monospace'							 => 'Courier New',
				'Georgia, serif'									 => 'Georgia',
				'Impact, Charcoal, sans-serif'						 => 'Impact',
				'Lucida Console, Monaco, monospace'					 => 'Lucida Console',
				'Lucida Sans Unicode, Lucida Grande, sans-serif'	 => 'Lucida Sans Unicode',
				'"Open Sans", sans-serif'													=> 'Open Sans',
				'Palatino Linotype, Book Antiqua, Palatino, serif'	 => 'Palatino Linotype',
				'Tahoma, Geneva, sans-serif'						 => 'Tahoma',
				'Times New Roman, Times, serif'						 => 'Times New Roman',
				'Trebuchet MS, sans-serif'							 => 'Trebuchet MS',
				'Verdana, Geneva, sans-serif'						 => 'Verdana',
				'Symbol'											 => 'Symbol',
				'Webdings'											 => 'Webdings',
				'Wingdings, Zapf Dingbats'							 => 'Wingdings',
				'MS Sans Serif, Geneva, sans-serif'					 => 'MS Sans Serif',
				'MS Serif, New York, serif'							 => 'MS Serif',
				);
	return $faces;
}
function cyberchimps_typography_styles( $styles ) {
	$styles = array( 'normal' => 'Normal','bold' => 'Bold' );
	return $styles;
}
function cyberchimps_typography_defaults() {
	$defaults = array(
										'size' => '14px',
										'face' => '"Open Sans", sans-serif',
										'style' => 'normal',
										'color' => '#cccccc' 
										);
	return $defaults;
}
add_filter( 'cyberchimps_typography_sizes', 'cyberchimps_typography_sizes' );
add_filter( 'cyberchimps_typography_faces', 'cyberchimps_typography_faces' );
add_filter( 'cyberchimps_typography_styles', 'cyberchimps_typography_styles' );
add_filter( 'typography_defaults', 'cyberchimps_typography_defaults' );

// turn cyberchimps footer link off

function cyberchimps_footer_link() {
	$array = array(
								'name' => __('Cyberchimps Link', 'cyberchimps'),
								'id' => 'footer_cyberchimps_link',
								'std' => 1,
								'type' => 'toggle',
								'section' => 'cyberchimps_footer_section',
								'heading' => 'cyberchimps_footer_heading'
							);
	return $array;
}
add_filter( 'footer_cyberchimps_link', 'cyberchimps_footer_link' );

function cyberchimps_header_drag_and_drop_options() {
	$options = array(
			'cyberchimps_logo'				=> __( 'Logo', 'cyberchimps' )
			);
	return $options;
}
add_filter( 'header_drag_and_drop_options', 'cyberchimps_header_drag_and_drop_options', 50 );
function cyberchimps_header_drag_and_drop_default() {
	$default = array(
			'cyberchimps_logo'		=> __( 'Logo', 'cyberchimps' )
			);
	return $default;
}
add_filter( 'header_drag_and_drop_default', 'cyberchimps_header_drag_and_drop_default', 50 );

// remove fields
function cyberchimps_remove_fields( $orig ) {
	$new_fields = cyberchimps_remove_options( $orig, array( 'contact_details', 'searchbar', 'header_banner_image', 'header_banner_url' ) );
	return $new_fields;
}
add_filter( 'cyberchimps_field_filter', 'cyberchimps_remove_fields' );

// Remove sections
function cyberchimps_contact_section( $original ) {
	$new = cyberchimps_remove_options( $original, array( 'cyberchimps_header_details_section', 'cyberchimps_header_banner_section' ) );
	return $new;
}
add_filter( 'cyberchimps_sections_filter', 'cyberchimps_contact_section' );

//upgrade bar
function ifeature_upgrade_title(){
	$title = 'Eclipse Pro 2';
	return $title;
}
function ifeature_upgrade_link(){
	$link = 'http://cyberchimps.com/store/eclipse-pro/';
	return $link;
}
add_filter( 'cyberchimps_upgrade_pro_title', 'ifeature_upgrade_title' );
add_filter( 'cyberchimps_upgrade_link', 'ifeature_upgrade_link' );

//setup default drag and drop for blog options
function cyberchimps_default_blog_drag_and_drop(){
	$default = array( 'slider_lite' => __( 'Slider Lite', 'cyberchimps'), 
		'portfolio_lite' => __( 'Portfolio Lite', 'cyberchimps' ),	
		'blog_post_page' => __( 'Post Page', 'cyberchimps' )
	);
return $default;
}
add_filter( 'cyberchimps_elements_draganddrop_defaults', 'cyberchimps_default_blog_drag_and_drop' );

//setup default slider image 1
function cyberchimps_slider_default_image1(){
	return '/images/branding/eclipseslide.jpg';
}
add_filter( 'cyberchimps_slider_lite_img1', 'cyberchimps_slider_default_image1' );

//setup default slider image 2
function cyberchimps_slider_default_image2(){
	return '/images/branding/eclipseslide.jpg';
}
add_filter( 'cyberchimps_slider_lite_img2', 'cyberchimps_slider_default_image2' );

//setup default slider image 3
function cyberchimps_slider_default_image3(){
	return '/images/branding/eclipseslide.jpg';
}
add_filter( 'cyberchimps_slider_lite_img3', 'cyberchimps_slider_default_image3' );

/* fix full width container that disappears on horizontal scroll */
function cyberchimps_full_width_fix() {
	$responsive_design = cyberchimps_get_option( 'responsive_design' );
	$min_width = cyberchimps_get_option( 'max_width' );
	if( ! $responsive_design ) {
		$style = '<style rel="stylesheet" type="text/css" media="all">';
		$style .= '#footer-widgets-wrapper, #footer-main-wrapper { min-width: '. $min_width . 'px;}';
		$style .= '</style>';
		
		echo $style;
	}
}
add_action( 'wp_head', 'cyberchimps_full_width_fix' );