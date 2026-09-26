<?php
// Carousel produk VD Store (kategori dari Customizer > Velocity Toko 12 > Slider Produk Home).
$slider = velocity_toko12_slider_produk(10);
if ($slider) : ?>
    <div class="container bg-white my-2 p-2">
        <?php echo $slider; ?>
    </div>
<?php endif;
