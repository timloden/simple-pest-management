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
                                Control Service</a> / Earwigs
                        </p>
                        <h1 class="text-white mb-3">Earwig Control Service in <?php echo $city; ?></h1>
                        <p class="text-white">Enjoy the peace of mind of a clean, earwig-free home today, and
                            never deal with unwelcome roommates again. Call us for same-day service or fill out the form
                            below to schedule your initial service at your convenience.
                        </p>

                        <ul class="list-unstyled">
                            <li class="text-white mb-2">✅ Pest-Free Home <strong>Guarantee</strong></li>
                            <li class="text-white mb-2">✅ <strong>Same Day</strong> Service Available</li>
                            <li class="text-white">✅ <strong>Kid & Pet</strong> Friendly Treatment</li>
                        </ul>

                        <p class="mb-0 text-white">When you've spotted earwigs in your <?php echo $city; ?> home,
                            you know
                            it's time
                            to call for professional help. At Simple Pest, we specialize in superior earwig control
                            in
                            <?php echo $city; ?>, offering unparalleled pest control services that rid your residence or
                            business
                            of these unsightly critters.
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
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/2-simple-pest-management-truck.jpg"
                            alt="Simple Pest Management">
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
                            knowledgeable earwig control team in <?php echo $city; ?>, CA. With our bug-free
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
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/3-simple-pest-management-exterminator.jpg"
                            alt="Simple Pest Management Exterminator">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <p class="kicker text-primary font-weight-bold">Reliable &amp; Effective Elimination</p>
                    <h2>Don&apos;t Let Earwigs Rule Your <?php echo $city; ?> Home</h2>
                    <p>While they may not bite or sting humans and can appear intimidating, earwigs are more than just
                        household pests, as they can also cause harm to indoor plants and devastate gardens. Simple Pest
                        focuses on pest control in <?php echo $city; ?>, using advanced sprays and baits to target
                        earwigs.
                    </p>
                </div>
            </div>

            <!-- <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Local & Family Owned</p>
                    <h2>Fast Earwig Control Solutions</h2>
                    <p>Your pathway to peace begins the moment you give us a ring to book your first service. That's
                        when the real magic happens! Our friendly team rolls up their sleeves and gets down to business,
                        sending each and every earwig on its way, transforming your treasured home back into the calm
                        retreat you remember. And it's not just one type of ant, or two - we tackle a whole variety!
                        From the sting of yellow jackets to the hum of digger ant, and the buzz of tarantula hawks,
                        they all find their exit route when we arrive.

                    </p>
                    <p>But our care for your comfort doesn't end with that first service. Our protective shield stays
                        with you, offering continuous reassurance against any winged interlopers that might consider
                        setting up shop. Your sanctuary is our purpose, fast and friendly earwig control solutions are our
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
                        <p class="h2 text-white">Do you need earwig control in <?php echo $city; ?>?</p>
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
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/5-residential-pest-control.jpg"
                            alt="Simple Pest Management Residential Pest Control">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <h2>Residential Earwig Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        earwig problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Earwig Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Earwig Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Earwig Control in
                            <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo Earwig Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Earwig Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for your ant
                        control needs in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Offices.</li>
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Retail.</li>
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Medical
                            Centers.
                        </li>
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Restaurants.
                        </li>
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Schools.</li>
                        <li class="font-weight-bold mb-1">Earwig Control <?php echo $city; ?> for Warehouses.
                        </li>
                        <li class="font-weight-bold">Earwig Control <?php echo $city; ?> for Supermarkets.</li>
                    </ul>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="service-area-image-bg right">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/6-commercial-pest-control.jpg"
                            alt="Simple Pest Management Commercial Pest Control">
                    </div>
                </div>
            </div>
        </div>

        <section class="range-of-services py-3 py-lg-5">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12 text-center">
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Earwig Control Services</h2>
                        <p class="mb-0 py-4">At Simple Pest, we offer comprehensive earwig control services that are
                            designed to tackle various types of earwig infestations. Our services are specifically
                            tailored to address and eliminate the different species of earwig found in
                            <?php echo $city; ?>
                            and the surrounding areas.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rat" href="#">European
                                    Earwig
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mice" href="#">Ring-Legged
                                    Earwig</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="moles" href="#">Striped
                                    Earwig</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rat-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>European Earwig</h2>
                                <p class="mb-0">
                                    European earwigs are a reddish-brown color and are generally just over half an inch.
                                    Although these pests don't look like they can fly, they can fly short distances.
                                    Nevertheless, despite this capability, they typically opt for scurrying instead of
                                    taking to the air. These critters are nocturnal and prefer to hunt at night, and
                                    prefer to hide in your house during the day. If you see them roaming your floors
                                    during the day, it's likely that they wandered in looking for shelter. An
                                    interesting fact about the European earwig is that the females will relocate their
                                    30-60 eggs multiple times in search for optimal conditions for them.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-european-earwig.jpg"
                                        alt="European Earwig">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mice-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Ring-Legged Earwig
                                </h2>
                                <p class="mb-0">
                                    The ring-legged earwig is dark brown in color, but has pale yellowish-white legs
                                    with reddish-brown splotches. Like the European earwig, this species is just over
                                    half an inch in length. The ring-legged earwig is more abundant in southern
                                    California, but can be found in the non-mountainous areas of the northern part of
                                    the state.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-ring-legged-earwig.jpeg"
                                        alt="Ring-Legged Earwig">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="moles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Striped Earwig
                                </h2>
                                <p class="mb-0">
                                    Striped earwigs are reddish-brown and are the biggest species of the three,
                                    measuring around an inch long. This type of earwig does not eat plants, so the
                                    vegetation in and around your home is safe! Instead, the striped earwig's diet
                                    consists mainly of small insects, which is why they are considered beneficial.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-striped-earwig.jpg"
                                        alt="Striped Earwig">
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
                        <h2>Why Choose Us for <?php echo $city; ?> Earwig Control?</h2>
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
                                <h3 class="card-title h6">Proven Earwig Control Processes</h3>
                                <p class="mb-0">We developed our earwig control strategies over decades of
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
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Earwig Control</h3>
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
                                <h3 class="card-title h6">Fast, Effective, Ant Elimination with Lasting Results
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
                                loading="lazy" alt="Pest control near <?php echo $city; ?>">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <h2>Service Areas</h2>
                        <p>Offering pest control services in <?php echo $city; ?> and the surrounding areas.</p>
                        <p>Contact us for assistance anywhere in the <?php echo $city; ?> area, including
                            <?php echo implode(', ', $surround_areas); ?>, and more.</p>
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Earwig Control</p>
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
                    <h2 class="mb-0"><?php echo $city; ?> Earwig Control FAQ</h2>
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
                                        How much does pest control cost for earwigs?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">
                                        The cost of professional pest control for earwigs can vary depending on
                                        the size of the infestation and the area to be treated. Generally, the average
                                        initial visit cost for a professional earwig control service ranges from $75 to
                                        $300. For more accurate pricing, please contact us for a free quote tailored to
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
                                        What are the signs of a earwig infestation?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">
                                        The most common sign of an earwig infestation is seeing a number of them
                                        crawling around your home. Additional signs of an earwig infestation include
                                        dead plants, bugs near sources of moisture, and a foul odor that is emitted when
                                        earwigs are squished.

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
                                        Are earwigs harmful?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">
                                        No, earwigs are generally not harmful. Although they have intimidating pinchers
                                        at the bottom of their abdomen, they will not pinch unless threatened. Even
                                        then, the pain from the pinch is very mild.
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
                                        What should you do if earwigs come into your home?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">
                                        If you see a number of earwigs in your home or suspect that you have an earwig
                                        problem, call a professional pest control service like Simple Pest. We will help
                                        identify the extent of the infestation, eliminate the current population, and
                                        take measures to prevent future infestations. In the meantime, you can get rid
                                        of the earwigs you see by vacuuming them up.
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