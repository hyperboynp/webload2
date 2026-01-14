<?php
/**
 * Ashutosh Brokerage and Securities Theme Functions
 * Security hardened and optimized version
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Theme Setup
function ashutosh_securities_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'ashutosh-securities' ),
        'footer'  => esc_html__( 'Footer Menu', 'ashutosh-securities' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'navigation-widgets',
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 70,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'ashutosh_securities_setup' );

// Enqueue scripts and styles
function ashutosh_securities_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'ashutosh-securities-style', get_stylesheet_uri(), array(), '1.1.0' );

    // Custom JavaScript - No jQuery dependency for better performance
    wp_enqueue_script( 'ashutosh-securities-script', get_template_directory_uri() . '/js/main.js', array(), '1.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ashutosh_securities_scripts' );

// Register Widget Areas
function ashutosh_securities_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 1', 'ashutosh-securities' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here for footer column 1.', 'ashutosh-securities' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 2', 'ashutosh-securities' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here for footer column 2.', 'ashutosh-securities' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 3', 'ashutosh-securities' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here for footer column 3.', 'ashutosh-securities' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 4', 'ashutosh-securities' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here for footer column 4.', 'ashutosh-securities' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ashutosh_securities_widgets_init' );

// Custom Excerpt Length
function ashutosh_securities_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'ashutosh_securities_excerpt_length', 999 );

// Customizer Settings
function ashutosh_securities_customize_register( $wp_customize ) {
    
    // ========================================
    // HOMEPAGE SECTIONS IN CUSTOMIZER
    // ========================================
    
    // Hero Section
    $wp_customize->add_section( 'ashutosh_hero_section', array(
        'title'    => __( 'Hero Section', 'ashutosh-securities' ),
        'priority' => 25,
    ) );
    
    $wp_customize->add_setting( 'hero_main_heading', array(
        'default'           => 'Ashutosh Brokerage takes a new step forward',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_main_heading', array(
        'label'   => __( 'Hero Main Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_hero_section',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'hero_brand_image', array(
        'default'           => get_template_directory_uri() . '/images/brand-partnership.svg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_brand_image', array(
        'label'   => __( 'Hero Brand/Partnership Image', 'ashutosh-securities' ),
        'section' => 'ashutosh_hero_section',
    ) ) );
    
    $wp_customize->add_setting( 'hero_form_heading', array(
        'default'           => 'OPEN FREE* DEMAT AND TRADING ACCOUNT IN 15 MIN**',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_form_heading', array(
        'label'   => __( 'Form Card Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_hero_section',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'hero_form_subheading', array(
        'default'           => 'Limited Period Offer',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_form_subheading', array(
        'label'   => __( 'Form Card Subheading', 'ashutosh-securities' ),
        'section' => 'ashutosh_hero_section',
        'type'    => 'text',
    ) );
    
    // Promotional Banner Section
    $wp_customize->add_section( 'ashutosh_promo_banner', array(
        'title'    => __( 'Promotional Banner', 'ashutosh-securities' ),
        'priority' => 26,
    ) );
    
    $wp_customize->add_setting( 'promo_banner_heading', array(
        'default'           => 'Ashutosh Brokerage Business Partner Program',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'promo_banner_heading', array(
        'label'   => __( 'Banner Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_promo_banner',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'promo_banner_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'promo_banner_content', array(
        'label'   => __( 'Banner Content (HTML allowed)', 'ashutosh-securities' ),
        'section' => 'ashutosh_promo_banner',
        'type'    => 'textarea',
    ) );
    
    $wp_customize->add_setting( 'promo_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promo_banner_image', array(
        'label'   => __( 'Banner Image', 'ashutosh-securities' ),
        'section' => 'ashutosh_promo_banner',
    ) ) );
    
    $wp_customize->add_setting( 'promo_banner_button_text', array(
        'default'           => 'Become A Partner',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'promo_banner_button_text', array(
        'label'   => __( 'Button Text', 'ashutosh-securities' ),
        'section' => 'ashutosh_promo_banner',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'promo_banner_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'promo_banner_button_url', array(
        'label'   => __( 'Button URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_promo_banner',
        'type'    => 'url',
    ) );
    
    // Orange Welcome Section
    $wp_customize->add_section( 'ashutosh_orange_welcome', array(
        'title'    => __( 'Orange Welcome Section', 'ashutosh-securities' ),
        'priority' => 27,
    ) );
    
    $wp_customize->add_setting( 'orange_section_heading_1', array(
        'default'           => 'Designed for the serious,',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'orange_section_heading_1', array(
        'label'   => __( 'Heading Line 1', 'ashutosh-securities' ),
        'section' => 'ashutosh_orange_welcome',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'orange_section_heading_2', array(
        'default'           => 'welcome to Ashutosh Brokerage!',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'orange_section_heading_2', array(
        'label'   => __( 'Heading Line 2', 'ashutosh-securities' ),
        'section' => 'ashutosh_orange_welcome',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'orange_section_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'orange_section_content', array(
        'label'   => __( 'Content', 'ashutosh-securities' ),
        'section' => 'ashutosh_orange_welcome',
        'type'    => 'textarea',
    ) );
    
    $wp_customize->add_setting( 'orange_section_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'orange_section_image', array(
        'label'   => __( 'Section Image', 'ashutosh-securities' ),
        'section' => 'ashutosh_orange_welcome',
    ) ) );
    
    // Research Section
    $wp_customize->add_section( 'ashutosh_research_section', array(
        'title'    => __( 'Research Section', 'ashutosh-securities' ),
        'priority' => 28,
    ) );
    
    $wp_customize->add_setting( 'research_section_heading', array(
        'default'           => 'For those serious about understanding our research approach',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'research_section_heading', array(
        'label'   => __( 'Section Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_research_section',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'research_section_description', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'research_section_description', array(
        'label'   => __( 'Section Description', 'ashutosh-securities' ),
        'section' => 'ashutosh_research_section',
        'type'    => 'textarea',
    ) );
    
    // Services Section
    $wp_customize->add_section( 'ashutosh_services_section', array(
        'title'    => __( 'Services Section', 'ashutosh-securities' ),
        'priority' => 29,
    ) );
    
    $wp_customize->add_setting( 'services_section_heading', array(
        'default'           => 'For those serious about getting services designed for their core needs',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'services_section_heading', array(
        'label'   => __( 'Section Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_services_section',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'services_section_description', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'services_section_description', array(
        'label'   => __( 'Section Description', 'ashutosh-securities' ),
        'section' => 'ashutosh_services_section',
        'type'    => 'textarea',
    ) );
    
    // Sticky Banner - Enhanced with all options
    $wp_customize->add_section( 'ashutosh_sticky_banner', array(
        'title'    => __( 'Sticky Bottom Banner', 'ashutosh-securities' ),
        'priority' => 30,
    ) );
    
    // Enable/Disable Sticky Banner
    $wp_customize->add_setting( 'sticky_banner_enable', array(
        'default'           => true,
        'sanitize_callback' => 'ashutosh_securities_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'sticky_banner_enable', array(
        'label'   => __( 'Enable Sticky Banner', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'checkbox',
    ) );
    
    // Banner Image
    $wp_customize->add_setting( 'sticky_banner_image', array(
        'default'           => 'https://images.pexels.com/photos/128867/coins-currency-investment-insurance-128867.jpeg?auto=compress&cs=tinysrgb&w=100',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sticky_banner_image', array(
        'label'   => __( 'Banner Image', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
    ) ) );
    
    // Banner Heading
    $wp_customize->add_setting( 'sticky_banner_heading', array(
        'default'           => 'Balanced Advantage Funds',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sticky_banner_heading', array(
        'label'   => __( 'Banner Heading', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'text',
    ) );
    
    // Banner Text
    $wp_customize->add_setting( 'sticky_banner_text', array(
        'default'           => 'Ride market waves with confidence',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sticky_banner_text', array(
        'label'   => __( 'Banner Text', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'text',
    ) );
    
    // Button Text
    $wp_customize->add_setting( 'sticky_banner_button_text', array(
        'default'           => 'EXPLORE',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sticky_banner_button_text', array(
        'label'   => __( 'Button Text', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'text',
    ) );
    
    // Button URL
    $wp_customize->add_setting( 'sticky_banner_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'sticky_banner_button_url', array(
        'label'   => __( 'Button URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'url',
    ) );
    
    // Background Color
    $wp_customize->add_setting( 'sticky_banner_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_banner_bg_color', array(
        'label'   => __( 'Background Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
    ) ) );
    
    // Text Color
    $wp_customize->add_setting( 'sticky_banner_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_banner_text_color', array(
        'label'   => __( 'Text Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
    ) ) );
    
    // Floating CTA
    $wp_customize->add_setting( 'floating_cta_text', array(
        'default'           => 'OPEN FREE* DEMAT ACCOUNT',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'floating_cta_text', array(
        'label'   => __( 'Floating CTA Button Text', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'floating_cta_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'floating_cta_url', array(
        'label'   => __( 'Floating CTA Button URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_sticky_banner',
        'type'    => 'url',
    ) );
    
    // ========================================
    // FOOTER BOTTOM SECTION
    // ========================================
    $wp_customize->add_section( 'ashutosh_footer_bottom', array(
        'title'    => __( 'Footer Bottom Settings', 'ashutosh-securities' ),
        'priority' => 31,
    ) );
    
    // Enable/Disable Custom Copyright
    $wp_customize->add_setting( 'footer_custom_copyright_enable', array(
        'default'           => false,
        'sanitize_callback' => 'ashutosh_securities_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'footer_custom_copyright_enable', array(
        'label'       => __( 'Use Custom Copyright Text', 'ashutosh-securities' ),
        'description' => __( 'Enable to use custom copyright text instead of auto-generated', 'ashutosh-securities' ),
        'section'     => 'ashutosh_footer_bottom',
        'type'        => 'checkbox',
    ) );
    
    // Custom Copyright Text
    $wp_customize->add_setting( 'footer_copyright_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'footer_copyright_text', array(
        'label'       => __( 'Custom Copyright Text', 'ashutosh-securities' ),
        'description' => __( 'HTML allowed. Use {year} for current year, {site_name} for site name', 'ashutosh-securities' ),
        'section'     => 'ashutosh_footer_bottom',
        'type'        => 'textarea',
    ) );
    
    // Footer Background Color
    $wp_customize->add_setting( 'footer_bottom_bg_color', array(
        'default'           => '#1a1d29',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_bg_color', array(
        'label'   => __( 'Footer Bottom Background Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_footer_bottom',
    ) ) );
    
    // Footer Text Color
    $wp_customize->add_setting( 'footer_bottom_text_color', array(
        'default'           => '#aaaaaa',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_text_color', array(
        'label'   => __( 'Footer Bottom Text Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_footer_bottom',
    ) ) );
    
    // Footer Link Color
    $wp_customize->add_setting( 'footer_bottom_link_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_link_color', array(
        'label'   => __( 'Footer Bottom Link Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_footer_bottom',
    ) ) );
    
    // Footer Link Hover Color
    $wp_customize->add_setting( 'footer_bottom_link_hover_color', array(
        'default'           => '#F58220',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_link_hover_color', array(
        'label'   => __( 'Footer Bottom Link Hover Color', 'ashutosh-securities' ),
        'section' => 'ashutosh_footer_bottom',
    ) ) );
    
    // Show Social Links in Footer Bottom
    $wp_customize->add_setting( 'footer_bottom_show_social', array(
        'default'           => false,
        'sanitize_callback' => 'ashutosh_securities_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'footer_bottom_show_social', array(
        'label'   => __( 'Show Social Links in Footer Bottom', 'ashutosh-securities' ),
        'section' => 'ashutosh_footer_bottom',
        'type'    => 'checkbox',
    ) );
    
    // Additional Footer Text (before copyright)
    $wp_customize->add_setting( 'footer_additional_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'footer_additional_text', array(
        'label'       => __( 'Additional Footer Text', 'ashutosh-securities' ),
        'description' => __( 'Text to display before copyright (HTML allowed)', 'ashutosh-securities' ),
        'section'     => 'ashutosh_footer_bottom',
        'type'        => 'textarea',
    ) );
    
    // Contact Information Section
    $wp_customize->add_section( 'ashutosh_securities_contact', array(
        'title'    => __( 'Contact Information', 'ashutosh-securities' ),
        'priority' => 30,
    ) );

    // Email
    $wp_customize->add_setting( 'ashutosh_securities_email', array(
        'default'           => 'info@ashutoshbrokerage.com',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_email', array(
        'label'   => __( 'Email Address', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_contact',
        'type'    => 'email',
    ) );

    // Phone
    $wp_customize->add_setting( 'ashutosh_securities_phone', array(
        'default'           => '+977-01-5971500',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_phone', array(
        'label'   => __( 'Phone Number', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_contact',
        'type'    => 'text',
    ) );

    // Address
    $wp_customize->add_setting( 'ashutosh_securities_address', array(
        'default'           => '4 Square Complex, 3rd Floor, Narayan Chaur, Naxal, Kathmandu',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_address', array(
        'label'   => __( 'Address', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_contact',
        'type'    => 'textarea',
    ) );

    // Social Media Section
    $wp_customize->add_section( 'ashutosh_securities_social', array(
        'title'    => __( 'Social Media', 'ashutosh-securities' ),
        'priority' => 35,
    ) );

    // Facebook
    $wp_customize->add_setting( 'ashutosh_securities_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_facebook', array(
        'label'   => __( 'Facebook URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // LinkedIn
    $wp_customize->add_setting( 'ashutosh_securities_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_linkedin', array(
        'label'   => __( 'LinkedIn URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // Twitter
    $wp_customize->add_setting( 'ashutosh_securities_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_twitter', array(
        'label'   => __( 'Twitter URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'ashutosh_securities_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_instagram', array(
        'label'   => __( 'Instagram URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'ashutosh_securities_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_youtube', array(
        'label'   => __( 'YouTube URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // WhatsApp
    $wp_customize->add_setting( 'ashutosh_securities_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_whatsapp', array(
        'label'       => __( 'WhatsApp URL', 'ashutosh-securities' ),
        'description' => __( 'Example: https://wa.me/9779801234567', 'ashutosh-securities' ),
        'section'     => 'ashutosh_securities_social',
        'type'        => 'url',
    ) );

    // Telegram
    $wp_customize->add_setting( 'ashutosh_securities_telegram', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_telegram', array(
        'label'   => __( 'Telegram URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // Pinterest
    $wp_customize->add_setting( 'ashutosh_securities_pinterest', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_pinterest', array(
        'label'   => __( 'Pinterest URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // TikTok
    $wp_customize->add_setting( 'ashutosh_securities_tiktok', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_tiktok', array(
        'label'   => __( 'TikTok URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // GitHub
    $wp_customize->add_setting( 'ashutosh_securities_github', array(
        'default'           => '',
        'sanitize_callback' => 'ashutosh_securities_sanitize_url',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_github', array(
        'label'   => __( 'GitHub URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_social',
        'type'    => 'url',
    ) );

    // SEO Meta Description
    $wp_customize->add_section( 'ashutosh_securities_seo', array(
        'title'    => __( 'SEO Settings', 'ashutosh-securities' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'ashutosh_securities_meta_description', array(
        'default'           => 'Professional brokerage and securities services in Nepal. Expert investment advice and trading solutions.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_meta_description', array(
        'label'       => __( 'Homepage Meta Description', 'ashutosh-securities' ),
        'description' => __( 'Describe your business in 150-160 characters for search engines.', 'ashutosh-securities' ),
        'section'     => 'ashutosh_securities_seo',
        'type'        => 'textarea',
    ) );

    // CTA Button URLs
    $wp_customize->add_section( 'ashutosh_securities_cta', array(
        'title'    => __( 'Call-to-Action Buttons', 'ashutosh-securities' ),
        'priority' => 45,
    ) );

    $wp_customize->add_setting( 'ashutosh_securities_tms_login_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_tms_login_url', array(
        'label'   => __( 'TMS Login URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_cta',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'ashutosh_securities_open_account_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ashutosh_securities_open_account_url', array(
        'label'   => __( 'Open Account URL', 'ashutosh-securities' ),
        'section' => 'ashutosh_securities_cta',
        'type'    => 'url',
    ) );
}
add_action( 'customize_register', 'ashutosh_securities_customize_register' );

/**
 * Sanitize checkbox values
 */
function ashutosh_securities_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Centralized Social Media Configuration
 * Easy to add new platforms - just add to this array
 */
function ashutosh_securities_get_social_media_config() {
    return array(
        'facebook' => array(
            'key'   => 'ashutosh_securities_facebook',
            'label' => __( 'Facebook', 'ashutosh-securities' ),
            'icon'  => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
        ),
        'linkedin' => array(
            'key'   => 'ashutosh_securities_linkedin',
            'label' => __( 'LinkedIn', 'ashutosh-securities' ),
            'icon'  => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>',
        ),
        'twitter' => array(
            'key'   => 'ashutosh_securities_twitter',
            'label' => __( 'Twitter', 'ashutosh-securities' ),
            'icon'  => '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>',
        ),
        'instagram' => array(
            'key'   => 'ashutosh_securities_instagram',
            'label' => __( 'Instagram', 'ashutosh-securities' ),
            'icon'  => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>',
        ),
        'youtube' => array(
            'key'   => 'ashutosh_securities_youtube',
            'label' => __( 'YouTube', 'ashutosh-securities' ),
            'icon'  => '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>',
        ),
        'whatsapp' => array(
            'key'   => 'ashutosh_securities_whatsapp',
            'label' => __( 'WhatsApp', 'ashutosh-securities' ),
            'icon'  => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>',
        ),
        'telegram' => array(
            'key'   => 'ashutosh_securities_telegram',
            'label' => __( 'Telegram', 'ashutosh-securities' ),
            'icon'  => '<path d="M22 2L11 13"></path><path d="M22 2L15 22L11 13L2 9L22 2Z"></path>',
        ),
        'pinterest' => array(
            'key'   => 'ashutosh_securities_pinterest',
            'label' => __( 'Pinterest', 'ashutosh-securities' ),
            'icon'  => '<path d="M8.32 20.32c-.83-6.29 2.43-11.02 6.46-11.02 2.47 0 4.31 1.67 4.31 4.19 0 3.14-1.86 5.79-4.48 5.79-1.48 0-2.59-1.05-2.23-2.35.43-1.54 1.26-3.2 1.26-4.32 0-.99-.53-1.82-1.64-1.82-1.3 0-2.35 1.38-2.35 3.23 0 1.18.39 1.97.39 1.97s-1.3 5.61-1.54 6.62c-.46 1.92-.07 4.27-.04 4.51.02.14.19.17.27.07.11-.16 1.53-1.95 2.05-3.82.15-.53.84-3.35.84-3.35.41.8 1.62 1.5 2.91 1.5 3.83 0 6.43-3.58 6.43-8.37 0-3.62-2.99-6.99-7.54-6.99-5.66 0-8.51 4.15-8.51 7.61 0 2.09.77 3.95 2.43 4.64.27.11.41.06.47-.17.04-.18.28-1.15.39-1.59.03-.14.02-.27-.1-.41-.66-.82-1.08-1.87-1.08-3.37 0-3.26 2.38-6.18 6.19-6.18 3.38 0 5.24 2.12 5.24 4.95 0 3.73-1.61 6.88-4.01 6.88-1.32 0-2.31-1.12-1.99-2.5.38-1.64 1.12-3.41 1.12-4.6 0-1.06-.56-1.95-1.73-1.95-1.37 0-2.48 1.46-2.48 3.42 0 1.25.41 2.09.41 2.09l-1.63 7.09c-.48 2.09-.07 4.65-.04 4.91z"></path>',
        ),
        'tiktok' => array(
            'key'   => 'ashutosh_securities_tiktok',
            'label' => __( 'TikTok', 'ashutosh-securities' ),
            'icon'  => '<path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path>',
        ),
        'github' => array(
            'key'   => 'ashutosh_securities_github',
            'label' => __( 'GitHub', 'ashutosh-securities' ),
            'icon'  => '<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>',
        ),
    );
}

/**
 * Display Social Media Links
 * @param int $icon_size Size of the icon (default: 18)
 * @param string $class_prefix Optional CSS class prefix
 */
function ashutosh_securities_display_social_links( $icon_size = 18, $class_prefix = '' ) {
    $social_config = ashutosh_securities_get_social_media_config();
    $has_social = false;
    
    // Check if any social media is configured
    foreach ( $social_config as $platform => $data ) {
        if ( get_theme_mod( $data['key'] ) ) {
            $has_social = true;
            break;
        }
    }
    
    if ( ! $has_social ) {
        return;
    }
    
    echo '<div class="social-links ' . esc_attr( $class_prefix ) . '" role="navigation" aria-label="' . esc_attr__( 'Social media links', 'ashutosh-securities' ) . '">';
    
    foreach ( $social_config as $platform => $data ) {
        $url = get_theme_mod( $data['key'] );
        if ( $url ) {
            ?>
            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $data['label'] ); ?>">
                <svg width="<?php echo esc_attr( $icon_size ); ?>" height="<?php echo esc_attr( $icon_size ); ?>" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                    <?php echo $data['icon']; ?>
                </svg>
            </a>
            <?php
        }
    }
    
    echo '</div>';
}

/**
 * Custom Logo Display with Proper Sizing
 * Outputs logo without fixed width/height attributes for better responsive scaling
 */
function ashutosh_securities_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    
    if ( ! $custom_logo_id ) {
        return;
    }
    
    $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
    $logo_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
    
    if ( empty( $logo_alt ) ) {
        $logo_alt = get_bloginfo( 'name' );
    }
    
    ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <img src="<?php echo esc_url( $logo_url ); ?>" 
             alt="<?php echo esc_attr( $logo_alt ); ?>" 
             class="custom-logo" />
    </a>
    <?php
}

// Enhanced URL Sanitization (Security Fix)
function ashutosh_securities_sanitize_url( $url ) {
    $url = esc_url_raw( $url );
    // Only allow http and https protocols
    if ( $url && ! preg_match( '/^https?:\/\//i', $url ) ) {
        return '';
    }
    return $url;
}

// SVG Upload Support - SECURED for Administrators Only
function ashutosh_securities_mime_types( $mimes ) {
    // Only allow SVG uploads for administrators (Security Fix)
    if ( current_user_can( 'administrator' ) ) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'ashutosh_securities_mime_types' );

// Add Schema.org JSON-LD Structured Data (SEO Enhancement)
function ashutosh_securities_add_schema() {
    if ( is_front_page() ) {
        $schema = array(
            '@context'    => 'https://schema.org',
            '@type'       => 'FinancialService',
            'name'        => get_bloginfo( 'name' ),
            'description' => get_bloginfo( 'description' ),
            'url'         => home_url( '/' ),
            'logo'        => get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '',
            'address'     => array(
                '@type'           => 'PostalAddress',
                'streetAddress'   => get_theme_mod( 'ashutosh_securities_address', '4 Square Complex, 3rd Floor, Narayan Chaur, Naxal' ),
                'addressLocality' => 'Kathmandu',
                'addressCountry'  => 'NP',
            ),
            'contactPoint' => array(
                '@type'      => 'ContactPoint',
                'telephone'  => get_theme_mod( 'ashutosh_securities_phone', '+977-01-5971500' ),
                'email'      => get_theme_mod( 'ashutosh_securities_email', 'info@ashutoshbrokerage.com' ),
                'contactType' => 'Customer Service',
            ),
            'sameAs' => array_filter( array(
                get_theme_mod( 'ashutosh_securities_facebook', '' ),
                get_theme_mod( 'ashutosh_securities_linkedin', '' ),
                get_theme_mod( 'ashutosh_securities_twitter', '' ),
                get_theme_mod( 'ashutosh_securities_instagram', '' ),
                get_theme_mod( 'ashutosh_securities_youtube', '' ),
                get_theme_mod( 'ashutosh_securities_whatsapp', '' ),
                get_theme_mod( 'ashutosh_securities_telegram', '' ),
                get_theme_mod( 'ashutosh_securities_pinterest', '' ),
                get_theme_mod( 'ashutosh_securities_tiktok', '' ),
                get_theme_mod( 'ashutosh_securities_github', '' ),
            ) ),
        );

        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'ashutosh_securities_add_schema' );

// Add Open Graph and Twitter Card Meta Tags (SEO Enhancement)
function ashutosh_securities_add_meta_tags() {
    if ( is_front_page() ) {
        $title       = get_bloginfo( 'name' );
        $description = get_theme_mod( 'ashutosh_securities_meta_description', get_bloginfo( 'description' ) );
        $url         = home_url( '/' );
        $image       = get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '';

        // Open Graph Tags
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
        if ( $image ) {
            echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
        }
        echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";

        // Twitter Card Tags
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
        if ( $image ) {
            echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
        }

        // Meta Description
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'ashutosh_securities_add_meta_tags' );

// Add Security Headers
function ashutosh_securities_security_headers() {
    if ( ! is_admin() ) {
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: SAMEORIGIN' );
        header( 'X-XSS-Protection: 1; mode=block' );
        header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    }
}
add_action( 'send_headers', 'ashutosh_securities_security_headers' );

// Add rel="noopener" to external links (Security Enhancement)
function ashutosh_securities_add_noopener( $content ) {
    $content = preg_replace_callback(
        '/<a([^>]*)target=["\']_blank["\']([^>]*)>/i',
        function( $matches ) {
            $link = $matches[0];
            if ( strpos( $link, 'rel=' ) === false ) {
                $link = str_replace( '>', ' rel="noopener noreferrer">', $link );
            } elseif ( strpos( $link, 'noopener' ) === false ) {
                $link = preg_replace( '/rel=["\']([^"\']*)["\']/', 'rel="$1 noopener noreferrer"', $link );
            }
            return $link;
        },
        $content
    );
    return $content;
}
add_filter( 'the_content', 'ashutosh_securities_add_noopener' );

// ========================================
// HOMEPAGE CONTENT MANAGEMENT SYSTEM
// ========================================

// Register Custom Post Types for Homepage Sections
function ashutosh_securities_register_homepage_cpts() {
    
    // Research Cards Post Type
    register_post_type( 'research_card', array(
        'labels' => array(
            'name'               => __( 'Research Cards', 'ashutosh-securities' ),
            'singular_name'      => __( 'Research Card', 'ashutosh-securities' ),
            'add_new'            => __( 'Add New Card', 'ashutosh-securities' ),
            'add_new_item'       => __( 'Add New Research Card', 'ashutosh-securities' ),
            'edit_item'          => __( 'Edit Research Card', 'ashutosh-securities' ),
            'new_item'           => __( 'New Research Card', 'ashutosh-securities' ),
            'view_item'          => __( 'View Research Card', 'ashutosh-securities' ),
            'search_items'       => __( 'Search Research Cards', 'ashutosh-securities' ),
            'not_found'          => __( 'No research cards found', 'ashutosh-securities' ),
            'not_found_in_trash' => __( 'No research cards found in Trash', 'ashutosh-securities' ),
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'ashutosh_homepage_content',
        'menu_icon'           => 'dashicons-analytics',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'         => false,
        'rewrite'             => false,
    ));
    
    // Service Cards Post Type
    register_post_type( 'service_card', array(
        'labels' => array(
            'name'               => __( 'Service Cards', 'ashutosh-securities' ),
            'singular_name'      => __( 'Service Card', 'ashutosh-securities' ),
            'add_new'            => __( 'Add New Card', 'ashutosh-securities' ),
            'add_new_item'       => __( 'Add New Service Card', 'ashutosh-securities' ),
            'edit_item'          => __( 'Edit Service Card', 'ashutosh-securities' ),
            'new_item'           => __( 'New Service Card', 'ashutosh-securities' ),
            'view_item'          => __( 'View Service Card', 'ashutosh-securities' ),
            'search_items'       => __( 'Search Service Cards', 'ashutosh-securities' ),
            'not_found'          => __( 'No service cards found', 'ashutosh-securities' ),
            'not_found_in_trash' => __( 'No service cards found in Trash', 'ashutosh-securities' ),
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'ashutosh_homepage_content',
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'         => false,
        'rewrite'             => false,
    ));
    
    // Two Column Sections Post Type
    register_post_type( 'two_column_section', array(
        'labels' => array(
            'name'               => __( 'Two Column Sections', 'ashutosh-securities' ),
            'singular_name'      => __( 'Two Column Section', 'ashutosh-securities' ),
            'add_new'            => __( 'Add New Section', 'ashutosh-securities' ),
            'add_new_item'       => __( 'Add New Two Column Section', 'ashutosh-securities' ),
            'edit_item'          => __( 'Edit Two Column Section', 'ashutosh-securities' ),
            'new_item'           => __( 'New Section', 'ashutosh-securities' ),
            'view_item'          => __( 'View Section', 'ashutosh-securities' ),
            'search_items'       => __( 'Search Sections', 'ashutosh-securities' ),
            'not_found'          => __( 'No sections found', 'ashutosh-securities' ),
            'not_found_in_trash' => __( 'No sections found in Trash', 'ashutosh-securities' ),
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'ashutosh_homepage_content',
        'menu_icon'           => 'dashicons-layout',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'has_archive'         => false,
        'rewrite'             => false,
    ));
}
add_action( 'init', 'ashutosh_securities_register_homepage_cpts', 0 );

// Add Custom Admin Menu for Homepage Content Management
function ashutosh_securities_add_admin_menu() {
    add_menu_page(
        __( 'Homepage Content', 'ashutosh-securities' ),
        __( 'Homepage Content', 'ashutosh-securities' ),
        'manage_options',
        'ashutosh_homepage_content',
        'ashutosh_securities_homepage_content_page',
        'dashicons-admin-home',
        25
    );
    
    add_submenu_page(
        'ashutosh_homepage_content',
        __( 'Settings', 'ashutosh-securities' ),
        __( 'Settings', 'ashutosh-securities' ),
        'manage_options',
        'ashutosh_homepage_settings',
        'ashutosh_securities_homepage_settings_page'
    );
}
add_action( 'admin_menu', 'ashutosh_securities_add_admin_menu' );

// Homepage Content Overview Page
function ashutosh_securities_homepage_content_page() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'Homepage Content Management', 'ashutosh-securities' ); ?></h1>
        
        <div class="card" style="max-width: 100%; margin-top: 20px;">
            <h2><?php _e( 'Welcome to Homepage Content Manager', 'ashutosh-securities' ); ?></h2>
            <p><?php _e( 'Manage all your homepage content without editing theme files. Use the options below to edit different sections:', 'ashutosh-securities' ); ?></p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
                
                <!-- Hero & Main Sections -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-star-filled" style="color: #F58220;"></span> Hero & Main Content</h3>
                    <p>Edit hero section, welcome section, and promotional banners.</p>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=ashutosh_hero_section'); ?>" class="button button-primary">Edit Hero Section</a>
                </div>
                
                <!-- Research Cards -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-analytics" style="color: #2271b1;"></span> Research Cards</h3>
                    <p>Manage the 3 research philosophy cards (3R, POP, Q-Square).</p>
                    <a href="<?php echo admin_url('edit.php?post_type=research_card'); ?>" class="button button-primary">Manage Research Cards</a>
                </div>
                
                <!-- Service Cards -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-portfolio" style="color: #00a32a;"></span> Service Cards</h3>
                    <p>Manage the 4 service segment cards on homepage.</p>
                    <a href="<?php echo admin_url('edit.php?post_type=service_card'); ?>" class="button button-primary">Manage Service Cards</a>
                </div>
                
                <!-- Two Column Sections -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-layout" style="color: #d63638;"></span> Two Column Sections</h3>
                    <p>Manage feature sections (Options Trading, Platform Features, etc.).</p>
                    <a href="<?php echo admin_url('edit.php?post_type=two_column_section'); ?>" class="button button-primary">Manage Sections</a>
                </div>
                
                <!-- Settings -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-admin-settings" style="color: #8c8f94;"></span> Section Settings</h3>
                    <p>Control section visibility, order, and global settings.</p>
                    <a href="<?php echo admin_url('admin.php?page=ashutosh_homepage_settings'); ?>" class="button button-primary">Manage Settings</a>
                </div>
                
                <!-- Customizer -->
                <div class="card" style="padding: 20px; background: #f0f0f1;">
                    <h3><span class="dashicons dashicons-admin-customizer" style="color: #8c8f94;"></span> Theme Customizer</h3>
                    <p>Edit colors, contact info, social media, and CTAs.</p>
                    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">Open Customizer</a>
                </div>
            </div>
            
            <div style="margin-top: 30px; padding: 20px; background: #fff3cd; border-left: 4px solid #F58220;">
                <h3><?php _e( 'Quick Guide', 'ashutosh-securities' ); ?></h3>
                <ol>
                    <li><strong>Hero Section:</strong> Go to Customizer → Homepage Sections to edit hero text and CTAs</li>
                    <li><strong>Research Cards:</strong> Add/edit up to 3 cards with images, titles, and descriptions</li>
                    <li><strong>Service Cards:</strong> Add/edit up to 4 service cards with images and content</li>
                    <li><strong>Two Column Sections:</strong> Create feature sections with text on one side and image on other</li>
                    <li><strong>Settings:</strong> Enable/disable sections and reorder them</li>
                </ol>
            </div>
        </div>
    </div>
    <?php
}

// Homepage Settings Page
function ashutosh_securities_homepage_settings_page() {
    // Save settings
    if ( isset( $_POST['ashutosh_save_settings'] ) && check_admin_referer( 'ashutosh_homepage_settings' ) ) {
        $sections_visibility = isset( $_POST['sections_visibility'] ) ? $_POST['sections_visibility'] : array();
        update_option( 'ashutosh_sections_visibility', $sections_visibility );
        
        echo '<div class="notice notice-success"><p>' . __( 'Settings saved successfully!', 'ashutosh-securities' ) . '</p></div>';
    }
    
    $sections_visibility = get_option( 'ashutosh_sections_visibility', array(
        'hero' => 'on',
        'promo_banner' => 'on',
        'orange_welcome' => 'on',
        'two_column_sections' => 'on',
        'research_cards' => 'on',
        'service_cards' => 'on',
        'sticky_banner' => 'on',
        'floating_cta' => 'on',
    ));
    
    ?>
    <div class="wrap">
        <h1><?php _e( 'Homepage Settings', 'ashutosh-securities' ); ?></h1>
        
        <form method="post" action="">
            <?php wp_nonce_field( 'ashutosh_homepage_settings' ); ?>
            
            <div class="card" style="max-width: 800px; margin-top: 20px;">
                <h2><?php _e( 'Section Visibility', 'ashutosh-securities' ); ?></h2>
                <p><?php _e( 'Enable or disable homepage sections:', 'ashutosh-securities' ); ?></p>
                
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e( 'Hero Section', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[hero]" <?php checked( isset( $sections_visibility['hero'] ) ? $sections_visibility['hero'] : '', 'on' ); ?>>
                                <?php _e( 'Show hero section with lead form', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Promotional Banner', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[promo_banner]" <?php checked( isset( $sections_visibility['promo_banner'] ) ? $sections_visibility['promo_banner'] : '', 'on' ); ?>>
                                <?php _e( 'Show business partner program banner', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Orange Welcome Section', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[orange_welcome]" <?php checked( isset( $sections_visibility['orange_welcome'] ) ? $sections_visibility['orange_welcome'] : '', 'on' ); ?>>
                                <?php _e( 'Show "Designed for the serious" section', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Two Column Sections', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[two_column_sections]" <?php checked( isset( $sections_visibility['two_column_sections'] ) ? $sections_visibility['two_column_sections'] : '', 'on' ); ?>>
                                <?php _e( 'Show feature sections (Options Trading, Platform, etc.)', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Research Cards Section', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[research_cards]" <?php checked( isset( $sections_visibility['research_cards'] ) ? $sections_visibility['research_cards'] : '', 'on' ); ?>>
                                <?php _e( 'Show research philosophy cards', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Service Cards Section', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[service_cards]" <?php checked( isset( $sections_visibility['service_cards'] ) ? $sections_visibility['service_cards'] : '', 'on' ); ?>>
                                <?php _e( 'Show service segmentation cards', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Sticky Bottom Banner', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[sticky_banner]" <?php checked( isset( $sections_visibility['sticky_banner'] ) ? $sections_visibility['sticky_banner'] : '', 'on' ); ?>>
                                <?php _e( 'Show sticky banner at bottom', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><?php _e( 'Floating CTA Button', 'ashutosh-securities' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="sections_visibility[floating_cta]" <?php checked( isset( $sections_visibility['floating_cta'] ) ? $sections_visibility['floating_cta'] : '', 'on' ); ?>>
                                <?php _e( 'Show floating "Open Account" button', 'ashutosh-securities' ); ?>
                            </label>
                        </td>
                    </tr>
                </table>
                
                <p class="submit">
                    <input type="submit" name="ashutosh_save_settings" class="button button-primary" value="<?php _e( 'Save Settings', 'ashutosh-securities' ); ?>">
                </p>
            </div>
        </form>
        
        <div class="card" style="max-width: 800px; margin-top: 20px;">
            <h2><?php _e( 'Tips', 'ashutosh-securities' ); ?></h2>
            <ul>
                <li><?php _e( 'Disabled sections will not appear on the homepage but content is preserved', 'ashutosh-securities' ); ?></li>
                <li><?php _e( 'You can re-enable sections anytime without losing content', 'ashutosh-securities' ); ?></li>
                <li><?php _e( 'Use the Theme Customizer for styling and color changes', 'ashutosh-securities' ); ?></li>
            </ul>
        </div>
    </div>
    <?php
}

// Add Meta Boxes for Custom Fields
function ashutosh_securities_add_meta_boxes() {
    // Research Card Meta Box
    add_meta_box(
        'research_card_meta',
        __( 'Card Details', 'ashutosh-securities' ),
        'ashutosh_securities_research_card_meta_callback',
        'research_card',
        'normal',
        'high'
    );
    
    // Service Card Meta Box
    add_meta_box(
        'service_card_meta',
        __( 'Card Details', 'ashutosh-securities' ),
        'ashutosh_securities_service_card_meta_callback',
        'service_card',
        'normal',
        'high'
    );
    
    // Two Column Section Meta Box
    add_meta_box(
        'two_column_section_meta',
        __( 'Section Settings', 'ashutosh-securities' ),
        'ashutosh_securities_two_column_section_meta_callback',
        'two_column_section',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ashutosh_securities_add_meta_boxes' );

// Research Card Meta Box Callback
function ashutosh_securities_research_card_meta_callback( $post ) {
    wp_nonce_field( 'research_card_meta_box', 'research_card_meta_box_nonce' );
    
    $button_text = get_post_meta( $post->ID, '_button_text', true );
    $button_url = get_post_meta( $post->ID, '_button_url', true );
    ?>
    <p>
        <label for="button_text"><strong><?php _e( 'Button Text:', 'ashutosh-securities' ); ?></strong></label><br>
        <input type="text" id="button_text" name="button_text" value="<?php echo esc_attr( $button_text ? $button_text : 'EXPLORE' ); ?>" style="width: 100%;" placeholder="EXPLORE">
    </p>
    <p>
        <label for="button_url"><strong><?php _e( 'Button URL:', 'ashutosh-securities' ); ?></strong></label><br>
        <input type="url" id="button_url" name="button_url" value="<?php echo esc_url( $button_url ); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p class="description">
        <?php _e( 'Set a featured image for the card icon/image. Add card title as the post title and description in the editor above.', 'ashutosh-securities' ); ?>
    </p>
    <?php
}

// Service Card Meta Box Callback
function ashutosh_securities_service_card_meta_callback( $post ) {
    wp_nonce_field( 'service_card_meta_box', 'service_card_meta_box_nonce' );
    
    $button_text = get_post_meta( $post->ID, '_button_text', true );
    $button_url = get_post_meta( $post->ID, '_button_url', true );
    ?>
    <p>
        <label for="button_text"><strong><?php _e( 'Button Text:', 'ashutosh-securities' ); ?></strong></label><br>
        <input type="text" id="button_text" name="button_text" value="<?php echo esc_attr( $button_text ? $button_text : 'EXPLORE' ); ?>" style="width: 100%;" placeholder="EXPLORE">
    </p>
    <p>
        <label for="button_url"><strong><?php _e( 'Button URL:', 'ashutosh-securities' ); ?></strong></label><br>
        <input type="url" id="button_url" name="button_url" value="<?php echo esc_url( $button_url ); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p class="description">
        <?php _e( 'Set a featured image for the card icon. Add card description in the editor above.', 'ashutosh-securities' ); ?>
    </p>
    <?php
}

// Two Column Section Meta Box Callback
function ashutosh_securities_two_column_section_meta_callback( $post ) {
    wp_nonce_field( 'two_column_section_meta_box', 'two_column_section_meta_box_nonce' );
    
    $section_layout = get_post_meta( $post->ID, '_section_layout', true );
    $section_bg = get_post_meta( $post->ID, '_section_bg', true );
    $button_1_text = get_post_meta( $post->ID, '_button_1_text', true );
    $button_1_url = get_post_meta( $post->ID, '_button_1_url', true );
    $button_2_text = get_post_meta( $post->ID, '_button_2_text', true );
    $button_2_url = get_post_meta( $post->ID, '_button_2_url', true );
    ?>
    <p>
        <label for="section_layout"><strong><?php _e( 'Layout:', 'ashutosh-securities' ); ?></strong></label><br>
        <select id="section_layout" name="section_layout" style="width: 100%;">
            <option value="text_left" <?php selected( $section_layout, 'text_left' ); ?>><?php _e( 'Text Left - Image Right', 'ashutosh-securities' ); ?></option>
            <option value="text_right" <?php selected( $section_layout, 'text_right' ); ?>><?php _e( 'Text Right - Image Left', 'ashutosh-securities' ); ?></option>
        </select>
    </p>
    
    <p>
        <label for="section_bg"><strong><?php _e( 'Background Color:', 'ashutosh-securities' ); ?></strong></label><br>
        <select id="section_bg" name="section_bg" style="width: 100%;">
            <option value="white" <?php selected( $section_bg, 'white' ); ?>><?php _e( 'White', 'ashutosh-securities' ); ?></option>
            <option value="light_gray" <?php selected( $section_bg, 'light_gray' ); ?>><?php _e( 'Light Gray', 'ashutosh-securities' ); ?></option>
        </select>
    </p>
    
    <hr>
    
    <h4><?php _e( 'Button 1 (Primary)', 'ashutosh-securities' ); ?></h4>
    <p>
        <label for="button_1_text"><?php _e( 'Button Text:', 'ashutosh-securities' ); ?></label><br>
        <input type="text" id="button_1_text" name="button_1_text" value="<?php echo esc_attr( $button_1_text ); ?>" style="width: 100%;" placeholder="Learn More">
    </p>
    <p>
        <label for="button_1_url"><?php _e( 'Button URL:', 'ashutosh-securities' ); ?></label><br>
        <input type="url" id="button_1_url" name="button_1_url" value="<?php echo esc_url( $button_1_url ); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    
    <h4><?php _e( 'Button 2 (Optional)', 'ashutosh-securities' ); ?></h4>
    <p>
        <label for="button_2_text"><?php _e( 'Button Text:', 'ashutosh-securities' ); ?></label><br>
        <input type="text" id="button_2_text" name="button_2_text" value="<?php echo esc_attr( $button_2_text ); ?>" style="width: 100%;" placeholder="Explore Features">
    </p>
    <p>
        <label for="button_2_url"><?php _e( 'Button URL:', 'ashutosh-securities' ); ?></label><br>
        <input type="url" id="button_2_url" name="button_2_url" value="<?php echo esc_url( $button_2_url ); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    
    <p class="description">
        <?php _e( 'Set featured image for the right side. Add section heading as title and content in the editor. Use "Order" in Page Attributes to control section sequence.', 'ashutosh-securities' ); ?>
    </p>
    <?php
}

// Save Meta Box Data
function ashutosh_securities_save_meta_boxes( $post_id ) {
    // Check nonce and autosave
    if ( ! isset( $_POST['research_card_meta_box_nonce'] ) && 
         ! isset( $_POST['service_card_meta_box_nonce'] ) && 
         ! isset( $_POST['two_column_section_meta_box_nonce'] ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // Save Research Card Meta
    if ( isset( $_POST['research_card_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['research_card_meta_box_nonce'], 'research_card_meta_box' ) ) {
        
        if ( isset( $_POST['button_text'] ) ) {
            update_post_meta( $post_id, '_button_text', sanitize_text_field( $_POST['button_text'] ) );
        }
        if ( isset( $_POST['button_url'] ) ) {
            update_post_meta( $post_id, '_button_url', esc_url_raw( $_POST['button_url'] ) );
        }
    }
    
    // Save Service Card Meta
    if ( isset( $_POST['service_card_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['service_card_meta_box_nonce'], 'service_card_meta_box' ) ) {
        
        if ( isset( $_POST['button_text'] ) ) {
            update_post_meta( $post_id, '_button_text', sanitize_text_field( $_POST['button_text'] ) );
        }
        if ( isset( $_POST['button_url'] ) ) {
            update_post_meta( $post_id, '_button_url', esc_url_raw( $_POST['button_url'] ) );
        }
    }
    
    // Save Two Column Section Meta
    if ( isset( $_POST['two_column_section_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['two_column_section_meta_box_nonce'], 'two_column_section_meta_box' ) ) {
        
        if ( isset( $_POST['section_layout'] ) ) {
            update_post_meta( $post_id, '_section_layout', sanitize_text_field( $_POST['section_layout'] ) );
        }
        if ( isset( $_POST['section_bg'] ) ) {
            update_post_meta( $post_id, '_section_bg', sanitize_text_field( $_POST['section_bg'] ) );
        }
        if ( isset( $_POST['button_1_text'] ) ) {
            update_post_meta( $post_id, '_button_1_text', sanitize_text_field( $_POST['button_1_text'] ) );
        }
        if ( isset( $_POST['button_1_url'] ) ) {
            update_post_meta( $post_id, '_button_1_url', esc_url_raw( $_POST['button_1_url'] ) );
        }
        if ( isset( $_POST['button_2_text'] ) ) {
            update_post_meta( $post_id, '_button_2_text', sanitize_text_field( $_POST['button_2_text'] ) );
        }
        if ( isset( $_POST['button_2_url'] ) ) {
            update_post_meta( $post_id, '_button_2_url', esc_url_raw( $_POST['button_2_url'] ) );
        }
    }
}
add_action( 'save_post', 'ashutosh_securities_save_meta_boxes' );

// Admin Notice for New Backend System
function ashutosh_securities_backend_system_notice() {
    $screen = get_current_screen();
    
    // Show on dashboard and homepage content pages
    if ( $screen->id === 'dashboard' || strpos( $screen->id, 'ashutosh_homepage' ) !== false ) {
        $dismissed = get_option( 'ashutosh_backend_notice_dismissed', false );
        
        if ( ! $dismissed ) {
            ?>
            <div class="notice notice-info is-dismissible ashutosh-backend-notice">
                <h2><?php _e( '🎉 New Backend Content Management System Available!', 'ashutosh-securities' ); ?></h2>
                <p><?php _e( 'You can now manage all homepage content without editing theme files! Use the new Homepage Content manager to edit sections, cards, and text.', 'ashutosh-securities' ); ?></p>
                <p>
                    <a href="<?php echo admin_url('admin.php?page=ashutosh_homepage_content'); ?>" class="button button-primary"><?php _e( 'Explore Homepage Content Manager', 'ashutosh-securities' ); ?></a>
                    <a href="<?php echo get_template_directory_uri(); ?>/../../../BACKEND-CONTENT-MANAGEMENT-GUIDE.md" class="button" target="_blank"><?php _e( 'Read Full Guide', 'ashutosh-securities' ); ?></a>
                    <button type="button" class="button ashutosh-dismiss-notice"><?php _e( 'Dismiss', 'ashutosh-securities' ); ?></button>
                </p>
            </div>
            <script>
            jQuery(document).ready(function($) {
                $('.ashutosh-dismiss-notice').on('click', function() {
                    $.post(ajaxurl, {
                        action: 'ashutosh_dismiss_backend_notice'
                    });
                    $('.ashutosh-backend-notice').fadeOut();
                });
            });
            </script>
            <?php
        }
    }
}
add_action( 'admin_notices', 'ashutosh_securities_backend_system_notice' );

// AJAX handler for dismissing notice
function ashutosh_securities_dismiss_backend_notice() {
    update_option( 'ashutosh_backend_notice_dismissed', true );
    wp_die();
}
add_action( 'wp_ajax_ashutosh_dismiss_backend_notice', 'ashutosh_securities_dismiss_backend_notice' );

// ========================================
// CUSTOM SLIDER FUNCTIONALITY
// ========================================

// Register Custom Post Type for Sliders
function ashutosh_securities_register_slider_cpt() {
    $labels = array(
        'name'                  => _x( 'Sliders', 'Post Type General Name', 'ashutosh-securities' ),
        'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'ashutosh-securities' ),
        'menu_name'             => __( 'Image Sliders', 'ashutosh-securities' ),
        'name_admin_bar'        => __( 'Slider', 'ashutosh-securities' ),
        'archives'              => __( 'Slider Archives', 'ashutosh-securities' ),
        'attributes'            => __( 'Slider Attributes', 'ashutosh-securities' ),
        'parent_item_colon'     => __( 'Parent Slider:', 'ashutosh-securities' ),
        'all_items'             => __( 'All Sliders', 'ashutosh-securities' ),
        'add_new_item'          => __( 'Add New Slider', 'ashutosh-securities' ),
        'add_new'               => __( 'Add New', 'ashutosh-securities' ),
        'new_item'              => __( 'New Slider', 'ashutosh-securities' ),
        'edit_item'             => __( 'Edit Slider', 'ashutosh-securities' ),
        'update_item'           => __( 'Update Slider', 'ashutosh-securities' ),
        'view_item'             => __( 'View Slider', 'ashutosh-securities' ),
        'view_items'            => __( 'View Sliders', 'ashutosh-securities' ),
        'search_items'          => __( 'Search Slider', 'ashutosh-securities' ),
        'not_found'             => __( 'Not found', 'ashutosh-securities' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'ashutosh-securities' ),
    );
    $args = array(
        'label'                 => __( 'Slider', 'ashutosh-securities' ),
        'description'           => __( 'Image sliders for the website', 'ashutosh-securities' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'slider_category' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-images-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'slider', $args );
}
add_action( 'init', 'ashutosh_securities_register_slider_cpt', 0 );

// Register Slider Category Taxonomy
function ashutosh_securities_register_slider_taxonomy() {
    $labels = array(
        'name'              => _x( 'Slider Categories', 'taxonomy general name', 'ashutosh-securities' ),
        'singular_name'     => _x( 'Slider Category', 'taxonomy singular name', 'ashutosh-securities' ),
        'search_items'      => __( 'Search Slider Categories', 'ashutosh-securities' ),
        'all_items'         => __( 'All Slider Categories', 'ashutosh-securities' ),
        'edit_item'         => __( 'Edit Slider Category', 'ashutosh-securities' ),
        'update_item'       => __( 'Update Slider Category', 'ashutosh-securities' ),
        'add_new_item'      => __( 'Add New Slider Category', 'ashutosh-securities' ),
        'new_item_name'     => __( 'New Slider Category Name', 'ashutosh-securities' ),
        'menu_name'         => __( 'Categories', 'ashutosh-securities' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false,
        'public'            => false,
    );

    register_taxonomy( 'slider_category', array( 'slider' ), $args );
}
add_action( 'init', 'ashutosh_securities_register_slider_taxonomy', 0 );

// Add Meta Box for Slider Link
function ashutosh_securities_slider_meta_boxes() {
    add_meta_box(
        'slider_link_meta_box',
        __( 'Slider Link (Optional)', 'ashutosh-securities' ),
        'ashutosh_securities_slider_link_callback',
        'slider',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ashutosh_securities_slider_meta_boxes' );

// Meta Box Callback
function ashutosh_securities_slider_link_callback( $post ) {
    wp_nonce_field( 'ashutosh_securities_slider_meta_box', 'ashutosh_securities_slider_meta_box_nonce' );
    $link_url = get_post_meta( $post->ID, '_slider_link_url', true );
    $link_target = get_post_meta( $post->ID, '_slider_link_target', true );
    ?>
    <p>
        <label for="slider_link_url"><?php _e( 'Link URL:', 'ashutosh-securities' ); ?></label><br>
        <input type="url" id="slider_link_url" name="slider_link_url" value="<?php echo esc_url( $link_url ); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p>
        <label>
            <input type="checkbox" name="slider_link_target" value="_blank" <?php checked( $link_target, '_blank' ); ?>>
            <?php _e( 'Open link in new tab', 'ashutosh-securities' ); ?>
        </label>
    </p>
    <?php
}

// Save Meta Box Data
function ashutosh_securities_save_slider_meta( $post_id ) {
    // Check nonce
    if ( ! isset( $_POST['ashutosh_securities_slider_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['ashutosh_securities_slider_meta_box_nonce'], 'ashutosh_securities_slider_meta_box' ) ) {
        return;
    }
    // Check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Check permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save link URL
    if ( isset( $_POST['slider_link_url'] ) ) {
        $link_url = esc_url_raw( $_POST['slider_link_url'] );
        update_post_meta( $post_id, '_slider_link_url', $link_url );
    }

    // Save link target
    if ( isset( $_POST['slider_link_target'] ) && $_POST['slider_link_target'] === '_blank' ) {
        update_post_meta( $post_id, '_slider_link_target', '_blank' );
    } else {
        delete_post_meta( $post_id, '_slider_link_target' );
    }
}
add_action( 'save_post_slider', 'ashutosh_securities_save_slider_meta' );

// Shortcode to Display Slider
function ashutosh_securities_display_slider( $atts ) {
    $atts = shortcode_atts( array(
        'category' => '',
        'autoplay' => 'true',
        'interval' => '5000',
        'arrows' => 'true',
        'dots' => 'true',
    ), $atts, 'slider' );

    $args = array(
        'post_type'      => 'slider',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    // Filter by category if specified
    if ( ! empty( $atts['category'] ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'slider_category',
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $atts['category'] ),
            ),
        );
    }

    $sliders = new WP_Query( $args );

    if ( ! $sliders->have_posts() ) {
        return '<p>' . __( 'No slides found.', 'ashutosh-securities' ) . '</p>';
    }

    // Generate unique ID for this slider instance
    $slider_id = 'slider-' . uniqid();

    ob_start();
    ?>
    <div class="ashutosh-slider-wrapper" id="<?php echo esc_attr( $slider_id ); ?>" 
         data-autoplay="<?php echo esc_attr( $atts['autoplay'] ); ?>" 
         data-interval="<?php echo esc_attr( $atts['interval'] ); ?>"
         data-arrows="<?php echo esc_attr( $atts['arrows'] ); ?>"
         data-dots="<?php echo esc_attr( $atts['dots'] ); ?>">
        
        <div class="ashutosh-slider-container">
            <?php
            $slide_count = 0;
            while ( $sliders->have_posts() ) : $sliders->the_post();
                $link_url = get_post_meta( get_the_ID(), '_slider_link_url', true );
                $link_target = get_post_meta( get_the_ID(), '_slider_link_target', true );
                $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                
                if ( ! $thumbnail_url ) {
                    continue;
                }
                
                $active_class = ( $slide_count === 0 ) ? ' active' : '';
                ?>
                <div class="ashutosh-slider-slide<?php echo esc_attr( $active_class ); ?>">
                    <?php if ( ! empty( $link_url ) ) : ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" <?php echo ( $link_target === '_blank' ) ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
                            <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                        </a>
                    <?php else : ?>
                        <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php endif; ?>
                    
                    <?php if ( get_the_title() ) : ?>
                        <div class="ashutosh-slider-caption">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                $slide_count++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <?php if ( $atts['arrows'] === 'true' && $slide_count > 1 ) : ?>
            <button class="ashutosh-slider-prev" aria-label="Previous slide">
                <span class="slider-arrow">‹</span>
            </button>
            <button class="ashutosh-slider-next" aria-label="Next slide">
                <span class="slider-arrow">›</span>
            </button>
        <?php endif; ?>

        <?php if ( $atts['dots'] === 'true' && $slide_count > 1 ) : ?>
            <div class="ashutosh-slider-dots">
                <?php for ( $i = 0; $i < $slide_count; $i++ ) : ?>
                    <button class="ashutosh-slider-dot<?php echo ( $i === 0 ) ? ' active' : ''; ?>" 
                            data-slide="<?php echo $i; ?>" 
                            aria-label="Go to slide <?php echo ( $i + 1 ); ?>"></button>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'slider', 'ashutosh_securities_display_slider' );

// Admin notice for featured image requirement
function ashutosh_securities_slider_admin_notices() {
    $screen = get_current_screen();
    if ( $screen->post_type === 'slider' ) {
        ?>
        <div class="notice notice-info">
            <p><?php _e( '<strong>Important:</strong> Featured Image is required for each slider. The image will be displayed in the slider.', 'ashutosh-securities' ); ?></p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'ashutosh_securities_slider_admin_notices' );

?>