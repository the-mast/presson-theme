<?php
$next_post = get_next_post();
$next_post_category = get_the_category();
$category_link = get_category_link( $next_post_category[0]->term_id );
setup_postdata('$next_post');
if (!empty( $next_post )): ?>

<div class="article-section">
    <div class="next-article-header">
        <h2>READ NEXT</h2>
    </div>
    <?php
    if ( !empty (get_the_post_thumbnail()) ) : ?>
    <div class="next-image-container">
        <?php
            $post = $next_post;
            the_post_thumbnail();
         ?>
        <div class="next-image-box">
            <div class="next-article-category">
                <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $next_post_category[0]->name ); ?></a>
            </div>
            <div class="next-title-overlay">
                <h3 class="next-article-title">
                    <a href="<?php echo get_permalink( $next_post->class ); ?>"><?php echo get_the_title( $next_post->class ); ?></a>
                </h3>
            </div>
        </div>
    </div>

    <?php else: ?>
    <div class="next-article-box">
        <div class="no-thumbnail">
            <div class="next-article-category">
                <a href="<?php echo esc_html( $category_link ); ?>"><?php echo esc_html( $next_post_category[0]->name ); ?></a>
            </div>
            <h3>
                <a href="<?php echo get_permalink( $next_post->class ); ?>"><?php echo get_the_title( $next_post->class ); ?></a>
            </h3>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>