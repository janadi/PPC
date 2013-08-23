<?php get_header(); ?>

        <div class="row-fluid my-title">
            <?php
                $firstName  = get_the_author_meta( 'first_name' , $post-> post_author );
                $lastName   = get_the_author_meta( 'last_name' , $post-> post_author );
                $printName  = get_the_author_meta( 'display_name' , $post-> post_author );

                if( strlen( $firstName . $lastName ) )
                    $name = $firstName . ' ' . $lastName;
                else
                    $name = $printName
            ?>

            <h1><?php echo __( 'Author' , 'myThemes' ) . ': <strong>' . $name . '</strong>'; ?></h1>
        </div>    

        <?php
            $bio        = get_the_author_meta( 'description' , $post-> post_author );

            $vimeo      = get_the_author_meta( 'vimeo' , $post-> post_author );
            $twitter    = get_the_author_meta( 'twitter' , $post-> post_author );
            $facebook   = get_the_author_meta( 'facebook' , $post-> post_author );

            $google     = get_the_author_meta( 'google_plus' , $post-> post_author );
            $youtube    = get_the_author_meta( 'youtube' , $post-> post_author );
            $rss        = get_author_posts_url( $post-> post_author ) . 'feed/';
        ?>
        <div class="author-box">
            <?php echo get_avatar( $post -> post_author , 100 ); ?>
            <p><?php echo $bio; ?></p>
            <div class="clearfix"></div>
            <div class="details">
                <h4><?php _e( 'Published' , 'myThemes' ); ?>: <strong><?php echo $wp_query -> found_posts ?></strong> <?php _e( 'articles' , 'myThemes' ); ?></h4>
                <div class="author-social">
                    <?php if( strlen( esc_url( $vimeo ) ) ) { ?>
                        <a href="<?php echo esc_url( $vimeo ) ?>" class="vimeo" target="_blank"></a>
                    <?php } ?>
                    <?php if( strlen( esc_url( $twitter ) ) ) { ?>
                        <a href="<?php echo esc_attr( $twitter ) ?>" class="twitter" target="_blank"></a>
                    <?php } ?>
                    <?php if( strlen( esc_url( $facebook ) ) ) { ?>
                        <a href="<?php echo esc_url( $facebook ) ?>" class="facebook" target="_blank"></a>
                    <?php } ?>
                    <?php if( strlen( esc_url( $google ) ) ) { ?>
                        <a href="<?php echo esc_url( $google ) ?>" class="google-plus" target="_blank"></a>
                    <?php } ?>
                    <?php if( strlen( esc_url( $youtube ) ) ) { ?>
                        <a href="<?php echo esc_url( $youtube ) ?>" class="youtube" target="_blank"></a>
                    <?php } ?>
                        <a href="<?php echo $rss; ?>" class="rss" target="_blank"></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <?php get_template_part( 'cfg/templates/loop' ); ?>

<?php get_footer(); ?>