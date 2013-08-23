<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>
<div id="content">
	<div class="highlight head">
		<h2>
			<?php printf( __( 'Tag Archives: %s', 'blackmesa' ), '' . single_tag_title( '', false ) . '' );	?>
		</h2>
	</div>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>