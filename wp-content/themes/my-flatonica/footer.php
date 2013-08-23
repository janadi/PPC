        </div>
        <footer>
            <div class="container-fluid my-container">
                <?php
                    $vimeo      = myThemes::get( 'vimeo' );
                    $twitter    = myThemes::get( 'twitter' );
                    $facebook   = myThemes::get( 'facebook' );
                    $behance    = myThemes::get( 'behance' );
                    $flickr     = myThemes::get( 'flickr' );
                    $google     = myThemes::get( 'google-plus' );
                    $youtube    = myThemes::get( 'youtube' );
                    $stumble    = myThemes::get( 'stumble' );
                    $rss        = myThemes::get( 'rss' );
                ?>
                
                <?php 
                    if( $vimeo || $twitter || $facebook || $behance || $flickr || $google || $youtube || $stumble || $rss ){
                ?>
                    <div class="social">
                        <?php
                            if( $vimeo ){
                        ?>
                                <a href="<?php echo $vimeo; ?>" title="'<?php _e( 'follow us on Vimeo' , 'myThemes' ); ?>" class="vimeo" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $twitter ){
                        ?>
                                <a href="<?php echo $twitter; ?>" title="<?php _e( 'follow us on Twitter' , 'myThemes' ); ?>" class="twitter" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $facebook ){
                        ?>
                                <a href="<?php echo $facebook; ?>" title="<?php _e( 'follow us on Facebook' , 'myThemes' ); ?>" class="facebook" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $behance ){
                        ?>
                                <a href="<?php echo $behance; ?>" title="<?php _e( 'follow us on Behance' , 'myThemes' ); ?>" class="behance" target="_blank"></a>
                        <?php        
                            }
                        ?>
                        <?php
                            if( $flickr ){
                        ?>
                                <a href="<?php echo $flickr; ?>" title="<?php _e( 'follow us on Flickr' , 'myThemes' ); ?>" class="flickr" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $google ){
                        ?>
                                <a href="<?php echo $google; ?>" title="<?php _e( 'follow us on Google plus' , 'myThemes' ); ?>" class="google-plus" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $youtube ){
                        ?>
                                <a href="<?php echo $youtube; ?>" title="<?php _e( 'follow us on Youtube' , 'myThemes' ); ?>" class="youtube" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $stumble ){
                        ?>
                                <a href="<?php echo $stumble; ?>" title="<?php _e( 'follow us on Stumble' , 'myThemes' ); ?>" class="stumble" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <?php
                            if( $rss ){
                        ?>
                                <a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e( 'Rss feed' , 'myThemes' ); ?>" class="rss" target="_blank"></a>
                        <?php
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                <?php        
                    }
                ?>      
                <p><?php echo myThemes::get( 'footer-text', true ); ?></p>
                <div class="clearfix"></div>
                <?php echo stripslashes( myThemes::get( 'script' , true )  ); ?>    
            </div>
        </footer>
        <?php wp_footer(); ?>
	</body>
</html>