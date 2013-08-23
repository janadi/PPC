<div class="post-meta">
<?php
    global $post;
    
    $firstName  = get_the_author_meta( 'first_name' , $post -> post_author );
    $lastName   = get_the_author_meta( 'last_name' , $post -> post_author );
    $printName  = get_the_author_meta( 'display_name' , $post -> post_author );

    if( strlen( $firstName . $lastName ) )
        $name = $firstName . ' ' . $lastName;
    else
        $name = $printName;
    
    echo '<time class="post-meta-date" datetime="' . get_post_time( 'Y-m-d', false , $post -> ID  ) . '"><i class="meta-icon"></i>' . get_post_time( get_option( 'date_format' ), false , $post -> ID  ) . '</time>';
    
    echo '<a class="post-meta-author" href="' . get_author_posts_url( $post-> post_author ) . '" title="' . __( 'Writed by ' , 'myThemes' ) . ' ' . $name . '"><i></i> ' . $name . '</a>';
    
    if( $post -> comment_status == 'open' ) {
        $nr = get_comments_number( $post -> ID );
        if( $nr == 1){
            $comments = '<strong>' . $nr . '</strong> ' . __( 'Comment' , 'myThemes' );
        }
        else{
            $comments = '<strong>' . $nr . '</strong> ' . __( 'Comments' , 'myThemes' );
        }
        echo '<a href="' . get_comments_link( $post -> ID ). '" class="post-meta-comments"><i class="meta-icon"></i> ' . $comments . '</a>';
    }
    echo '<span class="like-' . $post -> ID . '">' . likes::get( $post -> ID ) . '</span>';
?>
    
</div>
      