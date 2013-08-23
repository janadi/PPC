<div id="footer-menu">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">
            <div class="hidden-tablet hidden-phone">
				<!-- start: Footer Menu Links-->
				<div class="span10">
					
					<div id="footer-menu-links">

						<div id="footer-nav">

						<?php wp_nav_menu( array(
	                       'theme_location'	=> 'footer-menu',
	                       'menu_class'		=>	'nav',
	                       'depth'			=>	1,
	                       'fallback_cb'	=>	false,
	                       'walker'			=>	new WPParaStrap_Nav_Walker,
	                       )); 
                        ?>

						</div>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->
                </div>	
				<!-- start: Footer Menu Back To Top -->
				<div class="span2">
						
					<div id="back-to-top">
						<a href="#">Return Top</a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

</div>	