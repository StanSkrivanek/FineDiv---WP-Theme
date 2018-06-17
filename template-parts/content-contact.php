<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humescores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="messages-icon">
       <?php
        echo FineDiv_get_svg( array( 'icon' => 'messages' ) );
        ?>
    </div>

    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->
    <div class="contact-form">
        <?php
        // output buffering use with shortcodes
        // ob_start(); // don't display following immediately wait for our instruction (store in buffer)

        get_template_part( 'inc/templates/contact', 'form' );

        // return ob_get_clean(); // clean buffer and call data stored in a new buffer (above)

        ?>
    </div>

</article><!-- #post-## -->
