<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
$city = get_field('city');
$location = get_field('location');
$hero_image = get_field('hero_image') ? get_field('hero_image') : get_template_directory_uri() . '/assets/images/1-featured-image.jpg';
$rodent_page = get_field('rodent_page');
$cockroach_page = get_field('cockroach_page');
$fleas_page = get_field('flea_ticks_and_mites_page');
$ants_page = get_field('ants_page');
$surround_areas = [];

if ($location) {
    $term = get_term( $location[0], 'location' );
    $phone_number = get_field('location_phone_number', 'term_' . $term->term_id  );
    $area = $term->name;

    $args = array(
        'post_type' => 'service-areas',
        'posts_per_page' => 10,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => $term->term_id 
            )
        )
    );

    $service_areas = new WP_Query( $args );

    if ($service_areas->have_posts()):
 
        while($service_areas->have_posts()):
     
            $service_areas->the_post();

            array_push($surround_areas, str_replace(' Pest Control', '', get_the_title()));
     
        endwhile;
     
        /* Restore original Post Data */
        wp_reset_postdata();    
     
    endif;
    

} else {
    $phone_number = '(866) 887-7378';
    $area = '';
}
?>
<div id="primary" class="content-area services-single">
    <main id="main" class="site-main">
        <section class="service-hero position-relative"
            style="background-image: url(<?php echo esc_url($hero_image); ?>)">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1 class="text-white mb-3">Cockroach Control Service in <?php echo $city; ?></h1>
                        <p class="text-white">Enjoy the peace of mind of a clean, cockroach-free home today, and never
                            deal with unwelcome roommates again. Call us for same-day service or fill out the form below
                            to schedule your initial service at your convenience.

                        </p>

                        <ul class="list-unstyled">
                            <li class="text-white mb-2">✅ Pest-Free Home <strong>Guarantee</strong></li>
                            <li class="text-white mb-2">✅ <strong>Same Day</strong> Service Available</li>
                            <li class="text-white">✅ <strong>Kid & Pet</strong> Friendly Treatment</li>
                        </ul>

                        <p class="mb-0 text-white">When you've spotted a cockroach scurrying across your
                            <?php echo $city; ?>
                            home, you know it's time to call for professional help. At Simple Pest, we specialize in
                            superior cockroach control in <?php echo $city; ?>, offering unparalleled pest control
                            services that
                            rid your residence or business of these unsightly critters.

                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <!-- <div class="row justify-content-center py-5">
                <div class="col-12 col-lg-10">
                    <p class="mb-0 text-center">We also service commercial properties including food processing
                        facilities,
                        restaurants, schools, office buildings and many other types of locations. At Simple Pest
                        Management, we go out of our way to tailor service to our customer&apos;s specific needs;
                        whether they are looking for year-round protection or a one-time service.</p>
                </div>
            </div> -->

            <!-- <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold"></p>
                    <h2 class="mb-4">Top-Rated <?php //echo $city; ?> Pest Control</h2>
                    <p class="mb-0">Ranked as one of the leading pest control companies in <?php //echo $city; ?> and surrounding
                        areas like <?php //echo implode(', ', $surround_areas); ?>, our reputation is built on a commitment to
                        provide a pest-free environment for homeowners and businesses alike.
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php //echo get_template_directory_uri(); ?>/assets/images/2-simple-pest-management-truck.jpg">
                    </div>

                </div>
            </div> -->
        </div>

        <section class="service-area-cta bg-primary py-5 mb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="mb-2 mb-lg-0 text-white">Why wait? Get those unwelcome guests out of your home with
                            the most
                            knowledgeable cockroach control team in <?php echo $city; ?>, CA. With our bug-free
                            guarantee,
                            you have
                            nothing to lose...except for the cockroaches!
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold"
                            href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row align-items-center  py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="service-area-image-bg left">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/3-simple-pest-management-exterminator.jpg">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="kicker text-primary font-weight-bold">Reliable &amp; Effective Elimination</p>
                    <h2 class="mb-4">Top-Rated <?php echo $city; ?> Pest Control</h2>
                    <p class="mb-0">Ranked as one of the leading pest control companies in <?php echo $city; ?> and
                        surrounding
                        areas like <?php echo implode(', ', $surround_areas); ?>, our reputation is built on a
                        commitment to
                        provide a pest-free environment for homeowners and businesses alike.
                    </p>
                </div>
            </div>

            <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Local & Family Owned</p>
                    <h2>Don&apos;t Let Roaches Rule Your <?php echo $city; ?> Home</h2>
                    <p>Cockroaches are more than just household pests - they are carriers of diseases, leaving behind
                        droppings that can contaminate your living areas. Simple Pest focuses on cockroach control in
                        <?php echo $city; ?>, using advanced sprays and baits to target different species of
                        cockroaches,
                        including the notorious German cockroaches, brown-banded cockroaches, and American cockroaches.
                    </p>
                    <p class="h4 mb-0"><a class="font-weight-bold"
                            href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/4-simple-pest-management-customer.jpg">
                    </div>
                </div>
            </div>
        </div>

        <section class="service-area-cta bg-primary py-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="h2 text-white">Do you need cockroach control in <?php echo $city; ?>?</p>
                        <p class="mb-2 mb-lg-0 text-white">Our team of pest experts is ready to take your call. We offer
                            advice
                            on pest
                            control and a range of services to eliminate pests from your property. Don&apos;t let the
                            pests gain control of your property. Call Simple Pest Management
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold"
                            href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="service-area-image-bg left">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/5-residential-pest-control.jpg">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <h2>Residential Cockroach Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        pest problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Cockroach Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Cockroach Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Cockroach Control in <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo Cockroach Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Cockroach Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for your cockroach
                        control needs in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Offices.</li>
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Retail.</li>
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Medical Centers.
                        </li>
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Restaurants.</li>
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Schools.</li>
                        <li class="font-weight-bold mb-1">Cockroach Control <?php echo $city; ?> for Warehouses.</li>
                        <li class="font-weight-bold">Cockroach Control <?php echo $city; ?> for Supermarkets.</li>
                    </ul>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/6-commercial-pest-control.jpg">
                    </div>
                </div>
            </div>
        </div>

        <section class="range-of-services py-3 py-lg-5">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12 text-center">
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Cockroach Control Services</h2>
                        <p class="mb-0 py-4">Every cockroach species is unique. Fortunately, we're equipped to deal with
                            a
                            variety of them, including:
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rat" href="#">German
                                    Cockroaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mice" href="#">Brown-Banded
                                    Cockroaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="moles" href="#">Asian
                                    (Oriental) Cockroaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="voles" href="#">Smokybrown
                                    Cockroaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mud-daubers" href="#">American
                                    Cockroaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="turkestan" href="#">Turkestan
                                    Cockroaches</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rat-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>German Cockroaches</h2>
                                <p class="mb-0">German cockroaches, although small in size, pose a significant problem
                                    due to their rapid reproduction rates. Favored spots include kitchens and bathrooms,
                                    where they have easy access to food and moisture. Their elusive nature makes them
                                    challenging to exterminate. At Simple Pest, our treatments target their habitats
                                    directly, effectively destroying the roaches and their egg cases to prevent future
                                    infestations.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-german-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mice-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Brown-Banded Cockroaches
                                </h2>
                                <p class="mb-0">Brown-Banded cockroaches prefer warm and dry locations, often high above
                                    the ground such as in upper cabinets or behind picture frames. Unlike many other
                                    cockroach species, they require less moisture and can be found throughout any
                                    structure, not just in the damp areas. Our technicians are trained to identify their
                                    hiding spots, apply appropriate treatments, and suggest preventive measures to
                                    ensure they don't return.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-brown-banded-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="moles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Asian (Oriental) Cockroaches
                                </h2>
                                <p class="mb-0">Asian or Oriental cockroaches are primarily outdoor pests but can
                                    infiltrate homes and businesses in search of food and shelter. These roaches favor
                                    damp and dark areas and can often be found in leaf litters, mulches, and sewers. We
                                    incorporate environmental modifications and targeted treatments to manage these
                                    pests effectively, reducing their populations and setting up defenses to prevent
                                    future invasions.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-asian-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="voles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Smokybrown Cockroaches
                                </h2>
                                <p class="mb-0">Smokybrown cockroaches are a large species and thrive in moist
                                    environments. They are notorious for their strong flying capabilities, which enable
                                    them to spread rapidly. Our comprehensive pest management plans for Smokybrown
                                    cockroaches involve identifying and treating their hiding spots, removing conditions
                                    that attract them, and setting up preventive measures to protect against future
                                    invasions.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-smokey-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mud-daubers-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    American Cockroaches
                                </h2>
                                <p class="mb-0">American cockroaches, one of the largest species to invade homes, are
                                    drawn to damp areas such as sewers, basements, or around pipes and drains. They can
                                    cause significant distress and pose a health risk due to their diet of decaying
                                    organic matter. Our services employ advanced techniques to eliminate these pests and
                                    secure your property from future infestations.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-american-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="turkestan-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Turkestan Cockroaches
                                </h2>
                                <p class="mb-0">Turkestan cockroaches, relatively new invaders in California, are
                                    quickly replacing other roach species due to their rapid reproduction. They can
                                    become a significant issue in a short amount of time if not properly managed.
                                    Staying current with pest control developments, Simple Pest offers updated and
                                    effective solutions to control these invasive pests and protect your home or
                                    business.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-turkistan-cockroach.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="why-use-simple-pest py-3 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Why Choose Us for <?php echo $city; ?> Cockroach Control?</h2>
                        <p>When you contact Simple Pest Management to handle your pest situation, you get the following
                            in your service level agreement with us.
                        </p>

                        <p class="mb-0 py-4">Contact our team at
                            <a
                                href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                            for
                            immediate assistance.
                        </p>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 pb-5">
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/authentication.svg"
                                    alt="Proven process pest control icon">
                                <h3 class="card-title h6">Proven Cockroach Control Processes</h3>
                                <p class="mb-0">We developed our cockroach control strategies over decades of experience
                                    in the field. We have knowledge of the local area and how it affects pest behavior.
                                    You can rely on our team to deliver you a pest-free property.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/eco-friendly.svg"
                                    alt="Eco friendly pest control icon">
                                <h3 class="card-title h6">Eco-Friendly Cockroach Control Systems</h3>
                                <p class="mb-0">We use pest control products that meet 'Green Pro Certification,'
                                    suitable for use in California. Every Simple Pest exterminator is trained to handle
                                    and use these products safely and effectively. We care about the environment and
                                    ensure we don't harm the <?php echo $city; ?> ecosystem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/licensed.svg"
                                    alt="Licensed pest control icon">
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Cockroach Control</h3>
                                <p class="mb-0">Our business is established, licensed, and insured. We remove the risk
                                    of hiring people to work on your property. If anything happens while we're on-site,
                                    it&apos;s our problem, not yours.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/effective.svg"
                                    alt="Effective pest control icon">
                                <h3 class="card-title h6">Fast, Effective, Cockroach Elimination with Lasting Results
                                </h3>
                                <p class="mb-0">Our pest control systems yield fast, effective, and consistent results
                                    for our customers. We're confident we'll take care of your pest problem with lasting
                                    results for your property. Simple Pest offers you elite pest control services in
                                    <?php echo $city; ?>.

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/satisfaction.svg"
                                    alt="Satisfaction pest control icon">
                                <h3 class="card-title h6">100% Satisfaction Guarantee</h3>
                                <p class="mb-0">We include a 100% satisfaction guarantee with every job. We value our
                                    reputation as the leading pest control specialist in the <?php echo $city; ?>
                                    community.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/savings.svg"
                                    alt="Savings pest control icon">
                                <h3 class="card-title h6">Affordable, Competitive Rates</h3>
                                <p class="mb-0">Simple Pest offers pest inspections and estimates and affordable prices
                                    on pest control services. When you hire us, you leverage our experienced pest team
                                    and knowledge, giving you lasting results for your property. Our transparent
                                    invoicing includes no hidden charges.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($surround_areas)) : ?>

                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="service-area-image-bg left">
                            <img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/7-pest-control-near-you.jpg"
                                loading="lazy">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <h2>Service Areas</h2>
                        <p>Offering pest control services in <?php echo $city; ?> and the surrounding areas.</p>
                        <p>Contact us for assistance anywhere in the <?php echo $city; ?> area, including
                            <?php echo implode(', ', $surround_areas); ?>, and more.</p>
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Cockroach Control</p>
                        <p>We offer pest inspections at properties across <?php echo $city; ?>. Our team has years of
                            experience
                            identifying pest infestations on properties throughout <?php echo $area; ?>. We know what
                            to
                            look for
                            and how to stop it from spreading.
                        </p>
                        <p class="h4"><a class="font-weight-bold"
                                href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                        </p>
                    </div>
                </div>

                <?php endif; ?>
            </div>
        </section>

        <section class="service-area-cta bg-primary py-3 py-lg-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="h2 text-white">Get a Pest Inspection and Estimate for <?php echo $city; ?> Pest
                            Control</p>
                        <p class="mb-0 text-white">We offer pest inspections at properties across <?php echo $city; ?>.
                            Our team has
                            years of
                            experience identifying pest infestations on properties throughout <?php echo $area; ?>.
                            We know what to
                            look for and how to stop it from spreading.
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold"
                            href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mb-5 pb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-0"><?php echo $city; ?> Cockroach Control FAQ</h2>
                    <p class="mb-0 pt-4 pb-5">When you contract Simple Pest Management to handle your pest situation,
                        you get the following in your service level agreement with Contact our team at <a
                            href="tel:8668877378">(866) 887-7378</a>
                        for immediate assistance.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        How much does pest control cost for roaches?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The cost of professional pest control for roaches can vary depending
                                        on the size of the infestation and the area to be treated. Generally, the
                                        average cost for a professional pest control service is between $100 to $500 per
                                        visit. For more accurate pricing, please contact us for a free quote tailored to
                                        your specific needs.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Should you call an exterminator if you see a cockroach?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes. If you see a cockroach, it is usually an indicator of an
                                        infestation. Roaches are nocturnal and elusive, so if you're spotting them
                                        during the day, chances are there's a sizable population hiding in your home.
                                        Calling an exterminator like Simple Pest early on can help prevent a full-blown
                                        infestation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        What are the signs of roaches?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Signs of a cockroach infestation include spotting live or dead
                                        roaches, finding cockroach droppings which resemble coffee grounds, and noticing
                                        a musty or oily odor. Other signs include finding egg cases, known as oothecae,
                                        and seeing cockroaches during the day, which is often a sign of a larger
                                        infestation.

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Do cockroaches carry diseases?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes, cockroaches can carry diseases. They are known to carry
                                        bacteria that can cause food poisoning, diarrhea, allergies, and skin rashes.
                                        Some of the pathogens cockroaches can carry include E. coli and salmonella. This
                                        makes cockroach control crucial for maintaining a healthy home or business.


                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        What should you do if roaches come into your home?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">If you see roaches in your home, it is essential to call a
                                        professional pest control service like Simple Pest. We will help identify the
                                        extent of the infestation, eliminate the current population, and take measures
                                        to prevent future infestations. In the meantime, keep your house clean,
                                        particularly your kitchen and bathroom, as roaches are attracted to food and
                                        water sources.



                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                        Does roach control involve chemicals?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes, roach control often involves the use of chemicals, specifically
                                        insecticides. At Simple Pest, we use eco-friendly sprays and baits to eliminate
                                        cockroach infestations. We take safety seriously and our products are designed
                                        to be effective against roaches while keeping you, your family, and your pets
                                        safe.

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();