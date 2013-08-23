<?php get_header(); ?>
				
<!--start: Container -->
    <div class="container">
    <!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<?php if ( get_theme_mod( 'wpparastrap_home_message_visibility' ) != 0 ) { ?>
            <?php if ( is_front_page() ) : ?>
			<div class="hero-unit">
				<h3><?php esc_html_e(get_theme_mod( 'wpparastrap_home_message' )); ?></h3>
        		<p><a href="<?php esc_html_e(get_theme_mod( 'wpparastrap_message_button_url' )); ?>" target="_blank" class="btn btn-primary btn-large">
				<?php esc_html_e(get_theme_mod( 'wpparastrap_message_button_text' )); ?></a></p>
      		</div>
			
			<?php endif; ?>
            <?php } ?>
			<!-- end: Hero Unit -->
      					
			<?php if ( is_active_sidebar( 'showcase-widgets' ) ) : ?>    
		        <?php get_sidebar( 'showcase' ); ?>
	        <div class="clear"></div>

	        <?php endif; ?>
	    <div class="row">
 
	    <div class="span9">
   		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
					
		<?php if ($wp_query->max_num_pages > 1) : ?>
          <nav id="post-nav">
            <ul class="pager">
              <?php if (get_next_posts_link()) : ?>
                <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'wpparastrap')); ?></li>
              <?php else: ?>
                <li class="previous disabled"><a><?php _e('&larr; Older posts', 'wpparastrap'); ?></a></li>
              <?php endif; ?>
              <?php if (get_previous_posts_link()) : ?>
                <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'wpparastrap')); ?></li>
              <?php else: ?>
                <li class="next disabled"><a><?php _e('Newer posts &rarr;', 'wpparastrap'); ?></a></li>
              <?php endif; ?>
            </ul>
          </nav>
        <?php endif; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div>
        <div class="span3">
		  <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-blog' ); ?>
            <?php endif; // end sidebar widget area ?>
            <div class="clear"></div>
	   	</div>
	</div>				
		<hr>
			
	</div>
<!--end: Container-->

	
<?php get_footer(); ?>