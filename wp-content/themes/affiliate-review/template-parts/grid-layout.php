<?php
/**
 * The template part for displaying grid post
 *
 * @package Affiliate Review
 * @subpackage affiliate-review
 * @since affiliate-review 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box p-3 mb-3 text-center wow zoomIn" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'affiliate_review_featured_image_hide_show',true) == 1) {
		              the_post_thumbnail();
		            }
	          	?>
	        </div>
	        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	         <?php if( get_theme_mod( 'affiliate_review_grid_postdate',true) == 1 || get_theme_mod( 'affiliate_review_grid_author',true) == 1 || get_theme_mod( 'affiliate_review_grid_comments',true) == 1) { ?>
		        <div class="post-info">
		            <hr>
		            <?php if(get_theme_mod('affiliate_review_grid_postdate',true)==1){ ?>
		                <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $affiliate_review_archive_year, $affiliate_review_archive_month, $affiliate_review_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
		            <?php } ?>

		            <?php if(get_theme_mod('affiliate_review_grid_author',true)==1){ ?>
		                <span><?php echo esc_html(get_theme_mod('affiliate_review_single_post_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
		            <?php } ?>

		            <?php if(get_theme_mod('affiliate_review_grid_comments',true)==1){ ?>
		                <span><?php echo esc_html(get_theme_mod('affiliate_review_single_post_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'affiliate-review'), __('0 Comments', 'affiliate-review'), __('% Comments', 'affiliate-review') ); ?></span>
		            <?php } ?>
		            <hr>
		        </div>
		    <?php } ?>
	        <div class="new-text">
	        	<p>
			        <?php $affiliate_review_excerpt = get_the_excerpt(); echo esc_html( affiliate_review_string_limit_words( $affiliate_review_excerpt, esc_attr(get_theme_mod('affiliate_review_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('affiliate_review_excerpt_suffix','') ); ?>
	        	</p>
	        </div>
	        <?php if( get_theme_mod('affiliate_review_button_text','Read More') != ''){ ?>
	          <div class="more-btn mt-4 mb-4">
	            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('affiliate_review_button_text',__('Read More','affiliate-review')));?></span></a>
	          </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>