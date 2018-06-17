<?php

/**
 *  TODO:what is this file for? It has content-archives.php link but it may be doubled with template Archives
 *  The template for displaying archive pages. ???
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

                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header><!-- .page-header -->
            <?php
            if (!have_posts()) :
                get_template_part('template-parts/content', 'none');
            ?>
            <?php endif; ?>

            <section id="index-content-container" class="index-content__container">

                <?php

                if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'archives');

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
        <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
