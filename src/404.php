<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Press_On
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="not-found-header">
					<span></span>
					<p class="title">Sorry we couldn't find that link.</p>
					<p>Try one of the links below</p>
				</div>
				<div class="not-found-content">
					<?php
					get_template_part( 'template-parts/content-latest', 'none' );
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
