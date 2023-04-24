<?php
require_once 'custom_multiselect_control.php';
// Tạo phần tử Customizer
function affiliate_hunglt_news_in_home( $wp_customize ) {
    // Đăng ký section để chứa control của bạn
  
	$wp_customize->add_section( 'affiliate_news_section', array(
		'title' => __( 'Tin tức trang chủ', 'affiliate_hunglt' ),
		'priority' => 30
	) );

    $wp_customize->add_setting( 'selected_categories', array(
        'default' => array(),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Lấy danh sách các danh mục bài viết
    $categories = get_categories();
    $choices = array();
    foreach ( $categories as $category ) {
        $choices[ $category->term_id ] = $category->name;
    }

    // Tạo control
    $wp_customize->add_control( new Custom_Multiselect_Control( $wp_customize, 'selected_categories', array(
        'label' => __( 'Chọn danh mục', 'affiliate_hunglt' ),
        'section' => 'affiliate_news_section',
        'settings' => 'selected_categories',
        'type' => 'select', // Loại control là multicheck
        'choices' =>  $choices,
    ) ) );
    
}
 
add_action( 'customize_register', 'affiliate_hunglt_news_in_home' );