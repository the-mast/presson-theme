<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Press_On
 */

get_header(); ?>
<script xmlns="http://www.w3.org/1999/html">
	window.onscroll = function() {scrollEvent()};
</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		if (get_option('po_home_categories_enabled')):
				$excludes = array(
						get_option('po_front_page_category'), 
						get_option('po_headline_article_category') 
					);
			else:
				$excludes = array();
			endif;

		if ( have_posts() ) :
			$count_posts = $wp_the_query->post_count;
			$POSTS_PER_PAGE = 10;
			?>
			
			<header>
				<div class="archive-header">
					<div id="banner">
						<?php single_cat_title('<h1>', '</h1>' ); ?>
					</div>					
				</div>
			</header><!-- .page-header -->
			<?php
					$args = array(
						'posts_per_page' => $POSTS_PER_PAGE,
						'category' => the_category_ID(false)
					);

				$postslist = get_posts($args);

				foreach( $postslist as $post ):
						setup_postdata($post);
						$categories = get_the_category();
						$sentence = preg_split( '/(\.|!|\?)\s/', strip_tags( get_the_content()), 2, PREG_SPLIT_DELIM_CAPTURE );
					if(!empty (get_the_post_thumbnail())):
            		?>
							<div class="related-story">
								<div class="related-story-title title">
									<?php	foreach ($categories as $cat): 
												if( !in_array($cat->term_id, $excludes)) :
													$category_link = get_category_link( $cat->term_id );
													echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
													echo ' ';
												endif;
											endforeach ?>
									<h3 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="related-story-excerpt">
										<?php	echo $sentence[0]; ?>
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
					else: ?>
					<div class="related-story">
						<div class="full-length-title title">
							<?php
								foreach ($categories as $cat): 
									if( !in_array($cat->term_id, $excludes)) :
									$category_link = get_category_link( $cat->term_id );
									echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
									echo ' ';
									endif;
								endforeach ?>
							<h3 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="related-story-excerpt">
								<?php	echo $sentence[0]; ?>
							</div>
						</div>
					</div>
				<?php endif;
				endforeach;
				if ($categories[0]->category_count > $POSTS_PER_PAGE){
                    $cur_cat = get_cat_ID(single_cat_title("", false));
                    $cur_category = get_category($cur_cat);
                    echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="'.$POSTS_PER_PAGE.'" 
				button_label="LOAD MORE" pause="true" offset="'.$POSTS_PER_PAGE.'" scroll="false"
				images_loaded="true" category="' . $cur_category->slug . '"]');
                }
				wp_reset_postdata;
			endif ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
