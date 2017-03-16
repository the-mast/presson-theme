<?php
/**
 * Press On functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Press_On
 */

if ( ! function_exists( 'press_on_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function press_on_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Press On, use a find and replace
		 * to change 'press-on' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'press-on', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'press-on' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'press_on_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'press_on_setup' );

/**
* Include the Options page for the Theme
* TODO: add appropriate options to deployment/config management scripts
**/
include get_template_directory() . '/options.php';

//Remove "Remember Me" Checkbox from WordPress Login Page
add_action('login_head', 'remove_remember_me');
function remove_remember_me()
{
	echo '<style type="text/css">.forgetmenot { display:none; }</style>' . "\n";
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function press_on_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'press_on_content_width', 640 );
}
add_action( 'after_setup_theme', 'press_on_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function press_on_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'press-on' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'press-on' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'press_on_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function press_on_scripts() {
	wp_enqueue_style( 'press-on-style', get_stylesheet_uri() );

	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');

    wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', [], false, true);
	wp_enqueue_script( 'twitter-widgets', '//platform.twitter.com/widgets.js', ['jquery'], false, true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', ['jquery'], false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'press_on_scripts' );

/**
* Set query vars
**/
function add_query_vars_filter( $vars ){
  $vars[] = "comments";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


/**
* Set the image sizes for srcset
**/
function adjust_image_sizes_attr( $sizes, $size ) {
   $sizes = '(max-width: 640px) 300px, (max-width: 800px) 768px, 1024px';
   return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'adjust_image_sizes_attr', 10 , 2 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Advertising
*/

function render_banner_advertisment() {
	$advert = 
	'<div align="center" class="advert-banner">'
	 . get_option('po_banner_ads') .
	 '<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
	 </div>';

	echo $advert;
}


//Insert Adsense code in the middle of Single Post content
add_filter( 'the_content', 'crunchify_ads' );
function crunchify_ads( $content ) {
 
	 // Ad code which we are using on Single post
     $single_post_ads = 
	 '<div align="center" style="margin-bottom:10px;"> '
	 . get_option('po_middle_content_ads') .
	 '<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
	 </div>';
 
    if ( is_single() && ! is_admin()) {
        return crunchify_insert_ads( $single_post_ads, get_option('po_middle_content_ads_paragraph_count'), $content );
    }

    return $content;
}

// This function identifies after which paragraph we need to insert ads
function crunchify_insert_ads( $ads, $after_which_paragraph, $content ) {
    $identify_paragraph = '</p>';
    $crunchifyData = explode( $identify_paragraph, $content );
    foreach ($crunchifyData as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $crunchifyData[$index] .= $identify_paragraph;
        }
        if ( $after_which_paragraph == $index + 1 ) {
            $crunchifyData[$index] .= $ads;
        }
    }
    return implode( '', $crunchifyData );
}
