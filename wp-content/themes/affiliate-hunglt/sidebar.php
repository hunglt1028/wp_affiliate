<nav id="top" class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <?php if(has_custom_logo()):
                $logo_id=get_theme_mod('custom_logo');
                $logo_url=wp_get_attachment_url($logo_id);
                ?>
                <img src="<?=$logo_url?>" class="logo img-fluid" alt="Logo">
            <?php endif?>
            <span>
                <?=bloginfo('name')?>
                <small><?=bloginfo('description')?></small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary', // Định nghĩa vị trí menu muốn hiển thị
                'depth'             => 2, // Độ sâu của menu hiển thị
                'container'         => false, // Bỏ container bao quanh menu
                'menu_class'        => 'navbar-nav ms-auto', // Định nghĩa class cho menu cha
                'menu_id'           => '', // Định nghĩa ID cho menu cha
                'walker'            => new My_Walker_Nav_Menu(), // Sử dụng walker để hiển thị menu theo bootstrap 5
            ) );
            ?>
        </div>
        <!--<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#top">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Causes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Volunteer</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link click-scroll dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="news.html">News Listing</a></li>

                        <li><a class="dropdown-item" href="news-detail.html">News Detail</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Contact</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="donate.html">Donate</a>
                </li>
            </ul>
        </div>-->
    </div>
</nav>
