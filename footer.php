<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FineDiv
 */

?>

</div><!-- #content -->
    <section id="footer-forms" class="footer-forms">
        <div class="footer-form_one">
            <h4>Workshop</h4>
            <p>Post Workshop</p>
            <div class="formpage-link">
                <a href="<?php // echo get_page_link( get_page_by_title( 'form-workshop' )->ID ); ?>">FORM</a>
            </div>
        </div>
        <div class="footer-form_two">
            <h4>Job</h4>
            <p>Post Job</p>
            <div class="formpage-link">
                <a href="<?php // echo get_page_link(get_page_by_title('form-workshop')->ID); ?>">FORM</a>
            </div>
        </div>
    </section>
    <section id="footer-container" class="footer-container">
        <nav id="footer-nav" class="footer-nav">
            <?php wp_nav_menu(array('theme_location' => 'footer-last')); ?>
        </nav><!--  footer-site-navigation-->

        <?php
        // Make sure there is a social menu to display.
        if (has_nav_menu('social')) { ?>
        <nav class="footer-social">
            <h4 class="footer-social__title">Follow me</h4>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'social',
                'menu_class' => 'social-links-menu',
                'depth' => 1,
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>' . FineDiv_get_svg(array('icon' => 'chain')),
            ));
        }
        ?>
        </nav><!-- .social-menu -->
    </section>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf(esc_html__('Created & Designed by %2$s.', 'FineDiv'), 'FineDiv', '<a href="#" rel="designer">Stan Skrivanek</a>'); ?>
            <span class="copyright">  &#169; <?php echo date('Y'); ?></span>
        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php  wp_footer(); ?>
</body>
</html>
