<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * 
 * @subpackage Blackmesa
 * @since Blackmesa 1.0
 */
?>

		<div class="clear"></div>
		
	</div>

</div>

<div id="footer">
	<div id="credits">
		<?php
			// It is completely optional, but if you like the Theme I would appreciate it if you keep the following credit link.
		?>
		<!-- The Bloxy Two WordPress Theme has been built on top of the Twenty Ten WordPress Theme (Copyright 2010 WordPress.org), which is also distributed under the terms of the GNU GPL -->
		<?php bloginfo('name'); _e(' is using the <a href="http://www.arcance.net/freebies/blackmesa" title="Get the free BlackMesa theme" rel="author">free BlackMesa</a> theme and is powered by <a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">WordPress</a>', 'blackmesa'); ?> 
	</div>

	
	<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
		<?php dynamic_sidebar( 'footer-left' ); ?>	
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
		<?php dynamic_sidebar( 'footer-center' ); ?>	
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
		<?php dynamic_sidebar( 'footer-right' ); ?>	
	<?php endif; ?>
	
	<div class="clear"></div>
	
</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>