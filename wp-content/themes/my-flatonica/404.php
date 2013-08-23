<?php get_header(); ?>

    <div class="row-fluid my-title">
        <h2><?php _e( 'Not found results' , 'myThemes' ); ?></h2>
    </div>    
    <div class="row-fluid">
        <?php $myThemes_layout = new layout( ); ?>

        <?php    
            /* LEFT SIDEBAR */
            $myThemes_layout -> echoSidebar( 'left' );
        ?>
        
        <section class="<?php echo $myThemes_layout -> contentClass(); ?> list-view">
            <article>
                <p><?php _e( 'We apologize but this page, post or resource does not exist or can not be found. Perhaps it is necessary to change the call method to this page, post or resource.' , 'myThemes' ) ?></p>
            </article>
        </section>
        <?php    
            /* RIGHT SIDEBAR */
            $myThemes_layout -> echoSidebar( 'right' );
        ?>
    </div>

<?php get_footer(); ?>