<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package FineDiv
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">

                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'FineDiv' ); ?></h1>
                </header><!-- .page-header -->

				<div class="page-content content-none">
                    <img src="wp-content/themes/FineDiv/inc/img/not_found.gif" class="img-centered" />
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'FineDiv' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
