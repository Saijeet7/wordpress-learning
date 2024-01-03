<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>

    <!-- Included via Site Options -->
    <?php
    if (get_field("site_header_code") != "") {
        echo $get_field("site_header_code");
    }
    ?>
    <!-- End Site Options -->
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Domine:wght@400;700&family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body <?php body_class(); ?>>
    <!-- Included via Site Options -->
    <?php
    if (get_field("site_header_code") != "") {
        echo $get_field("site_body_code");
    }
    ?>
    <!-- End Site Options -->
    <header class="header js-header">
        <div class="container">
            <div class="logo__container">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo__link">
                    <div class="logo__wrap">
                        <?php //echo file_get_contents(IMAGES_SERVER . '/logo.svg'); ?>
                    </div>
                    <meta itemprop="name" content="<?php bloginfo('name'); ?>">
                </a>
            </div>
            <a href="#" class="mobileNav__toggle js-nav-toggle">
                <span class="accessible-text">Click to toggle navigation menu.</span>
                <div class="menuBar__container">
                    <span class="menuBar"></span>
                    <span class="menuBar"></span>
                    <span class="menuBar"></span>
                </div>
            </a>
            <?php
            $menuArgs = array(
                'container' => false,
                'menu' => 'Main Navigation',
                'menu_class' => 'primaryNav'
            );
            wp_nav_menu($menuArgs);
            ?>
        </div>
    </header>