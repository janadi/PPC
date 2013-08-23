<?php

function wpparastrap_customize_register($wp_customize) {
    
   $wp_customize->add_section( 'wpparastrap_general_options' , array(
    'title'      => __('General Options','wpparastrap'),
    'priority'   => 30,
   ) );
   
   $wp_customize->add_section( 'wpparastrap_slider_options' , array(
    'title'      => __('Home Slider Options','wpparastrap'),
    'priority'   => 32,
   ) );
   
   $wp_customize->add_section( 'wpparastrap_home_intro_options' , array(
    'title'      => __('Home Intro Options','wpparastrap'),
    'priority'   => 34,
   ) );
   
   $wp_customize->add_section( 'wpparastrap_home_content_options' , array(
    'title'      => __('Home Content Options','wpparastrap'),
    'priority'   => 36,
   ) );
   
/**
 * Lets begin adding our own settings and controls for this theme
 * Plus organize it in sequence in each setting group with a priority level
 */
	
	// Begin General Section
	$wp_customize->add_setting(
    'wpparastrap_blogfeed_excerpts'
    );
	
	$wp_customize->add_control(
    'wpparastrap_blogfeed_excerpts',
    array(
        'type' => 'checkbox',
        'label' => __('Switch to exceprts on blog feed?', 'wpparastrap'),
        'section' => 'wpparastrap_general_options',
		'priority' => '1',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_blogfeed_excerpt_length'
    );

    $wp_customize->add_control(
    'wpparastrap_blogfeed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '80',
        'label' => __('Define the excerpt length (default is 80 chars)', 'wpparastrap'),
        'section' => 'wpparastrap_general_options',
		'priority' => '2',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_attachment_commentform_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_attachment_commentform_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide Comment Form on the Attachment page', 'wpparastrap'),
        'section'  => 'wpparastrap_general_options',
		'priority' => '3',
        )
    );
	
	// Begin Home Intro Settings
	$wp_customize->add_setting(
    'wpparastrap_home_message_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_home_message_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show the home page message section?', 'wpparastrap'),
        'section'  => 'wpparastrap_home_intro_options',
		'priority' => '1',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_home_message',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'wpparastrap_home_message',
    array(
        'label'     => __('Enter your message here - make it catchy!', 'wpparastrap'),
        'section'   => 'wpparastrap_home_intro_options',
		'priority'  => '2',
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'wpparastrap_message_button_text',
    array(
        'default' => __('Learn more »', 'wpparastrap'),
    ));
	
	$wp_customize->add_control(
    'wpparastrap_message_button_text',
    array(
        'label'     => __('Home Message Button Text', 'wpparastrap'),
        'section'   => 'wpparastrap_home_intro_options',
		'priority'  => '3',
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'wpparastrap_message_button_url',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'wpparastrap_message_button_url',
    array(
        'label'    => __('Home Message Button Link', 'wpparastrap'),
        'section'  => 'wpparastrap_home_intro_options',
		'priority' => '4',
        'type'     => 'text',
    ));
	
	// Begin Home Posts Settings
	$wp_customize->add_setting(
    'wpparastrap_home_content_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_home_content_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Custom Content above the posts? Default is "Off"', 'wpparastrap'),
        'section'  => 'wpparastrap_home_content_options',
		'priority' => '1',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_custom_content_title_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_custom_content_title_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Custom Content Title?', 'wpparastrap'),
        'section'  => 'wpparastrap_home_content_options',
		'priority' => '2',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_home_posts_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_home_posts_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide Latest Posts on Home page? Default is "On" - This will also hide the sidebar', 'wpparastrap'),
        'section'  => 'wpparastrap_home_content_options',
		'priority' => '3',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_post_section_title',
    array(
        'default' => __('Latest Posts', 'wpparastrap'),
    ));
	
	$wp_customize->add_control(
    'wpparastrap_post_section_title',
    array(
        'label'      => __('Post Section Title', 'wpparastrap'),
        'section'    => 'wpparastrap_home_content_options',
		'priority'   => '4',
        'type'       => 'text',
    ));
	
	//  = Home Category Dropdown =

    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('wpparastrap_home_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'wpparastrap_home_cat', array(
		'settings' => 'wpparastrap_home_cat',
		'label'    => __('Select Home Posts Category:', 'wpparastrap'),
		'section'  => 'wpparastrap_home_content_options',
		'priority' => '5',
		'type'     => 'select',
		'choices'  => $cats,
	));
	
	$wp_customize->add_setting(
    'wpparastrap_custom_content_thumb_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_custom_content_thumb_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide post thumbnails?', 'wpparastrap'),
        'section'  => 'wpparastrap_home_content_options',
		'priority' => '6',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_home_number'
    );

    $wp_customize->add_control(
    'wpparastrap_home_number',
    array(
        'type'     => 'text',
		'default'  => 3,
        'label'    => __('Number Of Posts To Show - multiple of 3s only i.e 6, 9, 12 (default is 3)', 'wpparastrap'),
        'section'  => 'wpparastrap_home_content_options',
		'priority' => '7',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_home_excerpt_length'
    );

    $wp_customize->add_control(
    'wpparastrap_home_excerpt_length',
    array(
        'type'      => 'text',
		'default'   => '20',
        'label'     => __('Define home posts excerpt length (default is 20 chars)', 'wpparastrap'),
        'section'   => 'wpparastrap_home_content_options',
		'priority'  => '8',
        )
    );
	
	// Begin Slider Section
	
    $wp_customize->add_setting(
    'wpparastrap_slider_visibility'
    );

    $wp_customize->add_control(
    'wpparastrap_slider_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Home Slider', 'wpparastrap'),
        'section'  => 'wpparastrap_slider_options',
		'priority' => 1,
        )
    );
	//  = Slider Category Dropdown =

    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('wpparastrap_slide_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'wpparastrap_slide_cat', array(
		'settings' => 'wpparastrap_slide_cat',
		'label'    => __('Select Slider Category:', 'wpparastrap'),
		'section'  => 'wpparastrap_slider_options',
		'priority' => '2',
		'type'     => 'select',
		'choices'  => $cats,
	));
	
	$wp_customize->add_setting(
    'wpparastrap_slide_number'
    );

    $wp_customize->add_control(
    'wpparastrap_slide_number',
    array(
        'type'     => 'text',
		'default'  => 5,
        'label'    => __('Number Of Slides To Show - i.e 10 (default is 5)', 'wpparastrap'),
        'section'  => 'wpparastrap_slider_options',
		'priority' => '3',
        )
    );
	
	$wp_customize->add_setting(
    'wpparastrap_slider_excerpt'
    );

    $wp_customize->add_control(
    'wpparastrap_slider_excerpt',
    array(
        'type'    => 'text',
		'default' => 40,
        'label'   => __('Enter excerpt length for the slider (default is 40)','wpparastrap'),
        'section' => 'wpparastrap_slider_options',
		'priority' => '4',
        )
    );
}

add_action( 'customize_register', 'wpparastrap_customize_register' );