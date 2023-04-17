<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'affiliate_review_before_slider' ); ?>

    <?php if( get_theme_mod( 'affiliate_review_slider_hide_show', false) == 1 || get_theme_mod( 'affiliate_review_resp_slider_hide_show', false) == 1) { ?>
      <section id="slider"> 
      <?php if(get_theme_mod('affiliate_review_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'affiliate_review_slider_speed',4000)) ?>">
          <?php $affiliate_review_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'affiliate_review_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $affiliate_review_pages[] = $mod;
              }
            }
            if( !empty($affiliate_review_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $affiliate_review_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow bounceInUp delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <?php if( get_theme_mod('affiliate_review_slider_content_hide_show',true) == 1){ ?>
                      <p class="wow bounceInUp delay-1000" data-wow-duration="2s"><?php $affiliate_review_excerpt = get_the_excerpt(); echo esc_html( affiliate_review_string_limit_words( $affiliate_review_excerpt, esc_attr(get_theme_mod('affiliate_review_slider_excerpt_number','20')))); ?></p>
                    <?php } ?>
                    <div class="read-btn wow bounceInUp delay-1000" data-wow-duration="2s">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html('Read Review','affiliate-review'); ?><span class="screen-reader-text"><?php echo esc_html('Read Review','affiliate-review'); ?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
          <i class="fas fa-angle-left" aria-hidden="true"></i>
          <span class="screen-reader-text"><?php echo esc_html('Previous','affiliate-review'); ?></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
          <i class="fas fa-angle-right" aria-hidden="true"></i>
          <span class="screen-reader-text"><?php echo esc_html('Next','affiliate-review'); ?></span>
          </button>
        </div> 
        <div id="slider-inner">
          <div class="container">
            <div class="row mx-0">
               <div class="col-lg-6 offset-md-6 col-md-7 col-sm-7">
                  <div class="owl-carousel" id="carousel-thumbs">
                    <?php $affiliate_review_pages = array();
                      for ( $count = 1; $count <= 4; $count++ ) {
                        $mod = intval( get_theme_mod( 'affiliate_review_slider_page' . $count ));
                        if ( 'page-none-selected' != $mod ) {
                          $affiliate_review_pages[] = $mod;
                        }
                      }
                      if( !empty($affiliate_review_pages) ) :
                        $args = array(
                          'post_type' => 'page',
                          'post__in' => $affiliate_review_pages,
                          'orderby' => 'post__in'
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                          $i = 1;
                    ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                      <div class="vwslideimg_width">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                        } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                        <?php } ?>
                        <div class="vw-slide-cover">
                           <div class="row">
                              <div class="col-lg-8 col-md-8 col-8 align-self-center">
                                 <div class="log-content text-lg-start text-md-start text-sm-center text-center">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-4 align-self-center text-end">
                                <p class="reviewno"><?php echo esc_html(get_theme_mod('affiliate_review_slider_review' . $i)); ?></p>
                              </div>
                           </div>
                        </div>
                      </div>
                    <?php endwhile; 
                    wp_reset_postdata();?>
                    <?php else : ?>
                      <div class="no-postfound"></div>
                    <?php endif;
                    endif;?>
                  </div>
               </div>
            </div>
          </div>
        </div>
          <?php } else if(get_theme_mod('affiliate_review_slider_type', 'Advance slider') == 'Advance slider'){?>
        <?php echo do_shortcode(get_theme_mod('affiliate_review_advance_slider_shortcode')); ?>
      <?php } ?>
    </section>
    <?php }?>

  <?php do_action( 'affiliate_review_after_slider' ); ?>

  <?php if(get_theme_mod('affiliate_review_section_title') != '' || get_theme_mod('affiliate_review_product_category') != '') {?>
    <section id="popular-product" class="py-5 wow slideInRight delay-1000" data-wow-duration="2s">
      <div class="container">
        <?php if( get_theme_mod('affiliate_review_section_title') != '' ){ ?>
          <h2 class="text-center mb-4"><?php echo esc_html(get_theme_mod('affiliate_review_section_title',''));?></h2>
          <?php }?>
        <div class="row">
          <?php if ( class_exists( 'WooCommerce' ) ) {
            $args = array( 
              'post_type' => 'product',
              'product_cat' => get_theme_mod('affiliate_review_product_category'),
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="col-lg-4 col-md-4">
                <div class="product-box">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  <div class="row mx-0 py-3">
                    <div class="col-lg-9 col-md-8 col-8 align-self-center">
                      <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                      <p class="product-cat mb-0"><?php echo esc_html(get_theme_mod('affiliate_review_product_category')); ?></p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-4 align-self-center text-end">
                      <p class="product-rating mb-0"><?php echo esc_html(round($product->get_average_rating(), 1)); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'affiliate_review_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>