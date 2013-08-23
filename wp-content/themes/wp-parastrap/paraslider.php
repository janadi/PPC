<!-- start: Slider -->
	<div class="slider-wrapper">

	<div id="da-slider" class="da-slider">
	<?php $firstClass = 'da-slide-current'; ?>
	<?php if (have_posts()) : ?>
          
		<?php $wpparastrap_query = new WP_Query(array(
		'category_name'  => get_theme_mod( 'wpparastrap_slide_cat' ),
		'posts_per_page' => get_theme_mod( 'wpparastrap_slide_number' )
		)); ?>
	
    	<?php while ($wpparastrap_query->have_posts()) : $wpparastrap_query->the_post(); ?>
        
	
    <div class="da-slide da-slide-fromright <?php echo $firstClass; ?>">
	<?php $firstClass = "da-slide-toleft"; ?>
		<h2><a href="<?php the_permalink() ?>">
            <?php 
			    $thetitle = $post->post_title;
                $getlength = strlen($thetitle);
                $thelength = 25;
                echo substr($thetitle, 0, $thelength);
                if ($getlength > $thelength) echo "...";
            ?>
            </a></h2>
		<p><?php echo wpparastrap_slider_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>" class="da-link">Read more</a>
		<div class="da-img">
			<?php the_post_thumbnail('wpparastrap-slider'); ?>
		</div>
	</div>
	
	<?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
			
    <nav class="da-arrows">
		<span class="da-arrows-prev left carousel-control">&lsaquo;</span>
		<span class="da-arrows-next right carousel-control">&rsaquo;</span>
	</nav>
	
	</div>
</div>
<!-- end: Slider -->