 
	<?php

		$RELATED_POSTS_AMOUNT = 4;
		$POSTS_AMOUNT = 10;

		$my_post_category = is_single() ? get_the_category() : false;
		$my_post_category_id = !empty($my_post_category) ? $my_post_category[0]->term_id : false;
		$posts_per_page = is_single() ? $RELATED_POSTS_AMOUNT : $POSTS_AMOUNT;
		$offset_count = is_single() ? 0 : 1;
		$post_to_exclude = is_single() ? array($post->ID) : false;

		$args = array(
				'posts_per_page' => $posts_per_page,
				'offset' => $offset_count, 
				'post__not_in' => $post_to_exclude,
				'category' => $my_post_category_id);
		$postslist = get_posts($args);

		if ($postslist) { ?>
	  <?php	if ( is_single() ) : ?>
			<div id="article-related">
				<div id="related-header">
					<h2>LATEST STORIES</h2>
				</div>
			</div>
		<?php endif; ?>
		
		<?php foreach( $postslist as $post ):
			setup_postdata('$post');
			$categories = get_the_category();
			?>
				<div class="related-story">
					<div class="related-story-title">
						<?php
							foreach ($categories as $cat): 
							 	$category_link = get_category_link( $cat->term_id );
								echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
								echo ' ';
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