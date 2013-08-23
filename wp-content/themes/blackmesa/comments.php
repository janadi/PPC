<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to blackmesa_comment which is
 * located in the functions.php file.
 *
 * 
 * @subpackage BlackMesa
 * @since BlackMesa 1.0
 */
?>

<div id="comments">

<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'blackmesa' ); ?></p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>
<?php $bm_cc = 0; // Var to alternate comment styles, used in custom wp_list_comments() in functions.php ?>
<?php if ( have_comments() ) : ?>
	<div class="highlight head">
		<h3 id="comments-title">
			<h3 id="comments-title">
				<?php comments_number( __('No responses to', 'blackmesa'), __('One response to', 'blackmesa'), __('% responses to', 'blackmesa'));?>
				<?php echo get_the_title(); ?>
			</h3>
		</h3>
	</div>



			<ol>
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use blackmesa_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define blackmesa_comment() and that will be used instead.
					 * See blackmesa_comment() in blackmesa/functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'blackmesa_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="pagination">
				<?php previous_comments_link( __( '<span class="buttonGlass1 alignleft">&larr; Older Comments</span>', 'blackmesa' ) ); ?>
				<?php next_comments_link( __( '<span class="buttonGlass2 alignright">Newer Comments &rarr;</span>', 'blackmesa' ) ); ?>
		<div class="clear"></div>		
	</div>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments: ?>
<?php	if ( comments_open() ) :
?>
	<div class="highlight head">
		<h3><?php _e( 'There are no comments yet.', 'blackmesa' ); ?></h3>
	</div>
<?php else : ?>
	<div class="highlight head">
		<h3><?php _e( 'Comments are closed.', 'blackmesa' ); ?></h3>
	</div>

<?php endif; // end comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!--#comments-->