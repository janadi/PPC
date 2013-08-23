<?php
    global $wpdb;
    $cfg = array(
        
        'hot-limit' => myThemes::get( 'hot-limit' ),
        
        /* EDITOR */
        'editor' => array(
        ),
        
        /* MENUS */
        'menus' => array(
            'header' => __( 'Header Menu' , 'myThemes' )
        ),
        
        /* SIDEBARS */
        'sidebars' => array(
            array(
                'name' => __( 'Main Sidebar' , 'myThemes' ),
                'id' => 'main-sidebar',
                'description' => __( 'Main Sidebar - is used by default for next templates: 404, Archive, Author, Category, Search and Tag.' , 'myThemes' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="sidebar-title">',
                'after_title' => '</h4>',
            ),
            array(
                'name' => __( 'Second Sidebar' , 'myThemes' ),
                'id' => 'second-sidebar',
                'description' => __( 'Front Page Sidebar - is used by default on front page ( if not is set to show a page for front page ).' , 'myThemes' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="sidebar-title">',
                'after_title' => '</h4>',
            ),
            array(
                'name' => __( 'Third Sidebar' , 'myThemes' ),
                'id' => 'third-sidebar',
                'description' => __( 'Post Sidebar - is used by default for single post.' , 'myThemes' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="sidebar-title">',
                'after_title' => '</h4>',
            ),
            array(
                'name' => __( 'Fourth Sidebar' , 'myThemes' ),
                'id' => 'fourth-sidebar',
                'description' => __( 'Additional Sidebar - is not used by default, but you can use it on different pages or posts, from individual page/post - myThemes settings.' , 'myThemes' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="sidebar-title">',
                'after_title' => '</h4>',
            )
        ),
		'filters' => array(
            'updating' => array( 'myThemes' , 'install_theme' )
        ),
        'actions' => array(
            'save_post' => array( 'likes' , 'resetHot' ),
            'delete_post' => array( 'likes' , 'resetHot' ),
            'trash_post' => array( 'likes' , 'resetHot' )
        ),
        'db' => array(
            'my_likes' => $wpdb -> prefix  . 'myThemes_likes',
            'my_hot_posts' => $wpdb -> prefix . 'myThemes_hot_posts',
            'obj' => $wpdb
        )
    );
    
    if(is_user_logged_in() ){
        $cfg[ 'actions' ][ 'wp_ajax_likes_set' ] = array( 'likes' , 'set' ); 
    }
    else{
        $cfg[ 'actions' ][ 'wp_ajax_nopriv_likes_set' ] = array( 'likes' , 'set' );
    }
?>