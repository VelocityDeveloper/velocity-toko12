<?php
// The Query.
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 8,
);
$the_query = new WP_Query($args);

// The Loop.
if ($the_query->have_posts()) {
    echo '<div class="bg-white p-2">';
    echo '<div class="row g-2 m-0">';
    while ($the_query->have_posts()) {
        $the_query->the_post();
        do_action('velocitytoko_product_loop');
    }
    echo '</div>';

    echo '<div class="text-center mt-2 mb-5">';
    echo '<a class="btn btn-outline-secondary btn-sm px-4 border-theme color-theme fw-bold shadow-sm" href="' . get_site_url() . '/products">Produk lainnya</a>';
    echo '</div>';
    echo '</div>';
} else {
    esc_html_e('Sorry, no products here.');
}


// Restore original Post Data.
wp_reset_postdata();
