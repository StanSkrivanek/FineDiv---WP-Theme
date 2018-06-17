<?php

/**
 *  Template Name: Archives
 *  Displaying ARTICLES archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <header class="category-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                ?>
               <div class="archive-description">
               <p>Lorem Archivus descripsum dolor situs headurs amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                   exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
               </p>
               </div>
            </header><!-- .page-header -->
            <section id="articles-content-container" class="articles-content_container">
                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                $args = array(
                    'posts_per_page' => 20,
                    'paged' => $paged,
                );
                $articles = new WP_Query($args);

                if ($articles->have_posts()) :
                    while ($articles->have_posts()) : $articles->the_post();
                get_template_part('template-parts/content', 'archives');
                endwhile; ?>

                    <?php wp_reset_postdata();
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
            </section> <!-- #main-content-container -->

            <section class="articles__nav">
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total' => $articles->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
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

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
