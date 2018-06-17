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
        <div id="single_header" class="single-header__wrapper">

            <?php
            if ('post' === get_post_type()) : ?>

                <section class="article-post__posted_on">
                    <?php FineDiv_posted_on(); ?>
                    <?php FineDiv_posted_by(); ?>
                </section><!-- .article-meta -->
                <?php

                if (is_single()) :
                    the_title('<h1 class="article-title">', '</h1>');
                else :
                    the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;
                ?>
                <section class="special-post-data">
            <?php
            $featured = get_post_meta($post->ID, 'featured-checkbox', true);
            $sponsored = get_post_meta($post->ID, 'sponsored-checkbox', true);

            if ($featured == 'yes') :
                echo '<div class="special-data"><p>featured</p></div>';
            endif;

            if ($sponsored == 'yes') :
                echo '<div class="special-data"><p>sponsored</p></div>';
            endif;
            ?>
            </section>
                <section class="article-post__stats">
                    <ul>
                        <li class="article-post__reading_time">
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'time')) ?></span><?php echo FineDiv_get_reading_time(get_the_content()); ?>
                        </li>
                        <li class="article-post__comments_count">
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'comments'))
                                                                    ?></span><?php comments_number(); ?>
                        </li>
                    </ul>
                </section>
            <?php endif; ?>
        </div>
    </header><!-- .article-header -->

    <div class="article-content">
        <?php
        if (has_post_thumbnail()) { ?>

            <figure class="index-image">
                <?php
                the_post_thumbnail('fds-full-bleed');
                ?>

            </figure>
        <?php

    } ?>
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

        <div class="article-footer__categories">
            <ul>
                <?php FineDiv_category_with_count(array(
                    'orderby' => 'alphabet',
                    'order' => 'ASC',
                    'show_count' => 1,
                    'title_li' => '',
                    'number' => 10,
                )); ?>
            </ul>
        </div><!-- .article-content -->

        <!-- POST NAVIGATION-->
        <section class="post-nav__wrapper">
            <div class="post-nav__left_container">
                <div class="post-nav__left_wrapper">
                    <span class="post-nav__icon"><?php echo FineDiv_get_svg(array('icon' => 'chev-left')) ?></span>
                    <span class="post-nav__title"><?php previous_post_link('%link', ' %title '); ?></span>
                </div>
            </div>
            <div class="post-nav__right_container">
                <div class="post-nav__right_wrapper">
                    <span class="post-nav__title"><?php next_post_link('%link', ' %title '); ?></span>
                    <span class="post-nav__icon"><?php echo FineDiv_get_svg(array('icon' => 'chev-right'))
                                                ?></span>
                </div>
            </div>
        </section> <!-- end post-nav__wrapper -->

</article><!-- #post-## -->