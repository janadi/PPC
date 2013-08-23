<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package wp-strap-frame
 */
?>

	</div><!-- #main -->
	<hr>
<div class="container">
	<footer id="colophon" class="band main site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'tashan_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'tashan' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'tashan' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'tashan' ), 'Tashan', '<a href="http://www.wpstrapcode.com" rel="designer">WP Strap Code</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div><!-- #page -->

	
<?php wp_footer(); ?>
</body>
</html>