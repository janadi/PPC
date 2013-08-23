<div class="row-fluid">
    <?php
        global $myThemes_inver;
        $myThemes_inver = true;
        $myThemes_layout = new layout( );

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
        /* LEFT SIDEBAR */
        $myThemes_layout -> echoSidebar( 'right' );
    ?>
</div>