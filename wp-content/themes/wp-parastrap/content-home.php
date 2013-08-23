
<?php if (have_posts()) : ?>
          
		<?php $wpparastrap_home_query = new WP_Query(array(
		'category_name'  => get_theme_mod( 'wpparastrap_home_cat' ),
		'posts_per_page' => get_theme_mod( 'wpparastrap_home_number' )
		)); ?>
	
    	<?php while ($wpparastrap_home_query->have_posts()) : $wpparastrap_home_query->the_post(); ?>
		
		<div class="span3">
	      <?php if ( get_theme_mod( 'wpparastrap_custom_content_thumb_visibility' ) != 1 ) { ?>
		  <div class="home-thumbnail">
		    <a href="<?php the_permalink(); ?>">
			  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		       <div class="entry-thumbnail">
			    <?php the_post_thumbnail('wpparastrap-thumb-feature'); ?>
		       </div>
	          <?php endif; ?>
			<div class="image-overlay-link"></div>
		    </a>
	      </div>
		  <?php } ?>
	    <div class="item-description">
		   <div class="title"><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3></div>
		   <?php echo wpparastrap_home_excerpt(); ?>
	    </div>
        </div>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>