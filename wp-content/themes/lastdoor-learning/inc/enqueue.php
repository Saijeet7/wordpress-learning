<?php
function e11_scripts()
{
    if (!is_admin()) {
        ### Core
        // Deregister WordPress jQuery and register Google's
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', false);
        wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
        wp_enqueue_style('anton-font-css', '//fonts.googleapis.com/css2?family=Anton&display=swap', false, '1.0');

        wp_enqueue_style('fancybox-css', STYLEDIR . '/css/libs/fancybox.css', false, '1.0');

        // Main Stylsheet
        $style_dir = get_stylesheet_directory();
        $css_ver = date("ymd-Gis", filemtime($style_dir . '/style.css'));
        wp_enqueue_style('css', STYLEDIR . '/style.css', false, $css_ver);

        // Main Scripts (this file is concatenated from the files inside of js/development/ )
        $js_ver = date("ymd-Gis", filemtime($style_dir . '/js/scripts.min.js'));
        wp_enqueue_script('scripts', JSDIR . '/scripts.min.js', array('jquery'), $js_ver, true);
        wp_localize_script('scripts', 'localized', array('ajaxurl' => admin_url('admin-ajax.php'), 'siteurl' => site_url()));
    }
    wp_dequeue_style('wp-block-library');
}

add_action('wp_enqueue_scripts', 'e11_scripts', 100);


function e11_tinymce_style()
{
    wp_enqueue_style('fwff-admin-fancybox-css', STYLEDIR . '/css/libs/fancybox.css', false, '1.0');
    wp_enqueue_script('fwff-admin-fancybox', JSDIR . '/libs/fancybox.js', array('jquery'), false, true);
    wp_enqueue_script('fwff-admin-scripts', JSDIR . '/admin-scripts.js', array('jquery'), '20231003', true);
    wp_localize_script('fwff-admin-scripts', 'localized', array('ajaxurl' => admin_url('admin-ajax.php'), 'siteurl' => site_url()));
}

add_action('admin_init', 'e11_tinymce_style');