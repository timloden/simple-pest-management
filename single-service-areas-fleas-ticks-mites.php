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
                        <p class="mb-3 mb-lg-5 text-white">
                            <a class="text-white" href="<?php echo get_permalink();?>"><?php echo $city; ?> Pest
                                Control Service</a> / Fleas, Ticks and Mites
                        </p>
                        <h1 class="text-white mb-3">Fleas, Ticks, and Mites Control Service in <?php echo $city; ?></h1>
                        <p class="text-white">Enjoy the peace of mind of a clean, ant-free home today, and never deal
                            with unwelcome roommates again. Call us for same-day service or fill out the form below to
                            schedule your initial service at your convenience.
                        </p>

                        <ul class="list-unstyled">
                            <li class="text-white mb-2">✅ Pest-Free Home <strong>Guarantee</strong></li>
                            <li class="text-white mb-2">✅ <strong>Same Day</strong> Service Available</li>
                            <li class="text-white">✅ <strong>Kid & Pet</strong> Friendly Treatment</li>
                        </ul>

                        <p class="mb-0 text-white">When you've spotted fleas, ticks, or mites in your
                            <?php echo $city; ?> home,
                            you know it's time to call for professional help. At Simple Pest, we specialize in superior
                            pest control in <?php echo $city; ?>, offering unparalleled pest control services that rid
                            your
                            residence or business of these unsightly critters.
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

            <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold"></p>
                    <h2 class="mb-4">Top-Rated <?php echo $city; ?> Pest Control</h2>
                    <p>Ranked as one of the leading pest control companies in <?php echo $city; ?> and surrounding areas
                        like
                        <?php echo $area; ?>, our reputation is built on a commitment to provide a
                        pest-free environment for homeowners and businesses alike.
                    </p>
                    <p>Get rid of those bugs today!</p>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/2-simple-pest-management-truck.jpg">
                    </div>

                </div>
            </div>
        </div>

        <section class="service-area-cta bg-primary py-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="mb-2 mb-lg-0 text-white">Why wait? Get those unwelcome guests out of your home with
                            the most
                            knowledgeable ant control team in <?php echo $city; ?>, CA. With our bug-free
                            guarantee,
                            you have
                            nothing to lose...except for the ant!
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
                    <h2>Don&apos;t Let Fleas, Ticks, and Mites Rule Your <?php echo $city; ?> Home</h2>
                    <p>These critters are more than just household pests - they can threaten the health and well-being
                        of you and your family. Simple Pest focuses on flea, tick, and mite control in
                        <?php echo $city; ?>, using
                        advanced sprays and baits to target different types of bloodsuckers.
                    </p>
                </div>
            </div>

            <!-- <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Local & Family Owned</p>
                    <h2>Fast Flea, Tick, and Mite Control Solutions</h2>
                    <p>Your pathway to peace begins the moment you give us a ring to book your first service. That's
                        when the real magic happens! Our friendly team rolls up their sleeves and gets down to business,
                        sending each and every ant on its way, transforming your treasured home back into the calm
                        retreat you remember. And it's not just one type of ant, or two - we tackle a whole variety!
                        From the sting of yellow jackets to the hum of digger ant, and the buzz of tarantula hawks,
                        they all find their exit route when we arrive.

                    </p>
                    <p>But our care for your comfort doesn't end with that first service. Our protective shield stays
                        with you, offering continuous reassurance against any winged interlopers that might consider
                        setting up shop. Your sanctuary is our purpose, fast and friendly ant control solutions are our
                        promise. Welcome to your new ant-free reality.
                    </p>
                    <ol>
                        <li class="mb-2">Schedule your first service</li>
                        <li class="mb-2">Get a pest-free home</li>
                        <li class="mb-2">Stay protected from 20+ pests</li>
                    </ol>
                    <p class="h4 mb-0"><a class="font-weight-bold"
                            href="tel:<?php //echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php //echo $phone_number; ?></a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php //echo get_template_directory_uri(); ?>/assets/images/4-simple-pest-management-customer.jpg">
                    </div>
                </div>
            </div> -->
        </div>

        <section class="service-area-cta bg-primary py-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="h2 text-white">Do you need ant control in <?php echo $city; ?>?</p>
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
                    <h2>Residential Flea, Tick, and Mite Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        ant problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Flea, Tick, and Mite Control in
                            <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Flea, Tick, and Mite Control in <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold mb-1">Single Family Home Flea, Tick, and Mite Control in
                            <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo Flea, Tick, and Mite Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Flea, Tick, and Mite Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for your ant
                        control needs in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for Offices.
                        </li>
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for Retail.
                        </li>
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for Medical
                            Centers.
                        </li>
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for
                            Restaurants.</li>
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for Schools.
                        </li>
                        <li class="font-weight-bold mb-1">Flea, Tick, and Mite Control <?php echo $city; ?> for
                            Warehouses.</li>
                        <li class="font-weight-bold">Flea, Tick, and Mite Control <?php echo $city; ?> for Supermarkets.
                        </li>
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
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Flea, Tick, and Mite Control Services</h2>
                        <p class="mb-0 py-4">At Simple Pest, we offer comprehensive ant control services that are
                            designed to tackle various types of ant infestations. Our services are specifically
                            tailored to address and eliminate the different species of ant found in
                            <?php echo $city; ?>
                            and the surrounding areas.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rat" href="#">Fleas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mice" href="#">Ticks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="moles" href="#">Mites</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rat-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>Fleas</h2>
                                <p class="mb-0">Fleas are reddish-brown insects that measure about 2mm in length. The
                                    most common species in <?php echo $city; ?> is called the 'cat flea'. Despite its
                                    name, this
                                    species will also feed off of humans and dogs. When bitten by a flea, a small, red
                                    bump will appear and it will be intensely itchy. If you see your pet itching more
                                    often than normal, check their stomach for small red bumps. It is important to
                                    notice the signs in your pet as early as possible, since fleas generally enter the
                                    house by hitching a ride on a dog or cat. In California, flea season is year-round,
                                    but they are most active between April and October.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-fleas.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mice-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Ticks
                                </h2>
                                <p class="mb-0">Between fleas, ticks, and mites, ticks are generally the parasite that
                                    people have the most experience with. Although there are many tick varieties, the
                                    average adult tick is about the size of a sesame seed. There are four common tick
                                    species in California: Western black-legged tick, Pacific Coast tick, American dog
                                    tick, and brown dog tick. These ticks can spread diseases such as Lyme disease,
                                    anaplasmosis, tularemia, and spotted fever. To transmit these diseases, ticks
                                    typically only need to be attached to the host for 24-48 hours; so make sure you get
                                    in the habit of checking yourself and your pets for ticks after being outside.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-ticks.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="moles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Mites
                                </h2>
                                <p class="mb-0">Mites are circular creatures that are hard to see since they generally
                                    measure under 1mm long. Given their size, mites cannot be felt. The only sign of
                                    their presence is the itchiness left by their bites. The most common biting mites in
                                    California include the tropical rat mite, chicken mite, and northern fowl mite. The
                                    type of mite in your home can give a good indication of other pests. The tropical
                                    rat mites tend to be in rat-infested areas while the chicken and northern fowl mites
                                    target birds and poultry. In most cases, mites do not set out to use humans as
                                    hosts; they latch on to humans when their primary host dies.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-mites.jpg">
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
                        <h2>Why Choose Us for <?php echo $city; ?> Flea, Tick, and Mite Control?</h2>
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
                                <h3 class="card-title h6">Proven Flea, Tick, and Mite Control Processes</h3>
                                <p class="mb-0">We developed our ant control strategies over decades of
                                    experience in the field. We have knowledge of the local area and how it affects pest
                                    behavior. You can rely on our team to deliver you a pest-free property.
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
                                <h3 class="card-title h6">Eco-Friendly Pest Control Systems</h3>
                                <p class="mb-0">We use pest control products that meet 'Green Pro Certification'
                                    suitable for use in California. Every Simple Pest exterminator is trained to handle
                                    and use these products safely and effectively. We care about the environment and
                                    ensure we don't harm the <?php echo $city; ?> ecosystem.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/licensed.svg"
                                    alt="Licensed pest control icon">
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Flea, Tick, and Mite Control
                                </h3>
                                <p class="mb-0">Our business is established, licensed, and insured. We remove the risk
                                    of hiring people to work on your property. If anything happens while we're on-site,
                                    it's our problem, not yours.

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
                                <h3 class="card-title h6">Fast, Effective, Flea, Tick, and Mite Elimination with Lasting
                                    Results
                                </h3>
                                <p class="mb-0">Our pest control solutions yield fast, effective, and consistent results
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
                                    invoicing includes no hidden charges.</p>
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
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Flea, Tick, and Mite Control</p>
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
                    <h2 class="mb-0"><?php echo $city; ?> Flea, Tick, and Mite Control FAQ</h2>
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
                                        How much does pest control cost for fleas, ticks, and mites?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The cost of professional pest control for these bloodsuckers can
                                        vary depending on the size of the infestation and the area to be treated.
                                        Generally, the average cost for a professional flea control service is between
                                        $175 to $300, tick control is between $200-$500, and mite control is between
                                        $100-$500. For more accurate pricing, please contact us for a free quote
                                        tailored to your specific needs.
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
                                        Should you call an exterminator if you see fleas, ticks, or mites?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes. Since these pests can spread disease (and make for a rough
                                        night's sleep), it is important to call an exterminator like Simple Pest early
                                        on to help prevent a full-blown infestation.
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
                                        Are fleas, ticks, and mites harmful?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes! Fleas and ticks can spread diseases while mites can cause skin
                                        irritations. Protect yourself, your family, and your pets by calling on the
                                        professionals to help with infestations.
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
                                        What should you do if fleas, ticks, or mites come into your home?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">If you experience unexplained itchiness associated with small, red
                                        bumps or have seen a multitude of ticks, call a professional pest control
                                        service like Simple Pest. We will help identify the extent of the infestation,
                                        eliminate the current population, and take measures to prevent future
                                        infestations. In the meantime, protect your family by checking everyone
                                        (including pets) for pests after being outside.
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