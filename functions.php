<?php
/**
 * Envest Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EnvestPro_Lite
 */

if ( ! function_exists( 'envestpro_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function envestpro_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Envest Pro, use a find and replace
		 * to change 'envestpro-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'envestpro-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
 
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// image size.	
		add_image_size( 'envestpro-lite-blog-featured', 380, 220, true );
		add_image_size( 'envestpro-lite-blog-thumb', 370, 260, true ); 
		add_image_size( 'envestpro-lite-blog-single', 870, 530, true ); 
		add_image_size( 'envestpro-lite-avatar', 165, 180, true );
 
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Menu', 'envestpro-lite' ), 
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Custom Logo
		 */ 
	  	add_theme_support( 'custom-logo', array(
		   'height'      => 39,
		   'width'       => 139,
		   'flex-width'  => true,
	       'flex-height' => true,
	       'header-text' => array( 'logolink' ), 
		) );

		add_theme_support( 'custom-header', array(
			'flex-width'    => true, 
			'flex-height'    => true, 
			'default-image' => get_template_directory_uri() . '/images/heading-image.jpg',
		) ); 

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
 
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', envestpro_lite_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'envestpro_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function envestpro_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'envestpro_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'envestpro_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function envestpro_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'envestpro-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'envestpro-lite' ),
		'before_widget' => '<div id="%1$s" class="sidebar_bx %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar_head"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'envestpro_lite_widgets_init' );

/**
 * Register fonts. 
 */
function envestpro_lite_fonts_url() { 

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'envestpro-lite' ) ) {
		$fonts[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'envestpro-lite' ) ) {
		$fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Arimo font: on or off', 'envestpro-lite' ) ) {
		$fonts[] = 'Arimo:400,400i,700,700i';
	}
 
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw($fonts_url);
} 

/**
 * Enqueue scripts and styles.
 */
function envestpro_lite_scripts() {
 
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'envestpro-lite-fonts', envestpro_lite_fonts_url(), array(), null );

	// CSS.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'envestpro-lite-main-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'envestpro-lite-responsive', get_template_directory_uri() . '/css/responsive.css' ); 
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' ); 
	wp_enqueue_style( 'envestpro-lite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery','masonry'), '20151215', true );      
	wp_enqueue_script( 'envestpro-lite-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );
	wp_enqueue_script( 'envestpro-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true ); 
	wp_enqueue_script( 'envestpro-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'envestpro_lite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/envestpro-lite-func.php';

/**
 * Walker Menu.
 */
require get_template_directory() . '/inc/walker-menu.php';
 
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
 
/**
 * Custom css function.
 */
function envestpro_lite_add_css() {
	global $post; 
	if(is_page()){  
		$envestpro_lite_hdr_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );
        $envestpro_lite_hdr_img = $envestpro_lite_hdr_img[0];
        if(empty($envestpro_lite_hdr_img)){
        	$envestpro_lite_hdr_img = get_header_image();
        }
	}else{ 
		$envestpro_lite_hdr_img = get_header_image();
	}
   $logo = get_theme_mod( 'custom_logo' );
   $image = wp_get_attachment_image_src( $logo , 'full' ); 
 
    $hdrtxt = get_theme_mod( 'header_textcolor' ); 
    $footer_bg_clr = get_theme_mod( 'footer_bg_color' );
    echo '<style type="text/css"> 
			.page-head-area{
			    background: url('.esc_url($envestpro_lite_hdr_img).') center no-repeat;  
			} 
			.cpright_area{ 
				background: '.esc_attr(sanitize_hex_color($footer_bg_clr)).';
			}  
			.page-head-area h1{ 
				color: #'.esc_attr($hdrtxt).';
			}
    </style>';
}
add_action( 'wp_head', 'envestpro_lite_add_css' );

/**
 * Categories & archive post count html append.
 *
 * @param string $variable the comment count.
 */ 
function envestpro_lite_categories_archive_postcount_filter ($variable) {
	$variable = str_replace('(', '<span class="post-number">', $variable);
 	$variable = str_replace(')', '</span>', $variable);
    return $variable;
}
add_filter('wp_list_categories','envestpro_lite_categories_archive_postcount_filter');
add_filter('get_archives_link','envestpro_lite_categories_archive_postcount_filter');

/**
 * Remove menu ID.
 *
 * @param string $var the menu id.
 */  
function envestpro_lite_attributes_filter($var) {
  return is_array($var) ? array() : '';
}
add_filter('nav_menu_item_id', 'envestpro_lite_attributes_filter', 100, 1);
add_filter('page_css_class', 'envestpro_lite_attributes_filter', 100, 1);

/**
 * Remove menu classes.
 *
 * @param string $var the menu classs.
 */  
function envestpro_lite_attributes_filter_class($var) {
  return is_array($var) ? array() : '';
}
add_filter('nav_menu_css_class', 'envestpro_lite_attributes_filter_class', 100, 1);  
