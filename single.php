<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EnvestPro_Lite
 */

get_header(); ?>

<!--blog_detail-wrapper start here-->
<div class="blog_detl_wrapper">
  <div class="container">
    <div class="row">
      <div class="blog_detl_left <?php echo (!has_post_thumbnail()) ? 'textleft' : ''; ?>"> 
    		<?php
    		while ( have_posts() ) : the_post();

    			get_template_part( 'template-parts/content_single' ); 

    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;

    		endwhile; // End of the loop.
    		?>
      </div>
      <div class="side_bar_wrapper">
        <div class="sidebar">
        	<?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--blog_detail-wrapper end here--> 

<?php get_footer();
