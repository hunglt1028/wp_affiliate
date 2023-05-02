<?php
	add_image_size( 'custom-size', 512, 512, true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
		<div class="news-block border-b-1">
			<div class="news-block-top">
				<a href="<?=the_permalink()?>">
					<?php if(has_post_thumbnail()){?>
						<?=the_post_thumbnail('custom-size',array('class'=>'new-image img-fluid','alt'=>get_the_title())); ?>					
					<?php }else{?>
						<img src="<?=get_theme_file_uri( 'assets/images/news/no_image.png' ); ?>" class="news-image img-fluid" alt="<?=get_the_title()?>">
					<?php }?>
				</a>
			</div>

			<div class="news-block-info">
				<div class="d-flex">
					<div class="news-block-date">
						<p class="m-0">
							<i class="bi-calendar4 custom-icon me-1"></i>
							<?=get_the_date()?>
						</p>
					</div>
				</div>

				<div class="news-block-title mb-2">
					<h4><a href="<?=the_permalink()?>" class="news-block-title-link"><?=the_title()?></a></h4>
				</div>

				<div class="news-block-body">
					<?=the_excerpt();?>
				</div>
			</div>
		</div>
	<div class="clearfix"></div>
</article>
