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
                                Control Service</a> / Rodents
                        </p>
                        <h1 class="text-white mb-3"><?php echo $city; ?> Rodent Control Service</h1>
                        <p class="text-white">Welcome to Simple Pest, your first line of defense against rodent
                            invasions in California. We are your go-to rodent control company when it comes to all
                            manner of critters that may threaten the peace of your <?php echo $city; ?> homes and
                            businesses. With
                            a particular focus on rodent control <?php echo $city; ?> residents can count on us to
                            eliminate these menacing pests.</p>

                        <ul class="list-unstyled mb-0">
                            <li class="text-white mb-2">✅ Pest-Free Home <strong>Guarantee</strong></li>
                            <li class="text-white mb-2">✅ <strong>Same Day</strong> Service Available</li>
                            <li class="text-white">✅ <strong>Kid & Pet</strong> Friendly Treatment</li>
                        </ul>
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
                    <h2 class="mb-4">A Professional And Reliable Rodent Exterminator</h2>
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
                            knowledgeable rodent control team in <?php echo $city; ?>, CA. With our bug-free guarantee,
                            you have
                            nothing to lose...except for the rodents!
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
                    <h2>Thorough Rodent Control Company</h2>
                    <p>From house mice scurrying in your basement to roof rats nibbling on your electrical wires, we've
                        seen it all. No rodent problem is too big or too small for our trained exterminators.</p>
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
                    <h2>Dealing with a Rodent Infestation?</h2>
                    <p>Is there a trail of rat droppings in your pantry? Or have you noticed gnawed electrical wiring?
                        These are signs of rodent activity that indicate a potential rodent infestation. Don't wait for
                        an invasion of roof rats or house mice to disrupt your life. Early rodent control measures can
                        save you time, stress, and potential damages. Our rodent extermination process begins with a
                        free inspection of your property. We thoroughly check for any rodent entry points and signs of
                        infestations such as droppings or damage to wires.
                    </p>
                    <p>Once the rodent problem is identified, we utilize safe and effective rodent control solutions to
                        remove the critters from your home or business.
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
                        <p class="h2 text-white">Do you need rodent control in <?php echo $city; ?>?</p>
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
                    <h2>Residential Rodent Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        pest problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Rodent Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Rodent Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Rodent Control in <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo Rodent Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Rodent Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for your rodent
                        control needs in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Offices.</li>
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Retail.</li>
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Medical Centers.</li>
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Restaurants.</li>
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Schools.</li>
                        <li class="font-weight-bold mb-1">Rodent Control <?php echo $city; ?> for Warehouses.</li>
                        <li class="font-weight-bold">Rodent Control <?php echo $city; ?> for Supermarkets.</li>
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
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Rodent Control Services</h2>
                        <p class="mb-0 py-4">Simple Pest provides a range of rodent control services, not limited to
                            rodent control. Whether you're dealing with rodents, bed bugs, cockroaches, fleas, or wasps,
                            our rodent management approach will have them scurrying for cover.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rat" href="#">Rats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="mice" href="#">Mice</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="moles" href="#">Moles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="voles" href="#">Voles</a>
                            </li> -->
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rat-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>Rats
                                </h2>
                                <p class="mb-0">Rats are notorious pests known for their destructive behavior. They are
                                    intelligent and can adapt to various environments, making them particularly hard to
                                    control. Rats can spread diseases, contaminate food, and cause structural damage to
                                    buildings by gnawing on materials. At Simple Pest, we provide comprehensive rat
                                    control services, from inspection to extermination. Our team uses proven strategies
                                    and techniques to deal with rat infestations, ensuring your home or business is
                                    rat-free.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-rodents.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="mice-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Mice
                                </h2>
                                <p class="mb-0">Mice are small rodents that can cause significant damage to homes and
                                    businesses. They can chew through wires, insulation, and even walls, leading to
                                    electrical fires or other structural issues. Mice also reproduce rapidly, which can
                                    quickly lead to an overwhelming infestation. Simple Pest's mice control services are
                                    designed to effectively eliminate these pests. We employ a combination of baiting,
                                    trapping, and exclusion methods to ensure your property is free of mice.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/pest-mice.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-12 pest-type-content d-none" id="moles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Moles
                                </h2>
                                <p class="mb-0">Moles are subterranean creatures known for creating networks of tunnels
                                    in yards and gardens. While they're not typically a threat to human health, their
                                    burrowing activity can cause considerable damage to your lawn, ruining your
                                    landscaping efforts. At Simple Pest, we provide specialized mole control services.
                                    Our trained technicians can identify mole activity, eliminate the problem, and offer
                                    solutions to prevent future mole infestations.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-crawling.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="voles-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    Voles
                                </h2>
                                <p class="mb-0">Voles, also known as meadow mice or field mice, are small rodents that
                                    can cause damage to your garden or landscape. They feed on plants and can girdle
                                    trees and shrubs, leading to their death. Voles can also create extensive burrow
                                    systems, causing damage to lawns. Simple Pest's vole control services are designed
                                    to target these pests effectively. We use safe and humane methods to remove voles
                                    from your property, ensuring the protection of your landscape.</p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-ants.jpg">
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

            </div>
        </section>

        <section class="why-use-simple-pest py-3 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Why Choose Us for <?php echo $city; ?> Rodent Control?</h2>
                        <p>We&apos;re more than just your run-of-the-mill exterminator. We are pest control specialists
                            who believe in delivering timely, effective, and safe solutions for our clients. Our team of
                            exterminators is professionally trained to tackle all forms of rodent infestations, from
                            Norway rats to common house mice.
                        </p>
                        <p>Moreover, our services don&apos;t stop at rodent extermination. Simple Pest also offers a
                            wide
                            variety of pest control services that tackle termites, bed bugs, cockroaches, and other
                            common pests.</p>
                        <p>We value your time and that&apos;s why we promise on-time service with every visit.
                            Don&apos;t let
                            pests make a meal of your peace of mind. Call Simple Pest today - the best pest control
                            company in <?php echo $city; ?>!</p>
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
                                <h3 class="card-title h6">Proven Rodent Control Processes</h3>
                                <p class="mb-0">We developed our rodent control strategies over decades of experience in
                                    the field. We have knowledge of the local area and how it affects rodent behavior.
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
                                <h3 class="card-title h6">Eco-Friendly Rodent Control Systems</h3>
                                <p class="mb-0">We use rodent control products that meet 'Green Pro Certification,'
                                    suitable for use in
                                    California. Every Simple Pest exterminator is trained to handle and use these
                                    products safely and effectively. We care about the environment and ensure we don't
                                    harm the <?php echo $city; ?> ecosystem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/licensed.svg"
                                    alt="Licensed pest control icon">
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Rodent Control</h3>
                                <p class="mb-0">Our business is established, licensed, and insured. We remove the risk
                                    of hiring people to work on your property. If anything happens while we're on-site,
                                    it's our problem, not yours.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="mb-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/effective.svg"
                                    alt="Effective pest control icon">
                                <h3 class="card-title h6">Fast, Effective, Rodent Elimination with Lasting Results</h3>
                                <p class="mb-0">Our rodent control systems yield fast, effective, and consistent results
                                    for our clients. We&apos;re confident we&apos;ll take care of your rodent problem
                                    with
                                    lasting
                                    results for your property. Simple Pest Management offers you elite rodent control
                                    services in <?php echo $city; ?>.</p>
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
                                    reputation in the <?php echo $city; ?> community as the leading rodent control
                                    specialist in the <?php echo $area; ?> area.</p>
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
                                <p class="mb-0">Simple Pest Management offers rodent inspections and estimates and
                                    affordable prices on rodent control services. When you hire us, you leverage our
                                    experienced rodent team and knowledge, giving you lasting results for your property.
                                    Our transparent invoicing includes no hidden charges.</p>
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
                        <p>Offering rodent control services in <?php echo $city; ?> and the surrounding areas.</p>
                        <p>Contact us for assistance anywhere in the <?php echo $city; ?> area, including
                            <?php echo implode(', ', $surround_areas); ?>, and more.</p>
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Rodent Control</p>
                        <p>We offer pest inspections at properties across <?php echo $city; ?>. Our team has years of
                            experience
                            identifying rodent infestations on properties throughout <?php echo $area; ?>. We know what
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
                    <h2 class="mb-0"><?php echo $city; ?> Rodent Control FAQ</h2>
                    <p class="mb-0 pt-4 pb-5">When you contract Simple Pest Management to handle your rodent situation,
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
                                        Does your rodent control program harm pets or the local wildlife?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Simple Pest Management stops rodents from destroying your property and spreading
                                        disease in the community. Rats carry parasites like fleas, lice, and ticks and
                                        diseases like the Hantavirus; seeing rodents scuttling around your property is a
                                        problem.</p>
                                    <p class="mb-0">Our rodent control solutions are designed to eliminate the rats, not
                                        your pets or the local wildlife. We care for the community of
                                        <?php echo $city; ?>. Our rodent control systems are ethical and efficient, with
                                        no harmful effects on the ecosystem.</p>
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
                                        How do I get rid of rodents in my yard?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Rodents can be a nuisance in your yard. Here are some effective ways you can
                                        discourage their presence:</p>
                                    <ol>
                                        <li><strong>Seal their food sources</strong>. Rodents are attracted to gardens
                                            and yards due to the abundance of food. Make sure your trash cans are
                                            securely covered to prevent access.
                                        </li>
                                        <li><strong>Remove hiding places</strong>. Clear out wood piles, dense
                                            vegetation, and clutter where rodents can nest.</li>
                                        <li><strong>Use traps and baits</strong>. You can strategically place traps and
                                            baits to capture the rodents.</li>
                                        <li><strong>Hire a professional</strong>. If you have a significant rodent
                                            problem, it might be more effective to hire a professional pest control
                                            company, such as Simple Pest, for rodent control services.</li>
                                    </ol>
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
                                        What is the safest way to get rid of rodents?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>The safest way to get rid of rodents is by using a combination of exclusion
                                        techniques and professional pest control services. Exclusion techniques involve
                                        sealing all entry points and eliminating food and water sources. Meanwhile,
                                        professional pest control services ensure the use of safe and eco-friendly
                                        methods to eradicate rodents.

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
                                        How much is pest control for mice?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The cost of pest control for mice can vary depending on the extent
                                        of the infestation, the size of your property, and the pest control company you
                                        hire. Simple Pest offers affordable and effective rodent control services in
                                        <?php echo $city; ?>. Contact us today for a free quote.
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
                                        What is the most humane rodent control?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The most humane rodent control methods involve live trapping and
                                        exclusion techniques. Live traps catch rodents without causing them harm, and
                                        then they can be released far from your home. Exclusion techniques involve
                                        making your home unattractive to rodents by sealing entry points and eliminating
                                        food sources.
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
                                        What are the benefits of rat control?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Rat control provides several benefits:</p>
                                    <ol>
                                        <li><strong>Prevents Disease Spread:</strong> Rats are known carriers of various
                                            diseases that can affect humans and pets. Effective rat control prevents the
                                            spread of these diseases.
                                        </li>
                                        <li><strong>Reduces Property Damage:</strong> Rats have strong teeth that can
                                            chew through wood, wires, and other materials, causing significant damage.
                                            Rat control helps to prevent this.
                                        </li>
                                        <li><strong>Use traps and baits</strong>. You can strategically place traps and
                                            baits to capture the rodents.</li>
                                        <li><strong>Improves Quality of Life:</strong> A rat infestation can cause
                                            distress and discomfort. Rat control ensures a safe, healthy, and
                                            comfortable living environment.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseSeven"
                                        aria-expanded="false" aria-controls="collapseSeven">
                                        Is pest control for mice worth it?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes, pest control for mice is absolutely worth it. Mice breed
                                        quickly and can soon become a significant problem if left unchecked. They can
                                        cause considerable damage to your property, contaminate food, and spread
                                        diseases. Professional pest control services can efficiently eradicate mice and
                                        prevent future infestations.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border rounded">
                            <div class="card-header" id="headingEight">
                                <h2 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold"
                                        type="button" data-toggle="collapse" data-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                        What can I do to prevent rodents?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>To prevent rodents, follow these steps:</p>
                                    <ol>
                                        <li><strong>Seal all entry points:</strong> Rodents can squeeze through small
                                            gaps and holes, so make sure to seal all potential entry points in your
                                            home.
                                        </li>
                                        <li><strong>Eliminate food sources:</strong> Keep your food properly sealed,
                                            clean up food spills immediately, and secure your trash cans.

                                        </li>
                                        <li><strong>Remove potential nesting sites:</strong> Clear out clutter and
                                            overgrown vegetation that can serve as potential nesting sites.
                                        </li>
                                        <li><strong>Regular inspections:</strong> Have regular pest control inspections
                                            to ensure your home stays rodent-free.
                                        </li>
                                    </ol>
                                    <p class="mb-0">Remember, professional pest control services like those offered by
                                        Simple Pest can help ensure a comprehensive rodent control strategy.</p>
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