<?php
    $post = get_next_post();
    if (!empty( $post )): ?>
    <div class="next-article-header">
        <p>READ NEXT</p>
    </div>
    <?php
        $post_category = get_the_category();
        $category_link = get_category_link( $post_category[0]->term_id );
        $next_post_category = get_the_category();
        $category_link = get_category_link( $next_post_category[0]->term_id );
        get_template_part( 'template-parts/content-article-head', 'none' );
    ?>
<?php endif; ?>
