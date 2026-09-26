<?php
/**
 * Pengaturan Toko 12 di Customizer bawaan WordPress (tanpa Kirki).
 *
 * Slider produk Kirki (slider_home = kategori category-product) diganti pilihan kategori
 * store_product_cat (velocity_toko12_slider_kategori). Latar
 * website memakai pengaturan Background tema induk; latar Kirki lama (background_website)
 * tetap dicetak. Warna teks/judul/link: Theme Colors tema induk.
 *
 * @package justg
 */

defined('ABSPATH') || exit;

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_panel('panel_toko12', [
        'priority' => 10,
        'title'    => __('Velocity Toko 12', 'justg'),
    ]);

    // Warna
    $wp_customize->add_section('section_colorvelocity', [
        'panel'    => 'panel_toko12',
        'title'    => __('Warna', 'justg'),
        'priority' => 10,
    ]);
    $warna = [
        'velocity_toko12_warna_utama'    => [__('Warna Utama', 'justg'), __('Judul widget, tombol, harga, dan teks menu.', 'justg'), '#ff282f'],
        'velocity_toko12_warna_sekunder' => [__('Warna Sekunder', 'justg'), __('Tombol saat disorot dan halaman aktif.', 'justg'), '#333333'],
    ];
    foreach ($warna as $id => [$label, $ket, $bawaan]) {
        $wp_customize->add_setting($id, [
            'default'           => $bawaan,
            'sanitize_callback' => 'sanitize_hex_color',
        ]);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, [
            'label'       => $label,
            'description' => $ket,
            'section'     => 'section_colorvelocity',
        ]));
    }

    // Font (Google Fonts)
    $wp_customize->add_section('section_font', [
        'panel'    => 'panel_toko12',
        'title'    => __('Font', 'justg'),
        'priority' => 15,
    ]);
    foreach (['velocity_toko12_font_judul' => [__('Font Judul', 'justg'), ''], 'velocity_toko12_font_teks' => [__('Font Teks', 'justg'), 'Roboto']] as $id => [$label, $bawaan]) {
        $wp_customize->add_setting($id, [
            'default'           => $bawaan,
            'sanitize_callback' => function ($v) use ($bawaan) {
                return array_key_exists((string) $v, velocity_toko12_daftar_font()) ? $v : $bawaan;
            },
        ]);
        $wp_customize->add_control($id, [
            'label'   => $label,
            'section' => 'section_font',
            'type'    => 'select',
            'choices' => velocity_toko12_daftar_font(),
        ]);
    }

    // Carousel produk beranda (pengganti [vtoko-slider-product] Velocity Toko)
    $wp_customize->add_section('section_slider', [
        'panel'       => 'panel_toko12',
        'title'       => __('Slider Produk Home', 'justg'),
        'description' => __('Carousel produk di atas beranda. Kosong = produk terbaru semua kategori.', 'justg'),
        'priority'    => 20,
    ]);
    $wp_customize->add_setting('velocity_toko12_slider_kategori', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $pilihan = ['' => __('Semua kategori', 'justg')];
    $kat = get_terms(['taxonomy' => 'store_product_cat', 'hide_empty' => false]);
    if (!is_wp_error($kat)) {
        foreach ($kat as $k) {
            $pilihan[$k->term_id] = $k->name;
        }
    }
    $wp_customize->add_control('velocity_toko12_slider_kategori', [
        'label'   => __('Kategori', 'justg'),
        'section' => 'section_slider',
        'type'    => 'select',
        'choices' => $pilihan,
    ]);
});

/**
 * Pilihan font Google (nama keluarga => label). Kosong = font bawaan tema induk.
 */
function velocity_toko12_daftar_font()
{
    $font = ['' => __('Bawaan tema', 'justg')];
    foreach (['Oswald', 'Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Poppins', 'PT Sans', 'Source Sans 3', 'Nunito', 'Raleway', 'Playfair Display', 'Merriweather'] as $f) {
        $font[$f] = $f;
    }
    return $font;
}

/**
 * Font terpilih: [judul, teks].
 */
function velocity_toko12_font()
{
    $daftar = velocity_toko12_daftar_font();
    $judul = get_theme_mod('velocity_toko12_font_judul', '');
    $teks = get_theme_mod('velocity_toko12_font_teks', 'Roboto');
    return [isset($daftar[$judul]) ? $judul : '', isset($daftar[$teks]) ? $teks : 'Roboto'];
}

add_action('wp_enqueue_scripts', function () {
    $keluarga = array_unique(array_filter(velocity_toko12_font()));
    if (!$keluarga) {
        return;
    }
    $q = implode('&', array_map(function ($f) {
        return 'family=' . str_replace(' ', '+', $f) . ':wght@400;700';
    }, $keluarga));
    wp_enqueue_style('velocity-toko12-font', 'https://fonts.googleapis.com/css2?' . $q . '&display=swap', [], null);
});

/**
 * CSS dari pengaturan di atas. Dicetak di akhir <head> seperti Kirki dulu, supaya
 * menang atas CSS Bootstrap tema induk.
 */
add_action('wp_head', function () {
    $utama = sanitize_hex_color(get_theme_mod('velocity_toko12_warna_utama', '#ff282f')) ?: '#ff282f';
    $sekunder = sanitize_hex_color(get_theme_mod('velocity_toko12_warna_sekunder', '#333333')) ?: '#333333';
    [$judul, $teks] = velocity_toko12_font();
    $css = ($teks ? 'body{font-family:"' . $teks . '",sans-serif;}' : '')
        . ($judul ? 'h1,h2,h3,h4,h5,h6{font-family:"' . $judul . '",sans-serif;}' : '')
        . ':root{--velocitytoko-color-main:' . $utama . ';--velocitytoko-color-secondary:' . $sekunder . ';}'
        . '.bg-colortheme,.page-item.active .page-link{background-color:' . $utama . ';border-color:' . $utama . ';}'
        . '.bg-colortheme:hover{background-color:' . $sekunder . ';border-color:' . $sekunder . ';}'
        . '#primary-menu>li>a:hover,#primary-menu>li.current-menu-item>a,#primary-menu>li.current-menu-ancestor>a{color:' . $utama . ';}';

    $latar = get_theme_mod('background_website');
    if (is_array($latar)) {
        $aturan = [];
        foreach (['background-color', 'background-image', 'background-repeat', 'background-position', 'background-size', 'background-attachment'] as $prop) {
            $nilai = trim((string) ($latar[$prop] ?? ''));
            if ($nilai === '') {
                continue;
            }
            $aturan[] = $prop . ':' . ($prop === 'background-image' ? 'url(' . esc_url($nilai) . ')' : esc_attr($nilai));
        }
        if ($aturan) {
            $css .= 'body{' . implode(';', $aturan) . ';}';
        }
    }
    echo '<style id="velocity-toko12-customizer">' . wp_strip_all_tags($css) . '</style>' . "\n";
}, 100);
