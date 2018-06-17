<?php

/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>
<section id="article-card-container" class="article-card__container">
    <article id="post-<?php the_ID(); ?>" class="article-card__wrapper"<?php post_class(); ?>>
        <div class="article-card__container">
            <header class="article-card__header">
                <?php
                if ('css-reference' === get_post_type()) : ?>
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
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'comments'))
                                                                ?></span><?php comments_number(); ?>
                            </li>
                        </ul>
                    </section>
                <?php endif; ?>

                <?php
                if ('workshops' === get_post_type()) : ?>
                <div class="single-header__wrapper">
                <span class="author">
                    <?php echo get_post_meta(get_the_ID(), '_workshop_data_leader', true); ?>
                </span>
                        <span class="nameWhat"> povede workshop</span>
                    </div>
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
                        <span class="article-post__stats-icon">
                            <?php echo FineDiv_get_svg(array('icon' => 'calendar')) ?>
                        </span>
                                <?php echo get_post_meta(get_the_ID(), '_workshop_data_date', true); ?>
                            </li>
                            <li class="article-post__reading_time">
                                <span class="article-post__stats-icon">
                                    <?php echo FineDiv_get_svg(array('icon' => 'mmarker')) ?>
                                </span>
                                <?php echo get_post_meta(get_the_ID(), '_workshop_data_town', true); ?>
                                <span> | </span> <?php echo get_post_meta(get_the_ID(), '_workshop_data_country', true); ?>
                            </li>
                        </ul>
                    </section>
                    <?php endif; ?>


                    <?php
                    if ('post' === get_post_type()) : ?>
                        <section class="article-post__posted_on">
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
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg(array('icon' => 'feather'))
                                                                    ?></span>
                                    <?php comments_number(); ?>
                                </li>
                            </ul>
                        </section>
                    <?php endif; ?>
            </header><!-- .article-header -->
            <section class="article-card__excerpt">
                <?php
                if ('workshops' === get_post_type()) :
                    echo FineDiv_get_cpt_excerpt(148, 'content');
                else :
                    echo FineDiv_get_excerpt(148, 'content');
                ?>
                <?php endif;
                ?>
            </section><!-- .article-summary -->
            <footer class="article-card__footer">
                <ul>
                    <?php FineDiv_category_no_count(array(
                        'orderby' => 'alphabet',
                        'order' => 'ASC',
                        'title_li' => '',
                        'number' => 10,
                    )); ?>
                </ul>
            </footer>
        </div>
    </article><!-- #post-## -->

</section>