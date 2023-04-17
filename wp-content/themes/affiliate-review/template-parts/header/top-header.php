<?php
/**
 * The template part for Top Header
 *
 * @package Affiliate Review
 * @subpackage affiliate-review
 * @since affiliate-review 1.0
 */
?>

<div class="top-header py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php if(get_theme_mod('affiliate_review_topbar_text1') != ''){ ?>
                    <p class="topbar-text1 mb-md-0 text-md-start text-center"><?php echo esc_html(get_theme_mod('affiliate_review_topbar_text1')); ?></p>
                <?php }?>
            </div>
            <div class="col-lg-4 col-md-6">
                <?php if(get_theme_mod('affiliate_review_topbar_text2') != ''){ ?>
                    <p class="topbar-text2 mb-md-0 text-md-end text-center"><?php echo esc_html(get_theme_mod('affiliate_review_topbar_text2')); ?></p>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-2 ps-md-0">
                <div class="social-icons text-md-end text-center">
                    <?php dynamic_sidebar('topbar-social-icons'); ?>
                </div>
            </div>
        </div>
    </div>
</div>