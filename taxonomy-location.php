<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
$home_page_id = get_option( 'page_on_front' );
$term = get_queried_object();
$phone_number = get_field('location_phone_number', $term);
$form_subtitle = get_field('hero_discount_subtitle', $home_page_id) . ': ' . get_field('hero_discount_amount', $home_page_id) . ' ' . get_field('hero_discount_label', $home_page_id);
$hero_title = get_field('hero_title', $home_page_id);
$discount_amount = get_field('hero_discount_amount', $home_page_id);
$discount_label = get_field('hero_discount_label', $home_page_id);
$discount_subtitle = get_field('hero_discount_subtitle', $home_page_id);
?>
<style>
.clients {
    display: none;
}
</style>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

        <div class="jumbotron jumbotron-fluid home-hero position-relative lazy mb-5" style="background-size: cover;"
            data-bg="<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-bg.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 hero-text mb-3 text-center text-lg-left">
                        <h1 class="text-white"><?php echo ($hero_title) ? $hero_title : 'Got bugs?' ?><br><span
                                class="text-success">Simple.</span> Call
                            us!</h1>
                        <p class="lead text-white mb-2"><?php echo single_cat_title('', false); ?> Location:</p>
                        <p class="h2 text-white">
                            <?php echo esc_attr($phone_number); ?>
                        </p>
                        <p class="lead text-white"><?php echo esc_attr(get_field('hero_subtitle'));?></p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mx-4 px-2 py-3 text-center text-primary limited-time-container position-relative bg-orange"
                            style="z-index: 9;" data-aos="fade-up">
                            <p class="mb-0 text-white"><?php echo $discount_subtitle; ?></p>
                            <p class="mb-0 h4 text-white"><u><?php echo $discount_amount; ?></u>
                                <?php echo $discount_label; ?>
                            </p>
                        </div>
                        <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative"
                            style="z-index: 999;">
                            <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                            <?php gravity_form( 1, false, false, false, '', true, 12 ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center mb-3"><?php echo single_cat_title('', false); ?> Service Locations</h1>
            <?php the_archive_description( '<div class="archive-description text-center mb-3">', '</div>' ); ?>
            <h2 class="h4 text-center mb-5"> Call for free estimate: <a class="text-secondary"
                    href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_attr($phone_number); ?></a></h2>
            <div class="row mt-3 mt-lg-5">
                <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/location-city', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        ?>
            </div>



        </div>

        <section class="services bg-light-blue py-5 mt-5">
            <div class="container">
                <div class="row pb-5">
                    <div class="col-12">
                        <h2 class="text-center">Our Services</h2>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <?php while( have_rows('services', $home_page_id) ): the_row(); 
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
                                <h5 class="card-title"><a href="<?php echo esc_url($link); ?>"><?php echo $title ?></a>
                                </h5>
                                <p class="card-text"><?php echo $text ?></p>
                                <a href="<?php echo esc_url($link); ?>" class="">Learn more about
                                    <?php echo $title ?></a>
                            </div>
                        </div>
                    </div>


                    <?php endwhile; ?>

                </div>

            </div>

        </section>

        <section>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-12 mb-lg-0 text-center">

                        <h2 class="mb-3">Hear from some of our clients</h2>
                        <p>We want you to feel confident in your pest service so please take a look at what some of our
                            satisfied customers are saying!</p>

                    </div>
                    <div class="col-12">
                        <?php 
                    $embed_social_shortcode = get_field('embed_social_shortcode', $home_page_id);

                    if ($embed_social_shortcode) {
                        echo do_shortcode($embed_social_shortcode); 
                    }
                ?>

                    </div>
                </div>
                <?php if( have_rows('review_sites', 'option') ): ?>
                <div class="row">
                    <?php while( have_rows('review_sites', 'option') ): the_row(); 
            $image = get_sub_field('image');
            ?>
                    <div class="col-6 col-lg-3">
                        <a href="<?php the_sub_field('link'); ?>" target="_blank">
                            <img data-src="<?php echo $image['url']; ?>" class="img-fluid px-3 lazy">
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <?php 
                    $google_embed_social_shortcode = get_field('google_reviews_shortcode', $home_page_id);

                    if ($google_embed_social_shortcode) {
                        echo do_shortcode($google_embed_social_shortcode); 
                    }
                ?>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();