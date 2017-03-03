<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Press_On
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
						'posts_per_page' => 10,
						'category' => the_category_ID(false)
					);

				$postslist = get_posts($args);

				foreach( $postslist as $post ):
				setup_postdata($post);
				$categories = get_the_category();
				?>
					<div class="related-story">
						<div class="related-story-title">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="related-story-excerpt"><?php
								$sentence = preg_split( '/(\.|!|\?)\s/', strip_tags( get_the_content()), 2, PREG_SPLIT_DELIM_CAPTURE );
								echo $sentence[0]; ?>
							</div>
						</div>
						<div class="related-story-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
						<div class="related-story-date">
							<?php the_time('jS F Y') ?>
						</div>
					</div>
				<?php 
				endforeach;
				$cur_cat = get_cat_ID(single_cat_title("",false) );
				$cur_category = get_category($cur_cat);
				echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="10" 
				button_label="LOAD MORE" pause="true" offset="5" scroll="false"
				images_loaded="true" category="'.$cur_category->slug.'"]');
				wp_reset_postdata;
			endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
