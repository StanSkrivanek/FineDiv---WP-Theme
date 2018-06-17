<?php
/**
 * Template Name : Random Post
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

    $randomPost = get_posts(array(
            'numberposts' => 1,
            'orderby'   => 'rand'
    ));
    foreach($randomPost as $post){
        wp_redirect(get_permalink($post->ID));
        exit();
    }
    get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section id="page-content_container" class="page_content__container">
            <?php

            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
