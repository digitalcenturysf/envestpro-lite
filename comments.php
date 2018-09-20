<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EnvestPro_Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
 
<div class="post_cmnt_bx">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<div class="bx_head">
			<h3> 
	           	<?php
	               	$comments_number = get_comments_number();
	               	if ( '1' === $comments_number ) {
	                       	/* translators: %s: post title */
	                       	printf( esc_attr_x( 'Post Comments ( 1 )', 'comments title', 'envestpro-lite' ), get_the_title() );
	               	}else {
	                   	printf(
	                       	/* translators: 1: number of comments, 2: post title */
	                       	esc_html(_nx(
	                           	'Post Comments ( %d )', 
								'Post Comments ( %d )', 
	                           	$comments_number,
	                           	'comments title',
	                           	'envestpro-lite'
	                       	)),
	                       	esc_html(number_format_i18n( $comments_number )),
	                       	get_the_title()
	                   	);
	               	}
	            ?> 
			</h3>
			<h5><?php esc_html_e( 'Interview With An Expert', 'envestpro-lite' ) ?> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/graph2.png" alt="<?php esc_attr_e('graph icon','envestpro-lite'); ?>"></h5>
		</div>
 
		<?php the_comments_navigation(); ?>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(  
					'style'   => 'ul',
					'callback' => 'envestpro_lite_comments_list' 
				) );
			?> 
		</ul>
		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'envestpro-lite' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments(). ?>
</div>
<div class="leave_cmnt_bx mt0">
	<?php comment_form(); ?>
</div>
 
