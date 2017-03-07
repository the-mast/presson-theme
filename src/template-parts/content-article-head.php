<?php
$post_category = get_the_category();

if (get_option('po_home_categories_enabled')):
	$excludes = array( get_option('po_front_page_category'), 
					   get_option('po_headline_article_category') );

	foreach ($post_category as $key=>$cat):
		if (in_array($cat->term_id, $excludes)) {
			unset($post_category[$key]);
		}
	endforeach;
	//Reset array indexes after removing values
	$post_category = array_values($post_category);
endif;

$category_link = get_category_link( $post_category[0]->term_id );
if ( !empty (get_the_post_thumbnail()) ) : ?>
<div class="image-container">
	<div class="image-box">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
		
		<div class="category-overlay">
            <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $post_category[0]->name ); ?></a>
        </div>

		<div class="title-overlay">
			<?php
				if ( is_single() ):
					the_title( '<h3 class="article-title">', '</h3>' );
				else:
					the_title( '<h3 class="next-article-category"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				endif;
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
				the_title( '<h1>', '</h1>' );
		else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</div>
	
</div>
<?php endif; ?>