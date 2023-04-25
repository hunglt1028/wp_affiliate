<?php
    //Lấy 5 bài viết mới nhất
   $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
?>
<section class="news-section section-padding" id="section_5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <?php if ($query->have_posts() ) :
                    /* Start the Loop */
                    while ($query->have_posts() ) : $query->the_post();
                        get_template_part( 'partials/grid-layout' );
                    endwhile;
                else :
                    get_template_part( 'no-results' ); 
                endif; 
                ?>
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