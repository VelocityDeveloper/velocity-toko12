<?php $slider_home = velocitytheme_option('slider_home'); ?>

<?php if ($slider_home) : ?>
    <div class="container bg-white my-2 p-2">
        <?php echo do_shortcode('[vtoko-slider-product category="' . $slider_home . '" limit="10"]'); ?>
    </div>
<?php endif; ?>