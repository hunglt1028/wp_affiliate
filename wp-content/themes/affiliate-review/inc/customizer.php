<?php
/**
 * Affiliate Review Theme Customizer
 *
 * @package Affiliate Review
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function affiliate_review_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'affiliate_review_custom_controls' );

function affiliate_review_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'affiliate_review_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'affiliate_review_Customize_partial_blogdescription',
	));

	//Homepage Settings
	$wp_customize->add_panel( 'affiliate_review_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_panel_id',
		'priority' => 20,
	));

	// Top Bar
	$wp_customize->add_section( 'affiliate_review_topbar' , array(
    	'title' => esc_html__( 'Top Bar', 'affiliate-review' ),
    	'priority' => 10,
			'panel' => 'affiliate_review_homepage_panel'
	) );

	$wp_customize->add_setting('affiliate_review_topbar_text1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_topbar_text1',array(
		'label'	=> esc_html__('Add Topbar Text 1','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Millions of unbiased reviews. Trusted by users.', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_topbar_text2',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_topbar_text2',array(
		'label'	=> esc_html__('Add Topbar Text 2','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'For Companies and Businesses', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_topbar',
		'type'=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section( 'affiliate_review_menu_section' , array(
    	'title' => __( 'Menus Settings', 'affiliate-review' ),
    	'priority'	=>	10,
		'panel' => 'affiliate_review_homepage_panel'
	) );

	$wp_customize->add_setting('affiliate_review_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_navigation_menu_font_weight',array(
        'default' => 500,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','affiliate-review'),
        'section' => 'affiliate_review_menu_section',
        'choices' => array(
        	'100' => __('100','affiliate-review'),
            '200' => __('200','affiliate-review'),
            '300' => __('300','affiliate-review'),
            '400' => __('400','affiliate-review'),
            '500' => __('500','affiliate-review'),
            '600' => __('600','affiliate-review'),
            '700' => __('700','affiliate-review'),
            '800' => __('800','affiliate-review'),
            '900' => __('900','affiliate-review'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('affiliate_review_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','affiliate-review'),
		'choices' => array(
            'Uppercase' => __('Uppercase','affiliate-review'),
            'Capitalize' => __('Capitalize','affiliate-review'),
            'Lowercase' => __('Lowercase','affiliate-review'),
        ),
		'section'=> 'affiliate_review_menu_section',
	));

	$wp_customize->add_setting('affiliate_review_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_menus_item_style',array(
        'type' => 'select',
        'section' => 'affiliate_review_menu_section',
		'label' => __('Menu Item Hover Style','affiliate-review'),
		'choices' => array(
            'None' => __('None','affiliate-review'),
            'Zoom In' => __('Zoom In','affiliate-review'),
        ),
	) );

	$wp_customize->add_setting('affiliate_review_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_header_menus_color', array(
		'label'    => __('Menus Color', 'affiliate-review'),
		'section'  => 'affiliate_review_menu_section',
	)));

	$wp_customize->add_setting('affiliate_review_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'affiliate-review'),
		'section'  => 'affiliate_review_menu_section',
	)));

	$wp_customize->add_setting('affiliate_review_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'affiliate-review'),
		'section'  => 'affiliate_review_menu_section',
	)));

	$wp_customize->add_setting('affiliate_review_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'affiliate-review'),
		'section'  => 'affiliate_review_menu_section',
	)));

	//Social
	$wp_customize->add_section(
		'affiliate_review_social_links', array(
			'title'		=>	__('Social Links', 'affiliate-review'),
			'priority'	=>	10,
			'panel'		=>	'affiliate_review_homepage_panel'
		)
	);

	$wp_customize->add_setting('affiliate_review_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_social_icons',array(
		'label' =>  __('Steps to setup social icons','affiliate-review'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Top Header Social Icons Widget area.</p>
			<p>3. Add social icons url and save.</p>','affiliate-review'),
		'section'=> 'affiliate_review_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('affiliate_review_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'affiliate_review_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'affiliate_review_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'affiliate-review' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/affiliate-review-wordpress-theme/">GO PRO</a>','affiliate-review'),
		'panel' => 'affiliate_review_homepage_panel'
	) );

	$wp_customize->add_setting( 'affiliate_review_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
 	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','affiliate-review' ),
      'section' => 'affiliate_review_slidersettings'
    )));

    	$wp_customize->add_setting('affiliate_review_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	) );
	$wp_customize->add_control('affiliate_review_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','affiliate-review'),
        'section' => 'affiliate_review_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','affiliate-review'),
            'Advance slider' => __('Advance slider','affiliate-review'),
        ),
	));

	$wp_customize->add_setting('affiliate_review_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','affiliate-review'),
		'section'=> 'affiliate_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'affiliate_review_advance_slider'
	));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('affiliate_review_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'affiliate_review_customize_partial_affiliate_review_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'affiliate_review_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'affiliate_review_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'affiliate_review_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'affiliate-review' ),
			'description' => __('Slider image size (1500 x 600)','affiliate-review'),
			'section'  => 'affiliate_review_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'affiliate_review_default_slider'
		) );

		$wp_customize->add_setting('affiliate_review_slider_review' . $count,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('affiliate_review_slider_review' . $count,array(
			'label'	=> esc_html__('Add Review Number','affiliate-review') . $count,
			'input_attrs' => array(
	            'placeholder' => esc_html__( '4.5', 'affiliate-review' ),
	        ),
			'section'=> 'affiliate_review_slidersettings',
			'type'=> 'text',
			'active_callback' => 'affiliate_review_default_slider'
		));
	}

	$wp_customize->add_setting( 'affiliate_review_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','affiliate-review' ),
		'section' => 'affiliate_review_slidersettings',
		'active_callback' => 'affiliate_review_default_slider'
    )));

	//content layout
	$wp_customize->add_setting('affiliate_review_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control(new Affiliate_Review_Image_Radio_Control($wp_customize, 'affiliate_review_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','affiliate-review'),
        'section' => 'affiliate_review_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
      	'active_callback' => 'affiliate_review_default_slider'
    )));

   //Slider excerpt
	$wp_customize->add_setting( 'affiliate_review_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'affiliate_review_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','affiliate-review' ),
		'section'     => 'affiliate_review_slidersettings',
		'type'        => 'range',
		'settings'    => 'affiliate_review_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
	  	),
		'active_callback' => 'affiliate_review_default_slider'
	));

	//Slider height
	$wp_customize->add_setting('affiliate_review_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_slider_height',array(
		'label'	=> __('Slider Height','affiliate-review'),
		'description'	=> __('Specify the slider height (px).','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'affiliate_review_default_slider'
		)
	);

	$wp_customize->add_setting( 'affiliate_review_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'affiliate_review_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','affiliate-review'),
		'section' => 'affiliate_review_slidersettings',
		'type'  => 'text',
		'active_callback' => 'affiliate_review_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('affiliate_review_slider_opacity_color',array(
		'default'              => 0.7,
		'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));

	$wp_customize->add_control( 'affiliate_review_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','affiliate-review' ),
		'section'     => 'affiliate_review_slidersettings',
		'type'        => 'select',
		'settings'    => 'affiliate_review_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','affiliate-review'),
			'0.1' =>  esc_attr('0.1','affiliate-review'),
			'0.2' =>  esc_attr('0.2','affiliate-review'),
			'0.3' =>  esc_attr('0.3','affiliate-review'),
			'0.4' =>  esc_attr('0.4','affiliate-review'),
			'0.5' =>  esc_attr('0.5','affiliate-review'),
			'0.6' =>  esc_attr('0.6','affiliate-review'),
			'0.7' =>  esc_attr('0.7','affiliate-review'),
			'0.8' =>  esc_attr('0.8','affiliate-review'),
			'0.9' =>  esc_attr('0.9','affiliate-review')
		),
		'active_callback' => 'affiliate_review_default_slider'
	));

	$wp_customize->add_setting( 'affiliate_review_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'affiliate_review_switch_sanitization'
   ));
   $wp_customize->add_control( new affiliate_review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_slider_image_overlay',array(
      	'label' => esc_html__( 'Slider Image Overlay','affiliate-review' ),
      	'section' => 'affiliate_review_slidersettings',
      	'active_callback' => 'affiliate_review_default_slider'
   )));

   $wp_customize->add_setting('affiliate_review_slider_image_overlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'affiliate-review'),
		'section'  => 'affiliate_review_slidersettings',
		'active_callback' => 'affiliate_review_default_slider'
	)));

	//Brands Section
	$wp_customize->add_section('affiliate_review_brand_section', array(
		'title'       => __('Brands Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_brand_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_brand_text',array(
		'description' => __('<p>1. More options for brand section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for brand section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_brand_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_brand_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_brand_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_brand_section',
		'type'=> 'hidden'
	));

	//Popular Categories Section
	$wp_customize->add_section('affiliate_review_popular_cat_section', array(
		'title'       => __('Popular Categories Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_popular_cat_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_popular_cat_text',array(
		'description' => __('<p>1. More options for popular categories section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for popular categories section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_popular_cat_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_popular_cat_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_popular_cat_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_popular_cat_section',
		'type'=> 'hidden'
	));

	//About Section
	$wp_customize->add_section('affiliate_review_about_section', array(
		'title'       => __('About Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_about_text',array(
		'description' => __('<p>1. More options for about section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_about_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_about_section',
		'type'=> 'hidden'
	));

	//Recent Launches Section
	$wp_customize->add_section('affiliate_review_recent_launches_section', array(
		'title'       => __('Recent Launches Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_recent_launch_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_recent_launch_text',array(
		'description' => __('<p>1. More options for recent launch section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for recent launch section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_recent_launches_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_recent_launch_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_recent_launch_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_recent_launches_section',
		'type'=> 'hidden'
	));

	// Popular Products Section
	$wp_customize->add_section('affiliate_review_popular_products',array(
		'title'	=> __('Popular Products','affiliate-review'),
		'description' => __('For more options of the popular product section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/affiliate-review-wordpress-theme/">GO PRO</a>','affiliate-review'),
		'panel' => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting( 'affiliate_review_section_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'affiliate_review_section_title', array(
		'label'    => __( 'Add Section Title', 'affiliate-review' ),
		'input_attrs' => array(
            'placeholder' => __( 'Top Popular Reviews', 'affiliate-review' ),
        ),
		'section'  => 'affiliate_review_popular_products',
		'type'     => 'text'
	) );

	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('affiliate_review_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'affiliate_review_sanitize_choices',
	));
	$wp_customize->add_control('affiliate_review_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Popular Product Category','affiliate-review'),
		'section' => 'affiliate_review_popular_products',
	));

	//Top Contributors Section
	$wp_customize->add_section('affiliate_review_top_contributers_section', array(
		'title'       => __('Top Contributors Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_top_contributers_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_top_contributers_text',array(
		'description' => __('<p>1. More options for top contributors section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for top contributors section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_top_contributers_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_top_contributers_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_top_contributers_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_top_contributers_section',
		'type'=> 'hidden'
	));

	//Testimonials Section
	$wp_customize->add_section('affiliate_review_testimonials_section', array(
		'title'       => __('Testimonials Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_testimonials_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_testimonials_section',
		'type'=> 'hidden'
	));

	//Subscribe Section
	$wp_customize->add_section('affiliate_review_subscribe_section', array(
		'title'       => __('Subscribe Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_subscribe_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_subscribe_text',array(
		'description' => __('<p>1. More options for subscribe section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for subscribe section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_subscribe_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_subscribe_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_subscribe_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_subscribe_section',
		'type'=> 'hidden'
	));

	//Top Articles Section
	$wp_customize->add_section('affiliate_review_top_articles_section', array(
		'title'       => __('Top Articles Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_top_articles_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_top_articles_text',array(
		'description' => __('<p>1. More options for top articles section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for top articles section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_top_articles_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_top_articles_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_top_articles_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_top_articles_section',
		'type'=> 'hidden'
	));

	//Contact Section
	$wp_customize->add_section('affiliate_review_contact_section', array(
		'title'       => __('Contact Section', 'affiliate-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','affiliate-review'),
		'priority'    => null,
		'panel'       => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_contact_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_contact_text',array(
		'description' => __('<p>1. More options for contact section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contact section.</p>','affiliate-review'),
		'section'=> 'affiliate_review_contact_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('affiliate_review_contact_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_contact_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=affiliate_review_guide') ." '>More Info</a>",
		'section'=> 'affiliate_review_contact_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('affiliate_review_footer',array(
		'title'	=> esc_html__('Footer Settings','affiliate-review'),
		'description' => __('For more options of the footer section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/affiliate-review-wordpress-theme/">GO PRO</a>','affiliate-review'),
		'panel' => 'affiliate_review_homepage_panel',
	));

	$wp_customize->add_setting('affiliate_review_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_footer_background_color', array(
		'label'    => __('Footer Background Color', 'affiliate-review'),
		'section'  => 'affiliate_review_footer',
	)));

	$wp_customize->add_setting('affiliate_review_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'affiliate_review_footer_background_image',array(
        'label' => __('Footer Background Image','affiliate-review'),
        'section' => 'affiliate_review_footer'
	)));

	// Footer
	$wp_customize->add_setting('affiliate_review_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','affiliate-review'),
		'choices' => array(
            'fixed' => __('fixed','affiliate-review'),
            'scroll' => __('scroll','affiliate-review'),
        ),
		'section'=> 'affiliate_review_footer',
	));

	$wp_customize->add_setting('affiliate_review_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','affiliate-review'),
    'section' => 'affiliate_review_footer',
    'choices' => array(
    	'Left' => __('Left','affiliate-review'),
      'Center' => __('Center','affiliate-review'),
      'Right' => __('Right','affiliate-review')
    ),
	) );

	$wp_customize->add_setting('affiliate_review_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','affiliate-review'),
        'section' => 'affiliate_review_footer',
        'choices' => array(
        	'Left' => __('Left','affiliate-review'),
            'Center' => __('Center','affiliate-review'),
            'Right' => __('Right','affiliate-review')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('affiliate_review_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'affiliate-review' ),
    ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

     // footer social icon
  	$wp_customize->add_setting( 'affiliate_review_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','affiliate-review' ),
		'section' => 'affiliate_review_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('affiliate_review_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'affiliate_review_Customize_partial_affiliate_review_footer_text',
	));

	$wp_customize->add_setting('affiliate_review_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_footer_text',array(
		'label'	=> esc_html__('Copyright Text','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control(new Affiliate_Review_Image_Radio_Control($wp_customize, 'affiliate_review_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','affiliate-review'),
        'section' => 'affiliate_review_footer',
        'settings' => 'affiliate_review_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'affiliate_review_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','affiliate-review' ),
      	'section' => 'affiliate_review_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('affiliate_review_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'affiliate_review_Customize_partial_affiliate_review_scroll_to_top_icon',
	));

    $wp_customize->add_setting('affiliate_review_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new affiliate_review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_footer',
		'setting'	=> 'affiliate_review_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('affiliate_review_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_scroll_to_top_width',array(
		'label'	=> __('Icon Width','affiliate-review'),
		'description'	=> __('Enter a value in pixels Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_scroll_to_top_height',array(
		'label'	=> __('Icon Height','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'affiliate_review_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'affiliate_review_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','affiliate-review' ),
		'section'     => 'affiliate_review_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('affiliate_review_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control(new Affiliate_Review_Image_Radio_Control($wp_customize, 'affiliate_review_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','affiliate-review'),
        'section' => 'affiliate_review_footer',
        'settings' => 'affiliate_review_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post Settings
	$wp_customize->add_panel( 'affiliate_review_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'affiliate_review_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_blog_post_parent_panel',
	));

	//Blog Post Layout
    $wp_customize->add_setting('affiliate_review_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
    ));
    $wp_customize->add_control(new Affiliate_Review_Image_Radio_Control($wp_customize, 'affiliate_review_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','affiliate-review'),
        'section' => 'affiliate_review_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('affiliate_review_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'affiliate_review_Customize_partial_affiliate_review_toggle_postdate',
	));

	$wp_customize->add_setting( 'affiliate_review_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','affiliate-review' ),
        'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting('affiliate_review_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new affiliate_review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_post_settings',
		'setting'	=> 'affiliate_review_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'affiliate_review_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_author',array(
		'label' => esc_html__( 'Author','affiliate-review' ),
		'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting('affiliate_review_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Affiliate_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_post_settings',
		'setting'	=> 'affiliate_review_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'affiliate_review_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_comments',array(
		'label' => esc_html__( 'Comments','affiliate-review' ),
		'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting('affiliate_review_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Affiliate_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_post_settings',
		'setting'	=> 'affiliate_review_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'affiliate_review_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_time',array(
		'label' => esc_html__( 'Time','affiliate-review' ),
		'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting('affiliate_review_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new affiliate_review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_post_settings',
		'setting'	=> 'affiliate_review_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'affiliate_review_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
	));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','affiliate-review' ),
		'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting( 'affiliate_review_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'affiliate_review_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','affiliate-review' ),
		'section'     => 'affiliate_review_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'affiliate_review_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'affiliate_review_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','affiliate-review' ),
		'section'     => 'affiliate_review_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('affiliate_review_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'affiliate_review_sanitize_choices'
	));
  	$wp_customize->add_control('affiliate_review_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','affiliate-review'),
		'section'	=> 'affiliate_review_post_settings',
		'choices' => array(
			'default' => __('Default','affiliate-review'),
			'custom' => __('Custom Image Size','affiliate-review'),
      ),
  	));

	$wp_customize->add_setting('affiliate_review_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('affiliate_review_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'affiliate-review' ),),
		'section'=> 'affiliate_review_post_settings',
		'type'=> 'text',
		'active_callback' => 'affiliate_review_blog_post_featured_image_dimension'
	));

	$wp_customize->add_setting('affiliate_review_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'affiliate-review' ),),
		'section'=> 'affiliate_review_post_settings',
		'type'=> 'text',
		'active_callback' => 'affiliate_review_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'affiliate_review_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
	));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_tags', array(
		'label' => esc_html__( 'Tags','affiliate-review' ),
		'section' => 'affiliate_review_post_settings'
    )));

    $wp_customize->add_setting( 'affiliate_review_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'affiliate_review_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','affiliate-review' ),
		'section'     => 'affiliate_review_post_settings',
		'type'        => 'range',
		'settings'    => 'affiliate_review_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('affiliate_review_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','affiliate-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','affiliate-review'),
		'section'=> 'affiliate_review_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('affiliate_review_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','affiliate-review'),
        'section' => 'affiliate_review_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','affiliate-review'),
            'Excerpt' => esc_html__('Excerpt','affiliate-review'),
            'No Content' => esc_html__('No Content','affiliate-review')
        ),
	) );

   	$wp_customize->add_setting('affiliate_review_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Page posts','affiliate-review'),
        'section' => 'affiliate_review_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','affiliate-review'),
            'Without Blocks' => __('Without Blocks','affiliate-review')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'affiliate_review_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('affiliate_review_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'affiliate_review_Customize_partial_affiliate_review_button_text',
	));

    $wp_customize->add_setting('affiliate_review_button_text',array(
		'default'=> esc_html__('Read More','affiliate-review'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_button_text',array(
		'label'	=> esc_html__('Add Button Text','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('affiliate_review_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_button_font_size',array(
		'label'	=> __('Button Font Size','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'affiliate-review' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'affiliate_review_button_settings',
	));

	$wp_customize->add_setting( 'affiliate_review_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'affiliate_review_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','affiliate-review' ),
		'section'     => 'affiliate_review_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('affiliate_review_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'affiliate-review' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'affiliate_review_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('affiliate_review_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','affiliate-review'),
		'choices' => array(
            'Uppercase' => __('Uppercase','affiliate-review'),
            'Capitalize' => __('Capitalize','affiliate-review'),
            'Lowercase' => __('Lowercase','affiliate-review'),
        ),
		'section'=> 'affiliate_review_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'affiliate_review_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('affiliate_review_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'affiliate_review_Customize_partial_affiliate_review_related_post_title',
	));

    $wp_customize->add_setting( 'affiliate_review_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_related_post',array(
		'label' => esc_html__( 'Related Post','affiliate-review' ),
		'section' => 'affiliate_review_related_posts_settings'
    )));

    $wp_customize->add_setting('affiliate_review_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('affiliate_review_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'affiliate_review_sanitize_number_absint'
	));
	$wp_customize->add_control('affiliate_review_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'affiliate_review_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'affiliate_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'affiliate_review_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','affiliate-review' ),
		'section'     => 'affiliate_review_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'affiliate_review_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'affiliate_review_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'affiliate_review_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'affiliate_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_postdate',array(
	    'label' => esc_html__( 'Date','affiliate-review' ),
	   'section' => 'affiliate_review_single_blog_settings'
	)));

    $wp_customize->add_setting( 'affiliate_review_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'affiliate_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_author',array(
	    'label' => esc_html__( 'Author','affiliate-review' ),
	    'section' => 'affiliate_review_single_blog_settings'
	)));

	$wp_customize->add_setting( 'affiliate_review_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'affiliate_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_comments',array(
	    'label' => esc_html__( 'Comments','affiliate-review' ),
	    'section' => 'affiliate_review_single_blog_settings'
	)));

	$wp_customize->add_setting( 'affiliate_review_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'affiliate_review_switch_sanitization'
	) );

	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_time',array(
	    'label' => esc_html__( 'Time','affiliate-review' ),
	    'section' => 'affiliate_review_single_blog_settings'
	)));

	$wp_customize->add_setting( 'affiliate_review_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
	));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_toggle_tags', array(
		'label' => esc_html__( 'Tags','affiliate-review' ),
		'section' => 'affiliate_review_single_blog_settings'
    )));

	$wp_customize->add_setting( 'affiliate_review_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','affiliate-review' ),
		'section' => 'affiliate_review_single_blog_settings'
 	)));

   // Single Posts Category
  	$wp_customize->add_setting( 'affiliate_review_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','affiliate-review' ),
		'section' => 'affiliate_review_single_blog_settings'
    )));

	$wp_customize->add_setting( 'affiliate_review_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
	));
	$wp_customize->add_control( new affiliate_review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Post Navigation','affiliate-review' ),
		  'section' => 'affiliate_review_single_blog_settings'
	)));

	$wp_customize->add_setting('affiliate_review_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','affiliate-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','affiliate-review'),
		'section'=> 'affiliate_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('affiliate_review_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('affiliate_review_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','affiliate-review'),
		'description'	=> __('Enter a value in %. Example:50%','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_single_blog_settings',
		'type'=> 'text'
	));

	  // Grid layout setting
	$wp_customize->add_section( 'affiliate_review_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'affiliate_review_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_grid_postdate',array(
        'label' => esc_html__( 'Post Date','affiliate-review' ),
        'section' => 'affiliate_review_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'affiliate_review_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_grid_author',array(
		'label' => esc_html__( 'Author','affiliate-review' ),
		'section' => 'affiliate_review_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'affiliate_review_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_grid_comments',array(
		'label' => esc_html__( 'Comments','affiliate-review' ),
		'section' => 'affiliate_review_grid_layout_settings'
    )));

	//Others Settings
	$wp_customize->add_panel( 'affiliate_review_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'affiliate_review_left_right', array(
    	'title' => esc_html__( 'General Settings', 'affiliate-review' ),
		'panel' => 'affiliate_review_others_panel'
	) );

	$wp_customize->add_setting('affiliate_review_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control(new Affiliate_Review_Image_Radio_Control($wp_customize, 'affiliate_review_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','affiliate-review'),
        'description' => esc_html__('Here you can change the width layout of Website.','affiliate-review'),
        'section' => 'affiliate_review_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('affiliate_review_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','affiliate-review'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','affiliate-review'),
        'section' => 'affiliate_review_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','affiliate-review'),
            'Right Sidebar' => esc_html__('Right Sidebar','affiliate-review'),
            'One Column' => esc_html__('One Column','affiliate-review'),
            'Grid Layout' => esc_html__('Grid Layout','affiliate-review')
        ),
	) );

	$wp_customize->add_setting('affiliate_review_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','affiliate-review'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','affiliate-review'),
        'section' => 'affiliate_review_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','affiliate-review'),
            'Right_Sidebar' => esc_html__('Right Sidebar','affiliate-review'),
            'One_Column' => esc_html__('One Column','affiliate-review')
        ),
	) );

    //Wow Animation
	$wp_customize->add_setting( 'affiliate_review_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_animation',array(
        'label' => esc_html__( 'Animations','affiliate-review' ),
        'description' => __('Here you can disable overall site animation effect','affiliate-review'),
        'section' => 'affiliate_review_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'affiliate_review_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','affiliate-review' ),
        'section' => 'affiliate_review_left_right'
    )));

	$wp_customize->add_setting('affiliate_review_preloader_bg_color', array(
		'default'           => '#283891',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'affiliate-review'),
		'section'  => 'affiliate_review_left_right',
	)));

	$wp_customize->add_setting('affiliate_review_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'affiliate-review'),
		'section'  => 'affiliate_review_left_right',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('affiliate_review_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','affiliate-review'),
		'panel' => 'affiliate_review_others_panel',
	));

    $wp_customize->add_setting( 'affiliate_review_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','affiliate-review' ),
      	'section' => 'affiliate_review_responsive_media'
    )));

    $wp_customize->add_setting( 'affiliate_review_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','affiliate-review' ),
      	'section' => 'affiliate_review_responsive_media'
    )));

    $wp_customize->add_setting( 'affiliate_review_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','affiliate-review' ),
      	'section' => 'affiliate_review_responsive_media'
    )));

    $wp_customize->add_setting('affiliate_review_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Affiliate_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_responsive_media',
		'setting'	=> 'affiliate_review_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('affiliate_review_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Affiliate_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'affiliate_review_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','affiliate-review'),
		'transport' => 'refresh',
		'section'	=> 'affiliate_review_responsive_media',
		'setting'	=> 'affiliate_review_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('affiliate_review_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'affiliate_review_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'affiliate-review'),
		'section'  => 'affiliate_review_responsive_media',
	)));

     //Woocommerce settings
	$wp_customize->add_section('affiliate_review_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'affiliate-review'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'affiliate_review_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'affiliate_review_customize_partial_affiliate_review_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'affiliate_review_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','affiliate-review' ),
		'section' => 'affiliate_review_woocommerce_section'
    )));

    $wp_customize->add_setting('affiliate_review_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','affiliate-review'),
        'section' => 'affiliate_review_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','affiliate-review'),
            'Right Sidebar' => __('Right Sidebar','affiliate-review'),
        ),
	) );

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'affiliate_review_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'affiliate_review_customize_partial_affiliate_review_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'affiliate_review_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','affiliate-review' ),
		'section' => 'affiliate_review_woocommerce_section'
    )));

   	$wp_customize->add_setting('affiliate_review_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','affiliate-review'),
        'section' => 'affiliate_review_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','affiliate-review'),
            'Right Sidebar' => __('Right Sidebar','affiliate-review'),
        ),
	) );

    $wp_customize->add_setting( 'affiliate_review_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','affiliate-review' ),
		'section' => 'affiliate_review_woocommerce_section'
    )));

	$wp_customize->add_setting('affiliate_review_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('affiliate_review_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('affiliate_review_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','affiliate-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','affiliate-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'affiliate-review' ),
        ),
		'section'=> 'affiliate_review_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('affiliate_review_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'affiliate_review_sanitize_choices'
	));
	$wp_customize->add_control('affiliate_review_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','affiliate-review'),
        'section' => 'affiliate_review_woocommerce_section',
        'choices' => array(
            'left' => __('Left','affiliate-review'),
            'right' => __('Right','affiliate-review'),
        ),
	) );

    // Related Product
    $wp_customize->add_setting( 'affiliate_review_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'affiliate_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Affiliate_Review_Toggle_Switch_Custom_Control( $wp_customize, 'affiliate_review_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','affiliate-review' ),
        'section' => 'affiliate_review_woocommerce_section'
    ))); 
}

add_action( 'customize_register', 'affiliate_review_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Affiliate_Review_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Affiliate_Review_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Affiliate_Review_Customize_Section_Pro( $manager,'affiliate_review_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'REVIEW PRO', 'affiliate-review' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'affiliate-review' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/affiliate-review-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Affiliate_Review_Customize_Section_Pro($manager,'affiliate_review_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'affiliate-review' ),
			'pro_text' => esc_html__( 'DOCS', 'affiliate-review' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-affiliate-review/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'affiliate-review-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'affiliate-review-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Affiliate_Review_Customize::get_instance();
