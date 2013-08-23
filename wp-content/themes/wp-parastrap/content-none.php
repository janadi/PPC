

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wpparastrap' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>
    <header class="page-header">
	   	<h1 class="page-title"><?php printf( __( 'No Results Found For: %s', 'wpparastrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'wpparastrap' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>
    <header class="page-header">
	    <h1 class="page-title"><?php _e( 'Nothing Found', 'wpparastrap' ); ?></h1>
    </header>
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wpparastrap' ); ?></p>
	<?php get_search_form(); ?>
	<div class="row">
	<div class="span9">
	    <h2 class="title"><?php _e( 'Or Maybe some of the links below will help find what you are looking for!', 'wpparastrap' ); ?></h2>
    </div>
	<div class="span3">
		<?php the_widget( 'WP_Widget_Recent_Posts', '', 'before_title=<h4>&after_title=</h4>' ); ?>
	</div>
						
	<div class="span3">
		<div class="widget">
			<h4 class="widgettitle"><?php _e( 'Most Used Categories', 'wpparastrap' ); ?></h4>
				<ul>
					<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
				</ul>
		</div><!-- .widget -->
	</div>
						
	<div class="span3">
		<?php
		/* translators: %1$s: smilie */
			$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'wpparastrap' ), convert_smilies( ':)' ) ) . '</p>';
			the_widget( 'WP_Widget_Archives', 'dropdown=1', "before_title=<h4>&after_title=</h4>$archive_content" );
		?>
	</div>
    </div>
	<?php endif; ?>
</div><!-- .page-content -->
