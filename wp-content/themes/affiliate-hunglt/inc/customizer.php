<?php
// Tạo phần tử Customizer
function affiliate_hunglt_customize_register( $wp_customize ) {
    // Đăng ký section để chứa control của bạn
  
	$wp_customize->add_section( 'affiliate_slide_section', array(
		'title' => __( 'Slide ảnh', 'affiliate_hunglt' ),
		'priority' => 30
	) );

	// Thêm setting cho slide image
	$wp_customize->add_setting( 'affiliate_slide_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	// Thêm control để upload ảnh slide
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'affiliate_slide_image_control', array(
		'label'    => __( 'Ảnh slide', 'affiliate_hunglt' ),
		'section'  => 'affiliate_slide_section',
		'settings' => 'affiliate_slide_image',
		'priority' => 10
	) ) );
    // Thêm setting cho bật tắt slide
    $wp_customize->add_setting( 'affiliate_slide_enable', array(
        'default' => false,
        'sanitize_callback' => 'absint'
    ) );
 
    // Thêm control để bật tắt slide
    $wp_customize->add_control( 'affiliate_slide_enable_control', array(
        'type'     => 'checkbox',
        'label'    => __( 'Bật/ Tắt', 'affiliate_hunglt' ),
        'section'  => 'affiliate_slide_section',
        'settings' => 'affiliate_slide_enable',
    ) );
}
 
add_action( 'customize_register', 'affiliate_hunglt_customize_register' );