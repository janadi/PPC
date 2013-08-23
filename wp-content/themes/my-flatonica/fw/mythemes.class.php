<?php
    class myThemes{

        /* READ ADMIN SETTINGS */
        static function get( $optName , $strip = false )
        {
            return sett::get( 'mythemes-' . $optName , $strip );
        }
        
        static function pget( $optName )
        {
            if( isset( $_POST ) && isset( $_POST[ 'mythemes-' . $optName ] ) )
                return $_POST[ 'mythemes-' . $optName ];
            else
                return self::get( $optName );
        }
        
        /* READ THEME SETTINGS */
        static function cfg( $sett )
        {
            $result = '';
            $file = get_template_directory() . '/cfg/static.php';
            
            if( file_exists( $file ) ){
                include $file;
                
                if( isset( $cfg[ $sett ] ) ){
                    $result = $cfg[ $sett ];
                }
            }
            
            return $result;
        }
       
        
        /* INIT FILTERS */
        static function init_filters()
        {
            $filters = self::cfg( 'filters' );
            if( !empty( $filters ) && is_array( $filters ) ){
                foreach( $filters as $filter => & $d ){
                    add_filter( $filter , $d );
                }
            }
        }
        
        /* INIT ACTIONS */
        static function init_actions()
        {
            $actions = self::cfg( 'actions' );
            if( !empty( $actions ) && is_array( $actions ) ){
                foreach( $actions as $action => & $d ){
                    add_action( $action , $d );
                }
            }
        }
        
        /* INIT SCRIPTS */
        static function init_scripts()
        {
            wp_enqueue_script( 'jquery' );

            wp_enqueue_script( 'functions' , get_template_directory_uri() . '/media/js/bootstrap.min.js' );
            wp_enqueue_script( 'settings' , get_template_directory_uri() . '/media/js/settings.js' );
            wp_enqueue_script( 'likes' , get_template_directory_uri() . '/media/js/likes.js' );

            wp_enqueue_script(
                'js-pretty-photo',
                get_template_directory_uri( ) . '/media/js/jquery.prettyPhoto.js'
            );

            wp_enqueue_script(
                'settings-pretty-photo',
                get_template_directory_uri( ) . '/media/js/settings.prettyPhoto.js'
            );

            wp_enqueue_style(
                'css-pretty-photo',
                get_template_directory_uri( ) . '/media/css/prettyPhoto.css'
            );

            /* INCLUDE FOR REPLY COMMENTS */
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
                    wp_enqueue_script( 'comment-reply' );
               
            /* INCLUDE STYLE.CSS */
            wp_enqueue_style( 'mythemes-style', get_stylesheet_uri() );
        }
        
        /* REGISTER THEME MENUS */
        static function reg_menus( )
        {
            register_nav_menus( self::cfg( 'menus' ) );
        }
        
        /* REGISTER THEME SIDEBARS */
        static function reg_sidebars( )
        {
            $sidebars = self::cfg( 'sidebars' );

            if( !empty( $sidebars ) && is_array( $sidebars ) ){
                foreach( $sidebars as $sidebar ){
                    register_sidebar( $sidebar );
                }
            }
            
            /* CUSTOM SIDEBARS */
            $custom = sett::get( self::cfg( 'custom-sidebars' ) );
            if( !empty( $custom ) && is_array( $custom ) ){
                foreach( $custom as $s ){
                    $sidebars[0][ 'name' ] = $s;
                    $sidebars[0][ 'id' ] = strtolower( str_replace( ' ' , '-' , $s ) );
                    $sidebars[0][ 'description' ] = __( 'Additional custom sidebar' , 'myThemes' );
                    register_sidebar( $sidebars[ 0 ] );
                }
            }
        }
        
        function sidebars()
        {
            $sidebars = array( 'main-sidebar' => __( 'Main sidebar' , 'myThemes' ) );
            $custom = sett::get( self::cfg( 'custom-sidebars' ) );
            if( !empty( $custom ) ){
                foreach( $custom as $s ){
                    $sidebars[ strtolower( str_replace( ' ' , '-' , $s ) ) ] = $s;
                }
            }
            return $sidebars;
        }
        
        static function setup()
        {
            myThemes::install_theme();
            
            load_theme_textdomain( 'myThemes' );
            load_theme_textdomain( 'myThemes' , get_template_directory() . '/media/languages' );
    
            if ( function_exists( 'load_child_theme_textdomain' ) ){
                load_child_theme_textdomain( 'myThemes' );
            }
            add_editor_style();

            add_theme_support( 'custom-background', array(
                    'default-color' => 'fafafa',
                    'default-image' => ''
            ) );
	
            add_theme_support( 'automatic-feed-links' );

            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 1200, 9999 );
            
            $args = array(
                'default-text-color'     => '009cd7',
                'wp-head-callback'       => array( 'myThemes' , 'custom_style' ),
                'default-image'          => '',
                'random-default'         => false,
                'width'                  => 0,
                'height'                 => 0,
                'flex-height'            => false,
                'flex-width'             => false,
                'header-text'            => true,
                'uploads'                => false,
                'admin-head-callback'    => array( 'myThemes' , 'admin_header' )
            );

            add_theme_support( 'custom-header', $args );
        }
        
        static function install_theme()
        {    
            if( is_admin() && isset( $_GET['activated'] ) ){
                get_template_part( 'fw/admin/setup.class' );
                setup::likes();
            }
        }
        
        static function admin_header()
        {
?>
            <style>
                @import url(http://fonts.googleapis.com/css?family=Roboto);

                div#headimg{
                    background-color: #121212;
                    padding: 20px;
                }
                div#headimg h1,
                div#headimg h2{
                    font-family: Roboto, sans-serif;
                    font-size: 36px;
                    font-weight: 400;
                    line-height: 40px;
                    margin: 0px;
                    text-transform: uppercase;
                }
                div#headimg div{
                    color: #ffffff !important;
                    font-family: Roboto,sans-serif;
                    font-size: 13px;
                    font-weight: 300;
                    letter-spacing: 1px;
                    margin: 0px;
                    opacity: 0.8;
                    filter:alpha(opacity=80);
                }
                div#headimg a{
                    color: #<?php echo get_header_textcolor(); ?>;
                    text-decoration: none;
                }
            </style>
<?php
        }
        static function custom_style()
        {
            $text_color = get_header_textcolor();
?>
            <style type="text/css">
                .navbar hgroup.brand a{
                    color: #<?php echo $text_color; ?>;
                }
                .navbar hgroup.brand p a{
                    color: #ffffff;
                }
                <?php if( myThemes::get( 'logo' ) ) { ?>
                    
                    .navbar hgroup.brand{
                        
                        margin-top: <?php echo myThemes::get( 'logo-top' ); ?>px;
                        <?php
                            $left = (int)myThemes::get( 'logo-left' );
                            if( $left > 0 ){
                                ?> margin-left: <?php echo $left; ?>px; <?php
                            }
                        ?>
                        
                        <?php
                            if( myThemes::get( 'logo-top' ) < 0 ){
                                ?> margin-bottom: <?php echo (-1) * (int)myThemes::get( 'logo-top' ); ?>px;<?php
                            }
                            
                            if( myThemes::get( 'logo-left' ) < 0 ){
                                ?> margin-right: <?php echo (-1) * (int)myThemes::get( 'logo-left' ); ?>px;<?php
                            }
                        ?>
                    }
                    
                <?php } ?>
                
                <?php echo myThemes::get( 'css' ); ?>
            </style>
<?php
        }
        
        static function user_contact( $user_contact )
        {
            $user_contact['vimeo']       = __( 'Vimeo profile ( url )' , 'myThemes' );  
            $user_contact['twitter']     = __( 'Twitter profile ( url )' , 'myThemes' );
            $user_contact['facebook']    = __( 'Facebook page or profile ( url )' , 'myThemes' );
            $user_contact['google_plus'] = __( 'Google + profile ( url )' , 'myThemes' );
            $user_contact['youtube']     = __( 'Youtube profile ( url )' , 'myThemes' );

            return $user_contact;  
        }
        
        function rssThumbnail( $content )
        {
            global $post;
            if ( has_post_thumbnail( $post->ID ) ){
                $content = '' . get_the_post_thumbnail( $post -> ID, 'small-thumb' , array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
            }
            return $content;
        }
        
        static function gravatar( $authorID , $size, $default = '' )
        {
            if( get_user_meta( $authorID , 'avatar' , true ) == -1 ){
                $result = '<img src="' . $default . '" height="' . $size . '" width="' . $size . '" alt="" class="photo avatar" />';
            }else{
                if(  get_user_meta( $authorID , 'avatar' , true ) > 0 ){
                    $avatar_info = wp_get_attachment_image_src( get_user_meta( $authorID , 'avatar' , true ) , array( $size , $size ) );
                    $result = '<img src="' . $avatar_info[0] . '" height="' . $size . '" width="' . $size . '" alt="" class="photo avatar" />';
                }else{
                    $result = get_avatar( $authorID , $size , $default );
                }
            }
            
            return $result;
        }
        
        static function comment( $comment, $args, $depth )
        {
            $GLOBALS['comment'] = $comment;
            switch ( $comment -> comment_type ) {
                case '' : {
                    echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
                    echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
                    echo '<div class="avatar">';
                    echo myThemes::gravatar( $comment -> comment_author_email , 150 );
                    echo '</div>';
                    echo '<div class="comment-body pull-right">';
                    echo '<span class="arrow"></span>';
                    echo '<header>';
                    echo '<cite>';
                    echo get_comment_author_link( $comment -> comment_ID );
                    echo '</cite>';
                    
                    echo '<span class="comment-meta">';
                    echo '<time class="comment-time"><i class="icon-date"></i> ';
                    printf( '%1$s ' , get_comment_date() );
                    echo '</time>';
                    comment_reply_link( array_merge( $args , array( 
                        'reply_text' => __( 'Reply', 'myThemes' ),
                        'before' => '<span class="comment-replay">',
                        'after' => '</span>',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'] )
                    ) );
                    echo '</span>';
                    echo '<div class="clearfix"></div>';
                    echo '</header>';

                    echo '<p class="comment-quote">';
                    if ( $comment -> comment_approved == '0' ) {
                        echo '<em class="comment-awaiting-moderation">';
                        _e( 'Your comment is awaiting moderation.' , 'myThemes' );
                        echo '</em>';
                    }
                    echo get_comment_text();            
                    echo '</p>';
                    
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="clearfix"></div>';
                    echo '</li>';
                    break;
                }	
                case 'pingback'  :{
                }
                case 'trackback' : {
                    break;
                }
            }
        }
        
        /* RETURN NUMBER OFF CURRENT BLOG PAGE */
        static function pagination()
        {
            global $wp_query;
            if( (int) get_query_var('paged') > 0 ){
                $paged = get_query_var('paged');
            }else{
                if( (int) get_query_var('page') > 0 ){
                    $paged = get_query_var('page');
                }else{
                    $paged = 1;
                }
            }
            
            return $paged;
        }
        
        /* DISPLAY BLOG TITLE */
        static function title( $title, $sep )
        {
            global $paged, $page;

            if ( is_feed() )
				return $title;

            /*/ Add the site name. */
            $title .= get_bloginfo( 'name' );

            /*/ Add the site description for the home/front page. */
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                $title = "$title $sep $site_description";

            /*/ Add a page number if necessary. */
            if ( $paged >= 2 || $page >= 2 )
                $title = "$title $sep " . sprintf( __( 'Page %s', 'myThemes' ), max( $paged, $page ) );

            return $title;
        }
        
        static function favicon( $settings = 'favicon' )
        {
            if( myThemes::get( $settings ) ){
                echo '<link rel="shortcut icon" href="' . myThemes::get( $settings ) . '"/>';
            }
            else{
                if( file_exists(  get_template_directory() . '/favicon.ico' ) )
                    echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.ico"/>';
            }
        }
        
        static function ajaxurl()
        {
            echo '<script>';
            echo "var ajaxurl = '" . admin_url( '/admin-ajax.php' ) . "'";
            echo '</script>';
        }
        
        static function group()
        {
            return "myThemes";
        }
        
        static function name()
        {
            $theme = wp_get_theme();
            return $theme -> title;
        }
        
        static function version()
        {
            $theme = wp_get_theme();
            return $theme -> version;
        }
    }
?>