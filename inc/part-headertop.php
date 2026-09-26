<div class="header-top bg-theme">
    <div class="container p-0 text-center text-md-start d-md-flex align-items-center justify-content-end">
        <div class="kontak-seller px-2"><?php echo velocity_toko12_kontak('btn btn-sm btn-link', false); ?></div>
        <div class="profile-icons px-2">
            <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                <div class="p-2"><?php echo velocity_toko12_profil(); ?></div>
                <div class="p-2"><?php echo do_shortcode('[wp_store_cart size="16"]'); ?></div>
                <div class="py-1">
                    <form action="<?php echo esc_url(get_post_type_archive_link('store_product') ?: home_url('/')); ?>" class="d-flex" method="get" role="search">
                        <input style="font-size: 12px;" type="text" name="s" placeholder="Cari.." aria-label="Cari produk" class="form-control form-control-sm px-2 py-1 h-auto rounded-0 border-0" value="<?php echo esc_attr(get_search_query()); ?>">
                        <input type="hidden" name="post_type" value="store_product">
                        <button type="submit" class="border-0 btn btn-dark btn-sm py-1 h-auto rounded-0 border-0" aria-label="Cari">
                            <?php echo velocity_toko12_ikon('cari', 10); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
