<?php
/**
 * The template for displaying attachments.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>
<div id="content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="article">
		<div class="head one">
			<h2><?php the_title(); ?></h2>	

		</div>
		<div class="body">
			
			<?php if ( wp_attachment_is_image() ) : 
				$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
				foreach ( $attachments as $k => $attachment ) {
					if ( $attachment->ID == $post->ID )
						break;
				}
				$k++;
				// If there is more than 1 image attachment in a gallery
				if ( count( $attachments ) > 1 ) {
					if ( isset( $attachments[ $k ] ) )
						// get the URL of the next image attachment
						$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
					else
						// or get the URL of the first image attachment
						$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
				} else {
					// or, if there's only 1 image attachment, get the URL of the image
					$next_attachment_url = wp_get_attachment_url();
				}
			?>
			
			<p><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
				$attachment_size = apply_filters( 'blackmesa_attachment_size', 600 );
				echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
			?></a></p>
			
			<?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>
			
			<?php 
				if ( wp_attachment_is_image() ) {
					$metadata = wp_get_attachment_metadata();
					printf( __( 'Full size is %s pixels', 'blackmesa'),
						sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
							wp_get_attachment_url(),
							esc_attr( __('Link to full-size image', 'blackmesa') ),
							$metadata['width'],
							$metadata['height']
						)
					);
				}
			?>
			<div class="nav">
				<p>
					<div class="alignleft"><?php previous_image_link( false , __('&larr; Previous image', 'blackmesa') ) ?></div>
					<div class="alignright"><?php next_image_link( false , __('Next image &rarr;', 'blackmesa') ) ?></div>
				</p>
				<div class="clear"></div>
			</div>
			<?php else : ?>
				<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
			<?php endif; ?>
			
			<div class="clear"></div>
			<div class="meta">
				<ul>
					<li class="date"><?php _e( 'Posted on', 'blackmesa' ); ?> <?php the_date('j. F Y'); ?></li>
					<li class="author"><?php _e( 'Written by', 'blackmesa' ); ?> <?php the_author_link(); ?></li>
					<?php if ( count( get_the_category() ) ) : ?>
					<li class="cats"><?php _e( 'Categories:', 'blackmesa' ); ?> <?php the_category(', '); ?></li>
					<?php endif; ?>
					<?php
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
					?>
					<li class="tags"><?php _e( 'Tags:', 'blackmesa' ); ?> <?php the_tags(''); ?></li>
					<?php endif; ?>
				</ul>
				<?php comments_popup_link( __( 'Leave a comment', 'blackmesa' ), __( '1 Comment', 'blackmesa' ), __( '% Comments', 'blackmesa' ), ( 'button comments alignright' ) ); ?>
			</div>
		</div>
	</div>		

					


						


						

<?php the_content( __( 'Continue reading &rarr;', 'blackmesa' ) ); ?>
<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'blackmesa' ), 'after' => '' ) ); ?>

						

						
						
						
						
						
		
						
						

<?php comments_template(); ?>

<?php endwhile; ?>
</div>

<?php get_sidebar() ?>
<?php get_footer(); ?>