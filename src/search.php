<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Press_On
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
		<?php
		if ( have_posts() ) : ?>
			<div id="results-search-bar">
				<?php
					get_search_form( true );
				?>
			</div>
			<div class="results-header">
				<?php printf( esc_html__( '%s', 'press-on' ), '<strong>' . $wp_query->post_count . '</strong>' ); ?>
					<span>results for</sapn>
				<?php printf( esc_html__( '%s', 'press-on' ), '<em>' . get_search_query() .':</em>' ); ?>
			</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-search', 'search' );

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
