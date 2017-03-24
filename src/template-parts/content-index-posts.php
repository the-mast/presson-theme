<?php
    $POSTS_AMOUNT = get_option('po_post_count_home_page');;

    if (get_option('po_home_categories_enabled')):
        $excludes = array(
            get_option('po_front_page_category'),
            get_option('po_headline_article_category')
        );
    else:
        $excludes = array();
    endif;

    $home_post_category_id = get_option('po_home_categories_enabled') ? get_option('po_front_page_category') : false;
    $posts_per_page = $POSTS_AMOUNT;
    $post_to_exclude = !empty($post) ? $post->ID : false;
    $excludelist = array($post_to_exclude);

    $args = array(
        'posts_per_page' => $posts_per_page,
        'post__not_in' => $excludelist,
        'category' => $home_post_category_id,
        'orderby' => 'post_date',
        'order' => 'DESC');

    $postslist = get_posts($args);

    if ($postslist) { ?>
        <?php foreach ($postslist as $post):
            setup_postdata('$post');
            array_push($excludelist, $post->ID);
            $categories = get_the_category();

            if(!empty (get_the_post_thumbnail())):
            ?>
            
            <div class="related-story">
                <div class="related-story-title title">
                    <?php
                    foreach ($categories as $cat):
                        if (!in_array($cat->term_id, $excludes)) :
                            $category_link = get_category_link($cat->term_id);
                            echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html($cat->name) . '</span> </a>';
                            echo ' ';
                        endif;
                    endforeach ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <div class="related-story-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
            </div>

        <p>
            <?php else: ?>
                    <div class="related-story">
                        <div class="full-length-title title">
                            <?php
                                foreach ($categories as $cat): 
                                    if( !in_array($cat->term_id, $excludes)) :
                                    $category_link = get_category_link( $cat->term_id );
                                    echo '<a href="' . esc_html($category_link) . '"><span>' . esc_html( $cat->name ) . '</span> </a>';
                                    echo ' ';
                                    endif;
                                endforeach ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    </div>
            <?php endif;
            endforeach;
            wp_reset_postdata;
            }
            ?>
        </p>
<div class="latest-stories">
    <?php
    if (get_option('po_home_categories_enabled')):
        include(locate_template('template-parts/content-latest.php'));
    endif;
    ?>
</div>