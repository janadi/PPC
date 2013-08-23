<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div class="article">
		<div class="head one">
			<h2><?php _e( 'Not Found', 'blackmesa' ); ?></h2>
		</div>
		<div class="body push">
			<p><strong>Ein Fehler ist aufgetreten.</strong></p>
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'blackmesa' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
	 
<?php $bm_head = 0; // Var for alternating article headers ?> 
<?php while ( have_posts() ) : the_post(); ?>
<?php $bm_head++; ?>

	<div class="article">
		<?php if (has_post_thumbnail()) { echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
		<div class="head <?php if($bm_head&1) { echo 'one';} elseif($bm_head&2) { echo 'two';} else {echo 'three';} if (has_post_thumbnail()) { echo ' with-thumbnail'; }	?>">
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'blackmesa' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div>
		<div class="body">
			<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
					<?php the_excerpt(); ?>
			<?php else : ?>
					<?php the_content( __( 'Continue reading &rarr;', 'blackmesa' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'blackmesa' ), 'after' => '</div>' ) ); ?>
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
	<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<?php next_posts_link( __( '<span class="buttonGlass1 alignleft">&larr; Older posts</span>', 'blackmesa' ) ); ?>
		<?php previous_posts_link( __( '<span class="buttonGlass2 alignright">Newer posts &rarr; </span>', 'blackmesa' ) ); ?>
		<div class="clear"></div>
	</div>
<?php endif; ?>