<?php
    if( is_singular( 'post' ) && ( has_category( ) || has_tag() ) ){
?>
        <div class="post-meta-terms">
            <?php

                if( is_singular( 'post' ) && has_category( ) ){
                    echo '<div class="post-meta-categories">';
                    echo '<strong>' . __( 'Categories' , 'myThemes' ) . '</strong>: ';
                    the_category( ', ' );
                    echo '</div>';
                }

                if( is_singular( 'post' ) && has_tag() ){
                    echo '<div class="post-meta-tags">';
                    echo '<strong>' . __( 'Post Tags' , 'myThemes' ) . '</strong>: ';
                    the_tags( ' ' , ' ' , ' ' );
                    echo '</div>';
                }
            ?>
        </div>
<?php
    }
?>