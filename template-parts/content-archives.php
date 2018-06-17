<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>

<article id="post-<?php the_ID(); ?>" class="archives-stripe__wrapper"<?php post_class(); ?>>
            <?php
            if ( 'post' === get_post_type() ) : ?>
                <div class="archives-post__posted_on">
                    <?php FineDiv_posted_on(); ?>
                </div><!-- .article-meta -->
                <div class="stripe-title-wrap">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="archives-title">', '</h1>' );
                    else :
                        the_title( '<h1 class="archives-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    endif;
                    ?>
                </div>
                <div class="archives-post__stats">
                    <div class="archives-post__posted_on">
                        <?php FineDiv_stripe_posted_by(); ?>
                    </div>
                </div>
            <?php endif; ?>
</article><!-- #post-## -->
