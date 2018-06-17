<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>
<section id="article-card-container" class="article-card__container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="article-header">
            <?php
            if ( 'post' === get_post_type() ) : ?>
                <section class="article-post__posted_on">
                    <?php FineDiv_posted_on(); ?>
                    <?php FineDiv_posted_by(); ?>
                </section><!-- .article-meta -->
                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="article-title">', '</h1>' );
                else :
                    the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
                ?>
                <section class="article-post__stats">
                    <ul>
                        <li class="article-post__reading_time">
                            <span class="article-post__stats-icon"><?php echo FineDiv_get_svg( array( 'icon' => 'time' ) ) ?></span><?php echo FineDiv_get_reading_time( get_the_content() ); ?>
                        </li>
                        <li class="article-post__comments_count">
                    <span class="article-post__stats-icon"><?php echo FineDiv_get_svg( array( 'icon' => 'comments' ) )
                        ?></span><?php comments_number(); ?>
                        </li>
                    </ul>
                </section>
            <?php endif; ?>
        </header><!-- .article-header -->
        <div class="article-content">
            <?php
            the_content( sprintf(
            /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'FineDiv' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'FineDiv' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .article-content -->
        <footer class="article-footer">
            <?php FineDiv_article_footer(); ?>
        </footer><!-- .article-footer -->
    </article><!-- #post-## -->
</section>  <!-- .article-card__container -->