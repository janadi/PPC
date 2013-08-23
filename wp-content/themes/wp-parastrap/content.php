<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage WPParaStrap
 * @since WP Smart Strap 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php if ( is_single() ) : ?>
		<h1 class="title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php wpparastrap_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'wpparastrap' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->
    		
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
	    <?php if ( get_theme_mod( 'wpparastrap_blogfeed_excerpts' ) != 0 ) { ?>
		    <?php get_template_part("wpparastrap-thumbnail"); ?>
			<?php the_excerpt(); ?>
	    <?php } else { ?>
	        <?php get_template_part("wpparastrap-thumbnail"); ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpparastrap' ) ); ?>
		<?php } ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpparastrap' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'wpparastrap' ) . '</span>', __( 'One comment so far', 'wpparastrap' ), __( 'View all % comments', 'wpparastrap' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

	</footer><!-- .entry-meta -->
</article><!-- #post -->
<hr>
