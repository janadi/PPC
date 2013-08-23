<?php
/**
 * The Template for displaying all single posts.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php if ( post_password_required() ) : ?>
		<div class="article">
			<?php if (has_post_thumbnail()) { echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
			<div class="head one <?php if (has_post_thumbnail()) { echo ' with-thumbnail'; } ?>">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
			<div class="body">	
				<?php the_content(); ?>
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
		
		<?php else : ?>
		<div class="article">
			<?php if (has_post_thumbnail()) { echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
			<div class="head one <?php if (has_post_thumbnail()) { echo ' with-thumbnail'; } ?>">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
			<div class="body">
			
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'blackmesa' ), 'after' => '</div>' ) ); ?>
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
						
		<?php comments_template( '', true ); ?>
		<?php endif; ?>
		
	<?php endwhile; // end of the loop. ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>