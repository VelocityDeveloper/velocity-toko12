<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = velocitytheme_option('justg_container_type', 'container');
?>

<div class="wrapper" id="archive-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php //do_action('justg_before_content'); 
            ?>

            <main class="site-main col order-2 p-0" id="main">

                <?php
                require_once(get_stylesheet_directory() . '/inc/home-slider.php');
                ?>

                <div class="card my-3 bg-gradients color-theme border-0 py-2 px-3 fs-6 fw-bold text-center">
                    <?php echo get_option('blogname') . ' - ' . get_option('blogdescription'); ?>
                </div>

                <?php
                require_once(get_stylesheet_directory() . '/inc/home-products.php');
                ?>

                <?php
                require_once(get_stylesheet_directory() . '/inc/home-blogs.php');
                ?>

            </main><!-- #main -->

            <!-- Do the right sidebar check. -->
            <?php //do_action('justg_after_content'); 
            ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
