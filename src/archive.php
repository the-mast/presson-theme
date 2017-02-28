<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Mast
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header>
				<div class="archive-header">
					<?php
						single_cat_title('<h1>', '</h1>' );
					?>
				</div>
			</header><!-- .page-header -->

			<?php
					$args = array(
						'posts_per_page' => 20,
						'category' => the_category_ID(false)
					);

				$postslist = get_posts($args);

				foreach( $postslist as $post ):
				setup_postdata('$post');
				$categories = get_the_category();
				?>
					<div id="related-storie">
						<div id="related-story-title">
							<?php
							foreach ($categories as $cat): 
							 	$category_link = get_category_link( $cat->term_id );
								echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
								echo ' ';
							endforeach ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<div id="related-story-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					</div>
				<?php 
				endforeach;
				wp_reset_postdata;
			
			endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
