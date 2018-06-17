<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="article-header">
        <div class="single-header__wrapper">
            <?php
//            if ( 'post' === get_post_type('css-references') ) : ?>
                <!-- <section class="article-post__posted_on">
                    <?php //FineDiv_posted_on(); ?>
                    <?php // FineDiv_posted_by(); ?>
                </section>.article-meta -->
                <?php
                if (is_single()) :
                    the_title('<h1 class="article-title">', '</h1>');
                else :
                    the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;
                ?>
                <!-- <section class="article-post__stats">
                    <ul>
                        <li class="article-post__reading_time">
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'time')) ?></span><?php echo FineDiv_get_reading_time(get_the_content()); ?>
                        </li>
                        <li class="article-post__comments_count">
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'comments'))
                                                                    ?></span><?php comments_number(); ?>
                        </li>
                    </ul>
                </section> -->
            <?php //endif; ?>
            <div class="article-cssr__categories">
            <ul>
                <?php FineDiv_cc_no_count(array(
                    'orderby' => 'alphabet',
                    'order' => 'ASC',
                    'show_count' => 1,
                    'title_li' => '',
                    'number' => 10,
                )); ?>
                <li>
                    <!-- TODO: get page link dymamicly -->
                    <a href="<?php esc_url(get_page_link(1788)); ?>">
                        <?php esc_html_e('Css References', 'FineDiv'); ?>
                    </a>
                </li>
            </ul>

        </div><!-- .article-cssr__categories -->
        </div>

    </header><!-- .article-header -->

    <div class="article-content">
        <?php
        the_content(sprintf(
        /* translators: %s: Name of current post. */
            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'FineDiv'), array('span' => array('class' => array()))),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'FineDiv'),
            'after' => '</div>',
        ));
        ?>
    </div> <!-- article-content -->

</article><!-- #post-## -->
