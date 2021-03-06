<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EnvestPro_Lite
 */

get_header(); ?>

	<div class="blog_detl_wrapper">
	  <div class="container ">
	    <div class="row">
	      <div class="blog_detl_left "> 
	        <div class="recent_news_area blogside">
		        <ul id="blogmasnory">
			      <?php
			      if ( have_posts() ) : 
			        /* Start the Loop */
			        while ( have_posts() ) : the_post();
			          /*
			           * Include the Post-Format-specific template for the content.
			           * If you want to override this in a child theme, then include a file
			           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			           */
			          get_template_part( 'template-parts/content_blog');
			        endwhile;

			      else :
			        get_template_part( 'template-parts/content', 'none' );
			      endif; ?>
		        </ul>
	        </div>
	        <!--recent_news_area end here-->
	        <div class="pagination_area">
	          <?php enves_pro_lite_pagination(); ?> 
	        </div>

	      </div>
	      <div class="side_bar_wrapper">
	        <div class="sidebar">
	          <?php get_sidebar(); ?>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

<?php get_footer();
