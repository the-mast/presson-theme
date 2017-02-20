	<?php

		$args = array(
				'posts_per_page' => 4, 
				'offset' => 1);
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
			?>
				<div id="related-storie">
					<div id="related-story-title">
						<span>Section</span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
					<div id="related-story-image">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
			<?php 
			endforeach;
			wp_reset_postdata;
		}?>