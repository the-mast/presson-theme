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
function press_on_customize_register($wp_customize)
{
    $wp_customize->remove_control('header_textcolor');

    $wp_customize->add_section(
        'presson_logos',
        array(
            'title' => __('Logos', 'presson'),
            'priority' => 1
        )
    );

    $wp_customize->add_section(
        'presson_banner',
        array(
            'title' => __('Banner', 'presson'),
            'priority' => 3
        )
    );

    $wp_customize->add_setting(
        'presson_header_logo',
        array(
            'default' => get_stylesheet_directory_uri() . '/assets/images/logo_white.svg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_setting(
        'presson_footer_logo',
        array(
            'default' => get_stylesheet_directory_uri() . '/assets/images/logo_white.svg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_setting(
        'presson_social_media_logo',
        array(
            'default' => get_stylesheet_directory_uri() . '/assets/images/logo_colour.svg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'presson_header_logo',
            array(
                'settings' => 'presson_header_logo',
                'section' => 'presson_logos',
                'label' => __('Header logo', 'presson'),
                'description' => __('Select header logo', 'presson')
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'presson_footer_logo',
            array(
                'settings' => 'presson_footer_logo',
                'section' => 'presson_logos',
                'label' => __('Footer logo', 'presson'),
                'description' => __('Select footer logo', 'presson')
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'presson_social_media_logo',
            array(
                'settings' => 'presson_social_media_logo',
                'section' => 'presson_logos',
                'label' => __('Social media logo', 'presson'),
                'description' => __('Select media logo', 'presson')
            )
        )
    );

    $wp_customize->add_setting(
        'presson_banner_small',
        array(
            'default' => get_stylesheet_directory_uri() . '/assets/images/banner_small.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'presson_banner_small',
            array(
                'settings' => 'presson_banner_small',
                'section' => 'presson_banner',
                'label' => __('Banner', 'presson'),
                'description' => __('Select banner', 'presson')
            )
        )
    );

    $wp_customize->add_setting(
        'primary_color',
        array(
            'default' => '#500850'
        ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => __('Primary color', 'presson'),
                'section' => 'colors',
                'settings' => 'primary_color'
            )
        ));

    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default' => '#192755'
        ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label' => __('Secondary color', 'presson'),
                'section' => 'colors',
                'settings' => 'secondary_color'
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
                'label' => __('Accent color', 'presson'),
                'section' => 'colors',
                'settings' => 'accent_color'
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
                'label' => __('highlight color', 'presson'),
                'section' => 'colors',
                'settings' => 'highlight'
            )
        ));


}

add_action('customize_register', 'press_on_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function press_on_customize_preview_js()
{
    wp_enqueue_script('press_on_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'press_on_customize_preview_js');

/**
 * Generate a line of CSS for each theme_mod that exists
 */
function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
{
    $return = '';
    $mod = get_theme_mod($mod_name);
    if (!empty($mod)) {
        $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix . $mod . $postfix
        );
        if ($echo) {
            echo $return;
        }
    }
    return $return;
}

function presson_customizer_css()
{
    ?>
    <!--Customizer CSS-->
    <style type="text/css">
        <?php generate_css('#load-more, #mastfoot', 'background-color', 'primary_color'); ?>
        <?php generate_css('a', 'color', 'highlight'); ?>
        <?php generate_css('a :hover', 'color', 'secondary_color'); ?>
        <?php generate_css('a :focus', 'color', 'secondary_color'); ?>
        <?php generate_css('a :active', 'color', 'secondary_color'); ?>
        <?php generate_css('.related-story .related-story-title span', 'color', 'highlight'); ?>
        <?php generate_css('.related-story .full-length-title span', 'color', 'highlight'); ?>
        <?php generate_css('#mastbanner .banner-header h1', 'color', 'highlight'); ?>
        <?php generate_css('#mastbanner .banner-header h1, .social-media-following', 'border-color', 'primary_color'); ?>
        <?php generate_css('.related-story', 'border-color', 'accent_color'); ?>

        <?php if (get_theme_mod('presson_header_logo')): ?>
        #masthead #logo-header span {
            background: url(<?php echo get_theme_mod( 'presson_header_logo', get_stylesheet_directory_uri() . '/assets/images/logo_white.svg' );?>) no-repeat;
            background-size: contain;
            display: block;
            height: 50px;
            width: 150px;
        }
        <?php endif; ?>

        <?php if (get_theme_mod('presson_footer_logo')): ?>
        #mastfoot #logo-footer span {
            background: url(<?php echo get_theme_mod( 'presson_footer_logo', get_stylesheet_directory_uri() . '/assets/images/logo_white.svg' );?>) no-repeat;
            background-size: contain;
            display: block;
            height: 50px;
            margin: 0 auto;
            width: 150px;
        }
        <?php endif; ?>

        <?php if (get_theme_mod('presson_social_media_logo')): ?>
        .social-media-following .social-icon {
            background: url(<?php echo get_theme_mod( 'presson_social_media_logo', get_stylesheet_directory_uri() . '/assets/images/logo_colour.svg' );?>) no-repeat;
            background-size: contain;
            display: block;
            height: 42px;
            width: 150px;
        }
        <?php endif; ?>

        <?php if (get_theme_mod('highlight')): ?>
        .article .category a, .article .image-container .category-overlay a,
        .article .text-article-container .article-category a, .featured-article .category a,
        .featured-article .image-container .category-overlay a,
        .featured-article .text-article-container .article-category a,
        .search-results-story .related-story .related-story-title span, .search-excerpt,
        .search-results-story .results-story-title span,
        .related-story .related-story-title span, #related-header .see-all a {
            color: <?php echo get_theme_mod( 'highlight' ); ?>;
        }
        <?php endif; ?>

        <?php if (get_theme_mod('presson_banner_small')): ?>
        #mastbanner #banner {
            background: url(<?php echo get_theme_mod( 'presson_banner_small', get_stylesheet_directory_uri() . '/assets/images/banner_small.jpg' );?>) no-repeat;
            background-position: center center;
            background-size: cover;
            width: 100%;
            height: 100%;
        }
        <?php endif; ?>

        <?php if (get_theme_mod('primary_color')): ?>
        .button {
            background-color: <?php echo get_theme_mod( 'primary_color' ); ?> !important;
        }

        .next-article-header {
            border-top: 4px solid <?php echo get_theme_mod( 'primary_color' ); ?> !important;
            border-bottom: 4px solid <?php echo get_theme_mod( 'primary_color' ); ?> !important;
        }

        #related-header {
            border-top: 4px solid <?php echo get_theme_mod( 'primary_color' ); ?>;
            border-bottom: 4px solid <?php echo get_theme_mod( 'primary_color' ); ?>;
        }

        .opaque {
            background: <?php echo get_theme_mod( 'primary_color' ); ?> !important;
            opacity: 0.9;
            transition: all 500ms ease;
        }

        .slide {
            border-left: solid 5px <?php echo get_theme_mod( 'primary_color' ); ?>;
        }
        <?php endif; ?>
    </style>
    <!--/Customizer CSS-->
    <?php
}

add_action('wp_head', 'presson_customizer_css');

