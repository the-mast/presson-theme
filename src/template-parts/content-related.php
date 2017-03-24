 
	<?php

		$RELATED_POSTS_AMOUNT = get_option('po_post_count_related');;

		if (get_option('po_home_categories_enabled')):
								$excludes = array(
										get_option('po_front_page_category'), 
										get_option('po_headline_article_category') 
									);
							else:
								$excludes = array();
							endif;

		$my_post_category = get_the_category();

		$my_post_categories = is_single() && !empty($my_post_category) ? wp_list_pluck($my_post_category, 'term_id') : false;
		$category_link = get_category_link( $my_post_category_id );

		$next_post = get_next_post();

		$exclude_posts = is_single() ? array(the_ID, $next_post->ID) : false;


		$args = array(
				'posts_per_page' => $RELATED_POSTS_AMOUNT,
				'post__not_in' => $exclude_posts,
				'category' => $my_post_categories);
		$postslist = get_posts($args);

		if ($postslist) { ?>
	  
			<div id="article-related">
				<div id="related-header">
					<p class="heading">RELATED STORIES</p>
					<p class="see-all"><a href="<?php echo $category_link ?>"> See all <span class="arrow"></span></a> </p> 
				</div>
			</div>
		
		
		<?php foreach( $postslist as $post ):
			setup_postdata('$post');
			$categories = get_the_category();

				if(!empty (get_the_post_thumbnail())):
				?>
					<div class="related-story">
						<div class="related-story-title title">
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
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>
				<?php endif;
			endforeach;
			wp_reset_postdata;
		}?>