<?php get_header(); ?>

    <?php
        $myThemes_layout = new layout( 'front-page' );
        if( get_option( 'show_on_front' ) == 'page' ){

            $wp_query = new WP_Query( array( 'p' => get_option( 'page_on_front' ) , 'post_type' => 'page' ) );

            if( count( $wp_query -> posts ) ){
                foreach( $wp_query -> posts as $post ){

                    $wp_query -> the_post();
                    $show = meta::get( $post -> ID , 'post-title' );
                    if( strlen( $show ) == 0 ){
                        $show = 1;
                    }

                    if(  $show ){ ?>
                        <div class="row-fluid my-title">
                            <h1><?php the_title() ?></h1>
                        </div>
                    <?php } ?>

                    <div class="row-fluid">
                        <?php
                            /* LEFT SIDEBAR */
                            $myThemes_layout -> echoSidebar( 'left' );
                        ?>
                        <section class="<?php echo $myThemes_layout -> contentClass(); ?> my-single">
                            <article <?php post_class(); ?>>
                                <?php if( has_post_thumbnail() ){ ?>
                                    <div class="my-thumbnail">
                                        <?php echo get_the_post_thumbnail( $post -> ID , array( 9999 , 9999 ) , esc_attr( $post -> post_title ) ); ?>
                                        <?php $caption = get_post( get_post_thumbnail_id() ) -> post_excerpt; ?>
                                        <?php
                                            if( !empty( $caption ) ) {
                                        ?>
                                                <footer class="wp-caption">
                                                    <?php echo $caption; ?>
                                                </footer>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                <?php } ?>
                                
                                <?php the_content(); ?>
                                
                                <div class="clearfix"></div>
                                
                                <?php wp_link_pages( array( 'before' => '<div><p style="color: #000000;">' . __( 'Pages', "myThemes" ) . ':', 'after' => '</p></div>' ) ); ?>
                                
                                <div class="clearfix"></div>
                            </article>
                        </section>
                        <?php
                            /* RIGHT SIDEBAR */
                            $myThemes_layout -> echoSidebar( 'right' );
                        ?>
                    </div>
            
            <?php    
                }
            ?>
        <?php
            } 
        ?>
            
    <?php
        } else {
    ?>
            <div class="row-fluid my-title">
                <h2><?php _e( 'Blog Page' , 'myThemes' ); ?></h2>
            </div>
            <div class="row-fluid">
                <?php
                    /* LEFT SIDEBAR */
                    $myThemes_layout -> echoSidebar( 'left' );
                ?>
                <section class="<?php echo $myThemes_layout -> contentClass(); ?> list-view">
                    <?php
                        if( have_posts() ){
                            while( have_posts() ){
                                the_post();
                                get_template_part( 'cfg/templates/view/list-view' );
                            }
                        }
                        else{
                            echo '<h3>' . __( 'Not found results' , 'myThemes' ) . '</h3>';
                            echo '<p>' . __( 'We apologize but this page, post or resource does not exist or can not be found. Perhaps it is necessary to change the call method to this page, post or resource.' , 'myThemes' ) . '</p>';
                        }

                        get_template_part( 'cfg/templates/pagination' );
                    ?>
                </section>
                <?php
                    /* RIGHT SIDEBAR */
                    $myThemes_layout -> echoSidebar( 'right' );
                ?>
            </div>
    <?php
        } 
    ?>

<?php get_footer(); ?>