<?php
  
?>
<section class="news-section section-padding" id="section_5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
                    <div class="article-title">
                        <h3><?=the_title()?></h3>
                    </div>
                    <div class="article-date">
                        <div class="news-block-date">
                            <p class="m-0">
                                <i class="bi-calendar4 custom-icon me-1"></i>
                                <?=get_the_date()?>
                            </p>
                        </div>
                    </div>
                    <div class="article-body">
                        <div class="news-block-body">
                            <?=the_content();?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </article>
                <div class="tags-block">
                    <?php $tags= get_the_tags();
                        if($tags){
                            foreach ($tags as $tag){ 
                            $tag_link= get_tag_link( $tag->term_id );
                    ?>
                        <a href="/tags/<?=$tag->slug?>" class="tags-block-link">
                            <?=$tag->name?>
                        </a>
                    <?php }}?>
                </div>
            </div>

            <div class="col-lg-4 col-12 mx-auto">
                <form class="custom-form search-form" action="#" method="get" role="form">
                    <input name="search" type="search" class="form-control" id="search" placeholder="Search"
                        aria-label="Search">

                    <button type="submit" class="form-control">
                        <i class="bi-search"></i>
                    </button>
                </form>
                <div class="category-block d-flex flex-column">
                    <h5 class="mb-3">Categories</h5>

                    <a href="#" class="category-block-link">
                        Drinking water
                        <span class="badge">20</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Food Donation
                        <span class="badge">30</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Children Education
                        <span class="badge">10</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Poverty Development
                        <span class="badge">15</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Clothing Donation
                        <span class="badge">20</span>
                    </a>
                </div>

                <div class="tags-block">
                    <h5 class="mb-3">Tags</h5>

                    <a href="#" class="tags-block-link">
                        Donation
                    </a>

                    <a href="#" class="tags-block-link">
                        Clothing
                    </a>

                    <a href="#" class="tags-block-link">
                        Food
                    </a>

                    <a href="#" class="tags-block-link">
                        Children
                    </a>

                    <a href="#" class="tags-block-link">
                        Education
                    </a>

                    <a href="#" class="tags-block-link">
                        Poverty
                    </a>

                    <a href="#" class="tags-block-link">
                        Clean Water
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>