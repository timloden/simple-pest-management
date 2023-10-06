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
                                Control Service</a> / Wasps
                        </p>
                        <h1 class="text-white mb-3">Wasp Control Service in <?php echo $city; ?></h1>
                        <p class="text-white">Have wasps established a buzzing fortress in your <?php echo $city; ?>
                            abode or
                            office, transforming your once calm haven into a stage for fear and discomfort? At Simple
                            Pest, we specialize in wasp control <?php echo $city; ?>, providing a swift remedy to this
                            troublesome
                            predicament.
                        </p>

                        <ul class="list-unstyled">
                            <li class="text-white mb-2">✅ Pest-Free Home <strong>Guarantee</strong></li>
                            <li class="text-white mb-2">✅ <strong>Same Day</strong> Service Available</li>
                            <li class="text-white">✅ <strong>Kid & Pet</strong> Friendly Treatment</li>
                        </ul>

                        <p class="mb-0 text-white">In the fight against these unwelcome invaders, you need a trusted
                            ally. With
                            Simple Pest, you&apos;ve got a friend in the wasp extermination business - and we&apos;re
                            prepared to
                            defend your territory, ensuring your peace of mind.
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
                    <h2 class="mb-4">A Professional And Reliable Wasp Exterminator</h2>
                    <p>Your <?php echo $city; ?> exterminator will be uniformed, professional, and licensed by the
                        state. Our
                        company is licensed, bonded, and insured. But beyond these basics, you will find that your
                        exterminator is professional and punctual, and will treat your home as they would theirs. We use
                        the latest technology available in the pest control industry and have the experience to
                        understand how and when to use advanced tools and when to use basic, old-fashioned hard work.
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
                            knowledgeable wasp control team in <?php echo $city; ?>, CA. With our bug-free guarantee,
                            you have
                            nothing to lose...except for the wasps!
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
                    <h2>Thorough Wasp Control Company</h2>
                    <p>Our integrated pest management includes our unique Simple Pest 30-Point Protection Program.</p>
                    <ol class="mb-0">
                        <li class="mb-2"><strong>Inspect</strong> - We&apos;ll inspect your property, identify current
                            and potential
                            problems, and explain our plan of action before getting started.
                        </li>
                        <li class="mb-2"><strong>Protect</strong> - Our initial treatment will eliminate pests and
                            create the first
                            barrier which keeps other pests outside and away from your home.
                        </li>
                        <li><strong>Defend</strong> - Through regular, proactive treatments, your
                            exterminator ensures
                            your home stays pest-free, providing peace of mind for you and your family.
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Local & Family Owned</p>
                    <h2>Fast Wasp Control Solutions</h2>
                    <p>Your pathway to peace begins the moment you give us a ring to book your first service. That's
                        when the real magic happens! Our friendly team rolls up their sleeves and gets down to business,
                        sending each and every wasp on its way, transforming your treasured home back into the calm
                        retreat you remember. And it's not just one type of wasp, or two - we tackle a whole variety!
                        From the sting of yellow jackets to the hum of digger wasps, and the buzz of tarantula hawks,
                        they all find their exit route when we arrive.

                    </p>
                    <p>But our care for your comfort doesn't end with that first service. Our protective shield stays
                        with you, offering continuous reassurance against any winged interlopers that might consider
                        setting up shop. Your sanctuary is our purpose, fast and friendly wasp control solutions are our
                        promise. Welcome to your new wasp-free reality.
                    </p>
                    <ol>
                        <li class="mb-2">Schedule your first service</li>
                        <li class="mb-2">Get a pest-free home</li>
                        <li class="mb-2">Stay protected from 20+ pests</li>
                    </ol>
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
                        <p class="h2 text-white">Do you need wasp control in <?php echo $city; ?>?</p>
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
                    <h2>Residential Wasp Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        pest problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Wasp Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Wasp Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Wasp Control in <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo Wasp Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Wasp Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for your wasp
                        control needs in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Offices.</li>
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Retail.</li>
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Medical Centers.</li>
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Restaurants.</li>
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Schools.</li>
                        <li class="font-weight-bold mb-1">Wasp Control <?php echo $city; ?> for Warehouses.</li>
                        <li class="font-weight-bold">Wasp Control <?php echo $city; ?> for Supermarkets.</li>
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
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Wasp Control Services</h2>
                        <p class="mb-0 py-4">Every wasp species is unique. Fortunately, we're equipped to deal with a
                            variety of them, including:
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rat" href="#">Yellow
                                    Jackets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mice" href="#">Paper Wasps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="moles" href="#">Digger
                                    Wasps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="voles" href="#">Tarantula
                                    Hawks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mud-daubers" href="#">Mud
                                    Daubers</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rat-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>Yellow Jackets</h2>
                                <p class="mb-0">Known for their distinctive yellow and black bodies and their presence
                                    at your late-summer barbecues, Yellow jackets can be particularly aggressive,
                                    especially when their nests are disturbed. Our expert team swiftly and safely
                                    handles yellow jacket issues, freeing your outdoor spaces from their unwelcome
                                    presence.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-yellow-jacket.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mice-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Paper Wasps
                                </h2>
                                <p class="mb-0">Recognizable by their thin waists and the umbrella-shaped nests they
                                    construct from chewed wood pulp, Paper wasps can be a painful problem if aggravated.
                                    We have the tools and techniques to remove paper wasps without causing unnecessary
                                    disturbances.


                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-paper-wasp.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="moles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Digger Wasps
                                </h2>
                                <p class="mb-0">Also known as cicada killers, these solitary insects prefer to burrow in
                                    sandy soil and hunt cicadas to feed their young. Although they typically avoid
                                    conflict with humans, their intimidating size can be off-putting. Let us handle
                                    these natural burrowers for you.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-digger-wasp.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="voles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Tarantula Hawks
                                </h2>
                                <p class="mb-0">With a sting ranked as one of the most painful in the insect world,
                                    these large, blue-black wasps prey on tarantulas. While they are not typically
                                    aggressive to humans, a chance encounter can be extremely painful. We can help keep
                                    these formidable predators at a safe distance.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-tarantula-hawks.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mud-daubers-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Mud Daubers
                                </h2>
                                <p class="mb-0">These solitary wasps construct nests of mud on the sides of buildings
                                    and are generally non-aggressive but can become a nuisance when they establish
                                    themselves on your property. Our team can effectively eliminate and prevent Mud
                                    dauber infestations.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-mud-daubers.jpg">
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
                        <h2>Why Choose Us for <?php echo $city; ?> Wasp Control?</h2>
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
                                <h3 class="card-title h6">Proven Wasp Control Processes</h3>
                                <p class="mb-0">Our wasp control processes have been tested time and again, yielding
                                    consistently successful results. We don&apos;t experiment with your property - we
                                    apply
                                    proven methodologies to ensure you are free from the buzzing menace of wasps. With
                                    Simple Pest, you choose reliability and effectiveness.
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
                                <h3 class="card-title h6">Eco-Friendly Wasp Control Systems</h3>
                                <p class="mb-0">We respect the environment as much as we respect your need for safety.
                                    Our eco-friendly pest control systems are designed to minimize the impact on the
                                    surrounding environment and non-target species. When you choose us, you choose a
                                    company committed to sustainable and responsible pest control practices.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/licensed.svg"
                                    alt="Licensed pest control icon">
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Wasp Control</h3>
                                <p class="mb-0">Our company is fully licensed, bonded, and insured. This means you can
                                    trust us for professional service, safe in the knowledge that you're protected.
                                    Choosing us means choosing peace of mind, knowing that we take full responsibility
                                    for our actions and services.
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
                                <h3 class="card-title h6">Fast, Effective, Wasp Elimination with Lasting Results</h3>
                                <p class="mb-0">Time is of the essence in pest control. Our service offers fast and
                                    effective wasp elimination, but we don't stop there. Our solutions are designed to
                                    provide lasting results, ensuring that once wasps are gone, they stay gone. When you
                                    choose us, you choose a long-term partner in your battle against wasps.
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
                                <p class="mb-0">We believe in our service, and we stand behind it with a 100%
                                    satisfaction guarantee. We won't rest until you&apos;re completely satisfied with
                                    our
                                    service and your wasp problem is fully resolved. When you choose Simple Pest, you
                                    choose a company that puts your satisfaction first.
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
                                <p class="mb-0">We believe that excellent wasp control shouldn&apos;t break the bank. We
                                    offer affordable and competitive rates, providing excellent value for our expert
                                    service. With us, you choose a service that respects your budget while delivering
                                    top-tier results.</p>
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
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Wasp Control</p>
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
                    <h2 class="mb-0"><?php echo $city; ?> Wasp Control FAQ</h2>
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
                                        How do I permanently get rid of wasps in my yard?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Permanent wasp removal requires a comprehensive approach that
                                        includes identification, removal, and prevention. It's crucial to identify the
                                        type of wasp, locate its nest, and safely remove it. Ongoing prevention,
                                        including regular inspections and maintenance of your yard, can also deter wasps
                                        from returning. A professional pest control service like Simple Pest is your
                                        best bet for a comprehensive and lasting solution.
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
                                        What&apos;s the best thing to get rid of wasps?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The most effective solution for getting rid of wasps is professional
                                        pest control. Trained technicians have the knowledge, equipment, and safe
                                        pesticides necessary to deal with a wasp infestation in a swift and safe manner.
                                        It's recommended to avoid DIY removal, particularly for larger infestations, as
                                        this can pose significant risks without the appropriate training and equipment.
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
                                        Can pest control keep wasps away?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Absolutely! Pest control companies like Simple Pest not only
                                        eradicate existing wasp infestations but can also implement preventive measures
                                        to keep wasps from returning. This might include regular inspections, treatments
                                        as necessary, and advice on modifications to your property to make it less
                                        attractive to wasps. The key to keeping wasps away in the long term is
                                        consistent, professional pest control.
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