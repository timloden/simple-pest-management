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
    <?php echo get_field('header_embed', 'option'); ?>
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
    $header_cta_text = get_field('header_cta_text');

    if(isset($_COOKIE['global-message'])){
        $cookie = $_COOKIE['global-message'];
    } else {
        $cookie = '';
    }
?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProfessionalService",
        "name": "Simple Pest Management",
        "image": "https://www.simplepest.com/wp-content/uploads/2020/07/simple-pest-logo-2x.png",
        "@id": "https://www.simplepest.com/",
        "url": "https://www.simplepest.com/",
        "telephone": "+16193737378",
        "priceRange": "$$",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "10739 Woodside Ave Ste A",
            "addressLocality": "Santee",
            "addressRegion": "CA",
            "postalCode": "92071",
            "addressCountry": "US"
        },
        "openingHoursSpecification": [{
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday"
            ],
            "opens": "08:00",
            "closes": "21:00"
        }, {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "Saturday",
            "opens": "09:00",
            "closes": "18:00"
        }],
        "sameAs": [
            "https://www.facebook.com/SimplePestManagement/",
            "https://www.linkedin.com/company/simple-pest-management"
        ],
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+16193737378",
            "contactType": "customer service",
            "areaServed": "San Diego",
            "availableLanguage": "en"
        }, {
            "@type": "ContactPoint",
            "telephone": "+19169097378",
            "contactType": "customer service",
            "areaServed": "Sacramento",
            "availableLanguage": "en"
        }],
        "hasOfferCatalog": [{
                "@type": ["OfferCatalog"],
                "name": "Residential Pest Control",
                "url": "https://www.simplepest.com/services/residential-pest-control/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Commercial Pest Control",
                "url": "https://www.simplepest.com/services/commercial-pest-control/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Rodent Control",
                "url": "https://www.simplepest.com/services/rodent-control/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Bed Bugs Program",
                "url": "https://www.simplepest.com/services/bed-bugs/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Snake Deterrent Program",
                "url": "https://www.simplepest.com/services/snake-control/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Cockroach Program",
                "url": "https://www.simplepest.com/services/cockroach-program/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Fleas, Ticks, Mites Program",
                "url": "https://www.simplepest.com/services/flea-ticks-mite-program/"
            },
            {
                "@type": ["OfferCatalog"],
                "name": "Car accident lawsuit loans",
                "url": "https://upliftlegalfunding.com/car-accident-loans/"
            }
        ],
        "department": [{
            "@type": "ProfessionalService",
            "name": "Simple Pest Management",
            "image": "https://www.simplepest.com/wp-content/uploads/2020/07/simple-pest-logo-2x.png",
            "@id": "https://www.simplepest.com/location/san-diego-county/",
            "url": "https://www.simplepest.com/location/san-diego-county/",
            "telephone": "+16193737378",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "10739 Woodside Ave Ste A",
                "addressLocality": "Santee",
                "addressRegion": "CA",
                "postalCode": "92071",
                "addressCountry": "US"
            },
            "hasMap": "https://www.google.com/maps?cid=2007139651071388648",
            "openingHoursSpecification": [{
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "08:00",
                "closes": "21:00"
            }, {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "09:00",
                "closes": "18:00"
            }]
        }, {
            "@type": "ProfessionalService",
            "name": "Simple Pest Management",
            "image": "https://www.simplepest.com/wp-content/uploads/2020/07/simple-pest-logo-2x.png",
            "@id": "https://www.simplepest.com/location/sacramento-county/",
            "url": "https://www.simplepest.com/location/sacramento-county/",
            "telephone": "+19169097378",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "3453 Ramona Ave Suite 12",
                "addressLocality": "Sacramento",
                "addressRegion": "CA",
                "postalCode": "95826",
                "addressCountry": "US"
            },
            "hasMap": "https://www.google.com/maps?cid=980652533771243809",
            "openingHoursSpecification": [{
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "07:30",
                "closes": "19:30"
            }, {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "08:30",
                "closes": "17:00"
            }]
        }]
    }
    </script>
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
                            href="tel:<?php echo preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>"><?php echo ($header_cta_text ? $header_cta_text : get_field('phone_number', 'option')); ?></a>

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