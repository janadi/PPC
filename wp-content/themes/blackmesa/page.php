<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */

get_header(); ?>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
		<div class="article" id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<?php if (has_post_thumbnail()) { echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
			<div class="head one <?php if (has_post_thumbnail()) { echo ' with-thumbnail'; } ?>"> 		<h2><?php the_title(); ?></h2>
			</div>
			<div class="body">	
				<?php the_content(); ?>
				<div class="pagination">
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div>
				<div class="clear"></div>
				<div class="meta">
					<ul>
						<li class="date">Posted on <?php the_date('j. F Y'); ?></li>
						<li class="author">Written by <?php the_author_link(); ?></li>
					</ul>
					<?php comments_popup_link( __( 'Leave a comment', 'blackmesa' ), __( '1 Comment', 'blackmesa' ), __( '% Comments', 'blackmesa' ), ( 'button comments alignright' ) ); ?>
				</div>
			</div>
		</div>
		
		<?php comments_template( '', true ); ?>
	
	<?php endwhile; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>