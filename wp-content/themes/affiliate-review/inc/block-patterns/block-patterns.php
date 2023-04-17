<?php
/**
 *  Affiliate Review: Block Patterns
 *
 * @package Affiliate Review
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'affiliate-review',
		array( 'label' => __( 'Affiliate Review', 'affiliate-review' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'affiliate-review/banner-section',
		array(
			'title'      => __( 'Banner Section', 'affiliate-review' ),
			'categories' => array( 'affiliate-review' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":80,\"dimRatio\":50,\"minHeight\":660,\"minHeightUnit\":\"px\",\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull banner-section\" style=\"min-height:660px\"><span aria-hidden=\"true\" class=\"wp-block-cover__gradient-background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-80\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"lg-px-5 px-md-5 px-2 mx-auto\"} -->\n<div class=\"wp-block-columns lg-px-5 px-md-5 px-2 mx-auto\"><!-- wp:column {\"className\":\"banner-content py-5 md-py-4\"} -->\n<div class=\"wp-block-column banner-content py-5 md-py-4\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"className\":\"banner-section-heading\",\"fontSize\":\"x-large\"} -->\n<h1 class=\"has-text-align-left banner-section-heading has-x-large-font-size\" id=\"lorem-ipsum-is-simply\">Lorem Ipsum is Simply</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"banner-section-paragraph\"} -->\n<p class=\"banner-section-paragraph\">loream ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"13px\"},\"color\":{\"background\":\"#283891\"},\"typography\":{\"fontSize\":\"12px\"}},\"className\":\"banner-section-button\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-section-button\" style=\"font-size:12px\"><a class=\"wp-block-button__link has-background\" style=\"border-radius:13px;background-color:#283891\">Read Review</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"banner-section2\"} -->\n<div class=\"wp-block-column banner-section2\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"banner-section-img1\"} -->\n<div class=\"wp-block-column banner-section-img1\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner1.png\",\"id\":93,\"dimRatio\":0,\"focalPoint\":{\"x\":\"0.33\",\"y\":\"0.69\"},\"minHeight\":320,\"minHeightUnit\":\"px\"} -->\n<div class=\"wp-block-cover\" style=\"min-height:320px\"><span aria-hidden=\"true\" class=\"has-background-dim-0 wp-block-cover__gradient-background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-93\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner1.png\" style=\"object-position:33% 69%\" data-object-fit=\"cover\" data-object-position=\"33% 69%\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:columns {\"className\":\"slider-group1 mb-0\"} -->\n<div class=\"wp-block-columns slider-group1 mb-0\"><!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"slider-text1\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center slider-text1\"><!-- wp:heading {\"level\":4,\"fontSize\":\"medium\"} -->\n<h4 class=\"has-medium-font-size\" id=\"loream-ispum-is-sim\">Loream ispum </h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"slider-icon1\"} -->\n<div class=\"wp-block-column slider-icon1\"><!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:paragraph {\"align\":\"right\",\"className\":\"slider-icon1 \"} -->\n<p class=\"has-text-align-right slider-icon1\">3</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"banner-section-img2\"} -->\n<div class=\"wp-block-column banner-section-img2\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner2.png\",\"id\":94,\"dimRatio\":0,\"minHeight\":320,\"minHeightUnit\":\"px\",\"contentPosition\":\"center center\",\"isDark\":false} -->\n<div class=\"wp-block-cover is-light\" style=\"min-height:320px\"><span aria-hidden=\"true\" class=\"has-background-dim-0 wp-block-cover__gradient-background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-94\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner2.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:columns {\"className\":\"slider-group2 mb-0\"} -->\n<div class=\"wp-block-columns slider-group2 mb-0\"><!-- wp:column {\"verticalAlignment\":\"center\",\"textColor\":\"white\",\"className\":\"slider-text2\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center slider-text2 has-white-color has-text-color\"><!-- wp:heading {\"level\":4,\"fontSize\":\"medium\"} -->\n<h4 class=\"has-medium-font-size\" id=\"loream-ispum-is-simply-dummy-1\">Loream ispum</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"slider-icon2\"} -->\n<div class=\"wp-block-column slider-icon2\"><!-- wp:paragraph {\"align\":\"left\",\"textColor\":\"white\",\"className\":\"slider-icon2\"} -->\n<p class=\"has-text-align-left slider-icon2 has-white-color has-text-color\">4</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'affiliate-review/products-section',
		array(
			'title'      => __( 'Featured Product Section', 'affiliate-review' ),
			'categories' => array( 'affiliate-review' ),
			'content'    => "<!-- wp:group {\"className\":\"product-section lg-py-5  lg-py-5  md-px-5  md-px-5 mx-auto \"} -->\n<div class=\"wp-block-group product-section lg-py-5  md-px-5 mx-auto\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mt-4 mb-4\"} -->\n<h2 class=\"has-text-align-center mt-4 mb-4\" id=\"top-popular-reviews\">Top Popular Reviews</h2>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-category {\"categories\":[19],\"contentVisibility\":{\"title\":true,\"price\":false,\"rating\":true,\"button\":false}} /-->\n\n<!-- wp:paragraph {\"className\":\"9595\"} -->\n<p class=\"9595\"></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->",
		)
	);
}