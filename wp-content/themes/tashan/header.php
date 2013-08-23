<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
	   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
	 <div class="navbar-top">
	 <div class="navbar navbar-static-top">
        <div class="navbar-inner">
		  <div class="container">
		    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a>
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span>Menu</span>
            </a>
            <!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'		 => 'primary',
			   'container_class' => 'nav-collapse',
	           'menu_class'		=>	tashan_nav_class_pull(),
	           'depth'				=>	0,
	           'fallback_cb'		=>	false,
	           'walker'			=>	new Tashan_Nav_Walker,
	           )); 
            ?>
		</div>
		</div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
	</div>
    <!-- End Main Nav section -->
	<header class="band" data-0="background-position:0px 0px;" data-500="background-position:0px -250px;">
	
		<div class="container">
	
			<div class="columns sixteen" data-0="opacity: 1" data-180="opacity: 0">
						
				<?php if (get_theme_mod( 'tashan_heading_text' )) : ?>
				<h1 class="site-title">
				<a href="<?php echo esc_url(get_theme_mod( 'tashan_heading_url' )) ;?>"><?php echo esc_html(get_theme_mod( 'tashan_heading_text' )) ;?></a></h1>
			    <?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			    <?php endif ; ?>
				
				<?php if (get_theme_mod( 'tashan_subheading_text' )) : ?>
				<h3 class="site-description"><?php echo esc_html(get_theme_mod( 'tashan_subheading_text' )) ;?></h3>
				<?php else : ?>
				<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
				<?php endif ; ?>
				
				<?php if ( get_theme_mod( 'tashan_button_visibility' ) != 0 ) { ?>
				<a class="button" href="<?php echo esc_url(get_theme_mod( 'tashan_cta_url' )) ;?>">
				<?php if (get_theme_mod( 'tashan_cta_text' )) : ?>
				<?php echo esc_html(get_theme_mod( 'tashan_cta_text' )) ;?>
				<?php else : ?>
				Download Now!
				<?php endif ; ?>
				</a>
				<?php } ?>
				
				<?php if ( get_theme_mod( 'tashan_social_visibility' ) != 0 ) { ?>
				<?php get_template_part( 'social-icons' ); ?>
				<?php } ?>
			    
				<?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
	              <div class="header-widget">
					<?php dynamic_sidebar( 'header-widget' ); ?>
				  </div>
                <?php endif; // end header widget area ?>
			</div><!--/ columns-->	
		
		</div><!--/ container-->		
	
	</header><!--/ band-->
	<div class="navbar navbar-static-top">
        <div class="navbar-inner">
		  <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="button btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu</a>
            <!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'		 => 'secondary',
			   'container_class' => 'nav-collapse',
	           'menu_class'		=>	'nav',
	           'depth'				=>	0,
	           'fallback_cb'		=>	false,
	           'walker'			=>	new Tashan_Nav_Walker,
	           )); 
            ?>
		</div>
		</div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    <!-- End Main Nav section -->
	
	<?php if ( is_front_page() ) { ?>
	  <?php if ( is_active_sidebar( 'showcase' ) ) : ?>    
		<div class="container">
          <?php get_sidebar( 'showcase' ); ?>
	    </div>
	  <?php endif; ?>
	<?php } ?>