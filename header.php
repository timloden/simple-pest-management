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
    <?php 
    wp_head(); 
    $logo = get_field('logo', 'option');
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
                            src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"></a>
                    <?php else : ?>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Simple Pest Management</a>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end justify-content-lg-between align-items-center w-100">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-primary', 'container' => '', 'menu_class' => 'nav d-none d-lg-flex', 'add_li_class'  => 'nav-item', 'depth' => 2, 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>

                        <a class="btn btn-primary btn-phone-number d-none d-lg-inline-block" href="tel:6193737378">(619)
                            373-PEST
                            (7378)</a>

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

        <div id=" content" class="site-content">