<div class="container bg-white">
    <?php if (has_header_image()) :
        echo '<div class="haeder-images">';
        echo '<a class="d-block" href="' . get_home_url() . '">';
        echo '<img class="w-100" src="' . esc_url(get_header_image()) . '" />';
        echo '</a>';
        echo '</div>';
    endif; ?>
</div>

<?php require_once(get_stylesheet_directory() . '/inc/part-headertop.php'); ?>

<div class="container px-0">
    <?php $sitelogo = velocitytheme_option('custom_logo'); ?>
    <div class="position-relative p-2 text-md-start text-center">
        <?php if ($sitelogo) : ?>
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo wp_get_attachment_image_url($sitelogo, 'full'); ?>" alt="Site Logo" loading="lazy">
            </a>
        <?php endif;  ?>
    </div>
    <nav id="main-nav" class="navbar navbar-expand-md bg-sm-light d-block navbar-light p-0" aria-labelledby="main-nav-label">

        <h2 id="main-nav-label" class="screen-reader-text">
            <?php esc_html_e('Main Navigation', 'justg'); ?>
        </h2>

        <button class="navbar-toggler text-start w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
            <span class="navbar-toggler-icon pe-2"></span>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavOffcanvas">

            <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'container_class' => 'offcanvas-body',
                    'container_id'    => '',
                    'menu_class'      => 'navbar-nav justify-content-start flex-grow-1 pe-3',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 4,
                    'walker'          => new justg_WP_Bootstrap_Navwalker(),
                )
            );
            ?>
        </div><!-- .offcanvas -->
    </nav>
</div>

<div class="container bg-theme px-0">
    <nav id="second-nav" class="navbar navbar-expand-md d-block navbar-light p-0" aria-labelledby="second-nav-label">

        <h2 id="second-nav-label" class="screen-reader-text">
            <?php esc_html_e('Second Navigation', 'justg'); ?>
        </h2>

        <button class="navbar-toggler text-start w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas2" aria-controls="navbarNavOffcanvas2" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
            <span class="navbar-toggler-icon pe-2"></span>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavOffcanvas2">

            <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'second_menu',
                    'container_class' => 'offcanvas-body',
                    'container_id'    => '',
                    'menu_class'      => 'navbar-nav justify-content-start flex-grow-1 pe-3',
                    'fallback_cb'     => '',
                    'menu_id'         => 'second-menu',
                    'depth'           => 4,
                    'walker'          => new justg_WP_Bootstrap_Navwalker(),
                )
            );
            ?>
        </div><!-- .offcanvas -->
    </nav>
</div>