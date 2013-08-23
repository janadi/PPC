<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * Page template with a fixed 940px container and right sidebar layout
 *
 */

get_header(); ?>

	<!--start: Container -->
   	<div class="container">

	<div class="row">
	
	<div class="span9">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<!-- Begin the first article -->
		<article>
				
			<!-- Display the Title as a link to the Post's permalink. -->
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<div class="entry-meta">
		        <?php wpparastrap_entry_meta(); ?>
		        <?php edit_post_link( __( 'Edit', 'wpparastrap' ), '<span class="edit-link">', '</span>' ); ?>
	        </div><!-- .entry-meta -->
			
			<!-- Display the Post's Content in a div box. -->
			<div class="entry-content">
		        <div class="entry-thumbnail">
			        <?php if ( has_post_thumbnail() ) ?>
                <?php the_post_thumbnail('wpparastrap-page-static');?>
		        </div>

				<?php the_content(); ?>
				<div class="clear"></div>
			</div>
			<footer class="span8" style="margin-left: 0;">
				<?php wpparastrap_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpparastrap' ), 'after' => '</div>' ) ); ?>
	        </footer>
				<div class="clear"></div>
		<!-- Begin Comments -->
		<?php comments_template('/templates/comments.php'); ?>
	    <!-- End Comments -->
		
		<!-- Closes the first article -->
		<nav class="post-nav">
            <ul class="pager">
		        <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wpparastrap' ) . '</span> %title' ); ?></li>
		        <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wpparastrap' ) . '</span>' ); ?></li>
            </ul>
        </nav><!-- .nav-single -->
		</article>
		
	    
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, no posts matched your criteria.</div>
	
	<!--End the loop -->
	<?php endif; ?>
	</div>
    <div class="span3">
		<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-single' ); ?>
        <?php endif; // end sidebar widget area ?>
    <div class="clear"></div>
	            				
	</div>
	</div>
	<hr>

</div>
<!--end: Container-->
	

<?php get_footer(); ?>