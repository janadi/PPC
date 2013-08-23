<?php get_header(); ?>

    <div class="row-fluid my-title">
        <h2><?php _e( 'Search results for' , 'myThemes' ); ?> "<?php echo get_query_var( 's' ) ?>"</h2>
    </div>

    <?php
        global  $wp_query;
        
        $wp_query = new WP_Query( array(
            'post_type' => array( 'post' , 'page' ),
            'post_status' => 'publish',
            'paged' => myThemes::pagination(),
            's' => get_query_var( 's' )
        ));
        
        get_template_part( 'cfg/templates/loop' );
    ?>

<?php get_footer(); ?>