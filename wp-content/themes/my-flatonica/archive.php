<?php get_header(); ?>

    <div class="row-fluid my-title">
        <?php
            if ( is_day() ) {
                echo '<h2>' . __( 'Daily archives' , 'myThemes' ) . ' "' . get_the_date() . '"</h2>';
            }else if ( is_month() ) {
                echo '<h2>' . __( 'Monthly archives' , 'myThemes' ) . ' "' . get_the_date( 'F Y' ) . '"</h2>';
            }else if ( is_year() ) {
                echo '<h2>' . __( 'Yearly archives' , 'myThemes' ) . ' "' . get_the_date( 'Y' ) . '"</h2>';
            }else {
                echo '<h2>' . __( 'Blog archives' , 'myThemes' ) . '</h2>';
            }
        ?>
    </div>

    <?php get_template_part( 'cfg/templates/loop' ); ?>

<?php get_footer(); ?>