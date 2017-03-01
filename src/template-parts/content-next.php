<?php
$next_post = get_next_post();
setup_postdata('$next_post');
if (!empty( $next_post )): ?>

<div class="article-section">
    <div class="next-article-header">
        <h2>READ NEXT</h2>
    </div>
    <div class="next-image-container">
        <?php
            $post = $next_post;
            $next_post_category = get_the_category();
            $category_link = get_category_link( $next_post_category[0]->term_id );
            the_post_thumbnail();
         ?>
        <div class="next-image-box">
            <?php
            if ( !empty (get_the_post_thumbnail()) ) : ?>
            <div class="next-title-overlay">
                <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $next_post_category[0]->name ); ?></a>
                <h3 class="next-article-titles">
                    <a href="<?php echo get_permalink( $next_post->class ); ?>"><?php echo get_the_title( $next_post->class ); ?></a>
                </h3>
            </div>
            <?php else: ?>
            <div class="no-thumbnail">
                <h3>
                    <a href="<?php echo get_permalink( $next_post->class ); ?>"><?php echo get_the_title( $next_post->class ); ?></a>
                </h3>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>