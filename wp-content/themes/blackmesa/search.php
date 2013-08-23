<?php
/**
 * The template for displaying Search Results pages.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>
<div id="content" class="search">
<?php if ( have_posts() ) : ?>
	<div class="highlight head">
		<h2><?php printf( __( 'Search Results for: %s', 'blackmesa' ), '' . get_search_query() . '' ); ?></h2>
	</div>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
	<div class="highlight head">
		<h2><?php _e( 'Nothing Found', 'blackmesa' ); ?></h2>
	</div>
	<div class="article">
		<div class="body push">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'blackmesa' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>
</div>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('search') && document.getElementById('search').focus();
	</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
