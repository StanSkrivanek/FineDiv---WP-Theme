<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>

<article id="post-<?php the_ID(); ?>" class="article-card__wrapper"<?php post_class(); ?>>

<?php
    the_title( '<h4 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
?>
</article><!-- #post-## -->