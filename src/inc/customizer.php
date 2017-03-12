<?php
/**
 * Press On Theme Customizer
 *
 * @package Press_On
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function press_on_customize_register( $wp_customize ) {
	// $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    $wp_customize->remove_control('header_textcolor');

	$wp_customize->add_setting(
    'primary_color',
    array(
        'default'     => '#500850'
    ));

	$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label'      => __( 'Primary color', 'presson' ),
            'section'    => 'colors',
            'settings'   => 'primary_color'
        )
    ));

	$wp_customize->add_setting(
    'secondary_color',
    array(
        'default'     => '#192755'
    ));

	$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color',
        array(
            'label'      => __( 'Secondary color', 'presson' ),
            'section'    => 'colors',
            'settings'   => 'secondary_color'
        )
    ));


}
add_action( 'customize_register', 'press_on_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function press_on_customize_preview_js() {
	wp_enqueue_script( 'press_on_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'press_on_customize_preview_js' );
