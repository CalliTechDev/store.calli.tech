<?php
/*-----------------------------------------------
 * Function script and styles
-----------------------------------------------*/
function igthemes_font_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /*
     * Translators: If there are characters in your language that are not supported,
     * translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'store-wp' )) {
        $fonts[] = 'Open Sans:300italic,400italic,700italic,300,400,700';
    }
    /*
     * Translators: To add an additional character subset specific to your language,
     * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, vietnamese)', 'store-wp'  );

    if ( 'cyrillic' == $subset ) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ( 'greek' == $subset ) {
        $subsets .= ',greek,greek-ext';
    } elseif ( 'devanagari' == $subset ) {
        $subsets .= ',devanagari';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}


//add css and js
function igthemes_scripts() {
    wp_enqueue_style( 'igthemes-style', get_stylesheet_uri() );

// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
    wp_enqueue_style( 'igthemes-fonts', igthemes_font_url(), array(), null );
//main css
    wp_enqueue_style( 'igthemes-main', get_template_directory_uri().'/css/main.min.css' );
//responsive css
    wp_enqueue_style( 'igthemes-responsive', get_template_directory_uri().'/css/responsive.min.css' );
//grid css
    wp_enqueue_style( 'igthemes-grid', get_template_directory_uri().'/css/grid.min.css' );
//woocommerce css
if ( class_exists( 'WooCommerce' )){
    wp_enqueue_style( 'igthemes-woocommerce', get_template_directory_uri().'/css/woocommerce.min.css' );
}
//icon css
    wp_enqueue_style( 'igthemes-icon', get_template_directory_uri().'/core-framework/icon/icon.min.css' );
//lightbox css
if (is_singular() && 'product' != get_post_type() &&  igthemes_option('lightbox') == '1' ) {
    wp_enqueue_style( 'nivo-lightbox-css', get_template_directory_uri().'/css/nivo-lightbox.min.css');
}
//carousel css
if (igthemes_option('shop_slide') || igthemes_option('post_slide')) {
    wp_enqueue_style( 'slick-css', get_template_directory_uri().'/css/slick.min.css' );
}
//lightbox js
if (is_singular() && 'product' != get_post_type() && igthemes_option('lightbox') == '1' ) {
    wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js',array('jquery'),'1.2.0',true);
}
//carousel js
if (igthemes_option('shop_slide') || igthemes_option('post_slide')) {
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js',array('jquery'),'1.5.7',true);
}
//main js
    wp_enqueue_script( 'igthemes-main', get_template_directory_uri() . '/js/main.min.js', array(), '1.0', true );
//comment js
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}
//conditional ie scripts
global $wp_scripts;
    wp_enqueue_script('igthemes-ie9',
                 get_template_directory_uri() . '/js/ie-fix.js',
                 array(),
                 '1.0',
                 true );
    wp_enqueue_script('igthemes-ie9');
    wp_script_add_data('igthemes-ie9', 'conditional', 'lt IE 9');

    wp_enqueue_script('igthemes-ie7',
                 get_template_directory_uri() . '/core-framework/icon/lte-ie7.min.js',
                 array(),
                 '1.0',
                 true );
    wp_enqueue_script('igthemes-ie7');
    wp_script_add_data('igthemes-ie7', 'conditional', 'IE 7');
}
add_action( 'wp_enqueue_scripts', 'igthemes_scripts' );