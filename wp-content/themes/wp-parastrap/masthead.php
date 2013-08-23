<!--start: Header -->
	<div id="header" class="top-bar">
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Navbar -->
			<div class="navbar navbar-inverse">
	    		<div class="navbar-inner">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu</a>
					<a class="brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span><?php bloginfo( 'name' ); ?></span></a>
					<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
					<div class="nav-collapse collapse">
					<!-- Our menu needs to go here -->
			        <?php wp_nav_menu( array(
	                  'theme_location'	=> 'main-menu',
	                  'menu_class'		=>	'nav',
	                  'depth'			=>	0,
	                  'fallback_cb'	=>	false,
	                  'walker'			=>	new WPParaStrap_Nav_Walker,
	                  )); 
                    ?>
	            	</div>
	        	
				</div>
	      	</div>
			<!--end: Navbar -->
			
		</div>
		<!--end: Container-->			
			
	</div>
	<?php if ( get_theme_mod( 'wpparastrap_slider_visibility' ) != 0 ) { ?>
    <?php if ( is_front_page() ) : ?>
	    <?php get_template_part( 'paraslider' ); ?>
    <?php endif; ?>
    <?php } ?>
	
<hr>  