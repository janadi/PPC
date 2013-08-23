<?php
/**
 * The template for displaying all pages.
 *
 * Template Name - Default Page
 * Description: Page template with a content container and right sidebar
 *
 */

get_header(); ?>
	
	<!--start: Container -->
   	<div class="container">
	<div class="row">
	
	<div class="span9">		
  
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
	
				
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
				<!--<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpparastrap' ), 'after' => '</div>' ) ); ?>-->
				<?php wpparastrap_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpparastrap' ), 'after' => '</div>' ) ); ?>
			</div>
	
		<!-- Closes the first div -->
	<?php comments_template('/templates/comments.php'); ?>
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, the page you requested was not found</div>
	
	<!--End the loop -->
	<?php endif; ?>
    </div>
	<div class="span3">
    	<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
	    <?php dynamic_sidebar( 'page-sidebar' ); ?>
        <?php endif; // end sidebar widget area ?>
	<div class="clear"></div>
	</div>

    </div>
	<hr>

</div>
<!--end: Container-->
	

<?php get_footer(); ?>