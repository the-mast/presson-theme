<?php
$post_category = get_the_category();
$category_link = get_category_link( $post_category[0]->term_id );
if ( !empty (get_the_post_thumbnail()) ) : ?>
<div class="image-container">
	<div class="image-box">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail');?></a>
		
		<div class="category-overlay">
            <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $post_category[0]->name ); ?></a>
        </div>

		<div class="title-overlay">
			<?php
				the_title( '<h3 class="next-article-category"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
	        ?>
		</div>
	</div>
</div>

<?php else: ?>

<div class="text-article-container">
	<div class="article-category">
        <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $post_category[0]->name ); ?></a>
    </div>
	<div class="entry-title">
		<?php
		if ( is_single() ) :
				the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</div>
	
</div>
<?php endif; ?>