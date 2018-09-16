<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EnvestPro_Lite
 */

get_header(); ?>

<!--recent_news_area start here-->
<div class="blog_wrapper mt70">
  <div class="recent_news_area">
    <div class="container"> 
		<section class="error-404 not-found">
			<span class="f0f">
				<?php esc_html_e( '404', 'envestpro-lite' ); ?>
			</span>
			<header class="page-header">
				<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'envestpro-lite' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content nfnd">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe you would try a search?', 'envestpro-lite' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section>
    </div>
  </div> 

<?php get_footer();
