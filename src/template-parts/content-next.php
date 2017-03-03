<?php

if (!empty( $post )): ?>

<div class="article-section">
   
<!--
    <div class="next-article">
    </div>-->
   
<!--
    <?php
    if ( !empty (get_the_post_thumbnail()) ) : ?>
    <div class="next-image-container">
        <?php
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
    <?php endif; ?>-->



</div>
<?php endif; ?>