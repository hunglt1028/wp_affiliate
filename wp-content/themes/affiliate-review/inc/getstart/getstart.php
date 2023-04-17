<?php
//about theme info
add_action( 'admin_menu', 'affiliate_review_gettingstarted' );
function affiliate_review_gettingstarted() {
	add_theme_page( esc_html__('About Affiliate Review', 'affiliate-review'), esc_html__('About Affiliate Review', 'affiliate-review'), 'edit_theme_options', 'affiliate_review_guide', 'affiliate_review_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function affiliate_review_admin_theme_style() {
	wp_enqueue_style('affiliate-review-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('affiliate-review-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'affiliate_review_admin_theme_style');

//guidline for about theme
function affiliate_review_mostrar_guide() { 
	//custom function about theme customizer
	$affiliate_review_return = add_query_arg( array()) ;
	$affiliate_review_theme = wp_get_theme( 'affiliate-review' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Affiliate Review', 'affiliate-review' ); ?> <span class="version"><?php esc_html_e( 'Version', 'affiliate-review' ); ?>: <?php echo esc_html($affiliate_review_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','affiliate-review'); ?></p>
    </div>

    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Affiliate Review at 20% Discount','affiliate-review'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','affiliate-review'); ?> ( <span><?php esc_html_e('vwpro20','affiliate-review'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( AFFILIATE_REVIEW_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'affiliate-review' ); ?></a>
			</div>
		</div>
   	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="affiliate_review_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'affiliate-review' ); ?></button>
			<button class="tablinks" onclick="affiliate_review_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'affiliate-review' ); ?></button>
			<button class="tablinks" onclick="affiliate_review_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'affiliate-review' ); ?></button>
			<button class="tablinks" onclick="affiliate_review_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'affiliate-review' ); ?></button>
			<button class="tablinks" onclick="affiliate_review_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'affiliate-review' ); ?></button>
		  	<button class="tablinks" onclick="affiliate_review_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'affiliate-review' ); ?></button>
		</div>

		<?php
			$affiliate_review_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$affiliate_review_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Affiliate_Review_Plugin_Activation_Settings::get_instance();
				$affiliate_review_actions = $plugin_ins->recommended_actions;
				?>
				<div class="affiliate-review-recommended-plugins">
				    <div class="affiliate-review-action-list">
				        <?php if ($affiliate_review_actions): foreach ($affiliate_review_actions as $key => $affiliate_review_actionValue): ?>
				                <div class="affiliate-review-action" id="<?php echo esc_attr($affiliate_review_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($affiliate_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($affiliate_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($affiliate_review_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','affiliate-review'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($affiliate_review_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'affiliate-review' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Affiliate Review is a fantastic theme for affiliate marketing websites, affiliate programs, coupons as well as amazon affiliates, price comparison websites, product reviews, and relevant sites. It is a minimal theme with multipurpose use backed by a clean and retina-ready design. It has a user-friendly theme options panel allowing you to customize it using the personalization options available. It is crafted by our WordPress experts and makes use of the Bootstrap framework for creating this theme. The responsive layout will make your website automatically adjust itself to any screen size and its mobile-friendly design is going to make your website perform well on mobile devices as well. The secure and optimized codes deliver a website that has a faster page load time. With a lot of social media options available for effective promotion, you can link the posts and images with your various social media accounts to spread the word. SEO-friendly coding practices have been implemented in this theme making it useful for your website to get featured in the top ranks. With Call to Action Buttons (CTA), you can greatly improve the conversion rates of your site. It is a modern theme with translation-ready options and a lot of interactive elements with stunning animations.','affiliate-review'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'affiliate-review' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'affiliate-review' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AFFILIATE_REVIEW_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'affiliate-review' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'affiliate-review'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'affiliate-review'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'affiliate-review'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'affiliate-review'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'affiliate-review'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AFFILIATE_REVIEW_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'affiliate-review'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'affiliate-review'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'affiliate-review'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AFFILIATE_REVIEW_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'affiliate-review'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'affiliate-review' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','affiliate-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','affiliate-review'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','affiliate-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_popular_products') ); ?>" target="_blank"><?php esc_html_e('Popular Products','affiliate-review'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','affiliate-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','affiliate-review'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','affiliate-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','affiliate-review'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','affiliate-review'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','affiliate-review'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','affiliate-review'); ?></span><?php esc_html_e(' Go to ','affiliate-review'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','affiliate-review'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','affiliate-review'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','affiliate-review'); ?></span><?php esc_html_e(' Go to ','affiliate-review'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','affiliate-review'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','affiliate-review'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','affiliate-review'); ?> <a class="doc-links" href="<?php echo esc_url( AFFILIATE_REVIEW_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','affiliate-review'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Affiliate_Review_Plugin_Activation_Settings::get_instance();
			$affiliate_review_actions = $plugin_ins->recommended_actions;
			?>
				<div class="affiliate-review-recommended-plugins">
				    <div class="affiliate-review-action-list">
				        <?php if ($affiliate_review_actions): foreach ($affiliate_review_actions as $key => $affiliate_review_actionValue): ?>
				                <div class="affiliate-review-action" id="<?php echo esc_attr($affiliate_review_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($affiliate_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($affiliate_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($affiliate_review_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','affiliate-review'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($affiliate_review_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'affiliate-review' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','affiliate-review'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','affiliate-review'); ?></span></b></p>
	              	<div class="affiliate-review-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','affiliate-review'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'affiliate-review' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','affiliate-review'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','affiliate-review'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','affiliate-review'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','affiliate-review'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','affiliate-review'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','affiliate-review'); ?></a>
							</div> 
						</div>
					</div>
				</div>		
					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Affiliate_Review_Plugin_Activation_Settings::get_instance();
			$affiliate_review_actions = $plugin_ins->recommended_actions;
			?>
				<div class="affiliate-review-recommended-plugins">
				    <div class="affiliate-review-action-list">
				        <?php if ($affiliate_review_actions): foreach ($affiliate_review_actions as $key => $affiliate_review_actionValue): ?>
				                <div class="affiliate-review-action" id="<?php echo esc_attr($affiliate_review_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($affiliate_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($affiliate_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($affiliate_review_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'affiliate-review' ); ?></h3>
				<hr class="h3hr">
				<div class="affiliate-review-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','affiliate-review'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'affiliate-review' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','affiliate-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','affiliate-review'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','affiliate-review'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','affiliate-review'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=affiliate_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','affiliate-review'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','affiliate-review'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

				<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Affiliate_Review_Plugin_Activation_Woo_Products::get_instance();
				$affiliate_review_actions = $plugin_ins->recommended_actions;
				?>
				<div class="affiliate-review-recommended-plugins">
					    <div class="affiliate-review-action-list">
					        <?php if ($affiliate_review_actions): foreach ($affiliate_review_actions as $key => $affiliate_review_actionValue): ?>
					                <div class="affiliate-review-action" id="<?php echo esc_attr($affiliate_review_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($affiliate_review_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($affiliate_review_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($affiliate_review_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'affiliate-review' ); ?></h3>
				<hr class="h3hr">
				<div class="affiliate-review-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','affiliate-review'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','affiliate-review'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','affiliate-review'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','affiliate-review'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','affiliate-review'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','affiliate-review'); ?></span></b></p>
	              	<div class="affiliate-review-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','affiliate-review'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','affiliate-review'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'affiliate-review' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('After affiliate marketing, there is a new concept of creating affiliate review websites and for that, we have this top-class Affiliate WordPress Theme. As affiliate review websites are becoming a popular way of making online money, this WordPress theme caters to all the needs of such websites with perfection. Considering the fact that many affiliate marketers are looking to create such websites quickly and effectively, this theme serves as a full-fledged solution for them. WP Affiliate Review WordPress Theme stands apart from the crowd because of its catchy layout and splendid design aesthetics. You don’t have to focus on building a website from scratch as this theme has ready-made page templates that you can use for your website and start your site on your own. It has such an amazing slider for your website along with numerous settings provided for it lets you adjust the slider timings and images on the homepage.','affiliate-review'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( AFFILIATE_REVIEW_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'affiliate-review'); ?></a>
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'affiliate-review'); ?></a>
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'affiliate-review'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'affiliate-review' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'affiliate-review'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'affiliate-review'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'affiliate-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'affiliate-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'affiliate-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'affiliate-review'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'affiliate-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'affiliate-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'affiliate-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'affiliate-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'affiliate-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'affiliate-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'affiliate-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'affiliate-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( AFFILIATE_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'affiliate-review'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'affiliate-review'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'affiliate-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'affiliate-review'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'affiliate-review'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'affiliate-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'affiliate-review'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'affiliate-review'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'affiliate-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'affiliate-review'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'affiliate-review'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'affiliate-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','affiliate-review'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'affiliate-review'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'affiliate-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AFFILIATE_REVIEW_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'affiliate-review'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>