<?php
// =============================== Tashan Recent Posts widget ======================================
class Tashan_RecentPostWidget extends WP_Widget {
    /** constructor */

	function Tashan_RecentPostWidget() {
		$widget_ops = array(
		  'classname' => 'widget_tashan_recent_posts', 
		  'description' => __('Tashan - Recent Posts','tashan') );
		$this->WP_Widget(
		  'tashan-recent-posts', __('Tashan - Recent Posts','tashan'), $widget_ops);
	}


  /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Tashan Recent Posts','tashan') : $instance['title']);
		$category = apply_filters('widget_category', $instance['category']);
		$showpost = apply_filters('widget_showpost', $instance['showpost']);
		$disabledate = apply_filters('widget_disabledate', isset($instance['disabledate']));
		$disableexcerpt = apply_filters('widget_disabledate', isset($instance['disableexcerpt']));
		$disablethumb = apply_filters('widget_disablethumb', isset($instance['disablethumb']));
		$instance['category'] = esc_attr(isset($instance['category'])? $instance['category'] : "");
		global $wp_query;
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                        
								<?php  if (have_posts()) : ?>
                                
                                <ul class="tashan-recent-post-widget">
									<?php $querycat = get_cat_name($category);?>
                                    <?php 
                                        if($showpost==""){$showpost=3;}
										$temp = $wp_query;
										$wp_query= null;
										$wp_query = new WP_Query();
										$wp_query->query("showposts=".$showpost."&category_name=" . $querycat);
										global $post;
                                    ?>
                                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                    <li>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										
										
										<?php if($disablethumb!="true") {?>
                                        <?php
                                        $custom = get_post_custom($post->ID);
                                        $cf_thumb = (isset($custom["tashan_thumb"][0]))? $custom["tashan_thumb"][0] : "";
                                        
                                        if($cf_thumb!=""){
                                            $thumb = '<img src='. $cf_thumb .' alt="" width="77" height="77" class="frame"/>';
                                        }elseif(has_post_thumbnail($post->ID) ){
                                            $thumb = get_the_post_thumbnail($post->ID, 'thumb-widget', array('class' => 'frame'));
                                        }else{
                                            $thumb ="";
                                        }
                                        echo  $thumb;
                                        ?>
                                        <?php } ?>
                                        <?php if($disabledate!="true") {?>
                                        <span class="smalldate"><?php  the_time('M d, Y') ?></span>
										<?php } ?>
										<?php if($disableexcerpt!="true") {?>
										<p><?php echo tashan_recentpost_excerpt(); ?></p>
										<?php } ?>
										<span class="clear"></span>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                
                                <?php $wp_query = null; $wp_query = $temp; wp_reset_query();?>
                                
								<?php endif; ?>

								
								
              <?php echo $after_widget; ?>
			 
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		$instance['title'] = (isset($instance['title']))? $instance['title'] : "";
		$instance['category'] = (isset($instance['category']))? $instance['category'] : "";
		$instance['showpost'] = (isset($instance['showpost']))? $instance['showpost'] : "";
		$instance['disabledate'] = (isset($instance['disabledate']))? $instance['disabledate'] : "";
		$instance['disableexcerpt'] = (isset($instance['disableexcerpt']))? $instance['disableexcerpt'] : "";
		$instance['disablethumb'] = (isset($instance['disablethumb']))? $instance['disablethumb'] : "";
					
        $title = esc_attr($instance['title']);
		$category = esc_attr($instance['category']);
		$showpost = esc_attr($instance['showpost']);
		$disabledate = esc_attr($instance['disabledate']);
		$disableexcerpt = esc_attr($instance['disableexcerpt']);
		$disablethumb = esc_attr($instance['disablethumb']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tashan'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
            <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'tashan'); ?><br />
			<?php 
			$args = array(
			'selected'         => $category,
			'echo'             => 1,
			'name'             =>$this->get_field_name('category')
			);
			wp_dropdown_categories( $args );
			?>
			</label></p>
			
            <p><label for="<?php echo $this->get_field_id('showpost'); ?>"><?php _e('Number of Post:', 'tashan'); ?> <input class="widefat" id="<?php echo $this->get_field_id('showpost'); ?>" name="<?php echo $this->get_field_name('showpost'); ?>" type="text" value="<?php echo $showpost; ?>" /></label></p>
            
            
            <p><label for="<?php echo $this->get_field_id('disablethumb'); ?>"><?php _e('Disable Thumb:', 'tashan'); ?> 
			
			<?php if($instance['disablethumb']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disablethumb'); ?>" id="<?php echo $this->get_field_id('disablethumb'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
                            
            <p><label for="<?php echo $this->get_field_id('disabledate'); ?>"><?php _e('Disable Date:', 'tashan'); ?> 
			
			<?php if($instance['disabledate']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disabledate'); ?>" id="<?php echo $this->get_field_id('disabledate'); ?>" value="true" <?php echo $checked; ?> />			</label></p>              
            
			<p><label for="<?php echo $this->get_field_id('disableexcerpt'); ?>"><?php _e('Disable Excerpt:', 'tashan'); ?>
			
			<?php if($instance['disableexcerpt']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disableexcerpt'); ?>" id="<?php echo $this->get_field_id('disableexcerpt'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
		<?php 
    }

} // class  Widget
?>