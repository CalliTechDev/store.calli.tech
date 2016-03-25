<?php
/**
 * Boxed WP functions and definitions
 *
 * @package Store WP
 */

if ( ! function_exists( 'store_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function store_wp_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'store-wp', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    //Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    //This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'store-wp' ),
        'header-menu' => esc_html__( 'Header Menu', 'store-wp' ),
    ) );

    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    //Enable support for Post Formats.
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'store_wp_custom_background_args', array(
        'default-color' => 'f9f9f9',
        //'default-image' =>   get_template_directory_uri() . '',
    ) ) );
}
endif; // store_wp_setup
add_action( 'after_setup_theme', 'store_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function store_wp_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'store_wp_content_width', 1170 );
}
add_action( 'after_setup_theme', 'store_wp_content_width', 0 );

/**
 * Custom image size.
 */
if ( function_exists( 'add_image_size' ) ) { 
    // post slider image.
    add_image_size( 'img-slider', 480, 260, true ); // (cropped)
    // post image.
    add_image_size( 'img-post', 1170, 370, false ); // (cropped)
}

//Implement the Custom Header feature.
require get_template_directory() . '/core-framework/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/core-framework/template-tags.php';

//Custom functions that act independently of the theme templates.
require get_template_directory() . '/core-framework/extras.php';

//Load Jetpack compatibility file.
require get_template_directory() . '/core-framework/jetpack.php';

//Core Framework.
require get_template_directory() . '/core-framework/func/function-action.php';
require get_template_directory() . '/core-framework/func/function-widget.php';
require get_template_directory() . '/core-framework/func/function-script.php';
require get_template_directory() . '/core-framework/partials/page-metabox.php';
if ( is_admin() ) {
    require get_template_directory() . '/core-framework/welcome/welcome-screen.php';
}
//Loads the Options Panel
require get_template_directory() . '/core-framework/options/options-framework.php';
// Loads options.php
require get_template_directory() . '/options.php';

//widgets
require get_template_directory() . '/core-framework/widgets/social-widget.php';
require get_template_directory() . '/core-framework/widgets/recent-posts-widget.php';
require get_template_directory() . '/core-framework/widgets/adsense-widget.php';

/*-----------------------------------------------
 * Woocommerce support.
 -----------------------------------------------*/
add_theme_support( 'woocommerce' );
