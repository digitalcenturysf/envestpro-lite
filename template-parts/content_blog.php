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
	$envest_pro_lite_blog_cls = 'no-img';
	if(has_post_thumbnail()):
		$envest_pro_lite_blog_cls = '';
		$envest_pro_lite_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'envestpro-lite-blog-thumb');
		 $envest_pro_lite_blog_img = $envest_pro_lite_blog_image[0];
		 ?>
		<figure><img src="<?php echo esc_url($envest_pro_lite_blog_img); ?>" alt="<?php the_title(); ?>"></figure> 
	<?php endif; ?>
	<div class="news_overlay <?php echo esc_attr($envest_pro_lite_blog_cls); ?>">
	  <h6><i class="fa fa-calendar"></i> <?php comments_number( __('0 Comment','envestpro-lite'), __('1 Comment','envestpro-lite'), __('% Comments','envestpro-lite') ); ?>  - <i class="fa fa-eye"></i> <?php $envest_pro_postviews =  envest_pro_lite_getPostViews(get_the_ID()); echo esc_html($envest_pro_postviews); ?>
        <?php   if ( is_sticky() ) { ?>
            <i class="dashicons dashicons-admin-post sticky-icon"></i> <?php esc_html_e( 'Sticky ', 'envestpro-lite' ); ?>
        <?php } ?> 
	  </h6>
	  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4> 
      	<p class="sortp"><?php $envest_pro_content = wp_trim_words(get_the_content(),15,'...'); echo wp_kses_post($envest_pro_content); ?></p> 
	</div>
</li> 