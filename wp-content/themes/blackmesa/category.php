<?php
/**
 * The template for displaying Category Archive pages.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>

<div id="content">
	<div class="highlight head">
		<h2>
			<?php printf( __( 'Category Archives: %s', 'blackmesa' ), '' . single_cat_title( '', false ) . '' );	?>
		</h2>
	</div>


				<?php
					

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>