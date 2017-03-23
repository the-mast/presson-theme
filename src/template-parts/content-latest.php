<?php
    $post_to_exclude = is_front_page() ? $excludelist : false;

    if (get_option('po_home_categories_enabled')):
        $excludes = array(
            get_option('po_front_page_category'),
            get_option('po_headline_article_category')
        );
    else:
        $excludes = array();
    endif;

    $my_post_category = get_the_category();

    $args = array(
        'posts_per_page' => $POSTS_AMOUNT,
        'post__not_in' => $excludelist,
        'orderby' => 'post_date',
        'order' => 'DESC');
    $postslist = get_posts($args);

    $url = get_site_url() . '/' . date('Y');

    if ($postslist) { ?>
        <div id="article-related">
            <div id="related-header">
                <p class="heading">LATEST STORIES</p>

                <p class="see-all"><a href="<?php echo $url ?>"> See all <span class="arrow"></span></a></p>
            </div>
        </div>

        <?php foreach ($postslist as $post):
            setup_postdata('$post');
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