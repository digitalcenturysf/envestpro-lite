<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EnvestPro_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 
<div class="header_logo_area">
  <div class="container">
    <div class="row"> 
      <div class="logo_area"> 
        <?php envestpro_lite_Logo(); ?>
      </div> 
    </div>
  </div>
</div>

<!--header logo end here--> 

<!--navigation_area start here-->

<div class="navigation_area">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-inverse navbar-fixed-top" > 
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"><?php esc_html_e('Toggle navigation', 'envestpro-lite' ) ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php envestpro_lite_main_menu(); ?>   
          </div>
          <!-- /.navbar-collapse -->  
        <!-- /.container --> 
      </nav>
    </div>
  </div>
</div> 
<!--navigation_area end here--> 

<!--page-head_area start here--> 
<div class="page-head-area">
  <div class="container">
    <div class="row">
      <h6>&nbsp;</h6>
      <h1><?php envestpro_lite_breadcrumb(); ?></h1> 
      <div class="ctgry_bx">
        <h5> 
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'Home','envestpro-lite' ); ?></a>&nbsp; / &nbsp; 
            <?php envestpro_lite_breadcrumb(); ?>
        </h5>
      </div> 
    </div>
  </div>
</div>  
