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

if ($location) {
    $term = get_term( $location[0], 'location' );
    $phone_number = get_field('location_phone_number', 'term_' . $term->term_id  );
} else {
    $phone_number = '(866) 887-7378';
}
?>
<div id="primary" class="content-area services-single">
    <main id="main" class="site-main">

        <section class="service-hero" style="background-image: url(<?php echo esc_url($hero_image); ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1 class="text-white mb-3">Your local and best pest control service in <?php echo $city; ?>,
                            California</h1>
                        <p class="text-white">Simple Pest Management provides the <?php echo $city; ?> area with
                            reliable & effective
                            elimination of insects and rodents. We have pest control programs for all different types or
                            residences including single family homes, condos, and apartment buildings. </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-12 col-lg-10">
                    <p class="mb-0 text-center">We also service commercial properties including food processing
                        facilities,
                        restaurants, schools, office buildings and many other types of locations. At Simple Pest
                        Management, we go out of our way to tailor service to our customer&apos;s specific needs;
                        whether they are looking for year-round protection or a one-time service.</p>
                </div>
            </div>

            <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Latest Technology</p>
                    <h2 class="mb-4">Simple Pest Management strives to exceed our client&apos;s expectations</h2>
                    <p>from the moment our technicians arrive. All of our technicians are uniformed are licensed, bonded
                        and insured. But beyond these basics, you will find that they are professionals and will treat
                        your home as they would that if their own family. We use the latest technology available in the
                        pest control industry and have the experience to understand how and when to use the advanced
                        tools and when to use basic, old fashioned hard work.</p>
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
                        <p class="h2 text-white">100% Satisfaction Guaranteed</p>
                        <p class="mb-0 text-white">This is the difference with our company. We understand that
                            technology
                            won&apos;t always solve the problem if you don&apos;t have skilled technicians in control.
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold" href="tel:">(833) 887-7378
                            (PEST)</a>
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
                    <h2>Simple Pest Management provides the <?php echo $city; ?> are with reliable</h2>
                    <p>effective elimination of pests, bugs, insects and rodents. We have pest control programs for all
                        different types of residences including single family homes, condos, and apartment buildings.
                        We also service commercial properties including food processing facilities, restaurants,
                        schools, office buildings and many other types of locations. At Simple Pest Management, we go
                        out of our way to tailor service to our customer's specific needs, whether you are looking for
                        year-round protection or a one-time service.</p>
                </div>
            </div>

            <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Simple Pest Management strives to exceed our client&apos;s expectations</h2>
                    <p>from the moment our technicians arrive. All our technicians are uniformed, professional and
                        licensed with the state. The company is licensed, bonded, and insured.</p>
                    <p>But beyond these basics, you will find that they are professionals and will treat your home as
                        they would that if their own family.
                        We use the latest technology available in the pest control industry and have the experience to
                        understand how and when to use the advanced tools and when to use basic, old fashioned hard
                        work.</p>
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
                        <p class="mb-0 text-white">Our team of pest experts is ready to take your call. We offer advice
                            on pest
                            control and a range of services to eliminate pests from your property. Don&apos;t let the
                            pests gain control of your property. Call Simple Pest Management
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold" href="tel:">(833) 887-7378
                            (PEST)</a>
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
                    <p>If you own a residence in Santee, call Simple Pest Management to deal with your pest problem. Our
                        team works with property managers, landlords, homeowners, and tenants. We offer pest inspections
                        and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment Pest Control in Santee.</li>
                        <li class="font-weight-bold mb-1">Duplex Pest Control in Santee.</li>
                        <li class="font-weight-bold mb-1">Single Family Home Pest Control in Santee.</li>
                        <li class="font-weight-bold">Condo Pest Control in Santee.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Commercial Pest Control <?php echo $city; ?></h2>
                    <p>If you own a business or commercial building, call simple Pest Management for effective pest
                        control services in Santee. We work with building managers, business owners, and employees.
                        Contact our pest control team for immediate assistance.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Pest Control Santee for Offices.</li>
                        <li class="font-weight-bold mb-1">Pest Control Santee for Retail.</li>
                        <li class="font-weight-bold mb-1">Pest Control Santee for Medical Centers.</li>
                        <li class="font-weight-bold mb-1">Pest Control Santee for Restaurants.</li>
                        <li class="font-weight-bold mb-1">Pest Control Santee for Schools.</li>
                        <li class="font-weight-bold mb-1">Pest Control Santee for Warehouses.</li>
                        <li class="font-weight-bold">Pest Control Santee for Supermarkets.</li>
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
                        <p class="mb-0 py-4">If you have a pest problem in Santee, contact Simple Pest Management at
                            (619) 373-7378. We
                            have the team, skills, and products to eliminate pests from your property. We have decades
                            of experience working with homeowners and businesses in San Diego. We're confident we have
                            the right pest control strategy for your property. Call our pest control team for a free
                            inspection today.</p>
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
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pest-type-content" id="rodent-info">
                        <div class="row align-items-center py-3 py-lg-5">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h2>Rodent Removal <?php echo $city; ?></h2>
                                <p class="mb-0">Rats are an issue for homeowners, businesses, and commercial property
                                    managers. Rats chew wiring and create fire hazards. They also carry parasites and
                                    diseases, spreading them through communities. Our rat eradication program ensures we
                                    eliminate these pests from your property.</p>
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
                                <h2>Cockroach Removal <?php echo $city; ?></h2>
                                <p class="mb-0">Roaches like to breed in the warm weather around San Diego. From
                                    kitchens to production factories and storage areas, roaches are prevalent wherever
                                    dark, damp conditions exist. Simple Pest Management uses effective control
                                    strategies to eliminate cockroaches from any property.</p>
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
                                <h2>Flea, Tick and Mite Removal <?php echo $city; ?></h2>
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
                                <h2>Ant Removal <?php echo $city; ?></h2>
                                <p class="mb-0">Don&apos;t let the ants dig up your patio or driveway or destroy your
                                    brickwork. Call Simple Pest Management, and we&apos;ll eliminate the queen and her
                                    colony from your property.</p>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="service-area-image-bg right pest-type">
                                    <img class="img-fluid" src="/wp-content/uploads/2020/07/pest-ants.jpg">
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
                            <?php echo $phone_number; ?> for
                            immediate assistance.</p>
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
                                <p class="mb-0">Simple Pest Control developed our pest control strategies over decades
                                    of experience
                                    in the field. We have knowledge of the local area and how it affects pest behavior.
                                    You can rely on our team to deliver you a pest-free property.</p>
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
                                    California. Our teams are trained to handle and use these
                                    products safely and effectively. We care about the environment and ensure we don't
                                    harm the Santee ecosystem.</p>
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
                                    of hiring
                                    people to work on your property. If anything happens while we're on-site, it's our
                                    problem, not yours.</p>
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
                                    specialist in San
                                    Diego.</p>
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
                                    affordable prices on
                                    pest control services. When you hire us, you leverage our experienced pest team and
                                    knowledge, giving you lasting results for your property. Our transparent invoicing
                                    includes no hidden charges.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="service-area-image-bg left">
                            <img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/7-pest-control-near-you.jpg">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <h2><?php echo $city; ?> Pest Control Near Me</h2>
                        <p>Simple Pest Management offers effective, affordable pest control services in Santee. We're
                            available for residences and business premises across the area.</p>
                        <p>Contact us for assistance anywhere around Big Rock Park, Padre Dam Park, or Northcote Park.
                            We service al communities in the area, including Mission View Estates, Venture Business
                            Park, and Sky Ranch.</p>
                        <p>Simple Pest Management is available for businesses and residences along Mast Boulevard,
                            Cuyamaca Street, and Magnolia Avenue. Contact us for service along the San Diego River and
                            Carlton Oaks Country Club. We service suburbs around the Santee Lakes Recreation Preserve
                            and Town Center Community Park.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-area-cta bg-primary py-3 py-lg-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <p class="h2 text-white">Get a Pest Inspection and Estimate for <?php echo $city; ?> Pest
                            Control</p>
                        <p class="mb-0 text-white">We offer pest inspections at properties across Santee. Our team has
                            years of
                            experience identifying pest infestations on properties throughout San Diego. We know what to
                            look for and how to stop it from spreading.
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-end">
                        <a class="btn btn-primary btn-orange btn-lg font-weight-bold" href="tel:">(619) 373-7378</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mb-5 pb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-0"><?php echo $city; ?> Pest Control FAQ</h2>
                    <p class="mb-0 pt-4 pb-5">When you contract Simple Pest Management to handle your pest situation,
                        you get
                        the following in
                        your service level agreement with Contact our team at (619) 373-7378 for immediate assistance.
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
                                    Simple Pest Management works with pest control products complying with &apos;Green
                                    Pro
                                    Certification.&apos; Our products break down into harmless compounds, leaving no
                                    impact
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
                                        Does your rodent eradication program harm pets or the local wildlife?
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
                                    <p class="mb-0">Contact Simple Pest Management for effective rat eradication with
                                        safe pest
                                        control systems designed to eliminate the rats, not your pets or the local
                                        wildlife. We care for the community of <?php echo $city; ?>. Our pest control
                                        systems are
                                        ethical and efficient, with no harmful effects on the ecosystem. </p>
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
                                    <p>Call Simple Pest Management and we&apos;ll send a pest control team to your
                                        premises for a pest inspection. Our pest control experts know where pests like
                                        to hide on your property.</p>
                                    <p class="mb-0">We&apos;ll find the source of the infestation and eradicate it with
                                        lasting results. We offer our clients free estimates for pest control. Contact
                                        our team and book your inspection today. </p>
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
                                        preventative
                                        pest control strategy for their property. By taking action and stopping the
                                        problem before it starts, you keep your property pest free for the future. </p>
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
                                        don&apos;t stop your pest problem. DIY pest control makes a dent in the pest
                                        population on your property, but it rebounds shortly after that. </p>
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