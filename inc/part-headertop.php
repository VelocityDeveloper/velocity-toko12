<div class="header-top bg-theme">
    <div class="container p-0 text-center text-md-start d-md-flex align-items-center justify-content-end">
        <div class="kontak-seller px-2"><?php echo do_shortcode('[kontak style="false"]'); ?></div>
        <div class="profile-icons px-2">
            <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                <div class="p-2"><?php echo do_shortcode('[profile]'); ?></div>
                <div class="p-2"><?php echo do_shortcode('[cart]'); ?></div>
                <div class="py-1">
                    <form action="<?php echo get_site_url(); ?>/products" class="d-flex" method="get">
                        <input style="font-size: 12px;" type="text" name="s" placeholder="Cari.." class="form-control form-control-sm px-2 py-1 h-auto rounded-0 border-0">
                        <button type="submit" class="border-0 btn btn-dark btn-sm py-1 h-auto rounded-0 border-0">
                            <svg class="bi" fill="currentColor" width="10" height="10">
                                <use href="#search"></use>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>