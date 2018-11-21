<?php
/**
 * Envest Pro Theme Customizer
 *
 * @package EnvestPro_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function envestpro_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage'; 


 
	$wp_customize->add_section( 'v_copyright' , array(
	    'title'      => __( 'Footer Settings', 'envestpro-lite' ),
	    'priority'   => 90,
	) );
	$wp_customize->add_setting( 'v_copyright_text' , array(
	    'default'     => '',
	    'transport'   => 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'footer_bg_color', array(
		'default' => '#000',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) ); 

	$wp_customize->add_control( 'v_copyright_text', array(
	    'label' => __( 'Copyright Text', 'envestpro-lite' ),
		'section'	=> 'v_copyright',
		'setting'	=> 'v_copyright_text',
		'type'	 => 'text',
        'description'   => __( 'Write copyright text here.', 'envestpro-lite' )
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label' => __( 'Background Color', 'envestpro-lite' ),
		'section' => 'v_copyright',
		'settings' => 'footer_bg_color',
        'description'  => __( 'Pick a color for footer background.', 'envestpro-lite' ),   
	) ) );
}
add_action( 'customize_register', 'envestpro_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function envestpro_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function envestpro_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function envestpro_lite_customize_preview_js() {
	wp_enqueue_script( 'envestpro-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'envestpro_lite_customize_preview_js' );
