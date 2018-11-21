<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EnvestPro_Lite
 */

?>
	<?php 
	$envestpro_lite_blog_cls = 'no-img';
	if(has_post_thumbnail()):
		$envestpro_lite_blog_cls = '';
		$envestpro_lite_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'envestpro-lite-blog-single');
		 $envestpro_lite_blog_img = $envestpro_lite_blog_image[0];
		 ?>
		<img src="<?php echo esc_url($envestpro_lite_blog_img); ?>" alt="<?php the_title(); ?>">
	<?php endif; ?> 
    <div class="share_bx <?php echo esc_attr($envestpro_lite_blog_cls); ?>">
      <div class="share_bx_up">
        <h5><?php esc_html_e('Posted by','envestpro-lite'); ?> <span class="blue"><?php the_author(); ?></span></h5>
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="share_bx_down">
        <h6><?php envestpro_lite_posted_on(); ?> <span>|</span> <?php comments_popup_link( __('0 Comment','envestpro-lite'), __('1 Comment','envestpro-lite'), __('% Comments','envestpro-lite'), 'comments-link', __('Comments are off','envestpro-lite')); ?></h6>
      </div>
    </div>
	<?php the_content();  

        wp_link_pages( array(
            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'envestpro-lite' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) ); 
 
	$menia_author = get_the_author_meta('description');
	if($menia_author): ?> 
		<div class="author_about_bx">
			<div class="author_about_img"> 
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?> 
				</div>
			<div class="author_about_txt">
				<h2><?php the_author(); ?></h2> 
				<p><?php the_author_meta('description'); ?></p>
			</div>
		</div>
	<?php endif; ?>