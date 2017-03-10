 
	<?php

		$POSTS_AMOUNT = 4;

		if (get_option('po_home_categories_enabled')):
								$excludes = array(
										get_option('po_front_page_category'), 
										get_option('po_headline_article_category') 
									);
							else:
								$excludes = array();
							endif;

		$my_post_category = get_the_category();
		$post_to_exclude = is_single() ? array($post->ID) : false;

		$args = array(
				'posts_per_page' => $POSTS_AMOUNT,
				'post__not_in' => $post_to_exclude);
		$postslist = get_posts($args);

		if ($postslist) { ?>
			<div id="article-related">
				<div id="related-header">
					<h2>LATEST STORIES</h2>
				</div>
			</div>
		
		<?php foreach( $postslist as $post ):
			setup_postdata('$post');
			$categories = get_the_category();
			?>
				<div class="related-story">
					<div class="related-story-title">
						<?php
							foreach ($categories as $cat): 
								if( !in_array($cat->term_id, $excludes)) :
							 	$category_link = get_category_link( $cat->term_id );
								echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
								echo ' ';
								endif;
							endforeach ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
					<div class="related-story-image">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					</div>
				</div>
			<?php 
			endforeach;
			wp_reset_postdata;
		}?>