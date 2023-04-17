<?php
/**
 * The template part for displaying post
 *
 * @package Affiliate Review
 * @subpackage affiliate-review
 * @since affiliate-review 1.0
 */
?>

<?php
  $affiliate_review_archive_year  = get_the_time('Y');
  $affiliate_review_archive_month = get_the_time('m');
  $affiliate_review_archive_day   = get_the_time('d');
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <?php $affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_blog_layout_option','Default');
    if($affiliate_review_theme_lay == 'Default'){ ?>
      <div class="row">
        <?php if(has_post_thumbnail() && get_theme_mod( 'affiliate_review_featured_image_hide_show',true) == 1) {?>
          <div class="box-image col-lg-6 col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?> 
        <article class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'affiliate_review_featured_image_hide_show',true) == 1) { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
          <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <?php if( get_theme_mod( 'affiliate_review_toggle_postdate',true) == 1 || get_theme_mod( 'affiliate_review_toggle_author',true) == 1 || get_theme_mod( 'affiliate_review_toggle_comments',true) == 1 || get_theme_mod( 'affiliate_review_toggle_time',true) == 1) { ?>
            <div class="post-info">
              <hr>
              <?php if(get_theme_mod('affiliate_review_toggle_postdate',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_postdate_icon','fas fa-calendar-alt')); ?> me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $affiliate_review_archive_year, $affiliate_review_archive_month, $affiliate_review_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
              <?php } ?>

              <?php if(get_theme_mod('affiliate_review_toggle_author',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_author_icon','fas fa-user')); ?> me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
              <?php } ?>

              <?php if(get_theme_mod('affiliate_review_toggle_comments',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_comments_icon','fa fa-comments')); ?> me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'affiliate-review'), __('0 Comments', 'affiliate-review'), __('% Comments', 'affiliate-review') ); ?></span>
              <?php } ?>

              <?php if(get_theme_mod('affiliate_review_toggle_time',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_time_icon','fas fa-clock')); ?>"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
              <?php } ?>
              <hr>
            </div>
          <?php } ?>
          <p class="mb-0">
            <?php $affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_excerpt_settings','Excerpt');
            if($affiliate_review_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($affiliate_review_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $affiliate_review_excerpt = get_the_excerpt(); echo esc_html( affiliate_review_string_limit_words( $affiliate_review_excerpt, esc_attr(get_theme_mod('affiliate_review_excerpt_number','30')))); ?>
              <?php }?>
            <?php }?>
          </p>
          <?php if( get_theme_mod('affiliate_review_button_text','Read More') != ''){ ?>
            <div class="more-btn mt-4 mb-4">
              <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?></span></a>
            </div>
          <?php } ?>
        </article>
      </div>
    <?php }else if($affiliate_review_theme_lay == 'Center'){ ?>
      <div class="service-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'affiliate_review_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <?php if( get_theme_mod( 'affiliate_review_toggle_postdate',true) == 1 || get_theme_mod( 'affiliate_review_toggle_author',true) == 1 || get_theme_mod( 'affiliate_review_toggle_comments',true) == 1 || get_theme_mod( 'affiliate_review_toggle_time',true) == 1) { ?>
          <div class="post-info">
            <hr>
            <?php if(get_theme_mod('affiliate_review_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_postdate_icon','fas fa-calendar-alt')); ?> me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $affiliate_review_archive_year, $affiliate_review_archive_month, $affiliate_review_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_author_icon','fas fa-user')); ?> me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_comments_icon','fa fa-comments')); ?> me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'affiliate-review'), __('0 Comments', 'affiliate-review'), __('% Comments', 'affiliate-review') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_time_icon','fas fa-clock')); ?>"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p class="mb-0">
            <?php $affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_excerpt_settings','Excerpt');
            if($affiliate_review_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($affiliate_review_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $affiliate_review_excerpt = get_the_excerpt(); echo esc_html( affiliate_review_string_limit_words( $affiliate_review_excerpt, esc_attr(get_theme_mod('affiliate_review_excerpt_number','30')))); ?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('affiliate_review_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($affiliate_review_theme_lay == 'Left'){ ?>
      <div class="service-text">
        <?php if( get_theme_mod( 'affiliate_review_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
       <?php if( get_theme_mod( 'affiliate_review_toggle_postdate',true) == 1 || get_theme_mod( 'affiliate_review_toggle_author',true) == 1 || get_theme_mod( 'affiliate_review_toggle_comments',true) == 1 || get_theme_mod( 'affiliate_review_toggle_time',true) == 1) { ?>
          <div class="post-info">
            <hr>
            <?php if(get_theme_mod('affiliate_review_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_postdate_icon','fas fa-calendar-alt')); ?> me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $affiliate_review_archive_year, $affiliate_review_archive_month, $affiliate_review_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_author_icon','fas fa-user')); ?> me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_comments_icon','fa fa-comments')); ?> me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'affiliate-review'), __('0 Comments', 'affiliate-review'), __('% Comments', 'affiliate-review') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('affiliate_review_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('affiliate_review_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('affiliate_review_toggle_time_icon','fas fa-clock')); ?>"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p class="mb-0">
            <?php $affiliate_review_theme_lay = get_theme_mod( 'affiliate_review_excerpt_settings','Excerpt');
            if($affiliate_review_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($affiliate_review_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $affiliate_review_excerpt = get_the_excerpt(); echo esc_html( affiliate_review_string_limit_words( $affiliate_review_excerpt, esc_attr(get_theme_mod('affiliate_review_excerpt_number','30')))); ?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('affiliate_review_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>
