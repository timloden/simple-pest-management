<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package restoration-performance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <?php the_field('header_embed', 'option'); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo get_template_directory_uri(); ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri(); ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php 
    wp_head(); 
    $logo = get_field('logo', 'option');

    if(isset($_COOKIE['global-message'])){
        $cookie = $_COOKIE['global-message'];
    } else {
        $cookie = '';
    }
?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <header class="header sticky-top pb-2 bg-white shadow-sm">
            <div class="topbar bg-primary">
                <div class="container py-2">
                    <div class="col text-center">
                        <p class="mb-0 text-white">Already a customer? <a class="text-white"
                                href="<?php echo esc_url(get_field('client_login_link', 'option')) ?>">Login
                                to our customer portal <i class="las la-angle-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container pt-2">
                <nav class="d-flex align-items-center">
                    <?php if (get_field('logo', 'option')) : 
                    $logo = get_field('logo', 'option');
                    ?>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img
                            src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"
                            style="width: 200px;"></a>
                    <?php else : ?>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Simple Pest Management</a>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end justify-content-lg-between align-items-center w-100">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-primary', 'container' => '', 'menu_class' => 'nav d-none d-lg-flex', 'add_li_class'  => 'nav-item', 'depth' => 2, 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>

                        <a class="btn btn-primary btn-orange btn-phone-number d-none d-lg-inline-block"
                            href="tel:<?php echo get_field('phone_number', 'option'); ?>"><?php echo get_field('phone_number', 'option'); ?></a>

                        <button class="d-inline-block d-lg-none btn ml-3 p-1" type="button" data-toggle="collapse"
                            data-target="#mobile-header-menu" aria-controls="mobile-header-menu">
                            <i class="las la-bars"></i>
                        </button>
                    </div>

                </nav>
                <!-- mobile menu -->
                <div class="d-flex d-lg-none">
                    <div class="col px-0">
                        <?php wp_nav_menu( array( 'theme_location' => 'mobile-primary', 'container' => 'div','container_id' => 'mobile-header-menu', 'container_class' => 'collapse', 'menu_class' => 'nav flex-column', 'add_li_class'  => 'nav-item', 'depth' => 2 ) ); ?>
                    </div>
                    <!-- end mobile menu -->
                </div>
            </div>
        </header>
        <?php if ($cookie != 'closed' && get_field('global_message', 'option')) : ?>

        <div class="alert alert-info mb-0 global-message">
            <div class="container">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="py-2">
                    <span class="font-weight-bold mb-1">Attention:</span>
                    <?php echo esc_attr(get_field('global_message', 'option')); ?>
                </div>
            </div>


        </div>
        <?php endif; ?>
        <div id=" content" class="site-content">