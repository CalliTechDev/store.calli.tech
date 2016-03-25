<?php
/**
 * @package Boxed WP  IGthemes_Options_Framework
 */

/**
 * Sanitization for text input
 */
function igthemes_sanitize_text( $input ) {
    global $allowedtags;
    return wp_kses( $input , $allowedtags );
}

/**
 * Sanitization for textarea field
 */
function igthemes_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}

/**
 * Sanitization for url field
 */
function igthemes_sanitize_url( $input ) {
    return esc_url_raw( $input );
}
add_filter( 'igthemes_sanitize_url', 'igthemes_sanitize_url' );

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function igthemes_sanitize_checkbox( $input ) {
    // Boolean check
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * File upload sanitization.
 *
 * Returns a sanitized filepath if it has a valid extension.
 */
function igthemes_sanitize_upload( $input ) {
    $output = '';
    $filetype = wp_check_filetype( $input );
    if ( $filetype["ext"] ) {
        $output = esc_url_raw( $input );
    }
    return $output;
}

/**
 * Sanitization of input with allowed tags and wpautotop.
 *
 * Allows allowed tags in html input and ensures tags close properly.
 */
function igthemes_sanitize_allowedtags( $input ) {
    global $allowedtags;
    $output = wpautop( wp_kses( $input, $allowedtags ) );
    return $output;
}

/**
 * Validates that the categories select input
 */
function igthemes_sanitize_cat( $input ) {
    $categories = get_categories();
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    if ( array_key_exists( $input, $cats ) ){
        return $input;
    }
}

/**
 * Validates layout input
 */
function igthemes_sanitize_layout( $input) {
    $valid = array(
        '1col' => '1col',
        '2cl' => '2cl',
        '2cr' => '2cr',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Sanitize a color represented in hexidecimal notation.
 */
function igthemes_sanitize_hex( $input ) {
    $hex = sanitize_hex_color( $input );
    return  $hex;
}
