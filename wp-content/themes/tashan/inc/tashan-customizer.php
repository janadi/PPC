<?php

function tashan_custom_customize_register($wp_customize) {
   
   // General Options
   $wp_customize->add_section( 'tashan_navbar_options' , array(
    'title'      => __('Navbar Options','tashan'),
    'priority'   => 30,
   ) );
   
   // Setting group for header
   $wp_customize->add_section( 'tashan_header_options' , array(
    'title'      => __('Header Options','tashan'),
    'priority'   => 34,
   ) );
   
   // Setting group for content
   $wp_customize->add_section( 'tashan_content_options' , array(
    'title'      => __('Content Options','tashan'),
    'priority'   => 35,
   ) );
   
   // Setting group for social icons
   $wp_customize->add_section( 'tashan_social_options' , array(
    'title'      => __('Social Options','tashan'),
    'priority'   => 36,
   ) );
   
   $wp_customize->add_section( 'tashan_footer_options' , array(
    'title'      => __('Footer Options','tashan'),
    'priority'   => 37,
   ) );

/**
 * Lets begin adding our own settings and controls for this theme
 * Plus organize it in sequence in each setting group with a priority level
 */
	// General Options Selectors
	$wp_customize->add_setting(
    'tashan_nav_pull'
    );

    $wp_customize->add_control(
    'tashan_nav_pull',
    array(
        'type' => 'checkbox',
        'label' => __('Float Top Menu To The Left?','tashan'),
        'section' => 'tashan_navbar_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting('nav_menu_color', array(
        'default'           => '777777',
		'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_menu_color', array(
        'label'    => __('Custom Brand/Nav Menu Color', 'tashan'),
        'section'  => 'tashan_navbar_options',
		'priority' => 2,
        'settings' => 'nav_menu_color',
    )));
	
	// === Begin The Header Section === //
	
    //  Header Image Upload
    $wp_customize->add_setting('header_background_image', array(
        'default-image'  => get_template_directory_uri() . '/img/pattern.png',
		'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_background_image', array(
        'label'    => __('Header Background Image', 'tashan'),
        'section'  => 'tashan_header_options',
		'priority' => 1,
        'settings' => 'header_background_image',
    )));
	
	$control = $wp_customize->get_control( 'header_background_image' );
    $control->add_tab( 'default', __('Built-In', 'tashan'), function() {
        $headerbackgrounds = array(
			'img/pattern.png',
        );

        global $wp_customize;
        $control = $wp_customize->get_control( 'header_background_image' );

        foreach ( (array) $headerbackgrounds as $background )
            $control->print_tab_image( esc_url_raw( get_stylesheet_directory_uri() . '/' . $background ) );
    } );

    //  Header Background Color Picker 
    $wp_customize->add_setting('header_background_color', array(
        'default'           => '003838',
		'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label'    => __('Header Background Color', 'tashan'),
        'section'  => 'tashan_header_options',
		'priority' => 2,
        'settings' => 'header_background_color',
    )));
	
	// Header Heading Text
	$wp_customize->add_setting(
    'tashan_heading_text',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_heading_text',
    array(
        'label' => __('Header Heading Text','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 3,
        'type' => 'text',
    ));

     $wp_customize->add_setting('tashan_heading_text_font', array(
        'default'        => '"condimentregular',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
    $wp_customize->add_control( 'tashan_heading_text_font', array(
        'label'   => __('Heading/Sub-heading Font:','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 4,
        'type'    => 'select',
        'choices'    => array(
            '' => 'Default',
			'"mrs_sheppardsregular",sans-serif' => 'Mrs Sheppards',
            '"oleo_scriptregular",sans-serif' => 'OleoScript',
            '"molleregular",sans-serif' => 'Molle',
			'"condimentregular",sans-serif' => 'Condiment',
        ),
    ));
	
	$wp_customize->add_setting('heading_text_color', array(
        'default'           => '0088cc',
		'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading_text_color', array(
        'label'    => __('Heading Text Color', 'tashan'),
        'section'  => 'tashan_header_options',
		'priority' => 5,
        'settings' => 'heading_text_color',
    )));
	
	$wp_customize->add_setting(
    'tashan_heading_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_heading_url',
    array(
        'label' => __('Header Heading URL','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 6,
        'type' => 'text',
    ));
	
	// Header Sub-heading Text
	$wp_customize->add_setting(
    'tashan_subheading_text',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_subheading_text',
    array(
        'label' => __('Header Sub-heading Text','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 7,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting('subheading_text_color', array(
        'default'           => '0088cc',
		'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'subheading_text_color', array(
        'label'    => __('Sub-Heading Text Color', 'tashan'),
        'section'  => 'tashan_header_options',
		'priority' => 8,
        'settings' => 'subheading_text_color',
    )));
	
	$wp_customize->add_setting(
    'tashan_header_top_padding',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_header_top_padding',
    array(
        'label' => __('Header Top Padding (%) i.e. 10 for 10%','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 9,
        'type' => 'text',
    ));
		
	$wp_customize->add_setting(
    'tashan_header_bottom_padding',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_header_bottom_padding',
    array(
        'label' => __('Header Bottom Padding (%) i.e. 10 for 10%','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 10,
        'type' => 'text',
    ));
	
	// Begin Header Button Section
	$wp_customize->add_setting(
    'tashan_button_visibility'
    );

    $wp_customize->add_control(
    'tashan_button_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Show CTA Button?','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 11,
        )
    );
	
	$wp_customize->add_setting(
    'tashan_cta_text',
    array(
        'default' => 'Download Now!',
    ));
	
	$wp_customize->add_control(
    'tashan_cta_text',
    array(
        'label' => __('Button Text','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 12,
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'tashan_cta_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_cta_url',
    array(
        'label' => __('Button URL','tashan'),
        'section' => 'tashan_header_options',
		'priority' => 13,
        'type' => 'text',
    ));
	
	// Begin Content Options Section
	$wp_customize->add_setting('tashan_content_title_font', array(
        'default'        => '"condimentregular',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
    $wp_customize->add_control( 'tashan_content_title_font', array(
        'label'   => __('Content Title Font:','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 1,
        'type'    => 'select',
        'choices'    => array(
            '' => 'Default',
			'"mrs_sheppardsregular",sans-serif' => 'Mrs Sheppards',
            '"oleo_scriptregular",sans-serif' => 'OleoScript',
            '"molleregular",sans-serif' => 'Molle',
			'"condimentregular",sans-serif' => 'Condiment',
        ),
    ));
	
	
	$wp_customize->add_setting('tashan_widget_title_font', array(
        'default'        => '"condimentregular"',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
    $wp_customize->add_control( 'tashan_widget_title_font', array(
        'label'   => __('Widget Title Font:','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 3,
        'type'    => 'select',
        'choices'    => array(
            '' => 'Default',
			'"mrs_sheppardsregular",sans-serif' => 'Mrs Sheppards',
            '"oleo_scriptregular",sans-serif' => 'OleoScript',
            '"molleregular",sans-serif' => 'Molle',
			'"condimentregular",sans-serif' => 'Condiment',
        ),
    ));
	
	$wp_customize->add_setting('tashan_recentpost_title_font', array(
        'default'        => '"oleo_scriptregular",sans-serif',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
	$wp_customize->add_control( 'tashan_recentpost_title_font', array(
        'label'   => __('Recent Post Title Font (In Widget):','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 3,
        'type'    => 'select',
        'choices'    => array(
            '' => 'Default',
			'"mrs_sheppardsregular",sans-serif' => 'Mrs Sheppards',
            '"oleo_scriptregular",sans-serif' => 'OleoScript',
            '"molleregular",sans-serif' => 'Molle',
			'"condimentregular",sans-serif' => 'Condiment',
        ),
    ));
	
	$wp_customize->add_setting(
    'tashan_blogfeed_excerpts'
    );

    $wp_customize->add_control(
    'tashan_blogfeed_excerpts',
    array(
        'type' => 'checkbox',
        'label' => __('Switch to full content on blog feed? - Default: Excerpts','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
    'tashan_blogfeed_excerpt_length'
    );

    $wp_customize->add_control(
    'tashan_blogfeed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '',
        'label' => __('Define the excerpt length (default is 80 chars)','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 5,
        )
    );
	
	$wp_customize->add_setting(
    'tashan_attachment_commentform_visibility'
    );

    $wp_customize->add_control(
    'tashan_attachment_commentform_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Comment Form on the Attachment page','tashan'),
        'section' => 'tashan_content_options',
		'priority' => 6,
        )
    );
		
	// == Social Links Icons Section == //
    // Begin Header Social Icons	
	$wp_customize->add_setting(
    'tashan_social_visibility'
    );

    $wp_customize->add_control(
    'tashan_social_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Show Social Icons?','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 10,
        )
    );
	$wp_customize->add_setting(
    'tashan_facebook_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_facebook_url',
    array(
        'label' => __('Facebook URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 11,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_gplus_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_gplus_url',
    array(
        'label' => __('Google+ URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 12,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_twitter_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_twitter_url',
    array(
        'label' => __('Twitter URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 13,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_pinterest_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_pinterest_url',
    array(
        'label' => __('Pinterest URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 14,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_linkedin_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_linkedin_url',
    array(
        'label' => __('LinkedIn URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 15,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_youtube_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_youtube_url',
    array(
        'label' => __('YouTube URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 16,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_flicker_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_flicker_url',
    array(
        'label' => __('Flicker URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 17,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_wordpress_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_wordpress_url',
    array(
        'label' => __('WordPress URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 18,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_github_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_github_url',
    array(
        'label' => __('GitHub URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 19,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_dribbble_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_dribbble_url',
    array(
        'label' => __('Dribbble URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 20,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'tashan_rss_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'tashan_rss_url',
    array(
        'label' => __('RSS Feed URL','tashan'),
        'section' => 'tashan_social_options',
		'priority' => 21,
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'tashan_custom_customize_register' );

function tashan_nav_class_pull() {
  if ( get_theme_mod( 'tashan_nav_pull' ) != 1 ) {
    $ul = 'nav nav-pills pull-right';
  } else {
    $ul = 'nav nav-pills';
  }
  return $ul;
}

/*
 * Applies the background color to the slider.
 */
function tashan_menu_css() {
  $navcolor  = get_theme_mod('nav_menu_color');
  
  // Make sure colors are properly formatted
  $navcolor = '#' . str_replace( '#', '', $navcolor );
  ?>
  
  <style>
	.navbar .brand { color: <?php echo $navcolor; ?>; }
	.navbar .nav > li > a { color: <?php echo $navcolor; ?>; }
  </style>
  <?php
}
add_action( 'wp_head', 'tashan_menu_css', 210 );

/*
 * Applies the background color to the slider.
 */
function tashan_header_background_css() {
  $headercolor       = get_theme_mod('header_background_color');
  $headerimage       = get_theme_mod('header_background_image');
  $headingcolor      = get_theme_mod('heading_text_color');
  $headingfont       = get_theme_mod('tashan_heading_text_font');
  $subheadingcolor   = get_theme_mod('subheading_text_color');
  $toppadding        = get_theme_mod('tashan_header_top_padding');
  $bottompadding     = get_theme_mod('tashan_header_bottom_padding');
  
  // Make sure colors are properly formatted
  $headercolor     = '#' . str_replace( '#', '', $headercolor );
  $headingcolor    = '#' . str_replace( '#', '', $headingcolor );
  $subheadingcolor = '#' . str_replace( '#', '', $subheadingcolor );
  ?>
  
  <style>
	header.band { background: <?php echo $headercolor; ?>; padding: <?php echo $toppadding; ?>% 0 <?php echo $bottompadding; ?>% 0 ;}
	header.band { background-image: url( <?php echo $headerimage; ?> ) ; }
	.site-title a {color: <?php echo $headingcolor; ?>; font-family:<?php echo $headingfont; ?>}
	.site-description {color: <?php echo $subheadingcolor; ?>; font-family:<?php echo $headingfont; ?>} 
  </style>
  <?php
}
add_action( 'wp_head', 'tashan_header_background_css', 210 );

/*
 * Applies the background color to the slider.
 */
function tashan_content_css() {
  $contenttitlefont       = get_theme_mod('tashan_content_title_font');
  $widgettitlefont        = get_theme_mod('tashan_widget_title_font');
  $recentposttitlefont    = get_theme_mod('tashan_recentpost_title_font');
  ?>
  
  <style>
	.entry-title, 
	.entry-title a, 
	.entry-summary h1, 
	.entry-summary h2,
    .entry-summary h3,
    .entry-content h1,
	.entry-content h2,
	.entry-content h3 {font-family:<?php echo $contenttitlefont; ?>}
	#showcase .tashan-recent-post-widget li h3,
    .tashan-recent-post-widget li h3 {font-family:<?php echo $recentposttitlefont; ?>}
	.widget-title {font-family:<?php echo $widgettitlefont; ?>}
  </style>
  <?php
}
add_action( 'wp_head', 'tashan_content_css', 210 );