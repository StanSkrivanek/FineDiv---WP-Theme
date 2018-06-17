<?php

/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package FineDiv
 */


get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <header class="page-header">
                <?php
                $allsearch = new WP_Query("s=$s&showposts=0");
                $asfp = $allsearch->found_posts; ?>
                <h1 class="page-title">
                    <?php echo $asfp ?>
                    <?php printf(esc_html__(' posts for: %s', 'FineDiv'),'<span>' . get_search_query() . '</span>'); ?></h1>
                <?php if ($asfp < 1) : ?>

                   <script>
                       (function searchAgain(){
                           var e = document.querySelector('#search-section').classList;
                           e.add("visible");
                       }());
                   </script>

                <?php endif; ?>

            </header><!-- .page-header-->

            <section class="no-result-found">
                <?php
                if (!have_posts()) :
                    get_template_part('template-parts/content', 'none');
                    ?>
                <?php endif; ?>
            </section>
            <section id="index-content-container" class="index-content__container">
            <?php
            if (have_posts()) :

                while (have_posts()) : the_post();

                    /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part('template-parts/content', 'search');

            ?>
            <?php
            endwhile;
            ?>
            </section> <!-- index-content__container -->
            <section class="articles__nav">
                <div class="pagination">
                    <?php
                    // TODO: lets show current page number min. 1
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    //    'total'        => $articles->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
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
            endif;
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
