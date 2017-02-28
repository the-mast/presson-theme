<?php
$next_post = get_next_post();
setup_postdata('$next_post');
if (!empty( $next_post )): ?>

<div id="article-section">
    <div id="next-article-header">
        <h2>READ NEXT</h2>
    </div>
    <div id="image-container-next">
        <?php 
            $post = $next_post;
            the_post_thumbnail();
         ?>
        <div id="image-box"> 
            <?php 
            if ( has_post_thumbnail() ) : ?>
            <div id="next-article-title-overlay">
                <h3>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                </h3>
		    </div> 
            <?php else: ?>
            <div class="no-thumbnail">
                <h3>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                </h3>
		    </div> 
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
