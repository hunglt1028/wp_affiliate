<?php
/**
 * @package Affiliate Review
 * Setup the WordPress core custom header feature.
 *
 * @uses affiliate_review_header_style()
*/
function affiliate_review_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'affiliate_review_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 75,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'affiliate_review_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'affiliate_review_custom_header_setup' );

if ( ! function_exists( 'affiliate_review_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see affiliate_review_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'affiliate_review_header_style' );

function affiliate_review_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'affiliate-review-basic-style', $custom_css );
	endif;
}
endif;