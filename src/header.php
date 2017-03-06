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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo esc_attr( get_option('po_google_analytics_id') ); ?>', 'auto');
  ga('send', 'pageview');

</script>

<div id="fb-root"></div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'press-on' ); ?></a>
	<div  id="masthead">
		<div id="logo-header">
			<a href="/" ><span > </span> </a>
      	</div>
      
		<div id="nav-header">
			<nav>
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

	<div id="content" class="site-content">
