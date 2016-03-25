<?php
/**
 * @package Boxed WP   IGthemes_Options_Framework
  */
//Required file
require get_template_directory() . '/core-framework/options/includes/customizer-sanitization.php';
require get_template_directory() . '/core-framework/options/includes/customizer-control.php';
require get_template_directory() . '/core-framework/options/includes/customizer-reset.php';

//GET OPTION
function igthemes_option_name() {
    global $igthemes_option;
    return $igthemes_option;
}
function igthemes_option( $name, $default = false ) {
    $option_name = '';
    // Gets option name as defined in the theme
    if ( function_exists( 'igthemes_option_name' ) ) {
        $option_name = igthemes_option_name();
    }
    // Get option settings from database
    $options = get_option( $option_name );
    // Return specific option
    if ( isset( $options[$name] ) ) {
        return $options[$name];
    }
    return $default;
}

//ADD CSS
function igthemes_customizer_stylesheet() {
    wp_register_style( 'igthemes-customizer-css', get_template_directory_uri() . '/core-framework/options/css/option-styles.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'igthemes-customizer-css' );
}
add_action( 'customize_controls_print_styles', 'igthemes_customizer_stylesheet' );


//ADD PREVIEW
function igthemes_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'igthemes_customize_register' );

//PREVIEW JS
function igthemes_customize_preview_js() {
    wp_enqueue_script( 'igthemes-customizer', get_template_directory_uri() . '/core-framework/options/js/customizer-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'igthemes_customize_preview_js' );
