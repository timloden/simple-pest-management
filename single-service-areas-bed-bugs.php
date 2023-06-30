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
<h1>DEB BUGS</h1>
<div id="primary" class="content-area services-single">
    <main id="main" class="site-main">
        <section class="service-hero position-relative"
            style="background-image: url(<?php echo esc_url($hero_image); ?>)">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1 class="text-white mb-3"><?php echo $city; ?> Pest Control Service</h1>
                        <p class="text-white">Enjoy the peace of mind of a clean, bug-free home today, and never deal
                            with unwelcome roommates again. Call us for same day service or fill out the form below to
                            schedule your initial service at your convenience. From wasps to cockroaches, bed bugs to
                            earwigs - our <?php echo $city; ?> pest control service has you covered.</p>

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
                    <h2 class="mb-4">A Professional And Reliable Exterminator</h2>
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
                            knowledgeable pest control team in <?php echo $city; ?>, CA. With our bug-free guarantee,
                            you have
                            nothing to lose...except for the bugs!
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
                    <h2>Thorough Pest Control Company</h2>
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
                    <h2>Fast Pest Control Solutions</h2>
                    <p>Your journey to freedom begins when you pick up the phone to schedule your first service with us.
                        The magic unfolds as our dedicated team gets to work, exterminating every pest in sight,
                        ensuring that your cherished abode is left as a pristine haven. Not just one pest, not just two,
                        but over twenty different types of nuisances meet their end. </p>
                    <p>And the protection doesn&apos;t stop there, our shield of assurance extends beyond this first
                        purge,
                        offering continuous safety against the unwelcome guests. Simple Pest isn't just about
                        eliminating pests, it's about reclaiming your peace, protecting your happiness, and restoring
                        your comfort. Your sanctuary is our mission, fast pest control solutions, your new reality.
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
                        <p class="h2 text-white">Do you need pest control in <?php echo $city; ?>?</p>
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
                    <h2>Residential Pest Control <?php echo $city; ?></h2>
                    <p>If you own a residence in <?php echo $city; ?>, call Simple Pest Management to deal with your
                        pest problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Pest Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex Pest Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Pest Control in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold">Condo Pest Control in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Pest Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for effective pest
                        control services in <?php echo $city; ?>. We work with building managers, business owners, and
                        employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Offices.</li>
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Retail.</li>
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Medical Centers.</li>
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Restaurants.</li>
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Schools.</li>
                        <li class="font-weight-bold mb-1">Pest Control <?php echo $city; ?> for Warehouses.</li>
                        <li class="font-weight-bold">Pest Control <?php echo $city; ?> for Supermarkets.</li>
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
                        <h2 class="mb-0">Our Range of <?php echo $city; ?> Pest Control Services</h2>
                        <p class="mb-0 py-4">If you have a pest problem in <?php echo $city; ?>, contact the best pest
                            control company at
                            <a
                                href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"><?php echo $phone_number; ?></a>.
                            We have the team, skills, and products to eliminate pests from your property. We have
                            decades of experience working with homeowners and businesses in <?php echo $area; ?> area.
                            We're confident
                            we have the right pest control strategy for your property. Call our pest control team for a
                            free inspection today.

                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified flex-column flex-md-row border rounded">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active pest-type-button" id="rodent"
                                    href="#">Rodent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="cockroach"
                                    href="#">Cockroach</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="flea" href="#">Flea,
                                    Tick, and Mites</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="ant" href="#">Ants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="spider" href="#">Spiders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold pest-type-button" id="silverfish"
                                    href="#">Silverfish</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rodent-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2><?php if ($rodent_page) : ?><a href="<?php echo $rodent_page; ?>"><?php endif; ?>

                                        Rodent Control & Removal <?php echo $city; ?>
                                        <?php if ($rodent_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Rodents, including rats and mice, are an issue for
                                    homeowners, businesses, and commercial property managers. Rats chew wiring and
                                    create fire hazards. Rodents and their droppings also carry parasites and diseases,
                                    spreading them through communities. Our rodent removal and control program ensures
                                    we eliminate these pests from your property.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-rodents.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="cockroach-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    <?php if ($cockroach_page) : ?><a
                                        href="<?php echo $cockroach_page; ?>"><?php endif; ?>
                                        Cockroach Control <?php echo $city; ?>
                                        <?php if ($cockroach_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Turn the tide against relentless cockroaches with Simple Pest's
                                    Cockroach Control Services. These unwelcome guests can be a persistent nuisance, but
                                    our expertise offers the swift solution you need. Our advanced cockroach control
                                    methods track and exterminate each intruder, restoring the sanctity of your home.
                                    With Simple Pest, let your home be your fortress, impenetrable to the roach
                                    invasion. Take back control with Simple Pest.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/cockroach-program.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="flea-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    <?php if ($fleas_page) : ?><a href="<?php echo $fleas_page; ?>"><?php endif; ?>
                                        Flea, Tick and Mite Removal <?php echo $city; ?>
                                        <?php if ($fleas_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Wildlife drops ticks on people&apos;s properties, and mites and fleas
                                    usually
                                    arrive on the backs of rats or pets. Simple Pest Management will eliminate these
                                    microscopic pests from your home or business premises. Contact us for a pest
                                    inspection of your property.</p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-crawling.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="ant-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    <?php if ($ants_page) : ?><a href="<?php echo $ants_page; ?>"><?php endif; ?>
                                        Ant Control <?php echo $city; ?>
                                        <?php if ($ants_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Harness the power of Simple Pest&apos;s Ant Control Services to reclaim
                                    your
                                    home. These tiny invaders can create a mammoth of a problem, undermining your peace
                                    and comfort. But with Simple Pest, there's no cause for concern. Our advanced ant
                                    control measures trace and terminate every trail, leaving your home an ant-free
                                    zone. Say goodbye to unwanted picnics, as we deliver the effective solution you
                                    need. With Simple Pest, tranquility returns to your domain.</p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-ants.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="spider-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    <?php if ($ants_page) : ?><a href="<?php echo $ants_page; ?>"><?php endif; ?>
                                        Spider Control <?php echo $city; ?>
                                        <?php if ($ants_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Confront your deepest fears with Simple Pest's unrivaled Spider Control
                                    Services. It's not just about the run-of-the-mill invaders, we tackle the true
                                    villains &mdash; the infamous Black Widow with its venomous allure, the notorious
                                    Brown
                                    Recluse that lurks in hidden corners, and the intimidating Wolf Spider, a fearsome
                                    adversary in any home. Each has a name, each a terrifying reputation, but to us,
                                    they're merely challenges waiting to be surmounted. With our expertise, these
                                    threatening creatures become powerless. Banish the nightmares, discard the fear,
                                    Simple Pest is here.
                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="/wp-content/themes/simple-pest-management/assets/images/pest-spiders.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pest-type-content d-none" id="silverfish-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>
                                    <?php if ($ants_page) : ?><a href="<?php echo $ants_page; ?>"><?php endif; ?>
                                        Silverfish Control <?php echo $city; ?>
                                        <?php if ($ants_page) : ?></a><?php endif; ?>
                                </h2>
                                <p class="mb-0">Combat the quiet invaders with Simple Pest's Silverfish Control
                                    Services. These stealthy pests can silently damage your cherished belongings. But
                                    rest easy, Simple Pest is your shield. Our exceptional silverfish control finds and
                                    eradicates them from their hidden corners, ending their damage. No more ruined
                                    keepsakes or wallpapers. Trust in Simple Pest and reclaim your home from the
                                    silverfish menace. Enjoy peace of mind as we fortify your sanctuary.

                                </p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid"
                                        src="/wp-content/themes/simple-pest-management/assets/images/pest-silverfish.jpg">
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
                        <h2 class="mb-0">Why Choose Us for <?php echo $city; ?> Pest Control?</h2>
                        <p class="mb-0 py-4">When you contact Simple Pest Management to handle your pest situation, you
                            the
                            following in your service level agreement with us.<br>Contact our team at
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
                                <h3 class="card-title h6">Proven Pest Control Processes</h3>
                                <p class="mb-0">We developed our pest control strategies over decades of experience in
                                    the field. We have knowledge of the local area and how it affects pest behavior. You
                                    can rely on our team to deliver you a pest-free property.
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
                                <p class="mb-0">We use pest control products that meet 'Green Pro Certification,'
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
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Pest Control</h3>
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
                                <h3 class="card-title h6">Fast, Effective, Pest Elimination with Lasting Results</h3>
                                <p class="mb-0">Our pest control systems yield fast, effective, and consistent results
                                    for our clients. We&apos;re confident we&apos;ll take care of your pest problem with
                                    lasting
                                    results for your property. Simple Pest Management offers you elite pest control
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
                                    reputation in the <?php echo $city; ?> community as the leading pest control
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
                                <p class="mb-0">Simple Pest Management offers pest inspections and estimates and
                                    affordable prices on pest control services. When you hire us, you leverage our
                                    experienced pest team and knowledge, giving you lasting results for your property.
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
                        <p>Offering pest control services in <?php echo $city; ?> and the surrounding areas.</p>
                        <p>Contact us for assistance anywhere in the <?php echo $city; ?> area, including
                            <?php echo implode(', ', $surround_areas); ?>, and more.</p>
                        <p>Get a Pest Inspection and Estimate for <?php echo $city; ?> Pest Control</p>
                        <p>We offer pest inspections at properties across <?php echo $city; ?>. Our team has years of
                            experience
                            identifying pest infestations on properties throughout <?php echo $area; ?>. We know what to
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
                    <h2 class="mb-0"><?php echo $city; ?> Pest Control FAQ</h2>
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
                                        Does Simple Pest Management offer eco-friendly pest control in
                                        <?php echo $city; ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Simple Pest Management works with pest control products complying with 'Green Pro
                                    Certification.' Our products break down into harmless compounds, leaving no impact
                                    on the local groundwater or run-off. Our pest control systems are safe for soil and
                                    the local environment - they are safe for your family and pets.

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
                                        Does your rodent control program harm pets or the local wildlife?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Simple Pest Management stops rodents from destroying your property and spreading
                                        disease in the community. Rats carry parasites like fleas, lice, and ticks and
                                        diseases like the Hantavirus; seeing rodents scuttling around your property is a
                                        problem.</p>
                                    <p class="mb-0">Our rodent control solutions are designed to eliminate the rats, not
                                        your pets or the local wildlife. We care for the community of
                                        <?php echo $city; ?>. Our
                                        pest control systems are ethical and efficient, with no harmful effects on the
                                        ecosystem.</p>
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
                                        Does Simple Pest Management offer pest inspections in <?php echo $city; ?>?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Yes, we offer free pest inspections. Our pest control experts know where pests
                                        like to hide on your property and will prepare a report and estimate after
                                        inspecting your property.
                                    </p>
                                    <p class="mb-0">If you want to use our extermination services, we will eliminate the
                                        problems and prevent future issues with lasting results. Book your inspection
                                        today.</p>
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
                                        How often should I do preventative pest control in <?php echo $city; ?>?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>We recommend homeowners and business owners in <?php echo $city; ?> implement a
                                        preventative pest control strategy for their property. By taking action and
                                        stopping the problem before it starts, you keep your property pest free for the
                                        future.</p>
                                    <p class="mb-0">The pest control requirements of properties depend on their size and
                                        nature. Single-family homes may require a monthly or bi-monthly approach, while
                                        apartments may need a bi-weekly or monthly pest control strategy.

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
                                        Should I try to eliminate the pests in my home using DIY pest control
                                        strategies?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>DIY pest control usually involves leaving out bait packs or granules for ants,
                                        rodents and cockroaches. While these systems provide temporary results, they
                                        don't stop your pest problem. DIY pest control makes a dent in the pest
                                        population on your property, but it rebounds shortly after that.</p>
                                    <p class="mb-0">With Simple Pest Management, you get a team with decades of
                                        experience handling all types of pest infestations in <?php echo $city; ?>. We
                                        know where
                                        to look to find the nest and eradicate the pests. Our services provide lasting
                                        results, and a preventative pest control program keeps them away.
                                    </p>
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