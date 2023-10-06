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
                                Control Service</a> / Bed Bugs
                        </p>
                        <h1 class="text-white mb-3">Bed Bug Control Service in <?php echo $city; ?></h1>
                        <p class="text-white">At Simple Pest, we understand the gravity of a bed bug infestation. Our
                            pest control solutions are expertly designed to not only get rid of these pesky intruders
                            but also prevent any future infestations. We proudly serve homeowners across
                            <?php echo $city; ?> and
                            the broader California area, offering professional, effective, and affordable bed bug
                            control services.</p>

                        <p class="text-white pb-0">A single pregnant female can cause an infestation of more than 5,000
                            bed bugs within a six-month period. That&apos;s 27 new bed bugs per day! Don&apos;t wait
                            another
                            minute for the bed bugs to spread. Call us to treat your home today.
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
                    <h2 class="mb-4">We Understand Bed Bugs</h2>
                    <p>Bed bugs are insidious pests that hide in crevices, box springs, bed frames, and even headboards.
                        Our specialists are trained to recognize the signs of bed bugs, from the musty odor to the bite
                        marks and reddish-brown exoskeletons they leave behind. We're well-versed with all aspects of
                        bed bug removal, from early detection to bed bug treatment.
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
                            knowledgeable bed bug control team in <?php echo $city; ?>, CA. With our bug-free guarantee,
                            you have
                            nothing to lose...except for the bed bugs!
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
                    <h2>Expertise in Bed Bug Extermination</h2>
                    <p>With years of experience under our belt and a team of skilled bed bug exterminators, we are
                        equipped to tackle any bed bug problem. Our specialists are trained in various treatment
                        methods, including heat treatment, which is a popular, eco-friendly option that eliminates bed
                        bugs in all stages of their life cycle.
                    </p>
                </div>
            </div>

            <div class="row align-items-center py-3 py-lg-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Local & Family Owned</p>
                    <h2>Comprehensive Bed Bug Control Solutions</h2>
                    <p>For comprehensive pest management, we also inspect linens, bed sheets, and other potential hiding
                        spots for any signs of a bed bug infestation. After a thorough bed bug inspection, we create
                        custom pest control solutions tailored to your specific needs. Whether you're dealing with adult
                        bed bugs or a full-blown infestation, Simple Pest is your best choice for bed bug control in
                        <?php echo $city; ?>.
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
                        <p class="h2 text-white">Do you need bed bug service in <?php echo $city; ?>?</p>
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
                    <h2>Trust the Bed Bug Pest Control Experts</h2>
                    <p>At Simple Pest, we're more than just a pest control company. We're a part of the
                        <?php echo $city; ?>
                        community. We take pride in helping homeowners in the <?php echo $city; ?> area live comfortably
                        and
                        bug-free. So why not get a free inspection? Call us today for a free quote and let's help you
                        enjoy a bed bug-free home.
                    </p>
                    <p>We offer bed bug inspections and estimates for any of the following properties.</p>
                    <ul class="mb-0">
                        <li class="font-weight-bold mb-1">Apartment bed bug treatments in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Duplex bed bug treatments in <?php echo $city; ?>.</li>
                        <li class="font-weight-bold mb-1">Single Family Home bed bug treatments in <?php echo $city; ?>.
                        </li>
                        <li class="font-weight-bold">Condo bed bug treatments in <?php echo $city; ?>.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <p class="kicker text-primary font-weight-bold">Experience to Understand</p>
                    <h2>Safe Pest Control Methods</h2>
                    <p>We understand the importance of safety when dealing with pest problems. Our team uses carefully
                        selected insecticides and pesticides to ensure the well-being of your family and pets. And rest
                        assured, our extermination services are designed to be environmentally friendly and safe for all
                        occupants of your home.
                    </p>
                    <p class="mb-0">
                        To resolve your bed bug infestation, we typically apply two treatments to the affected areas in
                        your home. The first consists of residual products that are designed to kill bed bugs on contact
                        while the second product is an insect growth regulator that prevents adults from reproducing.
                        All of our products are EPA approved, so you can rest easy knowing that we will always leave
                        your home safer than we found it. Treatments will vary depending on the size of your infestation
                        and how many rooms you have that are infested, but most cases consist of one initial treatment
                        and two follow-up treatments every 15 days. These follow up treatment schedules make sure we get
                        rid of the bed bug infestation.
                    </p>
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
                    <div class="col-12">
                        <h2 class=" text-center">Our Bed Bug Treatment Process</h2>
                        <p class="mb-0">To resolve your bed bug infestation, we typically apply two treatments to the
                            affected areas in your home. The first consists of residual products that are designed to
                            kill bed bugs on contact while the second product is an insect growth regulator that
                            prevents adults from reproducing. All of our products are EPA approved, so you can rest easy
                            knowing that we will always leave your home safer than we found it. Treatments will vary
                            depending on the size of your infestation and how many rooms you have that are infested, but
                            most cases consist of one initial treatment and two follow-up treatments every 15 days.
                            These follow up treatment schedules make sure we get rid of the bed bug infestation.

                        </p>
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        <h2 class=" text-center">Bed Bug Steam Treatments</h2>
                        <p>Simple Pest Management distinguishes itself as a premier bed bug extermination service in
                            <?php echo $city; ?>, utilizing state-of-the-art steam treatment techniques. Our innovative
                            approach
                            ensures an unerring annihilation of both the pests and their eggs, regardless of their
                            refuge.
                        </p>
                        <p>Recurring bed bug issues often signify that these pests have evolved to resist conventional
                            chemical treatments. Our steam treatment triumphs over this challenge by elevating the
                            infested area to an intolerable temperature, rendering survival impossible for bed bugs.</p>
                        <p>Standing apart from traditional bed bug remedies, our steam solutions require no chemical
                            involvement and bypass the need for direct pest contact. Our adept exterminators simply
                            administer steam and heat to the compromised zones, letting the fatal temperatures
                            accomplish the task.</p>
                        <p>It&apos;s critical to note that commercial steamers for garments or carpets won&apos;t
                            suffice - this
                            is not a DIY project! Achieving an optimal temperature balance is paramount: too low, and
                            the bed bugs endure; too high, and it risks damage to your furnishings and surfaces. Always
                            trust a professional for steam treatments. Reach out to Simple Pest Management today and
                            schedule a complimentary consultation!
                        </p>
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        <h2 class="text-center">Preparation</h2>
                        <p>Preparation is essential for the most effective bed bug treatment. Here is what you should do
                            to prepare your living space for our bed bug exterminator:
                        </p>
                        <p>The heat of your dryer can kill any bed bugs or eggs that have found their way into your
                            clothes. Run your clothes in the dryer for at least 45 minutes and either leave them in the
                            dryer or secure them in sealed bags until our treatment is complete.</p>
                        <p>Remove all of your sheets and bedding (wash and dry them), and lean your mattress and box
                            spring against one wall.</p>
                        <p>All items in your closet, dresser, nightstand, etc. should be removed and placed into plastic
                            bags.
                        </p>
                        <p class="mb-0">These plastic bags should be stored somewhere away from your living areas so
                            that they
                            don&apos;t get in the way during treatment. Following these preparation steps will allow our
                            bed bug exterminator to effectively treat your infestation.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="why-use-simple-pest py-3 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Why Choose Us for Bed Bug Control in <?php echo $city; ?>?</h2>
                        <p>Choosing Simple Pest means choosing a partner that stands for excellence and integrity.
                            Here's why we are the preferred pest control service in the <?php echo $city; ?> area.
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
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/licensed.svg"
                                    alt="Licensed pest control icon">
                                <h3 class="card-title h6">Licensed, Bonded, and Insured Bed Bug Control</h3>
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
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/authentication.svg"
                                    alt="Proven process pest control icon">
                                <h3 class="card-title h6">Customized Treatment Options</h3>
                                <p class="mb-0">We understand that each bed bug infestation is unique. That&apos;s why
                                    we
                                    offer a range of treatment options, from heat treatments to conventional insecticide
                                    treatments. Our technicians will work with you to decide the most effective and
                                    convenient approach for your bed bug problem.
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
                                <h3 class="card-title h6">Eco-Friendly Bed Bug Control Systems</h3>
                                <p class="mb-0">We use bed bug control products that meet 'Green Pro Certification,'
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
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/effective.svg"
                                    alt="Effective pest control icon">
                                <h3 class="card-title h6">Exceptional Customer Service</h3>
                                <p class="mb-0">At Simple Pest, we value our customers. We believe in clear
                                    communication and dedicated service. Our team is always available to answer any
                                    questions you may have about the process or the products we use. We're committed to
                                    keeping you informed every step of the way.
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
                                    reputation in the <?php echo $city; ?> community as the leading bed bug control
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
                                <h3 class="card-title h6">Highly Trained and Experienced Staff</h3>
                                <p class="mb-0">Our team is our strength. With years of experience in pest management,
                                    our experts are well-equipped to handle all kinds of pest problems, including bed
                                    bug infestations. They are knowledgeable, friendly, and professional.</p>
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
                        <p>Offering bed bug control services in <?php echo $city; ?> and the surrounding areas.</p>
                        <p>Contact us for assistance anywhere in the <?php echo $city; ?> area, including
                            <?php echo implode(', ', $surround_areas); ?>, and more.</p>
                        <p>Get a Bde Bug Inspection and Estimate for <?php echo $city; ?> Pest Control</p>
                        <p>We offer pest inspections at properties across <?php echo $city; ?>. Our team has years of
                            experience
                            identifying bed bug infestations on properties throughout <?php echo $area; ?>. We know what
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
                    <h2 class="mb-0">Frequently Asked Questions</h2>
                    <p class="mb-0 pt-4 pb-5">When you contract Simple Pest Management to handle your bed bug situation,
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
                                        What is the best treatment to get rid of bed bugs?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">There&apos;s no one-size-fits-all treatment for bed bugs. The best
                                        method
                                        depends on factors such as the severity of infestation and location of the bugs.
                                        However, heat treatment is often considered very effective as it can penetrate
                                        all stages of a bed bug's life cycle and reach areas that insecticides cannot.
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
                                        Is there any way to completely get rid of bed bugs?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Yes, with professional assistance, it's entirely possible to
                                        eliminate a bed bug infestation. At Simple Pest, we employ a combination of
                                        treatments including heat treatment, insecticides, and preventive measures to
                                        ensure complete bed bug eradication.
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
                                        Should I throw away my bed if I have bed bugs?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Before resorting to throwing away your bed, consider professional
                                        bed bug
                                        treatment. With the right approach, bed bugs can be successfully eliminated from
                                        your bed and other infested furniture.
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
                                        How do you get rid of bed bugs in California?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Getting rid of bed bugs in California involves a comprehensive
                                        approach that includes inspection, treatment, and follow-up visits. We recommend
                                        working with professional pest control services like Simple Pest to ensure
                                        complete extermination.
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
                                        What are bed bugs?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Bed bugs are small, oval, brownish insects that feed on the blood of
                                        animals or humans. Adult bed bugs have flat bodies about the size of an apple
                                        seed. After feeding, their bodies swell and become reddish. Bed bugs do not fly,
                                        but they can move quickly over floors, walls, and ceilings.
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
                                        How do I get rid of bed bugs on my mattress?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">The process involves vacuuming, heat treatment, or using specific
                                        insecticides.
                                        However, it's strongly recommended to get professional help. Our technicians at
                                        Simple Pest have the experience and the tools to effectively rid your mattress
                                        of bed bugs.</p>
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
                                        What are the symptoms of bed bugs?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">Symptoms of bed bugs can vary, but common signs include itchy bed
                                        bug bite marks, often in lines or clusters, small blood stains on your sheets,
                                        and a distinctive musty odor. You may also see the bugs themselves or their
                                        exoskeletons in your bed or hiding spots.

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