<?php 
/*
* Used on the home page in conjunction with the Custom Home Template -->
*/
?>
 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( get_theme_mod( 'wpparastrap_custom_content_title_visibility' ) != 0 ) { ?>
			<h2>
				<?php the_title(); ?>
			</h2>
			<?php } ?>
			<!-- Display the Page's Content in a div box. -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

	<?php endwhile; ?>

	<?php endif; ?>
<hr>