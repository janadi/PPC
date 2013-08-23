<?php
/**
 *
 * Default Page Header
 */ 
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php get_template_part ('masthead'); ?>
	
<!--start: Wrapper-->
<div id="wrapper">