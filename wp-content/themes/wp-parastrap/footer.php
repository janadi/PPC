</div>
<!-- end: Wrapper  -->
<!-- start: Footer Menu -->
	<?php get_template_part( 'footer-nav' ); ?>
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">

			<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>    
		        <?php get_sidebar( 'footer' ); ?>
	        <div class="clear"></div>
	        <?php endif; ?>	

		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<div class="span12">
				<p><?php do_action( 'wpparastrap_credits' ); ?></p>
			</div>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

    <?php wp_footer(); ?>
  </body>
</html>