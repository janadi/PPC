<?php get_header(); ?>

    <div class="row-fluid my-title">
        <h2><?php _e( 'Results for category' , 'myThemes' ); ?> "<?php echo get_cat_name( get_query_var( 'cat' ) ); ?>"</h2>
    </div>

    <?php get_template_part( 'cfg/templates/loop' ); ?>

<?php get_footer(); ?>