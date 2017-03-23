<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Press_On
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			echo ('<div class="article">');
				echo ('<section class="read-next-article">');
					get_template_part( 'template-parts/content-next', 'none' );
		  		echo ('</section>');
			echo ('</div>');

			echo ('<section class="related-stuff">');
				get_template_part( 'template-parts/content-related');		
			echo ('</section>');

			get_template_part( 'template-parts/content-social-media-following', 'none' );

		endwhile; // End of the loop.
		?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
