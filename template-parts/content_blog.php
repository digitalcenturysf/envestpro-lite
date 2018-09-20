<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EnvestPro_Lite
 */

?>
<li id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php 
	$envestpro_lite_blog_cls = 'no-img';
	if(has_post_thumbnail()):
		$envestpro_lite_blog_cls = '';
		$envestpro_lite_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'envestpro-lite-blog-thumb');
		$envestpro_lite_blog_img = $envestpro_lite_blog_image[0];
		?>
		<figure><img src="<?php echo esc_url($envestpro_lite_blog_img); ?>" alt="<?php the_title(); ?>"></figure> 
	<?php endif; ?>
	<div class="news_overlay <?php echo esc_attr($envestpro_lite_blog_cls); ?>">
	  <h6><i class="fa fa-calendar"></i> <?php comments_number( __('0 Comment','envestpro-lite'), __('1 Comment','envestpro-lite'), __('% Comments','envestpro-lite') ); ?>  - <i class="fa fa-eye"></i> <?php $envestpro_postviews =  envestpro_lite_getPostViews(get_the_ID()); echo esc_html($envestpro_postviews); ?>
        <?php   if ( is_sticky() ) { ?>
            <i class="dashicons dashicons-admin-post sticky-icon"></i> <?php esc_html_e( 'Sticky ', 'envestpro-lite' ); ?>
        <?php } ?> 
	  </h6>
	  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4> 
      	<p class="sortp"><?php $envestpro_content = wp_trim_words(get_the_content(),15,'...'); echo wp_kses_post($envestpro_content); ?></p> 
	</div>
</li> 