<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Mast
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			$args = array(
				'numberposts' => 1,
				'offset' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_status' => 'published'
			);

		   $latestpost = get_posts( $args );

			   if ($latestpost) { 
		   			foreach( $latestpost as $post ):
					setup_postdata('$post');
							if ( has_post_thumbnail() ) : ?>
							<div class="article">
							<header>
								<div class="image-container">
									<?php the_post_thumbnail(); ?>
									<div class="image-box">
										<div class="title-overlay">
											<?php
											if ( is_single() ) :
												the_title( '<h2 class="article-title">', '</h2>' );
											else :
												the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
											endif; ?>
										</div>
									</div>
											<?php
											else:
												if ( is_single() ) :
														the_title( '<h1>', '</h1>' );
													else :
														the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
													endif;
											endif;?>
								</div>
							</header>
							</div>
					<?php 
					endforeach;
				wp_reset_postdata;
			}

			
		   /**
			* List articles 
			*/

			get_template_part( 'template-parts/content-related');


			/* Start the Loop */
			// while ( have_posts() ) : the_post();

			// 	/*
			// 	 * Include the Post-Format-specific template for the content.
			// 	 * If you want to override this in a child theme, then include a file
			// 	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			// 	 */
			// 	get_template_part( 'template-parts/content', get_post_format() );

			// endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		<div class="advert-article">
			<div class="advert-content">
				ADVERTISEMENT
			</div>
		</div>

		<div class="social-media-following">
			<p>Stay updated, follow The Mast</p>
			<button>follow</button>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
