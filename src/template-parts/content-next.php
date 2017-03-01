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
            the_post_thumbnail();
         ?>
        <div class="next-image-box">
            <?php
            if ( has_post_thumbnail() ) : ?>
            <div class="next-title-overlay">
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