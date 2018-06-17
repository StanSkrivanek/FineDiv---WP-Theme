<?php

/**
 *Template Name: Workshop - Form
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="article-content">
                <?php
                $meta_box = cmb2_get_metabox('_workshop_data_metabox');
                print_r($meta_box);
                ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
