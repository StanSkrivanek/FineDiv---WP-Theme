<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

                <?php
                while (have_posts()) : the_post();
                get_template_part('template-parts/content-single', get_post_format()); ?>

                <?php
                endwhile; // End of the loop.
                ?>

            <section class="comments">
                <?php
                //
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </section><!-- .comments -->

<!-- RELATED POST -->
            <section class="related-posts">

                    <div class="related-posts-by-tag-container"> <!-- related-posts-by-tag__section -->
                        <div class="related-main-header">
                            <h3>Related posts</h3>
                        </div>
                        <div id="related-posts-by-tags" class="related-posts-by-tags__container">
                            <?php
                            $orig_post = $post;

                            $tags = wp_get_post_tags($orig_post->ID);
                            // var_dump($tags);
                            if (!$tags) {
                                $tag_ids = "";
                            }else{
                                $tag_ids = array();
                                foreach ($tags as $individual_tag) {
                                    $tag_ids[] = $individual_tag->term_id;
                                }
                            }
                            $args = array(
                                'ignore_sticky_posts' => true,
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($orig_post->ID),
                                'posts_per_page' => 4 // Number of related posts to display.
                            );

                            $related_posts_by_tags = new wp_query($args);

                            while ($related_posts_by_tags->have_posts()) {
                                $related_posts_by_tags->the_post();
                                ?>

                            <div class="related-post__wrap"> <!--  related-post__wrap -->
                                <div class="related-post__link">
                                    <a rel="external" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="related-post__category">
                                    <ul>
                                        <?php FineDiv_category_no_count(array(
                                            'orderby' => 'alphabet',
                                            'order' => 'ASC',
                                            'title_li' => '',
                                            // 'number' => 10,
                                        )); ?>
                                    </ul>
                                </div>
                            </div><!-- .related-post__data -->
                            <?php

                        } ?>
                        </div>

                        <?
                        $post = $orig_post;
                        wp_reset_postdata();

                        ?>
                    </div>
                </div> <!-- END Related posts -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
