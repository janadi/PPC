<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>

<div id="content">

	<div class="highlight head">
		<h2><?php _e( 'Not Found', 'blackmesa' ); ?></h2>
	</div>
	<div class="article">
		<div class="body push">
			<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'blackmesa' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('search') && document.getElementById('search').focus();
	</script>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>