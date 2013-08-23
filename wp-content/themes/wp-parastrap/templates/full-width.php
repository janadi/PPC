<?php 
/**
 * Template Name: Full-width Page Template, No Sidebar
*/

get_header(); ?>
<div class="container">
		
		<hr>
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
	
				
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
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
<!-- end container -->


<?php get_footer(); ?>