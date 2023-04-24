<?php
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/walker_nav_menu.php';
// Đăng ký và enque các tệp CSS và JavaScript
function mytheme_enqueue_styles()
{
    
    wp_enqueue_style('style-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',array(),'6.2.2');
    wp_enqueue_style('style-bootstrap-icons', get_template_directory_uri() . '/assets/css/bootstrap-icons.css',array(),'6.2.2');
    wp_enqueue_style('style', get_stylesheet_uri(),array(),'6.2.2');
    wp_enqueue_script('script-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array(), '1.0.0', true);
    wp_enqueue_script('script-click-scroll', get_template_directory_uri() . '/assets/js/click-scroll.js', array(), '1.0.0', true);
    wp_enqueue_script('script-counter', get_template_directory_uri() . '/assets/js/counter.js', array(), '1.0.0', true);
    wp_enqueue_script('script-custome', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

//Tắt load file CSS của theme mặc định
function disable_default_styles() {
    // Deregister all default styles
    wp_deregister_style( 'wp-block-library' );
    wp_deregister_style( 'wp-block-library-theme' );
    wp_deregister_style( 'wc-block-style' );
    wp_deregister_style( 'storefront-style' );
    wp_deregister_style( 'storefront-woocommerce-style' );
    wp_deregister_style( 'classic-theme-styles' );
    wp_deregister_style( 'global-styles-inline' );
}

add_action( 'wp_enqueue_scripts', 'disable_default_styles', 999 );

//Tắt load js emoji
function remove_emoji_script() {
    wp_dequeue_script('wp-emoji-release');
}
add_action('wp_enqueue_scripts', 'remove_emoji_script');
// Thêm hỗ trợ cho các tiện ích widget
function mytheme_widgets_init()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'mytheme'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'mytheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');

/* Theme Setup */
if ( ! function_exists( 'affiliate_review_setup' ) ) :

    function affiliate_review_setup() {
    
        $GLOBALS['content_width'] = apply_filters( 'affiliate_review_content_width', 640 );
    
        load_theme_textdomain( 'affiliate-review', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-slider' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
        add_theme_support( 'custom-logo', array(
            'flex-height' => false,
        ) );
        add_image_size('affiliate-review-homepage-thumb',240,145,true);
    
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'affiliate-review' ),
        ) );
    
        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff'
        ) );
    
        //selective refresh for sidebar and widgets
        add_theme_support( 'customize-selective-refresh-widgets' );
    
        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
        
    
        // Theme Activation Notice
        global $pagenow;
    
        if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
            add_action('admin_notices', 'affiliate_review_activation_notice');
        }
    
        // Theme Activation Redirects To Get Started Page
        if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated']) && wp_get_theme()->get('TextDomain') === 'affiliate-review') {
            wp_redirect(admin_url('themes.php?page=affiliate_review_guide'));
        }
    }
endif;

add_action( 'after_setup_theme', 'affiliate_review_setup' );


function my_customizer_settings( $wp_customize ) {
    $wp_customize->add_setting( 'enable_slide', array(
        'default'           => false,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'enable_slide', array(
        'type'        => 'checkbox',
        'label'       => esc_html__( 'Enable Slide', 'textdomain' ),
        'section'     => 'your_section',
        'priority'    => 10,
    ) );
}
add_action( 'customize_register', 'my_customizer_settings' );