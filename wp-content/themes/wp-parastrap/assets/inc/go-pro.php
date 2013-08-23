<?php

/*
 * Adds the Administration page for WPParaStrap.
 */
add_action( 'admin_menu', 'wpparastrap_admin_page' );
function wpparastrap_admin_page() {
  add_theme_page( 'WPParaStrap', 'Go Pro', 'manage_options', 'wpparastrap_options', 'wpparastrap_admin_page_content' );
}

/*
 * The content of the administration page for WPParaStrap.
 * We add an action here called 'wpparastrap_admin_page_content'
 * that all other plugins and addons can hook into.
 */
function wpparastrap_admin_page_content() { ?>
  <div class="wrap">
    <h2><?php _e( 'WP ParaStrap - Go Pro', 'wpparastrap' ); ?></h2>
    <p><b><?php _e( 'Thank you for downloading and using WP ParaStrap theme', 'wpparastrap' ); ?></b></p>
	<p><b><?php _e( 'You are using WP ParaStrap Lite - Current version: 1.0.6', 'wpparastrap' ); ?></b></p>
	<br />
	<p><b><?php _e( 'Did you know that there is a Pro version with more features?', 'wpparastrap' ); ?></b></p>
	<br />
	<p style="text-align: left;">
	<a href="http://www.wpstrapcode.com/wp-parastrap/" target="_blank" />
	<img alt="WPParaStrap" src="http://www.wpstrapcode.com/wp-content/uploads/2013/06/WPParaStrap-958x1024.png" width="600" height="450" />
	</a></p>
	<ul>
	   <li style="margin-left: 20px;"><b><?php _e( 'Feature 1: WP ParaStrap Pro comes with infinity color schemes for many of its elements', 'wpparastrap' ); ?></b></li>
	   <li style="margin-left: 20px;"><b><?php _e( 'Feature 2: Upload a custom slider background image or set a custom color', 'wpparastrap' ); ?></b></li>
	   <li style="margin-left: 20px;"><b><?php _e( 'Feature 3: Change all site wide border colors', 'wpparastrap' ); ?></b></li>
	   <li style="margin-left: 20px;"><b><?php _e( 'Feature 4: Add Elusive inconfonts to the posts titles', 'wpparastrap' ); ?></b></li>
	   <br />
	   <li><b><?php _e( 'And much much more.....for more details and to purchase WP ParaStrap Pro', 'wpparastrap' ); ?></b></li>
	   <br />
	   <li><b><?php _e( 'Visit us at: <a href="http://www.wpstrapcode.com/downloads/wp-parastrap" target="_blank" />WP Strap Code - WP ParaStrap Pro', 'wpparastrap' ); ?></a></b></li>
	</ul>
  </div>
  <?php
}