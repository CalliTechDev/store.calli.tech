<?php
//the id of the options
$igthemes_option='store-wp';

//start class
class IGthemes_Customizer {

// add some settings
public static function igthemes_customize($wp_customize) {

/** The short name gives a unique element to each options id. */
global $igthemes_option;
//upgrade message
$upgrade_message = '<a class="upgrade-tag" href="http://www.iograficathemes.com/downloads/store-wp-premium/" target="_blank">' . esc_html__(' - only premium', 'store-wp') . '</a>';

// slect categories
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

// PREMIUM
$wp_customize->add_section('upgrade-premium', array(
        'title' => esc_html__('UPGRADE TO PREMIUM', 'store-wp'),
        'priority' => 1,
    ) );

// GENERAL
    $wp_customize->get_section('title_tagline')->title = esc_html__('General', 'store-wp');
    $wp_customize->get_section('title_tagline')->priority = 3;

// LAYOUT
    $wp_customize->add_panel('layout-settings', array(
        'title' => esc_html__('Layout', 'store-wp'),
        'priority' => 4,
    ));
    $wp_customize->add_section('main-layout', array(
        'title' => esc_html__('Main Layout', 'store-wp'),
        'panel' => 'layout-settings',
    ));
    $wp_customize->add_section('single-layout', array(
        'title' => esc_html__('Single Layout', 'store-wp'),
        'panel' => 'layout-settings',
    ));
    $wp_customize->add_section('shop-layout', array(
        'title' => esc_html__('Shop Layout', 'store-wp'),
        'panel' => 'layout-settings',
    ));

// STYLE
    $wp_customize->add_panel( 'style-settings', array(
        'title' => __('Style', 'store-wp'),
        'priority' => 5,
    ));    
    $wp_customize->get_section('colors')->priority = 4;
    $wp_customize->get_section('colors')->title =  __('Body', 'store-wp');
    $wp_customize->get_section('colors')->panel = 'style-settings';
    
    $wp_customize->add_section('style-header', array(
        'title' => esc_html__('Header', 'store-wp'),
        'panel' => 'style-settings',
        'priority' => 1,
    ));
    $wp_customize->add_section('style-header-menu', array(
        'title' => esc_html__('Header Menu', 'store-wp'),
        'panel' => 'style-settings',
        'priority' => 2,
    ));
    $wp_customize->add_section('style-main-menu', array(
        'title' => esc_html__('Main Menu', 'store-wp'),
        'panel' => 'style-settings',
        'priority' => 2,
    ));
    $wp_customize->add_section('style-buttons', array(
        'title' => esc_html__('Buttons', 'store-wp'),
        'panel' => 'style-settings',
    ));
    $wp_customize->add_section('style-footer', array(
        'title' => esc_html__('Footer', 'store-wp'),
        'panel' => 'style-settings',
    ));
    
// FOOTER
    $wp_customize->add_section('footer-settings', array(
        'title' => esc_html__('Footer', 'store-wp'),
        'priority' => 6,
    ));

// SOCIAL
    $wp_customize->add_section('social-settings', array(
        'title' => esc_html__('Social', 'store-wp'),
        'priority' => 7,
    ));

// ADVANCED
    $wp_customize->add_section('advanced-settings', array(
        'title' => esc_html__('Advanced', 'store-wp'),
        'priority' => 8,
    ));
/*****************************************************************
* PREMIUM
******************************************************************/
$wp_customize->add_setting($igthemes_option . '[upgrade_box]', array(
    'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ) );

$wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'upgrade_box', array(
    'label' => esc_html__('', 'store-wp'),
    'description' => '<p style="font-style: normal;">' . esc_html__('If you like this theme, considering supporting development by purchasing the premium version.', 'store-wp'). '</p>'
    . '<ul class="premium" style="font-style: normal;"> '. '<li><strong>'. esc_html__('Main premium features:', 'store-wp'). '</strong></li>'
    . '<li>' . esc_html__('- All options enabled', 'store-wp') . '</li>'
    . '<li>' .  esc_html__('- Premium shortcodes included', 'store-wp') . '</li>'
    . '<li>' . esc_html__('- Priority support', 'store-wp'). '</li>'
    . '<li>' .  esc_html__('- Money back guarantee', 'store-wp') . '</li>'
    . '<li>' . '<a class="upgrade-button" href="http://www.iograficathemes.com/downloads/store-wp-premium/" rel="nofollow">' . esc_html__('upgrade to premium', 'store-wp') . '</a></li>'
    . '</ul>',    'type' => 'custom',
    'section' => 'upgrade-premium',
    'settings' => $igthemes_option . '[upgrade_box]',
    )));

/*****************************************************************
* GENERAL SETTINGS
******************************************************************/
//blog name
    $wp_customize->add_setting('blogname', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogname', array(
        'label' => esc_html__('Site Title', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogname',
        'priority' => 1,
    ));
//blog description
    $wp_customize->add_setting('blogdescription', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogdescription', array(
        'label' => esc_html__('Tagline', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogdescription',
        'priority' => 2,
    ));
//logo
    $wp_customize->add_setting($igthemes_option . '[logo]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo', array(
        'label' => esc_html__('Site Logo', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[logo]',
        'priority' => 3,
    )));
//lightbox
    $wp_customize->add_setting($igthemes_option . '[lightbox]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('lightbox', array(
        'label' => esc_html__('Lightbox', 'store-wp'),
        'description' => esc_html__('Enable image lightbox', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[lightbox]',
        'priority' => 99,
    ));
//breadcrumb
    $wp_customize->add_setting($igthemes_option . '[breadcrumb]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('breadcrumb', array(
        'label' => esc_html__('Breadcrumb', 'store-wp'),
        'description' => esc_html__('Enable breadcrumb (it will use WordPress SEO breadcrumb if available)', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[breadcrumb]',
        'priority' => 99,
    ));
//shortcodes
    $wp_customize->add_setting($igthemes_option . '[shortcodes]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,$igthemes_option . '[shortcodes', array(
        'label' => esc_html__('Shortcodes', 'store-wp'),
        'description' => esc_html__('Enable theme shortcodes', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[shortcodes]',
        'priority' => 99,
    )));
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//sidebar main
    $wp_customize->add_setting($igthemes_option . '[sidebar_main]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_main', array(
        'label' => esc_html__('Main Layout', 'store-wp'),
        'description' =>  esc_html__('Select the index page layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[sidebar_main]',
    )));
//post slide
    $wp_customize->add_setting($igthemes_option . '[post_slide]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_slide', array(
        'label' => esc_html__('Posts Slide', 'store-wp'),
        'description' => esc_html__('Show a carousel of the latest posts', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[post_slide]',
    ));
//main post content
    $wp_customize->add_setting($igthemes_option . '[main_post_content]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_post_content', array(
        'label' => esc_html__('Show excerpt', 'store-wp'),
        'description' => esc_html__('Show posts content as excerpt', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_post_content]',
    ));
//main featured images
    $wp_customize->add_setting($igthemes_option . '[main_featured_images]', array(
        'type' => 'option',
        'default' => 'checked',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_featured_images', array(
        'label' => esc_html__('Index featured image', 'store-wp'),
        'description' => esc_html__('Show featured images in index page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_featured_images]',
    ));
//main numeric pagination
    $wp_customize->add_setting($igthemes_option . '[main_numeric_pagination]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_numeric_pagination', array(
        'label' => esc_html__('Numeric pagination', 'store-wp'),
        'description' => esc_html__('Use numeric pagination in index page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_numeric_pagination]',
    ));
//sidebar single
    $wp_customize->add_setting($igthemes_option . '[sidebar_single]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_single', array(
        'label' => esc_html__('Single Layout', 'store-wp'),
        'description' => esc_html__('Select the single post layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[sidebar_single]',
    )));
//post featured image
    $wp_customize->add_setting($igthemes_option . '[post_featured_image]', array(
        'type' => 'option',
        'default' => 'checked',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_featured_image', array(
        'label' => esc_html__('Post featured image', 'store-wp'),
        'description' => esc_html__('Show featured image in post page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[post_featured_image]',
    ));
//post meta
    $wp_customize->add_setting($igthemes_option . '[post_meta]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'post_meta', array(
        'label' => esc_html__('Meta Data', 'store-wp'),
        'description' => esc_html__('Hide post meta data', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[post_meta]',
    )));
//sidebar shop
    $wp_customize->add_setting($igthemes_option . '[sidebar_shop]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_shop', array(
        'label' => esc_html__('Shop Layout', 'store-wp'),
        'description' => esc_html__('Select the shop page layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[sidebar_shop]',
    )));
//Number of products displayed
    $wp_customize->add_setting($igthemes_option . '[shop_products_number]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'shop_products_number', array(
        'label' => esc_html__('Products number', 'store-wp'),
        'description' => esc_html__('The number of products displayed per page', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[shop_products_number]',
    )));
//shop product slider
    $wp_customize->add_setting($igthemes_option . '[shop_slide]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('shop_slide', array(
        'label' => esc_html__('Products Slide', 'store-wp'),
        'description' => esc_html__('Show a carousel of the latest products', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[shop_slide]',
    ));
/*****************************************************************
* STYLE SETTINGS
******************************************************************/
//header style
    $wp_customize->add_setting($igthemes_option . '[header_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'header_style', array(
        'label' => esc_html__('Header Style', 'store-wp'),
        'description' => esc_html__('Header custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'style-header',
        'settings' => $igthemes_option . '[header_style]',
    )));
//header text color
    $wp_customize->add_control(new WP_Customize_color_Control(
        $wp_customize, 'header_textcolor', array(
        'label' => esc_html__('Text color', 'store-wp'),
        'section' => 'style-header',
    )));
//header menu style
    $wp_customize->add_setting($igthemes_option . '[header_menu_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'header_menu_style', array(
        'label' => esc_html__('Header Menu Style', 'store-wp'),
        'description' => esc_html__('Header menu custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'style-header-menu',
        'settings' => $igthemes_option . '[header_menu_style]',
    )));
//menu style
    $wp_customize->add_setting($igthemes_option . '[main_menu_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'main_menu_style', array(
        'label' => esc_html__('Main Menu Style', 'store-wp'),
        'description' => esc_html__('Main menu custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'style-main-menu',
        'settings' => $igthemes_option . '[main_menu_style]',
    )));
//text style
    $wp_customize->add_setting($igthemes_option . '[text_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'text_style', array(
        'label' => esc_html__('Text Style', 'store-wp'),
        'description' => esc_html__('Text custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[text_style]',
    )));
//link style
    $wp_customize->add_setting($igthemes_option . '[link_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'link_style', array(
        'label' => esc_html__('Links Style', 'store-wp'),
        'description' => esc_html__('Links custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[link_style]',
    )));
//button style
    $wp_customize->add_setting($igthemes_option . '[button_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'button_style', array(
        'label' => esc_html__('Buttons Style', 'store-wp'),
        'description' => esc_html__('Buttons custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'style-buttons',
        'settings' => $igthemes_option . '[button_style]',
    )));
//footer style
    $wp_customize->add_setting($igthemes_option . '[footer_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'footer_style', array(
        'label' => esc_html__('Footer Style', 'store-wp'),
        'description' => esc_html__('Footer custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'style-footer',
        'settings' => $igthemes_option . '[footer_style]',
    )));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
//footer text
    $wp_customize->add_setting($igthemes_option . '[footer_text]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_text', array(
        'label' => esc_html__('Footer Text', 'store-wp'),
        'description' => esc_html__('Footer custom text', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_text]',
    )));
//footer credits
    $wp_customize->add_setting($igthemes_option . '[footer_credits]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_credits', array(
        'label' => esc_html__('Credits Link', 'store-wp'),
        'description' => esc_html__('Remove author credits', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_credits]',
    )));

/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting($igthemes_option . '[facebook_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',

    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[facebook_url]',
    ));
//twitter
    $wp_customize->add_setting($igthemes_option . '[twitter_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[twitter_url]',
    ));
//google
    $wp_customize->add_setting($igthemes_option . '[google_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[google_url]',
    ));
//pinterest
    $wp_customize->add_setting($igthemes_option . '[pinterest_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[pinterest_url]',
    ));
//tumblr
    $wp_customize->add_setting($igthemes_option . '[tumblr_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[tumblr_url]',
    ));
//instagram
    $wp_customize->add_setting($igthemes_option . '[instagram_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[instagram_url]',
    ));
//linkedin
    $wp_customize->add_setting($igthemes_option . '[linkedin_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[linkedin_url]',
    ));
//dribbble
    $wp_customize->add_setting($igthemes_option . '[dribbble_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[dribbble_url]',
    ));
//vimeo
    $wp_customize->add_setting($igthemes_option . '[vimeo_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('vimeo_url', array(
        'label' => esc_html__('Vimeo url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[vimeo_url]',
    ));
//youtube
    $wp_customize->add_setting($igthemes_option . '[youtube_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[youtube_url]',
    ));
//rss
    $wp_customize->add_setting($igthemes_option . '[rss_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('rss_url', array(
        'label' => esc_html__('RSS url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[rss_url]',
    ));

/*****************************************************************
* ADVANCED SETTINGS
******************************************************************/
//custom css
    $wp_customize->add_setting($igthemes_option . '[custom_css]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_css', array(
        'label' => esc_html__('Custom CSS', 'store-wp'),
        'description' => esc_html__('Add your custom css code', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_css]',
    )));
//custom js
    $wp_customize->add_setting($igthemes_option . '[custom_js]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_js', array(
        'label' => esc_html__('Custom Javascript', 'store-wp'),
        'description' => esc_html__('Add your custom js code', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_js]',
    )));
    //END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS
