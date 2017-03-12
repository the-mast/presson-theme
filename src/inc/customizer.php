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

    $wp_customize->add_setting(
        'accent_color',
        array(
            'default' => '#E4DBCC'
        ));
    
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'accent_color',
        array(
            'label'      => __( 'Accent color', 'presson' ),
            'section'    => 'colors',
            'settings'   => 'accent_color'
        )
    ));

    $wp_customize->add_setting(
        'highlight',
        array(
            'default' => '#E34357'
    ));
    
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'highlight',
        array(
            'label'      => __( 'highlight color', 'presson' ),
            'section'    => 'colors',
            'settings'   => 'highlight'
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


function presson_customizer_css() {
    ?>
    <style type="text/css">
        #masthead { 
             background-color: <?php echo get_theme_mod( 'primary_color' ); ?>; 
        }
        a{
             color:<?php echo get_theme_mod( 'highlight' ); ?>;
        }
        a :hover{
             color:<?php echo get_theme_mod( 'secondary_color' ); ?>;
        }
        a :focus {
             color:<?php echo get_theme_mod( 'secondary_color' ); ?>;
        }
	    a:active {
             color:<?php echo get_theme_mod( 'secondary_color' ); ?>;
        }
        .related-story .related-story-title span {
            color: <?php echo get_theme_mod( 'highlight' ); ?>;
        }
        .article .category a, .article .image-container .category-overlay a, .article .text-article-container .article-category a, .featured-article .category a, .featured-article .image-container .category-overlay a, .featured-article .text-article-container .article-category a {
            color: <?php echo get_theme_mod( 'highlight' ); ?>;
        }
        .archive .archive-header h1 {
            color: <?php echo get_theme_mod( 'primary_color' ); ?>;
        }
        .archive .archive-header {
         border-color: <?php echo get_theme_mod( 'primary_color' ); ?>;
        }
        #mastfoot{
                background-color: <?php echo get_theme_mod( 'primary_color' ); ?>; 
        }
        .related-story {
            border-color: <?php echo get_theme_mod( 'accent_color' ); ?>; 
        }

    </style>
    <?php
}
add_action( 'wp_head', 'presson_customizer_css' );

