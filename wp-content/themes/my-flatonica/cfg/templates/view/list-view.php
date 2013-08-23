<?php global $post, $myThemes_inver; ?>
<?php
    if( $myThemes_inver ){
        $classes = 'row-fluid inverted-view';
    }
    else{
        $classes = 'row-fluid';
    }
    
    $myThemes_inver = !$myThemes_inver;
?>
<article <?php post_class( $classes ); ?>>
    
    <?php if( has_post_thumbnail() ) { ?>
        <div class="my-thumbnail span6">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'full' ); ?>
            </a>
        </div>
    <?php } ?>

    <?php if( !empty( $post -> post_title ) ) { ?>
    
        <h3><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( $post -> post_title ); ?>"><?php the_title(); ?></a></h3>
    
    <?php } else { ?>
        
        <h3><a href="<?php the_permalink() ?>"><?php _e( 'Read more about ..' , 'myThemes' ) ?></a></h3>
        
    <?php } ?>
        
    <p><?php the_excerpt(); ?></p>
    
    <p class="actions">
        <?php 
            if ( comments_open() ){
                $comments = get_comments_number( $post -> ID );
                $link = get_comments_link( $post -> ID );
            }
            else{
                $comments = __( 'Closed' , 'myThemes' );
                $link = get_permalink( $post -> ID );
            }
        ?>
        <a href="<?php echo  $link; ?>" class="button comments">
            <i></i><span><?php echo $comments; ?></span>
        </a>
        <span class="like-<?php echo $post -> ID ?>">
            <?php echo likes::get2( $post -> ID ); ?>
        </span>
    </p>
    <div class="clearfix"></div>
</article>