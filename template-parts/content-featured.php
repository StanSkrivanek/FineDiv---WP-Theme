<?php

/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>
<!--<section id="article-card-container" class="article-card__container">-->
    <article id="post-<?php the_ID(); ?>" class="article-card__wrapper hp-featured"<?php post_class(); ?>>
        <div class="article-card__front_page">
            <header class="article-card__header">
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
                    <section class="article-post__stats">
                        <ul>
                            <li class="article-post__reading_time">
                                <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'time')) ?></span><?php echo FineDiv_get_reading_time(get_the_content()); ?>
                            </li>
                            <li class="article-post__comments_count">
                        <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'comments')) ?></span><?php comments_number(); ?>
                            </li>
                        </ul>
                    </section>
                <?php endif; ?>
            </header><!-- .article-header -->
        </div>
    </article><!-- #post-## -->
<!--</section>-->