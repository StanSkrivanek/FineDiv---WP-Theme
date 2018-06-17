<?php

/**
 *Template Name: CSS Props
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <header class="category-header">

                <h1 class="page-title"> CSS References</h1>

                <div class="archive-description">
                    <p>CSS Propertium Archivus descripsum dolor situs headurs amet, consectetur adipisicing elit, sed
                        doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>

            </header><!-- .page-header -->
            <section id="cssr-content-container" class="cssr_content_container">
                <div class="css-props__wrapper">
                    <h3 class="title">Pseudo Class</h3>
                    <?php
                    $args = array(
                        'props' => 'pseudo-class',
                        'post_type' => 'css-reference',
//                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }

                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="css-props__wrapper">
                    <h3 class="title">Property</h3>
                    <?php
                    $args = array(
                        'props' => 'property',
                        'post_type' => 'css-reference',
                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }
                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="css-props__wrapper">
                    <h3 class="title">Function</h3>
                    <?php
                    $args = array(
                        'props' => 'function',
                        'post_type' => 'css-reference',
                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }

                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="css-props__wrapper">
                    <h3 class="title">Data Type</h3>
                    <?php
                    $args = array(
                        'props' => 'data-type',
                        'post_type' => 'css-reference',
                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }

                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="css-props__wrapper">
                    <h3 class="title">Concept</h3>
                    <?php
                    $args = array(
                        'props' => 'concept',
                        'post_type' => 'css-reference',
                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }

                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="css-props__wrapper">
                    <h3 class="title">@rule</h3>
                    <?php
                    $args = array(
                        'props' => 'rule',
                        'post_type' => 'css-reference',
                        'posts_per_page' => 2,
                        'order' => 'ASC'

                    );
                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) :
                        echo '<ul>';
                    foreach ($articles->posts as $article) {
                        echo '<li><a href="' . get_permalink($article->ID) . '">' . $article->post_title . '</a></li>';
                    }

                    echo '</ul>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();

