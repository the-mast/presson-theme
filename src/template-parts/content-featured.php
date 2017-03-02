		<?php
		if ( !empty (get_the_post_thumbnail()) ) : ?>
		<div class="image-container">
			<?php the_post_thumbnail(); ?>
			<div class="image-box">
				<div class="title-overlay">
					<?php
					if ( is_single() ) :
						the_title( '<h3 class="article-title">', '</h3>' );
					else :
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					endif; ?>
				</div>
			</div>
		</div>
		<?php
		else : ?>
		<div class="text-article-container">
			<?php
			if ( is_single() ) :
					the_title( '<h1>', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>
		</div>

		<?php  endif;?>