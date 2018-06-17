<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <section id="page_content_container" class="page_content__container contact-page">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'contact' );

			endwhile; // End of the loop.
			?>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
