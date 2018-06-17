<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section id="index-content-container" class="index-content__container">
                <?php wp_reset_postdata(); ?>
                <?php
                // Ignore Sticky posts (shoe them in thei normal position)
                $args = array(
                    // TODO: Make loop independent on basic WP per page setup
                    // 'posts_per_page' => 12,
                    'ignore_sticky_posts' => 1
                );
                $articles = new WP_Query($args);

                if ($articles->have_posts()) :
                /* Start the Loop */
                        while ($articles->have_posts()) : $articles->the_post();
                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                        get_template_part('template-parts/content', 'search');
                        endwhile; ?>
            </section> <!-- #main-content-container -->
            <section class="articles__nav">
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'show_all' => false,
                        'type' => 'plain',
                        'end_size' => 2,
                        'mid_size' => 1,
                        'prev_next' => true,
                        'prev_text' => sprintf('<i> </i> %1$s', __('<', 'text-domain')),
                        'next_text' => sprintf('%1$s <i></i>', __('>', 'text-domain')),
                        'add_args' => false,
                        'add_fragment' => '',
                    ));
                    ?>
                </div>
            </section>
            <?php
            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>
            <?php // wp_reset_postdata(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
