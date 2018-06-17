<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id="article-cards-front-page" class="article-cards__front_page">
                <?php
                //get latest 6 posts
                $args = array(
                    'posts_per_page' => 6,
                    'ignore_sticky_posts' => true,
                );
                $latest_post_query = new WP_Query($args);
                //the loop
                if ($latest_post_query->have_posts()) {
                    while ($latest_post_query->have_posts()) {
                        $latest_post_query->the_post();
                        //get the standard index page content
                        get_template_part('template-parts/content', 'home');
                    }
                }
                wp_reset_postdata();
                ?>

            </section>

            <section class="">
                <div class="events-cards__front_page">
                    <?php
                    $today = current_time('timestamp');
                    $featuremonth = current_time('timestamp') + 2629743; // num = UNIX 30 days
                    $meta_query = array(
                        'value' => array($today, $featuremonth),
                        'compare' => 'BETWEEN',
                        'type' => 'NUMERIC'
                    );
                    $args = array(
                        'post_type' => 'workshops',
                        'meta_key' => '_workshop_data_event_date',
                        'posts_per_page' => -1,
                        'ignore_sticky_posts' => true,
                        'meta_query' => array($meta_query),
                        'ignore_sticky_posts' => true,
                        'orderby' => 'meta_value',
                        'order' => 'DESC',
                    );

                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) : $articles->the_post();
                    echo '<div class="events-post__stats">';
                    foreach ($articles->posts as $article) {
                        $datum = get_post_meta($article->ID, '_workshop_data_event_date', true);
                         echo '<div class="fp-events article-post__stats">
                            <div class="cptli-stripe-2--header">
                            <div><span class="name">'
                            . get_post_meta($article->ID, '_workshop_data_leader', true)
                            . '</span>
                            <span class="nameWhat"> povede workshop</span>
                            </div>
                                    <a class="" href="' . get_permalink($article->ID) . '">'
                            . $article->post_title . '</a>
                                     <ul>
                                        <li id="event-date" class="article-post__event-date"><span
                                        class="article-post__stats-icon">'
                            . FineDiv_get_svg(array('icon' => 'calendar')) . '</span>'
                            . date('d-m-Y', $datum) .

                            '</li><li class="article-post__event-town"><span class="article-post__stats-icon"> '
                            . FineDiv_get_svg(array('icon' => 'mmarker')) . '</span>'
                            . get_post_meta($article->ID, '_workshop_data_town', true) . ' | '
                            . get_post_meta($article->ID, '_workshop_data_country', true) .
                            '</li></ul> </div>
                        </div>';
                    }
                    echo '</div>';
                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

            </section>
            <section id="article-cards-front-page" class="article-cards__front_page">
                <?php

                $args = array(
                    'posts_per_page' => 6,
                    'ignore_sticky_posts' => true,
                    'meta_key' => 'featured-checkbox',
                    'meta_value' => 'yes',
                );

                $featured = new WP_Query($args);
                //the loop
                if ($featured->have_posts()) {
                    while ($featured->have_posts()) {
                        $featured->the_post();
                        //get the standard index page content
                        get_template_part('template-parts/content', 'featured');
                    }
                }
                wp_reset_postdata();
                ?>

            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
    <!---->
<?php
get_footer();
