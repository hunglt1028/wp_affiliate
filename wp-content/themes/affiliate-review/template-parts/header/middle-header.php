<?php
/**
 * The template part for Middle Header
 *
 * @package Affiliate Review
 * @subpackage affiliate-review
 * @since affiliate-review 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-9 align-self-center">
        <div class="logo text-start">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('affiliate_review_logo_title_hide_show',true) == 1){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('affiliate_review_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('affiliate_review_tagline_hide_show',false) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="<?php if(class_exists('woocommerce')){ ?>col-lg-6 col-md-4<?php } else {?>col-lg-9 col-md-8 <?php }?> col-3 align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <?php if(class_exists('woocommerce')){ ?>
        <div class="col-lg-3 col-md-3 align-self-center">
          <div class="header-search">
            <?php get_product_search_form(); ?>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
</div>