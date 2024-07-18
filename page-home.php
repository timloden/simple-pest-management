<?php

/**
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();

$discount_amount = get_field('hero_discount_amount');
$discount_label = get_field('hero_discount_label');
$discount_subtitle = get_field('hero_discount_subtitle');
$hero_city = get_field('hero_city');
$hero_title = get_field('hero_title');
?>
<div class="jumbotron jumbotron-fluid home-hero mb-0 position-relative lazy" style="background-size: cover;" data-bg="<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-bg.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 hero-text mb-3 text-center text-lg-left">
                <h1 class="text-white"><?php echo ($hero_title) ? $hero_title : 'Got bugs?' ?><br><span class="text-success">Simple.</span><?php echo ($hero_city) ? '<br>' : '' ?> Call
                    us<?php echo ($hero_city) ? '<br>in ' . $hero_city : '!' ?></h1>
                <p class="h2 text-white pt-3">
                    <?php if (get_field('hero_phone_number')) {
                        echo '<a class="text-white" href="tel:' . preg_replace('/[^0-9]/', '', get_field('hero_phone_number')) . '">' . get_field('hero_phone_number') . '</a>';
                    } else {
                        echo get_field('phone_number', 'option');
                    }
                    ?>
                </p>
                <p class="lead text-white"><?php echo esc_attr(get_field('hero_subtitle')); ?></p>
            </div>
            <div class="col-12 col-lg-6">
                <div class="mx-4 px-2 py-3 text-center text-primary limited-time-container position-relative bg-orange" style="z-index: 9;" data-aos="fade-up">
                    <p class="mb-0 text-white"><?php echo $discount_subtitle; ?></p>
                    <p class="mb-0 h4 text-white"><u><?php echo $discount_amount; ?></u> <?php echo $discount_label; ?>
                    </p>
                </div>
                <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative" style="z-index: 999;">
                    <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="mission py-5 ">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-0 mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="d-flex flex-column">
                            <div class="card mb-lg-4 shadow border-0" data-aos="fade-down" data-aos-delay="100">
                                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-1.jpg" class="card-img-top lazy">
                            </div>
                            <div class="card shadow border-0 d-none d-lg-block" data-aos="fade-down" d ata-aos-delay="200">
                                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-2.jpg" class="card-img-top lazy">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="d-flex flex-column mt-5">
                            <div class="card mb-4 mt-5 shadow border-0 d-none d-lg-block" data-aos="fade-down" data-aos-delay="300">
                                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-3.jpg" class="card-img-top lazy">
                            </div>
                            <div class="card shadow border-0 d-none d-lg-block" data-aos="fade-down" data-aos-delay="400">
                                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-4.jpg" class="card-img-top lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 order-0 order-lg-1">
                <div class="pl-0 pl-lg-5 position-sticky" style="top: 300px;">
                    <h2 class="mb-4 pb-4 border-bottom"><?php the_field('mission_title'); ?></h2>
                    <?php the_field('mission_text'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="mt-4 pt-4 border-top"><?php the_field('guarantee_text'); ?></p>
                <p class="h5 text-center">100% Satisfaction Guaranteed</p>
            </div>
        </div>
    </div>
</section>

<section class="services bg-light-blue py-5">
    <div class="container py-5">
        <div class="row pb-5">
            <div class="col-12">
                <h2 class="text-center">Our Services</h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php while (have_rows('services')) : the_row();
                $service_page = get_sub_field('service_page');
                $title = get_field('hero_title', $service_page->ID);

                if (!$title) {
                    $title = get_the_title($service_page->ID);
                }

                $featured_img = get_the_post_thumbnail_url($service_page->ID);
                $text = get_the_excerpt($service_page->ID);
                $link = get_the_permalink($service_page->ID);
            ?>

                <div class="col-12 col-lg-4 pb-4">
                    <div class="card shadow-sm h-100">
                        <?php if ($featured_img) : ?>
                            <img data-src="<?php echo esc_url($featured_img); ?>" class="card-img-top lazy" alt="">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo esc_url($link); ?>"><?php echo $title ?></a></h5>
                            <p class="card-text"><?php echo $text ?></p>
                            <a href="<?php echo esc_url($link); ?>" class="">Learn more about
                                <?php echo $title ?></a>
                        </div>
                    </div>
                </div>


            <?php endwhile; ?>

        </div>


        <div class="row pt-5">
            <div class="col-12">
                <h2 class="border-bottom mb-3 pb-3 text-center">Areas we service</h2>
                <p><?php the_field('areas_we_service_text'); ?></p>
            </div>
            <div class="col-12">
                <?php

                $terms = get_terms(array(
                    'taxonomy' => 'location',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC'
                ));

                if ($terms) {
                    echo '<div class="row mt-3 mt-lg-5 justify-content-center">';

                    foreach ($terms as $term) {

                        $term_link = get_term_link($term);
                        $term_id = 'term_' . $term->term_id;
                        $location_image = get_field('location_image', $term);
                ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100 location">
                                <a href="<?php echo $term_link; ?>">
                                    <?php if ($location_image) : ?>
                                        <img src="<?php echo $location_image['url']; ?>" class="card-img-top" alt="<?php echo $term->name; ?> location">
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center"><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?> Pest
                                            Control</a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-12 text-center">
            <a href="/free-estimate/" class="btn btn-orange font-weight-bold btn-lg">Get your FREE ESTIMATE
                today!</a>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-12 col-md-6">
            <h4 class="mb-4"><?php echo get_field('video_section_title') ? get_field('video_section_title') : ''; ?>
            </h4>
            <div class="accordion pr-md-5" id="accordionExample">

                <?php while (have_rows('video_accordion')) : the_row();
                    $accordion_title = get_sub_field('title');
                    $accordion_desc = get_sub_field('description');
                ?>

                    <div class="accordion-item mb-4">
                        <h4 class="mb-0">
                            <button class="btn btn-link d-flex w-100 align-items-center justify-content-between text-left px-0" type="button" data-toggle="collapse" data-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="false" aria-controls="collapse-<?php echo get_row_index(); ?>">
                                <span><i class="las la-check-square pr-2"></i>
                                    <?php echo esc_attr($accordion_title); ?></span>
                                <i class="las la-chevron-left"></i>
                            </button>
                        </h4>
                        <div id="collapse-<?php echo get_row_index(); ?>" class="collapse" aria-labelledby="heading-<?php echo get_row_index(); ?>" data-parent="#accordionExample">

                            <?php echo esc_attr($accordion_desc); ?>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <?php
            $video = get_field('video_file');
            if ($video) : ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls poster="<?php echo get_template_directory_uri(); ?>/assets/images/simple-pest-video-poster.png">
                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                    </video>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="clients py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 mb-lg-0 text-center">

                <h2 class="mb-3">Hear from some of our clients</h2>
                <p>We want you to feel confident in your pest service so please take a look at what some of our
                    satisfied customers are saying!</p>

            </div>
            <div class="col-12">
                <?php
                $google_embed_social_shortcode = get_field('google_reviews_shortcode');
                $elfsight_embed = get_field('elfsight_reviews');

                if ($google_embed_social_shortcode) {
                    echo do_shortcode($google_embed_social_shortcode);
                }

                if ($elfsight_embed) {
                    echo $elfsight_embed;
                }
                ?>
            </div>

        </div>
        <?php if (have_rows('review_sites', 'option')) : ?>
            <div class="row">
                <?php while (have_rows('review_sites', 'option')) : the_row();
                    $image = get_sub_field('image');
                ?>
                    <div class="col-6 col-lg-3">
                        <a href="<?php echo get_sub_field('link'); ?>" target="_blank">
                            <img data-src="<?php echo $image['url']; ?>" class="img-fluid px-3 lazy">
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <?php
                $embed_social_shortcode = get_field('embed_social_shortcode');

                if ($embed_social_shortcode) {
                    echo do_shortcode($embed_social_shortcode);
                }
                ?>

            </div>
        </div>
        <div class="row my-4">
            <div class="col-12 text-center">
                <h2>California pest control FAQs</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingOne">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What common pests should residents be aware of in California?
                                </button>
                            </h3>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">California residents should be aware of various pests including rodents,
                                    fleas, mice,
                                    cockroaches, termites, bedbugs, ants, earwigs, and wasps. Gophers are also a common
                                    issue in California lawns, causing damage to gardens and potentially to underground
                                    utilities.</p>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingTwo">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Can weather in California affect pest activity?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Yes, pests in California can be influenced by the weather. For example,
                                    warmer temperatures can increase ant and cockroach activity, while rainy seasons
                                    might lead to more mosquitoes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingThree">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Are landlords responsible for pest control in California?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">In California, landlords are generally responsible for maintaining
                                    pest-free rental properties. However, if a tenant's actions lead to an infestation,
                                    the tenant may be responsible for pest control. This includes situations where
                                    unclean habits or unreported maintenance issues contribute to an infestation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingFour">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What can I do to prevent pest infestations in my home?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Keep your home clean and free of food crumbs. Seal cracks and crevices,
                                    fix leaks, and ensure proper garbage disposal. Regular maintenance and cleanliness
                                    are key in preventing infestations.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingFive">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What services does Simple Pest Management offer?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Simple Pest Management provides a range of pest control services,
                                    including residential and commercial pest control, rodent control, bed bug
                                    treatment, snake deterrent programs, cockroach control, and programs for fleas,
                                    ticks, and mites. We also offer eco-friendly pest control solutions.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingSix">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How can I get a free estimate from Simple Pest Management?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">You can get a free estimate by contacting Simple Pest Management via our
                                    phone at (866) 311-6189. We only require some basic information about the pest
                                    problem and your location to provide an estimate.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingSeven">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    How often should I have my property inspected for pests?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">We recommend to have a professional inspection at least once a year.
                                    However, if you live in an area prone to specific pests or have experienced
                                    infestations before, more frequent inspections might be necessary.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingEight">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Are there eco-friendly pest control options available in California?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Yes, Simple Pest Management offers eco-friendly pest control solutions,
                                    focusing on safety and environmental concerns while effectively managing pest
                                    issues.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingNine">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Is pest control safe for my pets and family?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Most modern pest control methods are safe for families and pets,
                                    especially when performed by licensed professionals. Discuss any safety concerns
                                    with Simple Pest Management.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingTen">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    How long does a typical pest control treatment last?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">The effectiveness of a treatment depends on the type of pest and the
                                    methods used. Some treatments may last a few months, while others might need to be
                                    reapplied more frequently.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingEleven">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                    Does Simple Pest Management have a satisfaction guarantee?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Yes, we offer a 100% pest-free guarantee. For customers on a maintenance
                                    plan, if pests return between service appointments, the company will provide
                                    additional service at no extra cost. One-time service treatments come with a 45-day
                                    pest-free guarantee.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 border rounded">
                        <div class="card-header" id="headingTwelve">
                            <h3 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                    Are DIY pest control methods effective in California?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">While DIY methods can provide temporary relief, they may not be
                                    effective for major infestations. Simple Pest Management can offer more
                                    comprehensive solutions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What common pests should residents be aware of in California?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "California residents should be aware of various pests including rodents, fleas, mice, cockroaches, termites, bedbugs, ants, earwigs, and wasps. Gophers are also a common issue in California lawns, causing damage to gardens and potentially to underground utilities."
            }
        }, {
            "@type": "Question",
            "name": "Can weather in California affect pest activity?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, pests in California can be influenced by the weather. For example, warmer temperatures can increase ant and cockroach activity, while rainy seasons might lead to more mosquitoes."
            }
        }, {
            "@type": "Question",
            "name": "Are landlords responsible for pest control in California?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "In California, landlords are generally responsible for maintaining pest-free rental properties. However, if a tenant's actions lead to an infestation, the tenant may be responsible for pest control. This includes situations where unclean habits or unreported maintenance issues contribute to an infestation."
            }
        }, {
            "@type": "Question",
            "name": "What can I do to prevent pest infestations in my home?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Keep your home clean and free of food crumbs. Seal cracks and crevices, fix leaks, and ensure proper garbage disposal. Regular maintenance and cleanliness are key in preventing infestations."
            }
        }, {
            "@type": "Question",
            "name": "What services does Simple Pest Management offer?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Simple Pest Management provides a range of pest control services, including residential and commercial pest control, rodent control, bed bug treatment, snake deterrent programs, cockroach control, and programs for fleas, ticks, and mites. We also offer eco-friendly pest control solutions."
            }
        }, {
            "@type": "Question",
            "name": "How can I get a free estimate from Simple Pest Management?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can get a free estimate by contacting Simple Pest Management via our phone at (866) 311-6189. We only require some basic information about the pest problem and your location to provide an estimate."
            }
        }, {
            "@type": "Question",
            "name": "How often should I have my property inspected for pests?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We recommend to have a professional inspection at least once a year. However, if you live in an area prone to specific pests or have experienced infestations before, more frequent inspections might be necessary."
            }
        }, {
            "@type": "Question",
            "name": "Are there eco-friendly pest control options available in California?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, Simple Pest Management offers eco-friendly pest control solutions, focusing on safety and environmental concerns while effectively managing pest issues."
            }
        }, {
            "@type": "Question",
            "name": "Is pest control safe for my pets and family?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Most modern pest control methods are safe for families and pets, especially when performed by licensed professionals. Discuss any safety concerns with Simple Pest Management."
            }
        }, {
            "@type": "Question",
            "name": "How long does a typical pest control treatment last?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The effectiveness of a treatment depends on the type of pest and the methods used. Some treatments may last a few months, while others might need to be reapplied more frequently."
            }
        }, {
            "@type": "Question",
            "name": "Does Simple Pest Management have a satisfaction guarantee?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, we offer a 100% pest-free guarantee. For customers on a maintenance plan, if pests return between service appointments, the company will provide additional service at no extra cost. One-time service treatments come with a 45-day pest-free guarantee."
            }
        }, {
            "@type": "Question",
            "name": "Are DIY pest control methods effective in California?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "While DIY methods can provide temporary relief, they may not be effective for major infestations. Simple Pest Management can offer more comprehensive solutions."
            }
        }]
    }
</script>
<?php
get_footer();
