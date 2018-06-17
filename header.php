<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FineDiv
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'FineDiv'); ?></a>

    <header class="site-header">

        <!--       Header Left Part-->
        <section class="header-ls">
            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>
        </section><!--  header-ls-->

        <!-- Header middle Part -->
        <section class="ms-rs-wrap">
            <!-- Header middle Part - Left-->
            <div id="home-nav" class="header-ms">
                <nav id="primary-nav" class="main-nav">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary')); ?>
                </nav><!--  site-navigation-->
            </div>

            <!-- Header middle Part - Right-->
            <div class="header-rs">
                <div class="btn-menu-wrap">
                    <button type="button" id="open-menu" class="open-toggle-menu" value="menu"
                            onclick="visibilityToggle('home-nav'); ">
                    <span class="icon-menu">
                        <?php echo FineDiv_get_svg(array('icon' => 'burger')) ?>
                    </span>
                    </button>
                </div>
                <div class="btn-search-wrap">
                    <button type="button" id="open-search" class="open-toggle-search" value="search"
                            onclick="visibilityToggle('search-section'); SetFocus ('s'); hide();">
                    <span class="icon-search">
                        <?php echo FineDiv_get_svg(array('icon' => 'main-search')) ?>
                    </span>
                    </button>
                </div>
                <div class="btn-topics-wrap">
                    <button type="button" id="btn-toggle-topics" class="btn-toggle-topics" value="topics"
                            onclick="visibilityToggle('categories-section')">
                    <span class="icon-topics">
                        <?php echo FineDiv_get_svg(array('icon' => 'categories')) ?>
                    </span>
                    </button>
                </div>

            </div><!-- header-rs -->
        </section><!-- ms-rs-wrap -->
    </header><!-- #masthead -->

    <section id="search-section" class="search-section">
        <div id="search-area" class="search-area">
            <?php get_search_form(); ?>
        </div>
    </section> <!-- end of search area -->

    <section id="categories-section" class="categories-section">
        <div id="categories-area" class="categories-area">
            <ul>
                <?php wp_list_categories(array(
                    'orderby' => 'alphabet',
                    'order' => 'ASC',
                    'show_count' => 1,
                    'title_li' => '',
                    'number' => 10,
                )); ?>
            </ul>
        </div>

    </section> <!-- end of categories area -->


<div id="content" class="global-site-wrap">
