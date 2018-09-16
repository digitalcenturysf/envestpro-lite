<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EnvestPro_Lite
 */

get_header(); ?>

<!--blog_detail-wrapper start here-->

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
                get_template_part( 'template-parts/content_blog' );
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
