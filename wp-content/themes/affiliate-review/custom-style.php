<?php

	$affiliate_review_custom_css= "";

	/*----------------------First highlight color-------------------*/

	$affiliate_review_first_color = get_theme_mod('affiliate_review_first_color');

	if($affiliate_review_first_color != false){
		$affiliate_review_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .top-header, .main-navigation ul.sub-menu>li>a:before, #slider .read-btn a, .view-all-btn a:hover, .more-btn a:hover, #comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.pro-button a:hover, #preloader, #footer-2, .scrollup i, .pagination span, .pagination a, .widget_product_search button,affiliate_review,.bradcrumbs a:hover, .bradcrumbs span,.post-categories li a{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_first_color).';';
		$affiliate_review_custom_css .='}';
	}

	if($affiliate_review_first_color != false){
		$affiliate_review_custom_css .='.main-navigation a:hover, .post-main-box h2 a,.post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation a:hover{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_first_color).';';
		$affiliate_review_custom_css .='}';
	}

	if($affiliate_review_first_color != false){
		$affiliate_review_custom_css .='.home-page-header{';
			$affiliate_review_custom_css .='border-bottom-color: '.esc_attr($affiliate_review_first_color).';';
		$affiliate_review_custom_css .='}';
	}

	if($affiliate_review_first_color != false){
		$affiliate_review_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover{';
			$affiliate_review_custom_css .='box-shadow: 0 0 10px '.esc_attr($affiliate_review_first_color).';';
		$affiliate_review_custom_css .='}';
	}

	/*----------------Second highlight color-------------------*/

	$affiliate_review_second_color = get_theme_mod('affiliate_review_second_color');

	if($affiliate_review_second_color != false){
		$affiliate_review_custom_css .='#slider .read-btn a:hover, #slider-inner .vwslideimg_width .vw-slide-cover p, #popular-product .product-box p.product-rating, .view-all-btn a,.more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar h3, .woocommerce span.onsale, .toggle-nav button{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_second_color).';';
		$affiliate_review_custom_css .='}';
	}

	if($affiliate_review_second_color != false){
		$affiliate_review_custom_css .='.copyright a:hover, .post-main-box:hover h2 a, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_second_color).';';
		$affiliate_review_custom_css .='}';
	}

	if($affiliate_review_second_color != false){
		$affiliate_review_custom_css .='#slider-inner .vwslideimg_width .vw-slide-cover p:after, #popular-product .product-box p.product-rating:after{';
			$affiliate_review_custom_css .='border-bottom: '.esc_attr($affiliate_review_second_color).';';
		$affiliate_review_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_width_option','Full Width');
    if($affiliate_review_theme_lay == 'Boxed'){
		$affiliate_review_custom_css .='body{';
			$affiliate_review_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Wide Width'){
		$affiliate_review_custom_css .='body{';
			$affiliate_review_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Full Width'){
		$affiliate_review_custom_css .='body{';
			$affiliate_review_custom_css .='max-width: 100%;';
		$affiliate_review_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_slider_opacity_color','0.7');
	if($affiliate_review_theme_lay == '0'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.1'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.1';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.2'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.2';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.3'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.3';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.4'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.4';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.5'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.5';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.6'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.6';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.7'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.7';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.8'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.8';
		$affiliate_review_custom_css .='}';
		}else if($affiliate_review_theme_lay == '0.9'){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:0.9';
		$affiliate_review_custom_css .='}';
	}

	/*---------------------- Slider Image Overlay ------------------------*/

	$affiliate_review_slider_image_overlay = get_theme_mod('affiliate_review_slider_image_overlay', true);
	if($affiliate_review_slider_image_overlay == false){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='opacity:1;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_slider_image_overlay_color = get_theme_mod('affiliate_review_slider_image_overlay_color', true);
	if($affiliate_review_slider_image_overlay_color != false){
		$affiliate_review_custom_css .='#slider{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_slider_image_overlay_color).';';
		$affiliate_review_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_slider_content_option','Left');
    if($affiliate_review_theme_lay == 'Left'){
		$affiliate_review_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$affiliate_review_custom_css .='text-align:left;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Center'){
		$affiliate_review_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$affiliate_review_custom_css .='text-align:center;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Right'){
		$affiliate_review_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$affiliate_review_custom_css .='text-align: right;';
		$affiliate_review_custom_css .='}';
	}

	/*------------------ Slider Height ------------*/
	$affiliate_review_slider_height = get_theme_mod('affiliate_review_slider_height');
	if($affiliate_review_slider_height != false){
		$affiliate_review_custom_css .='#slider img{';
			$affiliate_review_custom_css .='height: '.esc_attr($affiliate_review_slider_height).';';
		$affiliate_review_custom_css .='}';
	}

	/*------------- Slider ------------*/

	$affiliate_review_slider = get_theme_mod('affiliate_review_slider_hide_show', false);
	if($affiliate_review_slider == false){
		$affiliate_review_custom_css .='.page-template-custom-home-page .main-header{';
			$affiliate_review_custom_css .='position: static;';
		$affiliate_review_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$affiliate_review_resp_slider = get_theme_mod( 'affiliate_review_resp_slider_hide_show',false);
	if($affiliate_review_resp_slider == true && get_theme_mod( 'affiliate_review_slider_hide_show', false) == false){
    	$affiliate_review_custom_css .='#slider{';
			$affiliate_review_custom_css .='display:none;';
		$affiliate_review_custom_css .='} ';
	}
    if($affiliate_review_resp_slider == true){
    	$affiliate_review_custom_css .='@media screen and (max-width:575px) {';
		$affiliate_review_custom_css .='#slider{';
			$affiliate_review_custom_css .='display:block;';
		$affiliate_review_custom_css .='} }';
	}else if($affiliate_review_resp_slider == false){
		$affiliate_review_custom_css .='@media screen and (max-width:575px) {';
		$affiliate_review_custom_css .='#slider{';
			$affiliate_review_custom_css .='display:none;';
		$affiliate_review_custom_css .='} }';
		$affiliate_review_custom_css .='@media screen and (max-width:575px){';
		$affiliate_review_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$affiliate_review_custom_css .='margin-top: 45px;';
		$affiliate_review_custom_css .='} }';
	}

	$affiliate_review_resp_sidebar = get_theme_mod( 'affiliate_review_sidebar_hide_show',true);
    if($affiliate_review_resp_sidebar == true){
    	$affiliate_review_custom_css .='@media screen and (max-width:575px) {';
		$affiliate_review_custom_css .='#sidebar{';
			$affiliate_review_custom_css .='display:block;';
		$affiliate_review_custom_css .='} }';
	}else if($affiliate_review_resp_sidebar == false){
		$affiliate_review_custom_css .='@media screen and (max-width:575px) {';
		$affiliate_review_custom_css .='#sidebar{';
			$affiliate_review_custom_css .='display:none;';
		$affiliate_review_custom_css .='} }';
	}

	$affiliate_review_resp_scroll_top = get_theme_mod( 'affiliate_review_resp_scroll_top_hide_show',true);
	if($affiliate_review_resp_scroll_top == true && get_theme_mod( 'affiliate_review_hide_show_scroll',true) == false){
    	$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='visibility:hidden !important;';
		$affiliate_review_custom_css .='} ';
	}
    if($affiliate_review_resp_scroll_top == true){
    	$affiliate_review_custom_css .='@media screen and (max-width:575px) {';
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='visibility:visible !important;';
		$affiliate_review_custom_css .='} }';
	}else if($affiliate_review_resp_scroll_top == false){
		$affiliate_review_custom_css .='@media screen and (max-width:575px){';
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='visibility:hidden !important;';
		$affiliate_review_custom_css .='} }';
	}

	$affiliate_review_resp_menu_toggle_btn_bg_color = get_theme_mod('affiliate_review_resp_menu_toggle_btn_bg_color');
	if($affiliate_review_resp_menu_toggle_btn_bg_color != false){
		$affiliate_review_custom_css .='.toggle-nav button{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_resp_menu_toggle_btn_bg_color).';';
		$affiliate_review_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$affiliate_review_button_padding_top_bottom = get_theme_mod('affiliate_review_button_padding_top_bottom');
	$affiliate_review_button_padding_left_right = get_theme_mod('affiliate_review_button_padding_left_right');
	if($affiliate_review_button_padding_top_bottom != false || $affiliate_review_button_padding_left_right != false){
		$affiliate_review_custom_css .='.post-main-box .more-btn a{';
			$affiliate_review_custom_css .='padding-top: '.esc_attr($affiliate_review_button_padding_top_bottom).'!important; padding-bottom: '.esc_attr($affiliate_review_button_padding_top_bottom).'!important;padding-left: '.esc_attr($affiliate_review_button_padding_left_right).'!important;padding-right: '.esc_attr($affiliate_review_button_padding_left_right).'!important;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_button_border_radius = get_theme_mod('affiliate_review_button_border_radius');
	if($affiliate_review_button_border_radius != false){
		$affiliate_review_custom_css .='.post-main-box .more-btn a{';
			$affiliate_review_custom_css .='border-radius: '.esc_attr($affiliate_review_button_border_radius).'px;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_button_font_size = get_theme_mod('affiliate_review_button_font_size',14);
	$affiliate_review_custom_css .='.post-main-box .more-btn a{';
		$affiliate_review_custom_css .='font-size: '.esc_attr($affiliate_review_button_font_size).';';
	$affiliate_review_custom_css .='}';

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_button_text_transform','Uppercase');
	if($affiliate_review_theme_lay == 'Capitalize'){
		$affiliate_review_custom_css .='.post-main-box .more-btn a{';
			$affiliate_review_custom_css .='text-transform:Capitalize;';
		$affiliate_review_custom_css .='}';
	}
	if($affiliate_review_theme_lay == 'Lowercase'){
		$affiliate_review_custom_css .='.post-main-box .more-btn a{';
			$affiliate_review_custom_css .='text-transform:Lowercase;';
		$affiliate_review_custom_css .='}';
	}
	if($affiliate_review_theme_lay == 'Uppercase'){
		$affiliate_review_custom_css .='.post-main-box .more-btn a{';
			$affiliate_review_custom_css .='text-transform:Uppercase;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_button_letter_spacing = get_theme_mod('affiliate_review_button_letter_spacing',14);
	$affiliate_review_custom_css .='.more-btn a{';
		$affiliate_review_custom_css .='letter-spacing: '.esc_attr($affiliate_review_button_letter_spacing).';';
	$affiliate_review_custom_css .='}';


	/*---------------- Single post Settings ------------------*/

	$affiliate_review_single_blog_comment_title = get_theme_mod('affiliate_review_single_blog_comment_title', 'Leave a Reply');
	if($affiliate_review_single_blog_comment_title == ''){
		$affiliate_review_custom_css .='#comments h2#reply-title {';
			$affiliate_review_custom_css .='display: none;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_single_blog_comment_button_text = get_theme_mod('affiliate_review_single_blog_comment_button_text', 'Post Comment');
	if($affiliate_review_single_blog_comment_button_text == ''){
		$affiliate_review_custom_css .='#comments p.form-submit {';
			$affiliate_review_custom_css .='display: none;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_comment_width = get_theme_mod('affiliate_review_single_blog_comment_width');
	if($affiliate_review_comment_width != false){
		$affiliate_review_custom_css .='#comments textarea{';
			$affiliate_review_custom_css .='width: '.esc_attr($affiliate_review_comment_width).';';
		$affiliate_review_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_blog_layout_option','Default');
    if($affiliate_review_theme_lay == 'Default'){
		$affiliate_review_custom_css .='.post-main-box{';
			$affiliate_review_custom_css .='';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Center'){
		$affiliate_review_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$affiliate_review_custom_css .='text-align:center;';
		$affiliate_review_custom_css .='}';
		$affiliate_review_custom_css .='.post-info{';
			$affiliate_review_custom_css .='margin-top:10px;';
		$affiliate_review_custom_css .='}';
		$affiliate_review_custom_css .='.post-info hr{';
			$affiliate_review_custom_css .='margin:15px auto;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_theme_lay == 'Left'){
		$affiliate_review_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$affiliate_review_custom_css .='text-align:Left;';
		$affiliate_review_custom_css .='}';
		$affiliate_review_custom_css .='.post-info hr{';
			$affiliate_review_custom_css .='margin-bottom:10px;';
		$affiliate_review_custom_css .='}';
		$affiliate_review_custom_css .='.post-main-box h2{';
			$affiliate_review_custom_css .='margin-top:10px;';
		$affiliate_review_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$affiliate_review_blog_page_posts_settings = get_theme_mod( 'affiliate_review_blog_page_posts_settings','Into Blocks');
		if($affiliate_review_blog_page_posts_settings == 'Without Blocks'){
		$affiliate_review_custom_css .='.post-main-box{';
			$affiliate_review_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$affiliate_review_custom_css .='}';
	}

	// featured image dimention
	$affiliate_review_blog_post_featured_image_dimension = get_theme_mod('affiliate_review_blog_post_featured_image_dimension', 'default');
	$affiliate_review_blog_post_featured_image_custom_width = get_theme_mod('affiliate_review_blog_post_featured_image_custom_width',250);
	$affiliate_review_blog_post_featured_image_custom_height = get_theme_mod('affiliate_review_blog_post_featured_image_custom_height',250);
	if($affiliate_review_blog_post_featured_image_dimension == 'custom'){
		$affiliate_review_custom_css .='.post-main-box img{';
			$affiliate_review_custom_css .='width: '.esc_attr($affiliate_review_blog_post_featured_image_custom_width).'; height: '.esc_attr($affiliate_review_blog_post_featured_image_custom_height).';';
		$affiliate_review_custom_css .='}';
	}
		$affiliate_review_featured_img_border_radius = get_theme_mod('affiliate_review_featured_image_border_radius');
	if($affiliate_review_featured_img_border_radius != false){
		$affiliate_review_custom_css .='.post-main-box img, .feature-box img, #content-vw img{';
			$affiliate_review_custom_css .='border-radius: '.esc_attr($affiliate_review_featured_img_border_radius).'px;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_featured_image_box_shadow = get_theme_mod('affiliate_review_featured_image_box_shadow',0);
	if($affiliate_review_featured_image_box_shadow != false){
		$affiliate_review_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$affiliate_review_custom_css .='box-shadow: '.esc_attr($affiliate_review_featured_image_box_shadow).'px '.esc_attr($affiliate_review_featured_image_box_shadow).'px '.esc_attr($affiliate_review_featured_image_box_shadow).'px #cccccc;';
		$affiliate_review_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$affiliate_review_footer_padding = get_theme_mod('affiliate_review_footer_padding');
	if($affiliate_review_footer_padding != false){
		$affiliate_review_custom_css .='#footer{';
			$affiliate_review_custom_css .='padding: '.esc_attr($affiliate_review_footer_padding).' 0;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_footer_widgets_heading = get_theme_mod( 'affiliate_review_footer_widgets_heading','Left');
    if($affiliate_review_footer_widgets_heading == 'Left'){
		$affiliate_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$affiliate_review_custom_css .='text-align: left;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_footer_widgets_heading == 'Center'){
		$affiliate_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$affiliate_review_custom_css .='text-align: center;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_footer_widgets_heading == 'Right'){
		$affiliate_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$affiliate_review_custom_css .='text-align: right;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_footer_widgets_content = get_theme_mod( 'affiliate_review_footer_widgets_content','Left');
    if($affiliate_review_footer_widgets_content == 'Left'){
		$affiliate_review_custom_css .='#footer .widget{';
		$affiliate_review_custom_css .='text-align: left;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_footer_widgets_content == 'Center'){
		$affiliate_review_custom_css .='#footer .widget{';
			$affiliate_review_custom_css .='text-align: center;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_footer_widgets_content == 'Right'){
		$affiliate_review_custom_css .='#footer .widget{';
			$affiliate_review_custom_css .='text-align: right;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_copyright_alingment = get_theme_mod('affiliate_review_copyright_alingment');
	if($affiliate_review_copyright_alingment != false){
		$affiliate_review_custom_css .='.copyright p{';
			$affiliate_review_custom_css .='text-align: '.esc_attr($affiliate_review_copyright_alingment).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_footer_icon = get_theme_mod('affiliate_review_footer_icon');
	if($affiliate_review_footer_icon == false){
		$affiliate_review_custom_css .='.copyright p{';
			$affiliate_review_custom_css .='width:100%; text-align:center; float:none;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_footer_background_image = get_theme_mod('affiliate_review_footer_background_image');
	if($affiliate_review_footer_background_image != false){
		$affiliate_review_custom_css .='#footer{';
			$affiliate_review_custom_css .='background: url('.esc_attr($affiliate_review_footer_background_image).');';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_img_footer','scroll');
	if($affiliate_review_theme_lay == 'fixed'){
		$affiliate_review_custom_css .='#footer{';
			$affiliate_review_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$affiliate_review_custom_css .='}';
	}elseif ($affiliate_review_theme_lay == 'scroll'){
		$affiliate_review_custom_css .='#footer{';
			$affiliate_review_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_footer_background_color = get_theme_mod('affiliate_review_footer_background_color');
	if($affiliate_review_footer_background_color != false){
		$affiliate_review_custom_css .='#footer{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_footer_background_color).';';
		$affiliate_review_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$affiliate_review_logo_padding = get_theme_mod('affiliate_review_logo_padding');
	if($affiliate_review_logo_padding != false){
		$affiliate_review_custom_css .='.main-header .logo{';
			$affiliate_review_custom_css .='padding: '.esc_attr($affiliate_review_logo_padding).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_logo_margin = get_theme_mod('affiliate_review_logo_margin');
	if($affiliate_review_logo_margin != false){
		$affiliate_review_custom_css .='.main-header .logo{';
			$affiliate_review_custom_css .='margin: '.esc_attr($affiliate_review_logo_margin).';';
		$affiliate_review_custom_css .='}';
	}

	// Site title Font Size
	$affiliate_review_site_title_font_size = get_theme_mod('affiliate_review_site_title_font_size');
	if($affiliate_review_site_title_font_size != false){
		$affiliate_review_custom_css .='.logo h1, .logo p.site-title{';
			$affiliate_review_custom_css .='font-size: '.esc_attr($affiliate_review_site_title_font_size).';';
		$affiliate_review_custom_css .='}';
	}

	// Site tagline Font Size
	$affiliate_review_site_tagline_font_size = get_theme_mod('affiliate_review_site_tagline_font_size');
	if($affiliate_review_site_tagline_font_size != false){
		$affiliate_review_custom_css .='.logo p.site-description{';
			$affiliate_review_custom_css .='font-size: '.esc_attr($affiliate_review_site_tagline_font_size).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_header_menus_color = get_theme_mod('affiliate_review_header_menus_color');
	if($affiliate_review_header_menus_color != false){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_header_menus_color).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_header_menus_hover_color = get_theme_mod('affiliate_review_header_menus_hover_color');
	if($affiliate_review_header_menus_hover_color != false){
		$affiliate_review_custom_css .='.main-navigation a:hover{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_header_menus_hover_color).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_header_submenus_color = get_theme_mod('affiliate_review_header_submenus_color');
	if($affiliate_review_header_submenus_color != false){
		$affiliate_review_custom_css .='.main-navigation ul ul a{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_header_submenus_color).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_header_submenus_hover_color = get_theme_mod('affiliate_review_header_submenus_hover_color');
	if($affiliate_review_header_submenus_hover_color != false){
		$affiliate_review_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$affiliate_review_custom_css .='color: '.esc_attr($affiliate_review_header_submenus_hover_color).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_menus_item = get_theme_mod( 'affiliate_review_menus_item_style','None');
    if($affiliate_review_menus_item == 'None'){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_menus_item == 'Zoom In'){
		$affiliate_review_custom_css .='.main-navigation a:hover{';
			$affiliate_review_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#000;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_navigation_menu_font_size = get_theme_mod('affiliate_review_navigation_menu_font_size');
	if($affiliate_review_navigation_menu_font_size != false){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='font-size: '.esc_attr($affiliate_review_navigation_menu_font_size).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_navigation_menu_font_weight = get_theme_mod('affiliate_review_navigation_menu_font_weight','500');
	if($affiliate_review_navigation_menu_font_weight != false){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='font-weight: '.esc_attr($affiliate_review_navigation_menu_font_weight).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_menu_text_transform','Capitalize');
	if($affiliate_review_theme_lay == 'Capitalize'){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='text-transform:Capitalize;';
		$affiliate_review_custom_css .='}';
	}
	if($affiliate_review_theme_lay == 'Lowercase'){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='text-transform:Lowercase;';
		$affiliate_review_custom_css .='}';
	}
	if($affiliate_review_theme_lay == 'Uppercase'){
		$affiliate_review_custom_css .='.main-navigation a{';
			$affiliate_review_custom_css .='text-transform:Uppercase;';
		$affiliate_review_custom_css .='}';
	}


	/*---------------- Preloader Background Color  -------------------*/

	$affiliate_review_preloader_bg_color = get_theme_mod('affiliate_review_preloader_bg_color');
	if($affiliate_review_preloader_bg_color != false){
		$affiliate_review_custom_css .='#preloader{';
			$affiliate_review_custom_css .='background-color: '.esc_attr($affiliate_review_preloader_bg_color).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_preloader_border_color = get_theme_mod('affiliate_review_preloader_border_color');
	if($affiliate_review_preloader_border_color != false){
		$affiliate_review_custom_css .='.loader-line{';
			$affiliate_review_custom_css .='border-color: '.esc_attr($affiliate_review_preloader_border_color).'!important;';
		$affiliate_review_custom_css .='}';
	}

	/*---------------- Woocommerce Settings  -------------------*/ 

	$affiliate_review_related_product_show_hide = get_theme_mod('affiliate_review_related_product_show_hide',true);
	if($affiliate_review_related_product_show_hide != true){
		$affiliate_review_custom_css .='.related.products{';
			$affiliate_review_custom_css .='display: none;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_products_btn_padding_top_bottom = get_theme_mod('affiliate_review_products_btn_padding_top_bottom');
	if($affiliate_review_products_btn_padding_top_bottom != false){
		$affiliate_review_custom_css .='.woocommerce a.button{';
			$affiliate_review_custom_css .='padding-top: '.esc_attr($affiliate_review_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($affiliate_review_products_btn_padding_top_bottom).' !important;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_products_btn_padding_left_right = get_theme_mod('affiliate_review_products_btn_padding_left_right');
	if($affiliate_review_products_btn_padding_left_right != false){
		$affiliate_review_custom_css .='.woocommerce a.button{';
			$affiliate_review_custom_css .='padding-left: '.esc_attr($affiliate_review_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($affiliate_review_products_btn_padding_left_right).' !important;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_woocommerce_sale_position = get_theme_mod( 'affiliate_review_woocommerce_sale_position','left');
    if($affiliate_review_woocommerce_sale_position == 'left'){
		$affiliate_review_custom_css .='.woocommerce ul.products li.product .onsale{';
			$affiliate_review_custom_css .='left: -10px; right: auto;';
		$affiliate_review_custom_css .='}';
	}else if($affiliate_review_woocommerce_sale_position == 'right'){
		$affiliate_review_custom_css .='.woocommerce ul.products li.product .onsale{';
			$affiliate_review_custom_css .='left: auto !important; right: 15px !important;';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_single_blog_post_navigation_show_hide = get_theme_mod('affiliate_review_single_blog_post_navigation_show_hide',true);
	if($affiliate_review_single_blog_post_navigation_show_hide != true){
		$affiliate_review_custom_css .='.post-navigation{';
			$affiliate_review_custom_css .='display: none;';
		$affiliate_review_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$affiliate_review_scroll_to_top_font_size = get_theme_mod('affiliate_review_scroll_to_top_font_size');
	if($affiliate_review_scroll_to_top_font_size != false){
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='font-size: '.esc_attr($affiliate_review_scroll_to_top_font_size).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_scroll_to_top_padding = get_theme_mod('affiliate_review_scroll_to_top_padding');
	$affiliate_review_scroll_to_top_padding = get_theme_mod('affiliate_review_scroll_to_top_padding');
	if($affiliate_review_scroll_to_top_padding != false){
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='padding-top: '.esc_attr($affiliate_review_scroll_to_top_padding).';padding-bottom: '.esc_attr($affiliate_review_scroll_to_top_padding).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_scroll_to_top_width = get_theme_mod('affiliate_review_scroll_to_top_width');
	if($affiliate_review_scroll_to_top_width != false){
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='width: '.esc_attr($affiliate_review_scroll_to_top_width).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_scroll_to_top_height = get_theme_mod('affiliate_review_scroll_to_top_height');
	if($affiliate_review_scroll_to_top_height != false){
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='height: '.esc_attr($affiliate_review_scroll_to_top_height).';';
		$affiliate_review_custom_css .='}';
	}

	$affiliate_review_scroll_to_top_border_radius = get_theme_mod('affiliate_review_scroll_to_top_border_radius');
	if($affiliate_review_scroll_to_top_border_radius != false){
		$affiliate_review_custom_css .='.scrollup i{';
			$affiliate_review_custom_css .='border-radius: '.esc_attr($affiliate_review_scroll_to_top_border_radius).'px;';
		$affiliate_review_custom_css .='}';
	}

