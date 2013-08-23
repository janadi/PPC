<?php
/*
Plugin Name: Smooth Page Scroll to Top
Plugin URI: http://wordpress.org/extend/plugins/smooth-page-scroll-to-top/
Description: Simple Smooth Page Scroll "to Top" - Original script by: <a href="http://gazpo.com/2012/02/scrolltop/" title="Source Code">http://gazpo.com/</a> - Plugin Packed by: <a href="http://www.darkwolf.it/" title="Plugin Author">Salvatore Noschese - (DarkWolf)</a>
You can see in action here: http://vegamami.altervista.org/ :)
Author: Salvatore Noschese - DarkWolf
Version: 0.2
Author URI: http://www.darkwolf.it/
*/

// Prevent Direct Access with homepage redirect
if (!defined('DB_NAME'))
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/');
}

// Function Load jQuery
function smooth_scrool_jquery()
{
	wp_enqueue_script('jquery');
}

// Function Add in Header
function smooth_scrool_head()
{
	$sc_files = plugin_dir_url(__FILE__)."files/smooth_scroll.";
	echo "\n<!-- Smooth Scroll by DarkWolf -->
<script type=\"text/javascript\" src=\"".$sc_files."js\"></script>
<style type=\"text/css\">@import url('".$sc_files."css');</style>
<!-- Smooth Scroll by DarkWolf -->\n\n";
}

// Function Add in Footer
function smooth_scrool_footer()
{
	echo "\n<!-- Smooth Scroll by DarkWolf --><a href=\"#\" class=\"scrollup\">Scroll</a><!-- Smooth Scroll by DarkWolf -->\n";
}

// Run All Function
add_action('init', 'smooth_scrool_jquery');
add_action('wp_head','smooth_scrool_head');
add_action('wp_footer','smooth_scrool_footer');

?>