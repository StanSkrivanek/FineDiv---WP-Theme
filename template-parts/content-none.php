<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>

<section class="no-results not-found ">
	<div class="page-content content-none">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p class="nothing-found"><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'FineDiv' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

            <p class="nothing-found"><?php esc_html_e( 'Nothing matched your search terms but', 'FineDiv' ); ?></p>
            <img src="wp-content/themes/FineDiv/inc/img/panic-white.png" class="img-centered" />
            <p class="nothing-found"><?php esc_html_e('and please try again with some different keywords.', 'FineDiv'); ?></p>
        <?php
		else :
        ?>
            <p class="nothing-found"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'FineDiv' ); ?></p>
        <?php
		endif;
		?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
