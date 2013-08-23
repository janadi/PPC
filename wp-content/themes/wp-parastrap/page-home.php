<?php 
/**
 * Template Name: Custom Home Page Template
*/

get_header(); ?>
				
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
					
			<!-- start: Row -->
      		<div class="row">
	            
				<?php if ( get_theme_mod( 'wpparastrap_home_content_visibility' ) != 0 ) { ?>
					<div class="span12">
					    <?php get_template_part( 'content', 'custom' ); ?>
					</div>
				<?php } ?>
				
				
				<?php if ( get_theme_mod( 'wpparastrap_home_posts_visibility' ) != 1 ) { ?>
				<div class="span9">
									
					<div class="title">
					  <h3>
					    <?php if ( get_theme_mod( 'wpparastrap_post_section_title' )) :
                        esc_html_e(get_theme_mod( 'wpparastrap_post_section_title' )); 
                        else : echo 'Latest Posts'; 
                        endif; ?>
					  </h3>
					</div>
					
					<!-- start: Row -->
		      		<div class="row">
					   <?php get_template_part( 'content', 'home' ); ?>
					</div>
					<!-- end: Row -->

				</div>

        		<div class="span3">

					<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
	                <?php dynamic_sidebar( 'sidebar-home' ); ?>
                    <?php endif; // end sidebar widget area ?>
	                <div class="clear"></div>
	            				
        		</div>
                <?php } ?>
      		</div>
			<!-- end: Row -->
			
			<hr>
			
		</div>
		<!--end: Container-->
	
<?php get_footer(); ?>