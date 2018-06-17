<?php
/**
 * FineDiv functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FineDiv
 */

if (! function_exists('FineDiv_setup')) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function FineDiv_setup()
    {
        /**
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on FineDiv, use a find and replace
        * to change 'FineDiv' to the name of your theme in all the template files.
        */
        load_theme_textdomain('FineDiv', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        /**
         *      SVG support
         *      ----------------------------------------------------------------------------
         *
         * @param $mimes
         *
         * @return mixed
         */
        add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
            global $wp_version;
            if ($wp_version !== '4.7.1') {
                return $data;
            }

            $filetype = wp_check_filetype($filename, $mimes);

            return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
        }, 10, 4);

        function cc_mime_types($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';

            return $mimes;
        }

        add_filter('upload_mimes', 'cc_mime_types');


        /**
         *      Filter to display only archive title without type
         *      ------------------------------------------------------------------
         */
        add_filter('get_the_archive_title', function ($title) {
            // Remove (replace with empty string - '' ) anything that looks like an archive title prefix
            return preg_replace('/^\w+: /', '', $title);
        });

/*
    *      Enable support for Post Thumbnails on posts and pages.
    *      ----------------------------------------------------------------------------
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
add_theme_support('post-thumbnails');

// This theme uses wp_nav_menu() in one location.
register_nav_menus(array(
    'primary' => esc_html__('Header Menu', 'FineDiv'),
    'footer-last' => esc_html__('Footer Last', 'FineDiv'),
    'social' => esc_html__('Social Media', 'FineDiv'),
));

        /*
         *      Switch default core markup for search form, comment form,
         *      and comments to output valid HTML5.
         *      ----------------------------------------------------------------------------
         */
        add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('FineDiv_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

        // Add theme support for Custom Logo.
        add_theme_support('custom-logo', array(
        'width' => 300,
        'height' => 100,
        'flex-width' => true,
        'flex-height' => true,
        'header-selector' => '.site-title a',
        'header-text' => false
    ));
    }

endif;
add_action('after_setup_theme', 'FineDiv_setup');


/**
 *      ----------------------------------------------------------------------------
 *      AFTER SETUP
 *      ----------------------------------------------------------------------------
 */

/**
 *
 *  FONTS
 *
 *  Register custom fonts
 *  ----------------------------------------------------------------------------
 */
function FineDiv_fonts_url()
{
    $fonts_url = '';

    /**
     * Translators: If there are characters in your language that are not
     * supported by Varela Round, change this value 'on' to 'off'. Do not translate
     * into your own language.
     */
    $font__heading = _x('on', 'Varela Round font: on or off', 'FineDiv');
    $font__text = _x('on', 'Varela Round font: on or off', 'FineDiv');

    $font_families = array();

    if ('off' !== $font__heading) {
        $font_families[] = 'Varela Round:400';
    }

    if ('off' !== $font__text) {
        $font_families[] = 'Varela Round:400';
    }


    if (in_array('on', array($font__heading, $font__text))) {
        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

/*
 * Add pre-connect for Google Fonts.
 * ----------------------------------------------------------------------------
 * @since Twenty Seventeen 1.0
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 *
 * @return array $urls           URLs to print for resource hints.
 */
function FineDiv_resource_hints($urls, $relation_type)
{
    if (wp_style_is('FineDiv-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}

add_filter('wp_resource_hints', 'FineDiv_resource_hints', 10, 2);

function fds_meta_callback($post)
{
    $post_meta = get_post_meta($post->ID);

}

/**
 *      Set the content width in pixels, based on the theme's design and stylesheet.
 *      ----------------------------------------------------------------------------
 *      Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
//function FineDiv_content_width() {
//    $GLOBALS['content_width'] = apply_filters( 'FineDiv_content_width', 640 );
//}

/**
 *      Get Article Estimated Reading Time
 *      ----------------------------------------------------------------------------
 */
if (!function_exists('FineDiv_get_reading_time')) :
    function FineDiv_get_reading_time($text)
    {

        // Round fractions up so the minimum read time is 1 minute
        $erd = ceil(str_word_count($text) / 170);
        if ($erd == 1) {
            $erd = $erd . ' min';
        } else {
            $erd = $erd . ' min';
        }

        return $erd;
    }
endif;

/**
 *  Register widget area.
 *  ----------------------------------------------------------------------------
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function FineDiv_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'FineDiv'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'FineDiv'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'FineDiv_widgets_init');


//  ============================================================================================
//  CUSTOM COMMENT FORMAT
//  ============================================================================================
add_filter('get_comment_reply_link', function () {
    get_comment_reply_link(array(
        'add_below' => 'custom-replay-form',
    ));

    return get_comment_reply_link();
});

/**
 *  ----------------------------------------------------------------------------
 *  ENQUEUE SECTION
 *  ----------------------------------------------------------------------------
 */

/**
 *  Enqueue styles
 *  ----------------------------------------------------------------------------
 */

function FineDiv_styles()
{
    // Enqueue Google Fonts: Varela Round
    wp_enqueue_style('FineDiv-fonts', FineDiv_fonts_url());
    wp_enqueue_style('FineDiv-style', get_stylesheet_uri());
    wp_enqueue_style('FineDiv-prism-style', get_stylesheet_uri());
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'FineDiv_styles');


/**
 *  Enqueue scripts
 *  ----------------------------------------------------------------------------
 */

function FineDiv_scripts()
{
    wp_enqueue_script('FineDiv-navigation', get_template_directory_uri() . '/js/navigation.js', '', '20151215', true);
    wp_enqueue_script('FineDiv-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', '', '20151215', true);
    wp_enqueue_script('FineDiv-prism-js', get_template_directory_uri() . '/js/prism.js', '', '', true);
    wp_enqueue_script('head-js', get_template_directory_uri() . '/js/whf.js', '', '', true);
    wp_enqueue_script('google_js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCgxoJUxANINd4ypXDMOs2h06Wdqt6iBcY');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/FineDiv.js', array('jquery'), '', false); // originally infooter: true __ but comments function was "undefined"
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'FineDiv_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom comments.
 */
require get_template_directory() . '/inc/custom-comments-form.php';

/**
 * Ajax Functions for this theme.
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SVG icons related functions and filters.
 */
require get_template_directory() . '/inc/icon-functions.php';
/**
 * REGISTER CPT - Workshops.
 */
require get_template_directory() . '/inc/cpt-workshop.php';
/**
 * REGISTER CPT - CSS Refs
 */
require get_template_directory() . '/inc/cpt-css-reference.php';
/**
 * Featured Post.
 */
require get_template_directory() . '/inc/featured.php';
/**
 * Sponsored Post.
 */
require get_template_directory() . '/inc/sponsored.php';

// CMB2
require_once('cmb2/init.php');
require_once('cmb2/function.php');
