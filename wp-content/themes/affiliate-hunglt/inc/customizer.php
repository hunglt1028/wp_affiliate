<?php
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

}
 
add_action( 'customize_register', 'affiliate_hunglt_news_in_home' );