<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Mast
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-mast' ); ?></a>
	<div  id="masthead">
		<div id="logo-header">
			<a href="/" ><span > </span> </a>
      	</div>
      
		<div id="nav-header">
			<!--<nav id="site-navigation" class="main-navigation" role="navigation">
				<div id="nav-burger-menu" class="menu-toggle menu" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'the-mast' ); ?>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<?php wp_nav_menu( array(
//	'theme_location' => 'menu-1',
//	'menu_id' => 'primary-menu',
) ); ?>-->
			</nav><!-- #site-navigation -->
		</div>
	</div>

	<div id="content" class="site-content">
