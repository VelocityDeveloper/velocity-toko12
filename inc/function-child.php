<?php

/**
 * Fuction yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('after_setup_theme', 'velocitychild_theme_setup', 9);
function velocitychild_theme_setup()
{


    //remove action from Parent Theme
    remove_action('justg_header', 'justg_header_menu');
    remove_action('justg_do_footer', 'justg_the_footer_open');
    remove_action('justg_do_footer', 'justg_the_footer_content');
    remove_action('justg_do_footer', 'justg_the_footer_close');
    remove_theme_support('widgets-block-editor');

    register_nav_menus(array(
        'second_menu' => __('Second Menu', 'justg'),
    ));
}


if (!function_exists('justg_header_open')) {
    function justg_header_open()
    {
        echo '<header id="wrapper-header">';
        echo '<div id="wrapper-navbar" class="px-0" itemscope itemtype="http://schema.org/WebSite">';
    }
}
if (!function_exists('justg_header_close')) {
    function justg_header_close()
    {
        echo '</div>';
        echo '</header>';
    }
}

///add action builder part
add_action('justg_header', 'justg_header_toko12');
function justg_header_toko12()
{
    require_once(get_stylesheet_directory() . '/inc/part-header.php');
}
add_action('justg_do_footer', 'justg_footer_toko12');
function justg_footer_toko12()
{
    require_once(get_stylesheet_directory() . '/inc/part-footer.php');
}

add_action('justg_before_wrapper_content', 'justg_before_wrapper_content');
function justg_before_wrapper_content()
{
    echo '<div class="px-2">';
    echo '<div class="container px-0 py-3 mx-auto mb-3">';
}
add_action('justg_after_wrapper_content', 'justg_after_wrapper_content');
function justg_after_wrapper_content()
{
    echo '</div>';
    echo '</div>';
}

/**
 * Halaman Katalog & Profil Saya VD Store (Pengaturan VD Store > Halaman, halaman ber-[wp_store_catalog]
 * / [wp_store_profile], atau template katalog tema) selalu tampil penuh tanpa sidebar.
 */
function velocity_toko12_halaman_penuh()
{
    if (!is_page()) {
        return false;
    }
    $s = (array) get_option('wp_store_settings', []);
    foreach (['page_catalog', 'page_profile'] as $kunci) {
        if (!empty($s[$kunci]) && is_page((int) $s[$kunci])) {
            return true;
        }
    }
    $isi = (string) get_post_field('post_content', get_queried_object_id());
    return has_shortcode($isi, 'wp_store_catalog') || has_shortcode($isi, 'wp_store_profile')
        || strpos((string) get_page_template_slug(), 'katalog') !== false;
}

if (!function_exists('justg_right_sidebar_check')) {
    /**
     * Right sidebar check
     * 
     */
    function justg_right_sidebar_check()
    {
        $sidebar_pos            = velocitytheme_option('justg_sidebar_position', 'right');
        $pages_sidebar_pos      = velocitytheme_option('justg_pages_sidebar_position');
        $singular_sidebar_pos   = velocitytheme_option('justg_blogs_sidebar_position');
        $archives_sidebar_pos   = velocitytheme_option('justg_archives_sidebar_position');
        $shop_sidebar_pos       = velocitytheme_option('justg_shop_sidebar_position', 'default');

        if ($sidebar_pos === 'disable' || velocity_toko12_halaman_penuh()) {
            return;
        }

        if (is_page() && !in_array($pages_sidebar_pos, array('', 'default'))) {
            $sidebar_pos = $pages_sidebar_pos;
        }

        if (is_singular() && !in_array($singular_sidebar_pos, array('', 'default'))) {
            $sidebar_pos = $singular_sidebar_pos;
        }

        if (is_archive() && !in_array($archives_sidebar_pos, array('', 'default'))) {
            $sidebar_pos = $archives_sidebar_pos;
        }

        if (is_singular('fl-builder-template')) {
            return;
        }

        if ('right' === $sidebar_pos) {
            if (!is_active_sidebar('main-sidebar') && !has_action('justg_before_main_sidebar') && !has_action('justg_after_main_sidebar')) {
                return;
            }

?>
            <div class="widget-area right-sidebar col-sm-4 p-2 order-md-1 order-3" id="right-sidebar" role="complementary">
                <div class="sticky-top">
                    <?php do_action('justg_before_main_sidebar'); ?>
                    <?php dynamic_sidebar('main-sidebar'); ?>
                    <?php do_action('justg_after_main_sidebar'); ?>
                </div>
            </div>
    <?php
        }
    }
}

function vd_limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
