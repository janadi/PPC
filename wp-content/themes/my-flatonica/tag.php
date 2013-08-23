<?php get_header(); ?>

    <div class="row-fluid my-title">
        <h2><?php _e( 'Results for tag' , 'myThemes' ); ?> "<?php echo urldecode( get_query_var( 'tag' ) ); ?>"</h2>
    </div>
              
    <?php get_template_part( 'cfg/templates/loop' ); ?>
                
<?php get_footer(); ?>