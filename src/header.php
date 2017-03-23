<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Press_On
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php if ( empty (get_the_post_thumbnail()) ) : ?>
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/mast_logo.jpg" />
<?php endif; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'press-on' ); ?></a>
	<div  id="masthead">
		<div id="logo-header">
			<a href="/" ><span > </span> </a>
      	</div>
      	
		<div id="nav-header">
			<nav>
				<div id="nav-search">
					<span></span>
				</div>
				<div id="nav-burger-menu" ><?php esc_html_e( '', 'press-on' ); ?>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div id="nav-menu-list" class="resting">
					<ul>
						<?php 
							if (get_option('po_home_categories_enabled')):
								$args = array(
									'exclude' => array( 
										get_option('po_front_page_category'), 
										get_option('po_headline_article_category') )
									);
							else:
								$args = array();
							endif;
							$categories = get_categories($args);
							foreach ($categories as $cat): 
								$category_link = get_category_link( $cat->term_id );
								echo '<li><a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a> </li>';
							endforeach 
						?>
					</ul>
				</div>
				
			</nav><!-- #site-navigation -->
		</div>
	</div>
	<div id="search-bar" class="search-close">
		<?php
			get_search_form( true );
		?>
	</div>
	<div id="content" class="site-content">
