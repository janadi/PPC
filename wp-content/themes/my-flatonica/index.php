<?php get_header(); ?>
        
    <div class="row-fluid my-title">
        <h2><?php _e( 'Blog Page' , 'myThemes' ); ?></h2>
    </div>

    <?php get_template_part( 'cfg/templates/loop' ); ?>

<?php get_footer(); ?>